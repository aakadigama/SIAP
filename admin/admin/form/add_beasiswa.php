<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http//www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registrasi</title>
</head>

<body>
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
                        		<input required="required" type="text" class="span6" id="typeahead"  data-provide="typeahead" name="nama" required="required" />
                        	</div>
                        </div>
                     
                     	<div class="control-group">
                            <label class="control-label" for="gambar">Gambar</label>
                            <div class="controls">
                                <input required="required" class="input-file uniform_on" id="fileInput" type="file" name='Filegambar' id='Filegambar' size='30' />  
                            </div>
                        </div>    
                         
                     	<div class="control-group">
                            <label class="control-label" for="pemberi">Pemberi Beasiswa</label>
                            <div class="controls">
                                <input type="text" required="required" class="span6" id="typeahead"  data-provide="typeahead" name="pemberi" required="required" />      
                            </div>
                        </div>
                     
                     	<div class="control-group">
                            <label class="control-label" for="deskripsi">Deskripsi</label>
                            <div class="controls">
                                <textarea name="deskripsi" required="required" required="required" class="input-xlarge textarea" placeholder="Enter text ..." style="width: 550px; height: 200px"></textarea>          
                            </div>
                        </div>
                     
                     	<div class="control-group">
                            <label class="control-label" for="tanggal_akhir">Tanggal Akhir</label>
                            <div class="controls">
                                <input type="date" required="required" class="input-xlarge datepicker" id="date01" name="tanggal_akhir" required="required" />                        	</div>
                        </div>       
                        <div class="form-actions">     
                           	<button type="submit" class="btn btn-primary" name="submit">Save</button>
                            <button type="reset" class="btn">Reset</button>
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
			
			$selectm = mysql_query("SELECT max(`kode_beasiswa`) FROM `beasiswa`");
            $datam = mysql_fetch_array($selectm);            
            $numeric = $datam[0];
            $kode_beasiswa = $numeric + 1;   			
			$kode_pembuat = $_SESSION["kode_user"];    
			
			$namafolder="../images/beasiswa/"; //folder tempat menyimpan file
			if (!empty($_FILES["Filegambar"]["tmp_name"]))
				{
					$jenis_gambar=$_FILES['Filegambar']['type'];
					if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
					{           
						$gambar = $namafolder . $kode_beasiswa . basename($_FILES['Filegambar']['name']);       
						if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
							echo "Gambar berhasil dikirim ".$gambar;
							
							$insertbeasiswa = "INSERT INTO `infodkpm`.`beasiswa` (`kode_beasiswa`, `nama`, `gambar`, `pemberi_beasiswa`,`deskripsi`, `tanggal_dibuat`, `tanggal_akhir`, `kode_pembuat`, `status_beasiswa`) 
							 VALUES ('$kode_beasiswa', '$nama', '$gambar', '$pemberi', '$deskripsi', 
							 		 '$tanggal_dibuat', '$tanggal_akhir', '$kode_pembuat', 'checking');";									 
							$query = mysql_query($insertbeasiswa) or die (mysql_error);	
														
							$updatepost = "SELECT `post` FROM `user` WHERE `kode_user` = '$kode_pembuat'";
							tambahPost($updatepost,$kode_pembuat);		
							
							echo "<script>document.location='?page=panel_beasiswa'</script>";
							$_SESSION['message'] = "Input data beasiswa $nama berhasil";									
							
						}else {
							echo "Gambar gagal dikirim";
						}
					}else{
						echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
					}
				}else{
					echo "Anda belum memilih gambar";
				}
				
		}			
		
	?>
</body>
</html>
