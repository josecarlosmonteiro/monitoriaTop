<?php 
require_once "./PHPMailer-master/src/SMTP.php";
require_once "./PHPMailer-master/src/PHPMailer.php";
//pega a váriavel do post, filtra e transforma em array
$post = filter_input_array(INPUT_GET, FILTER_DEFAULT);
//atribuicao
$nome = $post['nome'];
$email = $post['email'];
//Chamando classes
$phpMailer = new PHPMailer();
$phpMailer->CharSet = "utf-8";//Definir o método de acentuação
$phpMailer->SMTPDebug = 3;//Mostrar se teve algum erro
$phpMailer->isSMTP();//Tem que ser um email craido e válido, se não, não pega.
$phpMailer->Host ="smtp.gmail.com";//Host do seu site, da sua aplicação
$phpMailer->SMTPAuth = true;//Verificar se o email que você colocou da sua hospedagem existe mesmo
$phpMailer->Username = "monitoriadigitalsuporte@gmail.com";//Email do host
$phpMailer->Password = "monitoriaTop69";//Senha do host
$phpMailer->SMTPSecurity = "tls";//metódo de segurança smtp  Transport layer security, protocolo de criptografia.
$phpMailer->Port = 587;//Porta do smtp, padrao de todos os servidores 587
$phpMailer->FromName = "{$nome}";//Email do cara
$phpMailer->From = "";//Email da agência que está enviando
$phpMailer->addAddress();//Endereco que vai ser enviado 
$phpMailer->isHTML(true);//Permitir que o email possa ser um arquivo html


 ?>