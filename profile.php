	<?php

	require_once("functions/function.php");
		
	get_header();
	get_sidebar();
	get_bread_edit_profile();
	get_conn();
	

	$usertype=$_SESSION['sess_usertype'];

	$id=$_SESSION['sess_id'];
	$sql="SELECT * FROM users Where id='$id'";
 	$result=mysql_query($sql);

	
	if(isset($_POST['edit_profile'])){
	$username=$_POST['username'];
	$nama=$_POST['nama'];
	$pw = md5($_POST['txtpassword']);

				if(empty($_POST['txtpassword']))
				{

							$sql = "UPDATE users 
						        	SET username='$username' , name='$nama' Where id='$id'";
						     $query=mysql_query($sql);
						     if($query){
						   		
						      	header("Location:profile.php?e_success=".$id);
						     
						     }
						     else
						     {	
						     	
						     	header("Location:profile.php?e_fail=".$id.'&user_exists');
						     	
						     }
				}
				else
				{

							$sql = "UPDATE users 
						        	SET username='$username' , name='$nama' , password='$pw'  Where id='$id'";
						     $query=mysql_query($sql);
						     if($query){
						   		
						      	header("Location:profile.php?e_success=".$id);
						     
						     }
						     else
						     {	
						     	
						     	header("Location:profile.php?e_fail=".$id.'&user_exists');
						     	
						     }
			 	}
	}


	get_err_message();
?>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon white edit"></i><span class="break"></span>Tukar Katalaluan</h2>
						<div class="box-icon">
							<a href="users.php" class="btn-close"><i class="halflings-icon white remove"></i></a>
						</div>
					</div>
					<div class="box-content">
					<?php while($row=mysql_fetch_array($result)) {?>
				
						<form class="form-horizontal" method="post" action="profile.php" enctype="multipart/form-data">
							<fieldset>
							
							
							<div class="control-group">
								<label class="control-label" for="focusedInput">Username:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="username" id="focusedInput" type="text" placeholder="Password"
								  value="<?php echo $row['username']; ?>">
							  </div>
							  </div>

							 <div class="control-group">
								<label class="control-label" for="focusedInput">Nama:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="nama" id="focusedInput" type="text" placeholder="Password"
								  value="<?php echo $row['name']; ?>">
							  </div>
							  </div>

							  <div class="control-group">
								<label class="control-label" for="focusedInput">Katalaluan Baru:</label>
								<div class="controls">
								  <input class="input-xlarge focused" name="txtpassword" id="focusedInput" type="password" placeholder="Password">
							  </div>
							  </div>
							  <div class="form-actions">
								<button type="submit" onclick="return confirmUpdate()" class="btn btn-primary" >Kemaskini</button>
								<input type="hidden" name="edit_profile" value="">
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

	
<!-- 	<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-content">
			<ul class="list-inline item-details">
				<li><a href="http://themifycloud.com">Admin templates</a></li>
				<li><a href="http://themescloud.org">Bootstrap themes</a></li>
			</ul>
		</div>
	</div> -->