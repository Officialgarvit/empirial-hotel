<html>
<head>
<title>Sign-In</title>
<link rel="stylesheet" type="text/css" href="css files\style.css">
<?php
$userErr = $passwordErr = "";
$errors = 0;
if ($_SERVER["REQUEST_METHOD"]=="POST")
	{
	if (empty($_POST["password"] )) {
		$passwordErr = "Name is required";
		$errors = 1;
		} 

	if (empty ($_POST["user"])) {
		$userErr = "email is required";
		$errors = 1;
		}
	else
		{
		$email = test_input($_POST["user"]);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL) )
			{
			$userErr = "invalid email format";
			$errors = 1;
			}
		}
	}
if ($errors == 0)
	onclick()
</head>
<body id="body-color" vlink="blue">
<script language="javascript">
function check()
{
if ( (document.login.user.value) == "")
{
	alert("enter your username")
	document.login.user.focus()
}
else
{
	if ( (document.login.password.value) == "owner")
{
	alert("welcome ")
	document.login.password.focus()
}
else
{
	alert(" you have entered wrong username or passward ")
	document.login.submit.focus()
}
}
}
</script>

<div id="Sign-In">
<fieldset style="width:30%">
<legend><STRONG>LOG-IN TO YOUR ACCOUNT</legend>
<form name="login" action=action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
User <br> <input type="text" name="user" size="40" placeholder="enter your email address"><br>
password <br><input type="password" name="password" size="40" placeholder="enter your password">
<input type="submit" name="submit" value="Log-In" onclick="check()"  id="button"></form>
<a href="forgot.html"><input type="button"  value="forgot password"  id="button2"></a>
</fieldset>
CLICK HERE TO CREATE ACCOUNT <BR>
<A HREF="SIGN.HTML">CREATE NEW ACCOUNT</A><BR>
</div>
</body>
</html>