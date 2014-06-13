<?php 
//include "class.php";
if ($_GET['aksi']=='insert')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['id_barang'];
    $b=$_POST['nama_barang'];
    $c=$_POST['stok'];
    $barang = new barang();
    $barang->insertBrg($a,$b,$c); 
    $barang->showBrg();
	echo "</div>";
}
else if ($_GET['aksi']=='show')
{
	echo "<div id='page-wrapper'>";
	echo "<div class='row'><div class='col-lg-12'><h1 class='page-header'>Form Data Barang</h1></div></div>";
    $barang = new barang();
    $barang->showBrg();
	echo "</div>";
}
else if ($_GET['aksi']=='delete')
{
    echo "<div id='page-wrapper'>";
	$idb=$_GET['idb'];
    $barang = new barang();
    $barang->deleteBrg($idb);
    $barang->showBrg();
	echo "</div>";
}
else if ($_GET['aksi']=='update')
{
    echo "<div id='page-wrapper'>";
	$idb=$_GET['idb'];
    $barang = new barang();
    $barang->updateBrg($idb);
	echo "</div>";
}
else if ($_GET['aksi']=='update2')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['id_barang'];
    $b=$_POST['nama_barang'];
    $c=$_POST['stok'];
    $barang = new barang();
    $barang->updateBrg2($a,$b,$c);
    $barang->showBrg();
	echo "</div>";
}
?>