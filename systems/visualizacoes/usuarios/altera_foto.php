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
    

    $idUsuario = $_GET['id'];
    $foto = new Usuarios();
    $foto = $foto->getImagemById($idUsuario);
?>
<!doctype html>
<html lang="pt-br">
    <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- COMPATIBILIDADE COM HTML5 -->
		<!--[if lt IE 9]>
			<script src="../../../js/html5shiv.js"></script>
		<![endif]-->
        <script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', 'G-2XS66KFNYE');
		</script>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="../../../assets/Bootstrap4/css/bootstrap.min.css">

		<!-- NORMALIZE CSS -->
		<link   rel="stylesheet" type="text/css" href="../../../assets/css/normalize.css">

		<!-- CSS CUSTOMIZADO -->
		<link rel="stylesheet" type="text/css" href="../../../assets/css/style.css">
        <link rel="icon" href="../../../img/logos/logo.png" type="image/x-icon">
		<title>RS - Resolve Systems</title>
	</head>
    <body>
        <header>
            <?php include '../../templates/menu.php'; ?>
        </header>
        <section class="container mb-5">    
            <h1 class="cor-3 text-center negrito">Alterar foto do perfil</h1>
            <div class="row">
                <div class="col-2"></div>
                <div class="col-4 text-center">
                    <h2 class="cor-1 negrito">Foto atual</h2>    
                    <img class="pr-4" src="\<?= $foto ?>" alt="Foto Perfil" title="Foto atual" width="100">
                </div>
                <div class="col-4 text-center">
                    <!-- Upload Image -->
                    <h2 class="cor-1 negrito"> Carregar nova foto</h2>
                    <form method="POST" action="../../controladores/usuarios/valida_altera_foto.php" enctype="multipart/form-data">
                        <input type="hidden" name="id_usuario" value="<?= $idUsuario ?>">
                        <div class="mt-2">
                            <label for="img-input">
                                <input type="file" id="img-input" accept="image/*" name="imagem" required>
                            </label> 
                        </div>
                        <div id="img-container">
                            <img id="preview" src="" width="100">
                        </div>
                        <button class="botao-altera-foto mt-2" type="submit">
                            Alterar
                        </button>
                    </form>
                    <!-- Fim Upload Image -->
                </div>
                <div class="col-2"></div>
            </div>
        </section>
        <div class="espaco-pre-footer"></div>
        <?php
            include '../../templates/js-bootstrap.php'; 
        ?>
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