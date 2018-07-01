<?php
include_once 'database.php';
if(isset($_POST['save']))
{
try {
$name = $_POST['name'];
$birth_day = $_POST['birth_day'];
$birth_day_a=substr("$birth_day",3);//send the month and day to database
$phone_no=$_POST['phone_no'];
//database connection
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//database connection
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "INSERT INTO birth_day (name,birth_day,birth_day_a,phone_number)
VALUES ('$name','$birth_day','$birth_day_a','$phone_no')";
$conn->exec($sql);
$message = "New member data added successfully. Name : ".$name." ";
}
catch(PDOException $e)
{
echo $sql . "
" . $e->getMessage();
}
$conn = null;
}
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
<body>
<div><?php if(isset($message)) { echo $message; } ?>
</div> 
<form method="post" action="">
Name:<br>
<input type="text" name="name" placeholder="Name">
<br>
Birthday:<br>
<input type="text" name="birth_day" placeholder="Birthday (yy-mm-dd)">
<br>
Phone No:<br>
<input type="text" name="phone_no" placeholder="Phone Number">
<br><br>
<input type="submit" class="btn btn-success" value="Submit" name="save"> <button class="btn btn-success" type="button" onclick="window.location.href='index.php'">Send Wishes</button>
</form> 
</body>
</html>