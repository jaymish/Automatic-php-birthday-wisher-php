<?php
include_once 'database.php';
date_default_timezone_set("Asia/Calcutta");
$date = date("Y-m-d"); //Today date 
$birth=substr("$date",5);
$result = mysqli_query($conn,"SELECT * FROM birth_day where birth_day_a='".$birth."';");//Select the birthday list
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
</head>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
<tr>
<th>User Id.</th>
<th>Name</th>
<th>Birthday date</th>
<th>Phone Number</th>
</tr>
</thead>
<tfoot>
<tr>
<th>User Id.</th>
<th>Name</th>
<th>Birthday date</th>
<th>Phone Number</th>
</tr>
</tfoot>
<tbody>
<form method="post" action="birthday.php">
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["user_id"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["birth_day"]; ?></td>
<td><?php echo $row["phone_number"]; ?></td>
</tr>
<?php 
$i++;
}
?>	
</tbody>
</table>
<p align="center"><button type="submit" class="btn btn-success" name="save">Send Birthday Wishes </button>   <button class="btn btn-success" type="button" onclick="window.location.href='insert.php'">Insert Value</button></P>
</form>
<script>
$("#checkAll").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>
</body>
</html>