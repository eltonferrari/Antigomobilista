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
						<h1 class="text-center cor-1 font-size-32 negrito">Alterar Evento</h1>
					</div>
				</div>
			</div>
		    <div class="row mt-1">
				<div class="col-10 m-auto">
                    <form name="form-imagem" action="../../controladores/eventos/valida_imagem.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
                        <div class="mt-2 text-center">
                            <label for="img-input" class="drop-container">
                                <span class="negrito">
                                    <span class="text-danger mr-2">
                                        *
                                    </span>
                                    Imagem/Cartaz
                                </span>
                                <input class="borda-redonda-10" type="file" id="img-input" accept="image/*" name="imagem" required />
                            </label> 
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <div class="text-center p-3">
                                    <img class="borda-cor3 borda-redonda-10 borda-cor1" src="<?= $imagem ?>" width="100%">
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <div class="espaco-4x"></div>
                                <p class="d-in text-center cor-1">
                                    Trocar imagem?
                                </p>
                                <img src="../../../img/icones/seta_direita.png" alt="Alterar?">
                            </div>
                            <div class="col-5 text-center p-3" id="img-container">
                                <img class="borda-cor3 borda-redonda-10 borda-cor1" id="preview" src="" width="100%">
                            </div>
                        </div>
                    </form>
                    <form name="form-dados-evento" action="../../controladores/eventos/altera_evento.php?id=<?= $id ?>" method="post">
                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text borda-redonda-10-left bg-branco negrito">
                                            <span class="text-danger mr-2">
                                                *
                                            </span>
                                            Nome do evento:
                                        </span>		
                                    </div>
                                    <input class="form-control borda-redonda-10-right" type="text" name="nome" id="nome" placeholder="Digite o nome do evento" value="<?= $nome ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 m-auto">
                                <div class="text-center negrito">
                                    <span class="text-danger mr-2">
                                        *
                                    </span>
                                    Início
                                </div>
							    <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="negrito" for="data_inicio">Data:</label>
                                            <input class="form-control borda-redonda-10" type="date" name="data_inicio" id="data_inicio" value="<?= $dataInicio ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label class="negrito" for="hora_inicio">Hora:</label>
                                            <input class="form-control borda-redonda-10" type="time" name="hora_inicio" id="hora_inicio" value="<?= $horaInicio ?>" required>
                                        </div>
                                    </div>
                                </div>
							    <div class="text-center negrito">
                                    <span class="text-danger mr-2">
                                        *
                                    </span>
                                    Final
                                </div>
                                <div class="row">
    								<div class="col-6">
									    <div class="form-group">
    										<label class="negrito" for="data_inicio">Data:</label>
	    									<input class="form-control borda-redonda-10" type="date" name="data_final" id="data_final" value="<?= $dataFim ?>" required>
		    							</div>
							    	</div>
								    <div class="col-6">
									    <div class="form-group">
										    <label class="negrito" for="hora_final">Hora:</label>
    										<input class="form-control borda-redonda-10" type="time" name="hora_final" id="hora_final" value="<?= $horaFim ?>"required>
	    								</div>
			    					</div>
				    			</div>
					    		<div class="form-group">
						    		<label class="negrito" for="endereco"><span class="text-danger mr-2">*</span>Endereço:</label>
							    	<input class="form-control borda-redonda-10" type="text" name="endereco" id="endereco" value="<?= $endereco ?>" required>
    							</div>
                                <div class="row">
    								<div class="col-6">
                                        <div class="form-group">
                                            <label class="negrito" for="bairro"><span class="text-danger mr-2">*</span>Bairro:</label>
                                            <input class="form-control borda-redonda-10" type="text" name="bairro" id="bairro" required>
                                        </div>
                                    </div>
    								<div class="col-6">
                                        <div class="form-group">
                                            <label class="negrito" for="cidade"><span class="text-danger mr-2">*</span>Cidade:</label>
                                            <input class="form-control borda-redonda-10" type="text" name="cidade" id="cidade" required>
                                        </div>
                                    </div>
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
                            </div>                        
                        </div>
					</form>
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