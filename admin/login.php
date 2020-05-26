<?php 
	include "../lib/session.php";
	session::init();
?>

<?php include "../lib/database1.php" ;?>
<?php include "../helpers/format.php" ;?>
<?php 
$db = new Database();
$fm = new Format();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
			<?php 
			if($_SERVER['REQUEST_METHOD'] =="POST"){
				$username= $fm->validate($_POST['username']);
				$password= $fm->validate($_POST['password']);
			
			if($username =="" || $password == ""){
				echo "<span style='color:red;font-size:18px;'>field must not be empty!!! </span>";
			}else{
				$sql = "SELECT * from db_user where username='$username' AND password='$password'";
				$data = $db->conn->prepare($sql);
				$data->execute();

				if($data->rowCount() > 0){
						
				$key =$data->fetch();
				session::set("login",true);
				session::set("username",$key['username']);
				session::set("userid",$key['id']);
				session::set("userrole",$key['role']);
				 
				header("Location:index.php");
				}else{
					echo "<span style='color:red;font-size:18px;'>data not found</span>";
				}
			}
			
		
		}
		
		?>
		<form action="login.php" method="post">
	
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username"  name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" name="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgatepass.php">Forgate password??</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">TravelFreak BD</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>