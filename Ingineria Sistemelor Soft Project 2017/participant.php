<?php 
  session_start();
  if($_SESSION['user'] == $_SESSION['participant']){

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
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Front Page!</title>
</head>
<body id="body_director">
  <h1 align="center">Participant Home Page</h1>
<div id="hide_page">
<a  class="img-indexa" href="logout.php"> <img src='pozee/out1.jpg' alt='out' class='image' style='width:5%'> </a>
    <?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "iss_db";
 
$con = mysqli_connect($servername, $username, $password, $db);

Print '<h2>Conferintele sunt:</h2>';
  $sql_3_choose = "SELECT username,propunere_conferinta,name_file_finala,nr_person FROM actori_propuneri WHERE propunere_finala_checkup = 'yes'";
  $result_choose = mysqli_query($con,$sql_3_choose);


  Print'<table width="80%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">'.
    '<tr>'.
      '<th align="center" width="20%">Conferinte Categorie</th>'.
      '<th align="center" width="20%">Autor</th>'.
      '<th align="center" width="20%">Nume Prezentare</th>'.
      '<th align="center" width="20%">Nr Persons</th>'.
      '<th align="center" width="20%">Choose</th>'.
    '</tr>';

    
      while($row_choose = mysqli_fetch_array($result_choose)){
        Print '<tr>'.
          '<td align="center" width="50%">'.$row_choose['propunere_conferinta'].'</td>'.
          '<td align="center" width="100%">'.$row_choose['username'].'</td>'.
          '<td align="center" width="100%">'.$row_choose['name_file_finala'].'</td>'.
          '<td align="center" width="100%">'.$row_choose['nr_person'].'</td>'.
          '<td align="center" width="100%"><a href="scade_participanti.php?propunere='.$row_choose['propunere_conferinta'].'&username='.$row_choose['username'].'&name_file_finala='.$row_choose['name_file_finala'].'">Get Ticket</a></td>'.
          '</tr>';
      }


  $sql_3_choose = "SELECT username,propunere_conferinta,name_file_finala,nr_person FROM actori_propuneri WHERE propunere_finala_checkup = 'yes' AND bilete_ales = 'yes' ";
  $result_choose = mysqli_query($con,$sql_3_choose);


  Print'<table width="80%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">'.
    '<h2>Conferinte la care particip:</h2>'.
    '<tr>'.
      '<th align="center" width="20%">Conferinte Categorie</th>'.
      '<th align="center" width="20%">Autor</th>'.
      '<th align="center" width="20%">Nume Prezentare</th>'.
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