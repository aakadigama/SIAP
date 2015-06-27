<?php
	if (empty($_REQUEST['kode'])) {
	}else {
		$kode_page = $_REQUEST['kode'];
		$explode = explode("-", $kode_page);
		$page = $explode[0];
		$kode = $explode[1];
				
    	switch ($page) {
			
			case "approve_beasiswa" :
				approveBeasiswa($kode);	
				break;
			case "reject_beasiswa" :
				rejectBeasiswa($kode);
				break;	
			case "delete_beasiswa" :
				deleteBeasiswa($kode);
				break;	
				
			case "approve_loker" :
				approveLoker($kode);	
				break;
			case "reject_loker" :
				rejectLoker($kode);
				break;	
			case "delete_loker" :
				deleteLoker($kode);
				break;	
			
			case "approve_mhs" :
				approveMahasiswa($kode);	
				break;				
			
		}
		
		
			
		
}
?>