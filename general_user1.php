<?php
	require_once("functions/function.php");
	get_header();	
	get_sidebar();
	get_conn();
	?>

	<div id="content" class="span10">
	<ul class="breadcrumb">
	<!--<li>
			<i class="icon-home"></i>
			<a href="p_makmal1.php">p_makmal1</a> 
			<i class="icon-angle-right"></i>
		</li>-->
		<li><a href="general_user1.php">Dashboard</a></li>
	</ul>
	<?php get_err_message();



	?>

	<p>
	<img src="img/sistem.png" align="center"><br> <br>

	<h5>  
		Tujuan sistem ini dibangunkan ialah untuk : <br> <br>
		<ul>
			<li> Memudahkan pensyarah mengisi maklumat berkenaan penggunaan maklumat </li>
			<li> Membantu penyelenggara mengenalpasti tarikh dan waktu penyelenggaraan yang ditetapkan </li>
			<li> Sebagai rujukan bagi pihak yang berkaitan </li>
		</ul>

	</h5>
</p>

		</div><!--span 10 end-->
		</div><!--/row-fluid end-->
	</div><!--/container-fluid-full end-->


	<div class="clearfix"></div>	
	<footer>
		<p>
			<span style="text-align:left;float:left">&copy; 2017 <a href="#" alt="Administrator Panel">
			Sistem Pengurusan Maklumat Makmal Komputer KVPJB</a></span>				
		</p>
	</footer>
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery-migrate-1.0.0.min.js"></script>
		<script src="js/jquery-ui-1.10.0.custom.min.js"></script>
		<script src="js/jquery.ui.touch-punch.js"></script>
		<script src="js/modernizr.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.cookie.js"></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='js/jquery.dataTables.min.js'></script>
		<script src="js/excanvas.js"></script>
		<script src="js/jquery.flot.js"></script>
		<script src="js/jquery.flot.pie.js"></script>
		<script src="js/jquery.flot.stack.js"></script>
		<script src="js/jquery.flot.resize.min.js"></script>
		<script src="js/jquery.chosen.min.js"></script>
		<script src="js/jquery.uniform.min.js"></script>		
		<script src="js/jquery.cleditor.min.js"></script>	
		<script src="js/jquery.noty.js"></script>
		<script src="js/jquery.elfinder.min.js"></script>	
		<script src="js/jquery.raty.min.js"></script>	
		<script src="js/jquery.iphone.toggle.js"></script>	
		<script src="js/jquery.uploadify-3.1.min.js"></script>	
		<script src="js/jquery.gritter.min.js"></script>	
		<script src="js/jquery.imagesloaded.js"></script>	
		<script src="js/jquery.masonry.min.js"></script>	
		<script src="js/jquery.knob.modified.js"></script>	
		<script src="js/jquery.sparkline.min.js"></script>	
		<script src="js/counter.js"></script>
		<script src="js/retina.js"></script>
		<script src="js/custom.js"></script>
	</body>
</html>
