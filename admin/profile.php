<?php include "inc/header.php";?>
 <?php include "inc/sidebar.php";?> 

      
<?php 
$userid = session::get("userid");


?>

        <div class="grid_10">
        <div class="box round first grid">
                <h2>user profile</h2>
           <?php 

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $_POST['name'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $details = $_POST['details'];
                


        if($name == "" || $username == "" || $email == "" || $details == "" ){
            echo "<span class='error'>Fieled must not be empty!!! </span>";
        }else{
                   
                       
                        $upquery = "UPDATE db_user SET 
                        name='$name',
                        username='$username',
                        email='$email',
                        details='$details'
                        
                        WHERE id=' $userid'"; 
                        
                        $upresult = $db->conn->prepare($upquery);
                        $upvalue = $upresult->execute();
                        if ($upvalue == true) {
                            echo "<span class='success'>Data updated Successfully.
                            </span>";
                        }else {
                            echo "<span class='error'>Data Not updated !</span>";
                        }
                }
            }
        ?>  
                <div class="block">
            <form action="" method="POST" enctype="multipart/form-data">
     
            <?php 
                $sql ="SELECT * FROM db_user where id='$userid'";
                $data = $db->conn->prepare($sql);
                $data->execute();
                $result = $data->fetchAll();

                foreach ($result as $key) {
 
            ?>
                    <table class="form">

                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text"  name="name"  value="<?php echo $key['name'];?>"  class="medium" />
                            </td>
                        </tr>
                    
                         <tr>
                            <td>
                                <label>Userame</label>
                            </td>
                            <td>
                                <input type="text"  name="username" value="<?php echo $key['username'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text"  name="email" value="<?php echo $key['email'];?>" class="medium" />
                            </td>
                        </tr>
                         
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea name="details"   class="tinymce"><?php echo $key['details'];?></textarea>
                            </td>
                        </tr>  

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="update" />
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
 
 ob_end_flush();?>  

