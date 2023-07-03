<?php
    include '../../controladores/autenticacao/validador_de_acesso.php';

    // MENU ================================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
	$usuario = new Usuarios();
	$nivel = new Usuarios();
	$porcentagem = new Pontuacoes();
	$usuario = $usuario->getUsuarioById($_SESSION['id_user']);
	foreach ($usuario as $user) {
		$nome = $user['nome'];
		$pontos = $user['pontos'];
	}
	$nivel = $nivel->getNivelByIdUser($_SESSION['id_user']);
	$porcentagem = $porcentagem->getPorcentagemById($_SESSION['id_user']);
	// =====================================================================
?>
<!DOCTYPE html>
<html lang="pt-BR">
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
		
		<title>Antigomobilista - Sair</title>
	</head>
    <body id="wallpaper-sair">
        <header>
            <?php include '../../templates/menu.php';?>
        </header>
        <section class="container">    
            <div class="row">
                <div class="col-sm-6 m-auto pt-5">
                    <div class="borda-card-reader blur">
                        <h3 class="text-center cor-1 p-4 negrito"><strong>Sair?</strong></h3>
                    </div>
                    <div class="borda-card-body pt-5 blur">
                        <h5 class="text-danger text-center negrito">Tem certeza de que deseja sair?</h5>
                        <hr class="separador">
                        <div class="row">
                            <div class="col-md-6 text-center my-4">
                                <a class="botao-vermelho sair borda-redonda-10 negrito link-sem-sobrescrito" href="../../controladores/autenticacao/logoff.php">Sair</a>
                            </div>
                            <div class="col-md-6 text-center my-4">
                                <a class="botao px-3 py-2 borda-redonda-10 negrito link-sem-sobrescrito" href="../../visualizacoes/home/home.php">Voltar para Início</a>
                            </div>
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