<?php
// signup confirmation mail

include('smtp/PHPMailerAutoload.php');
 	
		


function purchase($to){
	$html= file_get_contents('E:\xaamp\htdocs\project\mailer\purchase.php');
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
	$mail->Subject ="THANKS TO PURCHASE FORM US";
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
