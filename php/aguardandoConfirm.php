<!DOCTYPE html>
<?php session_start(); ?>
<?php if (!isset($_SESSION['recebido'])) {
	header('location:../index.php');
}
?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirme seu Email</title>
	<link rel="shortcut icon" href="../imgs/Logoxs.png">
	<link rel="stylesheet" href="../css/fontAwesome">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<style>
		@font-face{
		font-family: 'monitoria';
		src:url('../fonts/pn.otf');
      }
          
        *{
      		padding:0;
      		 margin:0;
        }
	
		.container{
			width: 100%;
			height: auto;
		}
		.confirmado{
			width: 100%;
			height: auto;
			padding: 30px;
			color: red;
			background-color: white;
			border:none;
			text-align: center;
			margin: 50px auto auto auto;
			font-family: 'monitoria';
     		
		}
		span{
			color: white;
			background-color: red;
			padding: 5px;
			border-radius: 10px;
		}
		body{
			background-color: black;
			background-size: cover;
		}
		.img{
			width: auto;
			max-width: 410px;
			height: auto;
			margin: auto;
			position: relative;
		}
		button{
			padding: 20px;
			font-family: 'monitoria';
			color: white;
			outline: none;
			border: none;
			border-radius: 10px;
			background-color: #df0000;
			font-size: 20px;
			cursor: pointer;

		}
		button:hover{
			background-color:#ff1d0b;
		}
		a{
			text-decoration: none;
			color: white;
			font-size: 20px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="img">
          	<br>
			<img src="../imgs/footer.png" alt="">
		</div>
		<div class="confirmado">
			<h1>Olá, <?php echo $_SESSION['nomeCadastrado'];?></h1><br>
			<h2>Seu Email : <span><?php echo $_SESSION['emailCadastrado'];?></span></h4><br>
			<h2>Enviamos um link de confirmação para você. Aguardando confirmação!</h4><br>
			<a href="email.php"><button>Reenviar Link de Confirmação <i class="fas fa-redo"></i></button></a>
		</div>
	</div>
</body>
</html>