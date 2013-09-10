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
<br>
<br>
<h3>Upload your Bot Here!</h3>
<br>
<br>
<form action='upload.php' method='post' enctype='multipart/form-data'>
	Bot name: <input type='text' class='span4' name='botname' placeholder='example: My Bot on TT.fm' /><br>
	<!-- Npm install1: <input type='text' class='span4' name='npm1' placeholder='example: ttapi'><br/>
	Npm install2: <input type='text' class='span4' name='npm2' placeholder='you can leave this blank' /><br>
	Npm install3: <input type='text' class='span4' name='npm3' placeholder='you can leave this blank' /><br> -->
	<input type="file" name="file" id="file"><br>
	<input type='submit' class='btn btn-primary' name='submit' value='Upload!' />
</form>
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