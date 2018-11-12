<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
require '../Mail/vendor/autoload.php';
$nome = $_SESSION['nomeCadastrado'];
$email = $_SESSION['emailCadastrado'];
$emailHash = md5($email);
$data = date('d/m/y');

$mail = new PHPMailer;

//Aqui é a call do bozo, onde você decide qual protocolo vai usar, se é pop3 etc..
$mail->isSMTP();
//Aqui é onde os erros vão ficar evidentes
// 0 = não mostrar msgs
// 1 = msg do navegador
// 2 = msg do navegador e erros do server
$mail->SMTPDebug = 0;
//o ip do servidor de email de sua preferencia
$mail->Host = 'smtp.gmail.com';
//colocar a porta do smtp
$mail->Port = 587;
//definir o tipo de criptografia https
$mail->SMTPSecure = 'tls';
//verificação se o email é válido mesmo
$mail->SMTPAuth = true;
//Email de quem vai enviar 
$mail->Username = "monitoriadigitalsuporte@gmail.com";
//Senha do email a cima  kkk
$mail->Password = "monitoriaTop69";
//Aqui a gente coloca realmente o titulo e o email de quem está enviando
$mail->setFrom('monitoriadigitalsuporte@gmail.com', 'Monitoria Digital Suporte');
//Aqui já é no caso se a pessoa tiver outro email pra enviar.
$mail->addReplyTo('monitoriadigitalsuporte@gmail.com', 'Monitoria Digital Suporte');
//Atenção, aqui é aonde o email e o nome dos usuários ficaram
$mail->addAddress($email, $nome);
//Corpo, oq vai ter dentro da caixa de email
$mail->Subject = 'Confirme seu email no MonitoriaDigital - 	'.$data;
//Aqui a gente especifica um html básico para envio
$mail->IsHTML(true);
//Colocar algum corpo se quiser...
$mail->Body = "http://localhost:8000/php/confirmarEmail.php?email=".$emailHash."&&nome=".$nome;
//$mail->Body = file_get_contents('emailTemplate.php');
$mail->AltBody = "http://localhost:8000/php/confirmarEmail.php?email=".$emailHash."&&nome=".$nome;
// $mail->addAttachment('images/phpmailer_mini.png');
//se caso ocorrerem erros, ele imprime na tela ypah
if(!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
   $_SESSION['recebido'] = true;
   header('location:aguardandoConfirm.php?email='.trim(md5($email)));
}

 ?>