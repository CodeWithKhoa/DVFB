<?php
$text=$_GET['text'];
$b='{"text":"'.$text.'"}';
$arr = json_decode($b, true);
$a= $arr["text"];
$c='{"text":"'.$a.'"}';
$arr = json_decode($c, true);
$d= $arr["text"];
echo$d;
$age=array("text"=>$d);
$e=json_encode($age);

?>