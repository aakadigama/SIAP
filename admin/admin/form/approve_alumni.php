<?php
if (empty($_REQUEST['kodeapprovealm'])) {
	}else {
		$kode_user = $_REQUEST['kodeapprovealm'];
	}		
		$approvebeasiswa = mysql_query("UPDATE `infodkpm`.`user` SET `status` = 'approved' WHERE `user`.`kode_user` = '$kode_user';") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `user` WHERE `user`.`kode_user` = '$kode_user';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['message'] = "Approve $data[nama] Berhasil";
		echo "<script>document.location='?page=panel_alumni'</script>";
		?>