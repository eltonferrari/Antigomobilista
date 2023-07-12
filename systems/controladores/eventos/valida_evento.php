<?php
    session_start();
    include 'class_eventos.php';

    echo '===== SESSION =====';
    echo '<pre>';
    print_r($_SESSION);
    echo '</pre>';

    echo '===== POST =====';
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    echo '===== FILE =====';
    echo '<pre>';
    print_r($_FILES);
    echo '</pre>';

    $idUser         = $_POST['id_usuario'];
    $nome           = $_POST['nome'];
    $dataHoraInicio = $_POST['data_inicio'] . ' ' . $_POST['hora_inicio'] . ':00';
    $dataHoraFinal  = $_POST['data_final'] . ' ' . $_POST['hora_final'] . ':00';
    $endereco       = $_POST['endereco'];
    $bairro         = $_POST['bairro'];
    $cidade         = $_POST['cidade'];
    $estado         = $_POST['estado'];
    $pais           = $_POST['pais'];
    $descricao      = $_POST['descricao'];
    $imagem         = $_FILES['imagem']['name'];
    $num = new Eventos();
    $num = $num->getNumeroEventosUsuario($idUser);

    //Pasta onde a imagem vai ser salvo
    $uploaddir = "../../../img/eventos/users/id_$idUser";     
    // Se pasta não existir, cria a pasta
    if (!is_dir($uploaddir)) {
        mkdir($uploaddir);
    }
	$_UP['pasta'] = "\img/eventos/users/id_$idUser/";
	
	//Tamanho máximo do arquivo em Bytes
	$_UP['tamanho'] = 5184*5184*100; //10mb
	
	//Array com a extensões permitidas
	$_UP['extensoes'] = array('jpg', 'jpeg');
	
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
	$imagem_up = $_FILES['imagem']['name'];
    $extensao = pathinfo($imagem_up);
    $extensao = $extensao['extension'];
    $msgAdicionaEvento = null;
	if (array_search($extensao, $_UP['extensoes']) === false) {		
		$msgAdicionaEvento = "Extensão inválida.";
	} else if ($_UP['tamanho'] < $_FILES['imagem']['size']) {
		$msgAdicionaEvento = "Arquivo muito grande.";
	} else {
        $caminho = $_UP['pasta'];
        $num ++;
		$nome_final = "Evento_num$num.jpg";
        $arquivo = $caminho.$nome_final;
		if (move_uploaded_file($_FILES['imagem']['tmp_name'], $_UP['pasta']. $nome_final)) {
			//Upload efetuado com sucesso, exibe a mensagem
        	$insertEvento = new Eventos();
			$insertEvento = $insertEvento->addEvento($idUser, 
                                                     $arquivo, 
                                                     $nome,
                                                     $dataHoraInicio,
                                                     $dataHoraFinal,
                                                     $endereco,
                                                     $bairro,
                                                     $cidade,
                                                     $estado,
                                                     $pais,
                                                     $descricao
                                                     );
			$msgAdicionaEvento = "Evento adicionado com sucesso!";	
		} else {
			$msgAdicionaEvento = "Evento não adicionado!";
		}
	}
	$_SESSION['msgAdicionaEvento'] = $msgAdicionaEvento;
?>
    <meta http-equiv="refresh" content="0;url=../../visualizacoes/eventos/eventos.php">
<?php

?>