<?php

	$server = "localhost";
	$user ="root";	
	$pass = ""	;									
	$database = "febrian";
	$koneksi= mysqli_connect($server,$user,$pass,$database) or die(mysqli_error($koneksi));
    error_reporting(0)

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>crud</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">
</head>
<body>

	<div class="container">

<!--awal navbar-->
<nav class="navbar sticky-top navbar-light  bg-dark">
        <div class="container">
          <a class="navbar-brand text-white" href="data mahasiswa admin.php"><strong>  <i class="fa-solid fa-box"></i>DATA SISWA</strong></a>
            <a class="navbar-brand text-white" href="tambah data.php"><strong><i class="fa-solid fa-pencil"></i>INPUT DATA</strong></a>
            <a class="navbar-brand text-white" href="rank.php"><strong><i class="fa-solid fa-1"></i>RANK SISWA</strong></a>
            <a class="navbar-brand text-white" href="login.php"><strong>Log Out</strong></a>
        </div>
    </nav>
<!--akhir navbar-->
<!--awal tabel-->
	  <div class="card">
		<div class="card-header bg-dark text-white">
		  DATA MAHASISWA
		</div>
		<div class="card-body" 
        >
        <form method="post" action="">	 
		 <label>Cari data</label>
				<input type="text" name="cari" placeholder="input nim anda disini"><br><br>
         </form>
		 <table class="table table-bordered table-striped">
			 <tr>
				 <th>RANK</th>
				 <th>NIM</th>
				 <th>Nama</th>
				 <th>nilai</th>
			 </tr>
			 <?php
			 $No = 1;
             $cdata=$_POST['cari'];
			 if($cdata!=''){
				$tampil= mysqli_query($koneksi,"SELECT *from tbl_106 where Nim LIKE '".$cdata."' order by nilai desc");
			}else {
                $tampil = mysqli_query($koneksi, "SELECT * from tbl_106 order by nilai desc limit 10");
            }
			 
			 while($data = mysqli_fetch_array($tampil)):
			 ?>
			 <tr>
				 <td><?=$No++;?></td>
				 <td><?=$data['Nim']?></td>
				 <td><?=$data['Nama']?></td>
				 <td><?=$data['nilai']?></td>
			 </tr>
			 <?php
			 endwhile;
			 ?>
			 </table>
			
			 			
		</div>
	  </div>
	  </div>
	  <!--akhir tabel-->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>