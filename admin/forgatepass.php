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
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email =$_POST['password'];
                

			$sql="SELECT * FROM db_user WHERE email='$email' ";
            $value = $db->conn->prepare($sql);
            $value->execute();
            if($value->rowCount() > 0 ){
                $result = $value->fetch();
                $id= $result['id'];
				$username = $result['username'];
                $pas = rand(1000,99999);
                $password = "$username$pas";

				$upsql="UPDATE db_user SET password='$password' WHERE id='$id'";
				$result =$db->conn->prepare($upsql);
				$value =$result->execute();

				$to ="$email";
				$from="tonuakibhasan@gmail.com";
				$headers="From: $from\n";
				$headers .= 'MIME-Version: 1.0';
				$headers .= 'Content-type: text/html; charset=iso-8859-1';
				$message = "username is ".$username."password is ".$password; 
				$subject="your new password";
				$sendmail = mail($to,$subject,$message,$headers);

				if($sendmail){
					echo "<span style='color:green;font-size:18px;'>check your email</span>";
				}
            }else{
				 echo "<span style='color:red;font-size:18px;'> email not found</span>";
			}
		}

		?>
		<form action="forgatepass.php" method="post">
	
			<h1>password</h1>
			<div>
				<input type="text" placeholder="Email" required="1"  name="password"/>
			</div>
			
			<div>
				<input type="submit" name="submit" value="Send Mail" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Login</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">TravelFreak BD</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>