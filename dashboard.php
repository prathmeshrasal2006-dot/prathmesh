<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['role'])){
    header("Location: index.php");
    exit();
}

$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: url("image/bg.jpg") no-repeat center center fixed;
    background-size: cover;
}

.header {
    background: #0d2b52;
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
}

.navbar-custom {
    background: #123c6b;
    text-align: center;
    padding: 10px;
}

.navbar-custom a {
    color: white;
    margin: 10px;
    text-decoration: none;
    font-weight: bold;
}

.navbar-custom a:hover {
    text-decoration: underline;
}

.dashboard {
    width: 20%;
    margin: 20px 1160px;
    background: rgba(255,255,255,0.85);
    padding: 20px;
    border-radius: 10px;
    backdrop-filter: blur(5px);
}

.menu-btn {
    display: block;
    width: 100%;
    background: #0d2b52;
    color: white;
    padding: 12px;
    margin: 10px 0;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.menu-btn:hover {
    background: #1a4b8c;
}
</style>

</head>

<body>

<!-- HEADER -->
<div class="header">
    ONLINE CRIME REPORTING SYSTEM
</div>

<!-- NAVBAR -->
<div class="navbar-custom">
    <a href="home.php">Home</a>
    <a href="about.php">About Project</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_case.php">Register Complaint</a>
    <a href="feedback.php">Submit Feedback</a>
    <a href="change_password.php">Change Password</a>
    <a href="logout.php">Logout</a>
</div>

<!-- DASHBOARD -->
<div class="dashboard">

    <!-- LOGO -->
    <div style="text-align:center; margin-top:20px;">
        <img src="image/crime_logo.webp" alt="Logo"
             style="width:200px; border-radius:10px; box-shadow:0 0 10px gray;">
    </div>

    <!-- MENU -->
    <a href="add_case.php" class="menu-btn">Register Complaint</a>

    <?php if($role == 'admin') { ?>
        <a href="view_criminals.php" class="menu-btn">View Criminals</a>
    <?php } ?>

    <a href="my_cases.php" class="menu-btn">View Complaints</a>

    <?php if($role == 'admin'){ ?>
        <a href="view_users.php" class="menu-btn">View Users</a>
    <?php } ?>

    <a href="profile.php" class="menu-btn">Profile</a>
    <a href="change_password.php" class="menu-btn">Change Password</a>
    <a href="feedback.php" class="menu-btn">Submit Feedback</a>

    <!-- 🔥 ONLY ADMIN CAN SEE -->
    <?php if($role == 'admin'){ ?>
        <a href="view_feedback.php" class="menu-btn">View Feedback</a>
    <?php } ?>

    <a href="logout.php" class="menu-btn">Logout</a>

</div>

</body>
</html>