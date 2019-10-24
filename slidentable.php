



<?php
require_once('functions/function.php');
get_conn();
if(isset($_POST['option']))
{
  if($_POST['option']){
 $makmal = $_POST['option'];
 $sql="SELECT image FROM makmal
        WHERE makmal.nama_makmal='$makmal';";
// $sql="SELECT * FROM gallery WHERE username='azizah'";
 $query=mysql_query($sql);
 while($row=mysql_fetch_array($query)) { ?>
      <img src="images/<?php echo $row['image'];?>" class="img-rounded" width='870px' height='400px'>
<?php }  ?>
 
  </div>
<p><br>
<?php 

$sql1="SELECT makmal.nama_makmal,makmal.blok,makmal.tingkat,makmal.kapasiti_guru,makmal.kapasiti_pelajar,makmal.kemudahan,users.name
FROM makmal
LEFT JOIN users
ON makmal.nama_makmal=users.nama_makmal
WHERE makmal.nama_makmal='$makmal'";
$query1=mysql_query($sql1);
while($rows=mysql_fetch_array($query1))
  {
?>

<table  class="table table-striped table-bordered bootstrap-datatable datatable" >
  <tr>
    <th>NAMA MAKMAL</th>
    
    <td><?php echo $rows['nama_makmal'];?></td>
  
  </tr>

  <tr>
    <th>PIC</th>


    <td><?php echo $rows['name'];?></td>
  </tr>
  <tr>
    <th>KEDUDUKAN</th>
    <td>Blok <?php echo $rows['blok'];?> , Tingkat <?php echo $rows['tingkat'];?></td>
  </tr>
  <tr>
    <th>KAPASITI</th>
    <td>
      <ul>
        <li>GURU :  <?php echo $rows['kapasiti_guru'];?></li>
        <li>PELAJAR : <?php echo $rows['kapasiti_pelajar'];?></li>
      </ul>
    </td>
  </tr>
  <tr>
    <th>KEMUDAHAN</th>
    <td>
      <?php echo $rows['kemudahan'];?>
       
     
    </td>
  </tr>

</table>
<?php }}} ?>
