<?php
  session_start();

  if(isset($_SESSION['username'])){

    header("Location:index.php");
  }

  function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  if (isset($_POST["submit"])){
      $user_name = test_input($_POST['user_name']);
      $pass_word = test_input($_POST['pass_word']);
      

      $valid    = true;

      if(($user_name=='')OR($pass_word=='')){
        $valid= false;
      }else{
        $valid= true;
      }

      //cek apakah masukan valid (diisi)
      if($valid){
          require_once 'connect.php';

          $conn = mysqli_connect($hostname,  $username, $password, $dbname);

          if (!$conn) {
              die("Connection failed: " . mysqli_connect_error());
          }
          //die("x".$user_name."x   ".$pass_word);
          $pass_word = md5($pass_word);
          $query = mysqli_query($conn, "SELECT * from tb_admin WHERE username='$user_name' AND password='$pass_word' ");


          //cek apakah query berhasil
          if (!$query) {
              die("QUERY failed: " . mysqli_error($conn));
          }else{

            //jika query berhasil
            if(mysqli_num_rows($query)==1){
              $row= mysqli_fetch_array($query);

              $_SESSION['username'] = $row['username'];
              $_SESSION['name'] = $row['name'];

              header("Location: index.php");
              die();
            }else{
              $login_error = 'Username dan Password tidak terdaftar';
            }
          }

      }else{

          $login_error = 'Username dan Password harus diisi';
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>PGAS CORE</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	     
		      <form class="form-login" method="POST" action="<?php echo  $_SERVER['PHP_SELF'];?>">
		        <h2 class="form-login-heading">sign in now</h2>
            <?php
              if(isset($login_error)){
                echo '<div class="alert alert-danger"><b>Gagal Login!</b> '.$login_error.'.</div>';
              }

            ?>  
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Username" name="user_name" autofocus />
		            <br>
		            <input type="password" class="form-control" placeholder="Password" name="pass_word" />
		            <label class="checkbox">
		                
		            </label>
		            <button class="btn btn-theme btn-block" type="submit" name="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		            <hr>
		        </div>
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("assets/img/test.png", {speed: 500});
    </script>


  </body>
</html>
