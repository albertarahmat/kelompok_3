<?php 
//include "class.php";
if ($_GET['aksi']=='insert')
{
    $a=$_POST['iddis'];
    $b=$_POST['idk'];
    $c=$_POST['idtek'];
    $d=$_POST['tgl'];
    $distribusi = new distribusi();
    $distribusi->insertD($a,$b,$c,$d);
    $distribusi->detailD($a);   
}
else if ($_GET['aksi']=='show')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='row'><div class='col-lg-12'><h1 class='page-header'>Form Data Distribusi</h1></div></div>";
	$distribusi = new distribusi();
    $distribusi->showD();
	echo "</div>";
}
else if ($_GET['aksi']=='insertD')
{
    $a = $_POST['iddis'];
    $b = $_POST['idb'];
    $c = $_POST['jml'];
    if (isset($_POST['exit']))
    {
        $distribusi = new distribusi();
        $distribusi->insertD2($a,$b,$c);
        $distribusi->showD();
    }
    else
    {
        $distribusi = new distribusi();
        $distribusi->insertD2($a,$b,$c);
        $distribusi->detailD($a);
    }
}
else if ($_GET['aksi']=='delete')
{
    $iddis=$_GET['iddis'];
    $distribusi = new distribusi();
    $distribusi->deleteD($iddis);
    $distribusi->showD();
}
else if ($_GET['aksi']=='update')
{
    $iddis=$_GET['iddis'];
    $distribusi = new distribusi();
    $distribusi->updateD($iddis);
}
else if ($_GET['aksi']=='update2')
{
    $a=$_POST['iddis'];
    $b=$_POST['idk'];
    $c=$_POST['idtek'];
    $distribusi = new distribusi();
    $distribusi->updateD2($a,$b,$c);
    $distribusi->showD();
}
else if ($_GET['aksi']=='detail')
{
    $iddis=$_GET['iddis'];
    $detail = new detailDistribusi();
    $detail->showDet($iddis);
    //if (isset ($_POST['clicked']))
    //{
        $detail2 = new distribusi();
        $detail2->detailD($iddis);
    //}
    
}
else if ($_GET['aksi']=='deleteDet')
{
    $iddet=$_GET['iddet'];
    //$iddis=$_GET['iddis'];
    $detail = new detailDistribusi();
    $detail->deleteDet($iddet);
    //$detail->showDet($iddis);
}else if ($_GET['aksi']=='updateDet')
{
    $iddet=$_GET['iddet'];
    $detail = new detailDistribusi();
    $detail->updateDet($iddet);
}
else if ($_GET['aksi']=='updateDet2')
{
    $a=$_POST['iddet'];
    $b=$_POST['idb'];
    $c=$_POST['jml'];
    $detail = new detailDistribusi();
    $detail->updateDet2($a,$b,$c);
    //$detail->showDet();
}
?>