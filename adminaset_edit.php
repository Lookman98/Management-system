<?php
	require_once("functions/function.php");
	get_conn();
	get_header();
	get_sidebar();
	get_breadadminaset_edit();
  date_default_timezone_set("Asia/Kuala_Lumpur") ;
  $currentdate=date('F j,Y');

  $item=$_GET['edit_invent'];
  $n_makmal=$_GET['n_makmal'];
  
  $sql="SELECT * FROM inventory WHERE jenis_item='$item' AND nama_makmal='$n_makmal'";
  $result=mysql_query($sql);
  while($row=mysql_fetch_array($result)) {

 	get_err_message();

?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Kemaskini Inventori Makmal</h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
					
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>

							<div class="control-group">
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="hidden" name="id_rekod" value="<?php echo $row['id_rekod']; ?>">
								</div>
							 </div>

							<div class="control-group">
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="hidden" name="n_makmal" value="<?php echo $row['nama_makmal']; ?>">
								</div>
							 </div>
							 
							<div class="control-group">
								<label class="control-label" for="focusedInput">Nama Aset:</label>
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="text" name="jenis_item" value="<?php echo $row['jenis_item']; ?>">
								</div>
							 </div>

							<div class="control-group">
								<label class="control-label" for="focusedInput">Kuantiti:</label>
								<div class="controls">
									<input class="input-xlarge focused" id="focusedInput" type="number" name="bilangan" value="<?php echo $row['bilangan']; ?>">
								</div>
							 </div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="update_invent" value="<?php echo $item?>">Kemaskini</button>
							  </div>
							</fieldset>
						</form>
						<?php } ?>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
<?php
	get_footer();
?>		
