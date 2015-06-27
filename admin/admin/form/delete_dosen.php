<?php
	if (empty($_REQUEST['kodedeletedosen'])) {
	}else {
		$kode_dosen = $_REQUEST['kodedeletedosen'];
	}	
		$deleteloker = mysql_query("DELETE FROM `infodkpm`.`dosen` WHERE `dosen`.`kode_dosen` = '$kode_dosen'") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `dosen` WHERE `dosen`.`kode_dosen` = '$kode_dosen';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Delete $data[nama] Berhasil";
		echo "<script>document.location='?page=panel_dosen'</script>";

?>