<?php
	if (empty($_REQUEST['kodedeletemhs'])) {
	}else {
		$kode_user = $_REQUEST['kodedeletemhs'];
	}	
		$deleteloker = mysql_query("DELETE FROM `infodkpm`.`user` WHERE `user`.`kode_user` = '$kode_user'") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `user` WHERE `user`.`kode_user` = '$kode_user';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Delete $data[nama] Berhasil";
		echo "<script>document.location='?page=panel_mahasiswa'</script>";

?>