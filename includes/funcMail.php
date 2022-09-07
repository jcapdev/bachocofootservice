<?php
	require_once (__dir__.'/class.phpmailer.php');

	try {
		$mail = new phpmailer(true);
//		$log->trace("Error antes de enviar: ".$mail->ErrorInfo);
		$mail->CharSet = 'UTF-8';
		$mail->PluginDir = __dir__.'/';
		$mail->Mailer = "smtp";
		$mail->Host = "mail.vivepuebla.mx";
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl'; 
		$mail->Port = 465;
		$mail->Username = "no_contestar@vivepuebla.mx"; 
		$mail->Password = "9Sjx61YTtW4K";
		$mail->From = "no_contestar@vivepuebla.mx";
		$mail->FromName = "COTIZADOR: VIVEPUEBLA.MX";
		if (is_array($email)) 
		{
			//$log->trace("funcmail: ".implode("_", $email));
			for ($m=0; $m<count($email); $m++) {
				//$log->trace("añadiendo: ".$email[$m]);
				$mail->AddAddress($email[$m]);//direccion admin	
			}
		}
		else if (strlen($email)>0) {
			$mail->AddAddress($email);//direccion destino	
		}
		if(count($emailAdmin) > 0) {
//			$mail->addCustomHeader("BCC: ".implode(",",$emailAdmin));
//			$mail->addCustomHeader("BCC: crldvd7@gmail.com");
	//		$mail->AddCC($emailAdmin);//direccion admin
			for ($m=0; $m<count($emailAdmin); $m++) {
				$mail->AddCC($emailAdmin[$m]);//direccion admin	
			}
		}
		if(isset($emailExtra) && strlen($emailExtra) > 0) {
			$mail->AddCC($emailExtra);//direccion admin
		}
		$mail->Subject = $subject;//asunto
		$mail->MsgHTML ($msg);
		$mail->isHTML(true); 
		
		if (strlen($adjunto) > 0) {
			$mail->AddAttachment($adjunto);
		}
		
		$respFM = $mail->Send();
		
		$intentos=1; 
		while ((!$respFM) && ($intentos < 5)) 
		{
			sleep(5);
							//echo $mail->ErrorInfo;
			$respFM = $mail->Send();
			$intentos=$intentos+1;	

		}
		//require_once("includes/mail_administrador.php");						
		if(!$respFM || $respFM=="")
		{
			$log->error("Error funcmail: ".$mail->ErrorInfo);
		}
	} 
	catch (phpmailerException $e) 
	{
    	$respFM = "Error 1: ".$e->errorMessage(); //Pretty error messages from PHPMailer
	} 
	catch (Exception $e) 
	{
		$respFM = "Error 2".$e->getMessage(); //Boring error messages from anything else!
	}		
?>