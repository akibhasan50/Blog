<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
			<?php 
				if(isset($_GET['delid'])){
					$delid = $_GET['delid'];
					
				$sql="DELETE  from db_page where id='$delid' ";
				$result=$db->conn->prepare($sql);
				$result->execute();
				if($result == true){

					echo "<span class='success'> page deleted successfully</span>";
				}else{
					echo "<span class='error'> page not deleted!!! </span>";
				}
                }
				
			?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>page Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
				<?php 
       
					    $sql="SELECT * from db_page order by id desc";
						$result=$db->conn->prepare($sql);
						$result->execute();
						$value = $result->fetchAll();
						$i=0;
						foreach($value as $key){
							$i++;
        
        		?>
							<td><?php echo $i;?></td>
							<td><?php echo $key['title'];?></td>
							<td><a href="page.php?pageid=<?php echo $key['id']?>">Edit</a> || <a onclick="return confirm('are you sure to delete?')" href="pagelist.php?delid=<?php echo $key['id']?>">Delete</a></td>
						
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