<?php 
	require_once("functions/function.php");
	get_conn();

	$id_rekod=$_GET['picprint_aset'];
	$sql = "SELECT * FROM aset WHERE id_rekod='$id_rekod'";
	$result=mysql_query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Print Aset</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
	
	.row.content {height: 800px};
</style>
<script type="text/javascript">
    function printpage() {
 		//Get the print button and put it into a variable
        var printpage = document.getElementById("printpage");
        //Set the print button visibility to 'hidden' 
        printpage.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printpage.style.visibility = 'visible';
    }
</script>
</head>

<body>

  <div class="col-sm-2 sidenav">
   </div>
  <div class="col-sm-8 text-left"> 
 <?php while($row=mysql_fetch_array($result)) { 

 	$i=1;
 	?>
<pre>
<center>
<div style="text-align: right;">KEW.PA-7</div>
<div style="text-align: left;"><input id="printpage" type="button" value="print page" onclick="printpage()"/></div>
SENARAI ASET AHLI KERAJAAN
BAHAGIAN:KOLEJ VOKASIONAL PERDAGANGAN JOHOR BAHRU
LOKASI:<?php echo $row['nama_makmal']; ?>


<table border="1">
	 <thead>
			  <tr>				  	 
			  <th style="padding-right: 10px; text-align: center;" >Bil</th>
			  <th style="padding-right: 400px;">Jenis Item</th>
			  <th style="padding-right: 100px; text-align: center;">Kuantiti</th>
			  </tr>
	</thead>

	<tbody>

	<?php 

	$sql1="SELECT* FROM inventory WHERE id_rekod='$id_rekod'";
	$query1=mysql_query($sql1);

	while($row=mysql_fetch_array($query1)) { ?>

			  <tr>
				  <td><?php echo $i++ ?></td>
				  <td><?php echo $row['jenis_item']; ?></td>
				  <td><?php echo $row['bilangan']; ?></td>
			  </tr>
	<?php } ?>

	</tbody>
</table>



(a) Disediakan Oleh :				(b) Disahkan Oleh :




Nama: .................................		Nama: ..................................
Jawatan: ..............................		Jawatan: ...............................

Tarikh: ...............................		Tarikh: ................................


Nota:-                                                                                  
</center>
	(a) Disediakan oleh Pegawai Aset.
	(b) Pegawai yang mengesahkan ialah pegawai yang bertanggungjawab 
		keatas aset berkenaan contohnya :
		(i) Lokasi Bilik Setiausaha Bahagian - disahkan oleh Setiausaha Bahagian.
		(ii) Lokasi Bilik Mesyuarat - disahkan oleh pegawai yang menguruskan 
			 Bilik Mesyuarat.
	(c) Dikemaskini apabila terdapat perubahan kuantiti, lokasi atau pegawai 
	    bertanggungjawab.

</pre>
<?php } ?> <!-- end while  -->
</div>
<div class="col-sm-2 sidenav">
 </div>

</body>
</html>


<!--<div style="padding-bottom: 20px;">
<div style="float: left; padding-left: 90px; ">
(a) Disediakan Oleh :




Nama: .................................
Jawatan : .............................

Tarikh : ..............................
</div>

<div style="float:right; padding-right:  96px; margin-top: -35px;">
(b) Disahkan Oleh :




Nama: .................................
Jawatan : .............................

Tarikh : ..............................
</div>
</div>-->


<!--<div style="padding-top: 20px; text-align: left;">
		Nota:-
		(a) Disediakan oleh Pegawai Aset.
		(b) Pegawai yang mengesahkan ialah pegawai yang bertanggungjawab 
			keatas aset berkenaan contohnya :
			(i) Lokasi Bilik Setiausaha Bahagian - disahkan oleh 
				Setiausaha Bahagian.
			(ii) Lokasi Bilik Mesyuarat - disahkan oleh pegawai yang 
			     menguruskan Bilik Mesyuarat.
		(c) Dikemaskini apabila terdapat perubahan kuantiti, lokasi atau pegawai 
		    bertanggungjawab.
</div>-->