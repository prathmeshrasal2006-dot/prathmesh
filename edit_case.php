<?php
session_start();

if($_SESSION['role'] != 'admin'){
    header("Location: dashboard.php");
    exit();
}
?>
<?php
include 'db.php';

$id = $_GET['id'];

$result = $conn->query("SELECT * FROM cases WHERE id=$id");
$row = $result->fetch_assoc();

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $status = $_POST['status'];

    $conn->query("UPDATE cases SET 
        title='$title',
        description='$desc',
        status='$status'
        WHERE id=$id");

    header("Location: my_cases.php");
}
?>

<form method="POST">
    <input name="title" value="<?php echo $row['title']; ?>" class="form-control mb-2">

    <textarea name="description" class="form-control mb-2"><?php echo $row['description']; ?></textarea>

    <select name="status" class="form-control mb-2">
        <option>Pending</option>
        <option>Under Process</option>
        <option>Solved</option>
    </select>

    <button name="update" class="btn btn-success">Update</button>
</form>