<?php
session_start();
include 'db.php';

// ✅ Correct session check
if(!isset($_SESSION['username'])){
    header("Location:index.php");
    exit();
}

// INSERT DATA
if(isset($_POST['submit'])){
    $name    = $_POST['name'];
    $company = $_POST['company'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $msg     = $_POST['message'];

    // ✅ Safe insert (prepared statement)
    $stmt = $conn->prepare("INSERT INTO feedback (name, company, email, phone, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $company, $email, $phone, $msg);
    
    if($stmt->execute()){
        $success = "Feedback Submitted Successfully!";
    } else {
        $error = "Error submitting feedback!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Submit Feedback</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }

.header {
    background:#0d2b52;
    color:white;
    padding:15px;
    text-align:center;
}

.navbar-custom {
    background:#123c6b;
    text-align:center;
    padding:10px;
}

.navbar-custom a {
    color:white;
    margin:10px;
    text-decoration:none;
    font-weight:bold;
}

.box {
    width:50%;
    margin:40px auto;
    background:white;
    padding:20px;
    border-radius:5px;
}
</style>

</head>

<body>

<div class="header">ONLINE CRIME REPORTING SYSTEM</div>

<div class="navbar-custom">
    <a href="dashboard.php">Home</a>
    <a href="add_case.php">Log Complaint</a>
    <a href="my_cases.php">My Complaints</a>
    <a href="feedback.php">Submit Feedback</a>
    <a href="logout.php">Logout</a>
</div>

<div class="box">

<h4>SUBMIT FEEDBACK</h4>
<hr>

<!-- ✅ Success / Error Message -->
<?php 
if(isset($success)) echo "<p style='color:green;'>$success</p>"; 
if(isset($error)) echo "<p style='color:red;'>$error</p>"; 
?>

<form method="POST">

<div class="mb-2">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-2">
<label>Company</label>
<input type="text" name="company" class="form-control">
</div>

<div class="mb-2">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-2">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="mb-3">
<label>Message</label>
<textarea name="message" class="form-control" rows="4" required></textarea>
</div>

<button type="submit" name="submit" class="btn btn-primary">Submit</button>
<button type="reset" class="btn btn-danger">Reset</button>

</form>

</div>

</body>
</html>