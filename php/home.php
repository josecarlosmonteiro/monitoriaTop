<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:../index.php');
}

include 'conn.php';

$query = $conn->prepare("SELECT p.id_pergunta, p.titulo, a.nome, a.tipo, a.periodo, a.curso FROM perguntas p INNER JOIN aluno a ON a.matricula = p.perg_matricula ORDER BY p.id_pergunta DESC");
$query->execute();
$data = $query->fetchALL(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Navegação TOP</title>
    <link rel="stylesheet" type="text/css" href="../css/global.css">
    <meta charset="utf-8">
    <?php include 'menu.php'; ?>
</head>
<body>
    
    <div class="content">
        <input type="checkbox" id="checkPergunta" style="display: none;">
        <label for="checkPergunta" id="btnPergunta">Perguntar</label>
        <div class="campoInput">
        <?php 
            if (isset($_SESSION['matricula'])) { ?>
                <form action="addPerg.php" method="POST">
                    <input id="inputForum" type="text" required name="titulo" placeholder="Digite o título da pergunta">
                    <textarea id="inputForum" type="text" required name="corpo" placeholder="Digite sua pergunta"></textarea>
                    <input class="btnSubmit" type="submit" value="Enviar">
                </form> <?php 
            }else{
                echo "Faça login para realizar perguntas.";
            } ?>
        </div>
            
            <?php foreach ($data as $forum) { ?>    
                <div class="card">
                    <a id="topico" href="perg.php?id=<?= $forum['id_pergunta'] ?>"> <h3> <?= $forum['titulo'] ?> </h3> <a href="#" id="userForum"><?= $forum['nome'] ?> (<?=$forum['tipo']?>) <?= $forum['curso'] ?>/<?= $forum['periodo'] ?></a></a>
                </div> 
        <?php } ?>
    </div>
    <div class="footer">
        <a href="#" style="color: white;">Developers</a>
    </div>
</body>
</html>
