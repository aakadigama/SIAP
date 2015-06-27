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
$kode_user = $_GET['id'];
echo "<table border='0' cellpadding='0' cellspacing='0'>     
     	<input type='hidden' name='halaman' value='' /> ";
                                          
            $mysqlselect = "SELECT * FROM `user` WHERE `user`.`kode_user` = '$kode_user'";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){						
			echo "
	<tr>  	
    	<td>
			<table border='0'>
				<tr>
					<td colspan='2'>
						 <div class='navbar navbar-inner block-header'>
            				<div class='muted pull-left'><h3>$data[nama]</h3></div>							
            			</div>					
					</td>					
				<tr>
					<td align='right' colspan='2'>	
					</td>
				</tr>				
				<tr>
					<td><br><img src='../".$data['gambar']."' class='imagebeasiswa' height='200' width='250' /></td>
				</tr>
				<tr>
					<td><p class='textbeasiswa'>Nomor HP           :".$data['nomor_handphone']."</p></td>
				</tr>	
				<tr>
					<td><p class='textbeasiswa'>Email              :".$data['email']."</p></td>
				</tr>				
				<tr>
					<td><p class='textbeasiswa'>Alamat            :".$data['alamat']."</p></td>					
				</tr>";
				$selectdeskripsi = mysql_query("SELECT `deskripsi` FROM `organisasi` WHERE `kode_organisasi`='$kode_user'");
				$data2=mysql_fetch_array($selectdeskripsi);
				
				echo "
				<tr>
					<td><h5><p class='textbeasiswa'>Detail Beasiswa</p><h5/></td>
				</tr>
				<tr>
					<td><p class='textbeasiswa'> ".$data2['deskripsi']."</p></td>			
				</tr>
				</table>
			</td>	 
		</tr>";
		}
		echo "</table>";
?>
	</div>
    <a href="?page=panel_organisasi"><button class='btn'><i class='icon-arrow-left'></i>Back</button></a>
    <a href="?page=edit_organisasi&kodeedit=<?php echo $kode_user; ?>">
    <button class="btn btn-primary"><i class="icon-pencil icon-white"></i>Edit</button></a>	
</div>

</body>
</html>