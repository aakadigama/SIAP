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
            	<div class="muted pull-left">Data Beasiswa</div>
            </div>
            <div class="block-content collapse in">
            	<div class="span12">

            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                  <form id='panel_beasiswa' action='' method='get' >
                  <input type='hidden' name='halaman' value='' />
                   </form>     
                  <thead>                      
                        <th >Nama</th>
                        <th >Pemberi Beasiswa</th>
                        <th >Tanggal di buat</th>
                        <th >Penulis</th>
                        <th >Status</th>
                        <th >Actions</th>                
				</thead>
				<tbody>
            <?php		           
		$tampil = mysql_query("SELECT * FROM `beasiswa` ORDER BY `beasiswa`.`status_beasiswa` DESC limit $posisi,$batas") or die(mysql_error());
		while($data=mysql_fetch_array($tampil)){			
	
		echo "<tr class='even gradeC'>    
				<td>$data[nama]</td>
				<td>$data[pemberi_beasiswa]</td>
				<td>$data[tanggal_dibuat]</td>"; 					 	
					$pembuat = showPenulis($data['kode_pembuat']);
				echo "
				<td>$pembuat</td>";
				if($data['status_beasiswa'] == "approved")
						$label = "label label-success";
				else if($data['status_beasiswa'] == "checking")
						$label = "label label-warning";
				else if($data['status_beasiswa'] == "rejected")
						$label = "label label-important";
						
				echo "
				<td><span class='$label'>$data[status_beasiswa]</span></td>				
				</td>
				<td><a href='?page=view_beasiswa&id=".$data['kode_beasiswa']."'>
					<button class='btn'><i class='icon-eye-open'></i> View</button></a>";
					if(($data['status_beasiswa'] != "approved") and ($data['status_beasiswa'] != "rejected")){
						echo "
						<a href='?page=panel_beasiswa&kode=approve_beasiswa-".$data['kode_beasiswa']."'>		
						<button name='approve' class='btn btn-success'><i class='icon-ok icon-white'></i> Approve</button></a>
						<a href='?page=panel_beasiswa&kode=reject_beasiswa-".$data['kode_beasiswa']."'>				
						<button name=''class='btn btn-danger'><i class='icon-remove icon-white'></i> Reject</button></td></a>";
					}else{
					echo"
					<a href='?page=panel_beasiswa&kode=delete_beasiswa-".$data['kode_beasiswa']."'>				
					<button name=''class='btn btn-danger'><i class='icon-remove icon-white'></i> Delete</button></td></a>";
					}
					echo "
				</tr>";
				}?>
				</tbody>
				</table>
               	<div class="row">
                    <div class="span6">
                    	<div class="buttonsave">
                           	<a href="?page=add_beasiswa"><button class="btn btn-primary" name="create new">Create New</button> </a>
                        </div>                           
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
    
    </body>
    </html>