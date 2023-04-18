SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+03:00";

--
-- Database: `antigomobilistabd`
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
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data`  datetime DEFAULT CURRENT_TIMESTAMP,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cidade`  varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_estado` int(10) NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vazio.png',
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
  `mensagem` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `imagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vazio.png',
  `marca` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ano` int(4) DEFAULT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `tipo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ponto_inicial` int(11) NOT NULL,
  `ponto_final` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  FOREIGN KEY(id_criador) REFERENCES usuarios(id)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pontos` int(11) NOT NULL DEFAULT '5',
  `nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `imagem` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vazio.png',
  `tipo` int(1) NOT NULL DEFAULT '0',
  `ativo` int(1) NOT NULL DEFAULT '1',
  `confirm_email` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `usuarios` (`id`, `pontos`, `nome`, `email`, `senha`, `imagem`, `tipo`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 5, 'Elton Ferrari', 'eltonferrari@gmail.com', '123456', 'vazio.png', 0, 1, '2023-04-03 15:11:47', '2023-04-03 15:11:47');

--
-- --------------------------------------------------------
--
-- Estrutura da tabela `estados`
--
DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
	`id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nome` varchar(25) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
	`sigla` varchar(2) COLLATE utf8_unicode_ci UNIQUE NOT NULL,
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