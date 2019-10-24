<?php
		
	require_once("functions/function.php");
	get_conn();

	$nama_makmal=$_GET['edit_makmal'];
	$sql = "SELECT * FROM makmal WHERE nama_makmal= '$nama_makmal'";
	$result=mysql_query($sql);
	
	get_header();
	get_sidebar();
	get_bread_edit_makmal();
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
					<?php while($row=mysql_fetch_array($result)) {?>
				
						<form class="form-horizontal" method="post" action="proses.php" enctype="multipart/form-data">
							<fieldset>
								<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Makmal:</label>
								<div class="controls">
								  <select class="input-xlarge focused" name="nama_makmal" id="focusedInput" placeholder="pic" >
								  	<option ><?php echo $row['nama_makmal']; ?></option>
								</select>
								</div>
								</div>
								
								<div class="control-group">
								<label class="control-label" for="focusedInput">Kapasiti Pelajar:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="kapasiti_pel" id="focusedInput" type="text" placeholder="kepasiti Pelajar" value="<?php echo $row['kapasiti_pelajar']; ?>" required>
								</div>
								</div>
								<div class="control-group">
								<label class="control-label" for="focusedInput">Kapasiti Guru:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="kapasiti_guru" id="focusedInput" type="text" placeholder="kepasiti Guru" value="<?php echo $row['kapasiti_guru']; ?>" required>
								</div>
								</div>

								<div class="field-wrapper">
								<div class="control-group" >
								<label class="control-label" for="focusedInput">Kemudahan:</label>
								<div class="controls">
								  <textarea rows="3" cols="20" class="input-xlarge focused" name="kemudahan" id="focusedInput"  placeholder="printer , projector etc...."><?php echo $row['kemudahan']; ?></textarea> 
								</div>
								</div>
								</div>
								
								<div class="control-group">
               					<label class="control-label" for="focusedInput">Image:</label>
               					<div class="controls">
                  				<input class="input-xlarge focused" name="image" id="focusedInput" type="file" placeholder="image" value="<?php echo $row['image']; ?>">
                				</div>
               					 </div>
							

								
							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary" name="edit_makmal">Kemaskini </button>
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

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->