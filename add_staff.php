<?php
include 'db.php';

if(isset($_POST['add'])){
    $name=$_POST['name'];
    $role=$_POST['role'];

    $img=$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$img);

    $conn->query("INSERT INTO staff(name,role,image)
    VALUES('$name','$role','$img')");
}
?>

<h2>Add Staff</h2>
<form method="POST" enctype="multipart/form-data">
<input name="name" placeholder="Name" required><br><br>
<input name="role" placeholder="Role (NCO/CID)" required><br><br>
<input type="file" name="image" required><br><br>
<button name="add">Add Staff</button>
</form>