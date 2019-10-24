
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_pic_papar_penyelenggaraan();
	get_err_message();
	get_proses();
?>

<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Jadual Penyelenggaraan Makmal</h2>
						<!--<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon white wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>-->
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  	  <th>Nama Penyelenggara</th>
							  	  <th>Makmal</th>
								  <th>Tarikh</th>
								  <th>Masa Masuk</th>
								  <th>Masa Keluar</th>
								  <th>Jenis Kerosakan</th>
								  <th>Catatan</th>
								  <th>Tindakan</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
							get_conn();
							$n_makmal = $_SESSION['sess_nama_makmal'];
							$sql="SELECT * FROM penyelenggaraan WHERE nama_makmal = '$n_makmal'";
							$query=mysql_query($sql);
							$i=1;
							?>

          				  <?php while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>
								<td><?php echo $row['nama_penyelenggara']; ?></td>
								<td><?php echo $row['nama_makmal']; ?></td>
								<td><?php echo $row['tarikh']; ?></td>
								<td><?php echo $row['m_masuk']; ?></td>
								<td><?php echo $row['m_keluar']; ?></td>
								<td><?php echo $row['j_rosak']; ?></td>
								<td><?php echo $row['catatan']; ?></td>
								<td class="center">
									<a class="btn btn-info" href="edit_penyelenggaraan.php?edit_penyelenggaraan=<?php echo $row['bil']; ?>">
										<i class="halflings-icon white edit"></i>  
									</a> 
									<a class="btn btn-danger" onclick="return confirmDel()" href="pic_papar_penyelenggaraan.php?delpenyelenggaraan=<?php echo $row['bil'];?>">
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