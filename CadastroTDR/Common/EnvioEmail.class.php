<?php
namespace TrilhosDorioCadastro\Common{
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../StartLoader/autoloaderEmail.php';
    
class EnvioEmail{
private $Rementente;
private $Destinatario;
private $mensagem;
private $assunto;
public function __construct($Rementente,$Destinatario,$assunto,$mensagem)
{
    $this->Rementente=$Rementente;
    $this->Destinatario=$Destinatario;
    $this->mensagem=$mensagem;
    $this->assunto=$assunto;
    
}
function sendMail()
{
  $mail = new PHPMailer(true);

  try {
      //Server settings
    //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
      $mail->isSMTP();                                            // Send using SMTP
      $mail->Host       = 'mail.trilhosdorio.com.br';                    // Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
      $mail->Username   = 'boasvindas@trilhosdorio.com.br';                     // SMTP username
      $mail->Password   = 'TrilhosDoRio781';                               // SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
  
      //Recipients
      $mail->setFrom($this->Rementente, 'Seja bem vindo a Trilhos do Rio');
      $mail->addAddress($this->Destinatario, 'Leonardo');     // Add a recipient
      //$mail->addAddress('ellen@example.com');               // Name is optional
      $mail->addReplyTo('leonardo.ivo22@gmail.com', 'Information');
    //  $mail->addCC('cc@example.com');
      //$mail->addBCC('bcc@example.com');
  
      // Attachments
     // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
     // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  
      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = $this->assunto;
      $mail->Body    = $this->mensagem;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }










}
}
}




// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
