<?php include "inc/header.php" ;?>
<?php include "inc/slider.php" ;?>

    <!--content////-->
    <div class="content clearfix">
      <!--main content////-->
      <div class="main-content">
        <h1 class="recent-post-title">Recent Posts</h1>
<?php 


?>
        

        <?php 

            $per_page= 3;
            if(isset($_GET['page'])){
              $page =$_GET['page'];
            }else{
              $page = 1;
            }
            $current_page =($page-1)* $per_page;

            $sql="SELECT * FROM db_post limit  $current_page, $per_page";
            $post =$db->conn->prepare($sql);
            $post->execute();

            $data = $post->fetchAll();
            
            foreach ($data as $key) {

        ?>
        <div class="post">
          <img src="admin/<?php echo $key['image'];?>" alt="" class="post-image" />
          <div class="post-preview">
            <h2>
              <a href="single.php?id=<?php echo $key['id'];?>"><?php echo $key['title'];?></a>
            </h2>
            <i class="far fa-user"><?php echo $key['authore'];?></i>
            &nbsp;
            <i class="far calender"><?php echo  $fm->dateFormat($key['date']);?></i>
            <p class="preview">
             <?php echo $fm->textShorten($key['body'],250);?>
            </p>
            
            <a href="single.php?id=<?php echo $key['id'];?>" class="btn read-more">Read more</a>
             
          </div>
 
        </div>

<?php } ;?>
<!--pagination-->

<?php
            $sql="SELECT * FROM db_post ";
            $post =$db->conn->prepare($sql);
            $post->execute();
            
            $row = $post->rowCount();
            $totalpage = ceil($row/$per_page);
echo "<span class='pagination'> <a href='index.php?page=1'>".'First page'."</a>";
for($i=1; $i<$totalpage ; $i++ ){
 echo "<a href='index.php?page=".$i."'> ".$i." </a>";
}

echo "<a href='index.php?page=$totalpage'>".'Last page'."</a></span>" ;?>
<!--pagination-->
      </div>


<?php include "inc/sidebar.php" ;?>
 <?php include "inc/footer.php" ;?>