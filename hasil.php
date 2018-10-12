<?php
	session_start();
	include 'dbconf.php';
	if (!isset($_SESSION['login']))
		header('Location: login-ui.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $_SESSION['judul'];?> | <?php echo $_SESSION['desc'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="lte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="lte/dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="lte/dist/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/buttons.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="lte/dist/css/skins/_all-skins.min.css">
  <!-- jQuery 2.2.0 -->
  <script src="lte/plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <link rel="icon" href="favicon.ico">
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="assets/jquery.mousewheel.pack.js?v=3.1.3"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="assets/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="assets/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="assets/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="assets/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="assets/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="assets/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="assets/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 10
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
	
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition fixed skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b><?php echo $_SESSION['judul'];?></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><?php echo $_SESSION['judul'];?></b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo $_SESSION['foto'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($_SESSION['user']);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">

                <p>
                  <?php 
					  echo ucwords($_SESSION['user']);?> - <?php echo ucwords($_SESSION['level']);
					  $date = date_create($_SESSION['since']);
				  ?> 
				  <small>Member Since, <?php echo date_format($date, 'd M Y');?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <!--a href="#" class="btn btn-default btn-flat">Profile</a-->
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION['foto'];?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ucwords($_SESSION['user']);?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="dashboard-ui.php">
            <i class="fa fa-windows"></i> <span>Dashboard</span>
          </a>
        </li>
		<li class="active">
          <a href="hasil.php">
            <i class="fa fa-laptop"></i> <span>Hasil Perhitungan</span>
          </a>
        </li>
		<?php if($_SESSION['level']=='admin'){?>
		<li>
          <a href="kriteria.php">
            <i class="fa fa-book"></i> <span>Data Kriteria</span>
          </a>
        </li>
		<li>
          <a href="karyawan.php">
            <i class="fa fa-users"></i> <span>Data Karyawan</span>
          </a>
        </li>
		<li>
          <a href="penilaian.php">
            <i class="fa fa-list"></i> <span>Data Penilaian</span>
          </a>
        </li>
		<li>
          <a href="user.php">
            <i class="fa fa-user"></i> <span>Data User</span>
          </a>
        </li>
		<?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 class="text-success">
        Dashboard
        <small><?php echo $_SESSION['desc'];?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="dashboard-ui.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="hasil.php">Hasil Perhitungan</a></li>
        <!--li class="active">Blank page</li-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title text-success"><i class="fa fa-laptop"> </i> Hasil Perhitungan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
			<i class="fa fa-minus"></i></button>
            <!--button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button-->
          </div>
        </div>
        <div class="box-body">
          
				<div class="text-right"><button class="btn btn-success btn-sm" onclick="myFunction()">Print</button></div>
			<center>
				<?php
					
					$koma = 4;
					$alt = get_alternatif();
					$alt_name = get_alt_name();
					$kep = get_kepentingan();
					$cb = get_costbenefit();
					$kri = get_kriteria();
					$min = get_min();
					$max = get_max();
					$k = jml_kriteria();
					$a = jml_alternatif();
					echo "<b>Data Kriteria </b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Kriteria</th>";
						for($i=1;$i<=$k;$i++){
							echo "<th>".ucwords($kri[$i])."</th>";
						}
					echo "</tr></thead>";
					echo "<tr><td><b>Cost / Benefit</b></td>";
						for($i=0;$i<$k;$i++){
							echo "<td>".ucwords($cb[$i])."</td>";
						}
					echo "</tr>";
					echo "<tr><td><b>Bobot</b></td>";
						for($i=0;$i<$k;$i++){
							echo "<td>".ucwords($kep[$i])."</td>";
						}
					echo "</tr>";
					echo "</table><hr>";
					// ======================================================================== //
					echo "<b>Matrix Alternatif - Kriteria</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif / Kriteria</th>";
						for($i=1;$i<=$k;$i++){
							echo "<th>".ucwords($kri[$i])."</th>";
						}
					echo "</thead>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
						for($j=0;$j<$k;$j++){
							echo "<td>".$alt[$i][$j]."</td>";
						}
						echo "</tr>";
					}
					echo "</table><hr>";
					// ======================================================================== //
					echo "<b>Nilai Min - Max tiap Kriteria </b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Kriteria</th>";
						for($i=1;$i<=$k;$i++){
							echo "<th>".ucwords($kri[$i])."</th>";
						}
					echo "</tr></thead>";
					echo "<tr><td><b>Nilai Minimal</b></td>";
						for($i=0;$i<$k;$i++){
							echo "<td>".ucwords($min[$i])."</td>";
						}
					echo "</tr>";
					echo "<tr><td><b>Nilai Maximal</b></td>";
						for($i=0;$i<$k;$i++){
							echo "<td>".ucwords($max[$i])."</td>";
						}
					echo "</tr>";
					echo "</table><hr>";
					// ======================================================================== //
					echo "<b>Matrix Ternormalisasi</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif / Kriteria</th>";
						for($i=1;$i<=$k;$i++){
							echo "<th>".ucwords($kri[$i])."</th>";
						}
					echo "</thead>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
						for($j=0;$j<$k;$j++){
							if($cb="benefit")
								$mt[$i][$j] = $alt[$i][$j]/$max[$j];
							else
								$mt[$i][$j] = $min[$j]/$alt[$i][$j];
							echo "<td>".round($mt[$i][$j],$koma)."</td>";
						}
						echo "</tr>";
					}
					echo "</table><hr>";
					// ======================================================================== //
					echo "<b>Matrix Terbobot</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif / Kriteria</th>";
						for($i=1;$i<=$k;$i++){
							echo "<th>".ucwords($kri[$i])."</th>";
						}
					echo "</thead>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
						for($j=0;$j<$k;$j++){
							$mtb[$i][$j] = $mt[$i][$j]*$kep[$j];
							echo "<td>".round($mtb[$i][$j],$koma)."</td>";
						}
						echo "</tr>";
					}
					echo "</table><hr>";
					// ======================================================================== //
					echo "<b>Hasil Akhir</b></br>";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>Alternatif</th><th>V</th></tr></thead>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td><b>".ucwords($alt_name[$i])."</b></td>";
						$v[$i][0] = 0;
						for($j=0;$j<$k;$j++){
							$v[$i][0] = $v[$i][0] + $mtb[$i][$j];
						}
						$v[$i][1] = $alt_name[$i];
 						echo "<td>".round($v[$i][0],$koma)."</td>";
					}
					echo "</table><hr>";
					usort($v, "cmp");
					$i = 0;
					while (list($key, $value) = each($v)) {
						$hsl[$i] = array($value[1],$value[0]); 
						$i++;
					}
					// ======================================================================== //
					echo "<b>Hasil Analisa</b></br>";
					echo "Hasil analisa diurutkan berdasarkan hasil nilai tertinggi. </br>Dapat disimpulkan bahwa Alternatif Karyawan terbaik untuk diangkat sebagai pegawai tetap adalah <b>".ucwords(($hsl[0][0]))."</b> dengan nilai <b>".round($hsl[0][1],$koma)."</b>.";
					echo "<table class='table table-striped table-bordered table-hover'>";
					echo "<thead><tr><th>No.</th><th>Alternatif</th><th>Hasil Akhir</th></tr></thead>";
					echo "<tbody>";
					for($i=0;$i<$a;$i++){
						echo "<tr><td>".($i+1).".</td><td>".ucwords(($hsl[$i][0]))."</td><td>".round($hsl[$i][1],$koma)."</td></tr>";
					}
					echo "</tbody></table><hr>";
					
					
										function jml_kriteria(){	
											include 'dbconf.php';
											$kriteria = $mysqli->query("select * from kriteria");
											return $kriteria->num_rows;
										}
										
										function jml_alternatif(){	
											include 'dbconf.php';
											$alternatif = $mysqli->query("select * from karyawan");
											return $alternatif->num_rows;
										}
										
										function get_kriteria(){
											include 'dbconf.php';
											$kriteria = $mysqli->query("select * from kriteria");
											if(!$kriteria){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=1;
											while ($row = $kriteria->fetch_assoc()) {
												@$kri[$i] = $row["kriteria"];
												$i++;
											}
											return $kri;
										}
										
										function get_kepentingan(){
											include 'dbconf.php';
											$kepentingan = $mysqli->query("select * from kriteria");
											if(!$kepentingan){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $kepentingan->fetch_assoc()) {
												@$kep[$i] = $row["bobot"];
												$i++;
											}
											return $kep;
										}
										
										function get_costbenefit(){
											include 'dbconf.php';
											$costbenefit = $mysqli->query("select * from kriteria");
											if(!$costbenefit){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $costbenefit->fetch_assoc()) {
												@$cb[$i] = $row["cost_benefit"];
												$i++;
											}
											return $cb;
										}
										
										function get_alt_name(){
											include 'dbconf.php';
											$alternatif = $mysqli->query("select * from karyawan");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[$i] = $row["nama"];
												$i++;
											}
											return $alt;
										}
										
										function get_alternatif(){
											include 'dbconf.php';
											$alternatif = $mysqli->query("select * from nilai");
											if(!$alternatif){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$i=0;
											while ($row = $alternatif->fetch_assoc()) {
												@$alt[$i][0] = $row["k1"];
												@$alt[$i][1] = $row["k2"];
												@$alt[$i][2] = $row["k3"];
												@$alt[$i][3] = $row["k4"];
												@$alt[$i][4] = $row["k5"];
												@$alt[$i][5] = $row["k6"];
												$i++;
											}
											return $alt;
										}
										
										function get_min(){
											include 'dbconf.php';
											$min = $mysqli->query("select min(k1) as k1, min(k2) as k2, min(k3) as k3, min(k4) as k4, min(k5) as k5, min(k6) as k6 from nilai");
											if(!$min){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$row = mysqli_fetch_array($min,MYSQLI_NUM);
											return $row;
										}
										
										function get_max(){
											include 'dbconf.php';
											$min = $mysqli->query("select max(k1) as k1, max(k2) as k2, max(k3) as k3, max(k4) as k4, max(k5) as k5, max(k6) as k6 from nilai");
											if(!$min){
												echo $mysqli->connect_errno." - ".$mysqli->connect_error;
												exit();
											}
											$row = mysqli_fetch_array($min,MYSQLI_NUM);
											return $row;
										}
										
										function cmp($a, $b){
											if ($a == $b) {
												return 0;
											}
											return ($a > $b) ? -1 : 1;
										}

										function print_ar(array $x){	//just for print array
											echo "<pre>";
											print_r($x);
											echo "</pre></br>";
										}
				?>
			</center>
		 
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> <?php echo $_SESSION['judul'].".".date('Y').".a"?>
    </div>
    <strong>Copyright &copy; <?php echo date('Y');?></strong> <?php echo $_SESSION['creator']?>. All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.6 -->
<script src="lte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="lte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="lte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/buttons.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="assets/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/buttons.print.min.js"></script>
<script type="text/javascript" language="javascript" src="assets/buttons.colVis.min.js"></script>
<!-- SlimScroll -->
<script src="lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="lte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="lte/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(document).ready(function() {
    $('#example2').DataTable( {
        "language": {
                "url": "assets/Indonesian-Alternative.json"
            },
		<?php if($_SESSION['level']=='admin'){?>
		dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print', 'colvis'
        ]<?php } ?>
    } );
} );
</script>
<script>
	function myFunction() {
		window.print();
	}
</script>
</body>
</html>
