<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  



        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit  Pages</h2>
                <div class="block">
            <?php 
             if(isset($_GET['pageid']) ){    
                $pageid = $_GET['pageid'];
                
                
            }
                 if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     $title = $_POST['title'];
                     $body = $_POST['body'];

                     if($title == "" || $body ==""){
                        echo "<span class='error'>field must not be empty!!! </span>";
                     }else{
                           $sql="UPDATE db_page set title='$title',body=' $body' where id='$pageid'";
                            $result=$db->conn->prepare($sql);
                            $result->execute();
                             if($result == true){

                                echo "<span class='success'> page updated successfully</span>";
                            }else{
                                echo "<span class='error'> page not updated!!! </span>";
                            }
                     }
                 }
		
		    ?>
        
                  
                 <form action="" method="POST" >

                <?php 
                    $query = "SELECT * FROM db_page WHERE id='$pageid '";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                
                
                ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value ="<?php echo $key['title'];?>" class="medium" />
                            </td>
                        </tr>
  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" name="body" class="tinymce"><?php echo $key['body'];?></textarea>
                            </td>
                       
                        </tr>
                              

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="create" />
                             
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
 <?php include "inc/footer.php" ;?>  

