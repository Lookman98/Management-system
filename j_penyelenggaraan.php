	<?php
	require_once("functions/function.php");
	get_header();	
	get_sidebar();


	?>

	<div id="content" class="span10">
	<ul class="breadcrumb">
	<!--<li>
			<i class="icon-home"></i>
			<a href="p_makmal1.php">p_makmal1</a> 
			<i class="icon-angle-right"></i>
		</li>-->
		<li><a href="#">Penyelenggaraan Makmal</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="j_penyelenggaraan.php">Jadual Penyelenggaraan</a></li>
	</ul>

	<?php get_err_message();?>


<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Jadual Penyelenggaraan Makmal</h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	 
							  	  <th>Makmal</th>
								  <th>Tarikh</th>
								  <th>Masa Masuk</th>
								  <th>Masa Keluar</th>
								  <th>Jenis Kerosakan</th>
								  <th>Catatan</th>
								 <!-- <th>Tindakan</th>-->
							  </tr>
						  </thead>
						  <tbody>
							<?php
							get_conn();
							$pengguna=$_SESSION['sess_name'];
							$sql="SELECT * FROM penyelenggaraan WHERE nama_penyelenggara = '$pengguna'";
							$query=mysql_query($sql);
							$i=1;
							?>

          				  <?php while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>
								
								<td><?php echo $row['nama_makmal']; ?></td>
								<td><?php echo $row['tarikh']; ?></td>
								<td><?php echo $row['m_masuk']; ?></td>
								<td><?php echo $row['m_keluar']; ?></td>
								<td><?php echo $row['j_rosak']; ?></td>
								<td><?php echo $row['catatan']; ?></td>
								<!--<td class="center">
									<a class="btn btn-info" href="edit_penyelenggaraan.php?edit_penyelenggaraan=<?php echo $row['bil']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									
								</td>-->
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>



</div><!--span 10 end-->
		</div><!--/row-fluid end-->
	</div><!--/container-fluid-full end-->

	<div class="clearfix"></div>	
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2017 <a href="#" alt="Administrator Panel">
			Sistem Pengurusan Maklumat Makmal Komputer KVPJB</a></span>			
		</p>
	</footer>
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-migrate-1.0.0.min.js"></script>
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="js/jquery.ui.touch-punch.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='js/jquery.dataTables.min.js'></script>
		<script src="js/excanvas.js"></script>
		<script src="js/jquery.flot.js"></script>
		<script src="js/jquery.flot.pie.js"></script>
		<script src="js/jquery.flot.stack.js"></script>
		<script src="js/jquery.flot.resize.min.js"></script>
		<script src="js/jquery.chosen.min.js"></script>
		<script src="js/jquery.uniform.min.js"></script>		
		<script src="js/jquery.cleditor.min.js"></script>	
		<script src="js/jquery.noty.js"></script>
		<script src="js/jquery.elfinder.min.js"></script>	
		<script src="js/jquery.raty.min.js"></script>	
		<script src="js/jquery.iphone.toggle.js"></script>	
		<script src="js/jquery.uploadify-3.1.min.js"></script>	
		<script src="js/jquery.gritter.min.js"></script>	
		<script src="js/jquery.imagesloaded.js"></script>	
		<script src="js/jquery.masonry.min.js"></script>	
		<script src="js/jquery.knob.modified.js"></script>	
		<script src="js/jquery.sparkline.min.js"></script>	
		<script src="js/counter.js"></script>
		<script src="js/retina.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
