<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
			<?php 
				if(isset($_GET['delcat'])){
					$delid = $_GET['delcat'];
					
				$sql="DELETE  from db_cat where id='$delid' ";
				$result=$db->conn->prepare($sql);
				$result->execute();
				if($result == true){

					echo "<span class='success'> Category deleted successfully</span>";
				}else{
					echo "<span class='error'> Category not deleted!!! </span>";
				}
                }
				
			?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
				<?php 
       
					$sql="SELECT * from db_cat order by id desc";
						$result=$db->conn->prepare($sql);
						$result->execute();
						$value = $result->fetchAll();
						$i=0;
						foreach($value as $key){
							$i++;
        
        		?>
							<td><?php echo $i;?></td>
							<td><?php echo $key['name'];?></td>
							<td><a href="editcat.php?catid=<?php echo $key['id']?>">Edit</a> || <a onclick="return confirm('are you sure to delete?')" href="catlist.php?delcat=<?php echo $key['id']?>">Delete</a></td>
						
						</tr>
						<?php } ;?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
       

    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>

<?php include "inc/footer.php" ;?>