<?php
$conn = new mysqli("localhost","root","","confidential");

$result = $conn->query("SELECT * FROM lost_items ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Lost Items</title>

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

.contact{
display:inline-block;
margin-top:10px;
padding:8px 14px;
background:#1a73e8;
color:white;
border-radius:6px;
text-decoration:none;
}

.contact:hover{
background:#0f5ed7;
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

<h2>Lost Items</h2>

<?php
while($row = $result->fetch_assoc()){
?>

<div class="card">

<p><b>Item:</b> <?php echo $row['title']; ?></p>

<p><b>Description:</b> <?php echo $row['description']; ?></p>

<p><b>Location:</b> <?php echo $row['location']; ?></p>

<p><b>Posted by:</b> <?php echo $row['posted_by']; ?></p>

<a class="contact" target="_blank"
href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo urlencode($row['posted_by']); ?>&su=<?php echo urlencode('Regarding lost item: '.$row['title']); ?>&body=<?php echo urlencode('Hi, I think I found your lost item: '.$row['title']); ?>">
Contact Owner
</a>

</div>

<?php
}
?>

<a class="back" href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
