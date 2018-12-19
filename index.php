<?php session_start();?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Monitoria Digital - IFPE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/css.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/modal.css">
	<link rel="shortcut icon" href="imgs/Logoxs.png">
	<style>
.box{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	width: 400px;padding: 40px;
	background: white;
	box-sizing: border-box;
	box-shadow: 0 15px 25px rgba(0,0,0,0.9);
	border-radius: 10px; 
	overflow: auto; 
	z-index: 10000;
	border: 3px outset white;
}
.box h1{
	margin: 0 0 30px;
	padding: 0;
	color: #fff;
	text-align: center;
}
.box .inputBox{
	position: relative;
	font-family: 'monitoria';
}
.box .inputBox input{
	width: 100%;
	padding: 10px 0;
	font-size: 16px;
	color: #fff;
	letter-spacing: 1px;
	margin-bottom: 30px;
	border: none;
	border-bottom:  1px solid #fff;
	outline: none;
	background: transparent;
}
.box input[type="submit"]{
	background: transparent;
	border: none;
	outline: none;
	color: #fff;
	background: green;
	padding: 10px 20px;
	cursor: pointer;
	border-radius: 5px; 
	transition: 1s;
}
.box input[type="submit"]:hover{
	background-color:darkgreen;
}
.box h5{
	color: red;	
}
@-webkit-keyframes animatetop {from {top:-300px; opacity:0} to {top:0; opacity:1}}

@keyframes animatetop {
   from {top:-300px; opacity:0}to {top:0; opacity:1}
}
.modal-container{
	width: 100vw;
	height: 100vh;
	background-color: rgba(0,0,0,0.7);
	position:fixed;
	z-index: 10000;
	top:0;
	left:0;
	display: none;
}
.fechar{
	color: white;
}
.modal-container.mostrar{
	display: block;
} 
@keyframes modal{
	from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
} 
.modal-container .modal	{
	animation: modal 0.8s;
}
@media only screen and (max-width:600px){
	.modal-container{
		background-color: rgba(0,0,0);
	}
	.box{
		border: none;
	}

}

input:focus{
 background-color: ;
}
.forgot{
	float: right;
	text-decoration: none;
	background-color: green;
	padding: 10px;
	color: white;
	transition: 0.5s;
	border-radius: 20px;

}
.forgot:hover{
	background-color: darkgreen;
	color: white;
}
	</style>
</head>
<body>
	<div class="container">
		<header class="background">
			<?php 
			if(isset($_SESSION['matricula'])) {
				include 'php/menuIndex.php';
			}else{
			 ?>
			<div class="nav">
					<a href="index.php"><img src="imgs/ifpe.png" class="animated swing" style="padding-top: 2px;"></a>
        			<label for="h"><font color="green">&#9776;</font></label>
        			<input type="checkbox" id="h"/>
        		<div class="menu">
           			<a href="php/home.php" style="color:rgb(0,100,0);">FORUM</a>
           			<button href="php/login.php" class="btn-log" id="botao" style="color:rgb(0,100,0);">LOGIN</button>
          			<a href="php/cadastro.php" class="botao" style="color:white;">CADASTRAR</a>
          		</div>			  
        	</div>
        	<?php } ?>
        		<div class="title">
      				<h1 class="font">Monitoria <font color="green">Digital</font> - IFPE</h1><br>
      				<h4 style="color: green;">Ser monitor agora <font color="white">ficou muito mais fácil</font></h4>
      			</div>
		</header>
		<center>
			<!-- aqui arthur  áre dos cards são 3 cards 1 QACADEMICO, 2 SITE DO IF, 3 (OUTROS)-->
			<div class="cards">
				<div class="titulo animated bounce" style="background-color: green;"><h1>Links Externos</h1></div>
					<ul type="none" class="cardes" style="width: 100%;">
						<a href="https://qacademico.ifpe.edu.br/" target="_blank"><li class="cardq"></li></a>
						<a href="https://www.ifpe.edu.br/campus/igarassu" target="_blank"><li class="cardif"></li></a>
						<a href="https://www.ifpe.edu.br/campus/igarassu/noticias/divulgado-resultado-final-do-edital-de-monitoria/resultado-final-bolsa-monitoria2018-2.pdf" target="_blank"><li class="mn"></li></a>
				</ul>
			</div>
			<!-- ---------- -->
		</center>
			<footer id="footer">
				<img src="imgs/footer.png">
				<section class="listas">
					<ul type="none">
						<center><h1>Developers</h1></font><br>
						<li>Arthur Vinicius </li>
						<li>Carlos Monteiro </li>
						<li>Eduardo Bispo </li>
						<li>Flávia Regina </li>
						<li>Girlâyne Fragoso </li>
						<li>Guilherme Evaristo</li>
						<li>Jhontas Rodrigues </li>
						</center>
					</ul>
					<ul type="none">
						<div class="grande"></div>
					<center><h1>Contatos</h1></font><br>
						<li>arthursenju41@gmail.com</li>
						<li>1monteirocarlos@gmail.com</li>
						<li>eduardobispof@gmail.com</li>
						<li>flaviareginaf07@gmail.com</li>
						<li>girlayne.fragoso@gmail.com</li>
						<li>guibalaka123@gmail.com</li>
						<li>Jhonsnoow32@gmail.com</li>
						</center>
					</ul>
				</section>
			</footer>
		</div>
	</div>
	<div id="modal-login" class="modal-container">
		<div class="modal">
			<div class="box">
				<h1 style="color: green;">Logar</h1>
				<?php 
					if (isset($_SESSION['erroLogin'])) { ?>
						<h5>   <?= $_SESSION['erroLogin']?></h5>
						<?php unset($_SESSION['erroLogin']) ?>
				<?php } ?>
				<form action="php/verifLogin.php" method="POST">
					<div class="inputBox"><span style="color: green;">Matricula :</span>
						<input type="text" placeholder="Sua matricula" name="matricula" required=""  style="color: black;border-bottom: 1px solid green;">
					</div>
					<div class="inputBox"><span style="color: green;" >Senha :</span>
						<input type="password" placeholder="Senha" name="senha"  required=""  style="color: black;border-bottom: 1px solid green;" >
					</div>
					<input type="submit" name="" value="Entrar" style="font-family:'monitoria';">
					<a href="./php/senhaForm.php" class="forgot">Esqueceu sua senha?</a>
				</form>
			</div>	
		</div>
	</div>
	<script type="text/javascript">
		function abreModal(modalId){
			const modal = document.getElementById(modalId);
			modal.classList.add('mostrar');
			modal.addEventListener("click", (e) =>{
				console.log(e.target);
				if (e.target.id == modalId) {
					modal.classList.remove('mostrar');
				}
			});
		}
		const botao = document.getElementById('botao');
		botao.addEventListener('click', () => abreModal('modal-login'));
	</script>
</body>
</html>
