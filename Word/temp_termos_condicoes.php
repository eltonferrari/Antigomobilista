<?php 
    include '../../controladores/autenticacao/validador_de_acesso.php';
	
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
	echo '===== USUÁRIO =====';
	echo '<pre>';
	print_r($usuarioLogado);
	echo '</pre>';
    
    $idUser = $_SESSION['id_user'];
    $confirmacao = new Usuarios();
    $confirmacao = $confirmacao->getConfirmacaoEmailById($idUser);
    echo $confirmacao;
?>
<!DOCTYPE html>
<html lang="pt-br">
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
		
		<title>Antigomobilista - Criar novo Usuário</title>
	</head>
    <body>
        <header>
            <?php include '../../templates/menu.php';?>
        </header>
        <section class="container">
            <div class="row">
                <div class="col-sm-10 m-auto">
                    <div id="termos-condicoes">
                        <div id="titulo-termos" class="text-center">
                            <h1 class="cor-1">Termos e Condições de Serviço</h1>
                        </div>
                        <div class="texto-termos">
                            <p>A Resolve Systems desenvolveu o site Antigomobilista para que as pessoas,
                                que gostam de veículos antigos, conectem-se umas com as outras, e portanto,
                                troquem informações, sobre o assunto. É também presente uma sessão de
                                anúncios de veículos e peças, que estão à venda.</p>
                            <p>Estes Termos regem o uso do Antigomobilista, exceto quando declaramos
                                expressamente que outros termos (e não estes) se aplicam. Quem fornece este
                                produto (site Antigomobilista) é a Resolve Systems – Marketing Digital.</p>
                            <p>Não cobramos pelo uso do Antigomobilista a menos que exista outra informação.
                                Ao usar nosso produto, você concorda que, no futuro, poderemos mostrar
                                anúncios que consideramos como possivelmente relevantes para você e seus
                                interesses.</p>
                            <p>Não usamos seus dados pessoais para qualquer fim.</p>
                            <p>Não vendemos seus dados pessoais para anunciantes nem compartilhamos com eles
                                informações de identificação pessoal (como nome, endereço de email ou outras
                                informações de contato), a menos que tenhamos sua permissão específica.</p>
                        </div>
                        <div class="subtitulo-termos-nivel-1">
                            <h2>1. Os serviços fornecidos</h2>                            
                        </div>
                        <div class="texto-termos">
                            <p>Nossa missão é possibilitar que as pessoas, que gostam de veículos antigos, se
                                comuniquem e aproximem por meio de nosso site. Para ajudar a promover essa
                                missão, fornecemos o Produto e serviços descritos abaixo para você:</p>
                            <ul>
                                <li>
                                    Proporcionar uma experiência personalizada para você: sua experiência no
                                    Antigomobilista não se compara à nada visto antes por você. Isso inclui
                                    desde as publicações (fotos), anúncios de Eventos, interação entre
                                    usuários (troca de mensagens), bem como, comentários sobre as postagens
                                        (fotos);
                                </li>
                                <li>
                                    Conectar você com as pessoas e entidades com as quais você se importa:
                                </li>
                                <ul>
                                    <li>
                                        Ajudamos você a encontrar e se conectar com pessoas ou
                                            organizações/entidades do seu interesse no site Antigomobilista;
                                    </li>
                                    <li>
                                        Fazemos sugestões para você e outras pessoas sobre Eventos que estão
                                            por vir, ou talvez pessoas com quem você quer conversar, bem como se
                                            tornar amigo. Laços mais fortes criam comunidades melhores, e
                                            acreditamos que os nossos serviços são mais úteis quando as pessoas
                                            estão conectadas a pessoas, grupos e organizações/entidades que
                                                sejam relevantes para elas;
                                    </li>
                                    <li>
                                        Permitir que você se expresse e fale sobre o que é importante para você,
                                            neste caso, Eventos/Encontros de veículos antigos, peças dos mesmos,
                                            etc..;
                                    </li>
                                    <li>
                                        Sendo assim, as pessoas podem criar e compartilhar fotos e idéias, mais
                                            facilmente, com pessoas que tem o mesmo interesse que você (veículos
                                            antigos).
                                    </li>
                                </ul>
                                <li>
                                    Promovemos a segurança, a proteção e a integridade dos nossos serviços, bem como
                                    combatemos as más condutas nocivas, para  proteger os nossos usuários.
                                </li>
                            </ul>
                            <p>As pessoas só postarão fotos em nosso produto (site Antigomobilista) ao se sentirem
                                seguras e protegidas. Nós trabalhamos arduamente para manter a segurança (incluindo
                                a disponibilidade, a autenticidade, a integridade e a confidencialidade) de nosso
                                Produto e serviços.</p>
                            <p>Empregamos uma equipe exclusiva e desenvolvemos sistemas técnicos avançados para
                                detectar o possível uso indevido de nossos produtos, conduta prejudicial a terceiros
                                e situações em que possamos ajudar a apoiar ou proteger nossa comunidade, incluindo
                                para responder a denúncias de usuários de conteúdo potencialmente em violação. Se
                                esse tipo de conteúdo ou conduta vier ao nosso conhecimento, podemos tomar as
                                    medidas adequadas com base na nossa avaliação, como enviar a você uma notificação,
                                    oferecer ajuda, remover o conteúdo, remover ou bloquear o acesso a determinados
                                    recursos, desativar uma conta ou entrar em contato com as autoridades. A Resolve
                                    Systems poderá acessar, preservar, usar e compartilhar qualquer informação que
                                        ela coletar sobre você, se ela acreditar em boa-fé que isso é necessário ou
                                        permitido por lei. Para obter mais informações, consulte nossa <a href="#">Política de
                                        Privacidade</a>.</p>
                            <p>Usar e desenvolver tecnologias avançadas para prestar serviços seguros e funcionais
                                para todos:</p>
                            <ul>
                                <li>
                                    Nós usamos e desenvolvemos tecnologias avançadas para que as pessoas possam usar
                                    nosso Produto com segurança, independentemente de capacidade física ou
                                    localização geográfica;
                                </li>
                                <li>
                                    Desenvolvemos sistemas automatizados para melhorar nossa capacidade de detectar
                                    e remover atividades abusivas e perigosas que possam causar prejuízos à nossa
                                    comunidade e à integridade do nosso Produto;
                                </li>
                                <li>
                                    Pesquisamos formas de melhorar os nossos serviços;
                                </li>
                                <li>
                                    Realizamos pesquisa para desenvolver, testar e melhorar nossos Produtos. Isso
                                    inclui a análise dos dados que temos sobre os nossos usuários e o entendimento
                                    de como as pessoas usam nosso Produto, por exemplo, realizando pesquisas e
                                    testes, e resolvendo problemas de novos recursos.
                                </li>
                            </ul>
                            <p>Proporcionar experiências consistentes no Produto da Empresa Resolve Systems:</p>
                            <ul>
                                <li>
                                    Nosso produto ajuda você a encontrar pessoas, grupos, empresas, organizações
                                    e outras entidades que sejam importantes para você e se conectar com elas;
                                </li>
                                <li>
                                    Criamos nosso sistema para que sua experiência seja consistente junto ao nosso
                                    Produto.
                                </li>
                                <li>
                                    Garantir acesso aos nossos serviços: para operarmos os nossos serviços e
                                    possibilitarmos que você se conecte com pessoas de todo o Mundo.
                                </li>
                            </ul>
                            <p>Não compartilhamos informações que identifiquem você diretamente (como nome ou
                                endereço de email, que alguém pode usar para entrar em contato com você ou verificar
                                sua identidade), a menos que você nos dê permissão específica.</p>
                        </div>
                        <div class="subtitulo-termos-nivel-1">
                            <h2>2. Seu compromisso com o Antigomobilista e com nossa comunidade</h2>
                        </div>
                        <div class="texto-termos">
                            <p>Fornecemos estes serviços para você e para outras pessoas a fim de ajudar a promover
                                nossa missão. Em troca, precisamos que você assuma os seguintes compromissos:</p>
                            <div class="subtitulo-termos-nivel-2">
                                <h3>2.1. Quem pode usar o Antigomobilista</h3>
                            </div>
                            <div class="texto-termos-nivel-2">
                            <p>Quando as pessoas se responsabilizam pelas próprias opiniões e ações, nossa comunidade
                                se torna mais segura e responsável. Por isso, você deve:</p>
                                <ul>
                                <li>
                                    Usar, em sua conta, o mesmo nome que usa na sua vida cotidiana.
                                </li>
                                <li>
                                    Fornecer informações precisas sobre você.
                                </li>
                                <li>
                                    Criar somente uma conta (a sua própria) e usá-la para fins pessoais.
                                </li>
                                <li>
                                    Abster-se de compartilhar sua senha, dar acesso à sua conta do Antigomobilista a
                                    terceiros ou transferir sua conta para outra pessoa (sem a nossa permissão).
                                </li>
                            </ul>
                            <h3>2.2. Tentamos fazer com que o Antigomobilista esteja amplamente disponível para todos,
                                mas você não poderá usá-lo se:</h3>
                            <ul>
                                <li>
                                    Você tiver menos de 13 anos.
                                </li>
                                <li>
                                    Você tiver sido condenado por crime sexual.
                                </li>
                                <li>
                                    Nós tivermos desativado sua conta anteriormente por violar nossos Termos, os Padrões
                                    da Comunidade ou outros termos e políticas que se aplicam ao seu uso do
                                    Antigomobilista. Se desativarmos sua conta em decorrência de violação de nossos
                                    Termos, dos Padrões da Comunidade ou de outros termos e políticas, você concorda
                                        em não criar outra sem nossa permissão. A permissão para criar uma nova conta é
                                        fornecida a nosso exclusivo critério, e isso não significa nem implica que a ação
                                        disciplinar tenha sido errada ou sem causa.
                                </li>
                                <li>
                                    Não usar o Site se você estiver proibido de receber nossos produtos, serviços ou
                                    software de acordo com as leis aplicáveis.
                                </li>
                            </ul>
                            <h3>2.3. O que você pode compartilhar e fazer no site Antigomobilista:</h3>
                            <p>Queremos que as pessoas usem o Produto Antigomobilista da Resolve Systems para se
                                expressar e compartilhar conteúdo que seja importante para elas, dentro do foco para o
                                qual o mesmo foi criado, ou seja, veículos antigos, mas não às custas da segurança e
                                do bem-estar de outras pessoas ou da integridade da nossa comunidade. Por isso, você
                                concorda em não adotar o comportamento descrito abaixo nem facilitar ou apoiar que
                                    outras pessoas o façam:</p>
                            <ul>
                                <li>
                                    Você não pode usar nosso Produto para fazer ou compartilhar conteúdo que viole estes
                                    Termos, os Padrões da Comunidade ou outros termos e políticas aplicáveis ao seu uso
                                    do nosso Produto;
                                </li>
                                <li>
                                    Que seja ilegal, enganoso, discriminatório ou fraudulento (ou que ajude alguém a usar
                                    nosso Produto dessa maneira);
                                </li>
                                <li>
                                    Que não seja de sua propriedade ou que não tenha os direitos necessários para ser
                                    compartilhado.
                                </li>
                                <li>
                                    Que possa infringir ou violar os direitos de outra pessoa, incluindo seus direitos de
                                    propriedade intelectual, como direitos autorais ou marcas registradas, ou a
                                    distribuição ou venda de mercadorias falsificadas ou pirateadas, a não ser que uma
                                    exceção ou limitação seja aplicável de acordo com a lei.
                                </li>
                                <li>
                                    Você não pode carregar vírus ou códigos mal-intencionados, usar os serviços para enviar
                                    spam nem fazer qualquer outra coisa que possa desativar, sobrecarregar, interferir ou
                                    afetar o funcionamento adequado, a integridade, a operação ou a aparência dos nossos
                                    serviços, sistemas ou produtos.
                                </li>
                                <li>
                                    Você não pode acessar ou coletar dados do nosso Produto usando meios automatizados (sem
                                    a nossa permissão prévia) ou tentar acessar dados que não tenha permissão para acessar.
                                </li>
                                <li>
                                    Você não pode autorizar, solicitar ou coletar nomes de usuário ou senhas, nem se
                                    apropriar indevidamente de qualquer meio de acesso.
                                </li>
                                <li>
                                    Você não pode vender, licenciar ou comprar dados obtidos de nós ou de nossos serviços,
                                    exceto conforme disposto nos Termos da Plataforma.
                                </li>
                                <li>
                                    Você não pode usar indevidamente qualquer canal de denúncia, sinalização, controvérsia
                                    ou recurso, como ao fazer denúncias ou recursos fraudulentos, duplicados ou sem
                                    fundamentos.
                                </li>
                            </ul>
                            <p>Podemos remover ou restringir o acesso a conteúdo que viole essas disposições. Podemos também
                                suspender ou desativar sua conta por condutas que violem essas disposições, conforme previsto
                                em sessão posterior.</p>
                            <p>Se removermos conteúdo que você compartilhou por violação dos Padrões da Comunidade,
                                avisaremos a você e explicaremos suas opções para solicitar outra análise, a menos que você:</p>
                            <ul>
                                <li>
                                    Viole de forma grave ou repetida estes Termos ou faça algo que possa expor a nós ou
                                    outros a responsabilidades legais;
                                </li>
                                <li>
                                    Prejudique nossa comunidade de usuários;
                                </li>
                                <li>
                                    Comprometa ou interfira na integridade ou operação de qualquer um dos nossos serviços,
                                    sistemas ou Produtos.
                                </li>
                            </ul>
                            <p>Ou quando:</p>
                            <ul>
                                <li>
                                    Formos restritos devido a limitações técnicas;
                                </li>
                                <li>
                                    Formos proibidos de fazê-lo por motivos legais.</p>
                                </li>
                            </ul>
                            <p>Para informações sobre suspensão ou extinção de conta, consulte Seção abaixo sobre o tema.</p>
                            <p>Para ajudar a apoiar nossa comunidade, incentivamos você a denunciar conteúdo ou conduta que
                                considere violar seus direitos (inclusive direitos de propriedade intelectual) ou nossos
                                termos e políticas, caso este recurso exista em sua jurisdição.</p>
                            <p>Também podemos remover ou restringir o acesso a conteúdo, serviços ou informações se
                                determinarmos que isso é razoavelmente necessário para evitar ou reduzir impactos jurídicos
                                ou regulatórios adversos para a Resolve Systems.</p>
                            <h3>2.4. As permissões que você nos concede</h3>
                            <p>Precisamos de algumas permissões suas para fornecer nossos serviços:</p>
                            <ul>
                                <li>
                                    Permissão para usar o conteúdo que você cria e compartilha: o conteúdo compartilhado ou
                                    carregado, como fotos, por exemplo, pode ser protegido por leis de propriedade
                                    intelectual.
                                </li>
                                <li>
                                    Você tem a propriedade dos direitos de propriedade intelectual (como direitos autorais
                                    ou marcas comerciais) sobre o conteúdo que cria e compartilha no Antigomobilista. Além
                                    disso, nada nestes Termos retira os direitos que você tem sobre o conteúdo que produz.
                                    Você é livre para compartilhar esse conteúdo com qualquer pessoa, onde você quiser.
                                </li>
                            </ul>
                            <p>No entanto, para prestar os nossos serviços, precisamos que você nos conceda algumas
                                permissões legais (conhecidas como “licença”) para usar esse conteúdo. Isso é apenas para
                                fins de prestação e melhoria do nosso Produto e serviços, conforme descrito anteriormente.</p>
                            <p>Especificamente, quando você compartilha, publica ou carrega conteúdo protegido por direitos
                                de propriedade intelectual no nosso Produto ou relacionado a ele, você nos concede uma
                                licença não exclusiva, transferível, sublicenciável, isenta de royalties e válida mundialmente
                                para hospedar, usar, distribuir, modificar, veicular, copiar, reproduzir publicamente ou
                                exibir e traduzir seu conteúdo, assim como criar trabalhos derivados dele (em conformidade
                                    com as suas configurações de privacidade e do app). Isso significa, por exemplo, que se
                                    você compartilhar uma foto no Antigomobilista, você nos dará permissão para armazenar,
                                    copiar e compartilhar a foto com outras pessoas (novamente, em conformidade com as suas
                                    configurações), como os provedores de serviços que oferecem suporte a tal produto e
                                        serviços. Quando o seu conteúdo é excluído dos nossos sistemas, essa licença é
                                        encerrada.</p>
                            <h3>2.5. Quanto a exclusões de conteúdo e conta</h3>
                            <ul>
                                <li>
                                    Qualquer conteúdo individual que compartilhar, publicar e carregar poderá ser excluído a
                                    quaquer momento. Além disso, se você excluir sua conta pessoal, todo o conteúdo publicado nela,
                                    sua conta, será excluído.
                                </li>
                                <li>
                                    Após começarmos o processo de exclusão de conta ou recebermos uma solicitação de exclusão de
                                    conteúdo, pode levar até 90 dias para que o conteúdo seja excluído.
                                </li>
                                <li>
                                    Apesar de o processo de exclusão de determinado conteúdo já ter começado, o conteúdo não é mais
                                    visível aos demais usuários.
                                </li>
                                <li>
                                    Após a exclusão do conteúdo, talvez demore mais 90 dias para removê-lo dos nossos sistemas de
                                    backup e de recuperação de desastres.
                                </li>
                                <li>
                                    O conteúdo não será excluído no prazo de 90 dias após o início do processo de exclusão da conta
                                    ou de conteúdo nas seguintes circunstâncias:
                                </li>
                                <ul>
                                    <li>
                                        Se o seu conteúdo foi usado por outras pessoas de acordo com essa licença, e elas não o
                                        excluíram (nesse caso, a licença permanecerá válida até que o conteúdo seja excluído);
                                    </li>
                                    <li>
                                        Se a exclusão não puder ocorrer em até 90 dias devido a limitações técnicas dos nossos
                                        sistemas. Nesse caso, concluiremos a exclusão assim que possível tecnicamente; ou
                                    </li>
                                    <li>
                                        Se a exclusão imediata restringir nossa capacidade de:
                                    </li>
                                    <ul>
                                        <li>
                                            Investigar ou identificar atividade ilegal ou violações aos nossos termos e políticas
                                            (por exemplo, para identificar ou investigar o uso indevido de Produto ou sistemas);
                                        </li>
                                        <li>
                                            Garantir a segurança, a integridade e a proteção do nosso Produto, sistemas, serviços,
                                            dos nossos funcionários e usuários e para nos defendermos;
                                        </li>
                                        <li>
                                            Cumprir as obrigações legais de preservação de provas, para cumprir todas as eventuais
                                            obrigações de manutenção de registros exigidas por lei; ou
                                        </li>
                                        <li>
                                            Atender a uma solicitação de uma autoridade judicial ou administrativa, de aplicação
                                            da lei ou de uma agência governamental. Neste caso, o conteúdo será mantido apenas
                                            pelo tempo necessário para atender às finalidades para as quais ele foi mantido (a
                                            duração exata variará dependendo do caso).
                                        </li>
                                    </ul>
                                </ul>
                            </ul>
                            <p>Em cada caso acima, a licença será mantida até que o conteúdo tenha sido totalmente excluído.</p>
                            <h3>2.6. Permissão para usar seu nome, foto do perfil e informações sobre suas ações:</h3>
                            <ul>
                                <li>
                                    Você nos concede permissão para usar seu nome, foto do perfil e informações sobre ações
                                    realizadas no Antigomobilista, próximos ou relacionados a anúncios, ofertas e outros
                                    conteúdos patrocinados ou comerciais que exibimos em nosso Produto, sem o pagamento de
                                    qualquer remuneração a você. Por exemplo, podemos mostrar aos seus amigos que você tem
                                        interesse em um evento anunciado.
                                </li>
                                <li>
                                    Somente as pessoas que têm permissão para ver sua atividade no Produto da Resolve Systems
                                    podem ver esse tipo de anúncio e de conteúdo.
                                </li>
                                <li>
                                    Permissão para atualizar software que você usa:
                                </li>
                                <ul>
                                    <li>
                                        Se você usar nosso software, você nos dará permissão para instalar atualizações para
                                        o software quando disponíveis.
                                    </li>
                                </ul>
                            </ul>
                            <h2>3. Limites no uso de nossa propriedade intelectual</h2>
                            <p>Você só pode usar os nossos direitos autorais ou as nossas marcas comerciais ou quaisquer
                                marcas semelhantes conforme expressamente permitido nas nossas Diretrizes de Uso de Marca ou
                                com a nossa permissão prévia por escrito. É necessário ter a nossa permissão por escrito ou
                                com uma licença de código aberto para modificar, traduzir ou descompilar os nossos produtos
                                ou os seus componentes, assim como para criar obras derivadas deles ou realizar engenharia
                                    reversa neles, ou tentar extrair de nós o código-fonte, a não ser que uma exceção ou uma
                                    limitação seja aplicável de acordo com a lei.</p>
                            <h3>3.1. Disposições adicionais</h3>
                            <ul>
                                <li>
                                    Atualização de nossos Termos
                                </li>
                            </ul>
                        </div>
                        Trabalhamos constantemente para aperfeiçoar nossos serviços e desenvolver novos recursos para melhorar nosso Produto para você e para nossa comunidade. Como resultado, pode ser necessário atualizar estes Termos periodicamente para refletir com precisão nossos serviços e práticas, para promover uma experiência segura e protegida em nossos produtos e serviços e/ou para cumprir a lei aplicável. Somente faremos alterações se as disposições não forem mais adequadas ou caso se mostrem incompletas, e apenas se estas alterações forem razoáveis e levarem em consideração seus interesses, ou caso as alterações forem necessárias por motivos de segurança e proteção ou para cumprir as leis aplicáveis.
                        Você será notificado (por exemplo, por email ou por meio do nosso Produto) no mínimo 30 dias antes de alterarmos estes Termos e terá a oportunidade de analisar tais alterações antes que entrem em vigor, salvo quando exigidas por lei. Após esse período, você estará vinculado aos Termos atualizados se continuar usando nosso Produto.
                        Esperamos que você continue usando nosso Produto. Porém, caso discorde das alterações nos nossos Termos e não queira mais fazer parte da comunidade, é possível excluir sua conta a qualquer momento.

                        •	Suspensão ou encerramento da conta
                        Queremos que o Antigomobilista seja um espaço em que as pessoas se sintam bem-vindas e seguras para se expressar e compartilhar seus pensamentos e idéias.
                        Se nós determinarmos, a nosso critério, que você tenha violado clara, séria ou repetidamente nossos Termos ou Políticas, incluindo em particular os Padrões da Comunidade, podemos suspender ou desativar permanentemente seu acesso ao Produto da Empresa Resolve Systems e podemos desativar ou excluir sua conta permanentemente. 

                        Também podemos desativar ou excluir sua conta se você violar recorrentemente os direitos de propriedade intelectual de outra pessoa ou quando formos obrigados por motivos legais.

                        Podemos desativar ou excluir sua conta caso ela não seja confirmada após o cadastro (30 dias), caso não seja utilizada e permaneça inativa por um período prolongado (1 ano) ou caso detectemos que alguém pode a ter usado sem sua permissão e não seja possível confirmar a propriedade de sua conta.
                        Se realizarmos essas ações, avisaremos a você e explicaremos suas opções para solicitar uma análise. A menos que isso possa:
                        •	Nos expor ou expor outros a responsabilidades legais;
                        •	prejudicar nossa comunidade de usuários;
                        •	comprometer ou interferir na integridade ou operação de qualquer um de nossos serviços, fontes ou Produto; 
                        •	quando formos restritos devido a limitações técnicas; ou quando formos proibidos de fazê-lo por motivos legais.

                        <link>
                        Saiba mais sobre o que você pode fazer caso sua conta seja desativada e sobre como entrar em contato conosco se acreditar que desativamos sua conta por engano.
                        </link>
                        Se você excluir ou se nós desativarmos ou excluirmos sua conta, estes Termos serão encerrados como um acordo entre você e nós.

                        Limites da responsabilidade
                        Trabalhamos continuamente para fornecer o melhor Produto possíveis e especificar diretrizes claras para todos os usuários. Nosso Produto, no entanto, é fornecido “no estado em que se encontra”, e, na medida em que for permitido por lei, não damos nenhuma garantia de que ele sempre será seguro, ou estará livre de erros, ou de que funcionará sem interrupções, atrasos ou imperfeições. No limite permitido por lei, também nos EXIMIMOS DE TODAS AS GARANTIAS, EXPLÍCITAS OU IMPLÍCITAS, INCLUSIVE AS GARANTIAS IMPLÍCITAS DE COMERCIABILIDADE, ADEQUAÇÃO A UMA DETERMINADA FINALIDADE, TÍTULO E NÃO VIOLAÇÃO. Não controlamos nem orientamos o que as pessoas e terceiros fazem ou dizem e não somos responsáveis pela conduta deles (seja online ou offline) ou por qualquer conteúdo que compartilham (inclusive conteúdo ofensivo, inadequado, obsceno, ilegal ou questionável).
                        Não podemos prever a ocorrência de problemas com o nosso Produto. Sendo assim, nossa responsabilidade ficará restrita ao limite máximo permitido pela lei aplicável. Na extensão máxima permitida pela lei aplicável, sob nenhuma circunstância seremos responsáveis perante você por qualquer perda de lucros, receitas, informações ou dados, ou, ainda, por danos eventuais, especiais, indiretos, exemplares, punitivos ou acidentais decorrentes de ou relativos a estes Termos (seja qual for a causa e em caso de teoria de responsabilidade, incluindo negligência), ainda que tenhamos sido avisados da possibilidade de tais danos.

                        Contestações
                        Tentamos fornecer regras claras de modo a limitar ou até evitar conflitos entre você e o Antigomobilista. No entanto, caso isso seja inevitável, é útil saber com antecedência onde resolvê-los e quais leis são aplicáveis.
                        Se você é consumidor, as leis do país em que reside são aplicáveis a qualquer alegação, recurso ou contestação que você tenha contra nós decorrente destes Termos ou dos Produtos da Resolve Systems e a eles relacionados. Além disso, é possível resolver essa alegação em qualquer órgão jurisdicional competente desse país com jurisdição sobre ela. Em todos os outros casos, e para qualquer alegação, recurso ou contestação que a Resolve Systems apresente contra você, a Resolve Systems e você concordam que a alegação, o recurso ou a contestação devem ser resolvidos exclusivamente no Tribunal de Justiça do Estado do Rio Grande do Sul. Você também concorda em se submeter à competência em ação fundada de qualquer um desses tribunais com a finalidade de dirimir qualquer alegação e que as leis do Brasil e do Estado do Rio Grande do Sul regerão estes Termos e qualquer alegação, recurso ou contestação sem relação com conflito das disposições legais. Sem prejuízo ao disposto acima, você concorda que a Resolve Systems, a seu exclusivo critério, poderá apresentar as eventuais alegações, recursos ou contestações que tenha contra você em qualquer órgão jurisdicional competente em seu país de residência com jurisdição para tanto.
                        Outro
                        Estes Termos (anteriormente conhecidos como Declaração de Direitos e Responsabilidades) constituem o acordo integral entre você e a Resolve Systems sobre o uso do nosso Produto. Eles substituem quaisquer acordos anteriores.
                        Se uma parte destes Termos for considerada inaplicável, ela deverá ser corrigida dentro do que for necessário para se tornar aplicável. Caso a disposição não possa ser declarada aplicável, ela será removida e o restante permanecerá em pleno vigor e efeito. Se falharmos em executar qualquer parte destes Termos, isso não será considerado como uma renúncia. Quaisquer alterações ou renúncias destes Termos devem ser feitas por escrito e assinadas por nós.
                        Você não transferirá qualquer dos seus direitos ou obrigações previstos nestes Termos para qualquer outra pessoa sem o nosso consentimento.
                        Todos os nossos direitos e obrigações previstos nestes Termos são livremente transferíveis por nós em caso de fusão, aquisição, venda de ativos ou por força de lei ou outro fator.
                        Pode ser necessário alterar o nome de usuário de sua conta em determinadas circunstâncias (por exemplo, se outra pessoa reivindicar tal nome de usuário e entendermos que ele não tem relação com o nome que você usa em sua vida cotidiana).
                        Sempre apreciamos receber seu feedback e outras sugestões sobre nossos produtos e serviços. Mas podemos usar o feedback e outras sugestões sem qualquer restrição ou obrigação de remunerar você, e não temos o dever de mantê-los sob confidencialidade.
                        Nós nos reservamos todos os direitos não concedidos expressamente a você.

                        Outros termos e políticas que podem se aplicar a você
                        Padrões da Comunidade: essas diretrizes descrevem nossos padrões sobre o conteúdo publicado no Antigomobilista e a atividade nessa plataforma.
                        <link>
                        Políticas de Eventos do Antigomobilista: essas diretrizes são aplicáveis se você cria ou administra um evento do Antigomobilista ou usa essa plataforma para divulgar ou administrar Eventos.
                        </link>

                        <link>
                        Política da Plataforma: estes termos se aplicam ao uso do conjunto de APIs, SDKs, ferramentas, plugins, códigos, tecnologias, conteúdos e serviços que permitem que outras pessoas desenvolvam funcionalidades, recuperem dados do Produto da Resolve Systems ou forneçam dados a nós.
                        </link>

                        <link>
                        Diretrizes de Recomendações: as Diretrizes de Recomendações do Antigomobilista descrevem nossos padrões para recomendar e não recomendar conteúdo.
                        </link>

                        Data da última revisão: 20 de agosto de 2023








                        </div>                            


                    </div>
                </div>
            </div>
               
            <section id="aceite_termos" class="text-center">
                <form action="" method="post">
                    <label for="aceite">
                        LÍ E CONCORDO COM TODOS OS TERMOS E CONDIÇÕES DESCRITOS ACIMA
                    </label>
                    <input type="checkbox" name="aceite" id="aceite" />
                </form>
            </section>
        </section>







