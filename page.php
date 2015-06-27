<?php
if (empty($_REQUEST['page'])) {
    include "page/home.php";
} else {
    switch ($_REQUEST['page']) {
		
		case "logout" : include "page/logout.php";
            break;
		
		case "tentang_kami" : include "page/tentang_kami.php";
            break;
		
		case "panel_alumni" : include "page/panel_alumni.php";
            break;		
		case "lihat_alumni" : include "page/lihat_alumni.php";
            break;		
		case "data_alumni" : include "page/data_alumni.php";
            break;			
		case "add_alumni" : include "page/add_alumni.php";
            break;			
		case "login_alumni" : include "page/login_alumni.php";
            break;
		case "edit_alumni" : include "page/edit_alumni.php";
            break;
		
		
		case "add_loker" : include "page/add_loker.php";
            break;
		case "show_loker" : include "page/show_loker.php";
            break;
		case "view_loker" : include "page/view_loker.php";
            break;
		
		case "add_beasiswa" : include "page/add_beasiswa.php";
            break;
		case "show_beasiswa" : include "page/show_beasiswa.php";
            break;
		case "view_beasiswa" : include "page/view_beasiswa.php";
            break;
		
		case "add_event" : include "page/add_event.php";
            break;
		case "show_event" : include "page/show_event.php";
            break;
		case "view_event" : include "page/view_event.php";
            break;
			
			
	}        
}

?>