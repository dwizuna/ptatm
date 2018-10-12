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
	
	$result = $mysqli->query("UPDATE `karyawan` SET `nama` = '".$nama."', `alamat` = '".$alamat."', `jenis_kelamin` = '".$jenis_kelamin."', `jabatan` = '".$jabatan."' WHERE `id_karyawan` = ".$_GET['id'].";");
						
	header('Location: karyawan.php');
?>