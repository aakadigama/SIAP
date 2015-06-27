 <!-- BEGIN BREADCRUMBS -->
  <div class="row breadcrumbs margin-bottom-40">
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <h1></h1>
      </div>
    </div>
  </div>
  <!-- END BREADCRUMBS --> 
    
    <!-- ROW 1 -->
    <div class="row margin-bottom-40">
      <div class="col-md-12 "> 
        <!-- BLOCK START-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Form Beasiswa</h3>
          </div>
          <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Beasiswa</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="nama" placeholder="Input Name">
                </div>
                <div class="form-group">
                  <label >Gambar</label>
                  <input type="file" name='Filegambar'>
                  <p class="help-block">Gambar Perusahaan Pemberi Beasiswa</p>
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Pemberi Beasiswa</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="pemberi" placeholder="Input Name">
                </div>
                <div class="form-group">
                  <label >Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label >Tanggal Akhir</label>
                  <input type="date" name="tanggal_akhir">
                </div>
			   </div>
              <div class="form-actions">
                <button type="submit" name="submit" class="btn blue">Submit</button>
                <button type="button" name="cancel" class="btn default">Cancel</button>
              </div>
            </form>
          </div>
        </div>
        <!-- BLOCK END--> 
        
    </div>
    <!-- END ROW 1 --> 
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
			$kode_pembuat = $_SESSION["kode_alumni"];    
			
			$namafolder="images/beasiswa/"; //folder tempat menyimpan file
			if (!empty($_FILES["Filegambar"]["tmp_name"]))
				{
					$jenis_gambar=$_FILES['Filegambar']['type'];
					if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
					{           
						$gambar = $namafolder . $kode_beasiswa . basename($_FILES['Filegambar']['name']);       
						if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
									
							$insertbeasiswa = "INSERT INTO `beasiswa` (`kode_beasiswa`, `nama`, `gambar`, `pemberi_beasiswa`,`deskripsi`, `tanggal_dibuat`, `tanggal_akhir`, `kode_pembuat`, `status_beasiswa`) 
							 VALUES ('$kode_beasiswa', '$nama', '$gambar', '$pemberi', '$deskripsi', '$tanggal_dibuat', '$tanggal_akhir', '$kode_pembuat', 'checking');";									 
							$query = mysql_query($insertbeasiswa) or die (mysql_error);	
														
								
							echo"<script>alert('Data Beasiswa telah ditambahkan, Silahkan tunggu proses verifikasi');</script>";									
							echo"<script>document.location='?page=show_beasiswa'</script>";		
						
							
						}else {
							echo "Gambar gagal dikirim";
						}
					}else{
						echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
					}
				}else{
					echo "Anda belum memilih gambar";
				}
				
		} else if (isset($_POST['cancel'])) {
		echo"<script>document.location='?page=add_beasiswa'</script>";			
		}			
		
	?>
    
