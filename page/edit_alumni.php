<?php
	$kode_alumni = $_SESSION["kode_alumni"];
	$sql="SELECT * FROM `alumni` WHERE `kode_alumni` = '$kode_alumni'";
	$res=mysql_query ($sql) or die(mysql_error());
	$row = mysql_fetch_array($res);
	$username_asli = $row['username'];
	$password_asli = $row['password'];
	$gambar_asli = $row['gambar'];	
?>
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
            <h3 class="panel-title">Edit Data Alumni</h3>
          </div>
          <div class="panel-body">
            
			<form action="" method="post" enctype="multipart/form-data">
              <div class="form-body">
				<div class="form-group">
					<img src="<?php echo $row['gambar']; ?>" width="200" height="175" /><br>
					 <label for="exampleInputEmail1">Ganti Gambar</label> <input type='file' name='Filegambar' id='Filegambar'/>
				</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" name="nama" required="required" value="<?php echo $row['nama']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Name">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">NIM</label>
                  <input type="text" name="nim" required="required" value="<?php echo $row['nim']; ?>"class="form-control" id="exampleInputEmail1" placeholder="112103001">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Program Studi</label></br>
				  <select name="kode_prodi" class="validate[required] text-input" id="kode_prodi">
						<option value="">---</option>
						<?php
							$findprodi=mysql_query("SELECT * FROM `prodi` WHERE `kode_prodi` != 0 ");
								while ($rowJ=mysql_fetch_array($findprodi)){
									if($row['kode_prodi']==$rowJ['kode_prodi']){
										echo "<option value='$rowJ[0]' selected=\"selected\">".ucwords($rowJ[1])."</option>";
									}else{
										echo "<option value='$rowJ[0]'>".ucwords($rowJ[1])."</option>";
									}
								}
						 ?>
					 </select>                    
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tempat Lahir</label>
                  <input type="text" required="required" value="<?php echo $row['Tempat_lahir']; ?>" name="tempat_lahir" class="form-control" id="exampleInputEmail1" placeholder="Input Place">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="date" required="required" value="<?php echo $row['Tanggal_lahir']; ?>" name="tanggal_lahir" class="form-control" id="exampleInputEmail1" placeholder="17 Agustus 1990">
                </div>
                <div class="form-group">
				  <label for="exampleInputEmail1">Tahun Masuk</label>
				  <input type="text" required="required" value="<?php echo $row['Tahun_Masuk']; ?>"name="tahun_masuk" class="form-control" id="exampleInputEmail1" placeholder="Input Year">
				</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun Lulus</label>
                  <input type="text" required="required" value="<?php echo $row['Tahun_lulus']; ?>" name="tahun_lulus" class="form-control" id="exampleInputEmail1" placeholder="Input Year">
                </div>
				<div class="form-group">
                  <label >Email</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input type="text" required="required" name="email" value="<?php echo $row['Email']; ?>" class="form-control" placeholder="Email Address">
                  </div>
                </div>
				<div class="form-group">
                  <label >Telp Rumah</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" required="required"  value="<?php echo $row['Telpon_rumah']; ?>" name="telpon_rumah" class="form-control" placeholder="Input Number">
                  </div>
                </div>
				<div class="form-group">
                  <label >Handphone</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input type="text" required="required" name="handphone" value="<?php echo $row['Handphone']; ?>" class="form-control" placeholder="Handphone Number">
                  </div>
                </div>
				<div class="form-group">
                  <label >Twitter</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                    <input type="text" required="required" name="twitter" value="<?php echo $row['Twitter']; ?>" class="form-control" placeholder="Input Twitter">
                  </div>
                </div>
				<div class="form-group">
                  <label >Facebook</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                    <input type="text" required="required" name="facebook" value="<?php echo $row['Facebook']; ?>" class="form-control" placeholder="Input Facebook">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input type="text" required="required" name="alamat" value="<?php echo $row['Alamat']; ?>" class="form-control" placeholder="Address">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Input Username">
                </div>
				<div class="form-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="text" name="password" class="form-control" id="exampleInputEmail1" placeholder="Input Password">
                </div>
              <div class="form-actions">
                <button type="submit" name="add" class="btn blue">Save</button>
                <button type="submit" name="cancel" class="btn default">Cancel</button>
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
				$tahun_lulus = strip_tags(trim($_POST['tahun_lulus']));
				$tahun_masuk = strip_tags(trim($_POST['tahun_masuk']));
				$email = strip_tags(trim($_POST['email']));
				$telpon_rumah = strip_tags(trim($_POST['telpon_rumah']));
				$handphone = strip_tags(trim($_POST['handphone']));
				$twitter = strip_tags(trim($_POST['twitter']));
				$facebook = strip_tags(trim($_POST['facebook']));
				$alamat = strip_tags(trim($_POST['alamat']));
				
				$username = strip_tags(trim($_POST['username']));
				if($username == "")
				{
					$username = $username_asli;								
				}else{
					$username = $username;	
				}
				
				$password = strip_tags(trim($_POST['new_password']));			
				if($password == "")
				{
					$password = $password_asli;								
				}else{
					$password = md5($password);				
				}			
				
				$namafolder="images/alumni/"; //folder tempat menyimpan file
				if ((empty($_FILES["Filegambar"]["tmp_name"])) || (!empty($_FILES["Filegambar"]["tmp_name"])))
					{
						$jenis_gambar=$_FILES['Filegambar']['type'];
						if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
						{           
							$gambar = $namafolder . $kode_user . basename($_FILES['Filegambar']['name']);       
							if (move_uploaded_file($_FILES['Filegambar']['tmp_name'], $gambar)) {

							$cod = "UPDATE `alumni` SET `nim` = '$nim', `kode_prodi` = '$kode_prodi', `nama` = '$nama', `gambar` = '$gambar', `Tempat_lahir` = '$tempat_lahir', `Tanggal_lahir` = '$tanggal_lahir', `Tahun_Masuk` = '$tahun_masuk', `Tahun_lulus` = '$tahun_lulus', `Email` = '$email', `Telpon_rumah` = '$telpon_rumah', `Handphone` = '$handphone', `Twitter` = '$twitter', `Facebook` = '$facebook', `Alamat` = '$alamat', `username` = '$username', `password` = '$password' WHERE `alumni`.`kode_alumni` = '$kode_alumni';";
							$query = mysql_query($cod) or die (mysql_error);		
							}
						}
					}
				?>
				<script language="javascript">alert('Data telah diubah');
				document.location = 'index.php?page='</script>
				<?php				
			}else if (isset($_POST['cancel'])) {
				?>
				<script language="javascript">document.location = 'index.php?page='</script>
				<?php
			}
			
        ?>
    
  
  
