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
	$lista = new Eventos();
	$nomeLista = null;
	if (isset($_GET['eventos'])) {
		$tipoLista = $_GET['eventos'];
		$lista = new Eventos();
		switch ($tipoLista) {
			case 'all':
				$lista = $lista->getAllEventosUserById($idUsuarioLogado);
				$nomeLista = "Todos os eventos de $nomeUsuarioLogado";
				break;

			case 'next':
				$lista = $lista->getNextEventosUserById($idUsuarioLogado);
				$nomeLista = "Próximos eventos de $nomeUsuarioLogado";
				break;

			case 'prev':
				$lista = $lista->getPrevEventosUserById($idUsuarioLogado);
				$nomeLista = "Eventos finalizados de $nomeUsuarioLogado";
				break;
		}
	}
	echo '===== LISTA =====';
	echo '<pre>';
	print_r($lista);
	echo '</pre>';


	$estados = new Estados();
	$estados = $estados->getAllEstados();
	$brasil = new Paises();
	$brasil = $brasil->getBrasil();
	foreach ($brasil as $br) {
		$idBrasil = $br['id'];
		$nomeBrasil = $br['nome'];
	}
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
				<h1 class="text-center cor-1 font-size-28 negrito">Eventos</h1>
			</div>
		    <div class="row mt-3 preenchimento">
				<div class="col-5">
					<div class=" text-center borda-redonda-20 blur-2 px-3 py-1">
						<h2 class="text-center font-size-24 negrito mt-1 borda-redonda-10 bg-branco p-1 mt-3 cor-1">Adicionar novo Evento?</h2>
						<?php
								if (isset($_SESSION['msgAdicionaEvento'])) {
									$msgAdicionaEvento = $_SESSION['msgAdicionaEvento'];
							?>
									<h6 class="text-danger">(<?= $msgAdicionaEvento ?>)</h6>
							<?php 
									unset($_SESSION['msgAdicionaEvento']);
								}
							?>
						<span class="text-danger font-size-28">* </span>
						<span class="font-size-16"> - Preenchimento obrigatório</span>
						<hr class="separador-branco">
						<form action="../../controladores/eventos/valida_evento.php" method="post" enctype="multipart/form-data">
							<input type="hidden" name="id_usuario" value="<?= $idUsuarioLogado ?>">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text borda-redonda-10-left bg-branco negrito"><span class="text-danger mr-2">*</span>Nome do evento:</span>		
								</div>
								<input class="form-control borda-redonda-10-right" type="text" name="nome" id="nome" placeholder="Digite o nome do evento">
							</div>
							<div class="mt-2">
								<label for="img-input" class="drop-container">
									<span class="negrito"><span class="text-danger mr-2">*</span>Imagem/Cartaz</span>
									<input class="borda-redonda-10" type="file" id="img-input" accept="image/*" name="imagem" required>
								</label> 
							</div>
							<div id="img-container">
								<img id="preview" src="" width="100%">
							</div>
							<div class="text-center negrito"><span class="text-danger mr-2">*</span>Início</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label class="negrito" for="data_inicio">Data:</label>
										<input class="form-control borda-redonda-10" type="date" name="data_inicio" id="data_inicio" required>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="negrito" for="hora_inicio">Hora:</label>
										<input class="form-control borda-redonda-10" type="time" name="hora_inicio" id="hora_inicio" required>
									</div>
								</div>
							</div>
							<div class="text-center negrito"><span class="text-danger mr-2">*</span>Final</div>
							<div class="row">
								<div class="col-6">
									<div class="form-group">
										<label class="negrito" for="data_inicio">Data:</label>
										<input class="form-control borda-redonda-10" type="date" name="data_final" id="data_final" required>
									</div>
								</div>
								<div class="col-6">
									<div class="form-group">
										<label class="negrito" for="hora_final">Hora:</label>
										<input class="form-control borda-redonda-10" type="time" name="hora_final" id="hora_final" required>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label class="negrito" for="endereco"><span class="text-danger mr-2">*</span>Endereço:</label>
								<input class="form-control borda-redonda-10" type="text" name="endereco" id="endereco" required>
							</div>
							<div class="form-group">
								<label class="negrito" for="bairro"><span class="text-danger mr-2">*</span>Bairro:</label>
								<input class="form-control borda-redonda-10" type="text" name="bairro" id="bairro" required>
							</div>
							<div class="form-group">
								<label class="negrito" for="cidade"><span class="text-danger mr-2">*</span>Cidade:</label>
								<input class="form-control borda-redonda-10" type="text" name="cidade" id="cidade" required>
							</div>
							<div class="form-group">
								<label class="negrito" for="estado">Estado</label>
								<select class="form-control borda-redonda-10" id="estado" name="estado">
									<option>Selecione o estado</option>
									<?php 
										foreach ($estados as $estado) {
											$idEstado = $estado['id'];
											$nomeEstado = $estado['nome'];
											$siglaEstado = $estado['sigla'];
									?>
											<option value="<?= $idEstado ?>"><?= $siglaEstado ?> - <?= $nomeEstado ?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<label class="negrito" for="pais">País</label>
								<select class="form-control borda-redonda-10" id="pais" name="pais">
									<option value=<?= $idBrasil ?>><?= $nomeBrasil ?></option>
									<?php 
										foreach ($paises as $pais) {
											$idPais = $pais['id'];
											$nomePais = $pais['nome'];
									?>
											<option value="<?= $idPais ?>"><?= $nomePais ?></option>
									<?php
										}
									?>
								</select>
							</div>
							<div class="text-area">
								<div class="form-group">
									<label class="negrito" for="mensagem">Descrição do evento:</label>
									<textarea class="form-control borda-redonda-10 p-2" 
												id="mensagem" 
												name="descricao" 
												rows="1"
												placeholder="Descreva o evento aqui..." 
												maxlength="255"></textarea>
								</div>
								<div class="text-danger negrito d-in" id="caracteres_restantes">255</div>
								<span class="text-danger negrito">/255</span>
							</div>
							<div class="row">
								<div class="col-6 text-center p-2" title="Requer autorização do Administrador">
									<input type="checkbox" name="autorizado" disabled>
									<span class="negrito ml-3">Autorizado?</span>
								</div>
								<div class="col-6">
									<button class="botao borda-branca" type="submit">Salvar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-6 ml-5">
					<div class="borda-redonda-20 blur-2 px-3 py-1">
						<h2 class="text-center font-size-24 negrito borda-redonda-10 bg-branco mt-3 p-1 cor-1"><?= $nomeLista ?></h2>
						<div class="row justify-content-between borda-redonda-10 bg-branco mt-3 mx-1 p-2">
								<!-- LOGO -->
								<div class="text-left">
									<img src="\img/logo/antigomobilista_logo.png" width="50">
								</div>
								<!-- NAVEGAÇÃO -->
								<div class="text-center">
									<a class="font-size-20 negrito link-sem-sobrescrito menu-eventos-item p-2" href="eventos.php?eventos=prev">
										<svg xmlns="http://www.w3.org/2000/svg" 
											viewBox="0 0 24 24" 
											width="25" 
											height="25" 
											transform="matrix(-1, 0, 0, 1, 0, 0)">
											<path d="M13.1,19.5a1.5,1.5,0,0,1-1.061-2.561l4.586-4.585a.5.5,0,0,0,0-.708L12.043,7.061a1.5,1.5,0,0,1,2.121-2.122L18.75,9.525a3.505,3.505,0,0,1,0,4.95l-4.586,4.586A1.5,1.5,0,0,1,13.1,19.5Z" />
											<path d="M6.1,19.5a1.5,1.5,0,0,1-1.061-2.561L9.982,12,5.043,7.061A1.5,1.5,0,0,1,7.164,4.939l6,6a1.5,1.5,0,0,1,0,2.122l-6,6A1.5,1.5,0,0,1,6.1,19.5Z" />
										</svg>
										Anteriores
									</a>
								</div>
								<div class="text-center">
									<a class="font-size-20 negrito link-sem-sobrescrito menu-eventos-item p-2" href="eventos.php?eventos=all">Todos</a>
								</div>
								<div class="text-center">
									<a class="font-size-20 negrito link-sem-sobrescrito menu-eventos-item p-2" href="eventos.php?eventos=next">
										Próximos
										<svg xmlns="http://www.w3.org/2000/svg" 
											viewBox="0 0 24 24" 
											width="25" 
											height="25" 
											transform="matrix(1, 0, 0, 1, 0, 0)">
											<path d="M13.1,19.5a1.5,1.5,0,0,1-1.061-2.561l4.586-4.585a.5.5,0,0,0,0-.708L12.043,7.061a1.5,1.5,0,0,1,2.121-2.122L18.75,9.525a3.505,3.505,0,0,1,0,4.95l-4.586,4.586A1.5,1.5,0,0,1,13.1,19.5Z" />
											<path d="M6.1,19.5a1.5,1.5,0,0,1-1.061-2.561L9.982,12,5.043,7.061A1.5,1.5,0,0,1,7.164,4.939l6,6a1.5,1.5,0,0,1,0,2.122l-6,6A1.5,1.5,0,0,1,6.1,19.5Z" />
										</svg>
									</a>
								</div>
								<!-- LOGO -->
								<div class="text-right">
									<img src="\img/logo/antigomobilista_logo_invertido.png" width="50">
								</div>
						</div>
						<div class="lista">
							<?php
								foreach ($lista as $l) {
									$id 	= $l['id'];
									$imagem = $l['imagem'];
									$nome 	= $l['nome'];
									$dataHoraInicio = $l['data_hora_inicio'];
									$dataHoraFim = $l['data_hora_fim'];
									$dataInicio = convertDataMySQL_DataPHP($dataHoraInicio);
									$horaInicio = convertDataMySQL_HoraPHP($dataHoraInicio);
									$dataFim = convertDataMySQL_DataPHP($dataHoraFim);
									$horaFim = convertDataMySQL_HoraPHP($dataHoraFim);
							?>
									<hr class="separador-branco my-3">
									<a class="link-sem-sobrescrito" href="visualiza_evento.php?id=<?= $id ?>">
										<img class="borda-redonda-20 borda-branco" src="<?= $imagem ?>" alt="Foto do evento" width="100%">
										<div class="text-center bg-branco borda-redonda-10 mt-3">
											<span class="cor-1 p-2 negrito"><?= $nome ?></span>
											<br />
							<?php
												if ($dataInicio == $dataFim) {
							?>
													<span class="cor-1 py-2">Dia </span>
													<span class="cor-1 py-2 negrito"><?= $dataInicio ?></span>
													<span class="cor-1 py-2"> das </span>
													<span class="cor-1 py-2 negrito"><?= $horaInicio ?></span>
													<span class="cor-1 py-2"> às </span>
													<span class="cor-1 py-2 negrito"><?= $horaFim ?></span>
							<?php
												} else {
							?>
													<span class="cor-1 py-2">De </span>
													<span class="cor-1 py-2 negrito"><?= $dataInicio ?></span>
													<span class="cor-1 py-2">à </span>
													<span class="cor-1 py-2 negrito"><?= $dataFim ?></span>												 
							<?php
												}
							?>
										</div>
									</a>
							<?php
								}
							?>
							<div class="espaco"></div>
						</div>
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