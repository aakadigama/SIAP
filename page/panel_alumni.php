<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
	if (isset($_GET['halaman'])){
		$halaman=$_GET['halaman'];
	}else{
		$halaman = 0;
	}	
	
	$batas= 5;
	if(empty($halaman))
	{
		$posisi=0;
		$halaman=1;
	}
	else
	{
		$posisi = ($halaman-1) * $batas;
	}
	?>
	<div class="row-fluid">
    	<!-- block -->
        	<div class="block">
            <div class="navbar navbar-inner block-header">
            	<h3>Data Beasiswa</h3>
            </div>
			<div class="buttonsave">
              	<a href="?page=add_beasiswa"><button class="btn btn-primary" name="create new">Create New</button> </a>
            </div>    
			<br>
            <div class="block-content collapse in">
            	<div class="span12">

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                  <form id='panel_beasiswa' action='' method='get' >
                  <input type='hidden' name='halaman' value='' />
                   </form>     
                  <thead>                      
                        <th ><p>Nama</p></th>
                        <th ><p>Pemberi Beasiswa</p></th>
                        <th ><p>Tanggal di buat</p></th>                   
                        <th ><p>Status</p></th>
                        <th ><p>Actions</p></th>                
				</thead>
				<tbody>
            <?php
		$kode_pembuat = $_SESSION["kode_alumni"];
		$tampil = mysql_query("SELECT * FROM `beasiswa` WHERE kode_pembuat = '$kode_pembuat' ORDER BY `beasiswa`.`status_beasiswa` DESC limit $posisi,$batas") or die(mysql_error());
		while($data=mysql_fetch_array($tampil)){			
	
		echo "<tr class='even gradeC'>    
				<td>$data[nama]</td>
				<td>$data[pemberi_beasiswa]</td>
				<td>$data[tanggal_dibuat]</td>";
				
				if($data['status_beasiswa'] == "approved")
						$label = "label label-success";
				else if($data['status_beasiswa'] == "checking")
						$label = "label label-warning";
				else if($data['status_beasiswa'] == "rejected")
						$label = "label label-important";
						
				echo "
				<td><span class='$label'>$data[status_beasiswa]</span></td>				
				</td>
				<td><a href='?page=view_beasiswa&id=".$data['kode_beasiswa']."'>View</a></td>";
					
					echo "
				</tr>";
				}?>
				</tbody>
				</table>
               	<div class="row">
                    <div class="span6">
					
                    	                    
                    </div>                    
                    <div class="span5" align="right">
                    <div id="paging-table">
                    <table border="0" cellpadding="0" cellspacing="0"  id='paging-table'>
                    <tr>
                     
					  	<?php 
						$tampil2="select * from `beasiswa`";
						$hasil2=mysql_query($tampil2);
						$jmldata=mysql_num_rows($hasil2);
						$jmlhalaman=ceil($jmldata/$batas);
						if($halaman > 1){
							$previous=$halaman - 1 ;
							echo " <td><a href=?page=panel_beasiswa&halaman=1 class='page-far-left'></a></td>";
							echo " <td><a href=?page=panel_beasiswa&halaman=$previous class='page-left'></a></td>";
						}else{
							?>
                        	 <td><a class='page-far-left'></a></td>
                             <td><a class='page-left'></a></td>
							<?php
						}
						$angka=($halaman > 3 ? " .. " : " ");
						for($i=$halaman-2;$i<$halaman;$i++){
							if ($i < 1)
							continue;
							$angka .= "<td><a href=?page=panel_beasiswa&halaman=$i ><input type='button' value='$i' ></input></a></td>";
						}
						
						$angka .= "<td><input type='button' class='button' value='$halaman'> </input></td>";
						for($i=$halaman+1;$i<($halaman +3);$i++){
							if ($i > $jmlhalaman)
							break;
							$angka .= "<td><a href=?page=panel_beasiswa&halaman=$i><input type='button' value='$i'></input></a></td>";			
						}
						
						$angka .= ($halaman+2<$jmlhalaman ? "<td><input type='button' value='..'><a href=?page=panel_beasiswa&halaman=$jmlhalaman>
						<input  type='button' value='$jmlhalaman'> </input></a> " : " </td>");
						echo "$angka";
						if($halaman < $jmlhalaman){
							$next=$halaman+1;
							echo "<td><a href=?page=panel_beasiswa&halaman=$next class='page-right'> </a></td>
							<td><a href=?page=panel_beasiswa&halaman=$jmlhalaman class='page-far-right'> </a></td> ";
						}
						else{
							?>							
                            <td><a class='page-right'> </a></td>
                            <td><a class='page-far-right'></a></td>
							<?php
						}
						?>
						</td>
					</tr>
					</table>
						
                </div>
            </td>
            </tr>
            </table>                    	
                    </div>
                </div>
            </div>               			 
        </div>
    </div>
	<hr>
	<!------------------------------------------------------------------------------------------------------------------------------------------------------>
	
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
	?>
	<div class="row-fluid">
    	<!-- block -->
        	<div class="block">
            <div class="navbar navbar-inner block-header">
            	<h3>Data Event</h3>
            </div>
			<div class="buttonsave">
				<a href="?page=add_event"><button class="btn btn-primary" name="create new">Create New</button> </a>
             </div>    
			 <br>
            <div class="block-content collapse in">
            	<div class="span12">

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                  <form id='panel_event' action='' method='get' >
                  <input type='hidden' name='halaman' value='' />
                   </form>     
                  <thead>                      
                        <th >Nama</th>
                        <th >Lokasi</th>
						<th >Tanggal Mulai</th>                     
						<th >Status</th>  
                        <th >Actions</th>                
				</thead>
				<tbody>
            <?php		           
		$tampil = mysql_query("SELECT * FROM `event` WHERE kode_pembuat = '$kode_pembuat' ORDER BY `event`.`kode_event` ASC limit $posisi,$batas") or die(mysql_error());
		while($data=mysql_fetch_array($tampil)){			
	
		echo "<tr class='even gradeC'>    
				<td>$data[nama]</td>
				<td>$data[lokasi]</td>
				<td>$data[tanggal_mulai]</td>";
				
				if($data['status_event'] == "approved")
						$label = "label label-success";
				else if($data['status_event'] == "checking")
						$label = "label label-warning";
				else if($data['status_event'] == "rejected")
						$label = "label label-important";
						
				echo "
				<td><span class='$label'>$data[status_event]</span></td>				
				</td>
				<td><a href='?page=view_event&id=".$data['kode_event']."'>
					<i class='icon-eye-open'></i>View</a>					
				</tr>";
				}?>
				</tbody>
				</table>
               	<div class="row">
                    <div class="span6">
                    	    
                    </div>                    
                    <div class="span5" align="right">
                    <div id="paging-table">
                    <table border="0" cellpadding="0" cellspacing="0"  id='paging-table'>
                    <tr>
                     
					  	<?php 
						$tampil2="select * from `event`";
						$hasil2=mysql_query($tampil2);
						$jmldata=mysql_num_rows($hasil2);
						$jmlhalaman=ceil($jmldata/$batas);
						if($halaman > 1){
							$previous=$halaman - 1 ;
							echo " <td><a href=?page=panel_event&halaman=1 class='page-far-left'></a></td>";
							echo " <td><a href=?page=panel_event&halaman=$previous class='page-left'></a></td>";
						}else{
							?>
                        	 <td><a class='page-far-left'></a></td>
                             <td><a class='page-left'></a></td>
							<?php
						}
						$angka=($halaman > 3 ? " .. " : " ");
						for($i=$halaman-2;$i<$halaman;$i++){
							if ($i < 1)
							continue;
							$angka .= "<td><a href=?page=panel_event&halaman=$i ><input type='button' value='$i' ></input></a></td>";
						}
						
						$angka .= "<td><input type='button' class='button' value='$halaman'> </input></td>";
						for($i=$halaman+1;$i<($halaman +3);$i++){
							if ($i > $jmlhalaman)
							break;
							$angka .= "<td><a href=?page=panel_event&halaman=$i><input type='button' value='$i'></input></a></td>";			
						}
						
						$angka .= ($halaman+2<$jmlhalaman ? "<td><input type='button' value='..'><a href=?page=panel_event&halaman=$jmlhalaman>
						<input  type='button' value='$jmlhalaman'> </input></a> " : " </td>");
						echo "$angka";
						if($halaman < $jmlhalaman){
							$next=$halaman+1;
							echo "<td><a href=?page=panel_event&halaman=$next class='page-right'> </a></td>
							<td><a href=?page=panel_event&halaman=$jmlhalaman class='page-far-right'> </a></td> ";
						}
						else{
							?>							
                            <td><a class='page-right'> </a></td>
                            <td><a class='page-far-right'></a></td>
							<?php
						}
						?>
						</td>
					</tr>
					</table>
						
                </div>
            </td>
            </tr>
            </table>                    	
                    </div>
                </div>
            </div>               			 
        </div>
    </div>
	</div>
    
    </body>
    </html>
	<hr>
	<!------------------------------------------------------------------------------------------------------------------------------------------------------>
	
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
	?>
    <div class="row-fluid">
    	<!-- block -->
        	<div class="block">
            <div class="navbar navbar-inner block-header">
            	<h3>Data Lowongan Kerja</h3>
            </div>
			<div class="buttonsave">
				<a href="?page=add_loker"><button class="btn btn-primary" name="create new">Create New</button> </a>
             </div>    
			 <br>
            <div class="block-content collapse in">
            	<div class="span12">
			  	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
              	   	<form id='show_lowongan_kerja' action='' method='get' >
                	<input type='hidden' name='halaman' value='' />
                    </form>
                    <thead>                      
                        <th >Nama</th>
                        <th >Lokasi</th>
                        <th >Nama Perusahaan</th>
                        <th >Tanggal di buat</th>                       
                        <th >Status</th>
                        <th >Actions</th>                
					</thead>
                    <tbody>
             <?php
                                          
            $mysqlselect = "SELECT * FROM `lowongan_kerja` WHERE kode_pembuat = '$kode_pembuat' ORDER BY `lowongan_kerja`.`kode_loker` ASC limit $posisi,$batas";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){						
			echo "
				<tr class='even gradeC'>  	
						<td>$data[nama]</td>
						<td>$data[lokasi]</td>
						<td>$data[nama_perusahaan]</td>";						
						echo "
						<td>$data[tanggal_dibuat]</td>";
									
						
						if($data['status_loker'] == "approved")
						$label = "label label-success";
						else if($data['status_loker'] == "checking")
								$label = "label label-warning";
						else if($data['status_loker'] == "rejected")
								$label = "label label-important";
								
						echo "
						<td><span class='$label'>$data[status_loker]</span></td>				
						<td><a href='?page=view_loker&id=".$data['kode_loker']."'>
							<i class='icon-eye-open'></i> View</a>	
							
						</td>
					</tr>";
			}?>
            </tbody>
				</table>
               	<div class="row">
                    <div class="span6"></div>                    
                    <div class="span5" align="right">
                    <div id="paging-table">
                    <table border="0" cellpadding="0" cellspacing="0"  id='paging-table'>
                    <tr>
                     
					  	<?php 
						$tampil2="select * from `lowongan_kerja`";
						$hasil2=mysql_query($tampil2);
						$jmldata=mysql_num_rows($hasil2);
						$jmlhalaman=ceil($jmldata/$batas);
						if($halaman > 1){
							$previous=$halaman - 1 ;
							echo " <td><a href=?page=panel_loker&halaman=1 class='page-far-left'></a></td>";
							echo " <td><a href=?page=panel_loker&halaman=$previous class='page-left'></a></td>";
						}else{
							?>
                        	 <td><a class='page-far-left'></a></td>
                             <td><a class='page-left'></a></td>
							<?php
						}
						$angka=($halaman > 3 ? " .. " : " ");
						for($i=$halaman-2;$i<$halaman;$i++){
							if ($i < 1)
							continue;
							$angka .= "<td><a href=?page=panel_loker&halaman=$i ><input type='button' value='$i' ></input></a></td>";
						}
						
						$angka .= "<td><input type='button' class='button' value='$halaman'> </input></td>";
						for($i=$halaman+1;$i<($halaman +3);$i++){
							if ($i > $jmlhalaman)
							break;
							$angka .= "<td><a href=?page=panel_loker&halaman=$i><input type='button' value='$i'></input></a></td>";			
						}
						
						$angka .= ($halaman+2<$jmlhalaman ? "<td><input type='button' value='..'><a href=?page=panel_loker&halaman=$jmlhalaman>
						<input  type='button' value='$jmlhalaman'> </input></a> " : " </td>");
						echo "$angka";
						if($halaman < $jmlhalaman){
							$next=$halaman+1;
							echo "<td><a href=?page=panel_loker&halaman=$next class='page-right'> </a></td>
							<td><a href=?page=panel_loker&halaman=$jmlhalaman class='page-far-right'> </a></td> ";
						}
						else{
							?>							
                            <td><a class='page-right'> </a></td>
                            <td><a class='page-far-right'></a></td>
							<?php
						}
						?>
						</td>
					</tr>
					</table>
						
                </div>
            </td>
            </tr>
            </table>                    	
                    </div>
                </div>
            </div>               			 
        </div>
    </div>