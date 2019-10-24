<?php
session_start();

if (isset($_SESSION['sess_username'])) {
$type=$_SESSION['sess_usertype'];
if($type==1){
  header('location:adminpanel.php');
  exit(0);
}
elseif ($type==2) {
  header('location:admin_aset.php');
  exit(1);
}
elseif ($type==3) {
  header('location:admin_cyber.php');
    exit(2);
}
elseif ($type==4) {
  header('location:penggunaan.php');
  exit(3);
}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>SPMMK</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/bootstrap3.3.7.min.css">
   <!--<link rel="shortcut icon" href="img/favicon.ico">-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link rel="icon" href="images/favicon.ico">
   <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;

    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 800px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    .contact{
      float: right;
    }
    .contact a{
      padding-right: 10px;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<div id="header">
  
  <img src="images/headers.png" width="100%" height="350px">

</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <!-- <a class="navbar-brand" href="#">Logo</a>-->
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="http://localhost/pta2/spmmk/"><span class="glyphicon glyphicon-home"></span> Halaman Utama</a></li>
         <li><a href="info_makmal.php"><span class="glyphicon glyphicon-info-sign"></span> Info Makmal</a></li>
         <!--<li><a href="#">Projects</a></li>
        <li><a href="#">Contact</a></li>-->
      </ul>
     <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a href="#loginform" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-log-in"></span> Log Masuk</a>
        <ul class="dropdown-menu">
           <li>
            <?php
             require_once("functions/function.php");
               get_loginform();
             ?>
          </li>
          </ul>
        </li>
     </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    <!--
      <a href="#">
      <div class="well"><p>Pengurusan Aset</p>
      </div>
      </a>-->
      <!--<p><a href="#" class="well" >Link</a></p><br>
      <a href="#"><div class="well"><p>Penggunaan Makmal<p></div></a>-->
    </div>
    <div class="col-sm-8 text-left"> 
    <?php 
    require_once('functions/function.php');
    echo'<p>';
    get_err_message();
    ?>
<!--
    <?php
    /*
    require_once('functions/function.php');
    get_slideindex()*/
    ?>-->
    <h1 style="text-align: center; margin-top: 30px;">SISTEM PENGURUSAN MAKLUMAT MAKMAL KOMPUTER</h1>
     <hr >

    <P style="text-align: justify; font-size: 24px;  ">Sistem ini dibangunkan untuk menjadi medium penyampaian maklumat asas tentang kemudahan makmal komputer di Kolej Vokasional Perdagangan Johor Bahru kepada umum . Selain itu , sistem ini juga terdapat modul Sistem Aset dan Sistem Penggunaan Makmal Komputer. Sistem aset membantu serta memudahkan <i>PIC</i> makmal komputer untuk mengemaskini maklumat aset makmal komputer yang dipertanggungjawabkan sahaja. Manakala, Sistem Penggunaan Makmal Komputer adalah untuk meyimpan rekod penggunaan makmal komputer . Sistem Aset dan Sistem Penggunaan Makmal Komputer hanya boleh diakses oleh pengguna yang berdaftar sahaja .
    </P>
   
    </div>
    <div class="col-sm-2 sidenav">
      <!--<div class="well">
        <p>Aset</p>
      </div>
      <div class="well">
        <p>Makmal</p>
      </div>-->
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>
      <span style="text-align:left;float:left"><span class=" glyphicon glyphicon-copyright-mark"></span> 2017
      Sistem Pengurusan Maklumat Makmal Komputer KVPJB </span> 
      
      <span style="text-align:right;float:right;" class="glyphicon glyphicon-envelope" > mikeyluqman98@gmail.com</span> 
      <span style="text-align:right;float:right;padding-right: 15px;" class="glyphicon glyphicon-phone-alt"> 0197616442</span> 
      
        
       
       
    </p>
</footer>

</body>
</html>