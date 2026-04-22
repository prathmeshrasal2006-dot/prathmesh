<?php
session_start();
include 'db.php';

// 🔒 Login check
if(!isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

// INSERT DATA
if(isset($_POST['submit'])){

    $username = $_SESSION['username']; // login user
    $name     = $_POST['name'];
    $station  = $_POST['station']; // 🔥 police station
    $address  = $_POST['address'];
    $details  = $_POST['details'];

    // ✅ FIXED QUERY (title → crime)
    $sql = "INSERT INTO cases (username, name, crime, description, address, status)
            VALUES ('$username', '$name', '$station', '$details', '$address', 'Pending')";

    if(mysqli_query($conn, $sql)){
        header("Location: my_cases.php");
        exit();
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Submit Complaint</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body {
    background: #f5f5f5;
}

/* HEADER */
.header {
    background: #0d2b52;
    color: white;
    padding: 15px;
    text-align: center;
    font-size: 22px;
}

/* NAVBAR */
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

/* FORM BOX */
.form-box {
    width: 60%;
    margin: 30px auto;
    background: white;
    padding: 20px;
    border-radius: 5px;
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
    <a href="dashboard.php">Home</a>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_case.php">Log Complaint</a>
    <a href="logout.php">Logout</a>
</div>

<!-- FORM -->
<div class="form-box">

<h4>SUBMIT COMPLAINT</h4>
<hr>

<?php if(isset($msg)) echo "<p style='color:green;'>$msg</p>"; ?>

<form method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Police Station</label>

<select name="station" class="form-control" required>
<option value="">Select Police Station</option>

<option>Mumbai Police Station</option>
<option>Pune Police Station</option>
<option>Nagpur Police Station</option>
<option>Nashik Police Station</option>
<option>Thane Police Station</option>

<option>Aurangabad Police Station</option>
<option>Nanded Police Station</option>
<option>Latur Police Station</option>
<option>Parbhani Police Station</option>
<option>Beed Police Station</option>
<option>Osmanabad Police Station</option>
<option>Jalna Police Station</option>
<option>Hingoli Police Station</option>

<option>Kolhapur Police Station</option>
<option>Sangli Police Station</option>
<option>Satara Police Station</option>
<option>Solapur Police Station</option>

<option>Amravati Police Station</option>
<option>Akola Police Station</option>
<option>Yavatmal Police Station</option>
<option>Chandrapur Police Station</option>
<option>Gondia Police Station</option>
<option>Bhandara Police Station</option>
<option>Wardha Police Station</option>
<option>Gadchiroli Police Station</option>

<option>Raigad Police Station</option>
<option>Ratnagiri Police Station</option>
<option>Sindhudurg Police Station</option>
<option>Palghar Police Station</option>

</select>
</div>

<div class="mb-3">
<label>Full Address</label>
<textarea name="address" class="form-control" rows="3"></textarea>
</div>

<div class="mb-3">
<label>Full Details</label>
<textarea name="details" class="form-control" rows="4" required></textarea>
</div>

<button name="submit" class="btn btn-primary">Submit</button>
<button type="reset" class="btn btn-danger">Reset</button>

</form>

</div>

</body>
</html>