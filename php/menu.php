<?php 
	//indicação do tipo do aluno (monitor / aluno)
	$type = 'mnt';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
</head>
<body>
	<nav class="menu">
		<ul>
		<button id="btnMenu" onclick="alternar()">&#9776;</button>
		<?php if($type=='mnt'){ ?>	
			<li id="idUser">NomeMonitor - CRS-2</li>
		<?php }else{ ?>
			<li id="idUser">NomeAluno - CRS-1</li>
		<?php } ?>
		<nav id="navRight">
		<?php if($type=='mnt'){ ?>
			<li><a href="#">Gerar Documento</a></li>
		<?php } ?>
			<li><a href="#" >Atividades</a></li>
			<li><a href="#">Avisos</a></li>
			<li><a href="#">Sair</a></li>
		</nav>
		</ul>
	</nav>
</body>
</html>
<script type="text/javascript">
	function alternar(){
		var status = document.getElementById("navRight");
		if(status.style.display == "block"){
			status.style.display = "none"
		}else{
			status.style.display = "block"
		}
	}
</script>