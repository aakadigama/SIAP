  <!-- BEGIN BREADCRUMBS -->
  <div class="row breadcrumbs margin-bottom-40">
    <div class="container">
      <div class="col-md-4 col-sm-4">
        <h1></h1>
      </div>
    </div>
  </div>
  <!-- END BREADCRUMBS --> 
  
  <!-- BEGIN CONTAINER -->
  <div class="container min-hight"> 
    
    <!-- ROW 1 -->
    <div class="row margin-bottom-40">
      <div class="col-md-12 "> 
        <!-- BLOCK START-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><center>Lowongan Pekerjaan / Pemagangan</center></h3>
          </div>
          <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Loker/Magang</label>
                  <input type="text" class="form-control" required="required" id="exampleInputEmail1" name="nama" placeholder="Input Name">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Nama Perusahaan</label>
                  <input type="text" class="form-control" required="required" name="nama_perusahaan" placeholder="Perusahaan">
                </div>
                <div class="form-group">
                  <label >Gambar</label>
                  <input type="file" name='Filegambar' required="required">
                  <p class="help-block">Gambar Perusahaan Pemberi Beasiswa</p>
                </div>
				 <div class="form-group">
                  <label >Lokasi</label>
                  <textarea required="required" name="lokasi" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label >Deskripsi</label>
                  <textarea required="required" name="deskripsi" class="form-control" rows="3"></textarea>
                </div>               
                <div class="form-group">
                  <label >Tanggal Akhir</label>
                  <input required="required" name="tanggal_akhir" type="date" >
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" name="submit" class="btn blue">Submit</button>
                <button type="button" class="btn default">Cancel</button>
              </div>
            </form>
          </div>
        </div>
        <!-- BLOCK END--> 
        
      </div>
    </div>
    <!-- END ROW 1 --> 
	<?php
		if (isset($_POST['submit'])) {
			
			$nama = strip_tags(trim($_POST['nama']));
			$nama_perusahaan = strip_tags(trim($_POST['nama_perusahaan']));
			$deskripsi = $_POST['deskripsi'];
			$tanggal_dibuat = date("Y-m-d");
			$tanggal_akhir = strip_tags(trim($_POST['tanggal_akhir']));					
			$detail_alamat = strip_tags(trim($_POST['alamat']));
			$lokasi = strip_tags(trim($_POST['lokasi']));	
				
			$selectm = mysql_query("SELECT max(`kode_loker`) FROM `lowongan_kerja`");
            $datam = mysql_fetch_array($selectm);            
            $numeric = $datam[0];
            $kode_loker = $numeric + 1;   			
			$kode_pembuat = $_SESSION["kode_alumni"];    
			
			$namafolder="images/loker/"; //folder tempat menyimpan file
			if (!empty($_FILES["Filegambar"]["tmp_name"]))
				{
					$jenis_gambar=$_FILES['Filegambar']['type'];
					if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
					{           
						$gambar = $namafolder . $kode_loker . basename($_FILES['Filegambar']['name']);       
						if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
							echo "Gambar berhasil dikirim ".$gambar;													
							$insertloker = "INSERT INTO `lowongan_kerja` (`kode_loker`, `nama`, `gambar`, `lokasi`, `nama_perusahaan`, `deskripsi`, `tanggal_dibuat`, `tanggal_akhir`, `kode_pembuat`, `status_loker`) VALUES 
							('$kode_loker', '$nama', '$gambar', '$lokasi', '$nama_perusahaan', '$deskripsi', CURRENT_DATE(), '$tanggal_akhir', '$kode_pembuat', 'checking');";									 
							$query = mysql_query($insertloker) or die (mysql_error);	
							/*
							$updatepost = "SELECT `post` FROM `user` WHERE `kode_user` = '$kode_pembuat'";
							tambahPost($updatepost,$kode_pembuat); */
							echo"<script>alert('Lowongan Pekerjaan Telah ditambahkan, Silahkan Tunggu proses verivikasi');</script>";
							echo"<script>document.location='?page=show_loker'</script>";
							
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
    

  
