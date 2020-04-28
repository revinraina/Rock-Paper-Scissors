<?php 
if ( isset($_POST['cancel'] ) ) 
{
    // Redirect the browser to index.php
    header("Location: index.php");
    return;
}

$salt='XyZzy12*_';
$storedhash='1a52e17fa899cf40fb04cfc42e6352f1'; //password is php123
$msg=false;

if(isset($_POST['who']) && isset($_POST['pass']))
{
	if(strlen($_POST['who'])<1 || strlen($_POST['pass'])<1)
	{
		$msg="Username and password are required.";
	}

	else
	{
		$check=hash('md5', $salt.$_POST['pass']);
		if($storedhash==$check)
		{
			header("Location: game.php?name=".urldecode($_POST['who']));
			return;
		}
		else
		{
			$msg="Incorrect password.";
		}
	}
}

?>

<html>
<head>
	<title>Revin Raina</title>
	<?php require_once "bootstrap.php"; ?>
</head>
<body style="text-align: center;">
<div class="container">
	<h1>Please Log In</h1>
	<?php
	if($msg!==false)
	{
		echo('<p style="color: red;">'.htmlentities($msg)."</p>\n");
	}
    ?>

<form method="POST">
<label for="nam">Username</label>
<input type="text" name="who" id="nam"><br/>
<label for="pass">Password</label>
<input type="text" name="pass" id="pass"><br/><br>
<input type="submit" value="Log In">
<input type="submit" name="cancel" value="Cancel">
</form>
<p>
To know the password, view source and find it in the HTML comments :)
<!-- Password: php123 -->
</p>
</div>
</body>
</html>