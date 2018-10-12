<?php
	session_start();
	include 'dbconf.php';
	include 'lhast.php'; 
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$jabatan = $_POST['jabatan'];
	
	$result = $mysqli->query("INSERT INTO `karyawan` (`id_karyawan`, `nama`, `alamat`, `jenis_kelamin`, `jabatan`) 
						VALUES (NULL, '".$nama."', '".$alamat."', '".$jenis_kelamin."', 
						'".$jabatan."');");
	$id = $mysqli->query("(select max(id_karyawan) as max from karyawan)");
	$row = $id->fetch_assoc();
	$result = $mysqli->query("INSERT INTO `nilai` (`id_nilai`, `id_karyawan`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`) 
						VALUES (NULL, '".$row['max']."', '0', '0', '0', '0', '0', '0');");
						
	header('Location: karyawan.php');
?>