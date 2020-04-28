




<?php
if(!isset($_GET['name']) || strlen($_GET['name'])<1)
{
	die('Name parameter missing.');
}

if(isset($_POST['logout']))
{
	header("Location: index.php");
	return;
}

$moves = array('Rock', 'Paper', 'Scissors' );
$human=isset($_POST['human']) ? $_POST['human']+0 : -1; //if human selects an option then convert the string into an integer by +0 and if he doesn't then display -1 which is "please select"

$computer=rand(0,2);

function check($human, $computer)
{
	if ( $human == $computer ) {
        return "Tie Match";
    } else if ( $human == 1 AND $computer == 0 ){
        return "You Win";
    } else if ( $human == 2 AND $computer == 1 ){
        return "You Win";
    } else if ( $human == 0 AND $computer == 2 ){
        return "You Win";
    } else if ( $human == 2  and $computer == 0 ) {
        return "You Lose";
    } else if ( $human == 1  and $computer == 2) {
        return "You Lose";
    } else if ( $human == 0  and $computer == 1 ) {
        return "You Lose";
    }
}

$result=check($human,$computer);
?>


<html>
<head>
	<title>Revin Raina</title>
	<?php require_once "bootstrap.php"; ?>
</head>
<body style="text-align: center;">
<div class="container">
	<h1>ROCK, PAPER, SCISSORS</h1>
	<?php
	if(isset($_REQUEST['name']))
	{
		echo "<p>Welcome: ";
		echo(htmlentities($_REQUEST['name']));    //$_POST doesn't show this that'swhy use $_REQUEST
		echo "</p>\n";
	}
?>

<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if ( $human == -1 ) {
    print "Please select a strategy.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human = $moves[$h]    Computer = $moves[$c]    Result = $r\n";
        }
    }
} else {
    print "You = $moves[$human]    Computer = $moves[$computer]    Result = $result\n";
}
?>
</pre>
</div>


</body>
</html>
