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
				<div class="col-5 borda-redonda-20 blur-3">
					<h1 class="font-dancing text-center cor-branco font-size-28 negrito mt-3">Pessoas</h1>
					<hr class="separador-branco">
					<div class="row">
						<div class="col-8">
							<h2 class="font-size-16 cor-branco negrito underline">Nome</h2>
						</div>
						<div class="col-4 text-center">
							<h2 class="font-size-16 cor-branco negrito underline">Criado em</h2>
						</div>
					</div>
					<?php
						foreach ($usuarios as $user) {
							$idUsers = $user['id'];
							$nomeUsers = $user['nome'];
							$created = $user['created_at'];
							$criado = convertDataMySQL_DataPHP($created);
					?>
							<div class="row">
								<div class="col-8">
									<a href="perfil.php?id_perfil=<?= $idUsers ?>" class="cor-branco">
										<p class="font-size-16 cor-branco">
											<?= $nomeUsers ?>
										</p>
									</a>
								</div>
								<div class="col-4 text-center">
									<a href="perfil.php?id_perfil=<?= $idUsers ?>" class="cor-branco">
										<p class="font-size-16 cor-branco">
											<?= $criado ?>
										</p>
									</a>
								</div>
							</div>
					<?php
						}
					?>
				</div>
				<div class="col-2"></div>
				<div class="col-5 borda-redonda-20 blur-3 cor-branco">
					<div class="espaco"></div>
					<div class="float-left">
						<h1 class="font-dancing text-center font-size-28 negrito d-in">Meu perfil</h1>
					</div>
					<div class="float-right">
						<a href="alterar_perfil.php?id_user=<?= $idUsuarioLogado ?>" title="Alterar perfil?">
							<img src="../../../img/icones/editar-branco.png" alt="Alterar perfil" width="30">
						</a>
					</div>
					<div class="espaco"></div>
					<div class="espaco"></div>
					<hr class="separador-branco">
					<div class="row">
						<div class="col-6 text-center">
							<img class="rounded-circle" src="\<?= $foto ?>" alt="Foto Perfil" title="Foto Perfil" width="80">
						</div>
						<div class="col-6">
							<span class="negrito">Usuário nº: </span>
							<?= $id ?>
							<br />
							<span class="negrito"><?= $nome ?></span>
							<br />
							
							<span class="negrito">Nível </span>
							<?= $nivel ?> - 
							<span class="negrito"><?= $pontos ?></span>
							pontos
						</div>
					</div>
					<hr class="separador-branco">
					<div>
						<span class="negrito">E-mail: </span><?= $email ?>
						<br />
						<span class="negrito">Telefone: </span><?= $telefone ?>
						<br />
						<span class="negrito">Endereço: </span><?= $endereco ?>
						<br />
						<span class="negrito">Complemento: </span><?= $enderecoComplemento ?>
						<br />
						<div>
							<div class="float-left">
								<span class="negrito">Bairro: </span><?= $bairro ?>
							</div>
							<div class="float-right">
								<span class="negrito">Cidade: </span><?= $cidade ?>
							</div>
						</div>
						<br />
						<div class="clearfix">
							<span class="negrito">Estado: </span><?= $nomeEstado ?>
							<br />
							<span class="negrito">Usuário </span><?= $userAtivo ?>
							<br />
							<span class="negrito">E-mail confirmado? </span><?= $emailAtivo ?>
						</div>
					</div>
					<div class="font-size-14 text-center">
						Usuário criado em
						<span class="negrito"><?= $dataCriacao ?></span>
						às
						<span class="negrito"><?= $horaCriacao  ?></span>
						<br />
						Última alteração de perfil em
						<span class="negrito"><?= $dataAlteracao ?></span>
						às
						<span class="negrito"><?= $horaAlteracao ?>
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