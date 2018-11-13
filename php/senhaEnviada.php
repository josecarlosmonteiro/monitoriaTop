<!DOCTYPE html>
<?php session_start(); ?>
<?php if (!isset($_SESSION['ativo'])){
	header('location:senhaForm.php');
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
			max-width: 1000px;
			display: flex;
			justify-content: center;
			margin: auto
		}
		.confirmado{
			width: 100%;
			height: auto;
			padding: 30px;
			color: red;
			background-color: white;
			border:none;
			text-align: center;
			margin: 160px auto auto auto;
			font-family: 'monitoria';
     		
		}
		span{
			color: lightblue;
			border-radius: 10px;
		}
		body{
			background-color: black;
			background-size: cover;
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
		input{
			font-size: 20px;
			font-family: 'monitoria';
			border-radius: 10px;
			outline: none;
			padding: 10px;
			transition: 0.5s;
			border: 4px outset red;
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
	<div class="container">
		<div class="img">
			<img src="../imgs/footer.png" alt="">
		</div>
		<div class="confirmado">
			<h1>Olá, <span><?php echo $_SESSION['nome'];?></span></h1><br>
			<h2>Enviamos um link de redefinição de senha para você. Aguardando confirmação!</h4><br>
			<a href="senhaForm.php"><button>Voltar <i class="fas fa-undo-alt"></i></button></a>
		</div>
	</div>
</body>
</html>