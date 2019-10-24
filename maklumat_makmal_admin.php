<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadmakmal_admin();
	get_err_message();
	
?>



	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Senarai Maklumat Makmal Komputer</h2>
						<div class="box-icon">
							
													
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>

								  <th>Nama Makmal</th>
								  <th>Blok</th>
								  <th>Tingkat</th>
								  <th>Kapasiti Guru</th>
								  <th>Kapasiti Pelajar</th>
								  <th>Kemudahan</th>
								  <th>Gambar</th>
								  <th>Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
							get_conn();
							$sql="SELECT * FROM makmal";
							$query=mysql_query($sql);
							$i=1;
							?>

          				  <?php while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>

								<td><?php echo $row['nama_makmal']; ?></td>
								<td><?php echo $row['blok']; ?></td>
								<td><?php echo $row['tingkat']; ?></td>
								<td><?php echo $row['kapasiti_guru']; ?></td>
								<td><?php echo $row['kapasiti_pelajar']; ?></td>
								<td><?php echo $row['kemudahan']; ?></td>
								<td><img src="images/<?php echo $row['image']; ?>"  width="100px" height="140px" class="img-rounded"></td>
								
								<td class="center">
									<a class="btn btn-info" href="edit_makmal_admin.php?edit_makmal_ad=<?php echo $row['nama_makmal']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirmDel()" href="maklumat_makmal_admin.php?delmakmal=<?php echo $row['nama_makmal'];?>">
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
