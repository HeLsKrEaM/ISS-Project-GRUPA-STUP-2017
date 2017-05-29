<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(isset($_POST['upload'])){
			$con = mysqli_connect("127.0.0.1","root","","iss_db") or die("Cannot connect");
			$from = $_POST['from'];
			$to = $_POST['to'];
			//$query = "INSERT INTO deadline_lucrari (from_date,to_date) VALUES ('$from','$to')";
			$query = "UPDATE deadline_lucrari SET from_date = '$from', to_date = '$to'";
			mysqli_query($con,$query)or die("Fail");
			header('location:director.php');
		}
	}
 ?>