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
      <h3 class="panel-title">Register Alumni</h3>
    </div>
    <div class="panel-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama</label>
          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" required="required" placeholder="Input Name">
        </div>
        <div class="form-group">
          <label >Gambar</label>
          <input type="file" required="required" name='Filegambar'>
          <p class="help-block">Profil Gambar Alumni</p>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">NIM</label>
          <input type="text" name="nim" class="form-control" id="exampleInputEmail1" required="required" placeholder="xxxxxxxxx">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Program Studi</label>
          </br>
          <select required="required" name="kode_prodi" class="validate[required] text-input" id="kode_prodi">
            <option value="" selected="selected">--</option>
            <?php
                            $result = mysql_query("SELECT * FROM `prodi`");
                            while ($data = mysql_fetch_array($result)) {
                            ?>
            <option value="<?php echo $data['kode_prodi'] ?>"><?php echo $data['program_studi'] ?></option>
            <?php
                            }
                            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" required="required" class="form-control" id="exampleInputEmail1" placeholder="Input Place">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          <input type="date" required="required" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" placeholder="17 Agustus 1990">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tahun Masuk</label>
          <input type="number" required="required" name="tahun_masuk" class="form-control" id="exampleInputEmail1" placeholder="Input Year">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Tahun Lulus</label>
          <input type="number" required="required" name="tahun_lulus" class="form-control" id="exampleInputEmail1" placeholder="Input Year">
        </div>
        <div class="form-group">
          <label >Email</label>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
            <input type="text" name="email" class="form-control" placeholder="Email Address">
          </div>
        </div>
        <div class="form-group">
          <label >Telp Rumah</label>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            <input type="number" required="required" name="telpon_rumah" class="form-control" placeholder="Input Number">
          </div>
        </div>
        <div class="form-group">
          <label >Handphone</label>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
            <input type="number" required="required" name="handphone" class="form-control" placeholder="Handphone Number">
          </div>
        </div>
        <div class="form-group">
          <label >Twitter</label>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
            <input type="text" name="twitter" required="required" class="form-control" placeholder="Input Twitter">
          </div>
        </div>
        <div class="form-group">
          <label >Facebook</label>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
            <input type="text" name="facebook" required="required" class="form-control" placeholder="Input Facebook">
          </div>
        </div>
        <div class="form-group">
          <label>Alamat</label>
          <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
            <input type="text" name="alamat" required="required" class="form-control" placeholder="Address">
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name="username" required="required" class="form-control" id="exampleInputEmail1" placeholder="Input Username">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Password</label>
          <input type="text" name="password" required="required" class="form-control" id="exampleInputEmail1" placeholder="Input Password">
        </div>
        <div class="form-actions">
          <button type="submit" name="add" class="btn blue">Submit</button>
          <button type="button" name="cancel" class="btn default">Cancel</button>
        </div>
      </form>
      </form>
    </div>
  </div>
  <!-- BLOCK END--> 
  
</div>
<!-- END ROW 1 -->
<?php
	if (isset($_POST['add'])) {
		$nim = strip_tags(trim($_POST['nim']));
		$nama = strip_tags(trim($_POST['nama']));
		$kode_prodi = strip_tags(trim($_POST['kode_prodi']));
		$tempat_lahir = strip_tags(trim($_POST['tempat_lahir']));
		$tanggal_lahir = strip_tags(trim($_POST['tanggal_lahir']));
		$tahun_masuk = strip_tags(trim($_POST['tahun_masuk']));
		$tahun_lulus = strip_tags(trim($_POST['tahun_lulus']));
		$email = strip_tags(trim($_POST['email']));
		$telpon_rumah = strip_tags(trim($_POST['telpon_rumah']));
		$handphone = strip_tags(trim($_POST['handphone']));
		$twitter = strip_tags(trim($_POST['twitter']));
		$facebook = strip_tags(trim($_POST['facebook']));
		$alamat = strip_tags(trim($_POST['alamat']));
		$username = strip_tags(trim($_POST['username']));
		$password = md5($_POST['password']);
			
		$namafolder="images/alumni/"; //folder tempat menyimpan file
		if (!empty($_FILES["Filegambar"]["tmp_name"]))
		{
			$jenis_gambar=$_FILES['Filegambar']['type'];
			if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
			{           
				$gambar = $namafolder . $kode_beasiswa . basename($_FILES['Filegambar']['name']);       
				if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {            
			
					$cek=mysql_query("SELECT * FROM alumni WHERE nim='$nim'");
					$jcek=mysql_num_rows($cek);
					if ($jcek=="0"){
						$cod = "INSERT INTO `alumni` (`kode_alumni`, `nim`, `kode_prodi`, `nama`, `gambar`, `Tempat_lahir`, `Tanggal_lahir`, `Tahun_Masuk`,`Tahun_lulus`, `Email`, `Telpon_rumah`, `Handphone`, `Twitter`, `Facebook`, `Alamat`, `username`, `password`) VALUES 
																	('', '$nim', '$kode_prodi', '$nama', '$gambar', '$tempat_lahir', '$tanggal_lahir', '$tahun_masuk','$tahun_lulus', '$email', '$telpon_rumah', '$handphone', '$twitter', '$facebook', '$alamat', '$username', '$password')";
						$query = mysql_query($cod) or die (mysql_error);		
						?>
						<script language="javascript">alert('Anda telah terdaftar , Silahkan Log in');
						document.location = 'index.php?page=login_alumni'</script>
						<?php
					}else{
						?>
						<script language="javascript">alert('Data Sudah Ada');
						document.location = 'index.php?page=add_alumni'</script>
						<?php
						}
					}else{
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
