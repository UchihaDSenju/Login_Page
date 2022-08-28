<?php 
    include('server.php'); 
    if (isset($_GET['logout'])) {
        session_unset();
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
    <a href="user.php?logout= '1'">Logout</a>
    <table align="center" width="50%" id="table">
        <tbody>
                <tr>
                    <th>Name</th>
                    <th>email</th>
                    <th>Dept</th>
                    <th>Year</th>
                    <th>Profile</th>
                </tr>
        </tbody>
        <tbody>
        <?php foreach($result as $res): ?>
            <tr>
                
                <td><?php echo $res['username'] ?></td>
                <td><?php echo $res['email'] ?></td>
                <td><?php echo $res['dept'] ?></td>
                <td><?php echo $res['year'] ?></td>
                <td><div class="img-border"></div></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>