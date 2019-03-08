<html>
<head>
<title>
</title>
</head>
<body>
<?php
function Add_Records()
	{
	$servername = "localhost";
	$username = "root";
	$pwd = "";
	$db = "School";
	$conn = mysqli_connect($servername,$username,$pwd);
	if(!$conn)
		die("could not connect:".mysqli_error($conn));
	if(!mysqli_select_db($conn,$db))
		echo "Database could not be opened: ".msqli_error($conn);
	echo "Database opened ";
	$T_code = $_POST["T_code"];
	$T_name = $_POST["T_name"];
	$T_desig = $_POST["T_desig"];
	$T_dob = $_POST["T_dob"];
	$T_addr = $_POST["T_addr"];
	$T_bsal = $_POST["T_bSal"];
	$T_qual = $_POST["T_qual"];
	$sql = "insert into teacher values($T_code, '$T_name',  ";
	$sql .=" '$T_desig', '$T_dob', '$T_addr', $T_bsal, '$T_qual') ";
	if(!mysqli_query($conn,$sql))
		die("could not add:".mysqli_error($conn));
	echo"records added";
	mysqli_close($conn);
	}
function Delete_Records()
	{
	$servername = "localhost";
	$username = "root";
	$pwd = "";
	$db = "School";
	$conn = mysqli_connect($servername,$username,$pwd);
	if(!$conn)
		die("could not connect:".mysqli_error($conn));
	if(!mysqli_select_db($conn,$db))
		echo "Database could not be opened: ".msqli_error($conn);
	$sql = "delete from teacher where T_code = 2";
	if(!mysqli_query($conn,$sql))
		die("could not add:".mysqli_error($conn));
	$rows= mysqli_affected_rows($conn);
	if ($rows > 0)
		echo $rows."record(s) deleted";
	else
		echo "no record deleted";
	mysqli_close($conn);
	}
function display_Records()
{
$servername = "localhost" ;
	$username = "root";
	$pwd = "";
	$db = "School";
	$conn = mysqli_connect($servername, $username, $pwd);
	echo "Updating Records";
	if(!$conn)
		die("could not connect:".mysqli_error($conn));
	if(!mysqli_select_db($conn,$db))
		echo "Database could not be opened: ".mysqli_error($conn);
$sql = "Select T_code,T_name,DOB,basic_sal from teacher";
$res = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($res);
if ($rows > 0)
{
echo $rows. " rows selected<p>";
while ($row = mysqli_fetch_assoc($res))
{
echo "Teacher Code : ".$row['T_code'];
echo ", Name : ".$row['T_name'];
echo ", DOB : ".$row['DOB'];
echo ", Basic Sal : ".$row['basic_sal']."<br>";
}
}
else 
echo "No rows found";
}

function Update_Records()
	{
	$servername = "localhost" ;
	$username = "root";
	$pwd = "";
	$db = "School";
	$conn = mysqli_connect($servername, $username, $pwd);
	echo "Updating Records";
	if(!$conn)
		die("could not connect:".mysqli_error($conn));
	if(!mysqli_select_db($conn,$db))
		echo "Database could not be opened: ".mysqli_error($conn);

	$sql = "update teacher set basic_sal  =  basic_sal + 500 where T_code =1";
	if (mysqli_query($conn,$sql))
	{
	$rows=mysqli_affected_rows($conn);
	if ($rows > 0)
		echo $rows."record(s) updated";
	else
		echo "no record updated";
	}
	else 
	echo "Error updating record(s) ".mysqli_error($conn);	             
	mysqli_close($conn);
}

if (isset($_POST["btn_add"]))
	 Add_Records();
else if (isset($_POST["btn_delete"]))
	 Delete_Records();
else if (isset($_POST["btn_update"]))
	 Update_Records();
else if (isset($_POST["btn_display"]))
	 display_Records();
?>
<center>
<h2>enter teachers data </h2>
</center>
<form name ="T_Data" action = "<?php echo $_SERVER["PHP_SELF"]  ?>" method = "post">
Code:   <input type=text name= T_code><BR>
Name:   <input type=text name= T_name><BR>
Designation:    <input type=text name= T_desig><BR>
Date of birth:<input type=text name=T_dob><BR>
Address:<input type=text name=T_addr><BR>
Basic salary:<input type=text name=T_bSal><BR>
Qualification:<input type=text name=T_qual><BR>
<input type=Submit name=btn_add value="add record"><input type=reset><br>
<input type=Submit name=btn_delete value="delete old">
<input type=Submit name=btn_update value="update">
<input type=Submit name=btn_display value="Display Records">

</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br>
</body>
</html>