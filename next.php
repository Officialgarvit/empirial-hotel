<?php
$errors=0;
if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
	if (empty($_POST["name"] ))
		{
		$errors = 1;
		}
	if (empty($_POST[""] ))
		{
		$errors = 1;
		}
	if (empty ($_POST["mail"]))
		{
		$errors = 1;
		}
	else
		{
		$email = $_POST["mail"];
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) )
			{
			$errors = 1;
			}
		}
	if (empty($_POST["r1"] ))
		{
		$errors = 1;
		}		
	if (empty($_POST["add"] ))
		{
		$errors = 1;
		}
	if (empty($_POST["number"] ))
		{
		$errors = 1;
		}
	if (empty($_POST["room"] ))
		{
		$errors = 1;
		}
	if (empty($_POST["pay"] ))
		{
		$errors = 1;
		}
	if (empty($_POST["sight"] ))
		{
		$errors = 1;
		}
	$name = $_POST["name"];
	$add = $_POST["add"];
	$gender = $_POST["r1"];
	$mail = $_POST["mail"];
	$number = $_POST["number"];
	$room = $_POST["room"];
	$pay = $_POST["pay"];
	$sight= $_POST["sight"];
	$servername = "localhost";
	$username = "root";
	$pwd = "";
	$db = "emperial";
	$conn = mysqli_connect($servername,$username,$pwd);
	if(!$conn)
		die("could not connect:".mysqli_error($conn));
	if(!mysqli_select_db($conn,$db))
		echo "Database could not be opened: ".msqli_error($conn);
	echo "Database opened ";
	$sql = "insert into customer values('$name', '$add',  ";
	$sql .=" '$gender', '$mail', '$number', '$room', '$pay', '$sight') ";
	if(!mysqli_query($conn,$sql))
		die("could not add:".mysqli_error($conn));
	echo"your id created";
	mysqli_close($conn);
	}
else if ($errors == 0)
	{
	echo "invalid input : <form action=booking.php> <input type=submit value=back></form>";
	}
?>