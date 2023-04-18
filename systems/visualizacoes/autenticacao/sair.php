<?php
    session_start();
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
		
		<title>Antigomobilista - Entrar</title>
	</head>
    <body>
        <?php include '../../templates/menu.php';?>
        <div class="container">    
            <div class="row">
                <div class="card-login col-sm-6 m-auto pt-5">
                    <div class="card">
                        <div class="card-header border border-primary">
                            <h3 class="text-center text-primary pt-2 negrito"><strong>Sair?</strong></h3>
                        </div>
                        <div class="card-body border border-primary pt-5">
                            <h5 class="text-danger text-center negrito">Tem certeza de que deseja sair?</h5>
                            <hr class="separador">
                            <div class="row">
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-danger" href="../../controladores/autenticacao/logoff.php">Sair</a>
                                </div>
                                <div class="col-md-6 text-center">
                                    <a class="btn btn-primary" href="../../visualizacoes/home/home.php">Voltar para Início</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            include '../../templates/js-bootstrap.php'; 
        ?>
    </body>
</html>