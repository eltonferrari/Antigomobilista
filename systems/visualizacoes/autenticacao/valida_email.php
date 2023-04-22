<?php 
    session_start();
    
    use Exception as GlobalException;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../../../bibliotecas/PHPMailer/src/Exception.php';
    require '../../../bibliotecas/PHPMailer/src/PHPMailer.php';
    require '../../../bibliotecas/PHPMailer/src/SMTP.php';
    
    include '../../controladores/usuarios/class_usuarios.php';
    
    echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';

    $email = $_SESSION['email'];
    $nome =  $_SESSION['nome'];
    $logado = $_SESSION['logado'];
    if (isset($_GET['logado'])) {
        $emailConfirmado = $_GET['logado'];
        $user = $user->setValidaEmailById($idLogado, $emailConfirmado);
    }
    $idLogado = $_SESSION['id_user'];
    $user = new Usuarios();
    
    if ($logado == 0) {
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'antigomobilistaweb@gmail.com';
            $mail->Password   = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            //Recipients
            $mail->setFrom('eltonferrari@gmail.com', 'Antigomobilista.com');
            $mail->addAddress($email, $nome);
            //Content
            $mail->isHTML(true);
            $mail->Subject = 'Antigomobilista - E-mail de confirmação';
            $mail->Body    = "Prezado(a)" . $nome . ", <br /><br />Agradecemos a sua solicitação 
                            de cadastramento em nosso site, Antigomobilista! <br /><br /> Para que
                            seu cadastro possa ser finalizado e seu acesso luiberado em nosso site,
                            solicitamos a confirmação, deste endereço de e-mail, clicando no link
                            abaixo: <br /><br /><a href='http://localhost/Antigomobilista/systems
                            /visualizacao/autenticacao/valida-email.php?logado=1>Clique aqui.</a>
                            <br /><br /><br />Esta mensagem foi enviada a você pelo site
                            Antigomobilista.com.<br />Você está recebendo esta porque seu e-mail
                            foi cadastrado para acesso ao site.<br /><br />Observação: Nenhum
                            e-mail enviado pelo site possui arquivos anexados, solicita o
                            preenchimento de senhas ou solicita informações cadastrais.<br />
                            <br />Att,<br />Elton Ferrari<br />Desenvolvedor do sistema
                            Antigomobilista.<br /><br />";
            $mail->AltBody = "Prezado(a)" . $nome . ", \n\nAgradecemos a sua solicitação 
                            de cadastramento em nosso site, Antigomobilista! \n\n Para que
                            seu cadastro possa ser finalizado e seu acesso luiberado em nosso site,
                            solicitamos a confirmação, deste endereço de e-mail, clicando no link
                            abaixo: \n\n<a href='http://localhost/Antigomobilista/systems
                            /visualizacao/autenticacao/valida-email.php?logado=1>Clique aqui.</a>
                            \n\n\nEsta mensagem foi enviada a você pelo site
                            Antigomobilista.com.\nVocê está recebendo esta porque seu e-mail
                            foi cadastrado para acesso ao site.\n\nObservação: Nenhum
                            e-mail enviado pelo site possui arquivos anexados, solicita o
                            preenchimento de senhas ou solicita informações cadastrais.\n\n
                            Att,\nElton Ferrari<br />Desenvolvedor do sistema
                            Antigomobilista.\n\n";
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {

        header("Location: ../home/home.php");
    }
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="js/html5shiv.js"></script>
		<![endif]-->

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
		
		<title>Antigomobilista - Criar novo Usuário</title>
	</head>
    <body>
        <?php include '../../templates/menu.php';?>
        <div class="container">
            <div class="row">
                <div class="card-login col-sm-8 m-auto pt-4">                                           
                    <p class="text-center text-X-bg-azul p-2"><strong>O usuário <?= $email ?> foi cadastrado com sucesso no sistema.</strong></p>
                    <p class="text-center text-X-bg-vermelho p-2"><strong>Para sua segurança, foi enviada uma mensagem para sua caixa de e-mail.<br />
                                                                        Favor verificar e fazer a confirmação no mesmo, para continuar...</strong></p>
                </div>
            </div>
        </div>
        <?php
            include '../../templates/js-bootstrap.php'; 
        ?>
    </body>
</html>