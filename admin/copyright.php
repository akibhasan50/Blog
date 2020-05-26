<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>

                <?php 
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $title = $_POST['copyright'];
                    if($title == ""){
                            echo "<span class='error'>Fieled must not be empty!!! </span>";
                    }else{
                            $query="UPDATE db_copyright SET title='$title' where id='1'";
                            $upvalue=$db->conn->prepare($query);
                            $upvalue->execute();


                            if ($upvalue == true) {
                            echo "<span class='success'>copyright updated Successfully.
                            </span>";
                            }else {
                                echo "<span class='error'>copyright Not updated !</span>";
                            } 
                    }
                  }
            
            ?>
                <div class="block copyblock"> 
            
                 <form  action="" method="POST">
                    <table class="form">					
                        <tr>
                        <?php 
                            $sql="SELECT * from db_copyright where id='1'";
                            $result=$db->conn->prepare($sql);
                            $result->execute();
                            $value = $result->fetchAll();

                            foreach($value as $key){
                        
                        
                        ?>
                            <td>
                                <input type="text" value="<?php echo $key['title'];?>" name="copyright" class="large" />
                            </td>
                            <?php } ;?>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
     <?php include "inc/footer.php" ;?>