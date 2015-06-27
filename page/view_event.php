<?php
$kode_event = $_GET['id'];
 $mysqlselect = "SELECT * FROM `event` WHERE `event`.`kode_event` = '$kode_event'";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){		
			$pembuat = showPenulis($data['kode_pembuat']);
?>
			<!-- BEGIN BLOG -->
			<div class="row">
				<!-- BEGIN LEFT SIDEBAR -->            
				<div class="col-md-9 blog-item margin-bottom-40">
				
					<h2><a href=""><?php echo $data['nama']; ?></a></h2>
					<img src="<?php echo $data['gambar']; ?>" alt="" width="200" height="200" class="img-responsive"> 
					<ul class="blog-info">
						<li><i class="fa fa-user"></i><?php echo $pembuat; ?></li>											
					</ul>					
					<table border="0">
						<tr>
							<td>Tanggal Mulai</td>
							<td>:</td>
							<td><?php echo $data['tanggal_mulai']; ?></td>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<td>Jam Mulai</td>
							<td>:</td>
							<td><?php echo $data['jam_mulai']; ?></td>
						</tr>
						<tr>
							<td colspan="7">&nbsp;</td>
						</tr>
						<tr>
							<td>Tanggal Selesai</td>
							<td>:</td>
							<td><?php echo $data['tanggal_selesai']; ?></td>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<td>Jam Selesai</td>
							<td>:</td>
							<td><?php echo $data['jam_selesai'] ?></td>
						</tr>
					</table>
					<hr>
					<h4>Deskripsi</h4>
					<hr>
					<p><?php echo $data['deskripsi']; ?></p>
					
					<hr>
					<div class="media">
						<h3>Comments</h3>
						<?php
						$mysqlselect = "SELECT * FROM `comment` WHERE `id_informasi` = 2 AND `id_topik` = '$kode_event'";
						$hasil=mysql_query($mysqlselect) or die ("mysql_error");
						while($data=mysql_fetch_array($hasil)){
							$pembuat = showPenulis($data['kode_pembuat']);
							$gambar_pembuat = showGambarPenulis($data['kode_pembuat']);
						?>
							<a href="#" class="pull-left">
							<img src="<?php echo $gambar_pembuat; ?>" alt="" class="media-object">
							</a>
							<div class="media-body">
								<h4 class="media-heading"><?php echo $pembuat; ?><span><?php echo $data['tanggal']; ?></span></h4>
								<p><?php echo $data['comment']; ?></p>
								<hr>
								<!-- Nested media object -->							
								
							</div>
						<?php
						}											
						?>
							

					</div>
					<hr>
					<div class="post-comment">
						<h3>Leave a Comment</h3>						
							<?php
							if(empty($_SESSION["kode_alumni"])){
							}else{	
							?>
							<form action="" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label>Message</label>
								<textarea name="message" class="form-control" rows="8"></textarea>
							</div>
							<p><button type="submit" class="btn btn-default theme-btn" name="add">Post a Comment</button></p>
							</form>
							<?php
							}
							if (isset($_POST['add'])) {
								$kode_pembuat = $_SESSION["kode_alumni"];
								$message = $_POST['message'];
								$tanggal_dibuat = date("Y-m-d");
								
								$cod = "INSERT INTO `comment` (`id_comment`, `id_informasi`, `id_topik`, `kode_pembuat`, `tanggal`, `comment`) VALUES (NULL, '2', '$kode_event', '$kode_pembuat', '$tanggal_dibuat', '$message')";
								$query = mysql_query($cod) or die (mysql_error);		
								?>
								<script language="javascript">document.location = '?page=view_event&id=<?php echo $kode_event;?>'</script>							
								<?php
							}
							?>
					</div>
					
				</div>
				<!-- END LEFT SIDEBAR -->

				         
			</div>
			<!-- END BEGIN BLOG -->
			<?php 
			}
			?>
