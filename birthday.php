<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
<body>
<?php
include('way2sms-api.php');
$date = date("Y/m/d"); //here my date format in my DB is 2010/09/30
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "sms_test";
// Create connection
$link = mysqli_connect($servername, $username, $password ,$dbname);
if($link && mysqli_select_db($link,'sms_test'))
{
	$date = date("Y-m-d"); //Today date 
	$birth=substr("$date",5);
    $grabBday = "SELECT * FROM birth_day where birth_day_a='".$birth."';";
	//here it will take the name of the person whose bday is on a particular date
    if($rs = mysqli_query($link, $grabBday))
    {
        while($row=mysqli_fetch_array($rs))
        {
            
			sendWay2SMS ( 'usernamehere' , 'passwordhere' , $row['phone_number'] , "Dear ".$row['name'].",\nHappy Birthday");   
        }
    }
	echo 'Birthday Wish Send Successfully.';
}  ?>
<form method="post"	 action="index.php">
<p align="center"><button type="submit" class="btn btn-success" name="save">Thankyou</button></P>
</form>
</body>
</html>