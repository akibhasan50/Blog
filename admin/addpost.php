<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">
            <?php 
            if($_SERVER['REQUEST_METHOD'] =="POST"){
				$title= $fm->validate($_POST['title']);
                $cat= $_POST['cat'];
                $body= $_POST['body'];
                $authore= $_POST['authore'];
                $tags = $_POST['tags'];
                $userid = $_POST['userid'];


              $permited  = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "upload/".$unique_image;

                
                if($title == "" || $cat == "" || $body == "" || $authore == "" || $tags == "" || $file_name == ""){
                    echo "<span style='color:red;font-size:18px;'>Field must not be empty!!! </span>";
                }elseif ($file_size >1048567) {
                     echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span style='color:red;font-size:18px;'>You can upload only:-".implode(',', $permited)."</span>";
                } else{
                        move_uploaded_file($file_temp, $uploaded_image);
                        $query = "INSERT INTO db_post (cat,title,body,image,authore,tags,userid) 
                        VALUES('$cat','$title','$body','$uploaded_image','$authore','$tags',' $userid')";
                        $result = $db->conn->prepare($query);
                        $value = $result->execute();
                        if ($value == true) {
                            echo "<span style='color:green;font-size:18px;'>Data Inserted Successfully.
                            </span>";
                        }else {
                            echo "<span style='color:red;font-size:18px;'>Data Not Inserted !</span>";
                        }
                }
            
            
            }
            ?>               
                 <form action="addpost.php" method="post" enctype="multipart/form-data">
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
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                         
                                <select id="select" name="cat">
                                    <option >Select catagory</option>
                            <?php 
                                $sql="SELECT * FROM db_cat ORDER BY id DESC";
                                $value = $db->conn->prepare($sql);
                                $value->execute();
                                $reault = $value->fetchAll();
                                if($value){	
                                    foreach ($reault as $data) {
                            
                            ?>
                                 <option value="<?php echo $data['id'] ;?>"><?php echo $data['name'] ;?></option> 
                             <?php }} ;?>    
                                </select>
                                   
                            </td>
                        </tr>
                   

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Body</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" name="tags" placeholder="Enter Post Tags..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Authore</label>
                            </td>
                            <td>
                                <input type="text"  name="authore" placeholder="Enter Authore Name..." class="medium" />
                                <input type="hidden"  name="userid" value="<?php echo session::get("userid");?>" class="medium" />
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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
		<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
		    setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->
<?php include "inc/footer.php" ;?>