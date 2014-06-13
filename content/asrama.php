<?php 

//include "class.php";
if ($_GET['aksi']=='insert')
{
    $a=$_POST['idAs'];
    $b=$_POST['namaAs'];
    $asrama = new asrama();
    $asrama->insertAs($a,$b); 
    $asrama->showAs();
}
else if ($_GET['aksi']=='show')
{
   echo "<div id='page-wrapper'>";
	echo "<div class='row'><div class='col-lg-12'><h1 class='page-header'>Form Data Asrama</h1></div></div>";
    $asrama = new asrama();
    $asrama->showAs();
	echo "</div>";
}
else if ($_GET['aksi']=='delete')
{
    echo "<div id='page-wrapper'>";
	$idas=$_GET['idAs'];
    $asrama = new asrama();
    $asrama->deleteAs($idas);
    $asrama->showAs();
	echo "</div>";
}
else if ($_GET['aksi']=='update')
{
    echo "<div id='page-wrapper'>";
	$idas=$_GET['idAs'];
    $asrama = new asrama();
    $asrama->updateAs($idas);
	echo "</div>";
}
else if ($_GET['aksi']=='update2')
{
    echo "<div id='page-wrapper'>";
	$a=$_POST['idAs'];
    $b=$_POST['namaAs'];
    $asrama = new asrama();
    $asrama->updateAs2($a,$b);
    $asrama->showAs();
	echo "</div>";
}
?>