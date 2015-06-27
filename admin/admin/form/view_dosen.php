<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="row-fluid">
    	<!-- block -->
        	<div class="block">
<?php
$kode_dosen = $_GET['id'];
echo "<table border='0' cellpadding='0' cellspacing='0'>     
     	<input type='hidden' name='halaman' value='' /> ";
                                          
            $mysqlselect = "SELECT * FROM `dosen` WHERE `dosen`.`kode_dosen` = '$kode_dosen'";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){						
			echo "
	<tr>  	
    	<td>
			<table border='0'>
				<tr>
					<td colspan='3'>
						 <div class='navbar navbar-inner block-header'>
            				<div class='muted pull-left'><h3>$data[nama]</h3></div>							
            			</div>					
					</td>					
				<tr>
					<td align='right' colspan='2'>	
					</td>
				</tr>				
				<tr>
					<td colspan='3'><br><img src='".$data['gambar']."' class='imagebeasiswa' height='200' width='250' /></td>
				</tr>
				<tr>
					<td><p class='textbeasiswa'>NIDN</td>
					<td>:</td>
					<td>".$data['kode_dosen']."</td>
				</tr>	
				<tr>
					<td><p class='textbeasiswa'>Nomor HP</td>
					<td>:</td>
					<td>".$data['nomor_handphone']."</td>
				</tr>	
				<tr>
					<td><p class='textbeasiswa'>Email</td>
					<td>:</td>
					<td>".$data['email']."</td>
				</tr>			
				<tr>
					<td><p class='textbeasiswa'>Alamat</td>
					<td>:</td>
					<td>".$data['alamat']."</td>
				</tr>	
				</table>
			</td>	 
		</tr>";
		}
		echo "</table>";
?>
	</div>
    <a href="?page=panel_dosen"><button class='btn'><i class='icon-arrow-left'></i>Back</button></a>	
</div>

</body>
</html>