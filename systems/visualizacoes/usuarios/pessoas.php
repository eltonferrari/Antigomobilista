<?php 
	include '../../controladores/autenticacao/validador_de_acesso.php';
	include '../../../bibliotecas/lib/util.php';
	
	// MENU ================================================================
	include '../../controladores/pontuacoes/class_pontuacoes.php';
	$usuario = new Usuarios();
	$nivel = new Usuarios();
	$porcentagem = new Pontuacoes();
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
	$dataCriacao = convertDataMySQL_DataPHP($createdAt);
	$horaCriacao = convertDataMySQL_HoraPHP($createdAt);
	$dataAlteracao = convertDataMySQL_DataPHP($updatedAt);
	$horaAlteracao = convertDataMySQL_HoraPHP($updatedAt); 
	$nivel = $nivel->getNivelByIdUser($_SESSION['id_user']);
	$porcentagem = $porcentagem->getPorcentagemById($_SESSION['id_user']);
	// =====================================================================
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
    <body id="wallpaper-2">
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
					<h1 class="font-dancing text-center font-size-28 negrito">Meu perfil </h1>
					<hr class="separador-branco">
					<div class="row">
						<div class="col-6 text-center">
							<img class="rounded" src="\<?= $foto ?>" alt="Foto Perfil" title="Foto Perfil">
						</div>
						<div class="col-6">
							<span class="negrito">Usuário nº: </span>
							<?= $id ?>
							<br />
							<span class="negrito"><?= $nome ?></span>
							<br />
							<span class="negrito"><?= $pontos ?></span> pontos
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
						<span class="negrito">Bairro: </span><?= $bairro ?>
						<br />
						<span class="negrito">Cidade: </span><?= $cidade ?>
						<br />
						<span class="negrito">Estado: </span><?= $estado ?>
						<br />
						<span class="negrito">Usuário </span><?= $ativo ?>
						<br />
						<span class="negrito">E-mail Confirmado? </span><?= $confirmEmail ?>
						<br />
					</div>
					<div class="font-size-14">
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