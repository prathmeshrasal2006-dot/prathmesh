<?php
session_start();
include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE username='$user' AND password='$pass'");

    if($res->num_rows > 0){
        $_SESSION['user'] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>
body {
    margin: 0;
    font-family: Arial;

    /* 🔥 BACKGROUND IMAGE */
    background: url("image/crime-bg.jpg") no-repeat center center/cover;

    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* DARK OVERLAY */
body::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.6);
    top: 0;
    left: 0;
}

/* LOGIN BOX */
.login-box {
    position: relative;
    background: white;
    padding: 30px;
    width: 300px;
    border-radius: 10px;
    text-align: center;
    z-index: 1;
    box-shadow: 0 0 20px black;
}

.login-box h2 {
    margin-bottom: 20px;
}

.login-box input {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.login-box button {
    width: 100%;
    padding: 10px;
    background: #2563eb;
    color: white;
    border: none;
    border-radius: 5px;
    font-weight: bold;
    cursor: pointer;
}

.login-box button:hover {
    background: #1e40af;
}

/* ERROR MESSAGE */
.error {
    color: red;
    font-size: 14px;
}
</style>

</head>

<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if(isset($error)){ ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

<form method="POST" action="login_process.php">
    <input type="text" name="username" placeholder="Enter Username" required>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button type="submit">Login</button>
    New User? <a href="register_user.php">Register Here</a>
</form>
</div>

</body>
</html>
