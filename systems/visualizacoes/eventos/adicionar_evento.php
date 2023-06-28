<?php 
include '../../controladores/autenticacao/validador_de_acesso.php';
include '../../controladores/eventos/class_eventos.php';
include '../../controladores/usuarios/class_usuarios.php';
echo '===== SESSION =====';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
$idUsuario = $_SESSION['id_logado'];
$usuario = new Usuarios();
$usuario = $usuario->getNomeById($idUsuario);
echo $usuario;

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
        <?php include '../../../systems/templates/menu.php'; ?>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-3">
                    <h4 class="text-primary text-center negrito">Quem informa?</h4>
                    Foto
                    <br />
                    <?= $usuario ?>
                </div>
                <div class="col-md-9">
                    <h2 class="text-primary text-center negrito">Adicionar Evento</h2>
                    <form action="../../controladores/eventos/valida_evento.php" method="post">
                        <input type="hidden" name="id_usuario" value="<?= $idUsuario ?>">
                        <label for="nome">Nome do Evento: </label>
                        <input type="text" name="nome" id="nome">
                        
                    </form>
                    $nome,
                    $data,
                    $endereco,
                    $cidade,
                    $idEstado,
                    $descricao,
                    $imagem,
                    $autorizado
                </div>
            </div>
        </div>        
        <?php include '../../templates/js-bootstrap.php'; ?>
    </body>
</html>