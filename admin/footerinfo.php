<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add Footer Info</h2>
                <div class="block">
            <?php 
            if($_SERVER['REQUEST_METHOD'] =="POST"){
				$title = $fm->validate($_POST['title']);
                $body  = $fm->validate($_POST['body']);
                $phone = $fm->validate($_POST['phone']);
                $email = $fm->validate($_POST['email']);
                
                if($title == "" || $body == "" || $phone == "" || $email == "" ){
                            echo "<span class='error'>Fieled must not be empty!!! </span>";
                }else{
                $query="UPDATE db_footer SET title='$title',body='$body',phone='$phone',email='$email' where id='1'";
                $upvalue=$db->conn->prepare($query);
                $upvalue->execute();


                if ($upvalue == true) {
                echo "<span class='success'>Footer info updated Successfully.
                </span>";
                }else {
                    echo "<span class='error'>Footer info Not updated !</span>";
            
                 }
        }
    }
            ?>               
                 <form action="footerinfo.php" method="post" enctype="multipart/form-data">

                 <?php 
                    $sql="SELECT * from db_footer WHERE id='1'";
                    $result=$db->conn->prepare($sql);
                    $result->execute();
                    $value = $result->fetchAll();
                    
                    foreach($value as $key){
                 
                 
                 ?>
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $key['title']?>" class="medium" />
                            </td>
                        </tr>
                     

                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"><?php echo $key['body']?>"</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Phone</label>
                            </td>
                            <td>
                                <input type="number" name="phone" value="<?php echo $key['phone']?>" class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text"  name="email" value="<?php echo $key['email']?>" class="medium" />
                                
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="UPDATE" />
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
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
<?php include "inc/footer.php" ;?>