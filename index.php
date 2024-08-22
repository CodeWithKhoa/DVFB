<?php require('config/config.php'); 
if(empty($ManhDev->users('username'))) {
include $_SERVER['DOCUMENT_ROOT']."/langding/home.php";
die();
} else {
echo "<script>location.href = '/home'</script>";
die();
}
?>