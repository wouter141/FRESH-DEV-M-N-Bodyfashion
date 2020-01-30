<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
require('../dbconn.php');

$textMain = $_POST['textMain'];
$sql = "UPDATE text SET string = '$textMain' WHERE name = 'spaarsysteem_main'";
$statement = $conn->prepare($sql);
$statement->execute();

header('Location: ../../Spaarsysteem');
?>