<?php
	$kode_alumni =$_GET['kode_alumni'];
	$sql="SELECT * FROM `alumni` WHERE `kode_alumni` = '$kode_alumni'";
	$res=mysql_query ($sql) or die(mysql_error());
	$row = mysql_fetch_array($res);
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
            <h3 class="panel-title">Data Alumni</h3>
          </div>
          <div class="panel-body">
            
			<form action="" method="post" enctype="multipart/form-data">
              <div class="form-body">
				<div class="form-group">
					<img src="<?php echo $row['gambar']; ?>" width="200" height="175" /><br>					
				</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input disabled type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control" id="exampleInputEmail1" placeholder="Input Name">
                </div>				
				<div class="form-group">
                  <label for="exampleInputEmail1">Program Studi</label></br>
				  <select disabled name="kode_prodi" class="validate[required] text-input" id="kode_prodi">
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
				  <label for="exampleInputEmail1">Tahun Masuk</label>
				  <input disabled type="text" value="<?php echo $row['Tahun_Masuk']; ?>"name="tahun_masuk" class="form-control" id="exampleInputEmail1" placeholder="Input Year">
				</div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tahun Lulus</label>
                  <input disabled type="text" value="<?php echo $row['Tahun_lulus']; ?>" name="tahun_lulus" class="form-control" id="exampleInputEmail1" placeholder="Input Year">
                </div>
				<div class="form-group">
                  <label >Email</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                    <input disabled type="text" name="email" value="<?php echo $row['Email']; ?>" class="form-control" placeholder="Email Address">
                  </div>
                </div>
				<div class="form-group">
                  <label >Telp Rumah</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input disabled type="text" value="<?php echo $row['Telpon_rumah']; ?>" name="telpon_rumah" class="form-control" placeholder="Input Number">
                  </div>
                </div>
				<div class="form-group">
                  <label >Handphone</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-mobile"></i></span>
                    <input disabled type="text" name="handphone" value="<?php echo $row['Handphone']; ?>" class="form-control" placeholder="Handphone Number">
                  </div>
                </div>
				<div class="form-group">
                  <label >Twitter</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                    <input disabled type="text" name="twitter" value="<?php echo $row['Twitter']; ?>" class="form-control" placeholder="Input Twitter">
                  </div>
                </div>
				<div class="form-group">
                  <label >Facebook</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                    <input disabled type="text" name="facebook" value="<?php echo $row['Facebook']; ?>" class="form-control" placeholder="Input Facebook">
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <div class="input-group"> <span class="input-group-addon"><i class="fa fa-home"></i></span>
                    <input disabled type="text" name="alamat" value="<?php echo $row['Alamat']; ?>" class="form-control" placeholder="Address">
                  </div>
                </div>                
              <div class="form-actions">
                <button type="submit" name="close" class="btn blue">Close</button>              
              </div>
            </form>
			</form>
          </div>
        </div>
        <!-- BLOCK END--> 
        
     
    </div>
    <!-- END ROW 1 --> 
	<?php
			if (isset($_POST['close'])) {				
				?>
				<script language="javascript">document.location = 'index.php?page=data_alumni'</script>
				<?php				
			}
			
        ?>
    
  
  
