<?php
include "connect.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<h2>LOGIN USER</h2>

<form name="login_user" action="" method="post">
	<table align="center" cellpadding="4" cellspacing="8">
    	<tr> 
      		<td><label for="username">Username</label></td>
            <td>:</td>
            <td><input type="text" name="username" required="required" /></td>
    	</tr> 
    	<tr> 
        	<td><label for="password">Password</label></td>
            <td>:</td>
            <td><input type="password" name="password" required="required" /></td>      
        </tr> 
        <tr> 
        	<td colspan="3" align="center"><button class="submit" type="submit" name="submita">Kirim</button></td>
       </tr>
</table>
</form>
<?php
if (isset($_POST['submita'])) {
	$username = addslashes($_POST['username']);
	$password = md5($_POST['password']);
		
	$sql = mysql_query("SELECT * FROM `user` WHERE username='$username' AND password='$password' AND (`status_user`='mahasiswa' || `status_user`='alumni')");
	$login_user=mysql_fetch_array($sql);
	$hasil=mysql_num_rows($sql);
	
	if ($hasil==1){
		$ambilsesi = mysql_query("SELECT * FROM `user` WHERE username='$username' && password='$password'");
		$res=mysql_fetch_array($ambilsesi);
		
		
		session_name("login");
		$kode_user = $_SESSION["kode_user"] = $res['kode_user'];
		$nama = $_SESSION["nama"]=$res['nama'];
		$_SESSION["status_user"]=$res['status_user'];
		
		echo"<script>alert('Selamat Datang $nama ');</script>";
		echo"<script>document.location='?page='</script>";
		
	}else{
		echo"<script>alert('Anda Belum Terdaftar');</script>";
		echo"<script>document.location='?page='</script>";
	}	
}
?>

</body>
</html>