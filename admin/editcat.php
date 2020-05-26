<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php 
                    if(isset($_GET['catid'])){
                    $id = $_GET['catid'];
                    }

                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name = $fm->validate($_POST['name']);
                        if($name == ""){
                            echo "<span class='error'>field must not be empty!!! </span>";
                        }else{
                            $sql="UPDATE db_cat set name='$name' where id='$id'";
                            $result=$db->conn->prepare($sql);
                            $result->execute();
                             if($result == true){

                                echo "<span class='success'> Category updated successfully</span>";
                            }else{
                                echo "<span class='error'> Category not updated!!! </span>";
                            }
                        }
                    }
                ?>


               <div class="block copyblock"> 

               
              
                  <form  action="" method="POST">
                    <table class="form">
               					
                        <tr>
                <?php 
                    $query = "SELECT * FROM db_cat  where id='$id' order by id DESC";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                 
                 ?>	
                            <td>
                                <input type="text" value="<?php echo $key['name']?>" name="name" class="medium" />
                            </td>
                      
                        </tr>
                    <?php } ;?>
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