<?php
if(isset($_GET['id'])) 
{


$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
 
$con = mysqli_connect($servername, $username, $password, $db);
$name    = $_GET['id'];
$reviewer_name = $_GET['id_reviewer'];
echo $reviewer_name;

$query = "SELECT name_file, type_file, size_file, content_file FROM actori_propuneri WHERE username = '$name'";
mysqli_query($con,"UPDATE actori_propuneri SET user_count = user_count+1 WHERE username = '$name'") or die('Error2, query failed');
$user_count_query = "SELECT user_count FROM actori_propuneri WHERE username = '$name'";
$result1 = mysqli_query($con, $user_count_query) or die('Error10, query failed');;

$user_count = 0;
while($row = mysqli_fetch_array($result1)){
	$user_count = $row['user_count'];
}
echo $user_count;
$true = 1;

if( $user_count >= 3 ) {
	mysqli_query($con,"UPDATE actori_propuneri SET name_file = '', size_file = '', type_file = '', content_file = '', user_count = 0 WHERE username = '$name'");
	//$div_remover = preg_replace('#<div id="'.$name.'(.*?)</div>#', ' ', $incoming_data);
}
if ($true == 1) {
	# code...
	$statistics_review_choice = $reviewer_name. ' a ales prezentarea lui '.$name;
	mysqli_query($con,"INSERT INTO statistics(statistics_review_choice) VALUES ('$statistics_review_choice')");
}
		// $date = strftime('%B %d, %Y'); //date
		// $time = strftime('%X'); //time	
		// $admin_value = 'Userul a primit Pontajul de la Departamentul Resurse la data '.$date.' si ora '.$time;
		// mysqli_query($con,"INSERT INTO admin_logs (admin_logs) VALUES ('$admin_value')");

mysqli_query($con,"INSERT INTO reviewer_table(presentation_reviewer,presentation_number) VALUES ('$reviewer_name','$name')");



$result = mysqli_query($con, $query) or die('Error, query failed');
list($name, $typef, $size, $content) =  mysqli_fetch_array($result);

header("Content-length: $size");
header("Content-type: $typef");
header("Content-Disposition: attachment; filename=$name");
//header('location: reviewer.php');
echo $content;
exit;
}

?>
