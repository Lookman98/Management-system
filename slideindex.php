
<style>
/* css slideshow */
.cycle-slideshow {
  margin-top: 30px;
  width: 1024px;
  overflow: hidden;
}

.cycle-slideshow>img {
  width:100%;
  float:left;
}

/* Next and Previous button at slider*/
.cycle-next , .cycle-prev {
  font-size: 1000px;
  z-index: 9999;
  cursor: pointer;
  position: absolute;
  float:left;
  color: #000000;
  opacity: .8;
  border:1px solid#fff;
  margin-top:65px;
}

.cycle-next{right:5%;}
.cycle-prev{left:5%;}
/*cycle pager at bottom slider can click
and white color when active*/
.cycle-pager {
  width:100%;
  top:90%;
  position: absolute;
  z-index: 9999;
  cursor:pointer;
  text-align: center;
  display: block;
}

.cycle-pager span {
  width:10px;
  height:10px;
  display: inline;
  border: 1px solid#fff;
  margin:10px;
  text-indent: 100%;
  color:white;
  float: left;
  padding-left: 100px;
  margin-left: 40px;

}

.cycle-pager-active {
  background-color: white;
}

.cycle-slideshow .text {
  color: #000000;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}


.active, .dot:hover {
  background-color: #717171;
}
 .cycle-slideshow {width:100%;}
  .cycle-next , .cycle-prev{font-size: 200%;top:30%;}
  .cycle-pager span {width:3px;float:none;margin-left:2px;padding:0;top:20%;}
</style>


 <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
 <script type="text/javascript" src="js/jquery.cycle2.min.js"></script>
<!-- slideshow -->

<div class="cycle-slideshow">
        <div class="cycle-next">&#10095</div>
       <div class="cycle-prev">&#10094</div>
<?php

include('includes/connection.php');

 $sql="SELECT gambar_gallery FROM users
        LEFT JOIN gallery
        ON gallery.username=users.username
        LEFT JOIN makmal
        ON users.username=makmal.username
        ";
// $sql="SELECT * FROM gallery WHERE username='azizah'";
 $query=mysql_query($sql);
 while($row=mysql_fetch_array($query)) { ?>
      <img src="images/<?php echo $row['gambar_gallery'];?>" width='870px' height='400px'>
<?php }  ?>
 
  </div>