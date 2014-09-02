<?php
header("Access-Control-Allow-Origin: *");
$id=$_GET["id"];
$eventCode=$_GET["e"];
$image=explode(".",$id);
$base=file_get_contents("https://metagram.firebaseio.com/'.$eventCode.'/grams/".$image[0]."/base64.json");
$imgstr=json_decode($base);
$new_data=explode(";",$imgstr);
if(count($new_data)>1){
	$type=$new_data[0];
	$data=explode(",",$new_data[1]);
	header("Content-type:".$type);
	echo base64_decode($data[1]);
}
else{
 	$type="image"; // just a guess
	header("Content-type:".$type);
	echo base64_decode($imgstr);
}
