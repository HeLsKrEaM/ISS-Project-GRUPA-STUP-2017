	<?php 
	session_start();
	if($_SESSION['user'] == $_SESSION['reviewer']){

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
	<title>Reviewer page website!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body class="review">
<h1 align="center">Reviewer Home Page</h1>
	<!--<a href="logout.php">Click here to logout</a><br><br>-->
	<a  class="img-indexa" href="logout.php"> <img src='pozee/out1.jpg' alt='out' class='image' style='width:5%'> </a>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.LCheckbox').click(function () {
    		$(this).next().next().prop('disabled', !this.checked)
    		$('.LCheckbox').not(':checked').prop('disabled', $('.LCheckbox:checked').length == 3);
		});
		$('.erase_div').click(function(){
			$(this).prop( "checked" );
		});
		jQuery('.erase_div').click(function(){
            jQuery(this).find('input.LCheckbox').prop( "checked",true );
        });
	});
	function show(target){
		document.getElementById(target).style.display = 'block';
	}
	$("links").click(function(){
	    $("#links").addClass("hidden");
	});
	</script>
</body>
</html>	

	<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
 
$con = mysqli_connect($servername, $username, $password, $db);

$query = "SELECT username,name_file FROM actori_propuneri";
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

$sql_num_rows = "SELECT presentation_reviewer FROM reviewer_table WHERE presentation_reviewer = '$user'";
$result_rows = mysqli_query($con,$sql_num_rows);
$rowcount = mysqli_num_rows($result_rows);
//echo $rowcount;

if ($rowcount <3){

echo '<h2>PROPUNERI PREZENTARI</h2><div class="div_erasee">';
while($row = mysqli_fetch_array($result)){
//
// 	$newname = $row["username"];
// 	$user_count_query = "SELECT user_count FROM actori_propuneri WHERE username = '$newname'";
// $result1 = mysqli_query($con, $user_count_query) or die('Error10, query failed');

// $user_count = 0;
// while($row = mysqli_fetch_array($result1)){
// 	$user_count = $row['user_count'];
// }
// echo $user_count;

// if( $user_count >= 3 ) {
// 	preg_replace('#<div id="'.$row["username"].'(.*?)</div>#', ' ', $incoming_data);
// }
//
	Print '<br>';
	Print '<div class="erase_div">';
	Print '<a href="download_propunere.php?id='. $row["username"] .'&id_reviewer='.$user.'" id="'.$row["username"].'">Download '.$row["name_file"] .'</a><span>'.' - Propunere Prezentare lui '.$row["username"].'</span><input name="" type="checkbox" value="'.$row["name_file"] .'" class="LCheckbox"><br>';
	Print '</div>';
	Print '<br>';
	}
	echo '</div>';
}else{
	Print '<h2>Prezentarile alese de '.$user.'</h2>';
	$sql_3_choose = "SELECT presentation_number FROM reviewer_table WHERE presentation_reviewer = '$user'";
	$result_choose = mysqli_query($con,$sql_3_choose);


	Print'<table width="50%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">'.
    '<tr>'.
      '<th align="center" width="50%">Presentation chosen</th>'.
    '</tr>';

    
      while($row_choose = mysqli_fetch_array($result_choose)){
        Print '<tr>'.
          //'<td align="center" width="50%">'.$row['from_date'].'</td>'.
          '<td align="center" width="100%">'.$row_choose['presentation_number'].'</td>'.
          '</tr>';
      }

 
  	Print '</table>';
  	Print '<div class="btn-delet button"><a href="delete_records.php?id_records='.$user.'">Delete Records</a></div>';

}

}
?>


<h2>STATISTICI PREZENTARI-REVIEW-ERI</h2>
<table width="70%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">
    <tr>
      <th align="center" width="15%">ID</th>
      <th align="center" width="55%">Notification</th>
    </tr>
<?php 
$query_statistics = "SELECT * FROM statistics";
$result_statistics = mysqli_query($con, $query_statistics) or die('Error, query failed');
while($row = mysqli_fetch_array($result_statistics)){
	Print '<tr>'.
          '<td align="center" width="15%">'.$row['id'].'</td>'.
          '<td align="center" width="55%">'.$row['statistics_review_choice'].'</td>'.
          '</tr>';
	}

		// $query = "SELECT username FROM actori_propuneri";
		// $result = mysqli_query($con, $query) or die('Error, query failed');
		
		// echo '<h2>Feedback prezentari</h2>';
		// echo "<select name='select_feedback'>";
		// 	while ($row = mysqli_fetch_array($result)) {
  //   			echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
		// 	}			
		// echo "</select>";

	  ?>
</table>
<div onclick="show('comment2')" id="links" class="button">Trimite feedback la prezentari</div>
<form action="reviewer.php" method="POST" id="comment2" style="margin: 50px 50px; display: none;">
	<div style="display: block;margin: 10px 0px;">Alege autor:
	<select name='select_feedback'>
		<?php 
		$query = "SELECT username FROM actori_propuneri";
		$result = mysqli_query($con, $query) or die('Error, query failed');
		while ($row = mysqli_fetch_array($result)) {
    			echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
			}	
		 ?>
	</select>
	</div>
	<div style="display: block;margin: 10px 0px;">Alege calificativ:
	<select name='select_feedback_calificative'>
		<option>Select</option>
		<option value="Strong accept">Strong accept</option>
		<option value="Accept">Accept</option>
		<option value="Weak Accept">Weak Accept</option>
		<option value="Borderline Paper">Borderline Paper</option>
		<option value="Weak Reject">Weak Reject</option>
		<option value="Reject">Reject</option>
		<option value="Strong Reject">Strong Reject</option>
	</select>
	</div>
	<div style="display: block;margin: 10px 0px;">Alege conferinta:
	<select name='select_conference'>
		<?php 
		$query_conference = "SELECT nume_conferinta,time_conferinta,time_end FROM conferinte";
		$result_conference = mysqli_query($con, $query_conference) or die('Error, query failed');
		while ($row_conference = mysqli_fetch_array($result_conference)) {
    			echo "<option value='" . $row_conference['nume_conferinta'] .' - '.$row_conference['time_conferinta']. "'>" . $row_conference['nume_conferinta'] .' - '.$row_conference['time_conferinta'].' - '.$row_conference['time_end']. "</option>";
    			//echo $row_choose['time_conferinta'];
			}	
		 ?>
	</select>
	</div>
	<p><input type="text" name="notificare_textarea" style="height:130px;width:400px;"></p>
	<p><input type="submit" name="submit_notificare" value="Send Feedback"></p>
</form>
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$con = mysqli_connect("127.0.0.1","root","","iss_db") or die("Cannot connect");
		$value = $_POST['select_feedback'];
		
		$value_calificative = $_POST['select_feedback_calificative'];
		mysqli_query($con,"UPDATE actori_propuneri SET calificativ = '$value_calificative' WHERE username='$value'");
		//echo $value_calificative;


		//echo $value;
		$notificare = mysqli_real_escape_string($con,$_POST['notificare_textarea']);
		//$date = strftime('%B %d, %Y'); //date
		//$time = strftime('%X'); //time	
			
		mysqli_query($con,"UPDATE actori_propuneri SET notificare = '$notificare' WHERE username='$value'");
		if(substr($notificare,0,2) != 'No' && $value_calificative == 'Strong accept' || $value_calificative == 'Accept' || $value_calificative == 'Weak Accept' || $value_calificative == 'Borderline Paper') {
			//echo $value_calificative;

			$conference = $_POST['select_conference'];
			echo $conference;
			mysqli_query($con,"UPDATE actori_propuneri SET propunere_conferinta = '$conference',nr_person='$nr_person_final' WHERE username='$value'");

			$result_email = mysqli_query($con, "SELECT username,name,email FROM users WHERE username = '$value' ");
			while($row4 = mysqli_fetch_array($result_email)){
				$email = mysqli_real_escape_string($con,$row4['email']);
				$name_db = mysqli_real_escape_string($con,$row4['name']);
				//$password = mysqli_real_escape_string($con,$row4['password']);
				$username_db = mysqli_real_escape_string($con,$row4['username']);
			}
			//echo $name_db,$username_db;

			$name_db2 = $name_db;
			$to = $email;
			$subject = 'Confirmation Email';
			$message = '
 
Thanks for sending your presentation!

------------------------
Username: '.$username_db.'
Password: 1234
------------------------
 
You can now procced to sent your Final Presentation!
Your email '.$to.' and name '.$name_db2.'
';
$headers = 'From:noreply@yourwebsite.com' . "\r\n";
mail($email, $subject, $message, $headers);

		}

	}
 ?>
