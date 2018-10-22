 //Validação de Senhas

function validar(){
	var senha = cadastro.senha.value;
	var senhaRep = cadastro.confirmsenha.value;
	if (senha == "" || senha.length <= 8) {
		alert('impossivel continuar com o campo Senha Vazio');
		cadastro.senha.focus();
		return false;
	}
}

// --------------SELECIONA O TIPO DO CURSO--------------
function cursoatual() {
	curso = document.getElementById('curso').value;

	if (curso == "IPI") {
		document.getElementById(curso).style.display = "block";
		document.getElementById("LOG").style.display = "none";
		document.getElementById("tipo").style.display = "block";
	}else if(curso == "LOG"){
		document.getElementById(curso).style.display = "block";
		document.getElementById("IPI").style.display = "none";
		document.getElementById("tipo").style.display = "block";
	}else{
		document.getElementById("IPI").style.display = "none";
		document.getElementById("LOG").style.display = "none";		
		document.getElementById("tipo").style.display = "none";
	}
}

// --------------SELECIONA O TIPO DO CURSO--------------
function tipoAluno(){
	tipo = document.getElementById('tipoaluno').value;

	if (tipo == "Aluno") {
		document.getElementById("sub").style.display = "block";
		document.getElementById("monitor").style.display = "none";
		document.getElementById("sub").style.display = "block";
		document.getElementById("curso_m").style.display = "none";
	}else if (tipo == "Monitor") {
		document.getElementById("curso_m").style.display = "block";
		document.getElementById("sub").style.display = "none";
		document.getElementById("sub").style.display = "block";
	}else{
		document.getElementById("sub").style.display = "none";
		document.getElementById("sub").style.display = "none";
		document.getElementById("curso_m").style.display = "none";
	}
}

function curso_monitoria(){
	monitor = document.getElementById('monitoria_curso').value;

	if (monitor == "IPI") {
		document.getElementById('ipi_m').style.display = "block";
		document.getElementById('log_m').style.display = "none";
	}else if (monitor == "LOG") {
		document.getElementById('log_m').style.display = "block";
		document.getElementById('ipi_m').style.display = "none";
	}else{
		document.getElementById('log_m').style.display = "none";
		document.getElementById('ipi_m').style.display = "none";
	}
}
