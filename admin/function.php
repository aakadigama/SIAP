<?php
	function tambahPost($updatepost,$kode_pembuat){
		$querypost = mysql_query($updatepost) or die(mysql_error());
		$row=mysql_fetch_array($querypost); 
		$jumlah_post = $row['post']+1;
		
		$update= "UPDATE `infodkpm`.`user` SET `post` = '$jumlah_post' WHERE `user`.`kode_user` = '$kode_pembuat';";
		$queryupdate = mysql_query($update) or die (mysql_error());
	}
	
	function selectAlamat($idprop,$idkota,$idkec){
		$selectprop = mysql_query("SELECT `lokasi_nama` FROM `inf_lokasi` WHERE `lokasi_propinsi` = $idprop AND `lokasi_kabupatenkota` = 0 AND `lokasi_kecamatan` = 0");
		$queryselectprop=mysql_fetch_array($selectprop); 
		$provinsi = $queryselectprop['lokasi_nama'];
		
		$selectkota = mysql_query("SELECT `lokasi_nama` FROM `inf_lokasi` WHERE `lokasi_propinsi` = '$idprop' AND `lokasi_kabupatenkota` = '$idkota' AND `lokasi_kecamatan` = 0");
		$queryselectkota=mysql_fetch_array($selectkota); 
		$kota = $queryselectkota['lokasi_nama'];
		
		$selectkec = mysql_query("SELECT `lokasi_nama` FROM `inf_lokasi` WHERE `lokasi_propinsi` = '$idprop' AND `lokasi_kabupatenkota` = '$idkota' AND `lokasi_kecamatan` = '$idkec'");
		$queryselectkec=mysql_fetch_array($selectkec); 
		$kec = $queryselectkec['lokasi_nama'];
		
		$alamat = $kec . " " . $kota . " " . $provinsi;
		return($alamat); 
	}
	
	function showPenulis($kode_pembuat){
		$selectuser = mysql_query("SELECT `user`.`nama` FROM `user` WHERE `kode_user` = '$kode_pembuat'");
		$queryselect=mysql_fetch_row($selectuser);
		return $queryselect[0]; 
		
	}
	
	function approveBeasiswa($kodebeasiswa){
		$approvebeasiswa = mysql_query("UPDATE `infodkpm`.`beasiswa` SET `status_beasiswa` = 'approved' WHERE `beasiswa`.`kode_beasiswa` = '$kodebeasiswa';") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `beasiswa` WHERE `beasiswa`.`kode_beasiswa` = '$kodebeasiswa';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['message'] = "Approve Beasiswa $data[nama] Berhasil";
	}
		
		function rejectBeasiswa($kodebeasiswa){
		$approvebeasiswa = mysql_query("UPDATE `infodkpm`.`beasiswa` SET `status_beasiswa` = 'rejected' WHERE `beasiswa`.`kode_beasiswa` = '$kodebeasiswa';") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `beasiswa` WHERE `beasiswa`.`kode_beasiswa` = '$kodebeasiswa';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Reject Beasiswa $data[nama] Berhasil";
		}
		
		function deleteBeasiswa($kodebeasiswa){
		$approvebeasiswa = mysql_query("DELETE FROM `infodkpm`.`beasiswa` WHERE `beasiswa`.`kode_beasiswa` = '$kodebeasiswa'") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `beasiswa` WHERE `beasiswa`.`kode_beasiswa` = '$kodebeasiswa';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Delete Beasiswa $data[nama] Berhasil";
		}
		
		function approveLoker($kodeloker){
		$approvebeasiswa = mysql_query("UPDATE `infodkpm`.`lowongan_kerja` SET `status_loker` = 'approved' WHERE `lowongan_kerja`.`kode_loker` = '$kodeloker';") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `lowongan_kerja` WHERE `lowongan_kerja`.`kode_loker` = '$kodeloker';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['message'] = "Approve $data[nama] Berhasil";
		}
		
		function rejectLoker($kodeloker){
		$rejectloker = mysql_query("UPDATE `infodkpm`.`lowongan_kerja` SET `status_loker` = 'rejected' WHERE `lowongan_kerja`.`kode_loker` = '$kodeloker';") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `lowongan_kerja` WHERE `lowongan_kerja`.`kode_loker` = '$kodeloker';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Reject $data[nama] Berhasil";
		}
		
		function deleteLoker($kodeloker){
		$deleteloker = mysql_query("DELETE FROM `infodkpm`.`lowongan_kerja` WHERE `lowongan_kerja`.`kode_loker` = '$kodeloker'") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `lowongan_kerja` WHERE `lowongan_kerja`.`kode_loker` = '$kodeloker';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['alert'] = "Delete $data[nama] Berhasil";
		}		
		
		function approveMahasiswa($kodeuser){
		$approvebeasiswa = mysql_query("UPDATE `infodkpm`.`user` SET `status` = 'approved' WHERE `user`.`kode_user` = '$kodeuser';") or die(mysql_error());
		$mysqlselect = mysql_query("SELECT `nama` FROM `user` WHERE `user`.`kode_user` = '$kodeuser';")  or die(mysql_error());
		$data=mysql_fetch_array($mysqlselect);		
		$_SESSION['message'] = "Approve $data[nama] Berhasil";
		}

		
		
	
	
	
	
?>