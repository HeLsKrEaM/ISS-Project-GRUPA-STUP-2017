<?php 
	
	session_start();
	$con = mysqli_connect("127.0.0.1","root","","iss_db") or die("Cannot connect");
	$username = mysqli_real_escape_string($con,$_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	//$type = mysqli_real_escape_string($con,$_POST['type']);
	// echo "Username is: ". $username. "<br>";
	// echo "Password is: ". $password;
	
	$table_users = "";
	$table_password = "";
	$table_type = "";

	$query = mysqli_query($con,"SELECT * from users WHERE username='$username'");
	$exists = mysqli_num_rows($query);
	//Print '<script>alert($query);</script>';
	if($exists > 0){
		while($row = mysqli_fetch_assoc($query)) {
			$table_users = $row['username'];
			$table_password = $row['password'];
			$table_type = $row['type'];
		}
		if (($username == $table_users) && ($password == $table_password) && ($table_type == 0)){
				if ($password == $table_password) {
						$_SESSION['user'] = $username;
						$_SESSION['actor'] = $username;
						header("location: actor.php");
				}
		}
		if (($username == $table_users) && ($password == $table_password) && ($table_type == 1)){
				if ($password == $table_password) {
						$_SESSION['user'] = $username;
						$_SESSION['participant'] = $username;
						header("location: participant_before_pay.php");
				}
		}
		if (($username == $table_users) && ($password == $table_password) && ($table_type == 2)){
				if ($password == $table_password) {
						$_SESSION['user'] = $username;
						$_SESSION['director'] = $username;
						header("location: director_before_pay.php");
				}
		}
		if (($username == $table_users) && ($password == $table_password) && ($table_type == 3)){
				if ($password == $table_password) {
						$_SESSION['user'] = $username;
						$_SESSION['reviewer'] = $username;
						header("location: reviewer_before_pay.php");
				}
		}
		if (($username == $table_users) && ($password == $table_password) && ($table_type == 4)){
				if ($password == $table_password) {
						$_SESSION['user'] = $username;
						header("location: speaker.php");
				}
		}
		else
		{
			Print '<script>alert("Incorect Password!");</script>';
			Print '<script>window.location.assign("login.php");</script>';
		}
	}
	else
	{
		Print '<script>alert("Wrong Username!");</script>';
		Print '<script>window.location.assign("login.php");</script>';
	}

 ?>

</body>
</html>
