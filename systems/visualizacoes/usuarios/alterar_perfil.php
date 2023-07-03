<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../controladores/estados/class_estados.php';
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

	$usuario = new Usuarios();
	$usuario = $usuario->getUsuarioById($_SESSION['id_user']);

	echo '===== USUÁRIO =====';
	echo '<pre>';
	print_r($usuario);
	echo '</pre>';

	foreach ($usuario as $user) {
		$id 					= $user['id'];
		$pontos 				= $user['pontos'];
		$nome 					= $user['nome'];
		$email 					= $user['email'];
		$telefone 				= $user['telefone'];
		$foto	 				= $user['imagem'];
		$endereco 				= $user['endereco'];
		$enderecoComplemento 	= $user['endereco_complemento'];
		$bairro 				= $user['bairro'];
		$cidade 				= $user['cidade'];
		$estado 				= $user['estado'];
		$tipo 					= $user['tipo'];
		$ativo 					= $user['ativo'];
		$confirmEmail 			= $user['confirm_email'];
		$createdAt 				= $user['created_at'];
		$updatedAt 				= $user['updated_at'];
	}

	$nomeEstado = new Estados();
	$nomeEstado = $nomeEstado->getNomeById($estado);
	$userAtivo = null;
	if ($ativo == 1) {
		$userAtivo = 'Ativo';
	} else {
		$userAtivo = 'Inativo';
	}
	if ($confirmEmail == 1) {
		$emailAtivo = 'Sim';
	} else {
		$emailAtivo = 'Não';
	}

	$dataCriacao = convertDataMySQL_DataPHP($createdAt);
	$horaCriacao = convertDataMySQL_HoraPHP($createdAt);
	$dataAlteracao = convertDataMySQL_DataPHP($updatedAt);
	$horaAlteracao = convertDataMySQL_HoraPHP($updatedAt);
	$usuarios = new Usuarios();
	$usuarios = $usuarios->getAllUsuarios();
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
		
		<title>Antigomobilista - Pessoas</title>
	</head>
    <body>
        <header>
			<?php include '../../../systems/templates/menu.php'; ?>
		</header>
		<section class="container">
			<div class="row mt-5">
				<div class="col-8 m-auto borda-redonda-20 blur-3 cor-branco">
					<div class="espaco"></div>
					<div class="row">
						<div class="col-3 text-center cor-branco">
							<h1 class="font-dancing font-size-28 negrito">Alterar perfil</h1>
						</div>
						<div class="col-9">
							<div class="row">
								<div class="col-2">
									<a href="altera_foto.php?id_user=<?= $id ?>">
										<img class="rounded-circle borda-branco" src="\<?= $foto ?>" alt="Foto Perfil" title="Alterar foto?" width="80">
									</a>
								</div>	
								<div class="col-10 cor-branco">
									<span class="negrito">Usuário nº: </span>
									<?= $id ?>
									<br />
									<form action="altera_nome.php?id_user=<?= $id ?>" method="post">
										<input class="font-dancing bg-cor-3 borda-redonda-10 cor-branco read-branco font-size-28 negrito d-in px-2" type="text" value="<?= $nome ?>" title="Alterar nome?">
										<button class="botao-altera-nome" type="submit">Salvar</button>
									</form>
									<span class="negrito"><?= $pontos ?></span> pontos
								</div>
							</div>
						</div>
					</div>
					<hr class="separador-branco">
					<form action="../../controladores/usuarios/valida_perfil.php" method="post">
						<div class="clearfix my-3">
							<div class="float-left">
								<span class="negrito font-size-20">E-mail: </span><?= $email ?>
							</div>
							<div class="float-right">
								<span class="negrito font-size-20">Telefone: </span><?= $telefone ?>
							</div>
						</div>
						<div class="clearfix my-3">
							<div class="float-left">
								<span class="negrito font-size-20">Endereço: </span><?= $endereco ?>
							</div>
							<div class="float-left">
								<span class="font-size-20 ml-2"> - compl.: </span><?= $enderecoComplemento ?>
							</div>
						</div>
						<div class="row clearfix my-3">
							<div class="col-4">
								<span class="negrito font-size-20">Bairro: </span><?= $bairro ?>
							</div>
							<div class="col-4 text-center">
								<span class="negrito font-size-20">Cidade: </span><?= $cidade ?>
							</div>
							<div class="col-4 text-right">
								<span class="negrito font-size-20">Estado: </span><?= $nomeEstado ?>
							</div>
						</div>
						<div class="clearfix my-3">
							<div class="float-left">
								<span class="negrito font-size-20">Usuário </span><?= $userAtivo ?>
							</div>
							<div class="float-right">
								<span class="negrito font-size-20">E-mail Confirmado? </span><?= $emailAtivo ?>
							</div>
						</div>
					</form>
					<hr class="separador-branco">
					<div class="clearfix font-size-14">
						<div class="float-left mb-3">
							Usuário criado em
							<span class="negrito"><?= $dataCriacao ?></span>
							às
							<span class="negrito"><?= $horaCriacao  ?></span>
						</div>
						<div class="float-right mb-3">
							Última alteração de perfil em
							<span class="negrito"><?= $dataAlteracao ?></span>
							às
							<span class="negrito"><?= $horaAlteracao ?>
						</div>
					</div>
				</div>
			</div>
        </section>
		<div class="pre-footer"></div>
		<footer>
			<?php include '../../templates/js-bootstrap.php'; ?>
		</footer>
    </body>
</html>