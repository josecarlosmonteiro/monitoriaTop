<?php session_start(); ?>
<?php include "Menu2.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" href="../css/user.css">
	<link rel="stylesheet" href="../css/micro-bootstrap.css">
</head>
<body>
	<div class="content" >
		<div class="content-header">
			<div class="icons">
				<i class="fab fa-facebook"></i>
				<i class="fab fa-instagram"></i>
				<i class="fab fa-twitter-square"></i>
				<i class="fas fa-envelope-square"></i>
			</div>
			<div class="content-image"></div>
			<button><i class="fas fa-user-edit"></i>  Editar Perfil</button>
		</div>
		<div class="content-body">
			<?php if ($_SESSION['tipo'] == 'monitor'):?>
			<h2><?php echo $_SESSION['user']." ".$_SESSION['sobrenome']." "; ?><span style="color: green;"><?= $_SESSION['periodo']; ?>° Periodo - <?= $_SESSION['curso'] ?></span></h2><br>
			<h3>Monitor de <span style="color: red;"><?= $_SESSION['cadeira_monitor']; ?></span></h3><br>
			<?php else: ?>
			<h2><?php echo $_SESSION['user']." ".$_SESSION['sobrenome']." "; ?><span style="color: green;"><?= $_SESSION['periodo']; ?>° Periodo - <?= $_SESSION['curso'] ?></span></h2><br>
			<h3>Aluno</h3><br>
			<?php endif; ?>
		</div>
	</div>
	<div class="footer" style="background-color: green;">
        <a href="developers.php"><img src="../imgs/ifpe.png" alt=""></a>
        <p style="color: white;">Instituto Federal de Pernambuco</p>
    </div>
</body>
</html>