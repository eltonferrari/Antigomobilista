<?php 
    session_start();
	include '../../controladores/usuarios/class_usuarios.php';
	include '../../../bibliotecas/lib/util.php';
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
    
    $idUser = $_SESSION['id_user'];
    $email = new Usuarios();
    $email = $email->getEmailById($idUser);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<!-- Required meta tags -->
		<meta charset="UTF-8">
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
		<link rel="stylesheet" href="../../../assets/css/style.css">
		
		<!-- JAVASCRIPT CUSTOMIZADO -->
		<script src="../../../assets/js/script.js"></script>

		<!-- add icon link -->
        <link rel="icon" href="../../../img/logo/antigomobilista_logo.png" type="image/x-icon">
		
		<title>Antigomobilista - Criar novo Usuário</title>
	</head>
    <body>
        <header>
            <?php include '../../templates/menu.php';?>
        </header>
        <section class="container">
            <div class="row">
                <div class="card-login col-sm-8 m-auto pt-4">                                           
					<div class="text-center">
						<h1 class="cor-1">Confirmação de E-mail</h1>
						<div class="alert alert-danger borda-redonda-20">
							Para sua segurança precisamos confirmar seu e-mail <strong><?= $email ?></strong>
							<br />
							Por favor verifique sua caixa de eentrada do referido endereço de e-mail
							 e siga as instruçoes que enviamos para você.
							<br />
							Clique no botão abaixo autorizando o envio do e-mail de confirmação para você!
							<br />
							<span class="font-size-22 negrito">Após a confirmação entre novamente no sistema</span>
						</div>
						<div id="botao-confirmacao" class="p-5">
							<a class="btn btn-outline-success borda-redonda-20 font-size-22 negrito px-5 py-3" href="../../controladores/autenticacao/envia-email.php">Autorizo a enviar-me o e-mail de confirmação</a>
						</div>
						
					</div>
                </div>
            </div>
        </section>
        <footer>
            <?php
                include '../../templates/js-bootstrap.php';
            ?>
        </footer>
    </body>
</html>