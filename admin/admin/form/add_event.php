<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http//www.w3.org/1999/xhtml">
	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    	<title>Add Loker</title>
		<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
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
           		<form class="add_beasiswa" action="" method="post" enctype="multipart/form-data">
                	<fieldset>
                    <legend>Form Event</legend>
                    <div class="control-group">	                     
                        <label for="nama">Nama Event</label>
                        <div class="controls">
                        <input type="text" name="nama" required="required" />
                    </div>
					
                 	<div class="control-group">
                        <label for="gambar">Gambar</label>
                        <div class="controls">
                        <input class="input-file uniform_on" id="fileInput" type="file" name='Filegambar' id='Filegambar' required="required" />
                        </div>    
                    </div>               
            
            		 <div class="control-group">
                        <label for="alamat">Alamat</label>
                        <div class="controls">
                        <textarea name="alamat" style="width: 350px; height: 100px" required="required"></textarea>
                        </div> 
                    </div>      
					             
             		<div class="control-group">
                        <label for="deskripsi">Deskripsi</label>
                  		<div class="controls">
                        <textarea class="input-xlarge textarea" style="width: 550px; height: 200px" name="deskripsi" required="required" ></textarea>
                        </div> 
                    </div>          
            
             		<div class="control-group">
                        <label for="tanggal_mulai">Tanggal Mulai</label>
                        <div class="controls">
                        <input type="date" name="tanggal_mulai" required="required" />
                        </div>  
                    </div>
					
					<div class="control-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <div class="controls">
                        <input type="time" name="jam_mulai" required="required" />
                        </div>  
                    </div>
					
					<div class="control-group">
                        <label for="tanggal_selesai">Tanggal Selesai</label>
                        <div class="controls">
                        <input type="date" name="tanggal_selesai" required="required" />
                        </div>  
                    </div>
					
					<div class="control-group">
                        <label for="jam_mulai">Jam Selesai</label>
                        <div class="controls">
                        <input type="time" name="jam_selesai" required="required" />
                        </div>  
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
			$deskripsi = $_POST['deskripsi'];
			$tanggal_dibuat = date("Y-m-d");
			$tanggal_mulai = strip_tags(trim($_POST['tanggal_mulai']));
			$tanggal_selesai = strip_tags(trim($_POST['tanggal_selesai']));
			$jam_mulai = strip_tags(trim($_POST['jam_mulai']));
			$jam_selesai = strip_tags(trim($_POST['jam_selesai']));			
			$detail_alamat = strip_tags(trim($_POST['alamat']));	
				
			$selectm = mysql_query("SELECT max(`kode_event`) FROM `event`");
            $datam = mysql_fetch_array($selectm);            
            $numeric = $datam[0];
            $kode_event = $numeric + 1;   			
			$kode_pembuat = $_SESSION["kode_user"];    
			
			$namafolder="../images/event/"; //folder tempat menyimpan file
			if (!empty($_FILES["Filegambar"]["tmp_name"]))
				{
					$jenis_gambar=$_FILES['Filegambar']['type'];
					if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
					{           
						$gambar = $namafolder . $kode_event . basename($_FILES['Filegambar']['name']);       
						if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
							echo "Gambar berhasil dikirim ".$gambar;
							
							$insertevent = "INSERT INTO `infodkpm`.`event` (`kode_event`, `nama`, `gambar`, `lokasi`, `deskripsi`, `tanggal_dibuat`, `tanggal_mulai`, `jam_mulai`, `tanggal_selesai`, `jam_selesai`, `kode_pembuat`, `status_event`) VALUES ('$kode_event', '$nama', '$gambar', '$detail_alamat', '$deskripsi', '$tanggal_dibuat', '$tanggal_mulai', '$jam_mulai', '$tanggal_selesai', '$jam_selesai', '$kode_pembuat', 'approved');";									 
							$query = mysql_query($insertevent) or die (mysql_error);	
														
								
							echo"<script>alert('Data Event telah ditambahkan');</script>";									
							echo"<script>document.location='?page=panel_event'</script>";												
							
						}else {
							echo "Gambar gagal dikirim";
						}
					}else{
						echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
					}
				}else{
					echo "Anda belum memilih gambar";
				}				
				
		}else if (isset($_POST['cancel'])) {
			echo"<script>document.location='?page=add_event'</script>";					
		}			
		
	?>
	</body>
</html>