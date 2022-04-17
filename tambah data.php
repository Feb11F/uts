<?php

	$server = "localhost";
	$user ="root";	
	$pass = ""	;									
	$database = "febrian";
	$koneksi= mysqli_connect($server,$user,$pass,$database) or die(mysqli_error($koneksi));


		//jika tombol submit diklik
if (isset($_POST['submit']))
{
    if($_GET['hal']=='edit')
    {
        $edit = mysqli_query($koneksi , "UPDATE tbl_106 SET 
                                         Nim= '$_POST[nim]',
                                         Nama= '$_POST[nama]',
                                         Alamat= '$_POST[alamat]',
                                         nilai= '$_POST[Nilai]'
                                         WHERE No = '$_GET[id]'
                                                ");
    if($edit)//jika sukses
    {
        echo "<script>
            alert('edit data sukses');
            document.location='data mahasiswa.php';
            </script>";
    }
    //jika gagal
    else{
        echo "<script>
            alert('edit data gagal');
            document.location='data mahasiswa.php';
            </script>";
    }   
    }else
    {
        $submit = mysqli_query($koneksi , "INSERT INTO tbl_106 (Nim,Nama,Alamat,nilai)
        Values ('$_POST[nim]',
                '$_POST[nama]',
                '$_POST[alamat]',
                '$_POST[Nilai]')
            ");
    if($submit)
    {
        echo "<script>
            alert('simpan data sukses');
            document.location='data mahasiswa.php';
            </script>";
    }
    else{
        echo "<script>
            alert('simpan data gagal');
            document.location='data mahasiswa.php';
            </script>";
    }
    }
	
}
if (isset($_GET['hal']))
{
    if($_GET['hal']=='edit')
    {
    //pengujian data yang akan diedit
    $tampil=mysqli_query($koneksi," SELECT *FROM tbl_106 WHERE No = '$_GET[id]'");
    $data=mysqli_fetch_array($tampil);
    if($data){
        $vnim = $data['Nim'];
        $vnama = $data['Nama'];
        $valamat = $data['Alamat'];
        $vnilai = $data['nilai'];
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
	<!-- awal card-->
    
	<div class="card margin-left">
		<div class="card-header bg-dark text-white">
		 form input data siswa
		</div>
		<div class="card-body">
			<form method="post" action="">
			<div class="form-group mb-3">
				<label>NIM</label>
				<input type="text" name="nim" value="<?=@$vnim?>" class="form-control" placeholder="input nim anda disini" required>
			</div>
			<div class="form-group mb-3">
				<label>NAMA</label>
				<input type="text" name="nama" value="<?=@$vnama?>" class="form-control" placeholder="input nama anda disini" required>
			</div>
			<div class="form-group mb-3">
				<label>ALAMAT</label>
				<textarea name ="alamat" class="form-control" placeholder="input alamat anda disini" required><?=@$valamat?></textarea>
			</div>
			<div class="form-group mb-3" ></div>
			<label>NILAI</label>
      <input type="text" name="Nilai" value="<?=@$vnilai?>" class="form-control" placeholder="input nilai anda disini" required>
            <br>
			<button type="submit" class="btn btn-primary" name="submit">submit</button>
			
           
			</div>
			</form>
		</div>													
		
	  </div>
      </div>
	  <!--akhir card-->
	  
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>