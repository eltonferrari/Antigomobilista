<?php
	include '../../../bibliotecas/PHPMailer/PHPMailerAutoload.php';

	$nomeSolicitante = $_GET['nome'];
    $emailSolicitante = $_GET['email'];
	
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.titan.email';
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Username = 'antigos@resolvesystems.com.br';
	$mail->Password = 'Res@lve_Systantigos$1';
	$mail->Port = 465;
	
	$mail->setFrom('antigos@resolvesystems.com.br');
	$mail->addReplyTo('no-reply@email.com.br');
	$mail->addAddress($emailSolicitante, $nomeSolicitante);

	$mail->isHTML(true);
	$mail->Subject = 'Antigo - Confirmação de e-mail';
	$mensagem = "Olá, $nomeSolicitante <br>";
	$mensagem .= "Confirme seu e-mail para acessar o site Antigomobilista.<br><br>";
	$mensagem .= '<a href="antigomobilista/systems/controladores/autenticacao/valida_email.php?confirma_email=yes">Clique aqui para confirmar seu e-mail</a>.<br><br>';
	$mensagem .= "Se você recebeu este e-mail por engano, simplesmente o exclua.<br><br>";
	$mensagem .= "Att.,<br><br>";
	$mensagem .= "Resolve Systems - Marketing Digital<br><br>";
	$mensagem .= "Mantenedora do site ANTIGOMOBILISTA";
	$Mailer->Body = '$mensagem';
	$Mailer->AltBody = "Olá, $nomeSolicitante<br>
						Confirme seu e-mail para acessar o site Antigomobilista.<br><br>
						Clique aqui para confirmar seu e-mail.<br><br>
						Se você recebeu este e-mail por engano, simplesmente o exclua.<br><br>
						Att.,<br><br>
						Resolve Systems - Marketing Digital<br><br>
						Mantenedora do site ANTIGOMOBILISTA";	
?>