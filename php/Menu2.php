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
				background-color: rgba(0,0,0,0.8);
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
				color: white;
				text-decoration: none;
				margin: 0px 2px 0px 10px;
				font-size: 20px;
			}
			.navbar ul li:hover{
				color: red;
				transition: 0.5s;
				cursor: pointer;
			}
			.navbar ul {
				text-align: center;
				margin: auto;
			}
			.navbar i{
				font-size: 50px;
				color: white;
				padding: 0px 60px 0px 0px;
			}
			.navbar i:hover{
				color: red;
				transition: 0.5s;
				cursor: pointer;
			}
			.absolute{
				position: absolute;
				right: 0;
				margin: 60px 20px 0px 0px;
				width: 100px;
				height: auto;
				background-color: red;
				z-index: 1000;
				border-radius: 10px;
				padding: 10px;
				color: white;
				box-shadow: 1px 1px 20px black;
				text-align: center;
				display: none;
				transition: 1s;
			}
			.absolute li {
				list-style-type: none;
				padding: 10px;
				width: 100%;
				max-width: 82px;
				transition:1s;
				color: white;

			}
			.absolute li:hover{
				background-color: white;
				color: red;
				border-radius: 10px;
			}
			a{
				text-decoration: none;
			}
		</style>
	</head>
	<body style="background-color: #f1f1f1;">
		<div class="navbar">
			<img src="../imgs/lmd.png" alt="">
			<ul>
				<li>Inicio</li>
				<li>Documentos</li>
				<li>Atividades</li>
			</ul>
			<i class="fas fa-user-circle" onmouseover="mostrar()" onmouseout="esconder()"></i>
		</div>
			<ul class="absolute">
				<a href=""><li><i class="fas fa-user"></i>  Perfil</li></a>
				<a href=""><li><i class="fas fa-sign-out-alt"></i>  Logout</li></a>
			</ul>
		<script>
			function mostrar(){	
				var x = document.getElementsByClassName("absolute")[0].style.display="block";
			}
			function esconder(){
				var y = document.getElementsByClassName("absolute")[0].style.display="none";
			}
		</script>
	</body>
</html>