<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadadminaset();
  	date_default_timezone_set("Asia/Kuala_Lumpur") ;
  	$currentdate=date('F j,Y');
  	$id_rekod=$_GET['add_inventory'];
  	get_err_message();
    get_conn();
    if($_SESSION['sess_usertype']=='1' || $_SESSION['sess_usertype']=='4'){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
	}


?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tambah Inventori</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>
							 
							<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Aset:</label>
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="text" name="jenis_item">
								</div>
							 </div>

							<div class="control-group">
								<label class="control-label" for="focusedInput">Kuantiti:</label>
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="number" name="bilangan" min="1" max="100">
								</div>
							 </div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="add_invent" value="<?php echo $id_rekod?>">Tambah</button>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		
