<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit User</title>
<script>
function reloadPage()
  {
  location.reload();
  }
</script>
</head>

<body>
<?php
	$kode_user = $_SESSION["kode_user"];
	$sql="SELECT * FROM `user` WHERE `kode_user` = '$kode_user'";
	$res=mysql_query ($sql) or die(mysql_error());
	$row = mysql_fetch_array($res);
	$username_asli = $row['username'];
	$password_asli = $row['password'];
	$gambar_asli = $row['gambar'];	
?>
<form name="edit_user" action="" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="2" cellspacing="2">
	<tr>
    	<td><img src="<?php echo $row['gambar']; ?>" width="200" height="175" /></td>
        <td></td>
        <td><input type='file' name='Filegambar' id='Filegambar'/></td>
   </tr>
    <tr> 
        <td><label for="name">Nama</label></td>
        <td>:</td>
        <td><input type="text" name="nama" required="required" value="<?php echo $row['nama']; ?>" /></td>
    </tr>             
    <tr> 
         <td><label for="program_studi">Program Studi</label></td>
         <td>:</td>
    	 <td><select name="program_studi" required="required">
             	<option value="">---</option>
                <?php
					$findprodi=mysql_query("SELECT * FROM `prodi` WHERE `kode_prodi` != 0 ");
                        while ($rowJ=mysql_fetch_array($findprodi)){
							if($row['prodi']==$rowJ['kode_prodi']){
								echo "<option value='$rowJ[0]' selected=\"selected\">".ucwords($rowJ[1])."</option>";
							}else{
								echo "<option value='$rowJ[0]'>".ucwords($rowJ[1])."</option>";
							}
						}
                 ?>
                 </select></td>         
    </tr>
    <tr> 
        	<td><label for="phone">Nomor Handphone</label></td>
            <td>:</td>
            <td><input type="number" maxlength="12" name="phone" value="<?php echo $row['nomor_handphone']; ?>" required="required" /></td>      
    </tr> 
    <tr> 
        	<td><label for="email">Email</label></td>
            <td>:</td>
            <td><input type="email" name="email" required="required" value="<?php echo $row['email']; ?>" /></td>          
    </tr>                          
    <tr> 
        <td valign="top"><label for="alamat">Alamat</label></td>
        <td valign="top">:</td>
        <td><textarea name="alamat" cols="30" rows="6"  required="required"><?php echo $row['alamat']; ?></textarea></td>        
    </tr>
    <tr> 
        <td><label for="tahun_masuk">Tahun Masuk</label></td>
        <td>:</td>
        <td><input type="number" size="4" name="tahun_masuk" required="required" value="<?php echo $row['tahun_masuk']; ?>" /></td>              
    </tr>
    <?php
		$pekerjaan= $row['pekerjaan'];
    	if(  $row['status_user'] == "alumni"){
			echo "<tr>";
			echo "<td><label for='pekerjaan'>Pekerjaan</label></td>";
        	echo "<td>:</td>";
       		echo "<td><input type='text' name='pekerjaan' required='required' value='$pekerjaan' /></td>";	
			echo "</tr>";		
		}		
	?>
    <tr> 
        <td><label for="username">Username</label></td>
        <td>:</td>
        <td><input type="text" name="username" /></td>              
    </tr>
    <tr> 
        <td><label for="password">Password lama</label></td>
        <td>:</td>
        <td><input type="password" name="old_password" /></td>              
    </tr>
    <tr> 
        <td><label for="password">Password baru</label></td>
        <td>:</td>
        <td><input type="password" name="new_password" /></td>              
    </tr>
    <tr> 
        <td valign="top"><label for="status">Status</label></td>
        <td valign="top">:</td>
        <td>
        	
            <select id="status" name="status" required="required">
                <option value="">---</option>
                <?php
					$findstatus =mysql_query("SELECT status_user FROM `user` WHERE `kode_user` = '$kode_user'");
                        while ($rowJ=mysql_fetch_row($findstatus)){
							$status=$rowJ['0'];
							$statusstring = strcmp($status, 'alumni');							
							if($statusstring < "1"){
								echo "<option value='mahasiswa'>Mahasiswa</option>";
                   				echo "<option value='alumni' selected='selected'>Alumni</option>";                                						
							}else if($statusstring > "0") {
								echo "<option value='mahasiswa' selected='selected'>Mahasiswa</option>";
                   				echo "<option value='alumni'>Alumni</option>";                                          
							}					
						}						
                 ?>                
            </select>   
        </td>
    </tr>        
    <tr> 
        <td colspan="3" align="center"><button class="submit" type="submit" name="submit">Simpan</button></td>
    </tr>
</table>
</form>
</body>
<?php
	if (isset($_POST['submit'])) {
		
			$nama = strip_tags(trim($_POST['nama']));
			$program_studi = strip_tags(trim($_POST['program_studi']));
			$alamat = strip_tags(trim($_POST['alamat']));	
			$tahun_masuk = strip_tags(trim($_POST['tahun_masuk']));
			$phone = strip_tags(trim($_POST['phone']));
			$email = strip_tags(trim($_POST['email']));			
			
			$username = strip_tags(trim($_POST['username']));
			if($username == "")
			{
				$username = $username_asli;								
			}else{
				$username = $username;				
			}				
				
			$status = strip_tags(trim($_POST['status']));
			$password = strip_tags(trim($_POST['new_password']));			
			if($password == "")
			{
				$password = $password_asli;								
			}else{
				$password = md5($password);				
			}					
			$status = strip_tags(trim($_POST['status']));
			
			if($status == "mahasiswa"){				
				$namafolder="../images/user/"; //folder tempat menyimpan file
				if ((empty($_FILES["Filegambar"]["tmp_name"])) || (!empty($_FILES["Filegambar"]["tmp_name"])))
					{
						$jenis_gambar=$_FILES['Filegambar']['type'];
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{           
							$gambar = $namafolder . $kode_user . basename($_FILES['Filegambar']['name']);       
							if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
															
								echo "Gambar berhasil dikirim ".$gambar;	
								$updatemahasiswa = "UPDATE `infodkpm`.`user` 
								SET 
									`nama` = '$nama', 
									`gambar` = '$gambar', 
									`prodi` = '$program_studi', 
									`nomor_handphone` = '$phone', 
									`email` = '$email', 
									`alamat` = '$alamat', 
									`tahun_masuk` = '$tahun_masuk', 
									`username` = '$username', 
									`password` = '$password', 
									`status_user` = 'mahasiswa' 
								WHERE `user`.`kode_user` = '$kode_user';";
								$query = mysql_query($updatemahasiswa) or die (mysql_error);
															
							}else {
								echo "Gambar gagal dikirim";
								$updatemahasiswa = "UPDATE `infodkpm`.`user` 
								SET 
									`nama` = '$nama', 
									`gambar` = '$gambar_asli', 
									`prodi` = '$program_studi', 
									`nomor_handphone` = '$phone', 
									`email` = '$email', 
									`alamat` = '$alamat', 
									`tahun_masuk` = '$tahun_masuk', 
									`username` = '$username', 
									`password` = '$password', 
									`status_user` = 'mahasiswa' 
								WHERE `user`.`kode_user` = '$kode_user';";
								$query = mysql_query($updatemahasiswa) or die (mysql_error);	
							}
						}else{
							echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
							$updatemahasiswa = "UPDATE `infodkpm`.`user` 
								SET 
									`nama` = '$nama', 
									`gambar` = '$gambar_asli', 
									`prodi` = '$program_studi', 
									`nomor_handphone` = '$phone', 
									`email` = '$email', 
									`alamat` = '$alamat', 
									`tahun_masuk` = '$tahun_masuk', 
									`username` = '$username', 
									`password` = '$password', 
									`status_user` = 'mahasiswa' 
								WHERE `user`.`kode_user` = '$kode_user';";
								$query = mysql_query($updatemahasiswa) or die (mysql_error);								
						}
					}
					echo"<script>reloadPage();</script>";
					
					
			}else if ($status == "alumni"){				
				$pekerjaan = strip_tags(trim($_POST['pekerjaan']));	
								
				$namafolder="images/user/"; //folder tempat menyimpan file
				if ((empty($_FILES["Filegambar"]["tmp_name"])) || (!empty($_FILES["Filegambar"]["tmp_name"])))
					{
						$jenis_gambar=$_FILES['Filegambar']['type'];
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{           
							$gambar = $namafolder . $kode_user . basename($_FILES['Filegambar']['name']);       
							if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
															
								$updatealumni = "UPDATE `infodkpm`.`user` SET 
									`nama` = '$nama',  
									`gambar` = '$gambar', 
									`prodi` = '$program_studi', 
									`nomor_handphone` = '$phone', 
									`email` = '$email', 
									`alamat` = '$alamat', 
									`tahun_masuk` = '$tahun_masuk', 
									`username` = '$username', 
									`password` = '$password', 
									`status_user` = 'alumni', 
									`pekerjaan` = '$pekerjaan' 
								WHERE `user`.`kode_user` = '$kode_user';";
								$query = mysql_query($updatealumni) or die (mysql_error);
				
															
							}else {
								echo "Gambar gagal dikirim";
								$updatealumni = "UPDATE `infodkpm`.`user` SET 
									`nama` = '$nama',  
									`gambar` = '$gambar_asli', 
									`prodi` = '$program_studi', 
									`nomor_handphone` = '$phone', 
									`email` = '$email', 
									`alamat` = '$alamat', 
									`tahun_masuk` = '$tahun_masuk', 
									`username` = '$username', 
									`password` = '$password', 
									`status_user` = 'alumni', 
									`pekerjaan` = '$pekerjaan' 
								WHERE `user`.`kode_user` = '$kode_user';";
								$query = mysql_query($updatealumni) or die (mysql_error);
				
								
							}
						}else{
							echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
							$updatealumni = "UPDATE `infodkpm`.`user` SET 
									`nama` = '$nama',  
									`gambar` = '$gambar_asli', 
									`prodi` = '$program_studi', 
									`nomor_handphone` = '$phone', 
									`email` = '$email', 
									`alamat` = '$alamat', 
									`tahun_masuk` = '$tahun_masuk', 
									`username` = '$username', 
									`password` = '$password', 
									`status_user` = 'alumni', 
									`pekerjaan` = '$pekerjaan' 
								WHERE `user`.`kode_user` = '$kode_user';";
							$query = mysql_query($updatealumni) or die (mysql_error);				
							
						}
					}					
					echo"<script>reloadPage();</script>";
					
			}
			
		}
	
?>

</body>
</html>