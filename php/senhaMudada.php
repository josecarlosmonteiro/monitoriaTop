<!DOCTYPE html>
<?php session_start(); ?>
<?php if (!isset($_SESSION['ativo'])){
	header('location:index.php');
} 
?>	
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirme seu Email</title>
	<link rel="shortcut icon" href="../imgs/Logoxs.png">
	<link rel="stylesheet" href="../css/micro-bootstrap.css">
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
			max-width: 1000px;
			display: flex;
			justify-content: center;
			margin: auto;
			margin-top: 100px;
		}
		.confirmado{
			width: 100%;
			height: auto;
			padding: 30px;
			color: darkgreen;
			background-color: white;
			border:none;
			text-align: center;
			margin: 160px auto auto auto;
			font-family: 'monitoria';
     		
		}
		span{
			color: white;
			padding: 10px;
			border-radius: 10px;
			font-size: 20px;
			background-color: lightgreen;
		}
		body{
			background-color: darkgray;
			background-size: cover;
		}
		button{
			padding: 20px;
			font-family: 'monitoria';
			color: white;
			outline: none;
			border: none;
			border-radius: 10px;
			background-color: green;
			font-size: 20px;
			cursor: pointer;
			transition: 1s;

		}
		button:hover{
			background-color:darkgreen;
		}
		a{
			text-decoration: none;
			color: white;
			font-size: 20px;
		}
		input{
			font-size: 20px;
			font-family: 'monitoria';
			border-radius: 10px;
			outline: none;
			padding: 10px;
			transition: 0.5s;
			border: 4px outset green;
			text-align: center;
		}
		input:focus{
			background-color: yellow;
		}
		.img{
			position: absolute;
			margin: 10px;
		}
		@media only screen and (max-width: 500px){
			body{
				font-size: 15px;
			}
		}
	</style>
</head>
<body>
	<?php include 'Menu2.php'; ?>
	<div class="container">
		<div class="img">
			<img src="../imgs/cabecalho.png" alt="">
		</div>
		<div class="confirmado">
			<h1>Olá, <?php echo $_SESSION['nome'];?></h1><br>
			<h2>Senha Alterada com sucesso!</h4><br>
			<a href="../index.php"><button>Logue-se Agora <i class="fas fa-undo-alt"></i></button></a>
		</div>
	</div>
	<div class="footer" style="background-color: green;">
        <a href="developers.php"><img src="../imgs/ifpe.png" alt=""></a>
        <p style="color: white;font-family: 'monitoria';">Instituto Federal de Pernambuco</p>
    </div>
	<?php session_destroy(); ?>
</body>
</html>