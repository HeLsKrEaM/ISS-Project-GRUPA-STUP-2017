
<?php  
$con = mysqli_connect("127.0.0.1","root","","iss_db") or die("Cannot connect");

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$type = mysqli_real_escape_string($con,$_POST['type']);
	//$type = $_POST['type'];
	// echo "<br>";
	// echo "Username is: ". $username. "<br>";
	// echo "Password is: ". $password. "<br>";
	// echo "Type is: ". $type;

	$bool = true;
	$query = mysqli_query($con,"Select * from users"); //Query the users table
	while ($row = mysqli_fetch_array($query)) { //display all rows from query
		$table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
		if($username == $table_users) // checks if there are any matching fields
		{
			$bool = false; // sets bool to false
			Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
			Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php
		}
	}
	if($bool) // checks if bool is true
	{
		mysqli_query($con,"INSERT INTO users (username, password, name, email, type) VALUES ('$username','$password','$name','$email', '$type')"); 
		mysqli_query($con,"INSERT INTO actori_propuneri (username) VALUES ('$username')");//Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
		Print '<script>window.location.assign("login.php");</script>'; // redirects to register.php
	}
	
}
?>