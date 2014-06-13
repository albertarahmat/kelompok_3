<html>
<head>
<!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
</head>
<?php
$host="localhost"; // biasanya localhost
$username="root";
$password="";
$db="asrama"; 
 
 
$conn= mysql_connect("$host", "$username", "$password")or die("koneksi gagal");
mysql_select_db("$db")or die("database tidak bisa dipilih");
 
$username=$_POST['username'];
$password=$_POST['password'];
 
// untuk keamanan
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
 
$sql="SELECT * FROM login WHERE username='$username' and password='$password'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
 
if($count==1){
echo "<script>window.location = 'home.php';</script>";
}
else {
echo "<div class='alert alert-warning'> Username dan Password yang dimasukkan salah </div>";
echo "<a href='index.php' class='btn btn-danger'>Kembali</a>";
}
?>
</html>