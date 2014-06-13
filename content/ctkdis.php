<?php
$tanggal = date('d-m-Y');

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Barang</title>

    <!-- Core CSS - Include with every page -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
  </head>
  <body>
	<div id="wrapper">
        <div id="page-wrapper" style="padding: 5px;">
            <div class="row">
				<div class="col-xs-8 col-xs-offset-2 text-center">
				<h3> Asrama Mahasiswa Universitas Andalas</h3>
				<h5>Alamat: Kampus Universitas Andalas, Limau Manis, Padang, Telepon : (0751) 97341</h5>
				</div>
			</div>
			<hr>
			
            <div class="row">
				<div class="col-xs-12">
					<h3><center><strong>Laporan Data Barang</strong></center></h3>
                    <table class='table table-striped table-bordered table-hover'>
                            <?php
								include "class.php";
								$db = new database();
								$db->ctkDetD();
							?>
                    </table>
                </div>
            </div>
			<div class="row">
				<div class="col-xs-5 pull-right text-center">
				<?php 
					echo "<p>Padang, ".$tanggal."</p>"
						."<p>Kepala Asrama</p></br></br></br>"
						."<p>Fajri Usman</p>";
						
				?>
				</div>
			</div>
        </div>
    </div>
	<!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>
	
	<script>
	window.load = print_d();
	function print_d(){
	window.print();
	}
	</script>
  </body>
  </html>


