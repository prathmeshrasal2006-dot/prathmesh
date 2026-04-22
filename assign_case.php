<?php
include 'db.php';

if(isset($_POST['assign'])){
    $id  = $_POST['case_id'];
    $cid = $_POST['cid'];

    // Update case
    $conn->query("UPDATE cases 
                  SET assigned_to='$cid', status='Assigned'
                  WHERE id='$id'");
}
?>

<form method="POST">
<input name="case_id" placeholder="Case ID">
<input name="cid" placeholder="CID ID">
<button name="assign">Assign</button>
</form>