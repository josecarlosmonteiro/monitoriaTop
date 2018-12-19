<?php session_start();?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<style>
			*{padding: 0;margin: 0;}
			@font-face{
				font-family: 'monitoria';
				src:url('../fonts/pn.otf');
			}
			.navbar{
				width: 100%;
				background-color: white;
				height: auto;
				top: 0;
				left: 0;
				padding: 5px;
				box-shadow: 1px 1px 10px black;
				position: fixed;
				z-index: 100;
			}
			body{
				font-family: 'monitoria';
			}
			.navbar{
				display: flex;
				justify-content: space-between;
			}
			.navbar ul li{
				display: inline-block;
				color: green;
				text-decoration: none;
				margin: 0px 2px 0px 10px;
				font-size: 20px;
			}
			.navbar ul li:hover{
				color: darkgreen;
				transition: 0.5s;
				cursor: pointer;
			}
			.navbar ul{
				text-align: center;
				margin: auto;
			}
			.dropdown{
				font-size: 50px;
				display: flex;
				justify-content: flex-end;
				padding: 5px 60px 0px 0px;
				color:green;
				/*transition: 1s;*/
			}
			.dropdown:hover{
				color: darkgreen;
				cursor: pointer;
			}
			.absolute{
				background-color: white;
				position: absolute;
				display: none;
				top: 60px;
				right: 20px;	
				padding: 10px;
				border-radius: 10px;
				width: 125px;
			}
			.absolute li{
				padding: 10px;
			}
			.dropdown li:hover{
				background-color: green;
				border-radius: 10px;
				color: white!important;
			}
			.dropdown:hover .absolute	{
				display: block;
			}
		</style>
	</head>
	<body>
		<?php 
		$nome = substr($_SESSION['user'],0,1);
		$sobrenome = substr($_SESSION['sobrenome'],0,1);
		 ?>
		<div class="navbar">
			<a href="../index.php">
				<img src="../imgs/ifpe.png" alt="">
			</a>
			<ul>
				<?php if (isset($_SESSION['matricula'])): ?>	
					<?php if ($_SESSION['tipo'] == "monitor" || $_SESSION['tipo'] == "aluno"): ?>
						<a href="home.php"><li>Inicio</li></a>	
					<?php endif ?>
				<a href="documentos.php"><li>Gerar Relatório</li></a>
				<a href="monitorias.php"><li>Monitorias</li></a>
			<?php else: ?>
				<a href="index.php" style="position: absolute;right:50px;margin-top: -10px;"><li>Inicio</li></a>
				<?php endif ?>


			</ul>
			<?php if (isset($_SESSION['matricula'])): ?>
				
			<div class="dropdown">
				<i class="fas fa-user-circle"></i>
					<ul class="absolute">
						<a href="userPag.php"><li><i class="fas fa-user"></i>  <?php echo $nome.".".$sobrenome;?></li></a>
						<!-- <a href=""><li><i class="fas fa-user"></i>  Perfil</li></a> -->
						<a href="	logout.php"><li><i class="fas fa-sign-out-alt"></i>  Logout</li></a>
					</ul>
			</div>
			<?php endif ?>
		</div>
	</body>
</html>