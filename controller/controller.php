#!/usr/bin/php
<?php

		mysql_connect("192.168.0.106", "root", "");
		mysql_select_db("ttbots");

	   function collect_file($bot){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://192.168.0.106/ttbothost/botssecret/"+$bot);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_REFERER, "http://192.168.0.106");
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        return($result);
    }

    function write_to_file($text,$new_filename){
        $fp = fopen($new_filename, 'w');
        fwrite($fp, $text);
        fclose($fp);
    }

		
	function updateUpload($botfile) {
		//$getbot = file_get_contents("http://192.168.0.106/ttbothost/botssecret/"+$botfile);
		//file_put_contents("/bots/"+$botfile, file_get_contents("http://192.168.0.106/ttbothost/botssecret/"+$botfile));;
		//copy("http://192.168.0.106/ttbothost/botssecret/"+$botfile,"/bots/"+$botfile);
		//file_put_contents($botfile, file_get_contents("http://192.168.0.106/ttbothost/botssecret/"+$botfile));
	    //$temp_file_contents = collect_file($botfile);
		//write_to_file($temp_file_contents,$botfile);
		//system("s/usr/bin/wget -q -O - http://192.168.0.106/ttbothost/botssecret/"+$botfile);
		file_put_contents($botfile, file_get_contents("http://192.168.0.106/ttbothost/botssecret/".$botfile));
		echo("downloaded and writed: ".$botfile." successfully!\n");
	}

	//function updateNPMRequirements($npm1,$npm2,$npm3) {
	//	system("/usr/bin/npm $npm1 $npm2 $npm3");
	//}
	
	function checkUploads() {
		$r1 = mysql_query("SELECT botfilename FROM botsuploaded");
		while($res1 = mysql_fetch_array($r1)){
			updateUpload($res1['botfilename']);
		}
	}
	
	
	function npmUpdateForBot($botid) {
		$r3 = mysql_query("SELECT * FROM botsrequirednpm WHERE botid='$botid'");
		$res3 = mysql_fetch_array($r3);
		updateNPMRequirements($res3['npm1'],$res3['npm2'],$res3['npm3']);
	}
	
	function checkQueue() {
		$r2 = mysql_query("SELECT * FROM botsqueued");
		while($res2 = mysql_fetch_array($r2)){
			if($res2['position'] == 0) {
				system("/usr/bin/pkill -f  ".$res2['botfilename']);
			} else if($res2['position'] == 1) {
				system("/usr/bin/screen -dmS bot /usr/bin/node ".$res2['botfilename']);
			}
		}
		mysql_query("truncate table botsqueued");
	}
	
	checkUploads();
	checkQueue();

?>