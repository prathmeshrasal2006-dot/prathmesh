<?php
include 'db.php';

// Show assigned cases
$res = $conn->query("SELECT * FROM cases WHERE status='Assigned'");

while($row = $res->fetch_assoc()){
    echo "Case: ".$row['title']."<br>";
}
?>