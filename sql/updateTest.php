<?php
//conexão com o banco
include("");
$pdo=conectar();
//verificar se existem dados necessarios ´para atualizar
if(!empty($_POST['id']) && !empty($_POST['tarefa'])):

//recebendo dados
$tarefa=addslashes(trim($_POST["tarefa"]));
$id=addslashes(trim($_POST["id"]));

//A consulta
$atualizarTarefa= $pdo->prepare("UPDATE nome da tabela SET tarefas, WHERE ID=:id");
$atualizarTarefa->bindValue(":tarefa",$tarefa);
$atualizarTarefa->execute();
if($atualizarTarefa-> rowCount() > 0):
	echo "Tarefa Atualizada com sucesso!!";
endif;

else:
	echo "";
endif;

?>