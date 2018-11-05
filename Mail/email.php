<?php 
use PHPMailer\PHPMailer\PHPMailer;
require './vendor/autoload.php';


$post = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$nome = $post['nome'];
$email = $post['email'];
$mail = new PHPMailer;
//Aqui é a call do bozo, onde você decide qual protocolo vai usar, se é pop3 etc..
$mail->isSMTP();
//Aqui é onde os erros vão ficar evidentes
// 0 = não mostrar msgs
// 1 = msg do navegador
// 2 = msg do navegador e erros do server
$mail->SMTPDebug = 2;
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
$mail->Subject = 'Testando Email';
//Aqui a gente coloca um html básico para envio
$mail->msgHTML(file_get_contents('email.html'),dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'Teste';
// $mail->addAttachment('images/phpmailer_mini.png');
//se caso ocorrerem erros, ele imprime na tela ypah
try (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} catch {
    echo "Message sent!";

}


 ?>