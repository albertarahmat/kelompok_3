<?php
require_once('content/class.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Inventory Asrama Mahasiswa Universitas Andalas</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a style="text-align: center" class="navbar-brand" href="home.php">Sistem Informasi Inventory Asrama Mahasiswa Universitas Andalas</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div style="background :#c00000" class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
			<li style="text-align: center">
							<a class="clearfix" href="#">
								<img src="img/asrama2.png" alt="User Avatar">
								<div class="detail">
									<strong>Asrama Universitas Andalas</strong> 
								</div>
							</a>
			</li>
            <li><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="?p=barang&aksi=show"><i class="fa fa-edit"></i> Data Barang</a></li>
            <li><a href="?p=asrama&aksi=show"><i class="fa fa-edit"></i> Data Asrama</a></li>
			<li><a href="?p=kamar&aksi=show"><i class="fa fa-edit"></i> Data Kamar</a></li>
            <li><a href="?p=teknisi&aksi=show"><i class="fa fa-edit"></i> Data Teknisi</a></li>
            <li><a href="?p=pinjam&aksi=show"><i class="fa fa-font"></i> Data Peminjaman Barang</a></li>
            <li><a href="?p=distribusi&aksi=show"><i class="fa fa-desktop"></i> Data Distribusi Barang</a></li>
            <li><a href="?p=ttgapp"><i class="fa fa-wrench"></i> Tentang Aplikasi</a></li>
            <li><a href="?p=dev"><i class="fa fa-file"></i> Tentang Developer</a></li>
            
          </ul>
		
			<ul class="nav navbar-nav navbar-right navbar-user">
				<li class="dropdown user-dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Administrator <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li class="divider"></li>
					<li><a href="index.php"><i class="fa fa-power-off"></i> Log Out</a></li>
				</ul>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->			
        
      </nav>

      <?php
	   $app = new app();
	   $app->loadContent();
	  ?>

    </div><!-- /#wrapper -->

	<!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>

  </body>
</html>
