<?php 
    session_start();
    echo '<pre>';
        print_r($_SESSION);
    echo '</pre>';
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
                <div class="col-sm-3"></div>
                <div class="card-login col-sm-6 pt-4">
                    <div class="card">
                        <div class="card-header border border-primary">
                            <h3 class="text-center text-primary"><strong>Criar novo Usuário</strong></h3>
                            <?php
                                if (isset($_SESSION['mensagem'])) {
                                    $msgUserExist = $_SESSION['mensagem'];
                            ?>
                                    <h6 class="text-danger text-center"><strong><?= $msgUserExist ?></strong></h6>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="card-body border border-primary">
                            <form action="../../controladores/autenticacao/valida_registro.php" method="post">
                                <div class="form-group">
                                    <input type="text" name="nome" class="form-control border border-primary" placeholder="Nome" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control border border-primary" placeholder="E-mail" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="senha" class="form-control border border-primary" placeholder="Senha" required>
                                </div>
                                <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
        <?php
            include '../../templates/js-bootstrap.php'; 
        ?>
    </body>
</html>