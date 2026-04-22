<?php
session_start();

if($_SESSION['role'] != 'admin'){
    header("Location: dashboard.php");
    exit();
}
?>
<?php
include 'db.php';

$id = $_GET['id'];

$conn->query("DELETE FROM cases WHERE id=$id");

header("Location: my_cases.php");
?>