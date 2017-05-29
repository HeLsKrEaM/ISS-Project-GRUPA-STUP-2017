<!DOCTYPE html>
<html>
<head>
	<title>Front Page!</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="index2">

	<h2 align="center">FRONT PAGE!</h2>
	<!--<p><a href="login.php">Click here to login/register</a></p> -->
  <a class="img-indexa" href="login.php"> <img src='pozee/inn.jpg' alt='out' class='image' style='width:5%'> </a>
	<!--<p><a href="register.php">Click here to register</a></p>
	<a href="logout.php">Click here to logout</a><br><br>-->

	<h2 align="center">NOTIFICATIONS</h2>
  <table width="95%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">
    <tr>
      <th align="center" width="15%">Number</th>
      <th align="center" width="70%">Notification</th>
      <th align="center" width="15%">Time Posted</th>
    </tr>
    <?php 
    $con = mysqli_connect("127.0.0.1","root","","iss_db") or die ("Cannot connect!");
    $query = mysqli_query($con,"SELECT * FROM site_logs");
      while($row = mysqli_fetch_array($query)){
        Print '<tr>'.
          '<td align="center" width="15%">'.$row['id'].'</td>'.
          '<td align="center" width="70%">'.$row['director_notificari'].'</td>'.
          '<td align="center" width="15%">'.$row['time_notificare']. '-' .$row['date_notificare'].'</td>'.
          '</tr>';
      }

     ?>
  </table>

  <h2 align="center">DEADLINES PRESENTATION</h2>
  <table width="95%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">
    <tr>
      <th align="center" width="50%">From Date</th>
      <th align="center" width="50%">To Date</th>
    </tr>
    <?php 
    $con = mysqli_connect("127.0.0.1","root","","iss_db") or die ("Cannot connect!");
    $query = mysqli_query($con,"SELECT * FROM deadline_lucrari");
      while($row = mysqli_fetch_array($query)){
        Print '<tr>'.
          '<td align="center" width="50%">'.$row['from_date'].'</td>'.
          '<td align="center" width="50%">'.$row['to_date'].'</td>'.
          '</tr>';
      }

     ?>
  </table>

		<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
 
$con = mysqli_connect($servername, $username, $password, $db);

Print '<h2 align="center">Conferintele sunt:</h2>';
	$sql_3_choose = "SELECT username,propunere_conferinta,name_file_finala FROM actori_propuneri WHERE propunere_finala_checkup = 'yes'";
	$result_choose = mysqli_query($con,$sql_3_choose);


	Print'<table width="95%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">'.
    '<tr>'.
      '<th align="center" width="33%">Conferinte</th>'.
      '<th align="center" width="33%">Autor</th>'.
      '<th align="center" width="33%">Fisier</th>'.
    '</tr>';

    
      while($row_choose = mysqli_fetch_array($result_choose)){
        Print '<tr>'.
          '<td align="center" width="50%">'.$row_choose['propunere_conferinta'].'</td>'.
          '<td align="center" width="100%">'.$row_choose['username'].'</td>'.
          '<td align="center" width="100%">'.$row_choose['name_file_finala'].'</td>'.
          '</tr>';
      }

?>
</body>
</html>

