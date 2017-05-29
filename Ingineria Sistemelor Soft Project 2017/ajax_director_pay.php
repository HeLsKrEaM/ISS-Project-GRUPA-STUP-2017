<?php 
if(isset($_REQUEST))
{
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
 
$con = mysqli_connect($servername, $username, $password, $db);

if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    } 

$payButton2 = json_decode($_GET['pay']);
$payButton = $_GET['pay'];
$director = $_GET['director'];
$decoded_pay = json_decode($payButton);
$decoded_director = json_decode($director); 
echo $decoded_pay;
echo $decoded_director;
echo $payButton2;
$query = "UPDATE users SET pay_access='$payButton' WHERE username='$director'";
mysqli_query($con,$query)or die('Error ajax, query failed');
}
 ?>