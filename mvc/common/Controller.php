<?php
	class Controller{
		public function model($model){
			require_once("./mvc/models/".$model.".php");
			return new $model;
		}
		public function view($view, $data = array()){
			require_once(".".$_SESSION['area']."/mvc/views/".$view.".php");
		}
		public function mailer($from, $to, $subject, $message)
		{
			date_default_timezone_set('Asia/Ho_Chi_Minh');
			$subject="=?UTF-8?B?".base64_encode($subject)."?=\n";

			require_once('./lib/mailer/PHPMailerAutoload.php');

			$mail             = new PHPMailer();
			$mail->CharSet = 'UTF-8';
			$mail->IsSMTP(); // telling the class to use SMTP
			$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
			// 1 = errors and messages
			// 2 = messages only
			$mail->SMTPAuth   = true;                  // enable SMTP authentication
			$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier

			//Xu ly bao loi SMTP ERROR: Failed to connect to server
			$mail->SMTPOptions = array(
				'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
				)
			);

			//Cac thong so cua mail server
			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
			$mail->Username   = "dodangkhoagtvt";  // GMAIL username
			$mail->Password   = "cjaabrkchcazwncn";  // GMAIL App password
			//End of Cac thong so cua mail server

			$mail->SetFrom($from,$from);

			$mail->AddReplyTo($from,$from);

			$mail->Subject    = $subject;
			$mail->MsgHTML($message);
			$mail->IsHTML(true);
			$mail->AddAddress($to, "");

			if(!$mail->Send()) {
				return false;
			} else {
				return true;
			}
		}
	}
?>