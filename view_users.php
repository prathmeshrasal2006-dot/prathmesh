<?php
session_start();
include 'db.php';

// Only admin can access
if($_SESSION['role'] != 'admin'){
    header("Location: dashboard.php");
    exit();
}

$result = $conn->query("SELECT * FROM users WHERE role='user'");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Users</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.container { margin-top:30px; }
img {
    width:60px;
    height:60px;
    border-radius:50%;
}
</style>

</head>

<body>

<div class="container">

<h3>Registered Users</h3>
<hr>

<table class="table table-bordered">
<tr>
<th>Photo</th>
<th>Username</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Address</th>
</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>
<td>
    <img src="<?php echo !empty($row['photo']) ? $row['photo'] : 'uploads/default.png'; ?>">
</td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php echo $row['address']; ?></td>
</tr>

<?php } ?>

</table>

<a href="dashboard.php" class="btn btn-primary">Back</a>

</div>

</body>
</html>