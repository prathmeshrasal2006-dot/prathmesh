<?php
include 'db.php';

$res = $conn->query("SELECT * FROM criminals");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Criminals</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background:#f0f2f5;
}

.header {
    background:#0d2b52;
    color:white;
    padding:15px;
    text-align:center;
    font-size:24px;
    font-weight:bold;
}

.card-custom {
    border-radius:10px;
    padding:20px;
    margin:20px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    background:white;
}

.criminal-img {
    width:180px;
    height:180px;
    object-fit:cover;
    border-radius:10px;
}

.name {
    font-size:24px;
    font-weight:bold;
}

.details {
    font-size:18px;
    margin-top:5px;
}
</style>

</head>

<body>

<div class="header">CRIMINAL RECORDS</div>

<div class="container">

<?php while($row = $res->fetch_assoc()){ ?>

<div class="card-custom d-flex align-items-center">

    <img src="<?php echo $row['photo']; ?>" class="criminal-img me-4"
         onerror="this.src='image/default.jpg'">

    <div>
        <div class="name"><?php echo $row['name']; ?></div>

        <div class="details">📍 Address: <?php echo $row['address']; ?></div>
        <div class="details">📞 Mobile: <?php echo $row['mobile']; ?></div>
        <div class="details">📧 Email: <?php echo $row['email']; ?></div>
        <div class="details">🚨 Crime: <b><?php echo $row['crime']; ?></b></div>
    </div>

</div>

<?php } ?>

</div>

</body>
</html>