<?php
/*
Name: 			Contact Form
Written by: 	Okler Themes - (http://www.okler.net)
Theme Version:	9.8.0
*/

namespace PortoContactForm;

session_cache_limiter('nocache');
header('Expires: ' . gmdate('r', 0));

header('Content-type: application/json');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'php-mailer/src/PHPMailer.php';
require 'php-mailer/src/SMTP.php';
require 'php-mailer/src/Exception.php';

// Step 1 - Enter your email address below.
$email = 'pruebas.pruebas@vmasideas.com';  // se cambio a este correo porque me lo mandaba a spam carlos.aguila / cambiarlo al destinatario

// If the e-mail is not working, change the debug option to 2 | $debug = 2;
$debug = 0;

// If contact form don't has the subject input change the value of subject here
$subject = ( isset($_POST['subject']) ) ? $_POST['subject'] : 'Mensaje de Usuario';

$message = '';

foreach($_POST as $label => $value) {
	$label = ucwords($label);

	// Use the commented code below to change label texts. On this example will change "Email" to "Email Address"

	// if( $label == 'Email' ) {               
	// 	$label = 'Email Address';              
	// }

	// Checkboxes
	if( is_array($value) ) {
		// Store new value
		$value = implode(', ', $value);
	}

	$message .= $label.": " . nl2br(htmlspecialchars($value, ENT_QUOTES)) . "<br>";
}

$mail = new PHPMailer(true);

try {

	$mail->SMTPDebug = $debug;                                 // Debug Mode

	// Step 2 (Optional) - If you don't receive the email, try to configure the parameters below:

	$mail->IsSMTP();                                         // Set mailer to use SMTP
	$mail->Host = 'vmasideas.agency';				       // Specify main and backup server
	$mail->SMTPAuth = true;                                  // Enable SMTP authentication
	$mail->Username = 'test.noreplay@vmasideas.agency';                    // SMTP username
	$mail->Password = 'U*vwbwspd(Fq';                              // SMTP password
	$mail->SMTPSecure = 'tls';                               // Enable encryption, 'ssl' also accepted
	$mail->Port = 587;   								       // TCP port to connect to

	$mail->AddAddress($email);	 						       // Add another recipient

	//$mail->AddAddress('person2@domain.com', 'Person 2');     // Add a secondary recipient
	//$mail->AddCC('person3@domain.com', 'Person 3');          // Add a "Cc" address. 
	//$mail->AddBCC('person4@domain.com', 'Person 4');         // Add a "Bcc" address. 

	// From - Name
	$fromName = ( isset($_POST['name']) ) ? $_POST['name'] : 'Website User';
	$user_Name        = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
	$user_Phone       = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
	$user_Email       = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
	$user_empresa     = filter_var($_POST["empresa"], FILTER_SANITIZE_STRING);
	$user_Message     = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

	$mail->SetFrom($email, $fromName);

	// Repply To
	if( isset($_POST['email']) && !empty($_POST['email']) ) {
		$mail->AddReplyTo($_POST['email'], $fromName);
	}

	$mail->IsHTML(true);                                       // Set email format to HTML

	$mail->CharSet = 'UTF-8';

	$mail->Subject = $subject;
	//$mail->Body    = $message;
	$mail->Body  = "<h4 style='text-align: center;padding: 25px 15px;background-color: #0c6c9e;color: #FFFFFF;font-size:16px;width:90%;border-radius: 10px;'>Existe un nuevo mensaje de contacto en el sitio.</h4><br><br>";

	$mail->Body .= utf8_decode("<strong>Nombre: </strong>". $user_Name ."<br>");

    $mail->Body .= utf8_decode("<strong>Telefono: </strong>". $user_Phone ."<br>");

	$mail->Body .= utf8_decode("<strong>Correo: </strong>". $user_Email ."<br>");

    $mail->Body .= utf8_decode("<strong>Empresa: </strong>". $user_empresa ."<br>");

	$mail->Body .= utf8_decode("<strong>Mensaje: </strong>". $user_Message ."<br>");

    

	$mail->Send();
	$arrResult = array ('response'=>'success');

} catch (Exception $e) {
	$arrResult = array ('response'=>'error','errorMessage'=>$e->errorMessage());
} catch (\Exception $e) {
	$arrResult = array ('response'=>'error','errorMessage'=>$e->getMessage());
}

if ($debug == 0) {
	echo json_encode($arrResult);
}