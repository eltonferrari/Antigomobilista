<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/eventos/class_eventos.php';
	include '../../controladores/estados/class_estados.php';
	include '../../controladores/paises/class_paises.php';
	include '../../../bibliotecas/lib/util.php';

	echo '===== SESSION =====';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';

    echo '===== GET =====';
	echo '<pre>';
	print_r($_GET);
	echo '</pre>';

    // MENU ==========================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
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
	
    $idEvento = $_GET['id'];
    $evento = new Eventos();
    $evento = $evento->getEventoById($idEvento);

    echo '===== EVENTO =====';
	echo '<pre>';
	print_r($evento);
	echo '</pre>';

    foreach ($evento as $e) {
		$id 			= $e['id'];
        $imagem 		= $e['imagem'];
        $nome 			= $e['nome'];
        $dataHoraInicio = $e['data_hora_inicio'];
        $dataHoraFim 	= $e['data_hora_fim'];
        $endereco 		= $e['endereco'];
		$bairro 		= $e['bairro'];
		$cidade 		= $e['cidade'];
		$idEstado 		= $e['id_estado'];
		$idPais 		= $e['id_pais'];
		$descricao 		= $e['descricao'];
        $dataInicio 	= convertDataMySQL_DataPHP($dataHoraInicio);
        $horaInicio 	= convertDataMySQL_HoraPHP($dataHoraInicio);
        $dataFim 		= convertDataMySQL_DataPHP($dataHoraFim);
        $horaFim 		= convertDataMySQL_HoraPHP($dataHoraFim);
    }
	
    $estado = new Estados();
	$estado = $estado->getNomeById($idEstado);
	
    $pais = new Paises();
	$pais = $pais->getNomeById($idPais);
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
        <link rel="icon" href="../../../img/logo/antigomobilista_logo-icon.png" type="image/x-icon">
		
		<title>Antigomobilista - Home</title>
	</head>
    <body>
		<header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
        <section class="container">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-10">
					<div class="titulo">
						<h1 class="text-center cor-1 font-size-32 negrito">Evento</h1>
					</div>
				</div>
				<div class="col-1 pt-5">
					<a href="alterar_evento.php?id=<?= $id ?>">
						<img src="../../../img/icones/editar-cor-1.png" alt="Alterar evento?" title="Alterar Evento?" width="30">
					</a>
				</div>
			</div>
		    <div class="row mt-1">
				<div class="col-9 m-auto">
					<div class="text-center p-3">
                        <img class="borda-cor3 borda-redonda-10 borda-cor1 sombra-imagem-evento" src="<?= $imagem ?>" width="100%">
					</div>
					<div class="text-center mt-3">
                        <h2 class="cor-1 font-size-28">" <?= $nome ?> "</h2>
                    </div>
                    <div class="text-center cor-3 font-size-24 mt-1">                            
                        <?php
                            if ($dataInicio == $dataFim) {
                        ?>
                                <span class="py-2">Dia </span>
                                <span class="py-2 negrito"><?= $dataInicio ?></span>
                                <span class="py-2"> das </span>
                                <span class="py-2 negrito"><?= $horaInicio ?></span>
                                <span class="py-2"> às </span>
                                <span class="py-2 negrito"><?= $horaFim ?></span>
                        <?php
                            } else {
                        ?>
                                <span class="py-2">De </span>
                                <span class="py-2 negrito"><?= $dataInicio ?></span>
                                <span class="py-2">à </span>
                                <span class="py-2 negrito"><?= $dataFim ?></span>												 
                        <?php
                            }
                        ?>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="text-center font-size-20 mt-3">
                                <span class="cor-1 negrito">Endereço:</span>
                                <p class="cor-3"><?= $endereco ?></p>
							</div>
                        </div>
                        <div class="col-4">
							<div class="text-center font-size-20 mt-3">
                                <span class="cor-1 negrito">Bairro:</span>
                                <p class="cor-3"><?= $bairro ?></p>
							</div>
						</div>
                        <div class="col-4">
							<div class="text-center font-size-20 mt-3">
                                <span class="cor-1 negrito">Cidade:</span>
                                <p class="cor-3"><?= $cidade ?></p>
							</div>
						</div>
                    </div>
					<div class="row">
                        <div class="col-6">
                            <div class="text-center font-size-20 mt-3">
                                <span class="cor-1 negrito">Estado:</span>
                                <p class="cor-3"><?= $estado ?></p>
							</div>
                        </div>
                        <div class="col-6">
							<div class="text-center font-size-20 mt-3">
                                <span class="cor-1 negrito">País:</span>
                                <p class="cor-3"><?= $pais ?></p>
							</div>
						</div>
                    </div>
					<div class="row">
						<div class="col-8 m-auto text-center font-size-20 p-1">
							<span class="cor-1 negrito">Descrição do evento:</span>
							<p class="cor-3 borda-cor1 borda-redonda-10"><?= $descricao ?></p>
						</div>
					</div>
				</div>				
			</div>
        </section>
		<section class="espaco-4x"></section>
		<footer>
	        <?php include '../../templates/js-bootstrap.php'; ?>
		</footer>
    </body>
</html>