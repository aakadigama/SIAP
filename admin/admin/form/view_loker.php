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
$kode_loker = $_GET['id'];
echo "<table border='0' cellpadding='0' cellspacing='0'>     
     	<input type='hidden' name='halaman' value='' /> ";
                                          
            $mysqlselect = "SELECT * FROM `lowongan_kerja` WHERE `lowongan_kerja`.`kode_loker` = '$kode_loker'";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){						
			echo "
	<tr>  	
    	<td>
			<table border='0'>
				<tr>
					<td colspan='2'>";
						$pembuat = showPenulis($data['kode_pembuat']);
				
						echo "
						 <div class='navbar navbar-inner block-header'>
            				<div class='muted pull-left'><h3>$data[nama]</h3></div>
							<div align='right'><br><br><br>Tanggal dibuat: ".$data['tanggal_dibuat'].". Penulis: ".$pembuat."</div>
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
					<td><p class='textbeasiswa'>Lokasi             :".$data['lokasi']."</p></td>
				</tr>	
				<tr>
					<td><p class='textbeasiswa'>Nama Perusahaan    :".$data['nama_perusahaan']."</p></td>
				</tr>	
				<tr>
					<td><p class='textbeasiswa'>Tanggal Akhir      :".$data['tanggal_akhir']."</p></td>					
				</tr>	
				<tr>
					<td><h5><p class='textbeasiswa'>Detail Loker</p><h5/></td>
				</tr>
				<tr>
					<td><p class='textbeasiswa'> ".$data['deskripsi']."</p></td>			
				</tr>
				</table>
			</td>	 
		</tr>";
		}
		echo "</table>";
?>
	</div>
    <a href="?page=panel_loker"><button class='btn'><i class='icon-arrow-left'></i>Back</button></a>
	<a href="?page=edit_loker&kodeedit=<?php echo $kode_loker; ?>">
    <button class="btn btn-primary"><i class="icon-pencil icon-white"></i>Edit</button></a>
    <div class="btn-group">
    	<button data-toggle="dropdown" class="btn btn-success dropdown-toggle">Action <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="?page=view_loker&kode=approve_loker-<?php echo $kode_loker;?>">Approve</a></li>
				<li><a href="?page=view_loker&kode=reject_loker-<?php echo $kode_loker;?>&id=<?php echo $kode_loker;?>">Reject</a></li>				
			</ul>
	</div><!-- /btn-group -->
</div>

</body>
</html>