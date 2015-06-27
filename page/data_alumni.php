
        <!-- BEGIN BREADCRUMBS -->   
        <div class="row breadcrumbs margin-bottom-40">
          
                <div class="col-md-12 col-sm-12">
                    <center><h1>Data Alumni</h1></center>
                </div>
               
            
        </div>
        <!-- END BREADCRUMBS -->

        <div class="row">
          <div class="col-md-12">
            <!-- BEGIN CONTAINER -->
    		    <div class="container min-hight portfolio-page margin-bottom-40">
    			   <!-- BEGIN FILTER -->           
    			   <div class="filter-v1">
				    <div class="row mix-grid thumbnails">
							<?php
							$jumlah_query = mysql_query("SELECT COUNT(*) FROM `alumni`");
							$data_jumlah = mysql_fetch_row($jumlah_query);
							$jumlah = $data_jumlah[0];
							
							$tampil = mysql_query("SELECT * FROM `alumni`") or die(mysql_error());
							while($data=mysql_fetch_array($tampil)){	
							?>
							
				   
                             
                                  <div style="display: inline-block;  opacity: 1;" class="col-md-3 col-sm-4 mix category_1 mix_all">
                                    <div class="mix-inner">
                                       <img width="200" height="175" src="<?php echo $data['gambar']; ?>" alt="">
                                       <div class="mix-details">
                                          <h5><b><?php echo $data['nama']; ?></b></h5>
										  <h5>Angkatan : <?php echo $data['Tahun_Masuk']; ?></h5>
										  <?php
										  if(empty($_SESSION["kode_alumni"])){						 
										  }else{
										   ?>
                                          <a href="?page=lihat_alumni&kode_alumni=<?php echo $data['kode_alumni'];?>"><button type="button" class="btn blue">Lihat</button></a>  
										  <?php } ?>
                                       </div>           
                                    </div>                       
                                  </div>   
							<?php
							}		
							?>
                                  
                                 
                                 
                              </div>
        			</div>
        			<!-- END FILTER -->           
        		</div>
        		<!-- END CONTAINER -->
          </div>
        </div>

	