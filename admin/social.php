<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>

            <?php 
                  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $fb = $fm->validate($_POST['fb']);
                    $tt = $fm->validate($_POST['tt']);
                    $ln = $fm->validate($_POST['ln']);
                    $yt = $fm->validate($_POST['yt']);

                    if($fb == "" || $tt == "" || $ln=="" || $yt==""){
                       echo "<span class='error'>field must not be empty!!! </span>";
                    }else{
                        $sql = "UPDATE db_social SET 
                        fb='$fb',
                        tt='$tt',
                        ln='$ln',
                        yt='$yt'
                        WHERE id='1'";
                         
                        
                        $result = $db->conn->prepare($sql);
                        $value = $result->execute();
                        if ($value == true) {
                            echo "<span class='success'>Data updated Successfully.
                            </span>";
                        }else {
                            echo "<span class='error'>Data Not updated !</span>";
                        }
                    }
               
            }   
                
            
            
            ?>
                <div class="block">               
                 <form action="" method="post">
                  
                    <table class="form">
                    <?php 
                            $query = "SELECT * FROM db_social WHERE id='1'";
                            $res=$db->conn->prepare($query);
                            $res->execute();
                            $val = $res->fetchAll();

                            foreach($val as $key){
                     
                     
                     ?>					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value ="<?php echo $key['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tt" value ="<?php echo $key['tt'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value ="<?php echo $key['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Youtube</label>
                            </td>
                            <td>
                                <input type="text" name="yt" value ="<?php echo $key['yt'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                            <?php } ;?>
                    </form>
                </div>
            </div>
        </div>
      <?php include "inc/footer.php" ;?>