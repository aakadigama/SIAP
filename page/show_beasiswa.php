<!-- BEGIN BLOG -->
    <div class="row"> 
      <!-- BEGIN LEFT SIDEBAR -->
      <div class="col-md-9 col-sm-9 blog-posts margin-bottom-40">
	  <br>
	  <?php
	   if(empty($_SESSION["kode_alumni"])){						 
	   }else{
			echo "<a href='?page=add_beasiswa'><button  class='btn blue' type='button' name='submit'>Tambah Beasiswa</button></a>";
		}?>
<?php
	if (isset($_GET['halaman'])){
		$halaman=$_GET['halaman'];
	}else{
		$halaman = 0;
	}	
	
	$batas= 2;
	if(empty($halaman))
	{
		$posisi=0;
		$halaman=1;
	}
	else
	{
		$posisi = ($halaman-1) * $batas;
	}                                          
            $mysqlselect = "SELECT * FROM `beasiswa` WHERE `status_beasiswa`='approved' ORDER BY `beasiswa`.`kode_beasiswa` ASC limit $posisi,$batas";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){
				$pembuat = showPenulis($data['kode_pembuat']);
?>
                
        <hr class="blog-post-sep">
        <div class="row">
			<div class="col-md-4 col-sm-4"> <img src="<?php echo $data['gambar']; ?>" alt="" width="200" height="200" class="img-responsive"> </div>
				<div class="col-md-8 col-sm-8">
					<h2><a href=""><?php echo $data['nama']; ?></a></h2>
					<ul class="blog-info">
						<li><i class="fa fa-calendar"></i> <?php echo $data['tanggal_dibuat']; ?></li>
						<li><i class="fa fa-tags"></i><?php echo $pembuat; ?></li>
					</ul>
					<?php echo"<p> ".substr($data['deskripsi'],0,200)."<br><a class='more' href='?page=view_beasiswa&id=".$data['kode_beasiswa']."'>Read more</a></p>"; ?>
				</div>
        </div>
     
      
		
		
		<div id="paging-table">
          <table border="0" cellpadding="0" cellspacing="0"  id='paging-table'>
            <tr>
            
              	<?php 
				}
				$tampil2="select * from `beasiswa` WHERE `status_beasiswa`='approved'";
				$hasil2=mysql_query($tampil2);
				$jmldata=mysql_num_rows($hasil2);
				$jmlhalaman=ceil($jmldata/$batas);
				if($halaman > 1)
				{
					$previous=$halaman - 1 ;
					echo "<td><a href=?page=show_beasiswa&halaman=1 class='page-far-left'></a></td>";
					echo "<td><a href=?page=show_beasiswa&halaman=$previous class='page-far-left'></a></td>";
				}
				else
				{
					?>
						<td><a class='page-far-left'></a></td> 
                        <td><a class='page-left'> </a></td>
				<?php
				}
				$angka=($halaman > 3 ? " .. " : " ");
				for($i=$halaman-2;$i<$halaman;$i++)
					{
						if ($i < 1)
						continue;
						$angka .= "<td><a href=?page=show_beasiswa&halaman=$i ><input type='button' value='$i' ></input></a></td>";
				}
				$angka .= "<td><input type='button' class='button' value='$halaman'> </input></td>";
				for($i=$halaman+1;$i<($halaman +3);$i++)
					{
						if ($i > $jmlhalaman)
						break;
						$angka .= "<td><a href=?page=show_beasiswa&halaman=$i><input type='button' value='$i'></input></a></td>";
				}
				$angka .= ($halaman+2<$jmlhalaman ? "<td><input type='button' value='..'> <a href=?page=show_beasiswa&halaman=$jmlhalaman>
				<input  type='button' value='$jmlhalaman'> </input></a> " : " </td>");
				echo "$angka";
				if($halaman < $jmlhalaman)
					{
						$next=$halaman+1;
						echo "	<td><a href=?page=show_beasiswa&halaman=$next class='page-right'> </a></td>
								<td><a href=?page=show_beasiswa&halaman=$jmlhalaman class='page-far-right'> </a></td> ";
					}
    			else
					{
					?>
								<td><a class='page-far-right'></a></td> 
                                <td><a class='page-right'> </a></td>
								<?php
				}
				?>
          			</td>
          		</tr>
               
          </table>
        </div>
		
        <!--
        <div class="text-center">
          <ul class="pagination pagination-centered">
            <li><a href="#">Prev</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li class="active"><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">Next</a></li>
          </ul>
        </div>
      </div>
      <!-- END LEFT SIDEBAR --> 
      
      <!-- BEGIN RIGHT SIDEBAR -->
      <div class="col-md-3 col-sm-3 blog-sidebar"> 
        
        
        
      </div>
      <!-- END RIGHT SIDEBAR --> 
    </div>
    <!-- END BEGIN BLOG --> 