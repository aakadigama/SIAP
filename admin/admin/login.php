<?php
include "../connect.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action="" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        
        <input type="text" name="username" required="required" class="input-block-level" placeholder="Username">
        <input type="password" name="password" class="input-block-level" placeholder="Password">      
        
        <button class="btn btn-large btn-primary" type="submit" name="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
<?php
if (isset($_POST['submit'])) {
	$username = addslashes($_POST['username']);
	$password = md5($_POST['password']);
		
	$sql = mysql_query("SELECT * FROM `user` WHERE username='$username' AND password='$password'");
	$login_user=mysql_fetch_array($sql);
	$hasil=mysql_num_rows($sql);
	
	if ($hasil==1){
		$ambilsesi = mysql_query("SELECT * FROM `user` WHERE username='$username' && password='$password'");
		$res=mysql_fetch_array($ambilsesi);		
		session_start();
		session_name("login_system_user");
		$kode_user = $_SESSION["kode_user"] = $res['kode_user'];
		$nama = $_SESSION["nama"]=$res['nama'];
		
		echo"<script>alert('Selamat Datang $nama ');</script>";
		echo"<script>document.location='index.php'</script>";
		
	}else{
		echo"<script>alert('Anda Belum Terdaftar');</script>";
	}	
}
?>

</body>
</html>