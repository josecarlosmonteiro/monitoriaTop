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
				background-color: rgba(5,120,5,0.8);
				height: auto;
				top: 0;
				left: 0;
				padding: 5px;
				box-shadow: 1px 1px 10px black;
				position: relative;
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
				color: white;
				margin: 0px 2px 0px 10px;
				font-size: 20px;
			}
			.navbar ul li:hover{
				color: #d31313;
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
				color:white;
				/*transition: 1s;*/
			}
			.dropdown:hover{
				color: green;
				cursor: pointer;
			}
			.absolute{
				background-color: green;
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
				background-color: white;
				border-radius: 10px;
			}
			.dropdown:hover .absolute	{
				display: block;
			}
			
		</style>
	</head>
	<body>
		<div class="navbar">
			<a href="../"><img src="../imgs/lmd.png" alt=""></a>
			<ul>
				<a href="home.php"><li>Inicio</li></a>
				<?php if ($_SESSION['tipo'] == "monitor") : ?>
					<a href="documentos.php"><li>Gerar Relatório</li></a>
				<?php endif ?>
				<a href="monitorias.php"><li>Monitorias</li></a>
				<a href="logout.php" style="right: 5%;"><li><i class="fas fa-sign-out-alt"></i>Logout</li></a>
			</ul>
		</div>
	</body>
</html>