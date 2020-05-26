<?php include "inc/header.php";?>

    <div class="page-wrapper single">
      <!--content////-->
      <div class="content clearfix">
        <!--main content////-->
        <div class="main-content contact">
          <div class="single">
            <div class="post-preview">
              <div class="footer-section contact-form">
              <?php 
                if(isset($_GET['pageid'])){
                    $id = $_GET['pageid'];
                }
               $query = "SELECT * FROM db_page WHERE id='$id'";
                $res=$db->conn->prepare($query);
                $res->execute();
                $val = $res->fetchAll();
                foreach($val as $key){
              ?>
                <h2><?php echo $key['title'];?></h2>
                <br/>
              <p><?php echo $key['body'];?></p>
              </div>
                <?php } ;?>
            </div>
          </div>
        </div>

 <?php include "inc/single-side.php" ;?>
 <?php include "inc/footer.php" ;?>              