<?php
    /* 
    Baixar phpmailer np github e extrair para dentro da pasta do projeto
    O gmail de origem deve estar com acesso a app menos seguro ativado
    */
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require_once './phpmailer/vendor/autoload.php';

    function enviaEmailTecnico($from, $prof, $emailsDestino, $subject, $body){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPOptions = array( 'ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>true
        ) );

        //Debug para informar erros
        $mail->SMTPDebug=2; //0-nada 1-msg cliente 2 - msg cliente e servidor 3-tudo

        //host
        $mail->Host = "smtp.gmail.com";

        //tipo de prote��o
        $mail->SMTPSecure = "tls";

        //Porta
        $mail->Port = 587;

        //Autentica��o
        $mail->SMTPAuth = true;

        //Detalhes da conta de email
        $mail->Username = 'lema@ufsm.com';
        $mail->Password = 'sglablema';
        //Detalhes do email
        $mail->setFrom($from, $prof);
        $mail->addAddress($emailsDestino[0].nomesetor, $emailsDestino[1].nomesetor, 'lema@ufsm.br');
        $mail->Subject = $subject;
        $mail->Body = $body;

        //mensagem de envio ou erro
        if(!$mail->send()){
            echo '<script> alert("Erro ao enviar o email para o técnico"); </script>';
        } else {
            echo '<script> alert("O email foi enviado para o técnico"); </script>';
        }
    }