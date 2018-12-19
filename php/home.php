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
</head>
<body>
    <?php include 'Menu2.php'; ?>
    <div class="container">
        <div class="page-header">
            <h1>Monitoria Digital - Fórum</h1>
        </div>
        <br><br>
        <div class="col-sm bordered" style="padding: 30px;">
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
                
                <button type="submit" class="btn btn-success">Postar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>
        </div>


        <div class="col-md bordered" style="padding: 30px 60px; background-color: #fafbfc;">
            <div class="page-header">
                <h2>Tópicos</h2>
            </div>

            <?php foreach ($data as $forum): ?>
                <div class="col-total" style="padding: 20px; margin-left: -0.5%; border: 2px solid silver; border-radius: 8px; background-color: white;">
                    <div class="page-header">
                        <?php if ($forum['perg_matricula'] == $_SESSION['matricula']) : ?>
                        <a href="perg.php?id=<?= $forum['id_pergunta'] ?>" style="text-decoration: none;"><h2 style="margin: 5px 0px;"><?= $forum['titulo'] ?></a> 
                        <a href="rmPerg.php?id=<?= $forum['id_pergunta'] ?>" style="text-decoration: none; float: right; font-size: 26px; padding: 0px 20px" >&#10005;</a></h2>
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