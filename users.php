<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_two();
	get_err_message();
	if($_SESSION['sess_usertype']!='1'){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
	include('proses.php');

?>
		
 <a href="add_new.php" title="Add New User" style="float: right;"><i class="glyphicon glyphicons-icon user_add"></i></a>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white user"></i><span class="break"></span>Senarai Pengguna</h2>
						<div class="box-icon">
							
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable table-hover table-ms">
						  <thead>
							  <tr>
								  <th style="text-align: center;">Bil</th>
								  <th style="text-align: center;">Username</th>
								 <!-- <th style="text-align: center;">Katalaluan</th>-->
								  <th style="text-align: center;">Nama</th>
								  <th style="text-align: center;">Nama Makmal</th>
								  <th style="text-align: center;">Actions</th>
							  </tr>
						  </thead>
						  <tbody>
							<?php
							include("includes/connection.php");
							$sql="SELECT * FROM users WHERE usertype!='1'";
							$query=mysql_query($sql);
							$i=1;
							?>

          				  <?php while($row=mysql_fetch_array($query)) {?>
							<!--open of while -->
							<tr>
								<td style="text-align: center;"><?php echo $i++ ?></td>
								<td style="text-align: center;"><?php echo $row['username']; ?></td>
								<!--<td style="text-align: center;"><?php echo $row['password']; ?></td>-->
								<td style="text-align: center;"><?php echo $row['name']; ?></td>
								<td style="text-align: center;"><?php echo $row['nama_makmal']; ?></td>
								<!--<td><center><img src="images/<?php echo $row['picture']; ?>" width="100px" height="570px"></center></td>-->
								<td class="center" style="text-align: center;">
									<a class="btn btn-info" href="edit_user.php?uName=<?php echo mysql_real_escape_string($row['username']); ?>" title="Edit Data">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" title="Delete Data" onclick="return confirmDel()" href="users.php?deluser=<?php echo mysql_real_escape_string($row['username']); ?>">
										<i class="halflings-icon white trash"></i> 
									</a>
									<a class="btn btn-danger" title="Reset Default Password" onclick="return confirmDel()" href="users.php?resetpass=<?php echo mysql_real_escape_string($row['username']); ?>">
										<i class="halflings-icon white lock"></i> 
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

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->