<?php
include 'db.php';

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name     = $_POST['name'];
    $email    = $_POST['email'];
    $mobile   = $_POST['mobile'];
    $address  = $_POST['address'];

    // PHOTO UPLOAD
    $file = $_FILES['photo']['name'];
    $tmp  = $_FILES['photo']['tmp_name'];

    $folder = "uploads/" . $file;

    move_uploaded_file($tmp, $folder);

    $query = "INSERT INTO users (username, password, role, name, email, mobile, address, photo)
              VALUES ('$username','$password','user','$name','$email','$mobile','$address','$folder')";

    if(mysqli_query($conn, $query)){
        echo "<script>alert('Registration Successful'); window.location='index.php';</script>";
    } else {
        echo "Error!";
    }
}
?>

<h2>User Registration</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="username" placeholder="Username" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<input type="text" name="name" placeholder="Full Name" required><br><br>

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="text" name="mobile" placeholder="Mobile" required><br><br>

<input type="text" name="address" placeholder="Address" required><br><br>

<!-- 🔥 PHOTO UPLOAD -->
<input type="file" name="photo" accept="image/*" onchange="previewImage(event)" required><br><br>

<!-- LIVE PREVIEW -->
<img id="preview" src="" width="120" style="border-radius:50%; display:none;"><br><br>

<button type="submit" name="submit">Register</button>

</form>

<script>
function previewImage(event){
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>