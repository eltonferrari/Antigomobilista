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
    `nome` varchar(255) NOT NULL,
    `data_inicio`  datetime NOT NULL,
    `data_fim`  datetime NOT NULL,
    `horario`  time DEFAULT CURRENT_TIMESTAMP,
    `endereco` varchar(100) NOT NULL,
    `cidade`  varchar(100) NOT NULL,
    `id_estado` int(10) NOT NULL,
    `descricao` varchar(255) NOT NULL,
    `imagem` varchar(100) NOT NULL DEFAULT 'img/icones/ni.png',
    `autorizado` tinyint(1) NOT NULL DEFAULT 0,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY(id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY(id_estado) REFERENCES estados(id)
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
COMMIT;