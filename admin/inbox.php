<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>    
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">  
			<?php 
					if(isset($_GET['seenid'])){
                    $seenid = $_GET['seenid'];
					
					
					$sql="UPDATE db_contact set status='1' where id='$seenid'";
					$result=$db->conn->prepare($sql);
					$result->execute();
						if($result == true){	
                            echo "<span class='success'> Message sent to seen box</span>";
                        }else{
                        echo "<span class='error'>message  not sent in seen box!!! </span>";
                    }
				}
			?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
					  	$sql="SELECT * FROM db_contact where status='0'";
						$value = $db->conn->prepare($sql);
						$value->execute();
						$reault = $value->fetchAll();
							$i=0;
							foreach ($reault as $data) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $data['name'] ;?></td>
							<td><?php echo $data['email'] ;?></td>
							<td><?php echo $data['body'] ;?></td>
							<td><?php echo $data['date'] ;?></td>
							<td><?php echo $data['status'] ;?></td>
							<td> <a href="viewmsg.php?viewid=<?php echo $data['id']?>">view</a>
							<?php
                                    if(session::get('userrole') == '0'){?>
							    ||<a href="replymsg.php?replyid=<?php echo $data['id']?>">Reply</a> || 
							     <a href="inbox.php?seenid=<?php echo $data['id']?>">seen</a></td>
							 <?php } ;?>
						</tr>
							<?php } ;?>
					</tbody>
				</table>
               </div>
            </div>


			<div class="box round first grid">
                <h2>Seen message</h2>
                <div class="block">

				<?php 
					if(isset($_GET['unseenid'])){
                    $unseenid = $_GET['unseenid'];
					
					
					$sql="UPDATE db_contact set status='0' where id='$unseenid'";
					$result=$db->conn->prepare($sql);
					$result->execute();
						if($result == true){	
                            echo "<span class='success'> Message sent to inboxbox</span>";
                        }else{
                        echo "<span class='error'>message  not sent to inbox!!! </span>";
                    }
				}
				
				?>
				<?php 
					if(isset($_GET['delid'])){
                    $delid = $_GET['delid'];
					
					
					$sql="DELETE from db_contact  where id='$delid'";
					$result=$db->conn->prepare($sql);
					$result->execute();
						if($result == true){	
                            echo "<span class='success'> Message deleted successfully</span>";
                        }else{
                        echo "<span class='error'>message  not deleted!!! </span>";
                    }
				}
				
				
				;?>      
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email No.</th>
							<th>Message</th>
							<th>Date</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
					  	$sql="SELECT * FROM db_contact where status='1'";
						$value = $db->conn->prepare($sql);
						$value->execute();
						$reault = $value->fetchAll();
							$i=0;
							foreach ($reault as $data) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $data['name'] ;?></td>
							<td><?php echo $data['email'] ;?></td>
							<td><?php echo $data['body'] ;?></td>
							<td><?php echo $data['date'] ;?></td>
							<td><?php echo $data['status'] ;?></td>
							
							<td>
							<?php
                                    if(session::get('userrole') == '0'){?>	
							<a onclick="return confirm('are you sure to delete???')" href="inbox.php?delid=<?php echo $data['id']?>">Delete</a>||
							<?php } ;?>
									<a href="inbox.php?unseenid=<?php echo $data['id']?>">unseen</a>
							
							</td>
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