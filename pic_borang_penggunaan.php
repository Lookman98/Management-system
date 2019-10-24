<?php 
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_pic_borang_penggunaan();
	get_err_message();
?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Borang Penggunaan Makmal </h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>
								<input type="hidden" name="type" value="$usertype">
							  <div class="control-group">
								<label class="control-label" for="focusedInput"> Nama Pengguna  </label>
								<div class="controls">
								  <input name="ckgu" id="focusedInput" type="text">
								</div>
								</div>

								<div class="control-group">
								<label class="control-label" for="focusedInput"> Kelas  </label>
								<div class="controls">
								  <input name="class" id="focusedInput" type="text" pattern="\d{1}[A-Z]{3}\d{1}"> <h6> (Contoh : 4KPD1) </h6>
								</div></div> 

								<div class="control-group">
								<label class="control-label">  Makmal  </label>
								<div class="controls">
									<select class="input-xlarge focused" name="lab3" id="focusedInput" required>
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
								<label class="control-label"> Masa Masuk </label>
								<div class="controls">
								<input class="form-control" name="time_masuk" type="time"/>
								<h6> (Contoh :8:00/20:00) </h6>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label"> Masa Keluar </label>
								<div class="controls">
								 <input class="form-control" name="time_out" type="time"/>
								 <h6> (Contoh :8:00/20:00) </h6>
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label"> Tarikh </label>
								<div class="controls">
								 <input class="form-control" name="date2" type="date"/>
								</div>
							  </div>
							   
								<div class="control-group">
  								 <label class="control-label" name="note2"> Catatan </label>
  								 <div class="controls">
								      <textarea rows="5" col="10" name="note2"></textarea>
								  </div>
								</div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="tambahpenggunaan"> Hantar </button>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php 
get_footer();
?>