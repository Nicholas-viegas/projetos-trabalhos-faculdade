<?php
defined('BASEPATH') OR exit('URL invalida.');
//library criada para configurar e enviar emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Emails{

    public $MAIL_HOST = 'SMTP.office365.com';
    public $MAIL_PORT = 587;
    public $MAIL_USERNAME = 'example@example.com'; //configure o username para a conta do seu email
    public $MAIL_PASSWORD = 'sua senha'; //senha para a conta do seu email
    public $MAIL_FROM = 'example@example.com'; //defina email do remetente
    public $MAIL_REMETENTE = 'seu nome';//defina nome do remetente
    public $DEBUG_MODE = 0;
    public $DESTINATARIO = MAIL_DESTINATARIO; //destinatario principal

    
    public function enviar($assunto, $mensagem, $destinatarios = array()) //função que envia o email via PHPMailer
    {
        $dsti = array(0 => '');
        $all_recieps = array_merge($dsti, $destinatarios);
        require 'assets/phpmailer/src/Exception.php';
        require 'assets/phpmailer/src/PHPMailer.php';
        require 'assets/phpmailer/src/SMTP.php';

        $mail = new PHPMailer(true);
        $enviada = false;
        try{
            $mail->SMTPDebug = $this->DEBUG_MODE;
            $mail->isSMTP();
            $mail->Host = $this->MAIL_HOST;
            $mail-> SMTPAuth = true;
            $mail->Username = $this->MAIL_USERNAME;
            $mail->Password = $this->MAIL_PASSWORD;
            $mail->SMTPSecure = 'tls';
            $mail->Port = $this->MAIL_PORT;
            $mail->CharSet = "UTF-8";

            $mail->setFrom($this->MAIL_FROM, $this->MAIL_REMETENTE);
            $mail->addAddress($this->DESTINATARIO);

            foreach($destinatarios as $destinatario) {
                $mail->addAddress($destinatario);
            }

            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = $mensagem;

            $enviada = $mail->send();
        } catch (Exception $e) {
            $enviada = false;
        }

        return $enviada;

    }

}

?>