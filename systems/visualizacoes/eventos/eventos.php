<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/estados/class_estados.php';
	include '../../controladores/paises/class_paises.php';

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
		    <div class="row mt-3">
				<div class="col-4 text-center borda-redonda-20 blur-2">
					<h2 class="text-center font-size-24 negrito mt-1">Adicionar novo Evento?</h2>
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
							<select class="form-control borda-redonda-10" id="estado">
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
							<select class="form-control borda-redonda-10" id="pais">
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
						<div class="text-center" title="Requer autorização do Administrador">
							<input type="checkbox" name="autorizado" disabled>
							<span class="negrito ml-3">Autorizado?</span>
                        </div>
					</form>
				</div>
				<div class="col-7 text-center borda-redonda-20 blur-2 ml-3">
					<div class="row text-center cor-3 font-size-24 negrito">
						<div class="col-4 borda-redonda-10 borda-branca m-1">TODOS</div>
						<div class="col-4 borda-redonda-10 borda-branca m-1">PRÓXIMOS</div>
						<div class="col-4 borda-redonda-10 borda-branca m-1">ANTERIORES</div>
					</div>
					<div class="lista">

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