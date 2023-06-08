<!DOCTYPE html>
<html>
<body>

<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "Projectdb";
$port = 3306;


$conn = mysqli_connect($host,$user,$pass,$dbname,$port);
echo "Connection success";

if(!$conn){
    die("Falha ao conectar a database: ". mysqli_connect_error());
}
?>

</body>
</html>