<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:../index.php');
}
include 'conn.php';

$query = $conn->query("SELECT p.id_pergunta, p.titulo, p.corpo, p.perg_matricula, p.perg_hora, a.nome, a.tipo, a.periodo, a.curso FROM perguntas p INNER JOIN aluno a ON a.matricula = p.perg_matricula ORDER BY p.id_pergunta DESC");
$data = $query->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Navegação TOP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/micro-bootstrap.css">
    <?php include 'Menu2.php'; ?>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1>Monitoria Digital - Fórum</h1>
        </div>
        <br><br>
        <div class="col-sm">
            <div class="page-header">
                <h2>Adicione um tópico</h2>
            </div>
            <form action="addPerg.php" method="POST">
                <label class="form-control">
                    Título do tópico:
                    <input type="text" class="form-input" required name="titulo" placeholder="Título do tópico...">
                </label>
                <label class="form-control">
                    Descrição do tópico:
                    <textarea class="form-input" required name="corpo" placeholder="Conteúdo do tópico"></textarea>
                </label>
                
                <button type="reset" class="btn btn-danger">Limpar</button>
                <button type="submit" class="btn btn-success">Postar</button>
            </form>
        </div>


        <div class="col-md">
            <div class="page-header">
                <h2>Tópicos</h2>
            </div>

            <?php foreach ($data as $forum) : ?>
                <div class="col-total bordered">
                    <div class="page-header">
                        <?php if ($forum['perg_matricula'] == $_SESSION['matricula']) : ?>
                        <a href="perg.php?id=<?= $forum['id_pergunta'] ?>" style="text-decoration: none;"><h2 style="margin: 5px 0px;"><?= $forum['titulo'] ?></a> 
                        <a href="rmPerg.php?id=<?= $forum['id_pergunta'] ?>" style="text-decoration: none; float: right; font-size: 26px;" >&#10005;</a></h2>
                        <?php else: ?>
                        <h2><?= $forum['titulo'] ?> <a href="rmPerg.php?id=<?= $forum['id_pergunta'] ?>"></h2>
                        <?php endif ?>
                        <h5><?= $forum['nome'] ?>(<?= $forum['tipo'] ?>) - <?= $forum['perg_hora'] ?></h5>
                    </div>
                    <div class="container">
                        <p><?= $forum['corpo'] ?></p>
                        <br><br>
                    </div>
                    <a href="perg.php?id=<?= $forum['id_pergunta'] ?>" class="btn btn-success">Responder</a>
                </div>

            <?php endforeach ?>
        </div>
    </div>
    <div class="footer">
        <a href="developers.php" style="color: white;">Developers</a>
    </div>
</body>
</html>