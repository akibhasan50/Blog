<?php include "inc/header.php" ;?>


    <!--content////-->
    <div class="content clearfix">
      <!--main content////-->
      <div class="main-content">
        
        <?php 
           
        ?>
         <?php 
             if(!isset($_POST['search']) || $_POST['search'] == NULL){
                echo "no data found";
            }else{
                $search =$_POST['search'];
            }
          
            $sql="SELECT * FROM db_post where title LIKE '%$search%' or body LIKE '%$search%' or tags LIKE '%$search%'";
            $post =$db->conn->prepare($sql);
            $post->execute();
            $data = $post->fetchAll();
          
            if($post->rowCount() > 0){
            foreach ($data as $key ) {

        ?>
        <div class="post">
          <img src="admin/<?php echo $key['image'];?>" alt="" class="post-image" />
          <div class="post-preview">
            <h2>
              <a href="single.php?id=<?php echo $key['id'];?>"><?php echo $key['title'];?></a>
            </h2>
            <i class="far fa-user"><?php echo $key['authore'];?></i>
            &nbsp;
            <i class="far calender"><?php echo  ($key['date']);?></i>
            <p class="preview">
             <?php echo $fm->textShorten($key['body'],250);?>
            </p>
            
            <a href="single.php?id=<?php echo $key['id'];?>" class="btn read-more">Read more</a>
             
          </div>

        </div>
 <?php }}else{ header("Location:404.php");}?>


      </div>



<?php include "inc/single-side.php" ;?>
 <?php include "inc/footer.php" ;?>