<?php session_start();?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Monitoria Digital - IFPE</title>
	<link rel="stylesheet" href="css/css.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="shortcut icon" href="imgs/Logoxs.png">
	<link rel="stylesheet" href="css/modal.css">
	<style>
.box
{position: absolute;top: 50%;left: 50%;transform: translate(-50%,-50%);width: 400px;padding: 40px;background: rgba(0,0,0,.9);box-sizing: border-box;box-shadow: 0 15px 25px rgba(0,0,0,0.9);border-radius: 10px; overflow: auto; z-index: 10000;border: 3px outset white;}
.box h1{margin: 0 0 30px;padding: 0;color: #fff;text-align: center;}
.box .inputBox{position: relative;}
.box .inputBox input
{width: 100%;padding: 10px 0;font-size: 16px;color: #fff;letter-spacing: 1px;margin-bottom: 30px;border: none;border-bottom:  1px solid #fff;outline: none;background: transparent;}
.box input[type="submit"]
{background: transparent;border: none;outline: none;color: #fff;background: red;padding: 10px 20px;cursor: pointer;border-radius: 5px; transition: 1s;}
.box input[type="submit"]:hover{background-color:darkred;}
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
@media only screen and(max-width: 450px){

}

	</style>
</head>
<body>
	<div class="container">
		<header class="background">
			<div class="nav">
					<a href="index.html"><img src="imgs/lmd.png" class="animated swing"></a>
        			<label for="h"><font color="white">&#9776;</font></label>
        			<input type="checkbox" id="h"/>
        		<div class="menu">
           			<a href="php/home.php">FORUM</a>
           			<button href="php/login.php" class="btn-log" id="botao">LOGIN</button>
          			<a href="php/cadastro.php" class="botao">CADASTRAR</a>
          		</div>			  
        	</div>
        		<div class="title">
      				<h1 class="font">Monitoria <font color="red">Digital</font> - IFPE</h1><br>
      				<h4 class="sub">Ser monitor agora <font color="white">ficou muito mais fácil</font></h4>
      			</div>
		</header>
		<center>
			<!-- aqui arthur  áre dos cards são 3 cards 1 QACADEMICO, 2 SITE DO IF, 3 (OUTROS)-->
			<div class="cards">
				<div class="titulo animated bounce"><h1>Links Externos</h1></div>
					<ul type="none" class="cardes" >
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
						<li>Arthur Vinicius - <font color="Cyan">El Escanor<font></li>
						<li>Carlos Monteiro - <font color="Cyan"> El Cana</font></li>
						<li>Eduardo Bispo - <font color="Cyan">El Bi</font></li>
						<li>Flávia Regina - <font color="Cyan">El Fast</font></li>
						<li>Girlâyne Fragoso - <font color="Cyan">El Eat</font></li>
						<li>Guilherme Evaristo- <font color="Cyan">El Negron</font></li>
						<li>Jhontas Rodrigues - <font color="Cyan">El Floki</font></li>
						</center>
					</ul>
					<ul type="none">
						<div class="grande"></div>
					<center><h1>Contatos</h1></font><br>
						<li>viniciusarthur41@gmail.<font color="cyan">com</font></li>
						<li>1monteirocarlos@gmail.<font color="cyan">com</font></li>
						<li>eduardobispof@gmail.<font color="cyan">com</font></li>
						<li>flaviareginaf07@gmail.<font color="cyan">com</font></li>
						<li>girlayne.fragoso@gmail.<font color="cyan">com</font></li>
						<li>guibalaka123@gmail.<font color="cyan">com</font></li>
						<li>Jhonsnoow32@gmail.<font color="cyan">com</font></li>
						</center>
					</ul>
				</section>
			</footer>
			<footer id="copy">
				<center><font color="white"><h1>@Copyright - 2018</h1></font></center>
			</footer>
		</div>
	</div>
	<div id="modal-login" class="modal-container">
		<div class="modal">
			<div class="box">
				<h1>Logar</h1>
				<?php 
					if (isset($_SESSION['erroLogin'])) { ?>
						<h5>   <?= $_SESSION['erroLogin']?></h5>
						<?php unset($_SESSION['erroLogin']) ?>
					<?php 
					}else{
						header('location:php/home.php');
					}
					 ?>
				<form action="php/verifLogin.php" method="POST">
					<div class="inputBox">
						<input type="text" placeholder="Matricula" name="matricula" required=""  >
					</div>
					<div class="inputBox">
						<input type="password" placeholder="Senha" name="senha"  required=""  >
					</div>
					<input type="submit" name="" value="Entrar">
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
