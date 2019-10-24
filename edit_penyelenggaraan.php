
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_edit_penyelenggaraan();
	get_err_message();

?>



<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Kemaskini Penyelenggaraan </h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
					<?php
					
					get_conn();
					$bil=$_GET['edit_penyelenggaraan'];
					$sql="SELECT * FROM penyelenggaraan WHERE bil='$bil'";
					$query=mysql_query($sql);
					while($row=mysql_fetch_array($query)){
					 ?>
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>
							
																
								<input type="hidden" name="type" value="$usertype">
								<input type="hidden" name="bil"  value="<?php echo $row['bil'];?>">
								 <div class="control-group">
								<label class="control-label" for="focusedInput"> Jenis Kerosakan  </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="j_rosak" id="focusedInput" type="text" value="<?php echo $row['j_rosak'];?>">
								</div>
								</div>
							    <div class="control-group">
  								 <label class="control-label" for="comment"> Catatan </label>
  								 <div class="controls">
								   <textarea class="form-control" rows="5" col="10" name="catat">
								   <?php echo $row['catatan']; ?></textarea>
								  </div>
								</div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="edit_selenggara">Kemaskini</button>
							  </div>
							</fieldset>
						</form>
					
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

		</div><!--span 10 end-->
		</div><!--/row-fluid end-->
	</div><!--/container-fluid-full end-->


<?php  }
get_footer();
?>



	