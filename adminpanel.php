
<?php
	require_once("functions/function.php");
	get_header();
	get_sidebar();
	get_bread();
	if($_SESSION['sess_usertype']!='1'){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
	}
?>
	<div class="row-fluid home_text">	
	<h2>SELAMAT DATANG KE HALAMAN ADMINISTRATOR </h2>
 	<hr>

 	
 		<p>
 		Halaman ini membenarkan ADMIN :-
 		<ul>
 			<li>Menguruskan maklumat pengguna</li>
 			<li>Melantik , menukar dan membatalkan PIC</li>
 			<li>Menambah , membuang dan menukar maklumat makmal</li>
 		</ul>
 		
 		</p>
	</div>
<?php
	get_footer();
?>		

