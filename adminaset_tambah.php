<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadadminaset_tambah();
  	date_default_timezone_set("Asia/Kuala_Lumpur") ;
  	get_err_message();
  	$currentdate=date('F j,Y');

 

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
							  <div class="control-group">
								<label class="control-label" for="focusedInput">Tarikh Rekod:</label>
								<div class="controls">
								  <input type="text" name="tarikh_rekod" value="<?php echo $currentdate; ?>">
								</div>
								</div>

							

							<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Makmal:</label>
								<div class="controls">
									<select class="input-xlarge focused" name="nama_makmal" id="focusedInput" placeholder="nama makmal">
										<option  value="">--Pilih--</option>
										<?php 
										get_conn();
										$sql=" SELECT * FROM makmal WHERE Not exists
						 					(SELECT nama_makmal FROM aset	WHERE makmal.nama_makmal=aset.nama_makmal)";
										$query=mysql_query($sql);
										while($row=mysql_fetch_array($query)){

										?>

										<option value="<?php echo $row['nama_makmal'];?>"><?php echo $row['nama_makmal'];?></option>
										<?php } ?>
									</select>
								</div>
							 </div>

							 <!--
							 <div class="control-group">
								<label class="control-label" for="focusedInput">Nama:</label>
								<div class="controls">
								  <input type="text" name="nama" value="<?php echo $_SESSION['sess_name'];?>">
								</div>
							</div>
							-->
							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="adminadd_aset">Tambah</button>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		
