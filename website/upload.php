<?php
include("lock.php");
$allowedExts = array("js");
$bot_file = null; 
$genid = md5(rand(0,9999));
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if (in_array($extension, $allowedExts) || ($_FILES["file"]["type"] == "image/gif") && ($_FILES["file"]["size"] < 10000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
	  if (file_exists("botssecret/" . $_FILES["file"]["name"]))
      {
      die($_FILES["file"]["name"] . " already exists. ");
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "botssecret/" . $_FILES["file"]["name"]);
      echo "<b>File uploaded, please wait while the remote server gets your bot code ready. It should take 1 minute. You can press back button now...</b>";
	  //header("Location: main.php");
	  }
	  $bot_file = $_FILES["file"]["name"];
	  }
  }
else
  {
  //include("uploadbot.php");
  die("Invalid file, must be a node js file!");
  }
  
  
$mysql_hostname2 = "localhost";
$mysql_user2 = "root";
$mysql_password2 = "";
$mysql_database2 = "ttbots";
$bd2 = mysql_connect($mysql_hostname2, $mysql_user2, $mysql_password2)
or die("Opps some thing went wrong");
mysql_select_db($mysql_database2, $bd2) or die("Opps some thing went wrong");

mysql_query("insert ignore into botsuploaded values ('".$login_session."','".$genid."','".$_POST['botname']."','$bot_file','/bots/".$bot_file."')");
/*if($_POST['npm1'] !== null || $_POST['npm1'] !== '') {
	$npm1 = $_POST['npm1'];
} else {
	$npm1 = null;
}
if($_POST['npm2'] !== null || $_POST['npm2'] !== '') {
	$npm2 = $_POST['npm2'];
} else {
	$npm2 = null;
}
if($_POST['npm3'] !== null || $_POST['npm3'] !== '') {
	$npm3 = $_POST['npm3'];
} else {
	$npm3 = null;
}*/
//mysql_query("insert into botsrequirednpm values ('".$genid."','".$npm1."','".$npm2."',".$npm3."')");

//include("uploadbot.php");

?>