<?php
session_start();
include 'db.php';

// ✅ STEP 1: Session + Role Check
if(!isset($_SESSION['username'])){
    header("Location:index.php");
    exit();
}

$user = $_SESSION['username'];
$role = $_SESSION['role']; // 🔥 important

$res = $conn->query("SELECT * FROM users WHERE username='$user'");
$data = $res->fetch_assoc();

if(!$data){
    echo "No user data found";
    exit();
}

// ✅ STEP 2: Photo Logic (only for user)
if($role == 'user'){
    $img = !empty($data['photo']) ? $data['photo'] : 'uploads/default.png';
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body { background:#f5f5f5; }

.box {
    width:500px;
    margin:40px auto;
    background:white;
    padding:20px;
    border-radius:8px;
    text-align:center;
    box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.profile-img {
    width:150px;
    height:150px;
    border-radius:50%;
    object-fit:cover;
    margin-bottom:15px;
    border:3px solid #0d2b52;
}

.circle {
    width:150px;
    height:150px;
    border-radius:50%;
    background:#ccc;
    margin:0 auto 15px;
}
</style>

</head>

<body>

<div class="box">

<h3>My Profile</h3>
<hr>

<!-- ✅ STEP 2: Show Photo Only for User -->
<?php if($role == 'user'){ ?>

    <img src="<?php echo $img; ?>" class="profile-img">

<?php } else { ?>

    <!-- Admin default -->
    <div class="circle"></div>

<?php } ?>

<h4><?php echo $data['name']; ?></h4>

<p><b>Username:</b> <?php echo $data['username']; ?></p>
<p><b>Email:</b> <?php echo $data['email']; ?></p>
<p><b>Mobile:</b> <?php echo $data['mobile']; ?></p>
<p><b>Address:</b> <?php echo $data['address']; ?></p>

<a href="dashboard.php" class="btn btn-primary">Back</a>

</div>

</body>
</html>