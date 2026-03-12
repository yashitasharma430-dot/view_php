<?php
$conn = new mysqli("localhost","root","","confidential");

$result = $conn->query("SELECT * FROM rides ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Available Travel Rides</title>

<style>

body{
font-family: Arial;
background:#f4f4f4;
margin:0;
padding:40px;
}

.container{
max-width:600px;
margin:auto;
}

h2{
text-align:center;
margin-bottom:30px;
}

.card{
background:white;
padding:20px;
margin-bottom:20px;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.card p{
margin:6px 0;
}

.back{
display:block;
text-align:center;
margin-top:20px;
color:#1a73e8;
text-decoration:none;
font-weight:bold;
}

</style>

</head>

<body>

<div class="container">

<h2>Available Travel Rides</h2>

<?php
while($row = $result->fetch_assoc()){
?>

<div class="card">

<p><b>From:</b> <?php echo $row['from_location']; ?></p>

<p><b>To:</b> <?php echo $row['to_location']; ?></p>

<p><b>Date:</b> <?php echo $row['ride_date']; ?></p>

<p><b>Contact:</b> <?php echo $row['contact']; ?></p>

<p><b>Posted by:</b> <?php echo $row['posted_by']; ?></p>

</div>

<?php
}
?>

<a class="back" href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
