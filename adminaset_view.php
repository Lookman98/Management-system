<?php
	require_once("functions/function.php");

	get_conn();
	get_header();
	get_sidebar();
	get_breadadminaset_view();
	get_err_message();


	$n_makmal=$_GET['adminaset_view'];
	$sql = "SELECT * FROM aset WHERE nama_makmal='$n_makmal'";

	$result=mysql_query($sql);
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Inventori Makmal </h2>
						<div class="box-icon">
							
						</div>
					</div>
					
					<div class="box-content">
					<?php while($row=mysql_fetch_array($result)) {?>
				
					<form class="form-horizontal" method="post" action="proses.php" enctype="multipart/form-data">
							<fieldset>

								
							<div class="control-group">
							<label class="control-label" for="focusedInput">Tarikh Rekod</label>
							<div class="controls">
							<input class="input-xlarge focused" name="tarikh_rekod" id="focusedInput" type="text" placeholder="tarikh_rekod" 
								  value="<?php echo $row['tarikh_rekod']; ?>" disabled>
								</div>
							</div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Makmal</label>
								<div class="controls">
								 <input class="input-xlarge focused" name="nama_makmal" id="focusedInput" type="text" placeholder="nama makmal" 
								  value="<?php echo $row['nama_makmal']; ?>" disabled>
								</div>
							  </div>

							<a href="add_inventory.php?>" title="Tambah Aset" style="float: right;"><i class="halflings-icon plus "></i></a>

					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	 
								  <th>Nama Aset</th>
								  <th>Kuantiti</th>
								  <th>Tarikh Kemaskini</th>
								  <th>Actions</th>

							  </tr>
						  </thead>
						  <tbody>
							<?php
 				

						$n_makmal=$_GET['adminaset_view'];

						$sql1="SELECT * FROM inventory WHERE nama_makmal='$n_makmal'";
						
						$query1=mysql_query($sql1);
						$i=1;
					?>

          				  <?php while($row=mysql_fetch_array($query1)) {?>
							<tr>
								
								<td><?php echo $row['jenis_item']; ?></td>
								<td><?php echo $row['bilangan']; ?></td>
								<td><?php echo $row['tarikh_kemaskini']; ?></td>
								
							
								<td class="center">
									
									<!--<a class="btn btn-info" href="adminaset_view.php?adminaset_view=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white search"></i>  
									</a>-->

									<a class="btn btn-info" href="adminaset_edit.php?edit_invent=<?php echo $row['jenis_item'];?>&n_makmal=<?php echo $row['nama_makmal'];?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									
									<a class="btn btn-danger" onclick="return confirmDel()" href="adminaset_view.php?del_inventori=<?php echo $row['jenis_item'];?>&n_makmal=<?php echo $n_makmal;?>">
										<i class="halflings-icon white trash"></i> 
									</a>

									<!--<a class="btn btn-info" href="print_aset.php?print_aset=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white print"></i>  
									</a>-->
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
							<div class="form-actions">		
							  
							  	<a class="btn btn-primary" href="add_inventory.php?add_inventory=<?php echo $n_makmal;?> ">
							  		Tambah Inventori
								</a>
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
