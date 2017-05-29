<?php 
	session_start();
	if($_SESSION['user']){

	}else
	{
		header("location: login.php");
	}
	$user = $_SESSION['user'];
	//$id = $_SESSION['id'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "iss_db";
 
	$con = mysqli_connect($servername, $username, $password, $db);

	$query = "SELECT username,pay_access FROM users WHERE username = '$user'";
	$result = mysqli_query($con, $query) or die('Error, query failed');
	while($row = mysqli_fetch_array($result)){
		if($row['pay_access']=='yes'){
			header('location:reviewer.php');
		}
	}

	 ?>
	 <!DOCTYPE html>
	 <html>
	 <head>
	 	<title>DIRECTOR before pay!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	 </head>
	 <body>

	 <h1 align="center">Reviewer Home Page</h1>
	 <p class="director_name">Hello <?php Print "$user" ?></p>
	<a href="logout.php">Click here to logout</a><br><br>
	<div id="show_page" style="margin: 18px 0px;">
		<button type="button" class="btn btn-success" style="margin: auto; display: block;">Payment Button</button>
		<p  style="text-align: center;" >You have to pay to have acces.</p>
	</div>

	<script type="text/javascript">
		//var check = 'hidden';
		//$(document).on('click','#save',function(e) {
		$('#show_page').click(function(){
        	// $('#hide_page').css('visibility', 'visible');
        	// $('.hide_page').css('visibility', 'visible');
        	// $('#show_page').css('display','none');
        
        
        var payButton = 'yes';
        var user = $('.director_name').text().slice(6);
        $.ajax({
        	type: "GET",
        	url: "ajax_director_pay.php",
        	data: "pay="+payButton+"&director="+user,
        	success: function(data) {
        		//alert(user);
        		console.log(user);
        	}
        });
        window.location.replace("http://localhost/ISS/reviewer.php");
        });

	</script>
	 
	 </body>
	 </html>