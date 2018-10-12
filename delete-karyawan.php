<?php
	session_start();
	include 'dbconf.php';
	include 'lhast.php'; 
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	$result = $mysqli->query("delete from nilai where id_karyawan = ".$_GET['id'].";");
	$result = $mysqli->query("delete from karyawan where id_karyawan = ".$_GET['id'].";");
	if(!$result){
		echo $mysqli->connect_errno." - ".$mysqli->connect_error;
		exit();
	}
	else{
		header('Location: karyawan.php');
	}
?>