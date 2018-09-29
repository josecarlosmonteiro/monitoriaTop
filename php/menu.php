<?php 
	$tipo = 'deb';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../css/menu.css">
	<title></title>
</head>
<body>
	<div class="menu">
		<nav id="monitor">
			<ul>
				<font color="white;"><a id="btn_menu" onclick="drop()">&#9776;</a></font>
					<nav id="links">
						<?php if($tipo == 'monitor'){ ?>					
						<li id="user">NomeMonitor - IPI</li>
						<li><a href="#">Sair</a></li>
						<li><a href="#">Atividades</a></li>
						<li><a href="#">Mensagens</a></li>
						<li><a href="#">Início</a></li>
					<?php }else{ ?>
						<li id="user">NomeAluno - Log</li>
						<li><a href="#">Sair</a></li>
						<li><a href="#">Mensagens</a></li>
						<li><a href="#">Início</a></li>
						<?php } ?>
					</nav>
			</ul>
		</nav>
	</div>
</body>
</html>
<script>
	function drop(){
		var estado = document.getElementById("links");
		if(estado.style.display === "block"){
			estado.style.display = "none";
		}else{
			estado.style.display = "block";
		}
	}
</script>