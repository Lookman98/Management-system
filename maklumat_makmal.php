

<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_breadmakmal();
	get_err_message();
	$makmal=$_SESSION['sess_nama_makmal'];

?>


	<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Maklumat Makmal</h2>
						<!--<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered "><!--bootstrap-datatable datatable-->
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

				$sql="SELECT makmal.nama_makmal,makmal.blok,makmal.tingkat,makmal.kapasiti_guru,makmal.kapasiti_pelajar,makmal.kemudahan,makmal.image
				FROM makmal
			    JOIN users
				ON makmal.nama_makmal=users.nama_makmal
				WHERE makmal.nama_makmal='".$makmal."';";
				$query=mysql_query($sql);
				while($row=mysql_fetch_array($query))

				 {?>

							<!--open of while -->
							<tr>
							
							<td style="text-align: center;"><?php echo $row['nama_makmal']; ?></td>
							<td style="text-align: center;"><?php echo $row['blok']; ?></td>
							<td style="text-align: center;"><?php echo $row['tingkat']; ?></td>
							<td style="text-align: center;"><?php echo $row['kapasiti_guru']; ?></td>
							<td style="text-align: center;"><?php echo $row['kapasiti_pelajar']; ?></td>
							<td style="text-align: center;"><?php echo $row['kemudahan']; ?></td>
							<td><img src="images/<?php echo $row['image']; ?>" width="100px" height="140px" class="img-rounded"></td>
															
								<td class="center">
									<a class="btn btn-info" title="Edit Data" href="edit_makmal.php?edit_makmal=<?php echo $row['nama_makmal']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a>
									<!--
									<a class="btn btn-info" href="upload_image.php?upload=<?php echo $row['id_makmal'];?>">
										<i class="halflings-icon white picture"></i> 
									</a>-->
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
