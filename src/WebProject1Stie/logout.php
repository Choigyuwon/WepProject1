<?php
session_start();
$session=session_dextroy();
if($session){
	header('Location: main.php');
}
?>
