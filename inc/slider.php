
  <div class="page-wrapper">
    <!--post slider-->
    <div class="post-slider">
      <h1 class="slider-title">Trending Posts</h1>

      <i class="fas fa-chevron-left prev"></i>
      <i class="fas fa-chevron-right next"></i>
      <div class="post-wrapper">
 
        <?php 
            $sql="SELECT * FROM db_post  limit 4";
            $post =$db->conn->prepare($sql);
            $post->execute();
            $data = $post->fetchAll();
            
            foreach ($data as $key) {
        
        ?>
        <div class="post">
          <img src="admin/<?php echo $key['image'];?>" alt="slider" class="slider-image" />
          <div class="post-info">
            <h4 class="post-ank">
              <a href="single.php?id=<?php echo $key['id']?>"><?php echo $key['title'];?></a>
            </h4>

            <i class="far fa-user"><?php echo $key['authore'];?></i>
            &nbsp;
            <i class="far fa-calendar"><?php echo $fm->dateFormat($key['date']);?></i>
          </div>
        </div>
            <?php } ;?>
      </div>
    </div>

    <!--post slider-->
