<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  // Servidor SMTP do Gmail
    $mail->SMTPAuth   = true;              // Habilita autenticação SMTP
    $mail->Username   = 'aspx01'; // Seu endereço de e-mail Gmail
    $mail->Password   = 'dspm nimb udzf wdmz'; // Senha de aplicativo gerada
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;                  // Porta TCP para TLS

    // Configurações do remetente e destinatário
    $mail->setFrom('patricio000', 'Matheus Patricio');
    $mail->addAddress('aspx normal', 'Sr. Patricio'); // Adicionar um destinatário

    // Adicionar anexos
    $mail->addAttachment('C:/Users/Matheus Patricio/Pictures/Screenshots/teste.png'); // Caminho para o arquivo a ser anexado

    // Verificar se o arquivo existe
    if (file_exists('C:/Users/Matheus Patricio/Pictures/Screenshots/teste.png')) {
        echo 'Arquivo encontrado<br>';
    } else {
        echo 'Arquivo não encontrado<br>';
    }
    
    // Conteúdo do e-mail
    $mail->isHTML(true);
    $mail->Subject = 'Assunto do E-mail';
    $mail->Body    = '<h1>Este é um e-mail em HTML</h1><p>Conteúdo do e-mail</p>';
    $mail->AltBody = 'Este é o corpo do e-mail em texto simples para clientes de e-mail que não suportam HTML';

    // Enviar o e-mail
    $mail->send();
    echo 'E-mail enviado com sucesso<br>';
} catch (Exception $e) {
    echo "E-mail não pôde ser enviado. Erro: {$mail->ErrorInfo}<br>";
}

