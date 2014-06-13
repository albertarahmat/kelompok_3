<?php 
//include "class.php";
if ($_GET['aksi']=='insert')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['idpin'];
    $b=$_POST['idtek'];
    $c=$_POST['nama'];
    $d=$_POST['tgl'];
    $pinjam = new pinjam();
    $pinjam->insertP($a,$b,$c,$d);
    $pinjam->detailP($a);
	echo "</div>";
	
}
else if ($_GET['aksi']=='show')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='row'><div class='col-lg-12'><h1 class='page-header'>Form Data Peminjaman</h1></div></div>";
	$pinjam = new pinjam();
    $pinjam->showP();
	echo "</div>";
}
else if ($_GET['aksi']=='insertDP')
{
    echo "<div id='page-wrapper'>";
	$a = $_POST['idpin'];
    $b = $_POST['idb'];
    $c = $_POST['jml'];
    if (isset($_POST['exit']))
    {
        $pinjam = new pinjam();
        $pinjam->insertDP2($a,$b,$c);
        $pinjam->showP();
    }
    else
    {
        $pinjam = new pinjam();
        $pinjam->insertDP2($a,$b,$c);
        $pinjam->detailP($a);
    }
	echo "</div>";
}
else if ($_GET['aksi']=='delete')
{
    echo "<div id='page-wrapper'>";
	$idpin=$_GET['idpin'];
    $pinjam = new pinjam();
    $pinjam->deleteP($idpin);
    $pinjam->showP();
	echo "</div>";
}
else if ($_GET['aksi']=='update')
{
    echo "<div id='page-wrapper'>";
	$idpin=$_GET['idpin'];
    $pinjam = new pinjam();
    $pinjam->updateP($idpin);
	echo "</div>";
}
else if ($_GET['aksi']=='update2')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['idpin'];
    $b=$_POST['idtek'];
    $c=$_POST['nama'];
    $pinjam = new pinjam();
    $pinjam->updateP2($a,$b,$c);
    $pinjam->showP();
	echo "</div>";
}
else if ($_GET['aksi']=='detail')
{
    echo "<div id='page-wrapper'>";
	$idpin=$_GET['idpin'];
    $detail = new detailPinjam();
    $detail->showDetP($idpin);
    //if (isset ($_POST['clicked']))
    //{
        $detail2 = new pinjam();
        $detail2->detailP($idpin);
    //}
	echo "</div>";
    
}
else if ($_GET['aksi']=='deleteDetP')
{
    echo "<div id='page-wrapper'>";
	 $idpin=$_GET['idpin'];
    //$iddis=$_GET['iddis'];
    $detail = new detailPinjam();
    $detail->deleteDetP($idpin);
    //$detail->showDet($iddis);
	echo "</div>";
	
}else if ($_GET['aksi']=='updateDetP')
{
    echo "<div id='page-wrapper'>";
	$iddet=$_GET['iddet'];
    $detail = new detailPinjam();
    $detail->updateDetP($iddet);
	echo "</div>";
}
else if ($_GET['aksi']=='updateDetP2')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['iddet'];
    $b=$_POST['idb'];
    $c=$_POST['jml'];
    $detail = new detailPinjam();
    $detail->updateDetP2($a,$b,$c);
    //$detail->showDet();
	echo "</div>";
}
?>