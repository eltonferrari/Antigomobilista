<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
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
					<h2 class="text-center cor-3 font-size-24 negrito borda-redonda-10 borda-branca mt-1">Adicionar novo Evento?</h2>
					<form action="../../controladores/eventos/valida_evento.php" method="post" enctype="multipart/form-data">
						<input type="hidden" name="id_usuario" value="<?= $idUsuarioLogado ?>">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text">Nome do evento:</span>
							</div>
							<input class="form-control" type="text" name="nome" id="nome" placeholder="Digite o nome do evento">
						</div>
						<div class="mt-2">
                            <label for="img-input" class="drop-container">
								Imagem/Cartaz
                                <input type="file" id="img-input" accept="image/*" name="imagem" required>
                            </label> 
                        </div>
                        <div id="img-container">
                            <img id="preview" src="" width="100">
                        </div>
						<div class="text-center">Início</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="data_inicio">Data:</label>
									<input class="form-control" type="date" name="data_inicio" id="data_inicio">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="hora_inicio">Hora:</label>
									<input class="form-control" type="time" name="hora_inicio" id="hora_inicio">
								</div>
							</div>
						</div>
						<div class="text-center">Final</div>
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for="data_inicio">Data:</label>
									<input class="form-control" type="date" name="data_inicio" id="data_inicio">
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="hora_inicio">Hora:</label>
									<input class="form-control" type="time" name="hora_inicio" id="hora_inicio">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="hora_inicio">Endereço:</label>
							<input class="form-control" type="text" name="hora_inicio" id="hora_inicio">
						</div>
						<div class="form-group">
							<label for="hora_inicio">Cidade:</label>
							<input class="form-control" type="time" name="hora_inicio" id="hora_inicio">
						</div>
						<div class="form-group">
							<label for="estados">Estados</label>
							<select class="form-control" id="estados">
								<option>Acre</option>
								<option>Alagoas</option>
								<option>Amapá</option>
								<option>...</option>
							</select>
						</div>
						<div class="form-group">
							<label for="mensagem">Descrição do contrato: </label>
							<textarea class="form-control borda-redonda-20 border border-primary p-2" 
										id="mensagem" 
										name="descricao" 
										rows="1"
										placeholder="Descreva o contrato aqui..." 
										maxlength="255"></textarea>
						</div>
						<div class="text-danger negrito" id="caracteres_restantes">255</div>
				
                           $autorizado

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