<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadmakmal();
  	date_default_timezone_set("Asia/Kuala_Lumpur") ;
  	$currentdate=date('F j,Y');
  	get_err_message();
 

?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tambah Rekod Aset</h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>
							  <!--<div class="control-group">
								<label class="control-label" for="focusedInput">Tarikh Rekod:</label>
								<div class="controls">
								  <input type="text" name="tarikh_rekod" value="<?php echo $currentdate ?>">
								</div>
								</div>-->


							<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Aset:</label>
								<div class="controls">
								  <input type="text" name="n_aset">
								</div>
							</div>	


							<div class="control-group">
								<label class="control-label" for="focusedInput">Kuantiti:</label>
								<div class="controls">
								  <input type="text" name="bilangan">
								</div>
							</div>

							 <div class="control-group">
								
							<div class="controls">
								  <input  name="n_makmal" type="hidden" value="<?php echo $_SESSION['sess_nama_makmal'];?>">
								</div>
							</div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="picadd_aset">Tambah</button>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		
