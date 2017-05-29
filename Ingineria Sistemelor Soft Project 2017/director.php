<?php 
	session_start();
	if($_SESSION['user'] == $_SESSION['director']){

	}else
	{
		header("location: login.php");
	}
	$user = $_SESSION['user'];
	//$id = $_SESSION['id'];

	 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Director page website!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--<script language="javascript" src="calendar.js"></script>-->
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!--<link rel="stylesheet" href="/resources/demos/style.css" />-->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	

    <script>
        $(function() {
            $( "#from" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                }
            });
            $( "#to" ).datepicker({
                defaultDate: "+1w",
                changeMonth: true,
                numberOfMonths: 3,
                onClose: function( selectedDate ) {
                    $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                }
            });
        });
        function show(target){
				document.getElementById(target).style.display = 'block';
			}
			$("links").click(function(){
			    $("#links").addClass("hidden");
			});
    </script>
</head>
<body id="body_director">
	<h1 align="center">Director Home Page</h1>
<div id="hide_page">
	
	<a  class="img-indexa" href="logout.php"> <img src='pozee/out1.jpg' alt='out' class='image' style='width:5%'> </a>
<div onclick="show('comment1')" id="links" class="button">Enter notification to site</div>
	<form action="director.php" id="comment1" method="POST" style="margin: 50px 50px; display: none;">
		<p><input type="text" name="notificare_textarea" style="height:130px;width:400px;"></p>
		<p><input type="submit" name="submit_notificare" value="Send notification" placeholder="Write..."></p>
	</form>
<div onclick="show('comment')" id="links" class="button">Create Conference</div>
	<form action="director.php" id="comment" method="POST" style="margin: 50px 50px; display: none;">
		<p>Name:<input type="text" name="create_conference" ></p>
		<p>Time Start:<input type="time" name="create_conference_time" ></p>
		<p>Time End:<input type="time" name="create_conference_end" ></p>
		<p>Nr persons:<input type="text" name="nr_person" ></p>
		<p><input type="submit" name="submit_conference" value="Create Conference"></p>
	</form>

	<form action="deadline_lucrari.php" method="POST" style="margin: 30px 0px;">
	<h2>DEADLINE LUCRARI:</h2>
	    <label for="from">From</label>
	    <input type="text" id="from" name="from" />
	    <label for="to">to</label>
	    <input type="text" id="to" name="to" />
	    <input type="submit" value="Submit dates" name="upload">
	</form>

 	<h2>STATISTICI PREZENTARI-REVIEW-ERI</h2>
<table width="100%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">
    <tr>
      <th align="center" width="15%">ID</th>
      <th align="center" width="55%">Notification</th>
    </tr>
<?php 
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
$con = mysqli_connect($servername, $username, $password, $db); 

$query_statistics = "SELECT * FROM statistics";
$result_statistics = mysqli_query($con, $query_statistics) or die('Error, query failed');
while($row = mysqli_fetch_array($result_statistics)){
	Print '<tr>'.
          '<td align="center" width="15%">'.$row['id'].'</td>'.
          '<td align="center" width="55%">'.$row['statistics_review_choice'].'</td>'.
          '</tr>';
	}
	  ?>
</table>

<div onclick="show('comment4')" id="links" class="button">Feedback prezentari</div>
<form action="reviewer.php" method="POST" id="comment4" style="display: none;">
	<div style="display: block;margin: 10px 0px;">Alege autor:
	<select name='select_feedback_reviewer'>
		<?php 
		$query = "SELECT username FROM users WHERE type=3";
		$result = mysqli_query($con, $query) or die('Error, query failed');
		while ($row = mysqli_fetch_array($result)) {
    			echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
			}	
		 ?>
	</select>
	<p><input type="text" name="notificare_textarea_reviewer" style="height:130px;width:400px;"></p>
	<input type="submit" name="submit_notificare_reviewer" value="Send Feedback">
	</div>
</form>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
$con = mysqli_connect($servername, $username, $password, $db); 

if(isset($_POST['submit_notificare_reviewer'])){
	
	$conferinta_reviewer = $_POST['select_feedback_reviewer'];
	$conferinta_notificare = $_POST['notificare_textarea_reviewer'];
	$query_conferinta = "UPDATE users SET notificare_reviewer='$conferinta_notificare' WHERE username";
	mysqli_query($con,$query_conferinta);

}

?>
	
</div>
</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
$con = mysqli_connect($servername, $username, $password, $db); 


if(isset($_POST['submit_conference'])){

	$conferinta_123 = $_POST['create_conference'];
	$conferinta_time_123 = $_POST['create_conference_time'];
	$conferinta_time_end = $_POST['create_conference_end'];
	$nr_person = $_POST['nr_person'];
	// echo $nr_person;
	// echo $conferinta_123;
	// echo $conferinta_time_123;
	// echo $conferinta_time_end;
	mysqli_query($con,"UPDATE actori_propuneri SET nr_person='$nr_person' WHERE propunere_finala_checkup='yes'");
	mysqli_query($con,"INSERT INTO conferinte (nume_conferinta,time_conferinta,time_end,nr_person) VALUES ('$conferinta_123','$conferinta_time_123','$conferinta_time_end','$nr_person')") or die('Error123, query failed');

}

$query = "SELECT username,name_file_finala FROM actori_propuneri WHERE propunere_finala_checkup = 'yes'";
$result = mysqli_query($con, $query) or die('Error, query failed');
if(mysqli_num_rows($result) == 0)
{
echo "Database is empty <br>";
} 
else
{
// while(list($id, $name) = mysqli_fetch_array($result))
// {
// ?>
<!--<a href="download.php?id='. $id .'"><?php=$name;?>DOwnload</a> <br>-->
 <?php 
// }

//echo '<div id="hide_page">';
echo '<h2>PROPUNERI PREZENTARI FINALA</h2><div class="hide_page">';
while($row = mysqli_fetch_array($result)){

	Print '<br>';
	Print '<a href="download_propunere.php?id='. $row["username"] .'">Download '.$row["name_file_finala"] .'</a><span>'.' - Propunerea Finala a lui '.$row["username"].'</span><br>';
	Print '<br>';
	}
echo "</div>";
}



	if(isset($_POST['submit_notificare'])){
		$con = mysqli_connect("127.0.0.1","root","","iss_db") or die("Cannot connect");

		$notificare = mysqli_real_escape_string($con,$_POST['notificare_textarea']);
		$date = strftime('%B %d, %Y'); //date
		$time = strftime('%X'); //time	

		// $admin_value = $user. ' a scris o notoficare/alerta pentru toti angajatii la data '.$date.' si ora '.$time;
		// mysqli_query($con,"INSERT INTO admin_logs (admin_logs) VALUES ('$admin_value')");
		
		
		mysqli_query($con,"INSERT INTO site_logs (director_notificari, time_notificare ,date_notificare) VALUES ('$notificare','$time','$date')");

	}
 ?>
<!-- <?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $db = "iss_db";
 
// $con = mysqli_connect($servername, $username, $password, $db);

// $query = "SELECT username,name_file_finala FROM actori_propuneri";
// $result = mysqli_query($con, $query) or die('Error, query failed');
// if(mysqli_num_rows($result) == 0)
// {
// echo "Database is empty <br>";
// } 
// else
// {
// // while(list($id, $name) = mysqli_fetch_array($result))
// // {
// // ?>
// <a href="download.php?id='. $id .'"><?php=$name;?>DOwnload</a> <br>
//  <?php 
// // }

// echo '<h2>PROPUNERI PREZENTARI FINALA</h2>';
// while($row = mysqli_fetch_array($result)){

// 	Print '<br>';
// 	Print '<a href="download_propunere.php?id='. $row["username"] .'">Download '.$row["name_file_finala"] .'</a><span>'.' - Propunere Prezentare lui '.$row["username"].'</span><br>';
// 	Print '<br>';
// 	}

// }

	  ?>-->
