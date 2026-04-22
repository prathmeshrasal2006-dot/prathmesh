<?php
session_start();
include 'db.php';

// ✅ Correct session check
if(!isset($_SESSION['username'])){
    header("Location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<style>
body {
    margin: 0;
    font-family: Arial;
    background: linear-gradient(to right, #dbeafe, #f0f9ff);
}

/* HEADER */
.header {
    background: #0d2b52;
    color: white;
    padding: 18px;
    text-align: center;
    font-size: 26px; /* 🔥 bigger */
    font-weight: bold;
}

/* NAVBAR */
.navbar-custom {
    background: #1e3a8a;
    text-align: center;
    padding: 12px;
}

.navbar-custom a {
    color: white;
    margin: 12px;
    text-decoration: none;
    font-weight: bold;
    font-size: 16px;
}

.navbar-custom a:hover {
    color: yellow;
}

/* MAIN BOX */
.home-box {
    width: 85%;
    margin: 40px auto;
    background: linear-gradient(to right, #fef3c7, #fde68a);
    border-radius: 15px;
    padding: 40px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 0 15px rgba(0,0,0,0.2);
}

/* LEFT TEXT */
.text-section {
    width: 55%;
}

.text-section h1 {
    font-size: 36px; /* 🔥 BIG TITLE */
    color: #1e293b;
}

.members {
    margin-top: 25px;
    font-size: 20px; /* 🔥 bigger text */
    line-height: 1.8;
    color: #111827;
}

/* RIGHT IMAGE */
.image-section img {
    width: 300px; /* 🔥 bigger image */
    border-radius: 15px;
    box-shadow: 0 0 15px gray;
    transition: transform 0.3s;
}

/* Hover effect */
.image-section img:hover {
    transform: scale(1.05);
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

<!-- HOME CONTENT -->
<div class="home-box">

    <!-- LEFT SIDE -->
    <div class="text-section">
        <h1>ONLINE CRIME REPORTING SYSTEM</h1>

        <div class="members">
            <strong style="color:#b91c1c;">GROUP MEMBERS:</strong><br><br>

            1. Prathmesh Annasaheb Rasal<br>
            2. Satyam Ramesh Pimple<br>
            3. Shubham Namdev Mule
        </div>
    </div>

    <!-- RIGHT SIDE IMAGE -->
    <div class="image-section">
        <img src="image/crime.png" alt="Crime Image">
    </div>

</div>

</body>
</html>