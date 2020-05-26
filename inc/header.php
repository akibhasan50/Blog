
<?php include "lib/database1.php" ;?>
<?php include "helpers/format.php" ;?>
<?php 
$db = new Database();
$fm = new Format();
define("TITLE","TravelFreak BD");
?>
<?php
 
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!--font awesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
    integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous" />
  <!--google font-->
  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet" />
  <!--jquery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
    integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
  <!--custom script-->
 <!--jquery-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
  <!--skick carsourel -->
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <!--custom script-->
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="css/style.css" />
  <?php 
    if(isset($_GET['pageid'])){
      $id =$_GET['pageid'];

        $sql = "SELECT * FROM db_page WHERE id='$id'";
        $res=$db->conn->prepare($sql);
        $res->execute();
        $val = $res->fetchAll();

        
        foreach($val as $key){ ?>
        <title><?php echo $key['title'];?>-<?php echo TITLE;?></title>
    <?php  }}elseif(isset($_GET['id'])){
       $pid =$_GET['id'];

        $sql = "SELECT * FROM db_post WHERE id='$pid'";
        $res=$db->conn->prepare($sql);
        $res->execute();
        $val = $res->fetchAll();

        
        foreach($val as $key){ ?>
        <title><?php echo $key['title'];?>-<?php echo TITLE;?></title>
    <?php  }}else{ ?>
     <title><?php echo $fm->title();?>-<?php echo TITLE;?></title>
  <?php  } ?>
  
</head>

<body>
  <header id="bar">
    <div class="logo">

    <?php 
        $query = "SELECT * FROM db_slogan WHERE id='1'";
        $res=$db->conn->prepare($query);
        $res->execute();
        $val = $res->fetchAll();
        foreach($val as $key){
    ?>
      <a href="index.php"><img src="admin/<?php echo $key['image'];?>" alt="Logo" /></a>
       <a href="index.php"><h2><?php echo $key['title'];?><span>BD</span></h2></a>
     
        <?php } ;?>
    </div>

    <i class="fas fa-bars menu-toggle"></i>

    <ul class="nav">
      <li>
        <a 
          <?php 
            $path=$_SERVER['SCRIPT_FILENAME'];
            $title = basename($path,'.php');
            if($title == 'index'){
              echo "id='active'";
            }
          
          ?>
        
        
        href="index.php">
          <i class="fas fa-home"></i>
          Home
        </a>
      </li>
      <li><a 
      <?php 
            $path=$_SERVER['SCRIPT_FILENAME'];
            $title = basename($path,'.php');
            if($title == 'contact'){
              echo "id='active'";
            }
          
          ?>
      
      
      href="contact.php">Contact</a></li>

     	<?php 
       
					  $sql="SELECT * from db_page order by id desc";
						$result=$db->conn->prepare($sql);
						$result->execute();
						$value = $result->fetchAll();
						foreach($value as $key){
        		?>
       <li><a 
              <?php 
                if(isset($_GET['pageid']) && $_GET['pageid'] == $key['id']){
                  echo "id='active'";
                }
              
              ?>
       
       href="page.php?pageid=<?php echo $key['id']?>"><?php echo $key['title'];?></a></li>
            <?php } ;?>
    </ul>
  </header>