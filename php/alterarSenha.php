<?php session_start(); ?>
<?php if ($_SESSION['ativo'] == false){
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
        <img src="../imgs/cabecalho.png" alt="">
		</div>
		<div class="confirmado">
			<?php 
			if ($_GET['m'] == md5($_SESSION['mat'])){
			 ?>
			<h1>Recupere sua senha</h1><br>
			<form action="senhaConfirmada.php" method="post">
				<h2><i class="fas fa-arrow-down"></i> Informe a nova senha abaixo <i class="fas fa-arrow-down"></i><br><br></h4> <input type="password" name="senha" maxlength="16" size="20" placeholder="Senha" required=""><br><br><br>
					<h2><i class="fas fa-arrow-down"></i> Confirme a nova senha abaixo <i class="fas fa-arrow-down"></i><br><br></h4> <input type="password" name="senhaConfirm" maxlength="16" size="20" placeholder="Confirm Senha" required=""><br><br><br>
						<?php if ($_GET['error'] == 2) {
							echo "<span>Senhas incorretas, por favor repita.<br><br>";
						} 
						if ($_GET['error']==3) {
							echo "<span>As senhas são identicas a original, Por favor logue-se ou coloque outra senha.</span>";
						}

						?>
				<button type="submit">Redefinir Senha <i class="fas fa-lock"></i></button>
			</form>	
		<?php  }else{ header('location:senhaForm.php?m='.$_GET['m']."&&"."error=1"); } ?>
		

		</div>
	</div>
</body>
</html>