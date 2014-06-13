<?php 
//include "class.php";
if ($_GET['aksi']=='teknisi')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
	echo "<h1>Form Teknisi</h1>";
	echo "<div class='form-group'>";
    echo "<form role='form' action='?p=teknisi&aksi=insert' method='post'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<tr><td>ID Teknisi</td><td><input class='form-control' type='text' name='idtek'></td></tr>";
    echo "<tr><td>Nama</td><td><input class='form-control' type='text' name='namatek'></td></tr>";
    echo "<tr><td>Status</td><td><input class='form-control' type='text' name='stats'></td></tr>";
    echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert'></td></tr>";
    echo "</table>";
    echo "</form>";
	echo "<a href='?p=teknisi&aksi=show' class='btn btn-primary'>Teknisi</a>";
	echo "</div></div></div></div>";
	echo "</div>";

}
else if ($_GET['aksi']=='barang')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
	echo "<h1>Form Barang</h1>";
	echo "<div class='form-group'>";
    echo "<form action='?p=barang&aksi=insert' method='post'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<tr><td>ID Barang</td><td><input class='form-control' type='text' name='id_barang'></td></tr>";
    echo "<tr><td>Nama Barang</td><td><input class='form-control' type='text' name='nama_barang'></td></tr>";
    echo "<tr><td>Stok</td><td><input class='form-control' type='text' name='stok'></td></tr>";
    echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert'></td></tr>";
    echo "</table>";
    echo "</form>";
	echo "<a href='?p=barang&aksi=show' class='btn btn-primary'>Barang</a>";
	echo "</div></div></div></div>";
	echo "</div>";
}
else if ($_GET['aksi']=='asrama')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
	echo "<h1>Form Asrama</h1>";
	echo "<div class='form-group'>";
    echo "<form action='?p=asrama&aksi=insert' method='post'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<tr><td>ID Asrama</td><td><input class='form-control' type='text' name='idAs'></td></tr>";
    echo "<tr><td>Nama Asrama</td><td><input class='form-control' type='text' name='namaAs'></td></tr>";
    echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert'></td></tr>";
    echo "</table>";
    echo "</form>";
	echo "<a href='?p=asrama&aksi=show' class='btn btn-primary'>Asrama</a>";
	echo "</div></div></div></div>";
	echo "</div>";
    
    /*echo "<h1>Form Asrama</h1>
            <form action='asrama.php?aksi=insert' method='post'>
            ID Asrama <input type='text' name='idAs' /><br />
            Nama Asrama <input type='text' name='namaAs' /><br />
            <input type='submit' value='Insert'/>
            </form>";
            echo "<a href='asrama.php?aksi=show'>Asrama</a>";*/
}
else if ($_GET['aksi']=='kamar')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
	echo "<h1>Form Kamar</h1>";
	echo "<div class='form-group'>";
    echo "<form action='?p=kamar&aksi=insert' method='post'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<tr><td>ID Kamar</td><td><input class='form-control' type='text' name='idk'></td></tr>";
    echo "<tr><td>Nama Asrama</td><td><select class='form-control' name='idAs'>";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from asrama";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Asrama");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE='$id'>$nama"); 
					}
            echo"</td></tr>";
    echo "<tr><td>Nama Kamar</td><td><input class='form-control' type='text' name='namak'></td></tr>";
    echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert'></td></tr>";
    echo "</table>";
    echo "</form>";
	echo "<a href='?p=kamar&aksi=show' class='btn btn-primary'>Kamar</a>";
	echo "</div></div></div></div>";
	echo "</div>";
    
}
else if ($_GET['aksi']=='distribusi')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
	echo "<h1>Form Distribusi</h1>";
	echo "<div class='form-group'>";
    echo "<form action='?p=distribusi&aksi=insert' method='post'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<tr><td>ID Distribusi</td><td><input class='form-control' type='text' name='iddis'></td></tr>";
    echo "<tr><td>Nama Kamar</td><td><select class='form-control' name='idk'>";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from kamar";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Kamar");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[2];
					  print ("<OPTION VALUE='$id'>$nama"); 
					}
            echo"</td></tr>";
     echo "<tr><td>Nama Teknisi</td><td><select class='form-control' name='idtek'>";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from teknisi";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Teknisi");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE='$id'>$nama"); 
					}
            echo"</td></tr>";        
    echo "<tr><td>Tanggal</td><td><input class='form-control' type='date' name='tgl'></td></tr>";
    echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert'></td></tr>";
    echo "</table>";
    echo "</form>";
	echo "<a href='?p=distribusi&aksi=show' class='btn btn-primary'>Distribusi</a>";
	echo "</div></div></div></div>";
	echo "</div>";
}
else if ($_GET['aksi']=='pinjam')
{
    echo "<div id='page-wrapper'>";
	echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
	echo "<h1>Form Barang</h1>";
	echo "<div class='form-group'>";;
    echo "<form action='?p=pinjam&aksi=insert' method='post'>";
    echo "<table class='table table-striped table-bordered table-hover'>";
    echo "<tr><td>ID Peminjaman</td><td><input class='form-control' type='text' name='idpin'></td></tr>";
    echo "<tr><td>Nama Teknisi</td><td><select class='form-control' name='idtek'>";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from teknisi";
					$hasil=mysql_query($sql);
					if ($hasil == true)
					print ("Teknisi");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE='$id'>$nama"); 
					}
            echo"</td></tr>";        
    echo "<tr><td>Nama Peminjam</td><td><input class='form-control' type='text' name='nama'></td></tr>";        
    echo "<tr><td>Tanggal</td><td><input class='form-control' type='date' name='tgl'></td></tr>";
    echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert'></td></tr>";
    echo "</table>";
    echo "</form>";
	echo "<a href='?p=pinjam&aksi=show' class='btn btn-primary'>Peminjaman</a>";
	echo "</div></div></div></div>";
	echo "</div>";
}
?>