<?php
	require_once("functions/function.php");
	get_conn();
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
		<li><a href="#">Penggunaan Makmal</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="#">Kemaskini Penggunaan Makmal</a></li>
	</ul>
<?php  get_err_message(); ?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Kemaskini Penggunaan Makmal </h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
					<?php
					$id=$_GET['editpenggunaan'];
					$sql="SELECT * FROM penggunaan WHERE id_penggunaan='$id'";
					$query=mysql_query($sql);
					while($row=mysql_fetch_array($query)){
					 ?>
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>
								<input type="hidden" name="id" value="<?php echo $row['id_penggunaan'];?>">
							  <div class="control-group">
								<label class="control-label" for="focusedInput"> Guru Bertugas  </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="g_bertugas" id="focusedInput" type="text" placeholder="Guru Bertugas" 
								  value="<?php echo $row['g_bertugas']; ?>" disabled>
								</div>
								</div>

								 <div class="control-group">
								<label class="control-label">  Kelas  </label>
								<div class="controls">
								<input type="text" class="input-xlarge focused" name="kelas" id="focusedInput" placeholder="Tahun" value="<?php echo $row['kelas']; ?>" disabled>

								

								</div> <br>

								<div class="control-group">
								<label class="control-label">  Makmal  </label>
								<div class="controls">
								<input type="text" class="input-xlarge focused" name="makmal" id="focusedInput" placeholder="Tahun" value="<?php echo $row['nama_makmal']; ?>" disabled>
									</div> <br>
<!--
								<div class="control-group">
								<label class="control-label"> Masa Masuk </label>
								<div class="controls">
								<input class="form-control" id="time" name="time" type="time" value="<?php echo $row['m_masuk'];?>">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label"> Masa Keluar </label>
								<div class="controls">
								 <input class="form-control" id="time" name="time_out" type="time" value="<?php echo $row['m_keluar'];?>">
								</div>
							  </div>

							   <div class="control-group">
								<label class="control-label"> Tarikh </label>
								<div class="controls">
								 <input class="form-control" name="date2" placeholder="MM/DD/YYYY" type="date" value="<?php echo $row['tarikh']; ?>">
								</div>
							  </div>
-->
								<div class="control-group">
  								 <label class="control-label" name="catatan" for="comment"> Catatan </label>
  								 <div class="controls">
								 <textarea class="form-control" rows="5" col="10" name="catat"><?php echo $row['catatan'];?></textarea>
								  </div>
								</div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary" name="edit_penggunaan"> Kemaskini </button>
							  </div>
							</fieldset>
						</form>
					<?php } ?>
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

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
