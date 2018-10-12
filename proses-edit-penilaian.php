<?php
	session_start();
	include 'dbconf.php';
	include 'lhast.php'; 
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$k1 = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];
	$k5 = $_POST['k5'];
	$k6 = $_POST['k6'];
	
	$result = $mysqli->query("UPDATE `nilai` SET `k1` = '".$k1."', `k2` = '".$k2."',`k3` = '".$k3."',`k4` = '".$k4."',`k5` = '".$k5."',`k6` = '".$k6."' WHERE `id_nilai` = ".$_GET['id'].";");
						
	header('Location: penilaian.php');
?>