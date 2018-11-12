<?php session_start(); ?>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Altere sua senha</title>
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
			color: black;
			padding: 10px;
			border-radius: 10px;
			font-size: 20px;
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
				<img src="../footer.png" alt="">
		</div>
		<div class="confirmado">
			<h1>Recupere sua senha</h1><br>
			<form action="senhaEmail.php" method="post">
				<h2><i class="fas fa-arrow-down"></i> Informe sua matricula abaixo <i class="fas fa-arrow-down"></i><br><br></h4> <input type="text" name="senhaMatricula" maxlength="16" size="20" placeholder="Example: X-X-XinfigXXXX" required=""><br><br><br>
					<?php 
					if (isset($_GET['error']) and $_GET['error'] == 0) {
						echo "<span>Matricula Inexistente, por favor tente novamente.</span><br><br><br>";
						echo "<sapn>Redirecionando em 5 segundos.<br><br><br>";
					 ?>
					 <script language= "JavaScript">
						setTimeout("document.location = 'senhaForm.php'",5000);
					</script>
					<?php  }if (isset($_SESSION['user'])){
						echo "<span>Você está logado. impossivel recuperar a senha. Deslogando em 5s </span><br><br>";
					?>
					<script language= "JavaScript">
						setTimeout("document.location = 'logout.php'",5000);
					</script>
					<?php } ?>
					<?php if (isset($_GET['error']) and $_GET['error'] == 1) {
						echo "<span>Ocorreu um erro na sua matricula. Por segurança, faça o processo novamente.<span><br><br>";
						session_destroy();
					} 
					?>
				<button type="submit">Recuperar Senha   <i class="fas fa-lock"></i></button>
			</form>	
		</div>
	</div>
</body>
</html>