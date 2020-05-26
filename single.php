<?php include "inc/header.php" ;?>
    <div class="page-wrapper single">
        <!--content////-->
        <div class="content clearfix">
            <!--main content////-->
            <div class="main-content single">

        <?php 
                if(!isset($_GET['id']) || $_GET['id'] == NULL){
                  header("Location: 404.php");
                }else{
                    $id = $_GET['id'];
                }
        
        ?>

                <div class="single">
                
        <?php 
				$sql="SELECT * FROM db_post WHERE id='$id'";
				$post =$db->conn->prepare($sql);
				$post->execute();
                $data = $post->fetchAll();

                foreach ($data as $key ) {
 
		?>
                    <h2> <?php echo $key['title'];?></h2>
                    <i class="far fa-user"><?php echo $key['authore'];?></i>
                    &nbsp;
                    <i class="far calender"><?php echo $fm->dateFormat($key['date']);?></i>
                    <div class="post-preview">

                        <img src="admin/<?php echo $key['image'];?>" alt="" class="post-image" />

                        <p class="preview">
                            <?php echo $key['body'];?>
                        </p>

                    </div>

            <?php } ;?>

                    <div class="related">
	            
                        <h2>Related articles</h2>
                <?php 
                    $catid =$key['cat'];
                    $catsql="SELECT * FROM db_post WHERE cat='$catid' LIMIT 6";
                    $catpost =$db->conn->prepare($catsql);
                    $catpost->execute();
                    $catresult=$catpost->fetchAll();
                                foreach ($catresult as $key) {
				?>
                        <a href="single.php?id=<?php echo $key['id'];?>">
                            <img src="admin/<?php echo $key['image'];?>" alt="">
                        </a>
                        <?php } ;?>
                    </div>
                                


                </div>
            </div>

 
<?php include "inc/single-side.php" ;?>
 <?php include "inc/footer.php" ;?>        