
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_pic_papar_penggunaan();
	get_err_message();
?>
				<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Senarai Penggunaan Makmal</h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable table-hover table-ms">
						  <thead>
							  <tr>
								  <th>Guru</th>
								  <th >Kelas</th>
								  <th >Makmal</th>
								  <th>Masa Masuk</th>
								  <th>Masa Keluar</th>
								  <th>Tarikh</th>
								  <th>Catatan</th>
								  <th>td_keyin</th>
								  <th >Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
							get_conn();
							$n_makmal =  $_SESSION['sess_nama_makmal'];
							$sql="SELECT * FROM penggunaan WHERE nama_makmal = '$n_makmal'";
							$query=mysql_query($sql);
							$i=1;
							?>

          				  <?php while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>
								
								<td ><?php echo $row['g_bertugas']; ?></td>
								<td ><?php echo $row['kelas']; ?></td>
								<td ><?php echo $row['nama_makmal']; ?></td>
								<td ><?php echo $row['m_masuk']; ?></td>
								<td ><?php echo $row['m_keluar']; ?></td>
								<td ><?php echo $row['tarikh2']; ?></td>
								<td ><?php echo $row['catatan']; ?></td>
								<td ><?php echo $row['td_keyin']; ?></td>


								<!--<td><center><img src="images/<?php echo $row['picture']; ?>" width="100px" height="570px"></center></td>-->
								<td class="center" >
									<a class="btn btn-info" href="pic_edit_penggunaan.php?editpenggunaan=<?php echo $row['id_penggunaan']; ?>" title="Edit Data">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" title="Delete Data" onclick="return confirmDel()" href="pic_papar_penggunaan.php?delpenggunaan=<?php echo $row['nama_makmal'];?>">
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
			
			</div><!--/row-->

<?php
	get_footer();
?>	