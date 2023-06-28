<?php 
    session_start();
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
		
		<title>Antigomobilista - Registrar-se</title>
	</head>
    <body>
        <header>
            <?php include '../../templates/menu.php';?>
        </header>
        <section class="container">    
            <div class="row">
                <div class="col-sm-6 m-auto">
                    <div class="borda-card-reader">
                        <h1 class="text-center cor-1 negrito">Criar novo Usuário</h1>
                    </div>
                    <div class="borda-card-body px-5 py-3">
                        <form action="../../controladores/autenticacao/valida_registro.php" method="post">
                            <div class="form-group">
                                <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha" required>
                            </div>
                            <button class="btn btn-lg btn-block botao letra-branca" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>            
        </section>
        </div>
        <footer>
            <?php
                include '../../templates/js-bootstrap.php'; 
            ?>
        </footer>
    </body>
</html>