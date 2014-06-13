<?php 
class database {
    public $dbHOst ="localhost";
    public $dbUser ="root";
    public $dbPass ="";
    public $dbDatabase ="asrama";
    
    public function dbOpen()
    {
        $db=mysql_connect($this->dbHOst,$this->dbUser,$this->dbPass);
        mysql_select_db($this->dbDatabase);
        return $db;
        
    }
    
    public function dbClose()
    {
        $db=mysql_close();
        return $db;
    }
    
}

class app{
	public function loadContent(){
		if(!isset($_GET['p'])){
			$page="content/home.php";
		}
		else if (isset($_GET['p'])) {
			$page="content/".$_GET['p'].".php";
		}
		if(file_exists($page)){
			include($page);
		}
		else{
			echo '<script>document.location="404.php"</script>';
		}
	}
}

class barang {
    public $idBrg;
    public $nama;
    public $stok;
    
    public function insertBrg($idb,$namab,$stokb)
    {
        $db = new database();
        $db->dbOpen();
        $sql="insert into barang (id,namaBrg,stok) values ('$idb','$namab','$stokb')";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Insert Barang berhasil </div>";
        else echo "<div class='alert alert-warning'> Insert barang gagal </div>";
    }
    
    public function showBrg()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from barang";
        $result=mysql_query($sql);
		echo "<div class='panel-body'><div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Barang</td><td>Nama</td><td>Stok</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td><a class='btn btn-success' href='?p=barang&aksi=delete&idb=$data[0]'>Delete</a>   <a class='btn btn-success' href='?p=barang&aksi=update&idb=$data[0]'>Update</a></td></tr>";
		}
		echo "</table>";
		echo "</div></div>";
        echo "<a href='?p=form&aksi=barang' class='btn btn-primary'>Tambah Barang</a>";
		echo "<form method='post' action='content/ctkbrg.php'>"
									."<button type='submit' class='btn btn-warning' formtarget='_blank'>Cetak</button></td>"
									."</form>";
		
    }
	
	public function ctkBrg()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from barang";
        $result=mysql_query($sql);
        
		echo "<tr><td>ID Barang</td><td>Nama</td><td>Stok</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td></tr>";
		}
		
		
		
    }
    
    public function deleteBrg($idb)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from barang where id='$idb'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Barang berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete barang gagal </div>";
    } 
    
    public function updateBrg($idb)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from barang where id='$idb'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
            
            echo "<h1>Update Barang</h1>";
            echo "<form action='?p=barang&aksi=update2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Barang</td><td><input class='form-control' type='text' name='id_barang' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Barang</td><td><input class='form-control' type='text' name='nama_barang' value='$data[1]'></td></tr>";
            echo "<tr><td>Stok</td><td><input class='form-control' type='text' name='stok' value='$data[2]'></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a class='btn btn-primary' href='?p=barang&aksi=show'>Barang</a>";
        
        }
    }
    
    public function updateBrg2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update barang set namaBrg='$b', stok='$c' where id='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update Barang berhasil </div>";
        else echo "<div class='alert alert-warning'> Update barang gagal </div>";
    }
    
}

class teknisi {
    public $idTek;
    public $namaTek;
    public $status;
    
    public function insertTek($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="insert into teknisi (idTek,namaTek,status) values ('$a','$b','$c')";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Insert Teknisi berhasil </div>";
        else echo "<div class='alert alert-warning'> Insert Teknisi gagal </div>";
    }
    
    public function showTek()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from teknisi";
        $result=mysql_query($sql);
		echo "<div class='panel-body'><div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Teknisi</td><td>Nama</td><td>Status</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td><a class='btn btn-success' href='?p=teknisi&aksi=delete&idtek=$data[0]'>Delete</a>   <a class='btn btn-success' href='?p=teknisi&aksi=update&idtek=$data[0]'>Update</a></td></tr>";
		}
		echo "</table>";
		echo "</div></div>";
        echo "<a href='?p=form&aksi=teknisi' class='btn btn-primary'>Tambah Teknisi</a>";
        
		
    }
    
    public function deleteTek($idtek)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from teknisi where idTek='$idtek'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Teknisi berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete Teknisi gagal </div>";
    } 
    
    public function updateTek($idtek)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from teknisi where idTek='$idtek'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
            echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
            echo "<h1>Form Teknisi</h1>";
            echo "<form action='?p=teknisi&aksi=update2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Teknisi</td><td><input class='form-control' type='text' name='idtek' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama</td><td><input class='form-control' type='text' name='namatek' value='$data[1]'></td></tr>";
            echo "<tr><td>Status</td><td><input class='form-control' type='text' name='stats' value='$data[2]'></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a class='btn btn-primary' href='?p=teknisi&aksi=show'>Teknisi</a>";
			echo "</div></div></div></div>";
    
        }
    }
    
    public function updateTek2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update teknisi set namaTek='$b', status='$c' where idTek='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update Teknisi berhasil </div>";
        else echo "<div class='alert alert-warning'> Update Teknisi gagal </div>";
    }
    
}

class asrama {
    public $idas;
    public $nama;
    
    public function insertAs($a,$b)
    {
        $db = new database();
        $db->dbOpen();
        $sql="insert into asrama (idAsrama,namaAsrama) values ('$a','$b')";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Insert Asrama berhasil </div>";
        else echo "<div class='alert alert-warning'> Insert Asrama gagal </div>";
    }
    
    public function showAs()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from asrama";
        $result=mysql_query($sql);
		echo "<div class='panel-body'><div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Asrama</td><td>Nama</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td><a class='btn btn-success' href='?p=asrama&aksi=delete&idAs=$data[0]'>Delete</a>   <a class='btn btn-success' href='?p=asrama&aksi=update&idAs=$data[0]'>Update</a></td></tr>";
		}
		echo "</table>";
        echo "</div></div>";
        echo "<a href='?p=form&aksi=asrama' class='btn btn-primary'>Tambah Asrama</a>";
    }
    
    public function deleteAs($idas)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from asrama where idAsrama='$idas'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Asrama berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete Asrama gagal </div>";
    } 
    
    public function updateAs($idas)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select * from asrama where idAsrama='$idas'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
            
            echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
			echo "<h1>Update Asrama</h1>";
            echo "<form action='?p=asrama&aksi=update2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Asrama</td><td><input class='form-control' type='text' name='idAs' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Asrama</td><td><input class='form-control' type='text' name='namaAs' value='$data[1]'></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a class='btn btn-primary' href='?p=asrama&aksi=show'>Asrama</a>";
			echo "</div></div></div></div>";
        }
    }
    
    public function updateAs2($a,$b)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update asrama set namaAsrama='$b' where idAsrama='$a'";
        $result=mysql_query($sql);
        if($result)
		echo "<div class='alert alert-success'> Update asrama berhasil </div>";
        else echo "<div class='alert alert-warning'> Update Asrama gagal </div>";
    }
}

class kamar {
    public $idk;
    public $idAs;
    public $namak;
    
    public function insertK($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="insert into kamar (idKamar,idAsrama,namaKamar) values ('$a','$b','$c')";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Insert Data Kamar berhasil </div>";
        else echo "<div class='alert alert-warning'> Insert Data Kamar gagal </div>";
    }
    
    public function showK()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select kamar.idKamar,asrama.namaAsrama,kamar.namaKamar from kamar,asrama where kamar.idAsrama=asrama.idAsrama order by kamar.idKamar";
        $result=mysql_query($sql);
		echo "<div class='panel-body'><div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Kamar</td><td>Nama Asrama</td><td>Nama Kamar</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td><a class='btn btn-success' href='?p=kamar&aksi=delete&idk=$data[0]'>Delete</a>   <a class='btn btn-success' href='?p=kamar&aksi=update&idk=$data[0]'>Update</a></td></tr>";
		}
		echo "</table>";
        echo "</div></div>";
        echo "<a href='?p=form&aksi=kamar' class='btn btn-primary'>Tambah Kamar</a>";
		
    }
    
    public function deleteK($idk)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from kamar where idKamar='$idk'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete kamar berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete kamar gagal </div>";
    } 
    
    public function updateK($idk)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select kamar.idKamar, asrama.namaAsrama, kamar.namaKamar from kamar,asrama where kamar.idAsrama=asrama.idAsrama and idKamar='$idk'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
            echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
			echo "<h1>Update Kamar</h1>";
            echo "<form action='?p=kamar&aksi=update2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Kamar</td><td><input class='form-control' type='text' name='idk' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Asrama</td><td><select class='form-control' name='idAs' >";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from asrama";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("$data[1]"); 
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
            echo "<tr><td>Nama Kamar</td><td><input class='form-control' type='text' name='namak' value='$data[2]'></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a class='btn btn-primary' href='?p=kamar&aksi=show'>Kamar</a>";
			echo "</div></div></div></div>";			
         }
    }
    
    public function updateK2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update kamar set idAsrama='$b',namaKamar='$c' where idKamar='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update kamar berhasil </div>";
        else echo "<div class='alert alert-warning'> Update kamar gagal </div>";
    }
}

class distribusi
{
    public function insertD($a,$b,$c,$d)
    {
        $db = new database();
        $db->dbOpen();
        $sql="insert into distribusi (idDis,idKamar,idTek,tgl) values ('$a','$b','$c','$d')";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Insert Distribusi berhasil </div>";
        else echo "<div class='alert alert-warning'> Insert Distribusi gagal </div>";
    }
    
    public function showD()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select distribusi.idDis,kamar.namaKamar,teknisi.namaTek,distribusi.tgl from distribusi,kamar,teknisi where kamar.idKamar=distribusi.idKamar and teknisi.idTek=distribusi.idTek";
        $result=mysql_query($sql);
		echo "<div class='panel-body'><div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Distribusi</td><td>Nama Kamar</td><td>Nama Teknisi</td><td>Tanggal</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td><a class='btn btn-danger' href='?p=distribusi&aksi=delete&iddis=$data[0]'>Delete</a>     <a class='btn btn-warning' href='?p=distribusi&aksi=update&iddis=$data[0]'>Update</a>    <a class='btn btn-success' href='?p=distribusi&aksi=detail&iddis=$data[0]'>Detail</a></td></tr>";
		}
		echo "</table>";
		echo "</div></div>";
        echo "<a href='?p=form&aksi=distribusi' class='btn btn-primary'>Tambah Distribusi</a>";
		
    }
    public function detailD($a)
    {
        $db = new database();
        $db->dbOpen();
		echo "<div id='page-wrapper'>";
		echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
        echo "<h1>Form Detail Distribusi</h1>";
        echo "<form action='?p=distribusi&aksi=insertD' method='post'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
        echo "<tr><td>ID Distribusi</td><td><input class='form-control' type='text' name='iddis' value='$a' readonly=readonly></td></tr>";
        echo "<tr><td>Nama Barang</td><td><select class='form-control' name='idb' >";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from barang";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("Nama Barang");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
        echo "<tr><td>Jumlah</td><td><input class='form-control' type='text' name='jml'></td></tr>";
        echo "<tr><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert & Ulang'></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Save & Exit' name='exit'></td></tr>";
		echo "</table>";
        echo "</form>";
		echo "<a class='btn btn-danger' href='?p=distribusi&aksi=show'>back</a>";
		echo "</div></div></div></div>";
    }
    
    public function insertD2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        //cek stok barang
        $sql2="select stok from barang where id='$b'";
        $cek=mysql_query($sql2);
        while ($data = mysql_fetch_array($cek))
        {
            $hasilcek=$data[0];
            if ($hasilcek>$c)
            {
                $date = date('dmY');
                $jam = date('His');
                $iddis = $a.$date.$jam;
                $sql = "insert into detaildis(idDetD,idDis,id,jumlah) values ('$iddis','$a','$b','$c')";
                $result = mysql_query($sql);
                if ($result)
                {
                    $sql3="select stok from barang where id='$b'";
                    $stok=mysql_query($sql3);
                    while ($data2=mysql_fetch_array($stok))
					{
					   $kurang=$data2[0]-$c;
                       //echo $kurang;
					}
                    $sql4="update barang set stok='$kurang' where id='$b'";
                    $sisa=mysql_query($sql4);
                    echo "Inserting Succes";
                }
                else
                {
                    echo "<div class='alert alert-warning'> stok barang tidak mencukupi </div>";
                }
            }
            else echo "<div class='alert alert-warning'> stok barang tidak mencukupi </div>";
        } 
       
    }
    
    public function deleteD($iddis)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from distribusi where idDis='$iddis'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Distribusi berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete Distribusi gagal </div>";
    } 
    
    public function updateD($iddis)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select distribusi.idDis,kamar.idKamar,teknisi.namaTek,distribusi.tgl,kamar.namaKamar,teknisi.idTek from distribusi,kamar,teknisi where kamar.idKamar=distribusi.idKamar and teknisi.idTek=distribusi.idTek and distribusi.idDis='$iddis'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
            echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
			echo "<h1>Update Distribusi</h1>";
            echo "<form action='?p=distribusi&aksi=update2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Distribusi</td><td><input class='form-control' type='text' name='iddis' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Kamar</td><td><select class='form-control' name='idk' >";
            echo "<option value=\"$data[1]\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from kamar";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("$data[4]");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[2];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
            echo "<tr><td>Nama Teknisi</td><td><select class='form-control' name='idtek' >";
            echo "<option value=\"$data[5]\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from teknisi";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("$data[2]");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
            echo "<tr><td>Tanggal</td><td><input class='form-control' type='text' name='tgl' value='$data[3]' readonly=readonly></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a class='btn btn-primary' href='?p=distribusi&aksi=show'>Distribusi</a>";
			echo "</div></div></div></div>";			
         }
    }
    
    public function updateD2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update distribusi set idKamar='$b',idTek='$c' where idDis='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update Distribusi berhasil </div>";
        else echo "<div class='alert alert-warning'> Update Distribusi gagal </div>";
    }
    
    
}

class detailDistribusi
{
    public function showDet($iddis)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select detaildis.idDetD,detaildis.idDis,barang.namaBrg,detaildis.jumlah from detaildis,distribusi,barang where distribusi.idDis=detaildis.idDIs and barang.id=detaildis.id and detaildis.idDis='$iddis'";
        $result=mysql_query($sql);
        echo "<div id='page-wrapper'>";
		echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
		echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Distribusi</td><td>Nama Barang</td><td>Jumlah</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td><a class='btn btn-success' href='?p=distribusi&aksi=deleteDet&iddet=$data[0]'>Delete</a>   <a class='btn btn-success' href='?p=distribusi&aksi=updateDet&iddet=$data[0]'>Update</a></td></tr>";
		}
		echo "</table>";
        //echo "<a href='distribusi.php?aksi=detail&click=clicked&iddis=$data[0]'>Tambah Detail</a>";
		echo "</div></div></div></div>";
    }
    
    public function deleteDet($iddet)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from detaildis where idDetD='$iddet'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Detail Distribusi berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete Detail Distribusi gagal </div>";
		echo "<a href='?p=distribusi&aksi=show' class='btn btn-danger' >Back</a>";

    }
    
    public function updateDet($iddet)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select detaildis.idDetD,distribusi.idDis,barang.namaBrg,detaildis.jumlah from detaildis,distribusi,barang where detaildis.id=barang.id and distribusi.idDis=detaildis.idDis and detaildis.idDetD='$iddet'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
			echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
            echo "<h1>Update Detail</h1>";
            echo "<form action='?p=distribusi&aksi=updateDet2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Detail</td><td><input class='form-control' type='hidden' name='iddet' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>ID Distribusi</td><td><input class='form-control' type='text' name='iddis' value='$data[1]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Barang</td><td><select class='form-control' name='idb' >";
            echo "<option value=\"$data[2]\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from barang";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("$data[2]");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
            echo "<tr><td>Jumlah</td><td><input class='form-control' type='text' name='jml' value='$data[3]'></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a href='?p=distribusi&aksi=show' class='btn btn-primary'>Distribusi</a>";
			echo "</div></div></div></div>";
        }
    }
    
     public function updateDet2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update detaildis set id='$b',jumlah='$c' where idDetD='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update Detail berhasil </div>";
        else echo "<div class='alert alert-warning'> Update Detail gagal </div>";
		echo "<a href='?p=distribusi&aksi=show' class='btn btn-danger' >Back</a>";
    }
    
}
class pinjam 
{
    public function insertP($a,$b,$c,$d)
    {
        $db = new database();
        $db->dbOpen();
        $sql="insert into pinjam (idPinjam,idTek,nama,tgl) values ('$a','$b','$c','$d')";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Insert Peminjaman berhasil </div>";
        else echo "<div class='alert alert-warning'> Insert Peminjaman gagal </div>";
    }
    
    public function showP()
    {
        $db = new database();
        $db->dbOpen();
        $sql="select pinjam.idPinjam,teknisi.namaTek,pinjam.nama,pinjam.tgl from pinjam,teknisi where teknisi.idTek=pinjam.idTek";
        $result=mysql_query($sql);
		echo "<div class='panel-body'><div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Peminjaman</td><td>Nama Teknisi</td><td>Nama Peminjam</td><td>Tanggal</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td><a class='btn btn-danger' href='?p=pinjam&aksi=delete&idpin=$data[0]'>Delete</a>   <a class='btn btn-warning' href='?p=pinjam&aksi=update&idpin=$data[0]'>Update</a>   <a class='btn btn-success' href='?p=pinjam&aksi=detail&idpin=$data[0]'>Detail</a></td></tr>";
		}
		echo "</table>";
		echo "</div></div>";
        echo "<a href='?p=form&aksi=pinjam' class='btn btn-primary'>Input Data Peminjaman</a>";
		
    }
    
    public function deleteP($idp)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from pinjam where idPinjam='$idp'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Peminjaman berhasil </div>";
        else echo "<div class='alert alert-warning'> Delete Peminjaman gagal </div>";
    } 
    
    public function detailP($a)
    {
        $db = new database();
        $db->dbOpen();
        echo "<div id='page-wrapper'>";
		echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
		echo "<h1>Form Detail Peminjaman</h1>";
        echo "<form action='?p=pinjam&aksi=insertDP' method='post'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
        echo "<tr><td>ID Peminjaman</td><td><input class='form-control' type='text' name='idpin' value='$a' readonly=readonly></td></tr>";
        echo "<tr><td>Nama Barang</td><td><select class='form-control' name='idb' >";
            echo "<option value=\"0\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from barang";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("Nama Barang");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
        echo "<tr><td>Jumlah</td><td><input class='form-control' type='text' name='jml'></td></tr>";
        echo "<tr><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Insert & Ulang'></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Save & Exit' name='exit'></td></tr>";
        echo "</table>";
        echo "</form>";
		echo "<a class='btn btn-danger' href='?p=pinjam&aksi=show'>back</a>";
		echo "</div></div></div></div>";
    }
    
    public function insertDP2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        //cek stok barang
        $sql2="select stok from barang where id='$b'";
        $cek=mysql_query($sql2);
        while ($data = mysql_fetch_array($cek))
        {
            $hasilcek=$data[0];
            echo $hasilcek;
            if ($hasilcek>$c)
            {
                $date = date('dmY');
                $jam = date('His');
                $idDpin = $a.$date.$jam;
                $sql = "insert into detailpinjam(idDetP,idPinjam,id,jumlah) values ('$idDpin','$a','$b','$c')";
                $result = mysql_query($sql);
                if ($result)
                {
                    $sql3="select stok from barang where id='$b'";
                    $stok=mysql_query($sql3);
                    while ($data2=mysql_fetch_array($stok))
					{
					   $kurang=$data2[0]-$c;
                       //echo $kurang;
					}
                    $sql4="update barang set stok='$kurang' where id='$b'";
                    $sisa=mysql_query($sql4);
                    echo "<div class='alert alert-success'> Inserting Succes </div>";
                }
                else
                {
                    echo "<div class='alert alert-danger'> query gagal </div>";
                }
            }
            else echo "<div class='alert alert-warning'> stok barang tidak mencukupi </div>";
        } 
       
    }
    
    public function updateP($idpin)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select pinjam.idPinjam,teknisi.namaTek,pinjam.nama,pinjam.tgl,pinjam.idTek from pinjam,teknisi where teknisi.idTek=pinjam.idTek and pinjam.idPinjam='$idpin'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
			echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
            echo "<h1>Update Peminjaman</h1>";
            echo "<form action='?p=pinjam&aksi=update2' method='post'>";
            echo "<table class='table table-striped table-bordered table-hover'>";
            echo "<tr><td>ID Peminjaman</td><td><input class='form-control' type='text' name='idpin' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Teknisi</td><td><select class='form-control' name='idtek' >";
            echo "<option value=\"$data[4]\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from teknisi";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("$data[1]");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
            echo "<tr><td>Nama Peminjam</td><td><input class='form-control' type='text' name='nama' value='$data[2]'></td></tr>";
            echo "<tr><td>Tanggal</td><td><input class='form-control' type='text' name='tgl' value='$data[3]' readonly=readonly></td></tr>";
            echo "<tr><td></td><td><input class='btn btn-primary btn-lg btn-block' type='submit' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            echo "<a class='btn btn-primary' href='?p=pinjam&aksi=show'>Peminjaman</a>"; 
			echo "</div></div></div></div>";
         }
    }
    
    public function updateP2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update pinjam set idTek='$b',nama='$c' where idPinjam='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update Peminjaman berhasil </div>";
        else echo "<div class='alert alert-warning'> Update Peminjaman gagal </div>";
    }
}
class detailPinjam
{
    public function showDetP($idpin)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select detailpinjam.idDetP,detailpinjam.idPinjam,barang.namaBrg,detailpinjam.jumlah from detailpinjam,pinjam,barang where pinjam.idPinjam=detailpinjam.idPinjam and barang.id=detailpinjam.id and detailpinjam.idPinjam='$idpin'";
        $result=mysql_query($sql);
		echo "<div id='page-wrapper'>";
		echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
        echo "<table class='table table-striped table-bordered table-hover'>";
		echo "<tr><td>ID Peminjaman</td><td>Nama Barang</td><td>Jumlah</td><td>Tools</td></tr>";
		while ($data = mysql_fetch_array($result)) {
			echo "<tr><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td><a class='btn btn-outline btn-danger' href='?p=pinjam&aksi=deleteDetP&idpin=$data[0]'>Delete</a>   <a class='btn btn-success' href='?p=pinjam&aksi=updateDetP&iddet=$data[0]'>Update</a></td></tr>";
		}
		echo "</table>";
        //echo "<a href='distribusi.php?aksi=detail&click=clicked&iddis=$data[0]'>Tambah Detail</a>";
		echo "</div></div></div></div>";
    }
	
	public function deleteDetP($idpin)
    {
        $db = new database();
        $db->dbOpen();
        $sql="delete from detailpinjam where idDetP='$idpin'";
        $result=mysql_query($sql);
        if ($result)
        echo "<div class='alert alert-success'> Delete Detail berhasil </div>";
        else echo "<div class='alert alert-warning'>Delete Detail gagal </div>";
		echo "<a href='?p=pinjam&aksi=show' class='btn btn-danger' >Back</a>";
    }
    
    public function updateDetP($iddet)
    {
        $db = new database();
        $db->dbOpen();
        $sql="select detailpinjam.idDetP,detailpinjam.idPinjam,barang.namaBrg,detailpinjam.jumlah from detailpinjam,barang,pinjam where detailpinjam.idPinjam=pinjam.idPinjam and barang.id=detailpinjam.id and detailpinjam.idDetP='$iddet'";
        $result=mysql_query($sql);
        while ($data = mysql_fetch_array($result)) {
			echo "<div id='page-wrapper'>";
			echo "<div class='panel-body'><div class='row'><div class='col-lg-6'>";
            echo "<h1>Update Detail</h1>";
			echo "<form action='?p=pinjam&aksi=updateDetP2' method='post'>";
            //echo "<form action='pinjam.php?aksi=updateDetP2' method='post'>";
			echo "<table class='table table-striped table-bordered table-hover'>";
            //echo "<table>";
            echo "<tr><td>ID Detail</td><td><input type='hidden' class='form-control' name='iddet' value='$data[0]' readonly=readonly></td></tr>";
            echo "<tr><td>ID Peminjaman</td><td><input type='text' class='form-control' name='idpin' value='$data[1]' readonly=readonly></td></tr>";
            echo "<tr><td>Nama Barang</td><td><select class='form-control' name='idb' >";
            echo "<option value=\"$data[2]\" selected>";
					$db=new database();
                    $db->dbOpen();
					$sql="select * from barang";
					$hasil=mysql_query($sql);
					if ($hasil == true)
                    print ("$data[2]");
					while ($row = mysql_fetch_array($hasil))
					{
					  $id = $row[0];
					  $nama = $row[1];
					  print ("<OPTION VALUE=\"$id\">$nama"); 
					}
            echo"</td></tr>";
            echo "<tr><td>Jumlah</td><td><input type='text' class='form-control' name='jml' value='$data[3]'></td></tr>";
            echo "<tr><td></td><td><input type='submit' class='btn btn-primary btn-lg btn-block' value='Update'></td></tr>";
            echo "</table>";
            echo "</form>";
            //echo "<a href='distribusi.php?aksi=show'>Distribusi</a>";
        }
    }
    
    public function updateDetP2($a,$b,$c)
    {
        $db = new database();
        $db->dbOpen();
        $sql="update detailpinjam set id='$b',jumlah='$c' where idDetP='$a'";
        $result=mysql_query($sql);
        if($result)
        echo "<div class='alert alert-success'> Update Detail berhasil </div>";
        else echo "<div class='alert alert-warning'>Update Detail gagal </div>";
		echo "<a href='?p=pinjam&aksi=show' class='btn btn-danger' >Back</a>";
    }
	
}
?>