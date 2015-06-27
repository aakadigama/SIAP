<?php
if (empty($_REQUEST['page'])) {
    include "home.php";
} else {
    switch ($_REQUEST['page']) {
		
		case "reg_admin" : include "registrasi_admin.php";
            break;		
		case "reg_mahasiswa" : include "registrasi_dosen.php";
            break;
		case "reg_alumni" : include "registrasi_alumni.php";
            break;
		
		case "panel_beasiswa" : include "panel_beasiswa.php";
            break;
        case "view_beasiswa" : include "view_beasiswa.php";
            break;
		case "add_beasiswa" : include "add_beasiswa.php";
            break;
		case "edit_beasiswa" : include "edit_beasiswa.php";
            break;
			
		case "panel_loker" : include "panel_loker.php";
            break;
		case "view_loker" : include "view_loker.php";
            break;
		case "add_loker" : include "add_loker.php";
            break;
		case "edit_loker" : include "edit_loker.php";
            break;
			
		case "panel_admin" : include "panel_admin.php";
            break;
		case "view_admin" : include "view_admin.php";
            break;
		case "delete_admin" : include "delete_admin.php";
            break;	
		
		
		case "panel_dosen" : include "panel_dosen.php";
            break;
		case "add_dosen" : include "registrasi_dosen.php";
            break;
		case "view_dosen" : include "view_dosen.php";
            break;
		case "delete_dosen" : include "delete_dosen.php";
            break;
			
			
		case "delete_mahasiswa" : include "delete_mahasiswa.php";
            break;
			
		case "panel_alumni" : include "panel_alumni.php";
            break;
		case "delete_alumni" : include "delete_alumni.php";
            break;
		case "approve_alumni" : include "approve_alumni.php";
            break;
		
		case "edit_user" : include "edit_user.php";
            break;
		
		case "panel_event" : include "panel_event.php";
            break;
		case "add_event" : include "add_event.php";
            break;
		
			
		


	}        
}

?>