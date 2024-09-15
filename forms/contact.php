<?php
// Define o endereço de e-mail para o qual os e-mails serão enviados
$receiving_email_address = 'luan.pereira@premcell.com.br';

// Verifica se os dados do formulário foram enviados via método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém os valores dos campos do formulário
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Cria o cabeçalho do e-mail
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    // Envia o e-mail
    $mail_sent = mail($receiving_email_address, $subject, $message, $headers);

    // Verifica se o e-mail foi enviado com sucesso
    if ($mail_sent) {
        // Se o e-mail foi enviado com sucesso, exibe uma mensagem de sucesso
        echo '<div class="alert alert-success">Sua mensagem foi enviada com sucesso. Obrigado!</div>';
    } else {
        // Se houve um erro ao enviar o e-mail, exibe uma mensagem de erro
        echo '<div class="alert alert-danger">Erro ao enviar a mensagem. Por favor, tente novamente mais tarde.</div>';
    }
} else {
    // Se os dados do formulário não foram enviados via POST, exibe uma mensagem de erro
    echo '<div class="alert alert-danger">Erro: os dados do formulário não foram recebidos corretamente.</div>';
}
?>
