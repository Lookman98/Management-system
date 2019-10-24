<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_pic_edit_penggunaan();
	get_err_message();
?>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span> Kemaskini Penggunaan Makmal </h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
					<?php
					require_once('functions/function.php');
					get_conn();
					$id=$_GET['editpenggunaan'];
					$sql="SELECT * FROM penggunaan WHERE id_penggunaan='$id'";
					$query=mysql_query($sql);
					while($row=mysql_fetch_array($query)){
					 ?>
						<form class="form-horizontal" method="post" action="proses.php">
							<fieldset>
								<input type="hidden" name="id" value="<?php echo $row['id_penggunaan'];?>">
							  <div class="control-group">
								<label class="control-label" for="focusedInput"> Guru Bertugas  </label>
								<div class="controls">
								  <input class="input-xlarge focused" name="g_bertugas" id="focusedInput" type="text" placeholder="Guru Bertugas" 
								  value="<?php echo $row['g_bertugas']; ?>" >
								</div>
								</div>

								 <div class="control-group">
								<label class="control-label">  Kelas  </label>
								<div class="controls">
								<input type="text" class="input-xlarge focused" name="kelas" id="focusedInput" placeholder="Tahun" value="<?php echo $row['kelas']; ?>" >

								

								</div> <br>

								<div class="control-group">
							  <label class="control-label" for="focusedInput">Nama Makmal:</label>
								<div class="controls">
								<select class="input-xlarge focused" name="makmal" id="focusedInput" type="text" placeholder="id makmal">
							
								<option value="<?php echo $row['nama_makmal'] ?>" SELECTED><?php echo $row['nama_makmal'] ?></option>
								<option value=" ">----Pilih-----</option>

						 			<?php
						 			
						 			get_conn();
									 	
						 			$sql="SELECT * FROM makmal ";
									$query= mysql_query($sql);

									while($rows=mysql_fetch_array($query)){
					    			 ?>						
								<option value="<?php echo $rows['nama_makmal'] ?>" ><?php echo $rows['nama_makmal'] ?></option>
						
									<?php }?>
								 </select>
								</div>
								</div>

								<div class="control-group">
								<label class="control-label"> Masa Masuk </label>
								<div class="controls">
								<input class="form-control" id="time" name="time" type="time" value="<?php echo $row['m_masuk'];?>">
								</div>
							  </div>

							  <div class="control-group">
								<label class="control-label"> Masa Keluar </label>
								<div class="controls">
								 <input class="form-control" id="time" name="time_out" type="time" value="<?php echo $row['m_keluar'];?>">
								</div>
							  </div>

							    <div class="control-group">
								<label class="control-label"> Tarikh </label>
								<div class="controls">
								 <input class="form-control" name="date2" placeholder="MM/DD/YYYY" type="date" value="<?php echo $row['tarikh2']; ?>">
								 </div>
							    </div>

								<div class="control-group">
  								 <label class="control-label" name="catatan" for="comment"> Catatan </label>
  								 <div class="controls">
								 <textarea class="form-control" rows="5" col="10" name="catat"><?php echo $row['catatan'];?></textarea>
								  </div>
								</div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary" name="pic_edit_penggunaan"> Kemaskini </button>
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