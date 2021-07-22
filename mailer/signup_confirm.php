<?php
// signup confirmation mail

include('smtp/PHPMailerAutoload.php');
 	
		

// $to='sakibtamboli06@gmail.com';
$subject="SUCCESSFULLY SIGNUP WITH D'assurance'";

// echo smtp_mailer($to);

function confirm($to,$username){
	$html= file_get_contents('E:\xaamp\htdocs\project\mailer\successful.php');
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3; // display all debug content
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 25; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8'; 
	$mail->Username = "do.not.reply.insurance.pune@gmail.com";
	$mail->Password = "ks@testprojectmail";
	$mail->SetFrom("do.not.reply.insurance.pune@gmail.com");
	$mail->Subject ="SUCCESSFULLY SIGNUP WITH D'assurance";
	$mail->Body =$html;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>true
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		// return 'Sent';
	}
}


?>
