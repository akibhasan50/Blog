 <!--footer-->
  <div class="footer">
    <div class="footer-content">
      <div class="footer-section about">

      <?php 
        $sql  = "SELECT * FROM db_footer WHERE id='1'";
        $data = $db->conn->prepare($sql);
        $data->execute();

        $result = $data->fetchAll();
        foreach ($result as $key ) {
      ?>
        <h1 class="logo-text"><?php echo $key['title'] ;?></h1>
        <p>
         <?php echo $key['body'] ;?>
        </p>
        <div class="contract">
          <span><i class="fas fa-phone">&nbsp; <?php echo $key['phone'] ;?></i></span>
          <span><i class="fas fa-envelope">&nbsp; <?php echo $key['email'] ;?></i></span>
        </div>
        <?php } ;?>
        <div class="socials">
        <?php 
       
          $sql="SELECT * from db_social where id='1'";
            $result=$db->conn->prepare($sql);
            $result->execute();
            $value = $result->fetchAll();

            foreach($value as $key){
        
        
        ?>
          <a href="<?php echo $key['fb'];?>"><i class="fab fa-facebook"></i></a>
          <a href="<?php echo $key['tt'];?>"><i class="fab fa-twitter"></i></a>
          <a href="<?php echo $key['ln'];?>"><i class="fab fa-linkedin"></i></a>
          <a href="<?php echo $key['yt'];?>"><i class="fab fa-youtube"></i></a>
        </div>
            <?php } ;?>
      </div>
      <div class="footer-section links">
        <h2>Quick links</h2>
        <br />
        <ul>
          <a href="">
            <li>event</li>
          </a>
          <a href="">
            <li>Teams</li>
          </a>
          <a href="">
            <li>mentors</li>
          </a>
          <a href="">
            <li>Gallary</li>
          </a>
          <a href="">
            <li>terms and conditions</li>
          </a>
        </ul>
      </div>
      <div class="footer-section contact-form">
        <h2>contract us</h2>

        <br/>
        <form action="" method="POST">
         <?php 
                 if($_SERVER['REQUEST_METHOD'] =="POST"){
                    $name= $fm->validate($_POST['name']);
                    $email= $fm->validate($_POST['email']);
                    $body= $fm->validate($_POST['body']);

                    if($name == "" || $email == "" || $body == "" ){
                     echo "<span  style='color:red;font-size:18px;'>Field must not be empty!!! </span>";

                    }else{
                      $sql= "INSERT INTO db_contact (name,email,body) VALUE('$name','$email','$body')";
                      $data = $db->conn->prepare($sql);
                      $data->execute();

 
                    }
                  }
                
          ?>
         <input type="text" name="name" class="text-input contact-input" placeholder="your Name .." />  
          <input type="email" name="email" class="text-input contact-input" placeholder="your email address.." />
          <textarea name="body" class="text-input contact-input" placeholder="your message"></textarea>
          <button type="submit" class="btn btn-big contract-btn">
            <i class="fas fa-envelope"></i>
            Send
          </button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
     <?php 
       
           $query="SELECT * from db_copyright where id='1'";
            $result=$db->conn->prepare($query);
            $result->execute();
            $value = $result->fetchAll();

            foreach($value as $key){
        
        
        ?>
      &copy; <?php echo $key['title'];?>
    </div>
            <?php } ;?>
  </div>

  <!--#####footer-->
 
</body>

</html>