<?php 
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_pic_borang_penyelenggaraan();
	get_err_message();
?>

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
							<input type="hidden" name="type" value="$usertype">

							<div class="control-group">
								<label class="control-label" for="focusedInput">  Nama Penyelenggara  </label>
								<div class="controls">
									<input class="form-control" name="n_penyelenggara" placeholder="" type="text"/>
								</div> <br>

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
								  <h6> (Contoh :8.00AM/8.00PM) </h6>
								</div>
								</div>

								<div class="control-group">
								<label class="control-label" for="focusedInput"> Masa Keluar  </label>
								<div class="controls">
								  <input class="form-control" id="time" name="timeout" type="time"/>
								  <h6> (Contoh :8.00AM/8.00PM) </h6>
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

<?php
get_footer();
?>