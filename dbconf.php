<?php
	@session_start();
	$mysqli = new mysqli("localhost", "root", "1717", "ptatm");
	/* check connection */
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	$_SESSION['creator'] = 'FIRSTPLATO LAB';	// nama developer
	$_SESSION['judul'] = 'PT ATM';	// nama aplikasi
	$_SESSION['desc'] = 'SPK Pemilihan Karyawan Tetap';	// deskripsi aplikasi
?>