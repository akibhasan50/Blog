<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>

            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                     $title = $_POST['title'];
                     $body = $_POST['body'];

                     if($title == "" || $body ==""){
                        echo "<span class='error'>field must not be empty!!! </span>";
                     }else{
                           $sql="INSERT INTO db_page (title,body) value (' $title','$body')";
                            $result=$db->conn->prepare($sql);
                            $result->execute();
                             if($result == true){

                                echo "<span class='success'> page created successfully</span>";
                            }else{
                                echo "<span class='error'> page not created!!! </span>";
                            }
                     }
                 }
            
            
            
            ?>
                <div class="block">
            <form action="addpage.php" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                              

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="create" />
                                
                            </td>
                        </tr>
                    </table>
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

