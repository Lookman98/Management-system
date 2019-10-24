

<?php
	require_once("functions/function.php");
	get_header();
	//get_sidebarcyber();
	get_sidebar();
	get_breadcyber();
	get_err_message();
	if($_SESSION['sess_usertype']!='3'){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
?>
 	<h2>SELAMAT DATANG PIC <?php echo $_SESSION['sess_nama_makmal']; ?> </h2>
 	<hr>
 	<br>
 	
 		<p>
 		Halaman ini membenarkan <i>PIC</i> :-
 		<ul>
 			<li>Menguruskan maklumat aset</li>
 			<li>Mencetak maklumat aset</li>
 			<li>Merekod maklumat penggunaan makmal komputer</li>
 			<li>Menguruskan maklumat asas tentang kemudahan makmal komputer untuk paparan awam</li>
 		</ul>
 		
 		</p>

	</div>
<?php
	get_footer();
?>		

