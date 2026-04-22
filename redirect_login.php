<?php
session_start();
session_destroy(); // logout user

header("Location: index.php"); // go to login page
exit();
?>