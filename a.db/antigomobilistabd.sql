SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+03:00";

--
-- Database: `antigo_bd`
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
CREATE TABLE IF NOT EXISTS `comentarios` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_usuario` int(10) NOT NULL,
    `id_postagem` int(10) NOT NULL,
    `comentario` varchar(255) NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY(id_postagem) REFERENCES postagems(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `eventos`
--
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_usuario` int(10) NOT NULL,
    `imagem` varchar(100) NOT NULL DEFAULT 'img/icones/ni.png',
    `nome` varchar(255) NOT NULL,
    `data_hora_inicio` datetime NOT NULL,
    `data_hora_fim` datetime NOT NULL,
    `endereco` varchar(100) NOT NULL,
    `bairro` varchar(100) NOT NULL,
    `cidade` varchar(100) NOT NULL,
    `id_estado` int(10) NOT NULL,
    `id_pais` varchar(100) NOT NULL,
    `descricao` varchar(255) NOT NULL,
    `autorizado` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY(id_estado) REFERENCES estados(id),
    FOREIGN KEY(id_pais) REFERENCES paises(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `mensagens`
--
DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_remetente` int(10) NOT NULL,
    `id_receptor` int(10) NOT NULL,
    `mensagem` varchar(255) NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(id_remetente) REFERENCES usuarios(id),
    FOREIGN KEY(id_receptor) REFERENCES usuarios(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `postagens`
--
DROP TABLE IF EXISTS `postagens`;
CREATE TABLE IF NOT EXISTS `postagens` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_usuario` int(10) NOT NULL,
    `imagem` varchar(100) NOT NULL DEFAULT 'img/icones/ni.png',
    `marca` varchar(100) NOT NULL,
    `modelo` varchar(255) NOT NULL,
    `ano` int(4),
    `descricao` varchar(255) NOT NULL,
    `vendendo` int(1) DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `pontuacoes`
--
DROP TABLE IF EXISTS `pontuacoes`;
CREATE TABLE IF NOT EXISTS `pontuacoes` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `id_criador` int(10) NOT NULL,
    `nivel` int(5) NOT NULL,
    `ponto_inicial` int(11) NOT NULL,
    `ponto_final` int(11) NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(id_criador) REFERENCES usuarios(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
INSERT INTO `pontuacoes` (`id`, `id_criador`, `nivel`, `ponto_inicial`, `ponto_final`, `created_at`) VALUES
(1, 1, 1, 0, 10, '2023-04-23 15:00:00');
--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `pontos` int(11) NOT NULL DEFAULT '5',
    `nome` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `telefone` varchar(16),
    `senha` varchar(100) NOT NULL,
    `imagem` varchar(100) NOT NULL DEFAULT 'img/icones/ni.png',
    `endereco` varchar(150),
    `endereco_complemento` varchar(100),
    `bairro` varchar(100),
    `cidade` varchar(100),
    `estado` int(2),
    `tipo` int(1) NOT NULL DEFAULT '0',
    `ativo` int(1) NOT NULL DEFAULT '1',
    `confirm_email` int(1) NOT NULL DEFAULT '0',
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(estado) REFERENCES estados(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuarios` (`id`, 
                        `pontos`, 
                        `nome`, 
                        `email`, 
                        `telefone`, 
                        `senha`, 
                        `imagem`, 
                        `endereco`, 
                        `endereco_complemento`, 
                        `bairro`, 
                        `cidade`,
                        `estado`,
                        `tipo`, 
                        `ativo`,
                        `confirm_email`, 
                        `created_at`, 
                        `updated_at`
                        ) 
    VALUES (1, 
            5, 
            'Elton Ferrari', 
            'eltonferrari@gmail.com', 
            '(51) 98062-6338',
            'e10adc3949ba59abbe56e057f20f883e', 
            'img/icones/ni.png', 
            'Rua Reverendo Daniel Betts, 267',
            'Esquina',
            'Protásio Alves',
            'Porto Alegre',
            21,
            1,
            1,
            1,
            '2023-06-03 18:11:35',
            '2023-06-05 15:11:47'
            );

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `estados`
--
DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
	`id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` varchar(25) UNIQUE NOT NULL,
	`sigla` varchar(2) UNIQUE NOT NULL,
  	PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `estados` (`id`, `nome`, `sigla`) 
	VALUES 	(1, 'Acre', 'AC'),
            (2, 'Alagoas', 'AL'),
            (3, 'Amapá', 'AP'),
            (4, 'Amazonas', 'AM'),
            (5, 'Bahia', 'BA'),
            (6, 'Ceará', 'CE'),
            (7, 'Distrito Federal', 'DF'),
            (8, 'Espírito Santo', 'ES'),			
            (9, 'Goiás', 'GO'),
            (10, 'Maranhão', 'MA'),
            (11, 'Mato Grosso', 'MT'),
            (12, 'Mato Grosso do Sul', 'MS'),
            (13, 'Minas Gerais', 'MG'),
            (14, 'Pará', 'PA'),
            (15, 'Paraíba', 'PB'),
            (16, 'Paraná', 'PR'),
            (17, 'Pernambuco', 'PE'),
            (18, 'Piauí', 'PI'),
            (19, 'Rio de Janeiro', 'RJ'),
            (20, 'Rio Grande do Norte', 'RN'),
            (21, 'Rio Grande do Sul', 'RS'),
            (22, 'Rondônia', 'RO'),
            (23, 'Roraima', 'RR'),
            (24, 'Santa Catarina', 'SC'),
            (25, 'São Paulo', 'SP'),
            (26, 'Sergipe', 'SE'),
            (27, 'Tocantins', 'TO');
--
-- Estrutura da tabela `paises`
--
DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
    `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
    `nome` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `paises` (`id`, `nome`, `name`) 
    VALUES  (1, 'AFEGANISTÃO', 'AFGHANISTAN'),
            (2, 'ACROTÍRI E DECELIA', 'AKROTIRI E DEKÉLIA'),
            (3, 'ÁFRICA DO SUL', 'SOUTH AFRICA'),
            (4, 'ALBÂNIA', 'ALBANIA'),
            (5, 'ALEMANHA', 'GERMANY'),
            (6, 'SAMOA AMERICANA', 'AMERICAN SAMOA'),
            (7, 'ANDORRA', 'ANDORRA'),
            (8, 'ANGOLA', 'ANGOLA'),
            (9, 'ANGUILLA', 'ANGUILLA'),
            (10, 'ANTÍGUA E BARBUDA', 'ANTIGUA AND BARBUDA'),
            (11, 'ANTILHAS HOLANDESAS', 'NETHERLANDS ANTILLES'),
            (12, 'ARÁBIA SAUDITA', 'SAUDI ARABIA'),
            (13, 'ARGÉLIA', 'ALGERIA'),
            (14, 'ARGENTINA', 'ARGENTINA'),
            (15, 'ARMÊNIA', 'ARMENIA'),
            (16, 'ARUBA', 'ARUBA'),
            (17, 'AUSTRÁLIA', 'AUSTRALIA'),
            (18, 'ÁUSTRIA', 'AUSTRIA'),
            (19, 'AZERBAIJÃO', 'AZERBAIJAN'),
            (20, 'BAHAMAS', 'BAHAMAS, THE'),
            (21, 'BANGLADECHE', 'BANGLADESH'),
            (22, 'BARBADOS', 'BARBADOS'),
            (23, 'BARÉM', 'BAHRAIN'),
            (24, 'BASSAS DA ÍNDIA', 'BASSAS DA INDIA'),
            (25, 'BÉLGICA', 'BELGIUM'),
            (26, 'BELIZE', 'BELIZE'),
            (27, 'BENIM', 'BENIN'),
            (28, 'BERMUDAS', 'BERMUDA'),
            (29, 'BIELORRÚSSIA', 'BELARUS'),
            (30, 'BOLÍVIA', 'BOLIVIA'),
            (31, 'BÓSNIA E HERZEGOVINA', 'BOSNIA AND HERZEGOVINA'),
            (32, 'BOTSUANA', 'BOTSWANA'),
            (33, 'BRASIL', 'BRAZIL'),
            (34, 'BRUNEI DARUSSALAM', 'BRUNEI DARUSSALAM'),
            (35, 'BULGÁRIA', 'BULGARIA'),
            (36, 'BURQUINA FASO', 'BURKINA FASO'),
            (37, 'BURUNDI', 'BURUNDI'),
            (38, 'BUTÃO', 'BHUTAN'),
            (39, 'CABO VERDE', 'CAPE VERDE'),
            (40, 'CAMARÕES', 'CAMEROON'),
            (41, 'CAMBOJA', 'CAMBODIA'),
            (42, 'CANADÁ', 'CANADA'),
            (43, 'CATAR', 'QATAR'),
            (44, 'CAZAQUISTÃO', 'KAZAKHSTAN'),
            (45, 'REPÚBLICA CENTRO-AFRICANA', 'CENTRAL AFRICAN REPUBLIC'),
            (46, 'CHADE', 'CHAD'),
            (47, 'CHILE', 'CHILE'),
            (48, 'CHINA', 'CHINA'),
            (49, 'CHIPRE', 'CYPRUS'),
            (50, 'COLÔMBIA', 'COLOMBIA'),
            (51, 'COMORES', 'COMOROS'),
            (52, 'CONGO', 'CONGO'),
            (53, 'REPÚBLICA DEMOCRÁTICA DO CONGO', 'CONGO DEMOCRATIC REPUBLIC'),
            (54, 'COREIA DO NORTE', 'KOREA NORTH'),
            (55, 'COREIA DO SUL', 'KOREA SOUTH'),
            (56, 'COSTA DO MARFIM', 'IVORY COAST'),
            (57, 'COSTA RICA', 'COSTA RICA'),
            (58, 'CROÁCIA', 'CROATIA'),
            (59, 'CUBA', 'CUBA'),
            (60, 'DINAMARCA', 'DENMARK'),
            (61, 'DOMINÍCA', 'DOMINICA'),
            (62, 'EGITO', 'EGYPT'),
            (63, 'EMIRADOS ÁRABES UNIDOS', 'UNITED ARAB EMIRATES'),
            (64, 'EQUADOR', 'ECUADOR'),
            (65, 'ERITREIA', 'ERITREA'),
            (66, 'ESLOVÁQUIA', 'SLOVAKIA'),
            (67, 'ESLOVÉNIA', 'SLOVENIA'),
            (68, 'ESPANHA', 'SPAIN'),
            (69, 'ESTADOS UNIDOS', 'UNITED STATES'),
            (70, 'ESTÔNIA', 'ESTONIA'),
            (71, 'ETIÓPIA', 'ETHIOPIA'),
            (72, 'FAIXA DE GAZA', 'GAZA STRIP'),
            (73, 'FIJI', 'FIJI'),
            (74, 'FILIPINAS', 'PHILIPPINES'),
            (75, 'FINLÂNDIA', 'FINLAND'),
            (76, 'FRANÇA', 'FRANCE'),
            (77, 'GABÃO', 'GABON'),
            (78, 'GÂMBIA', 'GAMBIA'),
            (79, 'GANA', 'GHANA'),
            (80, 'GEÓRGIA', 'GEORGIA'),
            (81, 'GIBRALTAR', 'GIBRALTAR'),
            (82, 'GRANADA', 'GRENADA'),
            (83, 'GRÉCIA', 'GREECE'),
            (84, 'GROENLÂNDIA', 'GREENLAND'),
            (85, 'GUADALUPE', 'GUADELOUPE'),
            (86, 'GUAM', 'GUAM'),
            (87, 'GUATEMALA', 'GUATEMALA'),
            (88, 'GUERNSEY', 'GUERNSEY'),
            (89, 'GUIANA', 'GUYANA'),
            (90, 'GUIANA FRANCESA', 'FRENCH GUIANA'),
            (91, 'GUINÉ', 'GUINEA'),
            (92, 'GUINÉ EQUATORIAL', 'EQUATORIAL GUINEA'),
            (93, 'GUINÉ-BISSAU', 'GUINEA-BISSAU'),
            (94, 'HAITI', 'HAITI'),
            (95, 'HONDURAS', 'HONDURAS'),
            (96, 'HONG KONG', 'HONG KONG'),
            (97, 'HUNGRIA', 'HUNGARY'),
            (98, 'IÉMEN', 'YEMEN'),
            (99, 'ILHA BOUVET', 'BOUVET ISLAND'),
            (100, 'ILHA CHRISTMAS', 'CHRISTMAS ISLAND'),
            (101, 'ILHA DE CLIPPERTON', 'CLIPPERTON ISLAND'),
            (102, 'ILHA DE JOÃO DA NOVA', 'JUAN DE NOVA ISLAND'),
            (103, 'ILHA DE MAN', 'ISLE OF MAN'),
            (104, 'ILHA DE NAVASSA', 'NAVASSA ISLAND'),
            (105, 'ILHA EUROPA', 'EUROPA ISLAND'),
            (106, 'ILHA NORFOLK', 'NORFOLK ISLAND'),
            (107, 'ILHA TROMELIN', 'TROMELIN ISLAND'),
            (108, 'ILHAS ASHMORE E CARTIER', 'ASHMORE AND CARTIER ISLANDS'),
            (109, 'ILHAS CAIMAN', 'CAYMAN ISLANDS'),
            (110, 'ILHAS COCOS (KEELING)', 'COCOS (KEELING) ISLANDS'),
            (111, 'ILHAS COOK', 'COOK ISLANDS'),
            (112, 'ILHAS DO MAR DE CORAL', 'CORAL SEA ISLANDS'),
            (113, 'ILHAS FALKLANDS (ILHAS MALVINAS)', 'FALKLAND ISLANDS (ISLAS MALVINAS)'),
            (114, 'ILHAS FEROÉ', 'FAROE ISLANDS'),
            (115, 'ILHAS GEÓRGIA DO SUL E SANDWICH DO SUL', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS'),
            (116, 'ILHAS MARIANAS DO NORTE', 'NORTHERN MARIANA ISLANDS'),
            (117, 'ILHAS MARSHALL', 'MARSHALL ISLANDS'),
            (118, 'ILHAS PARACEL', 'PARACEL ISLANDS'),
            (119, 'ILHAS PITCAIRN', 'PITCAIRN ISLANDS'),
            (120, 'ILHAS SALOMÃO', 'SOLOMON ISLANDS'),
            (121, 'ILHAS SPRATLY', 'SPRATLY ISLANDS'),
            (122, 'ILHAS VIRGENS AMERICANAS', 'UNITED STATES VIRGIN ISLANDS'),
            (123, 'ILHAS VIRGENS BRITÂNICAS', 'BRITISH VIRGIN ISLANDS'),
            (124, 'ÍNDIA', 'INDIA'),
            (125, 'INDONÉSIA', 'INDONESIA'),
            (126, 'IRÃO', 'IRAN'),
            (127, 'IRAQUE', 'IRAQ'),
            (128, 'IRLANDA', 'IRELAND'),
            (129, 'ISLÂNDIA', 'ICELAND'),
            (130, 'ISRAEL', 'ISRAEL'),
            (131, 'ITÁLIA', 'ITALY'),
            (132, 'JAMAICA', 'JAMAICA'),
            (133, 'JAN MAYEN', 'JAN MAYEN'),
            (134, 'JAPÃO', 'JAPAN'),
            (135, 'JERSEY', 'JERSEY'),
            (136, 'DJIBUTI', 'DJIBOUTI'),
            (137, 'JORDÂNIA', 'JORDAN'),
            (138, 'KIRIBATI', 'KIRIBATI'),
            (139, 'KOWEIT', 'KUWAIT'),
            (140, 'LAOS', 'LAOS'),
            (141, 'LESOTO', 'LESOTHO'),
            (142, 'LETÔNIA', 'LATVIA'),
            (143, 'LÍBANO', 'LEBANON'),
            (144, 'LIBÉRIA', 'LIBERIA'),
            (145, 'LÍBIA', 'LIBYAN ARAB JAMAHIRIYA'),
            (146, 'LIECHTENSTEIN', 'LIECHTENSTEIN'),
            (147, 'LITUÂNIA', 'LITHUANIA'),
            (148, 'LUXEMBURGO', 'LUXEMBOURG'),
            (149, 'MACAU', 'MACAO'),
            (150, 'MACEDÔNIA', 'MACEDONIA'),
            (151, 'MADAGASCAR', 'MADAGASCAR'),
            (152, 'MALÁSIA', 'MALAYSIA'),
            (153, 'MALAVI', 'MALAWI'),
            (154, 'MALDIVAS', 'MALDIVES'),
            (155, 'MALI', 'MALI'),
            (156, 'MALTA', 'MALTA'),
            (157, 'MARROCOS', 'MOROCCO'),
            (158, 'MARTINICA', 'MARTINIQUE'),
            (159, 'MAURÍCIA', 'MAURITIUS'),
            (160, 'MAURITÂNIA', 'MAURITANIA'),
            (161, 'MAYOTTE', 'MAYOTTE'),
            (162, 'MÉXICO', 'MEXICO'),
            (163, 'MIANMAR', 'MYANMAR BURMA'),
            (164, 'MICRONÉSIA', 'MICRONESIA'),
            (165, 'MOÇAMBIQUE', 'MOZAMBIQUE'),
            (166, 'MOLDÁVIA', 'MOLDOVA'),
            (167, 'MÔNACO', 'MONACO'),
            (168, 'MONGÓLIA', 'MONGOLIA'),
            (169, 'MONTENEGRO', 'MONTENEGRO'),
            (170, 'MONTSERRAT', 'MONTSERRAT'),
            (171, 'NAMÍBIA', 'NAMIBIA'),
            (172, 'NAURU', 'NAURU'),
            (173, 'NEPAL', 'NEPAL'),
            (174, 'NICARÁGUA', 'NICARAGUA'),
            (175, 'NÍGER', 'NIGER'),
            (176, 'NIGÉRIA', 'NIGERIA'),
            (177, 'NIUE', 'NIUE'),
            (178, 'NORUEGA', 'NORWAY'),
            (179, 'NOVA CALEDÔNIA', 'NEW CALEDONIA'),
            (180, 'NOVA ZELÂNDIA', 'NEW ZEALAND'),
            (181, 'OMÃ', 'OMAN'),
            (182, 'PAÍSES BAIXOS', 'NETHERLANDS'),
            (183, 'PALAU', 'PALAU'),
            (184, 'PALESTINA', 'PALESTINE'),
            (185, 'PANAMÁ', 'PANAMA'),
            (186, 'PAPUA-NOVA GUINÉ', 'PAPUA NEW GUINEA'),
            (187, 'PAQUISTÃO', 'PAKISTAN'),
            (188, 'PARAGUAI', 'PARAGUAY'),
            (189, 'PERU', 'PERU'),
            (190, 'POLINÉSIA FRANCESA', 'FRENCH POLYNESIA'),
            (191, 'POLÔNIA', 'POLAND'),
            (192, 'PORTO RICO', 'PUERTO RICO'),
            (193, 'PORTUGAL', 'PORTUGAL'),
            (194, 'QUÊNIA', 'KENYA'),
            (195, 'QUIRGUIZISTÃO', 'KYRGYZSTAN'),
            (196, 'REINO UNIDO', 'UNITED KINGDOM'),
            (197, 'REPÚBLICA CHECA', 'CZECH REPUBLIC'),
            (198, 'REPÚBLICA DOMINICANA', 'DOMINICAN REPUBLIC'),
            (199, 'ROMÊNIA', 'ROMANIA'),
            (200, 'RUANDA', 'RWANDA'),
            (201, 'RÚSSIA', 'RUSSIAN FEDERATION'),
            (202, 'SAHARA OCIDENTAL', 'WESTERN SAHARA'),
            (203, 'SALVADOR', 'EL SALVADOR'),
            (204, 'SAMOA', 'SAMOA'),
            (205, 'SANTA HELENA', 'SAINT HELENA'),
            (206, 'SANTA LÚCIA', 'SAINT LUCIA'),
            (207, 'SANTA SÉ', 'HOLY SEE'),
            (208, 'SÃO CRISTÓVÃO E NEVES', 'SAINT KITTS AND NEVIS'),
            (209, 'SAN MARINO', 'SAN MARINO'),
            (210, 'SÃO PEDRO E MIQUELÃO', 'SAINT PIERRE AND MIQUELON'),
            (211, 'SÃO TOMÉ E PRÍNCIPE', 'SAO TOME AND PRINCIPE'),
            (212, 'SÃO VICENTE E GRANADINAS', 'SAINT VINCENT AND THE GRENADINES'),
            (213, 'SEICHELES', 'SEYCHELLES'),
            (214, 'SENEGAL', 'SENEGAL'),
            (215, 'SERRA LEOA', 'SIERRA LEONE'),
            (216, 'SÉRVIA', 'SERBIA'),
            (217, 'SINGAPURA', 'SINGAPORE'),
            (218, 'SÍRIA', 'SYRIA'),
            (219, 'SOMÁLIA', 'SOMALIA'),
            (220, 'SRI LANCA', 'SRI LANKA'),
            (221, 'SUAZILÂNDIA', 'SWAZILAND'),
            (222, 'SUDÃO', 'SUDAN'),
            (223, 'SUÉCIA', 'SWEDEN'),
            (224, 'SUÍÇA', 'SWITZERLAND'),
            (225, 'SURINAME', 'SURINAME'),
            (226, 'SVALBARD', 'SVALBARD'),
            (227, 'TAILÂNDIA', 'THAILAND'),
            (228, 'TAIWAN', 'TAIWAN'),
            (229, 'TAJIQUISTÃO', 'TAJIKISTAN'),
            (230, 'TANZÂNIA', 'TANZANIA'),
            (231, 'TERRITÓRIO BRITÂNICO DO OCEANO ÍNDICO', 'BRITISH INDIAN OCEAN TERRITORY'),
            (232, 'TERRITÓRIO DAS ILHAS HEARD E MCDONALD', 'HEARD ISLAND AND MCDONALD ISLANDS'),
            (233, 'TIMOR-LESTE', 'TIMOR-LESTE'),
            (234, 'TOGO', 'TOGO'),
            (235, 'TOKELAU', 'TOKELAU'),
            (236, 'TONGA', 'TONGA'),
            (237, 'TRINIDAD E TOBAGO', 'TRINIDAD AND TOBAGO'),
            (238, 'TUNÍSIA', 'TUNISIA'),
            (239, 'TURKS E CAICOS', 'TURKS AND CAICOS ISLANDS'),
            (240, 'TURQUEMENISTÃO', 'TURKMENISTAN'),
            (241, 'TURQUIA', 'TURKEY'),
            (242, 'TUVALU', 'TUVALU'),
            (243, 'UCRÂNIA', 'UKRAINE'),
            (244, 'UGANDA', 'UGANDA'),
            (245, 'URUGUAI', 'URUGUAY'),
            (246, 'USBEQUISTÃO', 'UZBEKISTAN'),
            (247, 'VANUATU', 'VANUATU'),
            (248, 'VENEZUELA', 'VENEZUELA'),
            (249, 'VIETNÃ', 'VIETNAM'),
            (250, 'WALLIS E FUTUNA', 'WALLIS AND FUTUNA'),
            (251, 'ZÂMBIA', 'ZAMBIA'),
            (252, 'ZIMBÁBUE', 'ZIMBABWE');
COMMIT;