	<?php 
	session_start();
	if($_SESSION['user'] == $_SESSION['actor']){

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
	<title>Autor page website!</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>
<body>
	<h1 align="center">Autor Home Page</h1>
	<a  class="img-indexa" href="logout.php"> <img src='pozee/out1.jpg' alt='out' class='image' style='width:5%'> </a>
	
	<div style="visibility: hidden;">
	<?php 
    $con = mysqli_connect("127.0.0.1","root","","iss_db") or die ("Cannot connect!");
    $query = mysqli_query($con,"SELECT * FROM deadline_lucrari");
      while($row = mysqli_fetch_array($query)){
        Print '<span id="from_date" width="10%">'.$row['from_date'].'</span>'.
              '<span id="to_date" width="10%">'.$row['to_date'].'</span>';

      }

     ?>
     </div>

	<div id="propunere_autor" style="margin-top: 25px;">
	<h2>PROPUNERE <?php echo $user; ?></h2>
	<form method="post" action="upload_propunere.php" enctype="multipart/form-data">
		<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
			<tr> 
				<td width="246">
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<input name="userfile" type="file" id="userfile"> 
				</td>
				<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
				</tr>
		</table>
	</form>
	</div>

<h2 style="margin-top: 50px;">PROPUNERE Feedback-Prezentare</h2>
<table width="50%" border="1px">
		<tr>
			<th align="center" width="35%">Notificare</th>
			<th align="center" width="15%">Calificativ</th>
		</tr>
		<?php 
		$con = mysqli_connect("127.0.0.1","root","","iss_db") or die ("Cannot connect!");
		$query = mysqli_query($con,"SELECT notificare,calificativ FROM actori_propuneri WHERE username='$user'");
			while($row = mysqli_fetch_array($query)){
				Print '<tr>'.
					'<td align="center" id="notificare_actor" width="15%">'.$row['notificare'].'</td>'.
					'<td align="center" id="notificare_actor" width="15%">'.$row['calificativ'].'</td>'.
					'</tr>';
			}

		 ?>
</table>
<script type="text/javascript">
	if ($('#notificare_actor').html().slice(0,2) !='No' && $('#notificare_actor').html().slice(0,2) != ''){

		$('body').append('<div style="margin-top:50px; text-align: center">Taxa este de 50$ pentru a participa: <button id="plateste_button" type="button">Plateste</button></div>');
		$('#plateste_button').click(function(){
			$('#propunere_finala').css("display", "initial");		
		});
	}
	
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1;
	var yy = today.getFullYear();
	if( dd < 10 ) {
		dd = '0' + dd;
	}
	if( mm < 10 ) {
		mm = '0' + mm;
	}
	today = mm+'/'+dd+'/'+yy;
	var from_date = $('#from_date').html();
	var to_date = $('#to_date').html();
	if( from_date > today){
		$('#propunere_autor').css('display','none');
	}
	if( to_date < today){
		$('#propunere_autor').css('display','none');
	}
	
	console.log(today);
	console.log($('#from_date').html());
	console.log($('#to_date').html());

</script>

<div id="propunere_finala" style="margin-top: 50px;display: none;">
	<h2>PROPUNERE FINALA <?php echo $user; ?></h2>
	<form method="post" action="upload_propunere_finala.php" enctype="multipart/form-data">
		<table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
			<tr> 
				<td width="246">
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<input name="userfile" type="file" id="userfile"> 
				</td>
				<td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
				</tr>
		</table>
	</form>
	</div>

</body>
</html>