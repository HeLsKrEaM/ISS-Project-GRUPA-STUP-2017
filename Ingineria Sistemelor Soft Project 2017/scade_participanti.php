<?php 
	
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
$con = mysqli_connect($servername, $username, $password, $db); 

$scade = $_GET['username'];

mysqli_query($con,"UPDATE actori_propuneri SET nr_person = nr_person-1 ,bilete_ales = 'yes' WHERE username = '$scade'") or die('Error2, query failed');

header('location:participant.php');

?>