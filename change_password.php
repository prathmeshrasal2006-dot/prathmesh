<?php
session_start();

if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
    header("Location: index.php");
    exit();
}
?>
<?php
if(isset($_POST['update'])){

    $user = $_SESSION['username'];
    $old  = $_POST['old'];
    $new  = $_POST['new'];

    // CHECK OLD PASSWORD
    $check = $conn->query("SELECT * FROM users 
                           WHERE username='$user' AND password='$old'");

    if($check->num_rows > 0){

        // UPDATE PASSWORD
        $conn->query("UPDATE users SET password='$new' WHERE username='$user'");

        $msg = "Password Updated Successfully!";
    } else {
        $error = "Wrong Old Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }

.box {
    width:400px;
    margin:60px auto;
    background:white;
    padding:25px;
    border-radius:5px;
}
</style>

</head>

<body>

<div class="box">

<h4>Change Password</h4>
<hr>

<?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST">

<input type="password" name="old" class="form-control mb-2" placeholder="Old Password" required>

<input type="password" name="new" class="form-control mb-2" placeholder="New Password" required>

<button name="update" class="btn btn-primary w-100">Update Password</button>

</form>

</div>

</body>
</html>