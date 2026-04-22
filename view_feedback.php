<?php
session_start();
include 'db.php';

// OPTIONAL admin check
// if(!isset($_SESSION['admin'])){
//     header("Location: admin_login.php");
//     exit();
// }

$result = mysqli_query($conn, "SELECT * FROM feedback ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>View Feedback</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }
.container {
    margin-top:30px;
    background:white;
    padding:20px;
    border-radius:5px;
}
</style>

</head>

<body>

<div class="container">

<h3>All User Feedback</h3>
<hr>

<table class="table table-bordered table-striped">
<thead>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Company</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Message</th>
    <th>Date</th>
    <th>Actions</th>
</tr>
</thead>

<tbody>

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['company']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['phone']; ?></td>
            <td><?= $row['message']; ?></td>
            <td><?= $row['created_at']; ?></td>
            <td>
                <a href="delete_feedback.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this feedback?')">Delete</a>
            </td>
        </tr>
        <?php
    }
}else{
    echo "<tr><td colspan='8'>No Feedback Found</td></tr>";
}
?>

</tbody>
</table>

</div>

</body>
</html>