<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread_three();
	get_err_message();

	if($_SESSION['sess_usertype']!='1'){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
?>
<style>
	.warning{
		color: red;
		font-size: 12px;
	}

</style>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Add New User </h2>
						<div class="box-icon">
							
							<a href="#" class="btn-minimize"><i class="halflings-icon white chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<form class="form-horizontal" method="post" action="proses.php" enctype="multipart/form-data">
							<fieldset>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Username:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="username" id="focusedInput" type="text" placeholder="Username" 
								  required>
								</div>
								</div>				

							  <div class="control-group">
								<label class="control-label" for="focusedInput">UserType:</label>
								<div class="controls">
								<select class="input-xlarge focused" name="usertype" id="focusedInput" placeholder="Usertype" required>
									<option name="usertype" value=""></option>
									<option name="usertype" value="1">Admin</option>
									<option name="usertype" value="2">Admin Aset</option>
									<option name="usertype" value="3">PIC</option>
									<option name="usertype" value="4">General USer</option>
								</select>
								</div>
							  </div>

							  	<div class="control-group">
								<label class="control-label" for="focusedInput">Name:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="name" id="focusedInput" type="text" placeholder="Name" required>
								</div>
							  </div>

 							<div class="control-group">
							  <label class="control-label" for="focusedInput">Nama Makmal:</label>
								<div class="controls">
								<select class="input-xlarge focused" name="nama_makmal" id="focusedInput" type="text" placeholder="id makmal">
							
								
								<option value=" ">----Pilih-----</option>
						 			<?php
						 			
						 			get_conn();
									 	
						 			$sql="SELECT * FROM makmal 
						 			WHERE Not exists
						 			(SELECT nama_makmal FROM users	WHERE makmal.nama_makmal=users.nama_makmal)";
									$query= mysql_query($sql);

									while($rows=mysql_fetch_array($query)){
					    			 ?>						
								<option value="<?php echo $rows['nama_makmal'] ?>" ><?php echo $rows['nama_makmal'] ?></option>
						
									<?php }?>
								 </select>
								</div>
								</div>

							  <div class="form-actions">
								<button type="submit" onclick="return confirmAdd()" class="btn btn-primary" name="add_user">Tambah </button>
							  </div>
							</fieldset>
						</form>
					
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