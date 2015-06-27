<?php
	if(!empty($_SESSION['message'])){		
		$message = $_SESSION['message'];
		echo "<div class='alert alert-success'>";
		echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
		echo "<h4>$message<h4/>";
		echo "</div>";
		unset($_SESSION['message']);
	}elseif(!empty($_SESSION['alert'])){
		$alert = $_SESSION['alert'];
		echo "<div class='alert-error alert-block'>";
		echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
		echo "<h4>$alert<h4/>";
		echo "</div>";	
		unset($_SESSION['alert']);
	}
	elseif(!empty($_SESSION['warning'])){
		$warning = $_SESSION['warning'];
		echo "<div class='alert alert-info'>";
		echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
		echo "<h4>$warning<h4/>";
		echo "</div>";	
		unset($_SESSION['warning']);
	}
?>