<?php
$matricula = $_POST['matricula'];
$pw = $_POST['senha'];
$type = $_POST['tipoLogin'];

$host = "localhost";
$user = "root";
$password = "";
$db = "monitoriadigital";

$conn = mysqli_connect($host, $user, $password, $db) or die ("Não foi possível conectar");