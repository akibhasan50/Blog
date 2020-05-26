<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php 
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name = $fm->validate($_POST['name']);
                        if($name == ""){
                            echo "<span class='error'>field must not be empty!!! </span>";
                        }else{
                            $sql="INSERT INTO db_cat (name) VALUE ('$name')";
                            $result=$db->conn->prepare($sql);
                            $result->execute();
                             if($result == true){

                                echo "<span class='success'> Category inserted successfully</span>";
                            }else{
                                echo "<span class='error'> Category not inserted!!! </span>";
                            }
                        }
                    }
                ?>


               <div class="block copyblock"> 
                  <form  action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="name" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
      <?php include "inc/footer.php" ;?> 