<?php
namespace TrilhosDorioCadastro\Common{
    //require_once('phpmailer/class.phpmailer.php');
    use TrilhosDorioCadastro\Common\phpmailer\PHPMailer;

class EnvioEmail{
private $Rementente;
private $Destinatario;
private $mensagem;
private $assunto;
public function __construct($Rementente,$Destinatario,$mensagem,$assunto)
{
    $this->Rementente=$Rementente;
    $this->Destinatario=$Destinatario;
    $this->mensagem=$mensagem;
    $this->assunto=$assunto;
    
}


    function sendMail()
{
    $mail = new PHPMailer(true);

    $mail->IsSMTP();
    try {
      $mail->SMTPAuth   = true;                 
      $mail->Host       = 'smtp.gmail.com';     
      $mail->SMTPSecure = "tls";                #remova se nao usar gmail
	  $mail->Port       = 587;                  #remova se nao usar gmail
      $mail->Username   = 'leonardo.ivo22@gmail.com'; 
      $mail->Password   = 'afg784512';
      $mail->AddAddress($this->Destinatario);
	  $mail->AddReplyTo($this->Rementente);
      $mail->SetFrom($this->Rementente);
      $mail->Subject = $this->assunto;
      $mail->MsgHTML($this->mensagem);
      $mail->Send();     
      $envio = true;
    } catch (\phpmailerException $e) {
      $envio = false;
    } catch (\Exception $e) {
      $envio = false;
    }
    return $envio;
}
}
}
?>
