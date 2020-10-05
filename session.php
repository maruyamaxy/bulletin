<?php
session_start();

if($_SESSION["EMAIL"] === ""){
	header("location: index.php?reffer=".$_SERVER["REQUEST_URI"]);
	exit;
}

?>
