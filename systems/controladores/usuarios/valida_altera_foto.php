<?php
	session_start();
	include 'class_usuarios.php';
	date_default_timezone_set('America/Sao_Paulo');

	$idUser = $_POST['id_usuario'];
	$arquivo = $_FILES['imagem']['name'];
	
	echo $idUser;
	echo $arquivo;

	//Pasta onde o arquivo vai ser salvo
    $uploaddir = "../../../img/users/id_$idUser";     
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir);
    }
	$_UP['pasta'] = "../../../img/users/id_$idUser/";
	
	//Tamanho máximo do arquivo em Bytes
	$_UP['tamanho'] = 1024*1024*100; //5mb
	
	//Array com a extensões permitidas
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg');
	
	//Renomeiar
	$_UP['renomeia'] = false;
	
	//Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	
	//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
	if ($_FILES['imagem']['error'] != 0) {
		$msgAlteraImagem = "Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']];
		exit; //Para a execução do script
	}
	
	//Faz a verificação da extensao do arquivo
	$arquivo_up = $_FILES['imagem']['name'];
    $extensao = pathinfo($arquivo_up);
    $extensao = $extensao['extension'];
    if (array_search($extensao, $_UP['extensoes']) === false) {		
		$msgAlteraImagem = "A imagem não foi alterada - extensão inválida!";
	} else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
		$msgAlteraImagem = "Arquivo muito grande!";
	} else {
		$nome_final = "foto_perfil_id-$idUser.jpg";
		$updatedAt = new DateTime('now');
    	$dataAtual = $updatedAt->format('Y-m-d H:i:s');
		if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $nome_final)) {
			//Upload efetuado com sucesso, exibe a mensagem
			$insertImagem = new Usuarios();
			$insertImagem = $insertImagem->alteraImagemPerfil($_UP['pasta'].$nome_final, $dataAtual , $idUser);
			$msgAlteraImagem = "Imagem alterada com sucesso!";	
		} else {
			$msgAlteraImagem = "Imagem não alterada!";
		}
	}
	$_SESSION['msgAlteraImagem'] = $msgAlteraImagem;
?>
	<meta http-equiv="refresh" content="0;url=../../visualizacoes/usuarios/altera_foto.php?id_user=<?= $idUser ?>">
<?php
?>