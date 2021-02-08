<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

// Instância da classe
$mail = new PHPMailer(true);
if( isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['empresa']) && isset($_POST['cargo']) && isset($_POST['check'])){
    
    if($_POST['nome'] == '' || $_POST['email'] == '' || $_POST['telefone'] == '' || $_POST['empresa'] == '' || $_POST['cargo'] == '' || $_POST['check'] == ''){
        echo 'Por favor, preencha todos os campos!';
        die();
    }

    $nomeRemetente      = $_POST['nome'];   
    $emailRemetente     = $_POST['email'];
    $telefoneRemetente  = $_POST['telefone'];
    $empresaRemetente  = $_POST['empresa'];
    $cargoRemetente  = $_POST['cargo'];
    $checkOutsystemRemetente  = $_POST['check'];


    if (!filter_var($emailRemetente, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato de email inválido";
    }
    try
        {
            // Configurações do servidor
            $mail->isSMTP();        //Devine o uso de SMTP no envio
            $mail->SMTPAuth = true; //Habilita a autenticação SMTP
            $mail->Username   = 'contato@frameworksystem.com';
            $mail->Password   = 'framework2019;';

            // Criptografia do envio SSL também é aceito
            $mail->SMTPSecure = 'tls';

            // Informações smtp
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
           
            // Define o destinatário
            $mail->addAddress('contato@frameworksystem.com', 'Fale Conosco');
            
            // Define o remetente
            $mail->setFrom($emailRemetente, $nomeRemetente);
            
            // Conteúdo da mensagem
            $mail->isHTML(true);  // Seta o formato do e-mail para aceitar conteúdo HTML
            $mail->Subject = 'Contato do Site - Telefone:' . $_POST['telefone'];
            $mail->Body    = 'telefone:' . $_POST['telefone'] . 'empresa' . $_POST['empresa'] . 'cargo' . $_POST['cargo'] . 'tem outsystem' . $_POST['check'];
           // $mail->AltBody = 'Este é o corpo da mensagem para clientes de e-mail que não reconhecem HTML';
            // Enviar
            $mail->send();
        echo 'Sucesso! Sua mensagem foi enviada!';
    }catch (Exception $e){
        echo "Erro: {$mail->ErrorInfo}";
    }
}else{
    echo 'Por favor, preencha todos os campos para enviar a mensagem!';
}

?>