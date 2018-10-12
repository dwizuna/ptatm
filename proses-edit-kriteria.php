<?php
	session_start();
	include 'dbconf.php';
	include 'lhast.php'; 
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
	
	date_default_timezone_set('Asia/Jakarta');
	
	$kriteria = $_POST['kriteria'];
	$bobot = $_POST['bobot'];
	$cost_benefit = $_POST['cost_benefit'];
	
	$result = $mysqli->query("UPDATE `kriteria` SET `kriteria` = '".$kriteria."', `bobot` = '".$bobot."', `cost_benefit` = '".$cost_benefit."' WHERE `id_kriteria` = ".$_GET['id'].";");
						
	header('Location: kriteria.php');
?>