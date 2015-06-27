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
            <h3 class="panel-title">Form Event</h3>
          </div>
          <div class="panel-body">
           <form action="" method="post" enctype="multipart/form-data">
              <div class="form-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Event</label>
                  <input type="text" name="nama" required="required" class="form-control" id="exampleInputEmail1" placeholder="Input Name">
                </div>
                <div class="form-group">
                  <label >Gambar</label>
                  <input type="file" required="required" name='Filegambar'>
                  <p class="help-block">Gambar Perusahaan Pemberi Beasiswa</p>
                </div>
				 <div class="form-group">
                  <label >Alamat</label>
                  <textarea name="alamat" required="required" name="alamat" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label >Deskripsi</label>
                  <textarea name="deskripsi" required="required" class="form-control" rows="3"></textarea>
                </div>
				<div class="form-group">
                  <label >Tanggal Mulai</label><br>
                  <input name="tanggal_mulai" type="date" required="required">
                </div>
				<div class="form-group">
                  <label >Jam Mulai</label><br>
                  <input name="jam_mulai" type="time" required="required" >
                </div>
				<div class="form-group">
                  <label >Tanggal Selesai</label><br>
                  <input name="tanggal_selesai" type="date" required="required">
                </div>
				<div class="form-group">
                  <label >Jam Selesai</label><br>
                  <input name="jam_selesai" type="time" required="required">
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" name="submit" class="btn blue">Submit</button>
                <button type="submit" name="cancel" class="btn default">Cancel</button>
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
			$kode_pembuat = $_SESSION["kode_alumni"];    
			
			$namafolder="images/event/"; //folder tempat menyimpan file
			if (!empty($_FILES["Filegambar"]["tmp_name"]))
				{
					$jenis_gambar=$_FILES['Filegambar']['type'];
					if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
					{           
						$gambar = $namafolder . $kode_event . basename($_FILES['Filegambar']['name']);       
						if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {
							echo "Gambar berhasil dikirim ".$gambar;
							
							$insertevent = "INSERT INTO `event` (`kode_event`, `nama`, `gambar`, `lokasi`, `deskripsi`, `tanggal_dibuat`, `tanggal_mulai`, `jam_mulai`, `tanggal_selesai`, `jam_selesai`, `kode_pembuat`, `status_event`) VALUES ('$kode_event', '$nama', '$gambar', '$detail_alamat', '$deskripsi', '$tanggal_dibuat', '$tanggal_mulai', '$jam_mulai', '$tanggal_selesai', '$jam_selesai', '$kode_pembuat', 'checking');";									 
							$query = mysql_query($insertevent) or die (mysql_error);	
														
								
							echo"<script>alert('Data Event telah ditambahkan, Silahkan tunggu proses verifikasi');</script>";									
							echo"<script>document.location='?page=show_event'</script>";												
							
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
 