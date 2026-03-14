<?php
$conn = new mysqli("localhost","root","","confidential");

$result = $conn->query("SELECT * FROM rides ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Available Rides</title>

<style>

body{
font-family:Arial;
background:#f4f4f4;
padding:40px;
}

.container{
max-width:600px;
margin:auto;
}

.card{
background:white;
padding:20px;
margin-bottom:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.join{
background:#28a745;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:6px;
margin-right:10px;
}

.confirm{
background:#ff9800;
color:white;
padding:8px 14px;
text-decoration:none;
border-radius:6px;
}

</style>

</head>

<body>

<div class="container">

<h2>Available Travel Rides</h2>

<?php
while($row = $result->fetch_assoc()){

$seats_left = $row['seats_left'];
$from = $row['from_location'];
$to = $row['to_location'];
$date = $row['ride_date'];
$email = $row['posted_by'];
$id = $row['id'];
?>

<div class="card">

<p><b>From:</b> <?php echo $from; ?></p>
<p><b>To:</b> <?php echo $to; ?></p>
<p><b>Date:</b> <?php echo $date; ?></p>
<p><b>Contact:</b> <?php echo $row['contact']; ?></p>
<p><b>Posted by:</b> <?php echo $email; ?></p>
<p><b>Seats Left:</b> <?php echo $seats_left; ?></p>

<?php if($seats_left > 0){ ?>

<a class="join" target="_blank"
href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo urlencode($email); ?>&su=Ride%20Request&body=<?php echo urlencode('Hi, I want to join your ride from '.$from.' to '.$to.' on '.$date); ?>">
Send Mail
</a>

<a class="confirm" href="confirm_join.php?id=<?php echo $id; ?>">
Confirm Joined
</a>

<?php } else { ?>

<p style="color:red;"><b>Ride Full</b></p>

<?php } ?>

</div>

<?php
}
?>

</div>

</body>
</html>
