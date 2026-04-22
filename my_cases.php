<?php
session_start();
include 'db.php';

// 🔒 LOGIN CHECK
if(!isset($_SESSION['username'])){
    header("Location:index.php");
    exit();
}

$user = $_SESSION['username'];
$role = $_SESSION['role']; // user / admin

// ✅ ROLE BASED DATA
if($role == 'admin'){
    $query = "SELECT * FROM cases ORDER BY id DESC";
} else {
    $query = "SELECT * FROM cases WHERE username='$user' ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Complaints</title>

<style>
body {
    font-family: Arial;
    background: #f4f4f4;
}

table {
    width: 95%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
    font-size: 18px;
}

th {
    background: #333;
    color: white;
    padding: 15px;
    font-size: 20px;
}

td {
    padding: 12px;
    text-align: center;
}

tr:nth-child(even) {
    background: #f2f2f2;
}

/* STATUS */
.status {
    padding: 5px 10px;
    border-radius: 5px;
    color: white;
    font-weight: bold;
}

.pending { background: red; }
.progress { background: blue; }
.solved { background: green; }

/* BUTTONS */
.btn {
    padding: 6px 12px;
    border-radius: 5px;
    color: white;
    text-decoration: none;
}

.edit { background: orange; }
.delete { background: red; }

</style>
</head>

<body>

<h2 style="text-align:center;">All Complaint Reports</h2>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Police Station</th>
<th>Description</th>
<th>Status</th>

<?php if($role == 'admin'){ ?>
<th>Action</th>
<?php } ?>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ 

$class = '';
if($row['status']=="Pending") $class="pending";
elseif($row['status']=="In Progress") $class="progress";
elseif($row['status']=="Solved") $class="solved";

?>

<tr>
<td><?php echo $row['id']; ?></td>

<!-- ✅ FIX 1: SHOW REAL NAME -->
<td><?php echo $row['name']; ?></td>

<!-- ✅ FIX 2: POLICE STATION -->
<td><?php echo $row['crime']; ?></td>

<td><?php echo $row['description']; ?></td>

<td>
<span class="status <?php echo $class; ?>">
<?php echo $row['status']; ?>
</span>
</td>

<!-- ✅ ADMIN ONLY ACTION -->
<?php if($role == 'admin'){ ?>
<td>
<a href="edit_case.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
<a href="delete_case.php?id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>
</td>
<?php } ?>

</tr>

<?php } ?>

</table>

</body>
</html>