
								<div class="control-group">
							  <label class="control-label" for="focusedInput">Nama Makmal:</label>
								<div class="controls">
								<select class="input-xlarge focused" name="nama_makmal" id="focusedInput" type="text" placeholder="">
							
								
								<option value="">----Pilih-----</option>
								<?php
								require_once('functions/function.php');
									get_conn();
									if(isset($_POST['get_option']))
									{
									 

									 $usertype = $_POST['get_option'];
									 $find=mysql_query("SELECT * from makmal WHERE usertype='3'");
									 while($row=mysql_fetch_array($find))
									 {
									  echo "<option>".$row['nama_makmal']."</option>";
									 }
									 exit;
									}
									?>


						 		<!--  	<?php
						 			/*
						 			get_conn();
									 	
						 			$sql="SELECT * FROM makmal 
						 			WHERE Not exists
						 			(SELECT nama_makmal FROM users	WHERE makmal.nama_makmal=users.nama_makmal)";
									$query= mysql_query($sql);

									while($rows=mysql_fetch_array($query)){
					    			 ?>						
								<option value="<?php echo $rows['nama_makmal'] ?>" ><?php echo $rows['nama_makmal'] ?></option>
						
									<?php } */?>-->
								 </select>
								</div>
								</div>