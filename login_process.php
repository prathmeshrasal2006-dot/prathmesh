<?php
session_start();
include 'db.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);

    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];

    // 🔥 Redirect to requested page
    if(isset($_SESSION['redirect_page'])){
        $page = $_SESSION['redirect_page'];
        unset($_SESSION['redirect_page']);
        header("Location: $page");
    } else {
        header("Location: dashboard.php");
    }

} else {
    echo "<script>alert('Login Failed'); window.location='index.php';</script>";
}
?>