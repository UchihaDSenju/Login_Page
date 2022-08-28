<?php
    session_start();
    
    if($_SESSION['name']=='Admin')
    header("location: admin.php?admin= '1'");
    elseif(isset($_SESSION['name']))
    header("location: user.php?user= '1'");
    else
    header("location: login.php");
?>

