<?php
	if (empty($_REQUEST['kodedeleteadmin'])) {
	}else {
		$kode_user = $_REQUEST['kodedeleteadmin'];
	}
	$kode_penghapus = $_SESSION["kode_user"];  
	if($kode_penghapus == $kode_user){
		$_SESSION['alert'] = "Anda tidak diperkenankan menghapus account sendiri";
		echo "<script>document.location='?page=panel_admin'</script>";
	}else{
		$deleteloker = mysql_query("DELETE FROM `infodkpm`.`user` WHERE `user`.`kode_user` = '$kode_user'") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `user` WHERE `user`.`kode_user` = '$kode_user';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Delete $data[nama] Berhasil";
		echo "<script>document.location='?page=panel_admin'</script>";
	}
?>