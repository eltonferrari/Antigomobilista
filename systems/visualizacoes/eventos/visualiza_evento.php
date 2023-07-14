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
        $imagem = $e['imagem'];
        $nome = $e['nome'];
        $dataHoraInicio = $e['data_hora_inicio'];
        $dataHoraFim = $e['data_hora_fim'];
        $endereco = $e['endereco'];
        $dataInicio = convertDataMySQL_DataPHP($dataHoraInicio);
        $horaInicio = convertDataMySQL_HoraPHP($dataHoraInicio);
        $dataFim = convertDataMySQL_DataPHP($dataHoraFim);
        $horaFim = convertDataMySQL_HoraPHP($dataHoraFim);
    }
	
    $estados = new Estados();
	$estados = $estados->getAllEstados();
	
    $paises = new Paises();
	$paises = $paises->getAllPaises();
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
		
		<title>Antigomobilista - Home</title>
	</head>
    <body>
		<header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
        <section class="container">
			<div class="titulo">
				<h1 class="text-center cor-1 font-size-32 negrito">Evento</h1>
			</div>
		    <div class="row mt-1">
				<div class="col-9 m-auto">
					<div class="text-center borda-redonda-20 p-3">
                        <img class="borda-cor3 borda-redonda-10 sombra-imagem-evento" src="<?= $imagem ?>" width="100%">
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
                            <div class="text-center font-size-24 mt-3">
                                <span class="cor-1 negrito">Endereço:</span>
                                <p class="cor-3"><?= $endereco ?></p>
							</div>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-4"></div>
                    </div>


							<div class="form-group">
								<label class="negrito" for="bairro"><span class="text-danger mr-2">*</span>Bairro:</label>
							</div>
							<div class="form-group">
								<label class="negrito" for="cidade"><span class="text-danger mr-2">*</span>Cidade:</label>
							</div>
							<div class="form-group">
								<label class="negrito" for="estado">Estado</label>
							</div>
							<div class="form-group">
								<label class="negrito" for="pais">País</label>
							</div>
							<div class="text-area">
								<div class="form-group">
									<label class="negrito" for="mensagem">Descrição do evento:</label>
								</div>
							</div>
							<div class="row">
								<div class="col-6 text-center p-2" title="Requer autorização do Administrador">
							</div>
						</form>
					</div>
				</div>				
			</div>
        </section>
		<section class="espaco-4x"></section>
		<footer>
	        <?php include '../../templates/js-bootstrap.php'; ?>
		</footer>
		<script>
            // Preview de imagem
            function readImage() {
                if (this.files && this.files[0]) {
                    var file = new FileReader();
                    file.onload = function(e) {
                        document.getElementById("preview").src = e.target.result;
                    };       
                    file.readAsDataURL(this.files[0]);
                }
            }
            document.getElementById("img-input").addEventListener("change", readImage, false);
        </script>
    </body>
</html>