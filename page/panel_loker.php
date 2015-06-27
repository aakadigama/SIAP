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
            	<div class="muted pull-left">Data Lowongan Kerja</div>
            </div>
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
                        <th >Penulis</th>
                        <th >Status</th>
                        <th >Actions</th>                
					</thead>
                    <tbody>
             <?php
                                          
            $mysqlselect = "SELECT * FROM `lowongan_kerja` ORDER BY `lowongan_kerja`.`kode_loker` ASC limit $posisi,$batas";
			$hasil=mysql_query($mysqlselect) or die ("mysql_error");
			while($data=mysql_fetch_array($hasil)){						
			echo "
				<tr class='even gradeC'>  	
						<td>$data[nama]</td>
						<td>$data[lokasi]</td>
						<td>$data[nama_perusahaan]</td>";	
						$pembuat = showPenulis($data['kode_pembuat']);
						echo "
						<td>$data[tanggal_dibuat]</td>
						<td>$pembuat</td>";						
						
						if($data['status_loker'] == "approved")
						$label = "label label-success";
						else if($data['status_loker'] == "checking")
								$label = "label label-warning";
						else if($data['status_loker'] == "rejected")
								$label = "label label-important";
								
						echo "
						<td><span class='$label'>$data[status_loker]</span></td>				
						<td><a href='?page=view_loker&id=".$data['kode_loker']."'>
							<button class='btn'><i class='icon-eye-open'></i> View</button></a>	
							<a href='?page=panel_loker&kode=approve_loker-".$data['kode_loker']."'>		
							<button name='approve' class='btn btn-success'><i class='icon-ok icon-white'></i> Approve</button></a>	
							<a href='?page=panel_loker&kode=delete_loker-".$data['kode_loker']."'>				
							<button name=''class='btn btn-danger'><i class='icon-remove icon-white'></i> Delete</button></a>
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
    
            
						
						
    
</body>
</html>