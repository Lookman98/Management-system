
<?php
include 'includes/connection.php';


if(isset($_POST['login'])){
$un = mysql_real_escape_string($_POST['uname']);
$pwd = md5(mysql_real_escape_string($_POST['pwd']));


$sql1="SELECT * FROM users ";
$result1 = mysql_query($sql1);
$total1=mysql_fetch_array($result1);


$sql = "SELECT * FROM users
        WHERE username='$un' and password='$pwd'";
$result =mysql_query($sql);
$total = mysql_fetch_array($result);


if($total){




  session_regenerate_id();
  
  $_SESSION['sess_id'] = $total['id'];
  $_SESSION['sess_username'] = $total['username'];
  $_SESSION['sess_usertype'] = $total['usertype'];
  //$_SESSION['sess_role']=$total['role'];
  $_SESSION['sess_name']=$total['name'];
  $_SESSION['sess_nama_makmal']=$total['nama_makmal'];
  $_SESSION['sess_password']=md5($total['password']);
  

  echo $_SESSION['sess_usertype'];
  session_write_close();

  if( $_SESSION['sess_usertype'] == "1"){
   header('Location: adminpanel.php');
   

  } 
  elseif ( $_SESSION['sess_usertype'] == "2")
  {
   header('Location: admin_aset.php');
  
  }
  elseif ( $_SESSION['sess_usertype'] == "3")
  {
   header('Location: admin_cyber.php');
  
  }
   elseif ( $_SESSION['sess_usertype'] == "4")
   {
   header('Location: general_user1.php');
  
  }
   else{
  	header('Location: index.php?err=1');
 }
}
else{
  header('Location: index.php?err=1');
}
}


//edit user
if(isset($_POST['edit_user'])){



  $uname=$_POST['txtname'];
  $username=$_POST['edit_user'];
  $name = $_POST['name'];
  $usertype = $_POST['usertype'];
  $nama_makmal=$_POST['nama_makmal'];
 //path to store the uploaded image
  $target="images/" .basename($_FILES['image']['name']);
  $prof_image=$_FILES["image"]['name'];


  //username
  $sql = "UPDATE users 
          SET username='$uname',usertype='$usertype' , name='$name',nama_makmal='$nama_makmal' WHERE username='$username'; ";

   $query=mysql_query($sql);    


   
  if($query)
  {
    header("Location:users.php?e_success");
   }
   else
  {
   header("Location:users.php?e_fail");
   }
  }
 




// add new user
if(isset($_POST['add_user'])){

$uname=mysql_real_escape_string($_POST['username']); // terima data username dari form
//$pass=mysql_real_escape_string($_POST['pass']); // terima data password dari form (pon x guna)
$usertype=$_POST['usertype']; // terima data usertype dari form 
//$role=$_POST['role']; // user role ni x guna
$name=mysql_real_escape_string($_POST['name']); // terima data nama dari form
$nama_makmal=mysql_real_escape_string($_POST['nama_makmal']); // terima data makmal datri form
$pwd = md5('1234'); // data password di hash kan untuk security

$sql="SELECT * FROM users WHERE username='$uname'";
$query=mysql_query($sql);

 
if(mysql_num_rows($query)){
  header('Location:add_new.php?user_exists');

}else{

   $sql2="INSERT INTO users VALUES (DEFAULT,'$uname','$pwd','$usertype','$name','$nama_makmal');";
   $query2=mysql_query($sql2);
 
   if($query2){
    header('Location:users.php?add_success');
    }
    else{
       header('Location:add_new.php?add_fail');
    }
}

}




//delete user
 if (isset($_GET['deluser'])) {

 // $uname = mysql_real_escape_string(trim($_GET['deluser']));
  $uname=$_GET['deluser'];
  $sql = "DELETE FROM users WHERE username = '$uname';";
  $result = mysql_query($sql);

  // Check Data deleted or Not
  if ($result) {

    header("location: users.php?del_success");

  }
  else{
 
    header("location: users.php?del_fail");
 }

}



/*-----------------reset password---------------------*/

if (isset($_GET['resetpass'])) {

  $resetpass=mysql_real_escape_string($_GET['resetpass']);

  $sql="UPDATE users
        SET password=md5('1234') WHERE username='$resetpass'";
   $query=mysql_query($sql);
     if($query){
      header("Location:users.php?reset_success");
     }
     else
     {
      header("Location:users.php?reset_fail");
     }

  }



/*---------------end reset password-------------------*/


/*-------------------tambah makmal----------------------*/


if(isset($_POST['add_makmal'])){

//path to store the uploaded image
$target="images/" .basename($_FILES['image']['name']);

//get all data from the form
$n_makmal=$_POST['n_makmal'];
$blok=$_POST['blok'];
$tingkat=$_POST['tingkat'];
$k_guru=$_POST['kapasiti_guru'];
$k_pelajar=$_POST['kapasiti_pel'];
$kemudahan=$_POST['kemudahan'];
$image=$_FILES['image']['name'];
$default='nopic.png';

 $sql="INSERT INTO makmal VALUES ('$n_makmal' , '$blok' ,'$tingkat','$k_guru','$k_pelajar','$kemudahan','$image');";
 $query=mysql_query($sql);
 if ($query) {
     if($image==null){  
     $sql2="UPDATE makmal SET image = '$default' WHERE nama_makmal='$n_makmal'";
     $query2=mysql_query($sql2);
     if($query2){
      header('Location:maklumat_makmal_admin.php?e_success'); }
      else{
         header('Location:maklumat_makmal_admin.php?def_image');
      }
    }

    else{
    $type=getimagesize($_FILES['image']['tmp_name'] );
    if ($type === false || !in_array( $type[2], array( IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG ) ) )
         { header('location:maklumat_makmal.php?fail_type'); } //if type
    else{
      $sql1="UPDATE makmal 
      SET image='$image'
      WHERE nama_makmal='$n_makmal'";
      $query1=mysql_query($sql1);
       //move to folder
        if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        if($query1){ header('location:maklumat_makmal_admin.php?add_success'); }
        else{ header('location:maklumat_makmal_admin.php?e_fail');}//query1 fail
        }//move folder
        else { header('location:maklumat_makmal_admin.php?fail_folder');}//folder fail
      }//else type
    }// else detect image
 }//if query
 else {
   header('location:maklumat_makmal_admin.php?e_fail');
 }
}//_POST
/*-------------------end tambah makmal----------------------*/


/*------------------------delmakmal------------------------*/

if (isset($_GET['delmakmal'])) {

  $nama_makmal = $_GET['delmakmal'];
  $sql = "DELETE FROM makmal WHERE nama_makmal = '$nama_makmal';";
  $result = mysql_query($sql);

  // Check Data deleted or Not
  if ($result) {
    
    header("location: maklumat_makmal_admin.php?del_success");
  }
  else
 
    header("location: maklumat_makmal_admin.php?del_fail");
 }

/*---------------------end delmakmal------------------------*/

 /*----------------edit makmal------------------------------*/

if(isset($_POST['edit_makmal'])){

//path to store the uploaded image
$target="images/" .basename($_FILES['image']['name']);

//get all data from the form


$nama_makmal=$_POST['nama_makmal'];
$blok=$_POST['blok'];
$tingkat=$_POST['tingkat'];
$k_guru=$_POST['kapasiti_guru'];
$k_pelajar=$_POST['kapasiti_pel'];
$kemudahan=$_POST['kemudahan'];
$image=$_FILES['image']['name'];

 $sql="UPDATE makmal 
      SET kapasiti_guru='$k_guru',kapasiti_pelajar='$k_pelajar',kemudahan='$kemudahan'
      WHERE nama_makmal='$nama_makmal'";
 $query=mysql_query($sql);

 if ($query) {
    if($image==null){
      header('Location:maklumat_makmal.php?e_success');
    }
    else{
    $type=getimagesize($_FILES['image']['tmp_name'] );
    if ($type === false || !in_array( $type[2], array( IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG ) ) )
         {
          header('location:maklumat_makmal.php?fail_type');
        }
      else{
      $sql1="UPDATE makmal 
      SET image='$image'
      WHERE nama_makmal='$nama_makmal'";
      $query1=mysql_query($sql1);

       //move to folder
        if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        if($query1){
           header('location:maklumat_makmal.php?add_success');
          }
        else{
        header('location:maklumat_makmal.php?e_fail');
         }//query1 fail
        }//move folder
        else
        {
           header('location:maklumat_makmal.php?fail_folder');
       }//folder fail
      }//type
    }// else detect image
 }//if query
 else {
   header('location:maklumat_makmal.php?e_fail');
 }
}//_POST



 

/*----------------end edit makmal----------------------------*/

 /*----------------edit makmal admin------------------------------*/

if(isset($_POST['edit_makmal_ad'])){

//path to store the uploaded image
$target="images/" .basename($_FILES['image']['name']);

//get all data from the form

$id_makmal=$_POST['id_makmal'];
$n_makmal=$_POST['n_makmal'];
$blok=$_POST['blok'];
$tingkat=$_POST['tingkat'];
$k_guru=$_POST['kapasiti_guru'];
$k_pelajar=$_POST['kapasiti_pel'];
$kemudahan=$_POST['kemudahan'];
$image=$_FILES['image']['name'];

 $sql="UPDATE makmal 
      SET blok='$blok' , tingkat = '$tingkat' , kapasiti_guru='$k_guru',kapasiti_pelajar='$k_pelajar',kemudahan='$kemudahan'
      WHERE nama_makmal='$n_makmal'";
 $query=mysql_query($sql);

 if ($query) {
    if($image==null){
      header('Location:maklumat_makmal_admin.php?e_success');
    }
    else{
    $type=getimagesize($_FILES['image']['tmp_name'] );
    if ($type === false || !in_array( $type[2], array( IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG ) ) )
         {
          header('location:maklumat_makmal_admin.php?fail_type');
        }
      else{
      $sql1="UPDATE makmal 
      SET image='$image'
      WHERE nama_makmal='$n_makmal'";
      $query1=mysql_query($sql1);

       //move to folder
        if (move_uploaded_file($_FILES['image']['tmp_name'],$target)) {
        if($query1){
           header('location:maklumat_makmal_admin.php?add_success');
          }
        else{
        header('location:maklumat_makmal_admin.php?e_fail');
         }//query1 fail
        }//move folder
        else
        {
           header('location:maklumat_makmal_admin.php?fail_folder');
       }//folder fail
      }//type
    }// else detect image
 }//if query
 else {
   header('location:maklumat_makmal_admin.php?e_fail');
 }
}//_POST



 

/*----------------end edit makmal admin----------------------------*/


//pic tambah aset 
if(isset($_POST['picadd_aset'])){


  $n_aset=$_POST['n_aset'];
  $bilangan=$_POST['bilangan'];
  $n_makmal = $_POST['n_makmal'];
 

 $sql="SELECT * FROM inventory WHERE jenis_item='$n_aset' AND nama_makmal='$n_makmal'";
 $query=mysql_query($sql);
  if(mysql_num_rows($query)){
    header('Location:pic_senarai_aset.php?in_exists');
  }
  else{
        $sql1="INSERT INTO inventory VALUES (DEFAULT,'$n_aset','$bilangan' , CURRENT_TIMESTAMP ,'$n_makmal' )";
        $query1=mysql_query($sql1);
        if($query1){header('Location:pic_senarai_aset.php?add_success');}
        else{header('Location:pic_tambah_aset.php?add_fail');}
  }

}

//pic delete inventory
if(isset($_GET['picdel_inventori'])) {
   $j_aset = $_GET['picdel_inventori'];
  $n_makmal = $_GET['n_makmal'];
  $sql = "DELETE FROM inventory WHERE jenis_item = '$j_aset' AND nama_makmal ='$n_makmal';";
  $result = mysql_query($sql);

  // Check Data deleted or Not
  if ($result) {

    header("location: pic_senarai_aset.php?del_success");

  }
  else{
 
    header("location: pic_senarai_aset.php?del_fail");
 }
}


//pic add inventory
if(isset($_POST['picadd_invent'])) {

  $id_rekod=$_POST['picadd_invent'];
  $jenis_item=$_POST['jenis_item'];
  $bilangan=$_POST['bilangan'];


  $sql="INSERT INTO inventory VALUES ('$id_rekod', '$jenis_item', '$bilangan' , CURRENT_TIMESTAMP)";
  $query=mysql_query($sql);
  if($query) {
    header('Location:view_aset.php?view_aset='.$id_rekod."&add_success");
  }
  else {
    header('Location:view_aset.php?pic_add_inventory='.$id_rekod."&add_fail");
  }
}


//pic edit inventory
if(isset($_POST['picupdate_invent'])){

  $jenis_item= $_POST['jenis_item'];
  $bilangan= $_POST['bilangan'];
  $n_makmal=$_POST['n_makmal'];
  $jenis_items=$_POST['picupdate_invent'];
  $id=$_POST['id'];
 

 $sql="SELECT * FROM inventory WHERE  jenis_item='$jenis_item' AND nama_makmal='$n_makmal'";
 $query=mysql_query($sql);
 $total=mysql_fetch_array($query);
 $ids = $total['id_rekod'];
 $item = $total['jenis_item'];
 $bil = $total['bilangan'];

 if (mysql_num_rows($query)) {
        if($id!=$ids){
         header('Location:pic_edit_aset.php?in_exists&picedit_invent='.$jenis_items.'&n_makmal='.$n_makmal);
        }
        elseif($jenis_item==$item&&$bil==$bilangan){
          header('Location:pic_senarai_aset.php?rec_change');
        }
        else{
            $sql1="UPDATE inventory 
            SET bilangan='$bilangan' , tarikh_kemaskini=CURRENT_TIMESTAMP
            WHERE nama_makmal='$n_makmal' AND jenis_item='$jenis_items'";
            $query2=mysql_query($sql1);
          if($query2){
          header('location:pic_senarai_aset.php?e_success&picedit_invent='.$jenis_item.'&n_makmal='.$n_makmal.'&id='.$id);
           }
         else{
         header('location:pic_edit_aset.php?e_fail&picedit_invent='.$jenis_item.'&n_makmal='.$n_makmal.'&id='.$id);
         }
        }
    }
  else {
      $sql1="UPDATE inventory 
      SET jenis_item='$jenis_item', bilangan='$bilangan' , tarikh_kemaskini=CURRENT_TIMESTAMP
      WHERE nama_makmal='$n_makmal' AND jenis_item='$jenis_items'";
      $query2=mysql_query($sql1);
          if($query2){
          header('location:pic_senarai_aset.php?e_success&picedit_invent='.$jenis_item.'&n_makmal='.$n_makmal.'&id='.$id);
           }
         else{
         header('location:pic_edit_aset.php?e_fail&picedit_invent='.$jenis_item.'&n_makmal='.$n_makmal.'&id='.$id);
         }
    }
}

//pic delete aset
if (isset($_GET['picdelaset'])) {

  $j_aset = $_GET['picdelaset'];
  $n_makmal = $_GET['n_makmal'];
  $sql = "DELETE FROM inventory WHERE jenis_aset = '$j_aset' AND nama_makmal ='$n_makmal';";
  $result = mysql_query($sql);

  // Check Data deleted or Not
  if ($result) {

    header("location: pic_senarai_aset.php?del_success");

  }
  else{
 
    header("location: pic_senarai_aset.php?del_fail");
 }

}




//-------------------------------------------------- admin aset ------------------------------------------------------------------
 
//tambah aset 
if(isset($_POST['adminadd_aset'])){

  $tarikh_rekod=$_POST['tarikh_rekod'];
  $nama_makmal=$_POST['nama_makmal'];
  $sql="SELECT * FROM aset WHERE nama_makmal = '$nama_makmal'";
  $query=mysql_query($sql);

  if(mysql_num_rows($query)){
    header('Location:adminaset_tambah.php?rec_exists');
  }
  else
  {
       $sql1="INSERT INTO aset VALUES (DEFAULT,'$tarikh_rekod','$nama_makmal');";
       $query1=mysql_query($sql1);
           if($query1){
             header('Location:senarai_aset_makmal.php?add_success');
          }else{
           header('Location:adminaset_tambah.php?add_fail');
           }
  }

}

//add inventory
if(isset($_POST['add_invent'])) {

  $n_makmal=$_POST['add_invent'];
  $jenis_item=$_POST['jenis_item'];
  $bilangan=$_POST['bilangan'];

  $sql="SELECT * FROM inventory WHERE jenis_item='$jenis_item' AND nama_makmal='$n_makmal'";
  $query=mysql_query($sql);
  if(mysql_num_rows($query)) {
    header('Location:adminaset_view.php?adminaset_view='.$n_makmal."&in_exists");
  }
  else {
      $sql1="INSERT INTO inventory VALUES (' ' , '$jenis_item', '$bilangan' , CURRENT_TIMESTAMP ,'$n_makmal')";
      $query2=mysql_query($sql1);
        if($query2){
          header('Location:adminaset_view.php?adminaset_view='.$n_makmal."&add_success");
          }
        else{
           header('Location:adminaset_view.php?adminaset_view='.$n_makmal."&add_fail");
          }
  }
}

//delete inventory
if(isset($_GET['del_inventori'])) {
  $n_makmal=$_GET['n_makmal'];
  $jenis_item=$_GET['del_inventori'];
  $sql="DELETE FROM inventory WHERE jenis_item='$jenis_item' AND nama_makmal='$n_makmal'";
  $query=mysql_query($sql);

  if ($query) {
    header('Location:adminaset_view.php?adminaset_view='.$n_makmal."&del_success");
  }
  else {
    header('Location:adminaset_view.php?adminaset_view='.$n_makmal."&del_fail");
  }
}

//edit inventory

if(isset($_POST['update_invent'])){

  $jenis_item= $_POST['jenis_item'];
  $bilangan= $_POST['bilangan'];
  $n_makmal=$_POST['n_makmal'];
  $jenis_items=$_POST['update_invent'];
  $id=$_POST['id_rekod'];
 

 $sql="SELECT * FROM inventory WHERE jenis_item='$jenis_item' AND nama_makmal='$n_makmal'";
 $query=mysql_query($sql);
 $total=mysql_fetch_array($query); 
 $bil=$total['bilangan'];
 $item =$total['jenis_item'];
 $ids = $total['id_rekod'];
 $db_makmal=$total['nama_makmal'];


 if (mysql_num_rows($query)) {
      if($ids!=$id){
         header('Location:adminaset_view.php?in_exists&adminaset_view='.$n_makmal);
       }
       elseif($jenis_item==$item&&$bil==$bilangan){
         header('Location:adminaset_view.php?rec_change&adminaset_view='.$n_makmal);
       }
       else{
          $sql1="UPDATE inventory 
          SET bilangan='$bilangan' , tarikh_kemaskini=CURRENT_TIMESTAMP
          WHERE nama_makmal='$n_makmal' AND jenis_item='$jenis_items'";
          $query1=mysql_query($sql1);
          if($query1){
          header('location:adminaset_view.php?e_success&adminaset_view='.$n_makmal);
           }
         else{
         header('location:senarai_aset_makmal?e_fail&edit_invent='.$jenis_item.'&n_makmal='.$n_makmal);
         }// else query1
       }
    
   }
 else {
      $sql1="UPDATE inventory 
      SET jenis_item='$jenis_item', bilangan='$bilangan' , tarikh_kemaskini=CURRENT_TIMESTAMP
      WHERE nama_makmal='$n_makmal' AND jenis_item='$jenis_items'";
      $query1=mysql_query($sql1);
          if($query1){
          header('location:adminaset_view.php?e_success&adminaset_view='.$n_makmal);
           }
         else{
         header('location:senarai_aset_makmal?e_fail&edit_invent='.$jenis_item.'&n_makmal='.$n_makmal);
         }// else query1
    }//else numrows

  }//if update invent

//delete aset
if (isset($_GET['delaset'])) {

  $n_makmal = $_GET['delaset'];
  $sql = "DELETE FROM aset WHERE nama_makmal = '$n_makmal';";
  $result = mysql_query($sql);

  // Check Data deleted or Not
  if ($result) {

    header("location: senarai_aset_makmal.php?del_success");

  }
  else{
 
    header("location: senarai_aset_makmal.php?del_fail");
 }

}


//tambah penggunaan makmal
if(isset($_POST['tambahpenggunaan'])){

$type=$_POST['type'];
$g_bertugas=$_POST['ckgu'];
$kelas=$_POST['class'];
$makmal=$_POST['lab3'];
$m_masuk=$_POST['time_masuk'];
$m_keluar=$_POST['time_out'];
$tarikh=$_POST['date2'];
$catatan=$_POST['note2'];

$sql="INSERT INTO penggunaan VALUES (DEFAULT,'$g_bertugas' , '$kelas' ,'$makmal','$m_masuk','$m_keluar','$tarikh', '$catatan',CURRENT_TIMESTAMP);";
$query=mysql_query($sql);
if($query){

  if($type==4){header('Location:j_penggunaan.php?add_success'); }
  else{ header('Location:pic_papar_penggunaan.php?add_success'); }

}else{

   if($type==4){header('Location:b_penggunaan.php?add_fail'); }
    else{header('Location:pic_borang_penggunaan.php?add_fail');}

}

}

//del penggunaan
if (isset($_GET['delpenggunaan'])) {

  $nama_makmal = $_GET['delpenggunaan'];
  $sql = "DELETE FROM penggunaan WHERE nama_makmal = '$nama_makmal';";
  $result = mysql_query($sql);

  // Check Data deleted or Not
  if ($result) {
    header('location: pic_papar_penggunaan.php?del_success');

  }
  else
    header('location: pic_papar_penggunaan.php?del_fail');
 }


 //tambah penyelenggaraan makmal
if(isset($_POST['selenggara'])){

$type=$_POST['type'];
$makmal=$_POST['lab2'];
$tarikh=$_POST['date1'];
$m_masuk=$_POST['timein'];
$m_keluar=$_POST['timeout'];
$j_rosak=$_POST['j_rosak'];
$catatan=$_POST['note'];
$n_penyelenggara=$_POST['n_penyelenggara'];


$sql="INSERT INTO penyelenggaraan VALUES (DEFAULT, '$makmal' , '$n_penyelenggara' ,'$tarikh' ,'$m_masuk','$m_keluar','$j_rosak', '$catatan');";
$query=mysql_query($sql);
if($query){

  if($type==4){header('Location:j_penyelenggaraan.php?add_success'); }
  else{ header('Location:pic_papar_penyelenggaraan.php?add_success'); }

}else{

   if($type==4){header('Location:j_penyelenggaraan.php?add_fail'); }
  else{ header('Location:pic_borang_penyelenggaraan.php?add_fail'); }}

}

//del penyelenggaraan
if (isset($_GET['delpenyelenggaraan'])) {

  $bil = $_GET['delpenyelenggaraan'];
  $sql = "DELETE FROM penyelenggaraan WHERE bil = '$bil'";
  $result = mysql_query($sql);

  if ($result) {
    header('location: pic_papar_penyelenggaraan.php?del_success');
  }
  else{
    header('location: pic_papar_penyelenggaraan.php?del_fail');
  }
 }

 if(isset($_POST['edit_selenggara'])){

  $type=$_POST['type'];
  $bil=$_POST['bil'];
  $kerosakkan=$_POST['j_rosak'];
  $catatan=$_POST['catat'];

  $sql="UPDATE penyelenggaraan
        SET catatan='$catatan',j_rosak='$kerosakkan'
        WHERE bil='$bil'";
  $query=mysql_query($sql);

  if ($query) {
  
    header('location:pic_papar_penyelenggaraan.php?e_success');
  }
  else{
  
    header('location:pic_papar_penyelenggaraan.php?e_fail');
    
  }
 }

 if (isset($_POST['pic_edit_penggunaan'])) {
   $id=$_POST['id'];
   $g_bertugas=$_POST['g_bertugas'];
   $kelas=$_POST['kelas'];
   $makmal=$_POST['makmal'];
   $timein=$_POST['time'];
   $timeout=$_POST['time_out'];
   $date=$_POST['date2'];
   $catat=$_POST['catat'];

   $sql="UPDATE penggunaan
         SET g_bertugas='$g_bertugas',kelas='$kelas',nama_makmal='$makmal',m_masuk='$timein', m_keluar='$timeout',tarikh2='$date',catatan='$catat'
         WHERE id_penggunaan='$id'";
  $query=mysql_query($sql);

  if ($query) {
    header('location:pic_papar_penggunaan.php?e_success');
  }
  else{
    header('location:j_penggunaan.php?e_fail&editpenggunaan='.$id);
  }
 }

 if(isset($_POST['edit_penggunaan'])){
  $id=$_POST['id'];
  $g_bertugas=$_POST['g_bertugas'];
  $kelas=$_POST['kelas'];
  $makmal=$_POST['makmal'];
  $catatan=$_POST['catat'];

  $sql="UPDATE penggunaan
        SET catatan='$catatan'
        WHERE id_penggunaan='$id'";
  $query=mysql_query($sql);

  if ($query) {
    header('location:j_penggunaan.php?e_success');
  }
  else{
    header('location:j_penggunaan.php?e_fail]');
  }
 }

?>
