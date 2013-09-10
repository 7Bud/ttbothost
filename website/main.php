<?php include("lock.php"); ?>

<!DOCTYPE html>

<html lang="en"><head>
<meta charset="utf-8"><title></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<!-- CSS -->
<link href="css/bootstrap.css" rel="stylesheet">
<style type="text/css">
/* Sticky footer styles
-------------------------------------------------- */
/*body {
background-color: #635b5b;
}*/
html,
body {
height: 100%;
/* The html and body elements cannot have any padding or margin. */
}
/* Wrapper for page content to push down footer */
#wrap {
min-height: 100%;
height: auto !important;
height: 100%;
/* Negative indent footer by it's height */
margin: 0 auto -60px;
}
/* Set the fixed height of the footer here */
#push,
#footer {
height: 60px;
}
#footer {
background-color: #f5f5f5;
}
/* Lastly, apply responsive CSS fixes as necessary */
@media (max-width: 767px) {
#footer {
margin-left: -20px;
margin-right: -20px;
padding-left: 20px;
padding-right: 20px;
}
}
/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */
.container {
width: auto;
max-width: 680px;
}
.container .credit {
margin: 20px 0;
}
</style>
<link href="css/bootstrap-responsive.css" rel="stylesheet">
</head>
<body>
<!-- Part 1: Wrap all page content here -->
<div id="wrap"><!-- Begin page content -->
<div class="container">
<center>
<div class="well">
<h1>Welcome, <?php echo $login_session; ?></h1>
<br>
<?php

	if($_GET['d'] != "" ) {
		mysql_query("DELETE FROM botsuploaded WHERE botid='".$_GET['d']."'") or die("derrr cannot delete teh bot!");
		mysql_query("DELETE FROM botsrequirednpm WHERE botid='".$_GET['d']."'") or die("derrr cannot delete teh bot!");
		echo(
		"
		
				<b>Now deleted!</b>
				<br>
		
		"
		);
		} else	if($_GET['start'] != "" && $_GET['n'] != "" ) {
		mysql_query("INSERT INTO botsqueued VALUES ('".$_GET['start']."','".$_GET['n']."','1')") or die("derrr cannot start teh bot!");
		echo(
		"
		
				<b>Now Starting!</b>
				<br>
				
		"
		);
		}
		else if($_GET['stop'] != "" && $_GET['n'] != "" ) {
		mysql_query("INSERT INTO botsqueued VALUES ('".$_GET['start']."','".$_GET['n']."','0')") or die("derrr cannot stop teh bot!");
		echo(
		"
		
				<b>Now Stopping!</b>
				<br>
		"
		);
		}  

?>
<a class="btn btn-primary" href="./uploadbot.php">Upload your Bot!</a> / <a class="btn btn-primary" href="./logout.php">Logout</a>
<br>
<br>
<h3>---- Uploaded Bot ----</h3>
<br>
<br>
<?php

$mysql_hostname1 = "localhost";
$mysql_user1 = "root";
$mysql_password1 = "";
$mysql_database1 = "ttbots";
$bd1 = mysql_connect($mysql_hostname1, $mysql_user1, $mysql_password1) 
or die("Opps some thing went wrong");
mysql_select_db($mysql_database1, $bd1) or die("Opps some thing went wrong");

$result = mysql_query('SELECT * FROM botsuploaded');

while($r = mysql_fetch_array($result)) {
	
	if($r['whouploaded'] == $login_session) { 
		echo("<b>Bot Name: ".$r['botname']." Actions: <a href='main.php?d=".$r['botid']."&n=".$r['botfilename']."'>Delete the Bot</a>/<a href='main.php?start=".$r['botid']."&n=".$r['botfilename']."'>Start the Bot</a>/<a href='main.php?stop=".$r['botid']."&n=".$r['botfilename']."'>Stop the Bot</a></b>");
	}
}

?>
<br>
<br>
</div>
</center>
</div>
</div>
<div id="footer">
<div class="container">
<p class="muted credit">© 2013, Designed by Clinr.</p>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
</body></html>