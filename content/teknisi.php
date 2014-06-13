<?php 
//include "class.php";
if ($_GET['aksi']=='insert')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['idtek'];
    $b=$_POST['namatek'];
    $c=$_POST['stats'];
    $teknisi = new teknisi();
    $teknisi->insertTek($a,$b,$c); 
    $teknisi->showTek();
	echo "</div>";

}
else if ($_GET['aksi']=='show')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='row'><div class='col-lg-12'><h1 class='page-header'>Form Data Teknisi</h1></div></div>";
	$teknisi = new teknisi();
    $teknisi->showTek();
	echo "</div>";
}
else if ($_GET['aksi']=='delete')
{
    echo "<div id='page-wrapper'>";
	$idtek=$_GET['idtek'];
    $teknisi = new teknisi();
    $teknisi->deleteTek($idtek);
    $teknisi->showTek();
	echo "</div>";
}
else if ($_GET['aksi']=='update')
{
    echo "<div id='page-wrapper'>";
	$idtek=$_GET['idtek'];
    $teknisi = new teknisi();
    $teknisi->updateTek($idtek);
	echo "</div>";
}
else if ($_GET['aksi']=='update2')
{
    
	echo "<div id='page-wrapper'>";
	$a=$_POST['idtek'];
    $b=$_POST['namatek'];
    $c=$_POST['stats'];
    $teknisi = new teknisi();
    $teknisi->updateTek2($a,$b,$c);
    $teknisi->showTek();
	echo "</div>";
}
?>