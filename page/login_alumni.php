
  <!-- BEGIN CONTAINER -->
  <div class="container margin-bottom-40">
    <div class="row">
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 login-signup-page">
       <form name="login_user" action="" method="post">
          <h2>Login to your account</h2>
          <div class="input-group margin-bottom-20"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            <input type="text" class="form-control" placeholder="username" name="username">
          </div>
          <div class="input-group margin-bottom-20"> <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            <input type="password" class="form-control" placeholder="Password" name="password">
            <a href="#" class="login-signup-forgot-link">Forgot?</a> </div>
          <div class="row">
            <div class="col-md-6 col-sm-6">
              <div class="checkbox-list">
                <label class="checkbox">
                  <input type="checkbox">
                  Remember me</label>
              </div>
            </div>
            <div class="col-md-6 col-sm-6">
              <button type="submit" name="submita" class="btn theme-btn pull-right">Login</button>
            </div>
          </div>
          <hr>
          <div class="login-socio">
            <p class="text-muted">or login using:</p>
            <ul class="social-icons">
              <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
              <li><a class="twitter" data-original-title="Twitter" href="#"></a></li>
              <li><a class="googleplus" data-original-title="Goole Plus" href="#"></a></li>
              <li><a class="linkedin" data-original-title="Linkedin" href="#"></a></li>
            </ul>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- END CONTAINER --> 
<?php
if (isset($_POST['submita'])) {
	$username = addslashes($_POST['username']);
	$password = md5($_POST['password']);
		
	$sql = mysql_query("SELECT * FROM `alumni` WHERE username='$username' AND password='$password'");
	$login_user=mysql_fetch_array($sql);
	$hasil=mysql_num_rows($sql);
	
	if ($hasil==1){
		$ambilsesi = mysql_query("SELECT * FROM `alumni` WHERE username='$username' && password='$password'");
		$res=mysql_fetch_array($ambilsesi);
		
		//session_start();
		session_name("login");
		$kode_alumni = $_SESSION["kode_alumni"] = $res['kode_alumni'];
		$nama = $_SESSION["nama"]=$res['nama'];		
		
		echo"<script>alert('Selamat Datang $nama ');</script>";
		echo"<script>document.location='?page='</script>";
		
	}else{
		echo"<script>alert('Anda Belum Terdaftar');</script>";
		echo"<script>document.location='?page=login_alumni'</script>";
	}	
}
?>