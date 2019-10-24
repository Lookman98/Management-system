<?php
require_once("functions/function.php");
get_header();
get_sidebar();

?>


	<div id="content" class="span10">
	<ul class="breadcrumb">

		<li><a href="#">Penyelenggaraan Makmal</a></li>
		<i class="icon-angle-right"></i>
		<li><a href="b_penyelenggraan.php">Borang Penyelenggaraan</a></li>
	</ul>
<?php get_err_message();?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Borang Penyelenggaraan Makmal </h2>
						<div class="box-icon">
				
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>

							<div class="control-group">
								<label class="control-label" for="focusedInput">  Nama Penyelenggara  </label>
								<div class="controls">
									<input class="form-control" name="n_penyelenggara" placeholder="nama penyelengaraa" value="<?php echo $_SESSION['sess_name'];?>" type="text" readonly/>
								</div> <br>

							<input type="hidden" name="type" value="<?php  echo $_SESSION['sess_usertype'];?>">
								<div class="control-group">
								<label class="control-label">  Makmal  </label>
								<div class="controls">
									<select class="input-xlarge focused" name="lab2" id="focusedInput" required>
									<?php 
									get_conn();
									$sql="SELECT nama_makmal FROM makmal ";
										  $query=mysql_query($sql);
										  while ($row=mysql_fetch_array($query)) {
										  	# code...
										  
									?>
									<option><?php echo $row['nama_makmal']; ?> </option>
									<?php } ?>

									</select>
									</div> <br>

 								<div class="control-group">
								<label class="control-label" for="focusedInput">  Tarikh  </label>
								<div class="controls">
									<input class="form-control" id="date" name="date1" placeholder="MM/DD/YYYY" type="date"/>
								</div> <br> 

							  <div class="control-group">
								<label class="control-label" for="focusedInput"> Masa Masuk  </label>
								<div class="controls">
								  <input class="form-control" id="time" name="timein" type="time"/>
								</div>
								</div>

								<div class="control-group">
								<label class="control-label" for="focusedInput"> Masa Keluar  </label>
								<div class="controls">
								  <input class="form-control" id="time" name="timeout" type="time"/>
								</div>
								</div> 
								

								 <div class="control-group">
								<label class="control-label" for="focusedInput"> Jenis Kerosakan  </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="j_rosak" id="focusedInput" type="text" required>
								</div>
								</div>
								
							    <div class="control-group">
  								 <label class="control-label" for="comment"> Catatan </label>
  								 <div class="controls">
								      <textarea class="form-control" rows="5" col="10" name="note"></textarea>
								  </div>
								</div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="selenggara"> Hantar </button>
							  </div>
							</fieldset>
						</form>
					
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
