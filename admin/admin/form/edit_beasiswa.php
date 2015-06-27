<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi</title>
</head>

<body>
<?php	
	$kode_beasiswa =$_GET['kodeedit'];
	$sql="SELECT * FROM `beasiswa` WHERE `kode_beasiswa` = '$kode_beasiswa'";
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
           		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                	<fieldset>
                    <legend>Form Beasiswa</legend>
                    	<div class="control-group">
                        	<label class="control-label" for="nama">Nama Beasiswa</label>                        
                        	<div class="controls">
                        		<input type="text" class="span6" id="typeahead"  data-provide="typeahead" name="nama" value="<?php echo $row['nama']; ?>" required="required" />
                        	</div>
                        </div>
                     
                     	<div class="control-group">
                        	<img class="imagebeasiswaedit" src="<?php echo $row['gambar']; ?>" width="150" height="175" />
                            <label class="control-label" for="gambar">Gambar</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" type="file" value="<?php echo $row['gambar']; ?>" name='Filegambar' id='Filegambar' size='30' />  
                            </div>
                        </div>    
                         
                     	<div class="control-group">
                            <label class="control-label" for="pemberi">Pemberi Beasiswa</label>
                            <div class="controls">
                                <input type="text" class="span6" id="typeahead" value="<?php echo $row['pemberi_beasiswa']; ?>"  data-provide="typeahead" name="pemberi" required="required" />      
                            </div>
                        </div>
                     
                     	<div class="control-group">
                            <label class="control-label" for="deskripsi">Deskripsi</label>
                            <div class="controls">
                                <textarea name="deskripsi" required="required" class="input-xlarge textarea" style="width: 550px; height: 200px"><?php echo $row['deskripsi']; ?></textarea>          
                            </div>
                        </div>
                     
                     	<div class="control-group">
                            <label class="control-label" for="tanggal_akhir">Tanggal Akhir</label>
                            <div class="controls">
                                <input type="date" name="tanggal_akhir" value="<?php echo $row['tanggal_akhir']; ?>" required="required" />                        	</div>
                        </div>       
                        <div class="form-actions">     
                        	 <a href="?page=panel_beasiswa"><button class='btn'><i class='icon-arrow-left'></i>Back</button></a>
                           	<button type="submit" class="btn btn-primary" name="submit">Save</button>                         
                        </div>
                      
                     </fieldset>
                  </form>

       
	
    <?php
		if (isset($_POST['submit'])) {
			
			$nama = strip_tags(trim($_POST['nama']));
			$pemberi = strip_tags(trim($_POST['pemberi']));
			$deskripsi = $_POST['deskripsi'];
			$tanggal_dibuat = date("Y-m-d");
			$tanggal_akhir = strip_tags(trim($_POST['tanggal_akhir']));
							
				$namafolder="../images/beasiswa/"; //folder tempat menyimpan file
				if ((empty($_FILES["Filegambar"]["tmp_name"])) || (!empty($_FILES["Filegambar"]["tmp_name"])))
					{
						$jenis_gambar=$_FILES['Filegambar']['type'];
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{           
							$gambar = $namafolder . $kode_beasiswa . basename($_FILES['Filegambar']['name']);       
							if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
															
								echo "Gambar berhasil dikirim ".$gambar;	
								$updatebeasiswa = "UPDATE `infodkpm`.`beasiswa` SET 
									`nama` = '$nama', 
									`gambar` = '$gambar', 
									`pemberi_beasiswa` = '$pemberi', 
									`deskripsi` = '$deskripsi', 
									`tanggal_akhir` = '$tanggal_akhir' 
								WHERE `beasiswa`.`kode_beasiswa` = $kode_beasiswa;";
								$query = mysql_query($updatebeasiswa) or die (mysql_error);
								echo "<script>document.location='?page=edit_beasiswa&kodeedit=$kode_beasiswa'</script>";
								$_SESSION['warning'] = "Update data beasiswa $nama berhasil";	
															
							}else {
								echo "Gambar gagal dikirim";
								$updatebeasiswa = "UPDATE `infodkpm`.`beasiswa` SET 
									`nama` = '$nama', 
									`gambar` = '$gambar_asli', 
									`pemberi_beasiswa` = '$pemberi', 
									`deskripsi` = '$deskripsi', 
									`tanggal_akhir` = '$tanggal_akhir' 
								WHERE `beasiswa`.`kode_beasiswa` = $kode_beasiswa;";
								$query = mysql_query($updatebeasiswa) or die (mysql_error);
								echo "<script>document.location='?page=edit_beasiswa&kodeedit=$kode_beasiswa'</script>";
								$_SESSION['warning'] = "Update data beasiswa $nama berhasil";	
							}
						}else{
							echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
							$updatebeasiswa = "UPDATE `infodkpm`.`beasiswa` SET 
									`nama` = '$nama', 
									`gambar` = '$gambar_asli', 
									`pemberi_beasiswa` = '$pemberi', 
									`deskripsi` = '$deskripsi', 
									`tanggal_akhir` = '$tanggal_akhir' 
								WHERE `beasiswa`.`kode_beasiswa` = $kode_beasiswa;";
								$query = mysql_query($updatebeasiswa) or die (mysql_error);		
								echo "<script>document.location='?page=edit_beasiswa&kodeedit=$kode_beasiswa'</script>";
								$_SESSION['warning'] = "Update data beasiswa $nama berhasil";							
						}
					}
					
		}			
		
	?>
</body>
</html>
