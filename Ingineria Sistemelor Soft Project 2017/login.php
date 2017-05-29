<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="log">

<div class="container">
  <h2>Login Window</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">Login</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" action="checklogin.php" method="POST">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" name="username" required="required" class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="password" required="required" class="form-control" id="psw" placeholder="Enter password">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
              <button type="submit" name="Login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <!--<p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>-->
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
function show(target){
document.getElementById(target).style.display = 'block';
}
$("links").click(function(){
    $("#links").addClass("hidden");
});
</script>
<div onclick="show('comment3')" id="links" class="button">Create your account</div>
  <form action="admin.php" id="comment3" method="POST" style="margin: 50px 50px; display: none;">
    
    <p>Enter Username: <input type="text" name="username" ></p>
    <p>Enter Password: <input type="Password" name="password" ></p>
    <p>Enter Name: <input type="text" name="name"></p>
    <p>Enter Email: <input type="email" name="email"></p>
    <p>Enter Credentials: <input type="text" name="type" size="1"></p>
    <span style="display: block;">0 - Autor</span>
    <span style="display: block;">1 - Participant</span>
    <span style="display: block;">2 - Director</span>
    <span style="display: block;">3 - Reviewer</span>
    <!--<span style="display: block;">4 - Speaker</span><br> 
     <select name="type">
      <option value="Actor">Actor</option>
      <option value="Participant">Participant</option>
      <option value="Director">Director</option>
      <option value="Reviewer">Reviewer</option>
      <option value="Speaker">Speaker</option>
    </select><br>-->
    <p><input type="submit" name="register" value="Register"></p>
  </form> 
  </div>
  <!-- <h2 align="center">NOTIFICATIONS</h2>
  <table width="100%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">
    <tr>
      <th align="center" width="15%">Number</th>
      <th align="center" width="70%">Notification</th>
      <th align="center" width="15%">Time Posted</th>
    </tr>
    <?php 
    // $con = mysqli_connect("127.0.0.1","root","","iss_db") or die ("Cannot connect!");
    // $query = mysqli_query($con,"SELECT * FROM site_logs");
    //   while($row = mysqli_fetch_array($query)){
    //     Print '<tr>'.
    //       '<td align="center" width="15%">'.$row['id'].'</td>'.
    //       '<td align="center" width="70%">'.$row['director_notificari'].'</td>'.
    //       '<td align="center" width="15%">'.$row['time_notificare']. '-' .$row['date_notificare'].'</td>'.
    //       '</tr>';
     // }

     ?>
  </table>

  <h2 align="center">DEADLINES PRESENTATION</h2>
  <table width="100%" border="1px" style="margin: 15px 25px;box-sizing: border-box;">
    <tr>
      <th align="center" width="50%">From Date</th>
      <th align="center" width="50%">To Date</th>
    </tr>
    <?php 
    // $con = mysqli_connect("127.0.0.1","root","","iss_db") or die ("Cannot connect!");
    // $query = mysqli_query($con,"SELECT * FROM deadline_lucrari");
    //   while($row = mysqli_fetch_array($query)){
    //     Print '<tr>'.
    //       '<td align="center" width="50%">'.$row['from_date'].'</td>'.
    //       '<td align="center" width="50%">'.$row['to_date'].'</td>'.
    //       '</tr>';
     // }

     ?>
  </table> -->

</body>
</html>