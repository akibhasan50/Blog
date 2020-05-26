<div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <ul class="section menu">
                       <li><a class="menuitem">Site Option</a>
                            <ul class="submenu">
                                <li><a href="titleslogan.php">Title & Slogan</a></li>
                                <li><a href="social.php">Social Media</a></li>
                                <li><a href="copyright.php">Copyright</a></li>
                                <li><a href="footerinfo.php">Footer Info</a></li>
                                
                            </ul>
                        </li>
						
                         <li><a class="menuitem">Pages</a>
                            <ul class="submenu">
                                <?php
                                    if(session::get('userrole') == '0'){?>	
                                <li><a href="addpage.php">Add new page</a></li>
                                    <?php } ;?>
                                <li><a href="pagelist.php">page list</a></li>
                    <?php 
       
                            $sql="SELECT * from db_page order by id desc";
                            $result=$db->conn->prepare($sql);
                            $result->execute();
                            $value = $result->fetchAll();
                            
                            foreach($value as $key){

        		    ?>
                                <li><a href="page.php?pageid=<?php echo $key['id'];?>"><?php echo $key['title']?></a></li>
                                <?php } ;?>
                            </ul>
                            
                        </li>
                        <li><a class="menuitem">Category Option</a>
                            <ul class="submenu">
                                <li><a href="addcat.php">Add Category</a> </li>
                                <li><a href="catlist.php">Category List</a> </li>
                            </ul>
                        </li>
                        
                        <li><a class="menuitem">Post Option</a>
                            <ul class="submenu">
                                <li><a href="addpost.php">Add Post</a> </li>
                                <li><a href="postlist.php">Post List</a> </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>