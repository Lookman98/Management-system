<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadpic_senaraiaset();
	get_err_message();

?>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Senarai Maklumat Aset Makmal</h2>
						<!--<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable table-hover table-ms"><!--bootstrap-datatable datatable-->
						  <thead>
							  <tr>
							  	 
								  <th>Nama Aset</th>
								  <th>Kuantiti</th>
								  <th>Kemaskini Terkini</th>
								  <th >Actions</th>

							  </tr>
						  </thead>
						  <tbody>
							<?php
 						
						get_conn();
						$makmal = $_SESSION['sess_nama_makmal'];					
						$sql="SELECT * FROM inventory WHERE nama_makmal='".$makmal."'";
						$query=mysql_query($sql);
					    while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>
								
								<td><?php echo $row['jenis_item']; ?></td>
								<td><?php echo $row['bilangan']; ?></td>
								<td><?php echo $row['tarikh_kemaskini']; ?></td>
								
							
								<td>
									
									<!--<a class="btn btn-info" href="view_aset.php?view_aset=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white search"></i>  
									</a>

									<a class="btn btn-info" href="pic_print_aset.php?picprint_aset=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white print"></i>  
									</a>

									<a class="btn btn-info" href="adminaset_edit.php?adminaset_edit=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>-->
									<a class="btn btn-info" href="pic_edit_aset.php?picedit_invent=<?php echo $row['jenis_item'];?>&n_makmal=<?php echo $_SESSION['sess_nama_makmal'];?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									
								
									<a class="btn btn-danger" onclick="return confirmDel()" href="pic_senarai_aset.php?picdel_inventori=<?php echo $row['jenis_item']; ?>&n_makmal=<?php echo $_SESSION['sess_nama_makmal']; ?>">
										<i class="halflings-icon white trash"></i> 
									</a>

									
								</td>
							</tr>
							<?php
							   } //close of while
							?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div>

<?php
	get_footer();
?>		
