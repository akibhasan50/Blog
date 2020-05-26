      <!--main content////-->
      <div class="sidebar">

        <div class="section topics">

          <h2 class="section-title">Topics</h2>
  
          <ul>
      <?php 
          $csql="SELECT * FROM db_cat";
            $value =$db->conn->prepare( $csql);
            $value->execute();
            $result = $value->fetchAll();        
            foreach ($result as $data) {

       ?>
            <li><a href="singlepost.php?postid=<?php echo $data['id'];?>"><?php echo $data['name'];?></a></li>
            <?php } ;?>
          </ul>
            
    </div>
        <div class="section article">
          <h2 class="section-title">Latest Article</h2>
            <?php 


          $sql="SELECT * FROM db_post limit  3";
            $post =$db->conn->prepare($sql);
            $post->execute();

            $data = $post->fetchAll();
            
            foreach ($data as $key) {

        ?>
          <div class="latest-article">
        
            <h3>
              <a href="single.php?id=<?php echo $key['id'];?>"><?php echo $key['title'];?></a>
            </h3>
            <a href=""><img src="admin/<?php echo $key['image'];?>" alt="" class="postimage" /></a>
            <p class="view">
               <?php echo $fm->textShorten($key['body'],200);?>
            </p>
          </div>
           
         <?php } ;?>
        </div>

         
      </div>

      
    </div>

    <!--content////-->
  </div>
  <!--page-wrapper-->