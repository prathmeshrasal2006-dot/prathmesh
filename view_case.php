<?php
include 'db.php';

// Fetch all cases
$res = $conn->query("SELECT * FROM cases");

while($row = $res->fetch_assoc()){
    echo $row['id']." - ".$row['title']." - ".$row['status']."<br>";
}
?>