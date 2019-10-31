<?php

	/**
	 * 
	 */
	class Email
	{

		private $mailer;
		
		public function __construct($host,$username,$senha,$name)
		{
			$this->mailer = new PHPMailer;

			//$mail->SMTPDebug = 3;                               // Enable verbose debug output

			$this->mailer->isSMTP();                                      // Set mailer to use SMTP
			$this->mailer->Host = $host;	      //'smtp.live.com';	  // Specify main and backup SMTP servers
			$this->mailer->SMTPAuth = true;                               // Enable SMTP authentication
			$this->mailer->Username = $username; //'Teste@hotmail';     // SMTP username
			$this->mailer->Password = $senha;    //'pass@123';                 // SMTP password
			$this->mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$this->mailer->Port = 587;                                    // TCP port to connect to

			$this->mailer->setFrom($username,$name);		//'teste_from@hotmail.com', 'Name here');
			
			//$mail->addAddress('ellen@example.com');	                   // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$this->mailer->isHTML(true);                            // Set email format to HTML
			$this->mailer->CharSet = 'UTF-8';

			/*
		
			*/

			/*
			if(!$this->mailer->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $this->mailer->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
			*/
		}

			public function addAdress($email,$nome){
				//$this->mailer->addAddress('teste@hotmail.com', 'name');     // Add a recipient
				$this->mailer->addAddress($email, $nome);     // Add a recipient
			}

			public function formatarEmail($info){
				$this->mailer->Subject = $info['assunto'];//'Contato - Title';
				$this->mailer->Body    = $info['corpo'];//
				$this->mailer->AltBody = strip_tags($info['corpo']);//
			}

			public function enviarEmail(){
				if($this->mailer->send()){
					return true;
				}else{
					return false;
				}
			
		}
	}

?>