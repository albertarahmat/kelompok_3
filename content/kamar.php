<?php 
//include "class.php";
if ($_GET['aksi']=='insert')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['idk'];
    $b=$_POST['idAs'];
    $c=$_POST['namak'];
    $kamar = new kamar();
    $kamar->insertK($a,$b,$c);
    $kamar->showK();
	echo "</div>";
}
else if ($_GET['aksi']=='show')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='row'><div class='col-lg-12'><h1 class='page-header'>Form Data Kamar</h1></div></div>";
	$kamar = new kamar();
    $kamar->showK();
	echo "</div>";
}
else if ($_GET['aksi']=='delete')
{
    echo "<div id='page-wrapper'>";
	$idk=$_GET['idk'];
    $kamar = new kamar();
    $kamar->deleteK($idk);
    $kamar->showK();
	echo "</div>";
}
else if ($_GET['aksi']=='update')
{
    echo "<div id='page-wrapper'>";
	$idk=$_GET['idk'];
    $kamar = new kamar();
    $kamar->updateK($idk);
	echo "</div>";
}
else if ($_GET['aksi']=='update2')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['idk'];
    $b=$_POST['idAs'];
    $c=$_POST['namak'];
    $kamar = new kamar();
    $kamar->updateK2($a,$b,$c);
    $kamar->showK();
	echo "</div>";
}

?>