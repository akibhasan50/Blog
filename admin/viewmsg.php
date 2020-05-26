 <?php
 //ob_start();
 include "inc/header.php";?>
 <?php include "inc/sidebar.php";?> 



        <div class="grid_10">
       
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">
                  <?php 
         if(!isset($_GET['viewid'])){
            echo " <script>window.location =' inbox.php';</script>"; 
         }else{
             $id =$_GET['viewid'];
              
         }

         if($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo "<script>window.location='inbox.php'</script>";
         }
         ?>
        
                   
                 <form action="" method="POST" enctype="multipart/form-data">
                <?php 
                    
                    $query = "SELECT * FROM db_contact WHERE id='$id' ORDER BY id DESC";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                    
                 ?>	
                    <table class="form">
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $key['name'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $key['email'];?>" class="medium" />
                            </td>
                        </tr>
                    
                      
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="body"  class="tinymce"><?php echo $key['body'];?></textarea>
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $key['date'];?>" class="medium" />
                            </td>
                        </tr>      

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                            <?php } ;?>
                    </form>
                </div>
            </div>
        </div>
 
         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
      <!-- Load TinyMCE -->
 <?php include "inc/footer.php";
 
 

