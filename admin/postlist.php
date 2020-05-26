<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
				<?php 
				 if(isset($_GET['delid'])){
					$delid =$_GET['delid'];

					
				$query = "SELECT * FROM db_post WHERE id='$delid'";
				$value = $db->conn->prepare($query);
				$value->execute();
				$data = $value->fetch();

				if($value){
					$delimg = $data['image'];
					unlink($delimg);
				}

					$sql = "DELETE FROM db_post WHERE id='$delid'";
                    $res=$db->conn->prepare($sql);
					$valu = $res->execute();
					
					if($valu == true){
                        echo "<span class='success'>post deleted successfully</span>";
                    }else{
                        echo "<span class='error'>post not deleted!!! </span>";
                    }
            }
				   
				
				?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th  width ="5%">NO</th>
							<th  width ="8%">Category</th>
							<th  width ="15%">Title</th>
							<th  width ="20%">Body</th>
							<th  width ="7%">Image</th>
							<th  width ="10%">Authore</th>
							<th  width ="10%">Tags</th>
							<th  width ="10%">Date</th>
							<th  width ="15%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					$sql ="SELECT db_post.*,db_cat.name from db_post
					inner join db_cat
					on db_post.cat = db_cat.id
					ORDER BY db_post.title DESC";
					
					$data = $db->conn->prepare($sql);
					$data->execute();
					$value = $data->fetchAll();
					$i = 0;
					foreach ($value as $key ) {
						$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $key['cat'] ;?></td>
							<td><?php echo $key['title'] ;?></td>
							<td ><?php echo $fm->textShorten($key['body'],50) ;?></td>
							<td><img src="<?php echo $key['image'] ;?>"  height=40px, width=40px></td>
							
							<td > <?php echo $key['authore'] ;?></td>
							<td > <?php echo $key['tags'] ;?></td>
							<td><?php echo  $fm->dateFormat($key['date']) ;?></td>
							<td>
							<a href="viewpost.php?postid=<?php echo $key['id'];?>">view</a>
							  <?php
                                    if(session::get('userrole') == '0' || session::get('userrole') == '2' ){?>
							 ||<a href="editpost.php?postid=<?php echo $key['id'];?>">Edit</a>
							 <?php } ;?>
							 <?php
                                    if(session::get('userrole') == '0' ){?>
							|| <a onclick="return confirm('Are you sure you want to delete this item?')" href="postlist?delid=<?php echo $key['id'];?>">Delete</a></td>
							 <?php } ;?>	
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
