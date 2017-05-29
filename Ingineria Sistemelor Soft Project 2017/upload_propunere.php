<?php 
	session_start();
		if($_SESSION['user']){

		}else{
			header("location: login.php");
		}
	$user = $_SESSION['user'];
	//$username_user = $_SESSION['username_user'];

	if(isset($_POST['upload'])){
		
//$path = $_GET['id_user'];
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
 
$con = mysqli_connect($servername, $username, $password, $db);

if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)
{
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

// $query = "INSERT INTO users (name_file, size_file, type_file, content_file ) VALUES ('$fileName', '$fileSize', '$fileType', '$content')";
$query = "UPDATE actori_propuneri SET name_file = '$fileName', size_file = '$fileSize', type_file = '$fileType', content_file = '$content' WHERE username = '$user'";
$query2 = "UPDATE actori_propuneri SET notificare = '' WHERE username = '$user'";
mysqli_query($con,$query2) or die('Error test1 checkup, query failed');

$query3 = "UPDATE actori_propuneri SET calificativ = '' WHERE username = '$user'";
mysqli_query($con,$query3) or die('Error test1 checkup, query failed');


//mysqli_query($con,"UPDATE users SET adeverinta='no'        WHERE username='$path'");


		// $date = strftime('%B %d, %Y'); //date
		// $time = strftime('%X'); //time	
		// $admin_value = $user. ' a trimis o Adeverinta user-ului '.$path.' la data '.$date.' si ora '.$time;
		// mysqli_query($con,"INSERT INTO admin_logs (admin_logs) VALUES ('$admin_value')");

mysqli_query($con,$query) or die('Error test1, query failed'); 


echo "<br>File $fileName uploaded<br>";
} 


		// $file = $_FILES['file']['name'];
		// echo $file;
		// $file = /*rand(1000,100000).'-'.*/$_FILES['file']['name'];
		// $file_loc = $_FILES['file']['tmp_name'];
		// echo $file_loc;
		// $folder="D:\Sites\MyFirstWebsite\Adeverinte/";
		// move_uploaded_file($file_loc,$folder.$file);
		// mysqli_query($con, "DELETE FROM users ")
		// mysqli_query($con, "INSERT INTO users(adeverinta_file) VALUES('$file')");
		//mysqli_query($con, "UPDATE users SET adeverinta_file = '$file' WHERE username = '$username_user'");
		header('location: actor.php');
	}
 ?>