<?php
    session_start();
    
    if($_SESSION['name']=='admin')
    header('location: admin.php');
    elseif(isset($_SESSION['name']))
    header('location: user.php');
    else
    header('location: login.php');
?>

