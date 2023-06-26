<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	
	// MENU ================================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
	$usuario = new Usuarios();
	$nivel = new Usuarios();
	$porcentagem = new Pontuacoes();
	$usuario = $usuario->getUsuarioById($_SESSION['id_logado']);
	foreach ($usuario as $user) {
		$nome = $user['nome'];
		$pontos = $user['pontos'];
	}
	$nivel = $nivel->getNivelByIdUser($_SESSION['id_logado']);
	$porcentagem = $porcentagem->getPorcentagemById($_SESSION['id_logado']);
	// =====================================================================

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
		
		<!-- add icon link -->
        <link rel="icon" href="../../../img/logo/antigomobilista_logo.png" type="image/x-icon">
		
		<title>Antigomobilista - Home</title>
	</head>
    <body>
        <header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
		<section class="container">
            <div class="row">
                <div class="col-md-4 m-auto">
                    <a class="cor-2 text-center link-sem-sobrescrito" href="perfil.php"><h3 class="negrito">Seu perfil</h3></a>
                </div>
            </div>
		    <div class="d-flex flex-wrap">

            </div>
        </section>        
        <?php include '../../templates/js-bootstrap.php'; ?>
    </body>
</html>