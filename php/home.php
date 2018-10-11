<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:login.php');
} 

?>

<!DOCTYPE html>
<html>
<head>
    <title>Navegação TOP</title>
    <link rel="stylesheet" type="text/css" href="../css/home.css">
    <meta charset="utf-8">
    <?php include 'menu.php'; ?>
</head>
<body>
    <div class="content">
        
    </div>
    <footer class="footer">
        <a href="#">Developers</p></a>
    </footer>
</body>
</html>
