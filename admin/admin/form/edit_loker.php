<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http//www.w3.org/1999/xhtml">
<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>Add Loker</title>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
</head>
<body>
<?php	
	$kode_loker =$_GET['kodeedit'];
	$sql="SELECT * FROM `infodkpm`.`lowongan_kerja` WHERE `kode_loker` = '$kode_loker'";
	$res=mysql_query ($sql) or die(mysql_error());
	$row = mysql_fetch_array($res);
	$gambar_asli=$row['gambar'];
?>
    <div class="row-fluid">
                        <!-- block -->
    	<div class="block">
        	<div class="navbar navbar-inner block-header">
            	<div class="muted pull-left"></div>
            </div>
            <div class="block-content collapse in">
            	<div class="span12">
           		<form class="edit_loker" action="" method="post" enctype="multipart/form-data">
                	<fieldset>
                    <legend>Form Lowongan Kerja</legend>
                    <div class="control-group">	                     
                        <label for="nama">Nama Loker/Magang</label>
                        <div class="controls">
                        <input type="text" name="nama" class="span6" id="typeahead" required="required" value="<?php echo $row['nama']; ?>" />
                    </div>
                 
                 	<div class="control-group">
                    	<img class="imagebeasiswaedit" src="<?php echo $row['gambar']; ?>" width="150" height="175" />
                        <label for="gambar">Gambar</label>
                        <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" value="<?php echo $row['gambar']; ?>" type="file" name='Filegambar' id='Filegambar' />
                        </div>    
                    </div>                   
                
            
            		 <div class="control-group">
                        <label for="alamat">Alamat</label>
                        <div class="controls">
                        <textarea name="alamat" style="width: 350px; height: 100px" required="required"><?php echo $row['alamat']; ?></textarea>
                        </div> 
                    </div>      
                
             		<div class="control-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <div class="controls">
                        <input type="text" name="nama_perusahaan" class="span6" id="typeahead" value="<?php echo $row['nama_perusahaan']; ?>" required="required" />
                        </div>       
                    </div>
             
             		<div class="control-group">
                        <label for="deskripsi">Deskripsi</label>
                  		<div class="controls">
                        <textarea class="input-xlarge textarea" style="width: 550px; height: 200px" name="deskripsi" required="required" ><?php echo $row['deskripsi']; ?>"</textarea>
                        </div> 
                    </div>          
            
             		<div class="control-group">
                        <label for="tanggal_akhir">Tanggal Akhir</label>
                        <div class="controls">
                        <input type="date" name="tanggal_akhir" required="required" value="<?php echo $row['tanggal_akhir']; ?>"/>
                        </div>  
                    </div>
                    <div class="form-actions">     
                    		 <a href="?page=panel_loker"><button class='btn'><i class='icon-arrow-left'></i>Back</button></a>
                           	<button type="submit" class="btn btn-primary" name="submit">Save</button>
                                                        
                    </div>
                    
                    </fieldset>
                  </form>
    <?php
		if (isset($_POST['submit'])) {
			
			$nama = strip_tags(trim($_POST['nama']));
			$nama_perusahaan = strip_tags(trim($_POST['nama_perusahaan']));
			$deskripsi = $_POST['deskripsi'];
			$tanggal_dibuat = date("Y-m-d");
			$tanggal_akhir = strip_tags(trim($_POST['tanggal_akhir']));			
						
			$detail_alamat = strip_tags(trim($_POST['alamat']));					
			
			$kode_pembuat = $_SESSION["kode_user"];    
			
			$namafolder="../images/loker/"; //folder tempat menyimpan file
				if ((empty($_FILES["Filegambar"]["tmp_name"])) || (!empty($_FILES["Filegambar"]["tmp_name"])))
					{
						$jenis_gambar=$_FILES['Filegambar']['type'];
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{           
							$gambar = $namafolder . $kode_loker . basename($_FILES['Filegambar']['name']);       
							if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
															
								echo "Gambar berhasil dikirim ".$gambar;	
								$updateloker = "UPDATE `infodkpm`.`lowongan_kerja` SET 
								`nama` = '$nama', 
								`gambar` = '$gambar', 
								`lokasi` = '$detail_alamat', 
								`nama_perusahaan` = '$nama_perusahaan', 
								`deskripsi` = '$deskripsi', 
								`tanggal_akhir` = '$tanggal_akhir'
								 WHERE `lowongan_kerja`.`kode_loker` = $kode_loker;";
								$query = mysql_query($updateloker) or die (mysql_error);
								
															
							}else {
								echo "Gambar gagal dikirim";
								$updateloker = "UPDATE `infodkpm`.`lowongan_kerja` SET 
								`nama` = '$nama', 
								`gambar` = '$gambar_asli', 
								`lokasi` = '$detail_alamat', 
								`nama_perusahaan` = '$nama_perusahaan', 
								`deskripsi` = '$deskripsi', 
								`tanggal_akhir` = '$tanggal_akhir'
								 WHERE `lowongan_kerja`.`kode_loker` = $kode_loker;";
								$query = mysql_query($updateloker) or die (mysql_error);
							}
						}else{
							echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
							$updateloker = "UPDATE `infodkpm`.`lowongan_kerja` SET 
								`nama` = '$nama', 
								`gambar` = '$gambar_asli', 
								`lokasi` = '$detail_alamat', 
								`nama_perusahaan` = '$nama_perusahaan', 
								`deskripsi` = '$deskripsi', 
								`tanggal_akhir` = '$tanggal_akhir'
								 WHERE `lowongan_kerja`.`kode_loker` = $kode_loker;";
							$query = mysql_query($updateloker) or die (mysql_error);
						}
					}
					echo "<script>document.location='?page=edit_loker&kodeedit=$kode_loker'</script>";
					$_SESSION['warning'] = "Update data Lowongan Kerja $nama berhasil";						
		}			
	?>
	</body>
</html>