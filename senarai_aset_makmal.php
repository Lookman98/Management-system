<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadadminaset_senarai();
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
							  	 
								  <th>Tarikh</th>
								  <th>Nama Makmal</th>
								  <th>Actions</th>

							  </tr>
						  </thead>
						  <tbody>
							<?php
 						
						include("includes/connection.php");
						
						$sql="SELECT * FROM aset";
						
						$query=mysql_query($sql);
						$i=1;
?>

          				  <?php while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>
								
								<td><?php echo $row['tarikh_rekod']; ?></td>
								<td><?php echo $row['nama_makmal']; ?></td>
								
							
								<td class="center">
									
									<a class="btn btn-info" href="adminaset_view.php?adminaset_view=<?php echo $row['nama_makmal']; ?>">
										<i class="halflings-icon white search"></i>  
									</a>

									<!--<a class="btn btn-info" href="adminaset_edit.php?adminaset_edit=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									
									<a class="btn btn-info" href="print_aset.php?print_aset=<?php echo $row['id_rekod']; ?>">
										<i class="halflings-icon white print"></i>  
									</a>-->

									<a class="btn btn-danger" onclick="return confirmDel()" href="senarai_aset_makmal.php?delaset=<?php echo $row['nama_makmal'];?>">
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
