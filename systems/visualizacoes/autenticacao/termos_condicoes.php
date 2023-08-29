<?php
    session_start();
	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';
    
	// MENU ==========================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
    include '../../controladores/usuarios/class_usuarios.php';
	$idUsuarioLogado = $_SESSION['id_user'];
	$usuarioLogado = new Usuarios();
	$nivel = new Usuarios();
	$porcentagem = new Pontuacoes();
	$usuarioLogado = $usuarioLogado->getUsuarioById($idUsuarioLogado);
	$nivel = $nivel->getNivelByIdUser($idUsuarioLogado);
	$porcentagem = $porcentagem->getPorcentagemById($idUsuarioLogado);
	foreach ($usuarioLogado as $ul) {
		$nomeUsuarioLogado = $ul['nome'];
		$fotoUsuarioLogado = $ul['imagem'];
	}
	// ===============================================================
	echo '===== USUÁRIO =====';
	echo '<pre>';
	print_r($usuarioLogado);
	echo '</pre>';
    
    $idUser = $_SESSION['id_user'];
    $confirmacaoTermos = new Usuarios();
    $confirmacaoTermos = $confirmacaoTermos->getTermosCondicoesById($idUser);
    echo $confirmacaoTermos;
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
		
		<title>Antigomobilista - Termos e Condições</title>
	</head>
    <body>
        <header>
            <?php include '../../templates/menu.php';?>
        </header>
        <section class="container">
            <div class="row">
                <div class="col-sm-10 m-auto">
                    <div id="termos-condicoes">
                        <div id="titulo-termos" class="text-center">
                            <h1 class="cor-1">Termos e Condições de Serviço</h1>
                            
                                <?php 
                                    if (isset($_SESSION['mensagem'])) {
                                ?>
                                        <div class="alert alert-danger negrito borda-redonda-20">
                                <?php
                                            $msg = $_SESSION['mensagem'];
                                            echo $msg;
                                    }
                                    unset($_SESSION['mensagem']);
                                ?>
                            </div>
                        </div>
                        <div class="texto-termos">
                            <p>A Resolve Systems desenvolveu o site Antigomobilista para que as pessoas,
                                que gostam de veículos antigos, conectem-se umas com as outras, e portanto,
                                troquem informações, sobre o assunto. É também presente uma sessão de
                                anúncios de veículos e peças, que estão à venda.</p>
                        </div>
                    </div>
                </div>
            </div>            
        </section>
        <div class="container espaco-100"></div>
        <section id="aceite_termos" class="container text-center">
            <form action="../../controladores/autenticacao/valida_termos.php" method="post">
                <div class="row p-3">
                    <div class="col-7 m-auto">
                        <div class="row">
                            <div class="col-11 align-self-center pt-2">
                                <label for="aceite" class="negrito">
                                    LÍ E CONCORDO COM TODOS OS TERMOS E CONDIÇÕES DESCRITOS ACIMA
                                </label>
                            </div>
                            <div class="col-1 align-self-center text-left p-0">
                                <input type="checkbox" name="aceite" id="aceite" />                                    
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3 m-auto">
                                <button class="btn botao font-size-20" type="submit">Salvar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </section>
        <div class="espaco-100"></div>
        <?php
            include '../../templates/js-bootstrap.php'
        ?>
    </body>
</html>




