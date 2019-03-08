<html>
<head>
<title>Database users</title>
</head>
<body>
<?php
$servername= "localhost";
$username ="root";
$pwd = "";
$conn=mysqli_connect($servername,$username,$pwd);
if (!$conn)
	die("could not connect:".mysqli_error($conn));
$sql="create database Emperial";
if (!mysqli_query($conn,$sql))
	die("could not create database: ".mysqli_error($conn));
if (!mysqli_select_db($conn,"Emperial"))
	echo "database could not be opened: ".mysqli_error($conn);

$sql = "Create table customer(name varchar(30), ";
$sql .= "address varchar(30), gender varchar(30), ";
$sql .= "mail varchar(30), number integer(10), ";
$sql .= "room varchar(30), payment varchar(30), sight varchar(30))";
if (mysqli_query($conn, $sql))
echo "Table created";
else echo "Table could not be created ".mysqli_error($conn);
mysqli_close($conn);
?>
</body>
<Html>

