
<?php
		
	require_once("functions/function.php");
	get_conn();

	$nama_makmal=$_GET['edit_makmal_ad'];
	$sql = "SELECT * FROM makmal WHERE nama_makmal='$nama_makmal'";
	$result=mysql_query($sql);
	



	
	get_header();
	get_sidebar();
	get_bread_edit_makmal_admin();
	get_err_message();

?>

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Kemaskini Maklumat Makmal</h2>
						<div class="box-icon">
							
						</div>
					</div>
					
					<div class="box-content">
					<?php while($row=mysql_fetch_assoc($result)) {?>
				
						<form class="form-horizontal" method="post" action="proses.php" enctype="multipart/form-data">
							<fieldset>
															
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Nama Makmal:</label>
								<div class="controls">
							
								  <input class="input-xlarge focused" name="n_makmal" id="focusedInput" type="text" placeholder="Nama Makmal" value="<?php echo $row['nama_makmal']; ?>" >
							
								</div>
								</div>
								 <div class="control-group">
								<label class="control-label" for="focusedInput">Blok:</label>
								<div class="controls">
								<select class="input-xlarge focused" name="blok" id="focusedInput" placeholder="blok" >
									<option name="" value="<?php echo $row['blok']; ?>"><?php echo $row['blok']; ?></option>
									<option name="blok" value="N">N</option>
									<option name="blok" value="R">R</option>
									<option name="blok" value="C">C</option>
									<option name="blok" value="A">A</option>
								</select>
								</div>
							  </div>
							  
								<div class="control-group">
								<label class="control-label" for="focusedInput">Tingkat:</label>
								<div class="controls">
								<select class="input-xlarge focused" name="tingkat" id="focusedInput" placeholder="tingkat" >
									<option name="" value="<?php echo $row['tingkat']; ?>"><?php echo $row['tingkat']; ?></option>
									<option name="tingkat" value="1">1</option>
									<option name="tingkat" value="2">2</option>
									<option name="tingkat" value="3">3</option>
									<option name="tingkat" value="4">4</option>
								</select>
								</div>
							  </div>
								<div class="control-group">
								<label class="control-label" for="focusedInput">Kapasiti Pelajar:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="kapasiti_pel" id="focusedInput" type="text" placeholder="kepasiti Pelajar" value="<?php echo $row['kapasiti_pelajar']; ?>" >
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="focusedInput">Kapasiti Guru:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="kapasiti_guru" id="focusedInput" type="text" placeholder="kepasiti Guru" value="<?php echo $row['kapasiti_guru']; ?>" >
								</div>
								</div>
								
								
								<div class="control-group" >
								<label class="control-label" for="focusedInput">Kemudahan:</label>
								<div class="controls">
								  <textarea rows="3" cols="20" class="input-xlarge focused" name="kemudahan" id="focusedInput" placeholder="printer , projector etc...."><?php echo $row['kemudahan']; ?></textarea> 
								</div>
								</div>
								
								<div class="control-group">
               					<label class="control-label" for="focusedInput">Image:</label>
               					<div class="controls">
                                <input class="input-xlarge focused" name="image" id="focusedInput" type="file" placeholder="image" value="<?php echo $row['image']; ?>">
                                </div>
                                </div>
													
							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="edit_makmal_ad">Kemaskini </button>
							  </div>
							</fieldset>
						</form>
						<?php } ?>
					
					</div>
				</div>	<!--/span-->
				
			
			</div><!--/row-->
<?php
	get_footer();
?>		

	
	<!--<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->