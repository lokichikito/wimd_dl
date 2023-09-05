<?php
/*ola sorra*/
$servername="localhost";
$username="root";
$password="";
$dbname="wimd_r";
try {
	$conn = new PDO("mysql::host=$servername;dbname=$dbname;charset=utf8",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	#echo "La conexion ta buena DIOS LOS BENDIGA";
}catch(PDOException $e){
	echo"conexion fallo".$e->getMessage();
}
?>