<?php

	$server = "localhost";
	$user ="root";	
	$pass = ""	;									
	$database = "febrian";
	$koneksi= mysqli_connect($server,$user,$pass,$database) or die(mysqli_error($koneksi));
	error_reporting(0);

//hapus
	if (isset($_GET['hal']))
	{
		if ($_GET['hal']=='hapus'){
			$hapus= mysqli_query($koneksi, "DELETE from tbl_106 where No = '$_GET[id]'");
			if($hapus){
				echo "<script>
				alert('Hapus data sukses');
				document.location='data mahasiswa admin.php';
				</script>";
			}
		}
	}
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
		<i class="fa-solid fa-user"></i>  DATA SISWA 
		</div>
		<div class="card-body" >
		 <table class="table table-bordered table-striped">
		 <form method="post" action="">	 
		 <label>Cari data</label>
				<input type="text" name="cari" placeholder="input nim anda disini"><br><br>
         </form>

			 <tr>
				 <th>No</th>
				 <th>NIM</th>
				 <th>Nama</th>
				 <th>Alamat</th>
				 <th>nilai</th>
				 <th>Aksi</th>
			 </tr>
			 <?php
			 $No = 1;
			 $cdata=$_POST['cari'];
			 if($cdata!=''){
				$tampil= mysqli_query($koneksi,"SELECT *from tbl_106 where Nim LIKE '".$cdata."'");
			}else {
				$tampil = mysqli_query($koneksi, "SELECT * from tbl_106 order by No desc");
			}
			
			 while($data = mysqli_fetch_array($tampil)):
			 ?>
			 
			
			 <tr>
				 <td><?=$No++;?></td>
				 <td><?=$data['Nim']?></td>
				 <td><?=$data['Nama']?></td>
				 <td><?=$data['Alamat']?></td>
				 <td><?=$data['nilai']?></td>
				 <td>
					 <a href="tambah data.php?hal=edit&id=<?=$data['No']?>" class="fa-solid fa-pen"></a>&nbsp;&nbsp;
					 <a href="data mahasiswa admin.php?hal=hapus&id=<?=$data['No']?>" class="fa-solid fa-trash-can"></a>
				 </td>
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