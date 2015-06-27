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
           		<form class="registrasi_mahasiswa" action="" method="post" enctype="multipart/form-data">
                	<fieldset>
                    <legend>Form Registrasi Dosen</legend>               
    	 			
                    <div class="control-group">
                        <label for="name">NIDN</label>
                        <div class="controls">
                        <input type="text" name="nidn" class="span6" id="typeahead" placeholder="Nomor Induk Dosen" required="required" />
                        </div>
                     </div> 
					 
                    <div class="control-group">
                        <label for="name">Nama</label>
                        <div class="controls">
                        <input type="text" name="nama" class="span6" id="typeahead" placeholder="Nama Lengkap" required="required" />
                        </div>
                     </div> 
                
                	<div class="control-group">
                            <label class="control-label" for="gambar">Gambar</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="fileInput" type="file" name='Filegambar' id='Filegambar' size='30' />  
                            </div>
                        </div>        
                         
                 	<div class="control-group">
                        <label for="program_studi">Program Studi</label>
                        <div class="controls">
                        <select name="program_studi" required="required">
                        <option value="">---</option>
                        <?php
                            $result = mysql_query("SELECT * FROM `prodi` WHERE kode_prodi != 0");
                            while ($data = mysql_fetch_array($result)) {
                            ?>
                                <option value="<?php echo $data['kode_prodi'] ?>"><?php echo $data['program_studi'] ?></option>
                            <?php
                            }
                        ?>
                        </select>         
                        </div>
                     </div> 
                
                 	<div class="control-group">
                        <label for="phone">Nomor Handphone</label>
                        <div class="controls">
                        <input type="number" maxlength="12" class="span6" id="typeahead" name="phone" placeholder="081XXX" required="required" /> 
                        </div>
                    </div>      
                 
                 	<div class="control-group">
                        <label for="email">Email</label>
                        <div class="controls">
                        <input type="email" name="email" class="span6" id="typeahead" placeholder="nama@email.com" required="required" />                        </div>
                    </div>                  
                    
                
                 	<div class="control-group">
                            <label class="control-label"  for="alamat">Alamat</label>
                            <div class="controls">
                                <textarea name="alamat" required="required" style="width: 350px; height: 100px"></textarea>          
                            </div>
                     </div>                 	
                
                 	<div class="control-group">
                        <label for="username" >Username</label>
                        <div class="controls">
                        <input type="text" class="span6" id="typeahead" name="username" required="required" />
                        </div>
                    </div>               
                    
                 	<div class="control-group">
                        <label for="password" >Password</label>
                        <div class="controls">
                        <input type="password" class="span6" id="typeahead" name="password" required="required" />  
                        </div>
                    </div>    
                    
                    <div class="form-actions">     
                           	<button type="submit" class="btn btn-primary" name="submit">Save</button>
                            <button type="reset" class="btn">Reset</button>
                        </div>
                      
                     </fieldset>
                  </form> 
       
	</table>
    <?php
		if (isset($_POST['submit'])) {		
			$nidn = strip_tags(trim($_POST['nidn']));
			$nama = strip_tags(trim($_POST['nama']));
			$program_studi = strip_tags(trim($_POST['program_studi']));
			$phone = strip_tags(trim($_POST['phone']));
			$email = strip_tags(trim($_POST['email']));						
			$alamat = strip_tags(trim($_POST['alamat']));			
			$username = strip_tags(trim($_POST['username']));
			$password = strip_tags(trim($_POST['password']));			
							
			$namafolder="../images/dosen/"; //folder tempat menyimpan file
			if (!empty($_FILES["Filegambar"]["tmp_name"]))
					{
						$jenis_gambar=$_FILES['Filegambar']['type'];
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{           
							$gambar = $namafolder . $nama . basename($_FILES['Filegambar']['name']);       
							if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
								echo "Gambar berhasil dikirim ".$gambar;
								$insertmahasiswa = "INSERT INTO `infodkpm`.`dosen` (`kode_dosen`, `nama`, `gambar`, `prodi`, `nomor_handphone`, `email`, `alamat`, `username`, `password`) VALUES 
								($nidn, '$nama', '$gambar', '$prodi', '$phone', '$email', '$alamat', '$username', '$password');";
								$query = mysql_query($insertmahasiswa) or die (mysql_error);
								?>
								<script language="javascript">alert('Data telah ditambahkan');
								document.location = 'index.php?page=panel_dosen'</script>
								<?php
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
