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

	if (tipo == "aluno") {
		document.getElementById("sub").style.display = "block";
		document.getElementById("monitor").style.display = "none";
	}else if (tipo == "monitor") {
		document.getElementById("monitor").style.display = "block";		
		document.getElementById("sub").style.display = "none";
	}else{
		document.getElementById("monitor").style.display = "none";		
		document.getElementById("sub").style.display = "none";
	}
}


function monitor(){
	curso = document.getElementById('curso');

	if (curso == "IPI") {
		periodo = document.getElementById("periodoCursando").value;
		
	}else if (tipo == "voluntario" || tipo == "bolsista") {
		document.getElementById("monitor").style.display = "block";
		document.getElementById("sub").style.display = "none";
	}else{
		document.getElementById("monitor").style.display = "none";
		document.getElementById("sub").style.display = "none";		
	}
}

