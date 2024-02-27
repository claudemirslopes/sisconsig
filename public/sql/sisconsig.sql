-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela sisconsig.avisados
CREATE TABLE IF NOT EXISTS `avisados` (
  `avisado_id` int(11) NOT NULL AUTO_INCREMENT,
  `avisado_assunto` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `avisado_mensagem` longtext NOT NULL,
  `avisado_tipo` varchar(45) NOT NULL,
  `avisado_formato` int(1) NOT NULL,
  `avisado_ativa` tinyint(1) DEFAULT NULL,
  `avisado_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`avisado_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.avisados: ~4 rows (aproximadamente)
REPLACE INTO `avisados` (`avisado_id`, `avisado_assunto`, `avisado_mensagem`, `avisado_tipo`, `avisado_formato`, `avisado_ativa`, `avisado_data_alteracao`) VALUES
	(2, 'Whatsapp', '<p><a href="https://web.whatsapp.com/send?phone=5519983642927&text=Olá, tudo bem? Sou o Franqueado Daniel garcia chermont e gostaria de tirar uma dúvida" target="_blank"><img alt="" src="http://localhost/sisconsig/public/images/home/whatsapp.jpg"></a></p>\r\n', '2', 2, 1, '2024-02-26 12:48:44'),
	(3, 'Projeto Integrador', '<p><img alt="" src="http://localhost/sisconsig/public/images/home/projeto.jpeg"></p>\r\n', '2', 2, 1, '2024-02-26 12:48:27'),
	(4, 'Cashback e Projetos', '&lt;iframe frameborder="0" height="506" src="https://player.vimeo.com/video/517278968" width="900" allow="autoplay; fullscreen" allowfullscreen&gt;&lt;/iframe&gt;\r\n', '2', 1, 1, '2021-05-24 15:37:50'),
	(5, 'Programação Q1/Q2/Q3', '<p><strong>Olá Time Bluesun!</strong></p>\r\n\r\n<p>Segue abaixo a programação para Q1/Q2/Q3. Esses dados são absolutamente sigilosos, portanto, em hipótese alguma compartilhe essa informação.</p>\r\n\r\n<p><small><strong>16/04/2021 – 3564 painéis de 415 Wp da Canadian (TIER 1)<br>\r\n19/04/2021 – 2112 painéis de 415 Wp da ULICA (TIER 1)<br>\r\n21/04/2021 – 2112 painéis de 415 Wp da ULICA (TIER 1)<br>\r\n23/04/2021 – 2112 painéis de 410 Wp da ULICA (TIER 1)<br>\r\n21/04/2021 – 2112 painéis de 415 Wp da ULICA (TIER 1)<br>\r\n30/04/2021 – 4752 painéis de 420 Wp da CANADIAN (TIER 1)<br>\r\n09/05/2021 – 3520 painéis de 415 Wp da ULICA (TIER 1)<br>\r\n28/05/2021 – 5940 painéis de 440 Wp da Ulica (TIER 1)<br>\r\n03/06/2021 – 2728 painéis de 440 Wp da TALESUN (TIER 1)</strong></small></p>\r\n\r\n<p>Confirmado a compra hoje, 12/04 a compra de 10 containers de 440Wp da ULICA. Ainda estamos em negociação com a ZN Shine para ampliar ainda mais nossa oferta de painéis. Também fechamos uma primeira compra de micro inversores do fabricantes DEYE, de 1600 Wp, podendo chegar a 2400 Wp com o overload (50%). A previsão de chegada é aproximadamente 60 dias. Acima a previsão de painéis já atualizada.<br>\r\n<br>\r\n<strong>TOTAL: 28.952 painéis CONFIRMADOS</strong></p>\r\n\r\n<p>Há a possibilidade de pequenas alterações, porém são pedidos já fechados. Serão acrescentados mais painéis de potência acima de 440 Wp da ULICA e CANADIAN a partir de abril/2021.</p>', '0', 0, 1, '2021-05-13 20:00:52');

-- Copiando estrutura para tabela sisconsig.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_nome` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.categorias: ~14 rows (aproximadamente)
REPLACE INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_data_alteracao`) VALUES
	(1, 'Painéis', 1, '2021-04-05 15:47:52'),
	(2, 'Inversores', 1, '2021-04-05 15:47:57'),
	(3, 'Stringbox CA', 1, '2021-05-26 20:12:32'),
	(4, 'Autotrafos', 1, '2021-04-05 15:47:18'),
	(5, 'Cabos Fotovoltaicos', 1, '2021-04-05 15:47:42'),
	(6, 'Telhado Cerâmico', 1, '2021-05-26 18:04:17'),
	(7, 'Laje Retrato', 1, '2021-05-27 15:07:00'),
	(8, 'Gerador', 1, '2021-05-26 18:03:28'),
	(9, 'Telhado Metálico', 1, '2021-05-26 18:04:06'),
	(10, 'Telhado Fibrocimento', 1, '2021-05-26 18:07:30'),
	(11, 'Cabos', 1, '2021-05-26 20:06:17'),
	(12, 'Stringbox CC', 1, '2021-05-26 20:12:22'),
	(13, 'Laje Paisagem Retrato', 1, '2021-05-27 14:56:38'),
	(14, 'Laje Paisagem', 1, '2021-05-27 19:08:26');

-- Copiando estrutura para tabela sisconsig.ci_session
CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.ci_session: ~13 rows (aproximadamente)
REPLACE INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('60qrbgntniqm0nflm67d47j6bocf2u3p', '::1', 1709030104, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393033303130343b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393735353132223b6c6173745f636865636b7c693a313730393032383732383b),
	('81nmm2a5o24vt3sp5lm5s7otta7nh1o8', '::1', 1709028702, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393032383730323b),
	('diguajmt418lmt8369k9nuu7sqk4hc1u', '::1', 1708973076, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937333037363b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b),
	('f25g8ork73qgod9avo8gn9luqh014iln', '::1', 1708975512, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937353531323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393638303135223b6c6173745f636865636b7c693a313730383937353531323b),
	('f2kbs34n71clivbl9v2eu19a12doqsqn', '::1', 1709028728, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393032383732383b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393735353132223b6c6173745f636865636b7c693a313730393032383732383b),
	('jvnipoditlj9465e4dpag5cs1ovmj6ti', '::1', 1708975037, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937353033373b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b),
	('k8eackf652lag7fujd3offkha0vmokn6', '::1', 1709029032, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393032393033323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393735353132223b6c6173745f636865636b7c693a313730393032383732383b),
	('ml3bigpn6nol3ack1apr9i27usddrrf6', '::1', 1709029671, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393032393637313b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393735353132223b6c6173745f636865636b7c693a313730393032383732383b),
	('o8glpin9utcedbhhhq7gn77gejfajm01', '::1', 1708975595, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937353539353b),
	('q2nvf3uka2ujpult7ksh6v7u7g5hkbtl', '::1', 1708973428, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937333432383b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b),
	('q4tsikoofa0j5tkdcrgp6l5e3olemrlo', '::1', 1708974086, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937343038363b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b),
	('rgl75kf3r7k00tpsnqu7k3nkmieafktt', '::1', 1708974734, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937343733343b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b),
	('s8ttrnovo7fb7lroi9ado51dcijbsg8u', '::1', 1709030290, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393033303130343b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393735353132223b6c6173745f636865636b7c693a313730393032383732383b),
	('v9in55ifod0gtl89t421qh9tq4jpnq9d', '::1', 1708973732, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937333733323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b),
	('vn2ncalt7at85m6i7frnr2slspgh9d0u', '::1', 1708974389, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730383937343338393b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373038393534393636223b6c6173745f636865636b7c693a313730383935353030363b);

-- Copiando estrutura para tabela sisconsig.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `cliente_pessoa` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(45) NOT NULL,
  `cliente_sobrenome` varchar(150) NOT NULL,
  `cliente_data_nascimento` date NOT NULL,
  `cliente_cpf_cnpj` varchar(30) NOT NULL,
  `cliente_rg_ie` varchar(20) DEFAULT NULL,
  `cliente_email` varchar(50) DEFAULT NULL,
  `cliente_telefone` varchar(20) DEFAULT NULL,
  `cliente_celular` varchar(20) NOT NULL,
  `cliente_cep` varchar(10) NOT NULL,
  `cliente_endereco` varchar(155) NOT NULL,
  `cliente_numero_endereco` varchar(20) NOT NULL,
  `cliente_bairro` varchar(45) NOT NULL,
  `cliente_complemento` varchar(145) NOT NULL,
  `cliente_cidade` varchar(105) NOT NULL,
  `cliente_estado` varchar(2) NOT NULL,
  `cliente_ativo` tinyint(1) NOT NULL,
  `cliente_obs` tinytext DEFAULT NULL,
  `cliente_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.clientes: ~2 rows (aproximadamente)
REPLACE INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_pessoa`, `cliente_nome`, `cliente_sobrenome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`) VALUES
	(1, '2024-02-21 17:47:17', 1, 'Bater Silva', 'Umuarama', '1945-02-21', '116.562.790-61', '35625425', 'umuarama@hot.com', '', '(13) 99858-9696', '13.483-332', 'Rua Guido José Bellon', '254', 'P. Abílio Pedro', '', 'Limeira', 'SP', 1, 'Testando apenas e tão somente', '2024-02-21 18:08:53'),
	(2, '2024-02-21 18:02:18', 1, 'Bufalo', 'de Castro Junior', '2000-02-28', '383.650.110-42', '', '', '', '(19) 98457-8361', '13.483-332', 'Rua Guido José Bellon', '658', 'Parque Residencial Abílio Pedro', '', 'Limeira', 'SP', 1, 'Mais um teste no sitema', '2024-02-21 18:09:17');

-- Copiando estrutura para tabela sisconsig.contas_pagar
CREATE TABLE IF NOT EXISTS `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`conta_pagar_id`),
  KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`),
  CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='		';

-- Copiando dados para a tabela sisconsig.contas_pagar: ~0 rows (aproximadamente)
REPLACE INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
	(1, 3, '2024-03-22', NULL, '4,578.96', 0, 'Tem que pagar em inadimplente', '2024-02-23 13:37:41');

-- Copiando estrutura para tabela sisconsig.contas_receber
CREATE TABLE IF NOT EXISTS `contas_receber` (
  `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_receber_parceiro_id` int(11) NOT NULL,
  `conta_receber_cliente_id` int(11) NOT NULL,
  `conta_receber_data_vencimento` date DEFAULT NULL,
  `conta_receber_data_pagamento` datetime DEFAULT NULL,
  `conta_receber_valor` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conta_receber_status` tinyint(1) DEFAULT NULL,
  `conta_receber_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conta_receber_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`conta_receber_id`),
  KEY `fk_conta_receber_id_parceiro` (`conta_receber_parceiro_id`),
  KEY `fk_conta_receber_id_cliente` (`conta_receber_cliente_id`),
  CONSTRAINT `fk_conta_receber_id_cliente` FOREIGN KEY (`conta_receber_cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_conta_receber_id_parceiro` FOREIGN KEY (`conta_receber_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.contas_receber: ~0 rows (aproximadamente)
REPLACE INTO `contas_receber` (`conta_receber_id`, `conta_receber_parceiro_id`, `conta_receber_cliente_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
	(1, 5, 1, '2021-05-29', NULL, '15,878.00', 0, 'Apenas para teste no sistema', '2024-02-21 18:47:43');

-- Copiando estrutura para tabela sisconsig.datasheets
CREATE TABLE IF NOT EXISTS `datasheets` (
  `datasheet_id` int(11) NOT NULL AUTO_INCREMENT,
  `datasheet_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `datasheet_file` varchar(45) DEFAULT NULL,
  `datasheet_tipo` varchar(45) DEFAULT NULL,
  `datasheet_ativo` tinyint(1) DEFAULT NULL,
  `datasheet_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`datasheet_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.datasheets: ~0 rows (aproximadamente)
REPLACE INTO `datasheets` (`datasheet_id`, `datasheet_nome`, `datasheet_file`, `datasheet_tipo`, `datasheet_ativo`, `datasheet_data_alteracao`) VALUES
	(1, 'Ulica- Mono 9bb Half cuts 405~410w (158mm cells)', 'ulica_mono_9bb.pdf', 'ULICA', 1, '2021-04-26 13:55:23');

-- Copiando estrutura para tabela sisconsig.ead_alunos_aula
CREATE TABLE IF NOT EXISTS `ead_alunos_aula` (
  `ead_aluno_aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_aluno_aula_id_aluno` int(11) NOT NULL,
  `ead_aluno_aula_id_aula` int(11) NOT NULL,
  `ead_aluno_aula_status` tinyint(1) NOT NULL DEFAULT 0,
  `ead_aluno_aula_data` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_aluno_aula_id`),
  KEY `FK1_aluno_aula` (`ead_aluno_aula_id_aula`),
  KEY `FK2_aula_parceiro` (`ead_aluno_aula_id_aluno`),
  CONSTRAINT `FK1_aluno_aula` FOREIGN KEY (`ead_aluno_aula_id_aula`) REFERENCES `ead_aulas` (`ead_aula_id`),
  CONSTRAINT `FK_ead_alunos_aula_parceiros` FOREIGN KEY (`ead_aluno_aula_id_aluno`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_alunos_aula: ~4 rows (aproximadamente)
REPLACE INTO `ead_alunos_aula` (`ead_aluno_aula_id`, `ead_aluno_aula_id_aluno`, `ead_aluno_aula_id_aula`, `ead_aluno_aula_status`, `ead_aluno_aula_data`) VALUES
	(1, 6, 1, 0, '2021-05-25 19:09:51'),
	(2, 6, 3, 0, '2021-06-09 12:10:27'),
	(3, 2, 1, 0, '2021-06-09 12:33:34'),
	(4, 6, 2, 0, '2021-06-10 15:40:43');

-- Copiando estrutura para tabela sisconsig.ead_alunos_curso
CREATE TABLE IF NOT EXISTS `ead_alunos_curso` (
  `ead_aluno_curso_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_aluno_curso_id_parceiro` int(11) NOT NULL,
  `ead_aluno_curso_id_curso` int(11) NOT NULL,
  `ead_aluno_curso_status` int(11) NOT NULL DEFAULT 0,
  `ead_aluno_curso_data` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_aluno_curso_id`),
  KEY `FK1_parceiro_curso` (`ead_aluno_curso_id_parceiro`),
  KEY `FK2_curso_curso` (`ead_aluno_curso_id_curso`),
  CONSTRAINT `FK1_parceiro_curso` FOREIGN KEY (`ead_aluno_curso_id_parceiro`) REFERENCES `parceiros` (`parceiro_id`),
  CONSTRAINT `FK2_curso_curso` FOREIGN KEY (`ead_aluno_curso_id_curso`) REFERENCES `ead_cursos` (`ead_curso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_alunos_curso: ~4 rows (aproximadamente)
REPLACE INTO `ead_alunos_curso` (`ead_aluno_curso_id`, `ead_aluno_curso_id_parceiro`, `ead_aluno_curso_id_curso`, `ead_aluno_curso_status`, `ead_aluno_curso_data`) VALUES
	(1, 1, 1, 0, '2021-06-04 19:47:18'),
	(2, 6, 2, 0, '2021-06-04 19:47:40'),
	(3, 2, 1, 0, '2021-06-04 19:50:13'),
	(4, 6, 1, 0, '2021-06-09 11:29:58');

-- Copiando estrutura para tabela sisconsig.ead_arquivos_aula
CREATE TABLE IF NOT EXISTS `ead_arquivos_aula` (
  `ead_arq_aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_arq_id_aula` int(11) NOT NULL,
  `ead_arq_aula_arquivo` varchar(150) NOT NULL,
  `ead_arq_aula_tipo` tinyint(1) NOT NULL DEFAULT 0,
  `ead_arq_aula_status` tinyint(1) NOT NULL DEFAULT 1,
  `ead_arq_aula_datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_arq_aula_id`),
  KEY `FK1_arquivo_aula` (`ead_arq_id_aula`),
  CONSTRAINT `FK1_arquivo_aula` FOREIGN KEY (`ead_arq_id_aula`) REFERENCES `ead_aulas` (`ead_aula_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.ead_arquivos_aula: ~5 rows (aproximadamente)
REPLACE INTO `ead_arquivos_aula` (`ead_arq_aula_id`, `ead_arq_id_aula`, `ead_arq_aula_arquivo`, `ead_arq_aula_tipo`, `ead_arq_aula_status`, `ead_arq_aula_datacriacao`) VALUES
	(4, 2, '768334.pdf', 0, 1, '2021-06-08 12:13:26'),
	(5, 4, '730938.doc', 1, 1, '2021-06-08 12:15:04'),
	(10, 1, '605107.pdf', 0, 1, '2021-06-08 12:45:36'),
	(12, 1, '681922.png', 2, 1, '2021-06-08 12:47:35'),
	(13, 1, '654647.doc', 1, 1, '2021-06-08 12:54:13');

-- Copiando estrutura para tabela sisconsig.ead_aulas
CREATE TABLE IF NOT EXISTS `ead_aulas` (
  `ead_aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_aula_id_curso` int(11) NOT NULL,
  `ead_aula_titulo` varchar(150) NOT NULL,
  `ead_aula_mod` varchar(150) NOT NULL,
  `ead_aula_url` varchar(150) DEFAULT NULL,
  `ead_aula_duracao` time DEFAULT NULL,
  `ead_aula_tipo` tinyint(1) NOT NULL DEFAULT 0,
  `ead_aula_status` tinyint(1) NOT NULL DEFAULT 1,
  `ead_aula_datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_aula_id`),
  KEY `FK_aula_curso` (`ead_aula_id_curso`),
  CONSTRAINT `FK_aula_curso` FOREIGN KEY (`ead_aula_id_curso`) REFERENCES `ead_cursos` (`ead_curso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_aulas: ~9 rows (aproximadamente)
REPLACE INTO `ead_aulas` (`ead_aula_id`, `ead_aula_id_curso`, `ead_aula_titulo`, `ead_aula_mod`, `ead_aula_url`, `ead_aula_duracao`, `ead_aula_tipo`, `ead_aula_status`, `ead_aula_datacriacao`) VALUES
	(1, 1, 'Introdução', 'Módulo 1', 'https://player.vimeo.com/video/284765552', '02:14:00', 1, 1, '2021-05-25 18:52:11'),
	(2, 1, 'Primeiros Passos', 'Módulo 1', '', '07:45:00', 0, 1, '2021-05-25 18:54:14'),
	(3, 2, 'Introdução a Eletricidade', 'Módulo 1', '', '04:15:15', 0, 1, '2021-06-04 19:44:40'),
	(4, 1, 'Sequência', 'Módulo 2', 'https://www.youtube.com/embed/DSb_Q7C7bFM', '03:43:00', 1, 1, '2021-06-07 18:44:10'),
	(5, 2, 'Ensinando Alguma Coisa', 'Módulo 1', 'https://www.youtube.com/embed/_GsjINcgCYc', '05:37:00', 1, 1, '2021-06-08 14:43:54'),
	(6, 3, 'Ensinando a Realizar', 'Módulo 1', 'https://www.youtube.com/embed/_GsjINcgCYc', '02:03:00', 1, 1, '2021-06-08 14:47:26'),
	(7, 4, 'Introdução ao Conteúdo', 'Módulo 1', 'https://www.youtube.com/embed/DSb_Q7C7bFM', '02:05:00', 1, 1, '2021-06-08 16:03:31'),
	(8, 1, 'Mais uma Aula', 'Módulo 2', 'https://www.youtube.com/embed/L0FQb3RMfPg', '00:03:54', 1, 0, '2021-06-10 16:30:11'),
	(9, 2, 'Eletromagnetismo', 'Módulo 1', 'https://www.youtube.com/embed/zpOULjyy-n8', '00:05:01', 1, 1, '2021-06-10 19:34:39');

-- Copiando estrutura para tabela sisconsig.ead_comentarios
CREATE TABLE IF NOT EXISTS `ead_comentarios` (
  `ead_comentario_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_comentario_id_aula` int(11) NOT NULL,
  `ead_comentario_id_aluno` int(11) NOT NULL,
  `ead_comentario_titulo` varchar(60) NOT NULL,
  `ead_comentario_mensagem` tinytext NOT NULL,
  `ead_comentario_resposta` tinytext NOT NULL,
  `ead_comentario_status` tinyint(1) NOT NULL DEFAULT 0,
  `ead_comentario_atualiza` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `ead_comentario_data` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_comentario_id`),
  KEY `FK1_comAula` (`ead_comentario_id_aula`),
  KEY `FK2_comParceiro` (`ead_comentario_id_aluno`) USING BTREE,
  CONSTRAINT `FK1_comAula` FOREIGN KEY (`ead_comentario_id_aula`) REFERENCES `ead_aulas` (`ead_aula_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK2_comAluno` FOREIGN KEY (`ead_comentario_id_aluno`) REFERENCES `parceiros` (`parceiro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_comentarios: ~2 rows (aproximadamente)
REPLACE INTO `ead_comentarios` (`ead_comentario_id`, `ead_comentario_id_aula`, `ead_comentario_id_aluno`, `ead_comentario_titulo`, `ead_comentario_mensagem`, `ead_comentario_resposta`, `ead_comentario_status`, `ead_comentario_atualiza`, `ead_comentario_data`) VALUES
	(2, 2, 2, 'Quem descobriu o Brasil, Sherlock Holmes?', 'Gostaria de saber que descobriu o Brasil e para isso estou consultando o Sherlock Holmes', 'Quem descobriu o Brasil foi o Senhor Pedro Alvares Cabral meu caro Watson', 1, '2021-06-11 12:03:57', '2021-06-11 12:01:55'),
	(3, 1, 6, 'Qual a capital do estado brasileiro do Rio Grande do Norte?', 'Gostaria de saber qual é a capital do estado brasileiro do Rio Grande do Norte, podem me responder', '', 0, NULL, '2021-06-11 15:52:29');

-- Copiando estrutura para tabela sisconsig.ead_cursos
CREATE TABLE IF NOT EXISTS `ead_cursos` (
  `ead_curso_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_curso_titulo` varchar(150) NOT NULL,
  `ead_curso_datainicio` date NOT NULL,
  `ead_curso_tipo` tinyint(1) DEFAULT 0,
  `ead_curso_status` tinyint(1) DEFAULT 1,
  `ead_curso_img` varchar(50) DEFAULT NULL,
  `ead_curso_tutor` int(11) unsigned NOT NULL,
  `ead_curso_datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_curso_id`) USING BTREE,
  KEY `FK1_userTutor` (`ead_curso_tutor`),
  CONSTRAINT `FK1_userTutor` FOREIGN KEY (`ead_curso_tutor`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_cursos: ~5 rows (aproximadamente)
REPLACE INTO `ead_cursos` (`ead_curso_id`, `ead_curso_titulo`, `ead_curso_datainicio`, `ead_curso_tipo`, `ead_curso_status`, `ead_curso_img`, `ead_curso_tutor`, `ead_curso_datacriacao`) VALUES
	(1, 'Como Utilizar a Plataforma', '2021-06-18', 0, 1, '166610.jpg', 2, '2021-05-25 18:51:14'),
	(2, 'Sistema Fotovoltaico', '2021-06-07', 1, 1, '624050.jpg', 2, '2021-06-04 16:17:29'),
	(3, 'Como Criar um Orçamento', '2021-06-22', 1, 1, '186492.jpg', 2, '2021-06-04 16:19:59'),
	(4, 'Trocar Logo do Site', '2021-08-14', 2, 0, '159471.jpg', 2, '2021-06-04 16:29:07'),
	(6, 'Curso de Programação Básica', '2021-06-25', 2, 1, '830590.jpg', 2, '2021-06-11 19:24:10');

-- Copiando estrutura para tabela sisconsig.ead_modulos
CREATE TABLE IF NOT EXISTS `ead_modulos` (
  `ead_modulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_modulo_curso_id` int(11) NOT NULL,
  `ead_modulo_titulo` varchar(150) NOT NULL,
  `ead_modulo_datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_modulo_id`) USING BTREE,
  KEY `FK1_cursoMod` (`ead_modulo_curso_id`),
  CONSTRAINT `FK1_cursoMod` FOREIGN KEY (`ead_modulo_curso_id`) REFERENCES `ead_cursos` (`ead_curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.ead_modulos: ~10 rows (aproximadamente)
REPLACE INTO `ead_modulos` (`ead_modulo_id`, `ead_modulo_curso_id`, `ead_modulo_titulo`, `ead_modulo_datacriacao`) VALUES
	(1, 1, 'Módulo 1', '2021-06-10 17:45:08'),
	(2, 1, 'Módulo 2', '2021-06-10 17:45:24'),
	(3, 1, 'Módulo 3', '2021-06-10 19:25:08'),
	(4, 4, 'Módulo 1', '2021-06-10 19:26:08'),
	(5, 4, 'Módulo 2', '2021-06-10 19:26:24'),
	(6, 4, 'Módulo 3', '2021-06-10 19:26:32'),
	(7, 4, 'Módulo 4', '2021-06-10 19:26:42'),
	(8, 3, 'Módulo 1', '2021-06-10 19:27:10'),
	(9, 3, 'Módulo 2', '2021-06-10 19:27:19'),
	(10, 2, 'Módulo 1', '2021-06-10 19:27:38');

-- Copiando estrutura para tabela sisconsig.ead_modulos_curso
CREATE TABLE IF NOT EXISTS `ead_modulos_curso` (
  `ead_modulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_modulo_curso_id` int(11) NOT NULL DEFAULT 0,
  `ead_modulo_nome` varchar(50) NOT NULL,
  `ead_modulo_datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_modulo_id`),
  KEY `FK1_mod_curso` (`ead_modulo_curso_id`),
  CONSTRAINT `FK1_mod_curso` FOREIGN KEY (`ead_modulo_curso_id`) REFERENCES `ead_cursos` (`ead_curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_modulos_curso: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.formas_pagamentos
CREATE TABLE IF NOT EXISTS `formas_pagamentos` (
  `forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `forma_pagamento_nome` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `forma_pagamento_aceita_parc` tinyint(1) DEFAULT NULL,
  `forma_pagamento_ativa` tinyint(1) DEFAULT NULL,
  `forma_pagamento_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`forma_pagamento_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.formas_pagamentos: ~4 rows (aproximadamente)
REPLACE INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
	(1, 'Dinheiro', 0, 1, '2021-04-05 15:59:59'),
	(2, 'Cartão de Débito', 0, 1, '2021-04-05 16:00:40'),
	(3, 'Cartão de Crédito', 1, 1, '2021-04-05 16:00:35'),
	(4, 'Depósito Bancário', 0, 1, '2021-04-05 16:00:58'),
	(5, 'PIX', 0, 1, '2024-02-23 10:09:33');

-- Copiando estrutura para tabela sisconsig.fornecedores
CREATE TABLE IF NOT EXISTS `fornecedores` (
  `fornecedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `fornecedor_razao` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_nome_fantasia` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_cnpj` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_ie` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_telefone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_celular` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_contato` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_cep` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_endereco` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_numero_endereco` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_bairro` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_complemento` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_cidade` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_ativo` tinyint(1) DEFAULT NULL,
  `fornecedor_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fornecedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`fornecedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.fornecedores: ~2 rows (aproximadamente)
REPLACE INTO `fornecedores` (`fornecedor_id`, `fornecedor_data_cadastro`, `fornecedor_razao`, `fornecedor_nome_fantasia`, `fornecedor_cnpj`, `fornecedor_ie`, `fornecedor_telefone`, `fornecedor_celular`, `fornecedor_email`, `fornecedor_contato`, `fornecedor_cep`, `fornecedor_endereco`, `fornecedor_numero_endereco`, `fornecedor_bairro`, `fornecedor_complemento`, `fornecedor_cidade`, `fornecedor_estado`, `fornecedor_ativo`, `fornecedor_obs`, `fornecedor_data_alteracao`) VALUES
	(2, '2024-02-23 12:06:44', 'PERDIGAO AGROINDUSTRIAL S/A', 'Perdigão do Brasil', '82.829.730/0001-64', '', '(11) 3545-2585', '(11) 98585-8558', 'contato@perdigao.com.br', 'Lucas Perdiz', '05.350-000', 'Avenida Escola Politécnica', '722', 'Rio Pequeno', '', 'São Paulo', 'SP', 1, '', '2024-02-23 12:06:44'),
	(3, '2024-02-23 12:17:35', 'CLAUDEMIR DA SILVA LOPES 28413291860', 'Open Beta Informática', '42.933.544/0001-56', '54545454', '(19) 9845-7836', '(19) 98457-8361', 'equipe@tanamesa.com', 'Claudio Lopes', '13.487-185', 'Rua Rúbens Quadros', '358', 'Jardim Anhangüera', '', 'Limeira', 'SP', 1, '', '2024-02-23 13:34:39');

-- Copiando estrutura para tabela sisconsig.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.groups: ~8 rows (aproximadamente)
REPLACE INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'comercial', 'Comercial'),
	(3, 'gerencia', 'Gerência'),
	(4, 'logistica', 'Logística'),
	(5, 'franquia', 'Franquia'),
	(6, 'qualidade', 'Qualidade'),
	(7, 'financeiro', 'Financeiro'),
	(8, 'projeto', 'Projeto');

-- Copiando estrutura para tabela sisconsig.kbs
CREATE TABLE IF NOT EXISTS `kbs` (
  `kb_id` int(11) NOT NULL AUTO_INCREMENT,
  `kb_titulo` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kb_resumo` tinytext DEFAULT NULL,
  `kb_texto` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kb_tipo` tinyint(1) DEFAULT NULL,
  `kb_ativo` tinyint(1) DEFAULT NULL,
  `kb_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`kb_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.kbs: ~2 rows (aproximadamente)
REPLACE INTO `kbs` (`kb_id`, `kb_titulo`, `kb_resumo`, `kb_texto`, `kb_tipo`, `kb_ativo`, `kb_data_alteracao`) VALUES
	(4, 'Cadastrar novo autorizado', 'Este KB é um breve tutorial de como cadastrar um novo autorizado pela plataforma administrativa, neste caso pode ser cadastrado tanto um novo franqueado ou um integrador, basta seguir todos os passos deste tutorial que está disponível', '<h4>Primeiro passo:</h4>\r\n\r\n<ol xss=removed>\r\n <li>Acessar o menu de cadastro e clicar em pessoas</li>\r\n <li>Em seguida clicar em autorizados</li>\r\n <li>Clicar no botão novo autorizado</li>\r\n</ol>\r\n\r\n<h4>Segundo passo:</h4>\r\n\r\n<ol xss=removed>\r\n <li>Escolher o tipo de pessoa, física ou jurídica</li>\r\n <li>Digitar todos os campos do formulário</li>\r\n <li>Clicar no botão cadastrar autorizado</li>\r\n</ol>', 0, 1, '2024-02-25 12:26:47'),
	(5, 'Como criar um orçamento', 'Etapa 1: Dados do Parceiro: Para criar um orçamento nesta plataforma, o autorizado deverá preencher os dados pessoais do parceiro para deixar arquivado como meio de identificação e avançar para a próxima etapa.', '<p><em><strong>O orçamento será dividido em 4 Etapas</strong></em></p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Etapa 1: Dados do Parceiro</strong></p>\r\n\r\n<p>Para criar um orçamento nesta plataforma, o autorizado deverá preencher os dados pessoais do parceiro para deixar arquivado como meio de identificação e avançar para a próxima etapa.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Etapa 2: Dados de Consumo</strong></p>\r\n\r\n<p>Nesta etapa será necessário preencher o consumo dos últimos 13 meses do parceiro para que o sistema tire uma média segura na hora de gerar o orçamento.</p>\r\n\r\n<p>Nesta etapa o autorizado também deverá informar se o parceiro pertence ao Grupo A ou Grupo B</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Grupos: </strong>"A unidade consumidora de energia elétrica é classificada em dois grupos: A e B. O grupo A (alta tensão) é composto por unidades consumidoras que recebem energia em tensão igual ou superior a 2,3 kilovolts (kV) ou são atendidas a partir de sistema subterrâneo de distribuição em tensão secundária, caracterizado pela tarifa binômia (aplicada ao consumo e à demanda faturável). No grupo A, subdividido em seis subgrupos, geralmente se enquadram indústrias e estabelecimentos comerciais de médio ou grande porte.</p>\r\n\r\n<p>O grupo B (baixa tensão) é caracterizado por unidades consumidoras atendidas em tensão inferior a 2,3 kV, com tarifa monômia (aplicável apenas ao consumo). Está subdividido em quatro subgrupos. O consumidor do tipo B1 é o residencial. O consumidor rural é chamado de B2, enquanto estabelecimentos comerciais ou industriais de pequeno porte, como por exemplo uma pastelaria ou uma marcenaria, são classificados como B3. A iluminação pública é enquadrada no subgrupo B4.”</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Etapa 3: Dados para o Sistema Fotovoltaico</strong></p>\r\n\r\n<p>Nesta etapa o Autorizado deverá preencher informações sobre a irradiação na área da instalação, custo da energia elétrica da região e a concessionária fornecedora de energia.</p>\r\n\r\n<p> </p>\r\n\r\n<p><strong>Etapa 4: Finalização</strong></p>\r\n\r\n<p>Nesta última etapa o Autorizado já terá a quantidade de painéis necessários para o sitema e o valor do Kit Fotovoltaico da Bluesun, faltando apenas informar a margem de lucro e descontos que deseja aplicar ao parceiro.</p>\r\n\r\n<p> </p>\r\n\r\n<p>Pronto, seu orçamento está arquivado em sua área de restrita para acessos futuros!</p>', 0, 1, '2024-02-25 12:26:07');

-- Copiando estrutura para tabela sisconsig.kits
CREATE TABLE IF NOT EXISTS `kits` (
  `kit_id` int(11) NOT NULL AUTO_INCREMENT,
  `kit_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kit_file` varchar(45) DEFAULT NULL,
  `kit_tipo` varchar(45) DEFAULT NULL,
  `kit_ativo` tinyint(1) DEFAULT NULL,
  `kit_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`kit_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.kits: ~0 rows (aproximadamente)
REPLACE INTO `kits` (`kit_id`, `kit_nome`, `kit_file`, `kit_tipo`, `kit_ativo`, `kit_data_alteracao`) VALUES
	(1, 'Logotipo com Medidas (PDF)', 'logo_pdf.pdf', 'LOGO', 1, '2021-04-26 14:09:49');

-- Copiando estrutura para tabela sisconsig.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.login_attempts: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `marca_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca_nome` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`marca_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.marcas: ~14 rows (aproximadamente)
REPLACE INTO `marcas` (`marca_id`, `marca_nome`, `marca_ativa`, `marca_data_alteracao`) VALUES
	(1, 'Ulica Solar', 1, '2021-04-05 15:43:14'),
	(2, 'Monoperc', 1, '2021-04-05 15:43:29'),
	(3, 'Poliperc', 1, '2021-04-05 15:43:42'),
	(4, 'SAJ', 1, '2021-04-05 15:45:26'),
	(5, 'Growatt', 1, '2021-04-05 15:44:40'),
	(6, 'Fronius', 1, '2021-04-05 15:45:09'),
	(7, 'Solis', 1, '2021-04-05 15:45:22'),
	(8, 'Sofar', 1, '2021-04-05 15:45:33'),
	(9, 'Sungrow', 1, '2021-04-05 15:45:46'),
	(11, 'ProAuto', 1, '2021-04-05 15:46:16'),
	(12, 'SMA', 1, '2021-05-26 16:18:03'),
	(13, 'Canadian', 1, '2021-05-27 14:58:20'),
	(14, 'ZNShine Solar', 1, '2021-05-27 15:03:58');

-- Copiando estrutura para tabela sisconsig.orcamentos
CREATE TABLE IF NOT EXISTS `orcamentos` (
  `orc_id` int(11) NOT NULL AUTO_INCREMENT,
  `orc_codigo` varchar(21) NOT NULL DEFAULT '',
  `orc_cli_parceiro_id` int(11) NOT NULL,
  `orc_cli_pessoa` tinyint(1) NOT NULL,
  `orc_cli_nome` varchar(150) NOT NULL,
  `orc_cli_email` varchar(55) NOT NULL,
  `orc_cli_cpf_cnpj` varchar(30) NOT NULL,
  `orc_cli_telcel` varchar(20) NOT NULL,
  `orc_cli_uniconsum` varchar(50) DEFAULT '',
  `orc_cli_cep` varchar(15) NOT NULL,
  `orc_cli_endereco` varchar(50) NOT NULL,
  `orc_cli_numero` varchar(10) DEFAULT '',
  `orc_cli_complemento` varchar(30) NOT NULL,
  `orc_cli_bairro` varchar(50) NOT NULL,
  `orc_cli_cidade` varchar(50) NOT NULL,
  `orc_cli_estado` char(2) NOT NULL,
  `orc_tipo_grupo` char(2) DEFAULT NULL,
  `orc_valor_kw_atual` decimal(4,2) DEFAULT NULL,
  `orc_tipo_contrato` varchar(200) DEFAULT NULL,
  `orc_tensao` smallint(1) DEFAULT NULL,
  `orc_demanda_contratada` int(6) DEFAULT NULL,
  `orc_valor_demanda_contratada` decimal(12,2) DEFAULT NULL,
  `orc_irradiacao_local_dia` decimal(4,2) DEFAULT NULL,
  `orc_area_painel` decimal(4,2) DEFAULT NULL,
  `orc_inclinacao_ideal` int(2) DEFAULT NULL,
  `orc_eficiencia_painel` decimal(3,2) DEFAULT NULL,
  `orc_potencia_painel` mediumint(3) DEFAULT 340,
  `orc_id_painel` smallint(2) DEFAULT 2,
  `orc_energia_media_gerada` decimal(7,2) DEFAULT NULL,
  `orc_energia_total_gerada_mes` int(5) DEFAULT NULL,
  `orc_total_paineis_necessarios` int(5) DEFAULT NULL,
  `orc_total_paineis_demanda` int(5) DEFAULT NULL,
  `orc_total_paineis_fora_ponta` int(5) DEFAULT NULL,
  `orc_paineis_adicionais` int(5) DEFAULT NULL,
  `orc_demanda_apos_sistema` int(5) DEFAULT NULL,
  `orc_valor_demanda_apos_sistema` decimal(12,2) DEFAULT NULL,
  `orc_potencia_total_sistema` decimal(7,2) DEFAULT NULL,
  `orc_valor_perda` int(2) DEFAULT 20,
  `orc_valor_conta` decimal(12,2) DEFAULT NULL,
  `orc_valor_kw_ponta` decimal(5,2) DEFAULT NULL,
  `orc_valor_kw_fora_ponta` decimal(5,2) DEFAULT NULL,
  `orc_consumo_ponta` int(5) DEFAULT NULL,
  `orc_consumo_fora_ponta` int(5) DEFAULT NULL,
  `orc_consumo_mes1` int(5) DEFAULT NULL,
  `orc_consumo_mes2` int(5) DEFAULT NULL,
  `orc_consumo_mes3` int(5) DEFAULT NULL,
  `orc_consumo_mes4` int(5) DEFAULT NULL,
  `orc_consumo_mes5` int(5) DEFAULT NULL,
  `orc_consumo_mes6` int(5) DEFAULT NULL,
  `orc_consumo_mes7` int(5) DEFAULT NULL,
  `orc_consumo_mes8` int(5) DEFAULT NULL,
  `orc_consumo_mes9` int(5) DEFAULT NULL,
  `orc_consumo_mes10` int(5) DEFAULT NULL,
  `orc_consumo_mes11` int(5) DEFAULT NULL,
  `orc_consumo_mes12` int(5) DEFAULT NULL,
  `orc_consumo_mes13` int(5) DEFAULT NULL,
  `orc_consumo_mes_media` int(5) DEFAULT NULL,
  `orc_concessionaria` varchar(100) DEFAULT NULL,
  `orc_sobrepreco` smallint(2) DEFAULT NULL,
  `orc_desconto` smallint(2) DEFAULT NULL,
  `orc_valor_original` decimal(12,2) DEFAULT NULL,
  `orc_valor_final` decimal(12,2) DEFAULT NULL,
  `orc_orcamento` char(2) DEFAULT NULL,
  `orc_situacao` smallint(1) DEFAULT NULL,
  `orc_projeto` smallint(1) DEFAULT NULL,
  `orc_mao_de_obra` smallint(1) DEFAULT NULL,
  `orc_marca_inversor` smallint(1) DEFAULT NULL,
  `orc_cabo_preto` int(4) DEFAULT NULL,
  `orc_cabo_verde` int(4) DEFAULT NULL,
  `orc_seguro` smallint(1) DEFAULT NULL,
  `orc_engenharia` smallint(1) DEFAULT NULL,
  `orc_aterramento` smallint(1) DEFAULT NULL,
  `orc_chapa` smallint(1) DEFAULT NULL,
  `orc_estrutura_telhado` smallint(1) DEFAULT NULL,
  `orc_tipo_estrutura` smallint(1) DEFAULT NULL,
  `orc_kva25` smallint(2) DEFAULT NULL,
  `orc_kva35` smallint(2) DEFAULT NULL,
  `orc_kva75` smallint(2) DEFAULT NULL,
  `orc_kva90` smallint(2) DEFAULT NULL,
  `orc_metalico_presilha_lateral` mediumint(4) DEFAULT NULL,
  `orc_metalico_presilha_superior` mediumint(4) DEFAULT NULL,
  `orc_metalico_trilhos_segmentados` mediumint(4) DEFAULT NULL,
  `orc_metalico_prensa_cabo` mediumint(4) DEFAULT NULL,
  `orc_ceramico_presilha_lateral` mediumint(4) DEFAULT NULL,
  `orc_ceramico_presilha_superior` mediumint(4) DEFAULT NULL,
  `orc_ceramico_ganchos` mediumint(4) DEFAULT NULL,
  `orc_ceramico_perfil_1` mediumint(4) DEFAULT NULL,
  `orc_ceramico_perfil_2` mediumint(4) DEFAULT NULL,
  `orc_ceramico_perfil_3` mediumint(4) DEFAULT NULL,
  `orc_ceramico_perfil_4` mediumint(4) DEFAULT NULL,
  `orc_ceramico_emendas` mediumint(4) DEFAULT NULL,
  `orc_ceramico_prensa_cabo` mediumint(4) DEFAULT NULL,
  `orc_fibro_presilha_lateral` mediumint(4) DEFAULT NULL,
  `orc_fibro_presilha_superior` mediumint(4) DEFAULT NULL,
  `orc_fibro_haste_L` mediumint(4) DEFAULT NULL,
  `orc_fibro_perfil_1` mediumint(4) DEFAULT NULL,
  `orc_fibro_perfil_2` mediumint(4) DEFAULT NULL,
  `orc_fibro_perfil_3` mediumint(4) DEFAULT NULL,
  `orc_fibro_perfil_4` mediumint(4) DEFAULT NULL,
  `orc_emendas` mediumint(4) DEFAULT NULL,
  `orc_prensa_cabo` mediumint(4) DEFAULT NULL,
  `orc_conector_mc4` mediumint(4) DEFAULT NULL,
  `orc_forma_pagamento` smallint(1) DEFAULT NULL,
  `orc_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `orc_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orc_status` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`orc_id`) USING BTREE,
  KEY `FK1_orc_parceiros` (`orc_cli_parceiro_id`) USING BTREE,
  CONSTRAINT `FK1_orc_parceiro` FOREIGN KEY (`orc_cli_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de orçamento dos franqueados/integradores';

-- Copiando dados para a tabela sisconsig.orcamentos: ~3 rows (aproximadamente)
REPLACE INTO `orcamentos` (`orc_id`, `orc_codigo`, `orc_cli_parceiro_id`, `orc_cli_pessoa`, `orc_cli_nome`, `orc_cli_email`, `orc_cli_cpf_cnpj`, `orc_cli_telcel`, `orc_cli_uniconsum`, `orc_cli_cep`, `orc_cli_endereco`, `orc_cli_numero`, `orc_cli_complemento`, `orc_cli_bairro`, `orc_cli_cidade`, `orc_cli_estado`, `orc_tipo_grupo`, `orc_valor_kw_atual`, `orc_tipo_contrato`, `orc_tensao`, `orc_demanda_contratada`, `orc_valor_demanda_contratada`, `orc_irradiacao_local_dia`, `orc_area_painel`, `orc_inclinacao_ideal`, `orc_eficiencia_painel`, `orc_potencia_painel`, `orc_id_painel`, `orc_energia_media_gerada`, `orc_energia_total_gerada_mes`, `orc_total_paineis_necessarios`, `orc_total_paineis_demanda`, `orc_total_paineis_fora_ponta`, `orc_paineis_adicionais`, `orc_demanda_apos_sistema`, `orc_valor_demanda_apos_sistema`, `orc_potencia_total_sistema`, `orc_valor_perda`, `orc_valor_conta`, `orc_valor_kw_ponta`, `orc_valor_kw_fora_ponta`, `orc_consumo_ponta`, `orc_consumo_fora_ponta`, `orc_consumo_mes1`, `orc_consumo_mes2`, `orc_consumo_mes3`, `orc_consumo_mes4`, `orc_consumo_mes5`, `orc_consumo_mes6`, `orc_consumo_mes7`, `orc_consumo_mes8`, `orc_consumo_mes9`, `orc_consumo_mes10`, `orc_consumo_mes11`, `orc_consumo_mes12`, `orc_consumo_mes13`, `orc_consumo_mes_media`, `orc_concessionaria`, `orc_sobrepreco`, `orc_desconto`, `orc_valor_original`, `orc_valor_final`, `orc_orcamento`, `orc_situacao`, `orc_projeto`, `orc_mao_de_obra`, `orc_marca_inversor`, `orc_cabo_preto`, `orc_cabo_verde`, `orc_seguro`, `orc_engenharia`, `orc_aterramento`, `orc_chapa`, `orc_estrutura_telhado`, `orc_tipo_estrutura`, `orc_kva25`, `orc_kva35`, `orc_kva75`, `orc_kva90`, `orc_metalico_presilha_lateral`, `orc_metalico_presilha_superior`, `orc_metalico_trilhos_segmentados`, `orc_metalico_prensa_cabo`, `orc_ceramico_presilha_lateral`, `orc_ceramico_presilha_superior`, `orc_ceramico_ganchos`, `orc_ceramico_perfil_1`, `orc_ceramico_perfil_2`, `orc_ceramico_perfil_3`, `orc_ceramico_perfil_4`, `orc_ceramico_emendas`, `orc_ceramico_prensa_cabo`, `orc_fibro_presilha_lateral`, `orc_fibro_presilha_superior`, `orc_fibro_haste_L`, `orc_fibro_perfil_1`, `orc_fibro_perfil_2`, `orc_fibro_perfil_3`, `orc_fibro_perfil_4`, `orc_emendas`, `orc_prensa_cabo`, `orc_conector_mc4`, `orc_forma_pagamento`, `orc_data_emissao`, `orc_data_alteracao`, `orc_status`) VALUES
	(1, '2736451095834789', 1, 1, 'Claudemir da Silva Lopes', 'claumirlopes@gmail.com', '284.132.918-60', '(19) 98457-8361', 'Elektro', '13.484-473', 'Rua Joaquim Ernesto de Castro', '54', '', 'Jardim São Paulo', 'Limeira', 'SP', 'A', 0.00, '', 0, 200, 25.00, 0.00, 0.00, 0, 0.00, 340, 2, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 20, 25.00, 25.00, 25.00, 25, 25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0.00, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-05 03:00:00', '2021-05-05 19:12:43', 1),
	(2, '2140069359875824', 1, 1, 'Eliane Rocha de Freitas Lopes', 'lifreitaslopes@gmail.com', '964.301.686-20', '(19) 98457-8363', '4568745', '13.483-332', 'Rua Guido José Bellon', '209', '', 'Parque Residencial Abílio Pedro', 'Limeira', 'SP', 'B', 0.00, '', 0, 0, 0.00, 0.00, 0.00, 0, 0.00, 340, 2, 0.00, 0, 0, 0, 0, 0, 0, 0.00, 0.00, 20, 0.00, 0.00, 0.00, 0, 0, 125, 254, 125, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0.00, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-05-05 03:00:00', '2021-05-05 19:35:30', 1),
	(3, '1945580231046826', 3, 1, 'Buffalos Bill da Silva', 'bufallos@bill.silva', '639.226.830-88', '(19) 98558-8445', '548788', '13.482-050', 'Rua Francisco Orlando Stocco', '458', '', 'Jardim Ouro Verde', 'Limeira', 'SP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 340, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-13 03:00:00', '2021-05-13 13:02:50', 1);

-- Copiando estrutura para tabela sisconsig.ordem_tem_servicos
CREATE TABLE IF NOT EXISTS `ordem_tem_servicos` (
  `ordem_ts_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem_ts_id_servico` int(11) DEFAULT NULL,
  `ordem_ts_id_ordem_servico` int(11) DEFAULT NULL,
  `ordem_ts_quantidade` int(11) DEFAULT NULL,
  `ordem_ts_valor_unitario` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_ts_valor_desconto` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_ts_valor_total` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`ordem_ts_id`),
  KEY `fk_ordem_ts_id_servico` (`ordem_ts_id_servico`),
  KEY `fk_ordem_ts_id_ordem_servico` (`ordem_ts_id_ordem_servico`),
  CONSTRAINT `fk_ordem_ts_id_ordem_servico` FOREIGN KEY (`ordem_ts_id_ordem_servico`) REFERENCES `ordens_servicos` (`ordem_servico_id`) ON DELETE CASCADE,
  CONSTRAINT `fk_ordem_ts_id_servico` FOREIGN KEY (`ordem_ts_id_servico`) REFERENCES `servicos` (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

-- Copiando dados para a tabela sisconsig.ordem_tem_servicos: ~4 rows (aproximadamente)
REPLACE INTO `ordem_tem_servicos` (`ordem_ts_id`, `ordem_ts_id_servico`, `ordem_ts_id_ordem_servico`, `ordem_ts_quantidade`, `ordem_ts_valor_unitario`, `ordem_ts_valor_desconto`, `ordem_ts_valor_total`) VALUES
	(8, 2, 2, 2, ' 351.00', '5 ', 'R$ 666.90'),
	(9, 3, 2, 3, ' 658.00', '10 ', 'R$ 1776.60'),
	(12, 2, 1, 2, ' 351.00', '0 ', 'R$ 702.00'),
	(13, 3, 1, 3, ' 658.00', '0 ', 'R$ 1974.00');

-- Copiando estrutura para tabela sisconsig.ordens_servicos
CREATE TABLE IF NOT EXISTS `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_parceiro_id` int(11) DEFAULT NULL,
  `ordem_servico_pedido` varchar(10) NOT NULL,
  `ordem_servico_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `ordem_servico_data_conclusao` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_equipamento` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_marca_equipamento` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_modelo_equipamento` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_acessorios` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_defeito` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_valor_desconto` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_valor_total` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_status` tinyint(1) DEFAULT NULL,
  `ordem_servico_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ordem_servico_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`ordem_servico_id`),
  KEY `fk_ordem_servico_id_parceiro` (`ordem_servico_parceiro_id`),
  KEY `fk_ordem_servico_id_forma_pagto` (`ordem_servico_forma_pagamento_id`),
  CONSTRAINT `fk_ordem_servico_id_forma_pagto` FOREIGN KEY (`ordem_servico_forma_pagamento_id`) REFERENCES `formas_pagamentos` (`forma_pagamento_id`),
  CONSTRAINT `fk_ordem_servico_id_parceiro` FOREIGN KEY (`ordem_servico_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.ordens_servicos: ~2 rows (aproximadamente)
REPLACE INTO `ordens_servicos` (`ordem_servico_id`, `ordem_servico_forma_pagamento_id`, `ordem_servico_parceiro_id`, `ordem_servico_pedido`, `ordem_servico_data_emissao`, `ordem_servico_data_conclusao`, `ordem_servico_equipamento`, `ordem_servico_marca_equipamento`, `ordem_servico_modelo_equipamento`, `ordem_servico_acessorios`, `ordem_servico_defeito`, `ordem_servico_valor_desconto`, `ordem_servico_valor_total`, `ordem_servico_status`, `ordem_servico_obs`, `ordem_servico_data_alteracao`) VALUES
	(1, NULL, 10, '2053689417', '2024-02-23 19:04:52', NULL, 'Televisor de 20&amp;amp;#039;', 'Samsung', 'SAM-3587', 'Nenhum', 'Está quebrado por dentro', 'R$ 0.00', '2,676.00', 0, 'Apenas consertar1', '2024-02-23 19:42:21'),
	(2, NULL, 4, '9253106784', '2024-02-23 19:20:23', NULL, 'Fogão de 3 bocas', 'Dako', 'H54-789', 'Nenhum', 'Bocas entupidas', 'R$ 232.50', '2,443.50', 0, 'Apenas uma obs1', '2024-02-23 19:31:50');

-- Copiando estrutura para tabela sisconsig.parceiros
CREATE TABLE IF NOT EXISTS `parceiros` (
  `parceiro_id` int(11) NOT NULL AUTO_INCREMENT,
  `parceiro_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `parceiro_pessoa` tinyint(1) DEFAULT NULL,
  `parceiro_tipo` tinyint(1) NOT NULL,
  `parceiro_nome` varchar(45) NOT NULL,
  `parceiro_sobrenome` varchar(150) NOT NULL,
  `parceiro_responsavel` varchar(250) NOT NULL,
  `parceiro_data_nascimento` date NOT NULL,
  `parceiro_cpf_cnpj` varchar(30) NOT NULL,
  `parceiro_rg_ie` varchar(20) DEFAULT NULL,
  `parceiro_email` varchar(50) NOT NULL,
  `parceiro_telefone` varchar(20) NOT NULL,
  `parceiro_celular` varchar(20) NOT NULL,
  `parceiro_cep` varchar(10) NOT NULL,
  `parceiro_endereco` varchar(155) NOT NULL,
  `parceiro_numero_endereco` varchar(20) NOT NULL,
  `parceiro_bairro` varchar(45) NOT NULL,
  `parceiro_complemento` varchar(145) NOT NULL,
  `parceiro_cidade` varchar(105) NOT NULL,
  `parceiro_estado` varchar(2) NOT NULL,
  `parceiro_img` tinyint(4) DEFAULT 0,
  `parceiro_img_perfil` varchar(50) DEFAULT '0',
  `parceiro_user` varchar(50) DEFAULT NULL,
  `parceiro_senha` longtext NOT NULL,
  `parceiro_ativo` tinyint(1) NOT NULL,
  `parceiro_obs` tinytext DEFAULT NULL,
  `parceiro_logo` tinyint(1) DEFAULT 0,
  `parceiro_logo_franquia` varchar(50) DEFAULT '0',
  `parceiro_id_nivacesso` int(11) DEFAULT 1,
  `parceiro_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.parceiros: ~9 rows (aproximadamente)
REPLACE INTO `parceiros` (`parceiro_id`, `parceiro_data_cadastro`, `parceiro_pessoa`, `parceiro_tipo`, `parceiro_nome`, `parceiro_sobrenome`, `parceiro_responsavel`, `parceiro_data_nascimento`, `parceiro_cpf_cnpj`, `parceiro_rg_ie`, `parceiro_email`, `parceiro_telefone`, `parceiro_celular`, `parceiro_cep`, `parceiro_endereco`, `parceiro_numero_endereco`, `parceiro_bairro`, `parceiro_complemento`, `parceiro_cidade`, `parceiro_estado`, `parceiro_img`, `parceiro_img_perfil`, `parceiro_user`, `parceiro_senha`, `parceiro_ativo`, `parceiro_obs`, `parceiro_logo`, `parceiro_logo_franquia`, `parceiro_id_nivacesso`, `parceiro_data_alteracao`) VALUES
	(1, '2021-04-05 15:27:47', 2, 2, 'Alpha Solaris do Brasil', 'Alpha Solaris', 'Marco Paulo Ribeiro', '2017-05-25', '82.140.514/0001-07', '82.140.514/0001-07', 'alpha@photo.com', '(19) 3445-5544', '(19) 98588-7788', '13.482-050', 'Rua Francisco Orlando Stocco', '442', 'Jardim Ouro Verde', 'Fundos', 'Limeira', 'SP', 1, '0', 'alpha', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 1, 'Teste para verificar cadastro', 0, '712507.png', 1, '2021-06-17 12:41:09'),
	(2, '2021-04-05 15:29:27', 2, 1, 'Solar Beta do Nordeste', 'Solar Beta', 'Severino Lampião', '2014-08-26', '49.659.874/0001-44', '748.424.891.681', 'solar@beta.nor', '(61) 4545-4545', '(61) 95859-5859', '52.050-500', 'Avenida Santos Dumont', '2547', 'Rosarinho', '', 'Recife', 'PE', 0, '0', 'solarbeta', '8cb2237d0679ca88db6464eac60da96345513964', 1, '', 1, '0', 1, '2021-06-17 12:49:06'),
	(3, '2021-04-06 17:32:49', 2, 1, 'Habacuque Sol e Lua', 'Habacuque SL', 'Benjamin Ribeiro', '2002-02-22', '85.359.657/0001-00', '68829734-0', 'haba@com.br', '(88) 3225-5885', '(88) 98585-8585', '60.160-150', 'Rua Pereira Filgueiras', '222', 'Centro', '', 'Fortaleza', 'CE', 0, '0', 'habacuque', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '', 1, '728873.png', 1, '2021-06-18 12:56:34'),
	(4, '2021-05-03 18:14:49', 1, 1, 'Luis', 'Natalino Flores', 'Luis Natalino Flores', '1987-05-21', '862.948.140-49', '', 'luis@natalino.flores', '(13) 4875-8758', '(13) 98545-7899', '11.360-030', 'Rua Tapuias', '35', 'Parque São Vicente', '', 'São Vicente', 'SP', 0, '0', 'natalino', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 1, 'Parceiro ainda não tem CNPJ', 1, '816625.png', 1, '2021-06-17 18:32:57'),
	(5, '2021-05-21 12:09:25', 1, 1, 'Mário', 'Heleno da Silva', 'Mário Heleno da Silva', '1978-05-15', '445.637.720-89', '25445665', 'mario@heleno.com', '(21) 1225-5221', '(21) 98558-8558', '24.005-900', 'Avenida Ernani do Amaral Peixoto', '455', 'Centro', '', 'Niterói', 'RJ', 0, '0', 'marioheleno', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 1, 'Ainda não assinou o contrato', 1, '0', 1, '2021-06-17 12:49:14'),
	(6, '2021-06-04 12:16:17', 1, 1, 'Abilene', 'Colegário Hains', 'Abilene Calegário Hains', '2000-02-22', '567.016.600-02', '544558855', 'abilene.hains@gmail.com', '(13) 3665-5445', '(13) 98558-8558', '11.360-050', 'Rua Francisco Martins dos Santos', '254', 'Parque São Vicente', '', 'São Vicente', 'SP', 0, '19565.jpg', 'abilene', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 1, '', 1, '0', 1, '2021-06-18 13:28:47'),
	(8, '2021-06-04 12:48:02', 1, 2, 'Luiza', 'Mel Lisboa', 'Luiza Mel Lisboa', '1978-05-22', '299.673.290-17', '', 'luiza@mel.lisboa', '', '(19) 98585-8585', '13.484-454', 'Rua Estudante José Antônio Cover', '254', 'Jardim Esmeralda', '', 'Limeira', 'SP', 0, '0', 'luizamel', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 0, 'Nada a declarar', 0, '847421.png', 1, '2021-06-17 17:54:22'),
	(10, '2021-06-19 20:17:13', 1, 1, 'Hélio', 'Miguel dos Anjos', 'Hélio Miguel dos Anjos', '2000-02-23', '880.379.850-16', '', 'helinho@toplo.com.br', '', '(19) 98558-8999', '13.487-185', 'Rua Rúbens Quadros', '358', 'Jardim Anhangüera', '', 'Limeira', 'SP', 0, '0', 'helinho', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 1, NULL, 0, '0', 1, '2021-06-19 20:17:13'),
	(11, '2021-06-19 20:39:25', 1, 0, 'Sebastião', 'da Letra Sobrinho', 'Sebastião da Letra Sobrinho', '1978-08-22', '841.329.140-20', '43.731.329-3', 'seba@dasletras.com', '(33) 5525-5445', '(33) 9854-5252', '35.041-110', 'Rua C', '254', 'Vila dos Montes', '', 'Governador Valadares', 'MG', 0, '0', 'seba2021', '917fae5dd8d700bd3a603fc0da75a472eba47d1b', 1, NULL, 0, '0', 1, '2021-06-20 12:22:25');

-- Copiando estrutura para tabela sisconsig.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_codigo` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `produto_categoria_id` int(11) NOT NULL,
  `produto_marca_id` int(11) NOT NULL,
  `produto_fornecedor_id` int(11) NOT NULL,
  `produto_parceiro_id` int(11) NOT NULL,
  `produto_descricao` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_unidade` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_codigo_barras` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_ncm` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_preco_custo` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_preco_venda` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_potencia` varchar(50) DEFAULT NULL,
  `produto_eficiencia` varchar(6) DEFAULT NULL,
  `produto_codigo_interno` varchar(20) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_img` varchar(50) DEFAULT NULL,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`produto_id`),
  KEY `produto_categoria_id` (`produto_categoria_id`,`produto_marca_id`,`produto_fornecedor_id`),
  KEY `fk_produto_marca_id` (`produto_marca_id`),
  KEY `fk_produto_forncedor_id` (`produto_fornecedor_id`),
  KEY `fk_produto_parceiro_id` (`produto_parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.produtos: ~147 rows (aproximadamente)
REPLACE INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_fornecedor_id`, `produto_parceiro_id`, `produto_descricao`, `produto_unidade`, `produto_codigo_barras`, `produto_ncm`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_potencia`, `produto_eficiencia`, `produto_codigo_interno`, `produto_ativo`, `produto_obs`, `produto_img`, `produto_data_alteracao`) VALUES
	(1, '61724850', '2021-05-26 12:34:14', 7, 1, 0, 0, 'Painel Fotovoltaico 340 Wp POLICRISTALINO', 'Un', '', '', '526,00', '526,00', '3', '5', '127', '0.1714', 'BLU10794638', 0, 'BLUULIC340 nnn', '1968292e010aebd80afb754e9aa1cdcf.jpg', '2024-02-22 12:32:44'),
	(2, '29104356', '2021-05-26 12:50:54', 2, 7, 0, 0, 'Inversor Solis 3KWp', 'Un', '', '', '1.946,88', '1.946,88', '3', '21', '3', '', 'BLU16985420', 1, 'BLUSOLIS3K', NULL, '2021-05-26 15:56:24'),
	(3, '29517403', '2021-05-26 12:52:42', 2, 7, 0, 0, 'Inversor Solis 5KWp', 'Un', '', '', '2.841,42', '2.841,42', '3', '20', '5', '', 'BLU68403571', 1, 'BLUSOLIS5.0KW', NULL, '2021-05-26 15:56:39'),
	(4, '93741062', '2021-05-26 12:53:35', 2, 7, 0, 0, 'Inversor Solis 20KWp', 'Un', '', '', '6.143,00', '6.143,00', '3', '20', '20', '', 'BLU78619235', 1, 'BLUSOLIS20K', NULL, '2021-05-26 15:56:51'),
	(5, '75916402', '2021-05-26 12:54:22', 2, 7, 0, 0, 'Inversor Solis 30KWp', 'Un', '', '', '11.230,00', '11.230,00', '3', '15', '30', '', 'BLU64017892', 1, 'BLUSOLIS30KW', NULL, '2021-05-26 15:57:02'),
	(6, '30872561', '2021-05-26 12:56:06', 2, 7, 0, 0, 'Inversor Solis 60KWp', 'Un', '', '', '17.051,88', '17.051,88', '3', '20', '60', '', 'BLU47390185', 1, 'BLUSOLIS60K', NULL, '2021-05-26 15:57:12'),
	(7, '25173960', '2021-05-26 13:00:39', 2, 4, 0, 0, 'Inversor SAJ 3KWp', 'Un', '', '', '1.871,33', '1.871,33', '3', '28', '3', '', 'BLU61345809', 1, 'BLUSAJ3K', NULL, '2024-02-21 22:57:21'),
	(8, '05613274', '2021-05-26 13:07:08', 2, 4, 0, 0, 'Inversor SAJ 5KWp-R5', 'Un', '', '', '2.635,29', '2.635,29', '5', '5', '5', '', 'BLU91583267', 1, 'BLUSAJ5K', 'cfa70ba0dfeadb2e796b592993e6291d.jpg', '2024-02-22 18:06:34'),
	(9, '93061527', '2021-05-26 13:10:44', 2, 4, 0, 0, 'Inversor SAJ 20KWp 380V', 'Un', '', '', '7.472,55', '7.472,55', '3', '4', '20', '', 'BLU46510972', 1, 'BLUSAJ20K', NULL, '2024-02-26 17:26:21'),
	(10, '07936185', '2021-05-26 13:14:58', 2, 4, 0, 0, 'Inversor SAJ 33KWp 380V', 'Un', '', '', '9.751,64', '9.751,64', '3', '4', '33', '', 'BLU02968571', 1, 'BLUSAJ33K', NULL, '2024-02-24 12:59:29'),
	(11, '40359726', '2021-05-26 13:17:33', 2, 4, 0, 0, 'Inversor SAJ 60KWp 380V', 'Un', '', '', '14.396,47', '14.396,47', '3', '1', '60', '', 'BLU30758126', 1, 'BLUSAJ60K', NULL, '2021-05-26 16:17:33'),
	(12, '52416309', '2021-05-26 13:19:46', 2, 12, 0, 0, 'Inversor SMA 3KWp', 'Un', '', '', '0,00', '0,00', '3', '0', '3', '', 'BLU15269304', 0, 'BLUSAM3K', NULL, '2021-05-26 16:27:17'),
	(13, '50976243', '2021-05-26 13:21:09', 2, 12, 0, 0, 'Inversor SMA 5KWp', 'Un', '', '', '0,00', '0,00', '3', '0', '5', '', 'BLU69438721', 0, 'BLUSMA5K', NULL, '2021-05-26 16:21:09'),
	(14, '14780269', '2021-05-26 13:27:07', 2, 12, 0, 0, 'Inversor SMA 20KWp 380V', 'Un', '', '', '0,00', '0,00', '3', '0', '20', '', 'BLU27601453', 0, 'BLUSMA20K', NULL, '2021-05-26 16:27:07'),
	(15, '27430951', '2021-05-26 13:28:42', 2, 12, 0, 0, 'Inversor SMA 30KWp 380V', 'Un', '', '', '0,00', '0,00', '3', '0', '30', '', 'BLU58143967', 0, 'BLUSAM30K', NULL, '2021-05-26 17:30:13'),
	(16, '83265947', '2021-05-26 14:28:58', 2, 12, 0, 0, 'Inversor SMA 60KWp 380V', 'Un', '', '', '0,00', '0,00', '3', '0', '60', '', 'BLU47019583', 0, 'BLUSMA60K', NULL, '2021-05-26 17:30:07'),
	(17, '05687234', '2021-05-26 14:29:58', 2, 6, 0, 0, 'Inversor Fronius 4KWp', 'Un', '', '', '5.770,98', '5.770,98', '3', '3', '4', '', 'BLU40529316', 1, 'BLUFRON4.0-1', NULL, '2021-05-26 17:31:17'),
	(18, '76983120', '2021-05-26 14:32:00', 2, 6, 0, 0, 'Inversor Fronius 5KWp', 'Un', '', '', '6.349,37', '6.349,37', '3', '1', '5', '', 'BLU54819702', 1, 'BLUFRO5.0-1', NULL, '2021-05-26 17:34:22'),
	(19, '85037421', '2021-05-26 14:33:27', 2, 6, 0, 0, 'Inversor Fronius 15KWp 220V', 'Un', '', '', '14.994,88', '14.994,88', '3', '15', '15', '', 'BLU30942561', 1, 'BLUFRO15K220LV', NULL, '2021-05-26 17:34:37'),
	(20, '20768541', '2021-05-26 14:35:51', 2, 6, 0, 0, 'Inversor Fronius 15KWp 380V', 'Un', '', '', '13.809,99', '13.809,99', '3', '15', '15', '', 'BLU69501748', 1, 'BLUFRO15K380', NULL, '2021-05-26 17:35:51'),
	(21, '24503186', '2021-05-26 16:55:04', 8, 0, 0, 0, 'Gerador 25 KVA', 'Un', '', '', '2.320,00', '2.320,00', '5', '15', '25', '', 'BLU48597320', 1, 'BLUTRA25KVA01', NULL, '2021-05-26 20:00:20'),
	(22, '93481275', '2021-05-26 17:01:56', 8, 0, 0, 0, 'Gerador 35 KVA', 'Un', '', '', '2.680,00', '2.680,00', '3', '3', '35', '', 'BLU04326798', 1, 'BLUTRA35KVA01', NULL, '2021-05-26 20:01:56'),
	(23, '30482197', '2021-05-26 17:03:44', 8, 0, 0, 0, 'Gerador 75 KVA', 'Un', '', '', '4.522,00', '4.522,00', '3', '1', '75', '', 'BLU63287419', 1, 'BLUTRA75KVA01', NULL, '2024-02-24 13:18:18'),
	(24, '07912843', '2021-05-26 17:07:05', 11, 0, 0, 0, 'Cabo Preto', 'Mts', '', '', '7,50', '7,50', '3', '32', '', '', 'BLU07145689', 1, 'BLUCBFVP004', NULL, '2024-02-26 17:22:51'),
	(25, '94785062', '2021-05-26 17:07:59', 11, 0, 0, 0, 'Cabo Vermelho', 'Mts', '', '', '7,50', '7,50', '3', '30', '', '', 'BLU78695402', 1, 'BLUCBFVV004', NULL, '2024-02-24 13:18:18'),
	(26, '16745032', '2021-05-26 17:08:42', 11, 0, 0, 0, 'Cabo Verde', 'Mts', '', '', '9,10', '9,10', '3', '35', '', '', 'BLU59374801', 1, 'BLUFVD6003A', NULL, '2021-05-26 20:08:55'),
	(27, '10324596', '2021-05-26 17:13:21', 3, 0, 0, 0, 'Quadro Elétrico BR5', 'Un', '', '', '31,06', '31,06', '3', '3', '', '', 'BLU61328574', 1, 'BLUBRU005', NULL, '2024-02-26 17:26:21'),
	(28, '59081723', '2021-05-26 17:14:20', 3, 0, 0, 0, 'Quadro Elétrico BR9', 'Un', '', '', '44,32', '44,32', '3', '5', '', '', 'BLU06759283', 1, 'BLUBRU009', NULL, '2021-05-26 20:14:20'),
	(29, '67238495', '2021-05-26 17:15:24', 3, 0, 0, 0, 'Quadro Elétrico BR24', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU75904682', 0, 'BLUBRU024', NULL, '2021-05-26 20:15:24'),
	(30, '98207451', '2021-05-26 17:16:06', 3, 0, 0, 0, 'Quadro Elétrico BR36', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU08259163', 0, 'BLUBRU036', NULL, '2021-05-26 20:16:06'),
	(31, '20578943', '2021-05-26 17:17:19', 3, 0, 0, 0, 'Prensa Cabo Steck Bsp 1/2', 'Un', '', '', '1,75', '1,75', '3', '0', '', '', 'BLU27358194', 1, 'BLUPREC0001', NULL, '2024-02-24 12:54:39'),
	(32, '14376298', '2021-05-27 10:46:40', 3, 0, 0, 0, 'Disjuntor C 32 JNG CA 400V', 'Un', '', '', '17,74', '17,74', '3', '3', '', '', 'BLU83725091', 1, 'BLUDJU2P32CA', NULL, '2024-02-26 17:22:51'),
	(33, '83624791', '2021-05-27 10:47:26', 3, 0, 0, 0, 'Disjuntor C 40 JNG CA 400V', 'Un', '', '', '29,95', '29,95', '3', '15', '', '', 'BLU74623015', 1, 'BLUDJU3P40CA', NULL, '2021-05-27 13:47:26'),
	(34, '81243690', '2021-05-27 10:49:17', 3, 0, 0, 0, 'Disjuntor C 100 JNG CA', 'Un', '', '', '60,81', '60,81', '3', '5', '', '', 'BLU59028431', 1, 'BLUDJU3P100CA', NULL, '2021-05-27 13:49:17'),
	(35, '17584392', '2021-05-27 10:50:10', 3, 0, 0, 0, 'Barramento Terra 6-parafuso M4x10 2- Parafusos 3.5x20mm', 'Un', '', '', '8,09', '8,09', '3', '15', '', '', 'BLU10286379', 1, 'BLUTERRABRT01', NULL, '2021-05-27 13:50:10'),
	(36, '01459276', '2021-05-27 11:00:59', 3, 0, 0, 0, 'Barramento Neutro 6 Paraf M4x10mm 2-paraf 3.5x20mm', 'Un', '', '', '8,09', '8,09', '3', '7', '', '', 'BLU97538624', 1, 'BLURN001', NULL, '2024-02-24 12:54:39'),
	(37, '21738569', '2021-05-27 11:01:40', 12, 0, 0, 0, 'Dps Jng Jby1 275vca 20 Ka', 'Un', '', '', '30,72', '30,72', '3', '15', '', '', 'BLU61278594', 1, 'BLUDPS00020', NULL, '2021-05-27 14:01:40'),
	(38, '65410837', '2021-05-27 11:02:29', 12, 0, 0, 0, 'Chave Seccionadora 1000vdc 32a 4p Suntree Modelo Siso - 40 Md', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU18032567', 0, 'BLUCH32SEC', NULL, '2021-05-27 14:02:29'),
	(39, '43625917', '2021-05-27 11:03:25', 3, 0, 0, 0, 'DPS 275 JNG CA 15KA MAX 40Ka', 'Un', '', '', '30,72', '30,72', '3', '3', '', '', 'BLU26497801', 1, 'BLUDPS275CA', NULL, '2021-05-27 14:03:25'),
	(40, '51069428', '2021-05-27 11:04:36', 12, 0, 0, 0, 'Porta Fusí­vel Gpv 2p Dc1500v Mod Srd-30 10x38', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU92385071', 1, 'BLUPFU0001', NULL, '2021-05-27 14:04:46'),
	(41, '32476580', '2021-05-27 11:05:44', 12, 0, 0, 0, 'Fusível Gpv 15a - 1500v', 'Un', '', '', '25,92', '25,92', '3', '3', '', '', 'BLU86501732', 1, 'BLUFUS1000VVC', NULL, '2021-05-27 14:05:56'),
	(42, '24510798', '2021-05-27 11:07:08', 3, 0, 0, 0, 'Placa Geração Própria', 'Un', '', '', '6,60', '6,60', '3', '3', '', '', 'BLU25183496', 1, 'BLUPLGER001', NULL, '2024-02-26 17:26:21'),
	(43, '40823791', '2021-05-27 11:08:30', 12, 0, 0, 0, 'Etiqueta Branca Bluesun Para Inversores', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU76095381', 0, '', NULL, '2021-05-27 14:08:30'),
	(44, '28754016', '2021-05-27 11:12:21', 9, 0, 0, 0, 'Presilhas Laterais com Parafusos (Metálico)', 'Un', '', '', '6,89', '6,89', '3', '0', '', '', 'BLU17203896', 1, 'L00402100301PM', NULL, '2024-02-24 13:18:18'),
	(45, '24839016', '2021-05-27 11:16:36', 9, 0, 0, 0, 'Presilhas Superiores com Parafusos (Metálico)', 'Un', '', '', '6,93', '6,93', '3', '3', '', '', 'BLU68041759', 1, 'L00402100201P', NULL, '2021-05-27 14:22:57'),
	(46, '98371502', '2021-05-27 11:19:55', 9, 0, 0, 0, 'Trilhos Segmentados com Parafusos (Metálico)', 'Un', '', '', '11,34', '11,34', '3', '5', '', '', 'BLU38269405', 1, 'LM0402100101', NULL, '2021-05-27 14:22:44'),
	(47, '28356901', '2021-05-27 11:36:24', 6, 0, 0, 0, 'Presilhas Laterais com Parafusos (Cerâmico/Fibro)', 'Un', '', '', '6,89', '6,89', '3', '3', '', '', 'BLU05312964', 1, 'L00402100301P', NULL, '2021-05-27 14:36:41'),
	(48, '81596340', '2021-05-27 11:38:09', 6, 0, 0, 0, 'Presilhas Superiores com Parafusos (Cerâmico/Fibro)', 'Un', '', '', '6,93', '6,93', '3', '3', '', '', 'BLU12905864', 1, 'L00402100201P', NULL, '2021-05-27 14:38:09'),
	(49, '48753921', '2021-05-27 11:39:24', 6, 0, 0, 0, 'Ganchos Completos com Parafusos (Cerâmico)', 'Un', '', '', '28,06', '28,06', '3', '2', '', '', 'BLU78364195', 1, 'L0040201001P', NULL, '2024-02-26 17:26:21'),
	(50, '71304695', '2021-05-27 11:40:36', 6, 0, 0, 0, 'Perfil 2,2m (Cerâmico/Fibro)', 'Un', '', '', '41,54', '41,54', '3', '5', '', '', 'BLU25946307', 1, 'Perfil 2,2m (CerÃ¢mico/ Fibro)', NULL, '2021-05-27 14:40:36'),
	(51, '56701293', '2021-05-27 11:46:40', 6, 0, 0, 0, 'Perfil 3,250m (Cerâmico/Fibro)', 'Un', '', '', '41,54', '41,54', '3', '0', '', '', 'BLU56431792', 1, 'L0040201102N', NULL, '2021-05-27 14:46:55'),
	(52, '36158497', '2021-05-27 11:47:41', 6, 0, 0, 0, 'Perfil 1,1m  (Cerâmico/Fibro)', 'Un', '', '', '22,84', '22,84', '3', '3', '', '', 'BLU68097142', 1, '', NULL, '2021-05-27 14:47:41'),
	(53, '45083261', '2021-05-27 11:48:33', 6, 0, 0, 0, 'Perfil 4,1m  (Cerâmico/Fibro)', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU90478652', 0, '', NULL, '2021-05-27 14:48:33'),
	(54, '54867391', '2021-05-27 11:49:07', 10, 0, 0, 0, 'Presilhas Laterais com Parafusos (Fibrocimento)', 'Un', '', '', '6,89', '6,89', '3', '5', '', '', 'BLU71523689', 1, '', NULL, '2021-05-27 14:49:21'),
	(55, '79604218', '2021-05-27 11:49:53', 10, 0, 0, 0, 'Presilhas Superiores com Parafusos  (Fibrocimento)', 'Un', '', '', '6,93', '6,93', '3', '15', '', '', 'BLU94602158', 1, '', NULL, '2021-05-27 14:49:53'),
	(56, '19587602', '2021-05-27 11:50:38', 6, 0, 0, 0, 'Haste &quot;L&quot; Completas com Parafusos (Fibro)', 'Un', '', '', '16,75', '16,75', '3', '3', '', '', 'BLU87219530', 1, 'L00402100601P', NULL, '2021-05-27 14:50:38'),
	(57, '98437652', '2021-05-27 11:51:19', 10, 0, 0, 0, 'Perfil 2,2m (Fibrocimento)', 'Un', '', '', '42,53', '42,53', '3', '5', '', '', 'BLU32710649', 1, '', NULL, '2021-05-27 14:51:19'),
	(58, '14958703', '2021-05-27 11:51:53', 10, 0, 0, 0, 'Perfil 3,250m (Fibrocimento)', 'Un', '', '', '57,03', '57,03', '3', '3', '', '', 'BLU42658793', 1, '', NULL, '2021-05-27 14:51:53'),
	(59, '21840576', '2021-05-27 11:52:27', 10, 0, 0, 0, 'Perfil 1,1m  (Fibrocimento)', 'Un', '', '', '23,03', '23,03', '3', '2', '', '', 'BLU67843059', 1, '', NULL, '2021-05-27 14:52:27'),
	(60, '05217638', '2021-05-27 11:52:56', 10, 0, 0, 0, 'Perfil 4,1m (Fibrocimento)', 'Un', '', '', '0,00', '0,00', '3', '0', '', '', 'BLU91786543', 0, '', NULL, '2021-05-27 14:52:56'),
	(61, '60592487', '2021-05-27 11:55:29', 11, 0, 0, 0, 'Cabo Azul', 'Mts', '', '', '7,50', '7,50', '3', '25', '', '', 'BLU13078452', 1, 'BLUCBCAP001', NULL, '2024-02-24 12:54:39'),
	(62, '10457986', '2021-05-27 11:56:10', 13, 0, 0, 0, 'Porcas 1.0', 'Un', '', '', '0,32', '0,32', '3', '55', '', '', 'BLU91847523', 1, '', NULL, '2021-05-27 14:56:48'),
	(63, '15927346', '2021-05-27 11:58:01', 1, 13, 0, 0, 'Painel Fotovoltaico 420 Wp Canadian POLIPERC/HALF CELL', 'Un', '', '', '547,00', '660,00', '3', '1', '420', '0.1880', 'BLU13695478', 1, 'BLUCAN420', NULL, '2024-02-24 13:18:18'),
	(64, '73081549', '2021-05-27 11:59:17', 12, 0, 0, 0, 'Conector Solar 4 - 6mm2 (MC6)', 'Un', '', '', '9,90', '9,90', '3', '15', '', '', 'BLU14372908', 1, 'BLUCONMC6', NULL, '2021-05-27 14:59:17'),
	(65, '93165480', '2021-05-27 12:00:07', 3, 0, 0, 0, 'Disjuntor C 150 3 Polos JNG CA 800V', 'Un', '', '', '208,20', '208,20', '3', '3', '', '', 'BLU28061539', 1, 'BLUDJU3P150CA', NULL, '2021-05-27 15:00:07'),
	(66, '50149278', '2021-05-27 12:01:14', 1, 13, 0, 0, 'Painel Fotovoltaico 450 Wp Canadian MONOPERC', 'Un', '', '', '772,00', '772,00', '3', '15', '450', '0.2190', 'BLU68243017', 0, 'BLUCAN450', NULL, '2021-06-20 13:05:55'),
	(67, '79064132', '2021-05-27 12:02:05', 12, 11, 0, 0, 'ProAuto 22484 (SB 6E-6S - 1000V)', 'Un', '', '', '1.126,47', '1.126,47', '3', '3', '', '', 'BLU21038597', 1, 'BLUPRO22484', NULL, '2021-05-27 15:02:05'),
	(68, '42895603', '2021-05-27 12:03:23', 13, 14, 0, 0, 'Painel Fotovoltaico 405 Wp ZNShine Solar Mono Half Cell', 'Un', '', '', '680,00', '680,00', '3', '2', '', '0.1997', 'BLU74935612', 0, 'BLUZNS405', NULL, '2021-06-20 13:04:01'),
	(69, '57046132', '2021-05-27 12:06:44', 7, 0, 0, 0, 'Junção 2.0', 'Un', '', '', '12,89', '12,89', '3', '1', '', '', 'BLU67810453', 1, 'L00402100501P', NULL, '2021-05-27 15:07:16'),
	(70, '71305462', '2021-05-27 12:08:11', 12, 11, 0, 0, 'ProAuto 23682 (SB 1E-1S - 1000V)', 'Un', '', '', '297,89', '297,89', '3', '1', '', '', 'BLU39864170', 1, 'BLUPRO23682', NULL, '2021-05-27 15:12:41'),
	(71, '59716840', '2021-05-27 14:46:05', 12, 11, 0, 0, 'ProAuto 24753 (SB 2E-2S - 1000V)', 'Un', '', '', '503,79', '503,79', '3', '3', '', '', 'BLU53798061', 1, 'BLUPRO24753', NULL, '2021-05-27 17:47:40'),
	(72, '26791083', '2021-05-27 14:47:24', 1, 13, 0, 0, 'Painel Fotovoltaico 410 Wp Canadian POLIPERC', 'Un', '', '', '653,00', '653,00', '3', '5', '410', '0.1870', 'BLU48035629', 0, 'BLUCAN410', NULL, '2021-06-20 13:04:18'),
	(73, '10934728', '2021-05-27 14:48:38', 3, 0, 0, 0, 'Disjuntor C 50 2 Polos JNG CA', 'Un', '', '', '19,33', '19,33', '3', '3', '', '', 'BLU51739426', 1, 'BLUDJU2P50CA', NULL, '2021-05-27 17:48:38'),
	(74, '31670298', '2021-05-27 15:01:04', 2, 9, 0, 0, 'Caixa de Ligação 1500vcc (8 Entradas Duplas 30A Saída 250A)', 'Un', '', '', '0,00', '0,00', '3', '0', '1500', '', 'BLU94618705', 0, 'BLUSUNGROW', NULL, '2021-05-27 18:01:21'),
	(75, '26910873', '2021-05-27 15:02:30', 13, 1, 0, 0, 'Painel Fotovoltaico 415 Wp Ulica Solar MONOPERC', 'Un', '', '', '717,27', '717,27', '3', '3', '415', '0.2020', 'BLU74632185', 0, 'BLUULIC415', NULL, '2021-06-20 13:05:24'),
	(76, '74513962', '2021-05-27 15:04:49', 13, 1, 0, 0, 'Painel Fotovoltaico 450 Wp Ulica Solar MONOPERC', 'Un', '', '', '772,00', '772,00', '3', '3', '415', '0.237', 'BLU61509432', 0, 'BLUULIC450', NULL, '2021-06-20 13:05:03'),
	(77, '42170358', '2021-05-27 15:06:19', 6, 0, 0, 0, 'Presilha Aterramento (Cerâmico/Fibro)', 'Un', '', '', '12,45', '12,45', '3', '3', '', '', 'BLU42517896', 1, 'L00402101201P', NULL, '2021-05-27 18:06:19'),
	(78, '49310875', '2021-05-27 15:08:06', 2, 9, 0, 0, 'Inversor SUNGROW 125KWp', 'Un', '', '', '60.000,00', '60.000,00', '3', '5', '125', '', 'BLU91203847', 1, 'BLUINVSUNGROW', NULL, '2021-05-27 18:08:06'),
	(79, '41237906', '2021-05-27 15:09:05', 9, 0, 0, 0, 'Parafuso Autobrocante 4.8x19mm', 'Un', '', '', '3,80', '3,80', '3', '5', '', '', 'BLU43187260', 1, 'BLUPRD00030', NULL, '2021-05-27 18:09:05'),
	(80, '65782401', '2021-05-27 15:10:00', 3, 0, 0, 0, 'Disjuntor C 40 2 Polos JNG CA 400V', 'Un', '', '', '19,33', '19,33', '5', '5', '', '', 'BLU93247618', 1, 'BLUDJU2P40CA', NULL, '2021-05-27 18:10:00'),
	(81, '82745390', '2021-05-27 15:11:05', 1, 13, 0, 0, 'Painel Fotovoltaico 415 Wp Canadian POLIPERC', 'Un', '', '', '683,00', '683,00', '3', '10', '415', '0.1880', 'BLU52139048', 0, 'BLUCAN415', NULL, '2021-06-20 13:04:48'),
	(82, '98153604', '2021-05-27 15:40:43', 2, 7, 0, 0, 'Inversor Solis 30KWp LV', 'Un', '', '', '14.998,00', '14.998,00', '3', '3', '30', '', 'BLU30654892', 1, 'Inversor Solis 30KWp LV', NULL, '2021-05-27 18:40:43'),
	(83, '47809531', '2021-05-27 15:43:04', 12, 11, 0, 0, 'ProAuto 23879 (CFB 12E-12S - 1100V)', 'Un', '', '', '1.553,66', '1.553,66', '3', '3', '', '', 'BLU29657013', 1, 'BLUPRO23879', NULL, '2021-05-27 18:43:04'),
	(84, '42709658', '2021-05-27 15:45:26', 12, 11, 0, 0, 'ProAuto 22483 (CFB 10E-10S - 1100V)', 'Un', '', '', '1.317,04', '1.317,04', '3', '2', '', '', 'BLU42631805', 1, 'BLUPRO22483', NULL, '2021-05-27 18:45:26'),
	(85, '58190237', '2021-05-27 15:46:23', 12, 11, 0, 0, 'ProAuto 24712 (SFB 4E-1S - 23635)', 'Un', '', '', '522,36', '522,36', '3', '3', '', '', 'BLU07192453', 1, 'BLUPRO23635', NULL, '2021-05-27 18:46:23'),
	(86, '92715803', '2021-05-27 15:47:36', 12, 11, 0, 0, 'ProAuto 23634 (SB 3/6E-3/6S - 1000V)', 'Un', '', '', '1.126,47', '1.126,47', '3', '5', '', '', 'BLU97140628', 1, 'BLUPRO23634', NULL, '2021-05-27 18:47:36'),
	(87, '76598143', '2021-05-27 15:50:06', 12, 11, 0, 0, 'ProAuto 20395 (SB 2/4E-2S - 600V)', 'Un', '', '', '503,79', '503,79', '3', '5', '', '', 'BLU87569402', 1, 'BLUPRO20395', NULL, '2021-05-27 18:50:06'),
	(88, '34061857', '2021-05-27 15:50:49', 12, 11, 0, 0, 'ProAuto 22886 (SB 2/4E-2/4S - 1010V)', 'Un', '', '', '579,33', '579,33', '3', '5', '', '', 'BLU64819035', 1, 'BLUPRO22886', NULL, '2021-05-27 18:50:49'),
	(89, '82913470', '2021-05-27 15:51:36', 2, 8, 0, 0, 'Inversor Sofar 8KWp', 'Un', '', '', '4.200,00', '4.200,00', '3', '10', '8', '', 'BLU50987614', 1, 'BLUSOFAR8K', NULL, '2021-05-27 18:51:36'),
	(90, '53092187', '2021-05-27 15:52:29', 2, 7, 0, 0, 'Inversor Solis 20KWp LV', 'Un', '', '', '12.987,60', '12.987,60', '3', '15', '', '', 'BLU38014956', 1, 'BLUSOLIS20KLV', NULL, '2021-05-27 19:09:10'),
	(91, '86957431', '2021-05-27 16:02:48', 12, 11, 0, 0, 'ProAuto 21483 (SB 2E-2S - 600V)', 'Un', '', '', '503,79', '503,79', '3', '3', '', '', 'BLU89751463', 1, 'BLUPRO21483', NULL, '2021-05-27 19:03:54'),
	(92, '71095246', '2021-05-27 16:05:28', 12, 11, 0, 0, 'ProAuto 24278 (SB 2/4E-2S - 600V)', 'Un', '', '', '503,79', '503,79', '3', '5', '', '', 'BLU30415726', 1, 'BLUPRO24278', NULL, '2021-05-27 19:05:28'),
	(93, '47239501', '2021-05-27 16:06:35', 14, 0, 0, 0, 'Presilhas com Parafusos Porca 1.0 (Laje Paisagem)', 'Un', '', '', '2,79', '2,79', '3', '3', '', '', 'BLU87965430', 1, 'L00402100301L', NULL, '2021-05-27 19:08:35'),
	(94, '52617408', '2021-05-27 16:13:21', 7, 0, 0, 0, 'Terminal Prensa Cabo com Chapa de Aterramento 2.0', 'Un', '', '', '3,00', '3,00', '3', '15', '', '', 'BLU57319468', 1, 'L00402101201L2', NULL, '2021-05-27 19:13:21'),
	(95, '71256948', '2021-05-27 16:14:12', 7, 0, 0, 0, 'Trilho 2,2m Transversal', 'Un', '', '', '17,08', '17,08', '3', '3', '', '', 'BLU80746395', 1, 'L00402100706', NULL, '2021-05-27 19:14:50'),
	(96, '37602154', '2021-05-27 16:15:35', 7, 0, 0, 0, 'Mordente Completo com Parafuso e Porca', 'Un', '', '', '1,80', '1,80', '3', '3', '', '', 'BLU42390178', 1, '180', NULL, '2021-05-27 19:15:48'),
	(97, '19372485', '2021-05-27 16:16:32', 9, 0, 0, 0, 'Presilha Aterramento (MetÃ¡lico)', 'Un', '', '', '12,45', '12,45', '3', '2', '', '', 'BLU12470596', 1, 'L0040201201PM', NULL, '2021-05-27 19:16:32'),
	(98, '90731546', '2021-05-27 16:17:20', 6, 0, 0, 0, 'Junção Telhado Cerâmico', 'Un', '', '', '12,89', '12,89', '3', '3', '', '', 'BLU92035871', 1, 'L00402100501P', NULL, '2021-05-27 19:17:20'),
	(99, '37649210', '2021-05-27 16:18:11', 2, 5, 0, 0, 'Inversor Growatt 6KWp MIN', 'Un', '', '', '3.329,00', '3.329,00', '3', '1', '6', '', 'BLU67195034', 1, 'BLUGRO6K', NULL, '2021-05-27 19:18:11'),
	(100, '64510892', '2021-05-27 16:18:57', 2, 5, 0, 0, 'Inversor Growatt 3KWp MIN-TL-X', 'Un', '', '', '2.819,00', '2.819,00', '3', '1', '3', '', 'BLU35472698', 1, 'BLUGRO3K2', NULL, '2021-05-27 19:18:57'),
	(101, '54726319', '2021-05-27 16:24:57', 13, 0, 0, 0, 'Trilhos 200mm para Laje e Solo', 'Un', '', '', '5,50', '5,50', '3', '15', '', '', 'BLU76049582', 1, 'BLUTRI200', NULL, '2021-05-27 19:24:57'),
	(102, '84792135', '2021-05-27 16:25:41', 13, 0, 0, 0, 'Luvas 200mm para Laje e Solo', 'Un', '', '', '6,00', '6,00', '3', '45', '', '', 'BLU15064293', 1, 'BLULUV001', NULL, '2021-05-27 19:25:41'),
	(103, '09261458', '2021-05-27 16:26:44', 13, 0, 0, 0, 'Parafusos M8X60mm para Laje e Solo', 'Un', '', '', '1,92', '1,92', '3', '15', '', '', 'BLU87025314', 1, 'BLUPARM8X60', NULL, '2021-05-27 19:26:44'),
	(104, '01928346', '2021-05-27 16:27:55', 13, 0, 0, 0, 'Parafusos M8X16mm para Laje e Solo', 'Un', '', '', '0,46', '0,46', '3', '25', '', '', 'BLU41650392', 1, 'BLUPARM8X16', NULL, '2021-05-27 19:27:55'),
	(105, '89657032', '2021-05-27 16:28:26', 13, 0, 0, 0, 'Porcas M8 para Laje e Solo', 'Un', '', '', '0,32', '0,32', '3', '35', '', '', 'BLU63821497', 1, 'BLUPORM8', NULL, '2021-05-27 19:28:26'),
	(106, '21486970', '2021-05-27 16:28:58', 13, 0, 0, 0, 'Arruelas para Porcas M8 Laje e Solo', 'Un', '', '', '0,09', '0,09', '3', '0', '', '', 'BLU68517394', 1, 'BLUARRM8', NULL, '2024-02-24 12:54:39'),
	(107, '89073615', '2021-05-27 16:29:36', 7, 0, 0, 0, 'Presilhas com Parafusos Porca 2.0 (Laje Retrato)', 'Un', '', '', '2,79', '2,79', '3', '3', '', '', 'BLU73815026', 1, 'L00402100301L2', NULL, '2021-05-27 19:29:36'),
	(108, '89067524', '2021-05-27 16:30:33', 7, 0, 0, 0, 'Presilhas Intermediárias com Parafusos (Laje Retrato)', 'Un', '', '', '2,67', '2,67', '3', '2', '', '', 'BLU67051342', 1, 'L00402100201L2', NULL, '2021-05-27 19:30:33'),
	(109, '63245089', '2021-05-27 16:31:53', 14, 0, 0, 0, 'Presilhas Intermediárias com Parafusos (Laje Paisagem)', 'Un', '', '', '2,67', '2,67', '3', '3', '', '', 'BLU36105782', 1, 'L00402100201L', NULL, '2021-05-27 19:31:53'),
	(110, '69534780', '2021-05-27 16:32:32', 14, 0, 0, 0, 'Trilhos 1,5m para Laje e Solo Paisagem', 'Un', '', '', '40,00', '40,00', '3', '5', '', '', 'BLU58410639', 1, '', NULL, '2021-05-27 19:32:32'),
	(111, '02315869', '2021-05-27 16:33:08', 14, 0, 0, 0, 'Terminal Prensa Cabo com Chapa de Aterramento 1.0', 'Un', '', '', '3,00', '3,00', '3', '15', '', '', 'BLU56429870', 1, 'L00402101201L', NULL, '2021-05-27 19:33:08'),
	(112, '83156972', '2021-05-27 16:33:48', 13, 0, 0, 0, 'Sapatas para Laje e Solo', 'Un', '', '', '4,00', '4,00', '3', '1', '', '', 'BLU20716954', 1, 'BLUSA001', NULL, '2021-05-27 19:33:48'),
	(113, '18532647', '2021-05-27 16:34:19', 13, 0, 0, 0, 'Forquilhas para Laje e Solo', 'Un', '', '', '2,50', '2,50', '3', '3', '', '', 'BLU02857319', 1, 'BLUFOR001', NULL, '2021-05-27 19:34:19'),
	(114, '83195402', '2021-05-27 16:35:40', 2, 5, 0, 0, 'Inversor Growatt 2,5KWp', 'Un', '', '', '1.829,00', '1.829,00', '3', '1', '2', '', 'BLU74581902', 1, 'BLUGRO2.5KWP', NULL, '2021-05-27 19:36:59'),
	(115, '01749536', '2021-05-27 16:36:31', 2, 5, 0, 0, 'Inversor Growatt 3KWp MIC', 'Un', '', '', '2.009,00', '2.009,00', '3', '3', '3', '', 'BLU28794536', 1, 'BLUGRO3K', NULL, '2021-05-27 19:36:44'),
	(116, '39620471', '2021-05-27 16:38:01', 2, 5, 0, 0, 'Inversor Growatt 5KWp MIN', 'Un', '', '', '3.239,00', '3.239,00', '3', '3', '3', '', 'BLU28149705', 1, 'BLUGRO5K', NULL, '2021-05-27 19:39:09'),
	(117, '78913620', '2021-05-27 16:38:55', 2, 5, 0, 0, 'Inversor Growatt 25KWp  380V', 'Un', '', '', '10.929,25', '10.929,25', '3', '15', '25', '', 'BLU47192863', 1, 'BLUGRO25K', NULL, '2021-05-27 19:39:21'),
	(118, '97801543', '2021-05-27 16:40:08', 2, 5, 0, 0, 'Inversor Growatt 60KWp 380V', 'Un', '', '', '17.169,00', '17.169,00', '3', '1', '60', '', 'BLU57032648', 1, 'BLUGRO60K', NULL, '2021-05-27 19:40:20'),
	(119, '24876951', '2021-05-27 16:41:16', 2, 5, 0, 0, 'Inversor Growatt 75KWp 380V', 'Un', '', '', '25.539,00', '25.539,00', '3', '1', '75', '', 'BLU24813560', 1, 'BLUGRO75K', NULL, '2021-05-27 19:41:16'),
	(120, '83590714', '2021-05-27 16:42:04', 2, 6, 0, 0, 'Inversor Fronius 3KWp', 'Un', '', '', '5.205,54', '5.205,54', '3', '25', '3', '', 'BLU26175394', 1, 'BLUFRO3K', NULL, '2021-05-27 19:42:31'),
	(121, '51489067', '2021-05-27 16:47:26', 3, 0, 0, 0, 'Terminal Pino Ilhãs Duplo 6mm', 'Un', '', '', '0,31', '0,31', '3', '3', '', '', 'BLU89412076', 1, 'BLUTERM006MMD', NULL, '2021-05-27 19:47:26'),
	(122, '42037169', '2021-05-27 16:48:09', 3, 0, 0, 0, 'Disjuntor C 125 JNG CA 3P', 'Un', '', '', '94,94', '94,94', '3', '5', '', '', 'BLU65012873', 1, 'BLUDJU3P125CA', NULL, '2021-05-27 19:48:09'),
	(123, '30472685', '2021-05-27 16:48:44', 3, 0, 0, 0, 'Disjuntor C 80A JNG CA 3P', 'Un', '', '', '68,34', '68,34', '3', '1', '', '', 'BLU71320968', 1, 'BLUDJU3P80CA', NULL, '2021-05-27 19:48:44'),
	(124, '89670521', '2021-05-27 16:49:38', 12, 11, 0, 0, 'ProAuto 24078 (SB 2/4E - 2/4S - 1010V)', 'Un', '', '', '503,79', '503,79', '3', '3', '', '', 'BLU37419586', 1, 'BLUPRO24078', NULL, '2021-05-27 19:49:38'),
	(125, '01497853', '2021-05-27 16:50:25', 12, 11, 0, 0, 'ProAuto 24079 (SB 1/2E - 1/2S - 1010V)', 'Un', '', '', '503,79', '503,79', '3', '3', '', '', 'BLU30542861', 1, 'BLUPRO24079', NULL, '2021-05-27 19:50:25'),
	(126, '39810256', '2021-05-27 16:51:03', 12, 11, 0, 0, 'ProAuto 24080 (SB 2E-2S - 600V)', 'Un', '', '', '503,79', '503,79', '3', '15', '', '', 'BLU36075924', 1, 'BLUPRO24080', NULL, '2021-05-27 19:51:03'),
	(127, '58236971', '2021-05-27 16:51:47', 12, 11, 0, 0, 'ProAuto 23682 (21480) SB 1E-1S - 600V', 'Un', '', '', '269,06', '269,66', '3', '3', '', '', 'BLU56371084', 1, 'BLUPRO21480', NULL, '2021-05-27 19:51:47'),
	(128, '03219567', '2021-05-27 16:53:05', 2, 4, 0, 0, 'Inversor SAJ 50KWp 380V', 'Un', '', '', '13.800,00', '13.800,00', '3', '5', '50', '', 'BLU46910732', 1, 'BLUSAJ50K', NULL, '2021-05-27 19:53:05'),
	(129, '82145370', '2021-05-27 16:54:03', 8, 0, 0, 0, 'Gerador 90 KVA', 'Un', '', '', '7.145,00', '7.145,00', '3', '30', '90', '', 'BLU89652137', 1, 'BLUTRA90KVA01', NULL, '2021-05-27 19:54:13'),
	(130, '78204153', '2021-05-27 16:55:10', 3, 0, 0, 0, 'Terminal Pino Ilhãs 6mm', 'Un', '', '', '0,20', '0,20', '3', '1', '', '', 'BLU61072394', 1, 'BLUTERMPI6M', NULL, '2021-05-27 19:55:10'),
	(131, '26417305', '2021-05-27 16:55:52', 3, 0, 0, 0, 'Disjuntor C 63 JNG CA 3P', 'Un', '', '', '32,64', '32,64', '3', '15', '', '', 'BLU37508649', 1, 'BLUDJU3P63CA', NULL, '2021-05-27 19:55:52'),
	(132, '79135640', '2021-05-27 16:56:59', 2, 4, 0, 0, 'Inversor SAJ 20KWp 220V (LV)', 'Un', '', '', '9.751,64', '9.761,54', '3', '3', '20', '', 'BLU06342971', 1, 'BLUSAJ20KLV', NULL, '2021-05-27 19:57:11'),
	(133, '14526093', '2021-05-27 16:58:28', 2, 4, 0, 0, 'Inversor SAJ 25KWp 220V (LV)', 'Un', '', '', '12.636,99', '12.636,99', '3', '15', '25', '', 'BLU15462073', 1, 'BLUSAJ25K', NULL, '2021-05-27 19:58:28'),
	(134, '98605437', '2021-05-27 16:59:12', 2, 4, 0, 0, 'Inversor SAJ 35KWp 220V (LV)', 'Un', '', '', '14.396,47', '14.396,47', '3', '25', '35', '', 'BLU28530974', 1, 'BLUSAJ35K', NULL, '2021-05-27 19:59:12'),
	(135, '39064512', '2021-05-27 17:00:31', 2, 8, 0, 0, 'Inversor Sofar 5KWp', 'Un', '', '', '3.804,00', '3.804,00', '3', '14', '', '', 'BLU21564037', 1, 'BLUSOFAR5K', NULL, '2021-05-27 20:00:31'),
	(136, '75316204', '2021-05-27 17:01:04', 12, 0, 0, 0, 'Conector MC4', 'Un', '', '', '9,23', '9,23', '3', '15', '', '', 'BLU21305867', 1, 'BLU20160005', NULL, '2021-05-27 20:01:04'),
	(137, '30845721', '2021-05-27 17:01:53', 2, 4, 0, 0, 'Inversor SAJ 2KWp', 'Un', '', '', '1.574,00', '1.574,00', '3', '15', '', '', 'BLU68547319', 1, 'BLUSAJ2K', NULL, '2021-05-27 20:01:53'),
	(138, '09625148', '2021-05-27 17:03:06', 2, 4, 0, 0, 'Inversor SAJ 8KWp', 'Un', '', '', '3.746,11', '3.746,11', '3', '15', '', '', 'BLU08417369', 1, 'BLUSAJ8K', NULL, '2021-05-27 20:03:06'),
	(139, '95241360', '2021-05-27 17:03:58', 2, 4, 0, 0, 'Inversor SAJ 40KWp 380V', 'Un', '', '', '12.636,99', '12.636,99', '3', '3', '', '', 'BLU95716024', 1, 'BLUSAJ40K', NULL, '2021-05-27 20:03:58'),
	(140, '27143980', '2021-05-27 17:05:04', 1, 1, 0, 0, 'Painel Fotovoltaico 410 Wp Ulica Solar MONOPERC', 'Un', '', '', '708,63', '708,63', '3', '5', '410', '0.218', 'BLU35604291', 0, 'BLUULIC410', NULL, '2021-06-20 13:04:31'),
	(141, '48573260', '2021-05-27 17:05:47', 2, 8, 0, 0, 'Inversor Sofar 7,5KWp', 'Un', '', '', '4.200,00', '4.200,00', '3', '5', '8', '', 'BLU38459762', 1, 'BLUSOFAR7-5K', NULL, '2021-05-27 20:05:47'),
	(142, '43602598', '2021-05-27 17:06:48', 2, 8, 0, 0, 'Inversor Sofar 3KWp KTLM-G2', 'Un', '', '', '2.403,00', '2.403,00', '3', '3', '3', '', 'BLU50297861', 1, 'BLUSOFAR3K', NULL, '2021-05-27 20:06:48'),
	(143, '06453298', '2021-05-27 17:07:48', 2, 5, 0, 0, 'Inversor Growatt 8KWp', 'Un', '', '', '4.229,00', '4.229,00', '3', '5', '8', '', 'BLU91426738', 1, 'BLUGRO8K', NULL, '2021-05-27 20:07:48'),
	(144, '58269043', '2021-05-27 17:09:12', 2, 6, 0, 0, 'Inversor Fronius 8,2KWp', 'Un', '', '', '8.511,87', '8.511,87', '3', '3', '8', '', 'BLU04275638', 1, 'BLUFRO8.0-1', NULL, '2021-05-27 20:09:12'),
	(145, '84901567', '2021-05-27 17:10:02', 2, 6, 0, 0, 'Inversor Fronius 25KWp 380V', 'Un', '', '', '15.140,42', '15.140,42', '3', '1', '25', '', 'BLU15490623', 1, 'BLUFRO25K', NULL, '2021-05-27 20:10:02'),
	(146, '84063729', '2021-05-27 17:11:44', 1, 1, 0, 0, 'Painel Fotovoltaico 440 Wp Ulica Solar MONOPERC/HALF CELL', 'Un', '', '', '660,00', '710,00', '3', '0', '440', '0.2022', 'BLU86143097', 1, 'BLUULIC440', NULL, '2021-06-20 13:05:38'),
	(147, '16342985', '2024-02-22 09:16:05', 14, 0, 0, 0, 'Roupa de Jardim', 'Un', '', '', '25,00', '35,00', '3', '35', '', '6.66', 'BLU98301765', 1, 'Teste de upload de imagem', '1c48a8da101ce73eb889257de004a99f.jpg', '2024-02-22 12:33:53');

-- Copiando estrutura para tabela sisconsig.projetos
CREATE TABLE IF NOT EXISTS `projetos` (
  `projeto_id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_parceiro_id` int(11) NOT NULL,
  `projeto_cli_fran_id` int(11) NOT NULL,
  `projeto_os_id` int(11) DEFAULT NULL,
  `projeto_responsavel` varchar(100) DEFAULT NULL,
  `projeto_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `projeto_status` tinyint(1) DEFAULT NULL,
  `projeto_ativo` tinyint(1) DEFAULT NULL,
  `projeto_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`projeto_id`) USING BTREE,
  KEY `FK2_cli_fran_id` (`projeto_cli_fran_id`),
  KEY `FK3_os_pro` (`projeto_os_id`),
  KEY `FK1_cli_proj` (`projeto_parceiro_id`) USING BTREE,
  CONSTRAINT `FK3_os_pro` FOREIGN KEY (`projeto_os_id`) REFERENCES `ordens_servicos` (`ordem_servico_id`),
  CONSTRAINT `FK3_parceiro_pro` FOREIGN KEY (`projeto_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.projetos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.reclamacoes
CREATE TABLE IF NOT EXISTS `reclamacoes` (
  `reclama_id` int(11) NOT NULL AUTO_INCREMENT,
  `reclama_orc_id` int(11) DEFAULT NULL,
  `reclama_cli_id` int(11) DEFAULT NULL,
  `reclama_obs` tinytext DEFAULT NULL,
  `reclama_tipo` enum('R','S','E') DEFAULT NULL,
  `reclama_retorno_obs` tinytext DEFAULT NULL,
  `reclama_data_emissao` timestamp NOT NULL DEFAULT current_timestamp(),
  `reclama_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `reclama_status` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`reclama_id`) USING BTREE,
  KEY `FK2_parceiros` (`reclama_cli_id`),
  KEY `FK1_ordem_servicos` (`reclama_orc_id`) USING BTREE,
  CONSTRAINT `FK1_orcamento` FOREIGN KEY (`reclama_orc_id`) REFERENCES `orcamentos` (`orc_id`),
  CONSTRAINT `FK2_parceiros` FOREIGN KEY (`reclama_cli_id`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de reclamações dos parceiros dos franqueados';

-- Copiando dados para a tabela sisconsig.reclamacoes: ~2 rows (aproximadamente)
REPLACE INTO `reclamacoes` (`reclama_id`, `reclama_orc_id`, `reclama_cli_id`, `reclama_obs`, `reclama_tipo`, `reclama_retorno_obs`, `reclama_data_emissao`, `reclama_data_alteracao`, `reclama_status`) VALUES
	(1, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo mauris nunc, at aliquam justo convallis ac. Sed laoreet non urna ac interdum. Duis mollis.', 'R', 'Estaremos verificando a situação e retornaremos o contato após uma posição', '2021-05-13 12:31:26', '2021-06-01 13:39:01', 0),
	(2, 3, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed commodo mauris nunc, at aliquam justo convallis ac. Sed laoreet non urna ac interdum. Duis mollis.', 'E', 'Resolvido', '2021-05-13 13:03:52', '2021-06-01 13:37:51', 1);

-- Copiando estrutura para tabela sisconsig.seguros
CREATE TABLE IF NOT EXISTS `seguros` (
  `seguro_id` int(11) NOT NULL AUTO_INCREMENT,
  `seguro_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `seguro_file` varchar(45) DEFAULT NULL,
  `seguro_tipo` varchar(45) DEFAULT NULL,
  `seguro_ativo` tinyint(1) DEFAULT NULL,
  `seguro_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`seguro_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.seguros: ~0 rows (aproximadamente)
REPLACE INTO `seguros` (`seguro_id`, `seguro_nome`, `seguro_file`, `seguro_tipo`, `seguro_ativo`, `seguro_data_alteracao`) VALUES
	(1, 'Condições Gerais Seguro Engenharia', 'Condicoes_Gerais_Seguro_Riscos_Diversos_Equip', NULL, 1, '2021-04-26 14:20:33');

-- Copiando estrutura para tabela sisconsig.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_nome` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `servico_preco` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `servico_descricao` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.servicos: ~3 rows (aproximadamente)
REPLACE INTO `servicos` (`servico_id`, `servico_nome`, `servico_preco`, `servico_descricao`, `servico_ativo`, `servico_data_alteracao`) VALUES
	(1, 'Instalação de Painel', '854,00', 'Mão de obra de instalação de painéis', 1, '2021-04-06 19:03:55'),
	(2, 'Manutenção de Inversor', '351,00', 'Manutenção de inversor solar', 1, '2021-04-07 12:57:59'),
	(3, 'Manutenção de StringBox', '658,00', 'Manutenção de StringBox Solar1', 1, '2024-02-22 18:27:40');

-- Copiando estrutura para tabela sisconsig.sistema
CREATE TABLE IF NOT EXISTS `sistema` (
  `sistema_id` int(11) NOT NULL AUTO_INCREMENT,
  `sistema_razao_social` varchar(145) DEFAULT NULL,
  `sistema_nome_fantasia` varchar(145) DEFAULT NULL,
  `sistema_cnpj` varchar(25) DEFAULT NULL,
  `sistema_ie` varchar(25) DEFAULT NULL,
  `sistema_telefone_fixo` varchar(25) DEFAULT NULL,
  `sistema_telefone_movel` varchar(25) NOT NULL,
  `sistema_email` varchar(100) DEFAULT NULL,
  `sistema_site_url` varchar(100) DEFAULT NULL,
  `sistema_cep` varchar(25) DEFAULT NULL,
  `sistema_endereco` varchar(145) DEFAULT NULL,
  `sistema_numero` varchar(25) DEFAULT NULL,
  `sistema_cidade` varchar(45) DEFAULT NULL,
  `sistema_estado` varchar(2) DEFAULT NULL,
  `sistema_txt_ordem_servico` tinytext DEFAULT NULL,
  `sistema_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`sistema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.sistema: ~0 rows (aproximadamente)
REPLACE INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
	(1, 'SisConsig Produtos - Gerenciamento de Estoque', 'Sisconsig Produtos', '42.933.544/0001-56', '', '(19) 8457-8361', '(19) 98457-8361', 'contato@sisconsig.com.br', 'https://sisconsig.com.br/', '13.485-131', 'Rua José Alves da Vinha, 157', '450', 'Limeira', 'SP', 'Obrigado pela preferência, a SisConsig agradece. Conte sempre conosco!', '2024-02-25 12:04:31');

-- Copiando estrutura para tabela sisconsig.tickets
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_user_id` int(11) unsigned NOT NULL,
  `ticket_codigo` varchar(45) NOT NULL,
  `ticket_assunto` varchar(80) DEFAULT NULL,
  `ticket_mensagem` tinytext DEFAULT NULL,
  `ticket_resposta` tinytext DEFAULT NULL,
  `ticket_prioridade` tinyint(1) DEFAULT 0,
  `ticket_status` tinyint(1) DEFAULT 0,
  `ticket_data_emissao` datetime DEFAULT NULL,
  `ticket_data_alteracao` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ticket_id`),
  KEY `FK1_user_ticket` (`ticket_user_id`),
  CONSTRAINT `FK1_user_ticket` FOREIGN KEY (`ticket_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de cahamados dos colaboradores da plataforma';

-- Copiando dados para a tabela sisconsig.tickets: ~2 rows (aproximadamente)
REPLACE INTO `tickets` (`ticket_id`, `ticket_user_id`, `ticket_codigo`, `ticket_assunto`, `ticket_mensagem`, `ticket_resposta`, `ticket_prioridade`, `ticket_status`, `ticket_data_emissao`, `ticket_data_alteracao`) VALUES
	(1, 4, '01254', 'Falha no E-mail', 'Estou com problema ao enviar e-mail pela plataforma', 'Ticket sendo avaliado', 2, 0, '2021-04-17 11:31:26', '2021-04-17 14:31:22'),
	(2, 2, '93210', 'Chamado para testes', 'Chamado para testes no sistema', 'Ticket resolvido conforme solicitado pelo usuário', 0, 1, NULL, '2021-04-17 17:21:46');

-- Copiando estrutura para tabela sisconsig.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_nivacesso` int(11) DEFAULT 1,
  `senha` varchar(50) DEFAULT NULL,
  `foto_editor` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.users: ~4 rows (aproximadamente)
REPLACE INTO `users` (`id`, `username`, `ip_address`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `id_nivacesso`, `senha`, `foto_editor`) VALUES
	(1, 'administrator', '127.0.0.1', '$2y$12$3wgRoE3jvxOnkztMaXQ54eJF53HB5LnFPnNSIthG7ujDsI23rq/iq', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1620137750, 1, 'Admin', 'istrator', 'ADMIN', '0', 0, NULL, 1),
	(2, 'claumirlopes', '::1', '$2y$12$cNq9JMofUUcYfGGL9.ySsOsnw2TR26ibEEBAf4CKnXBfkTyzvP6qi', 'claumirlopes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1616154643, 1709028728, 1, 'Claudemir', 'da Silva Lopes', NULL, '(19) 98457-8361', 1, 'ed3bab2055c134614869b30adbc702f0a1ba04eb', 1),
	(4, 'lifreitaslopes', '::1', '$2y$10$wPNm.c2fueJpsKLEo6qmzeEc/38ZzvCaHBjhRcGeV78e05QCTKKB2', 'lifreitaslopes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1616163236, 1620926951, 1, 'Eliane', 'Rocha de Freitas Lopes', NULL, NULL, 0, NULL, 1),
	(5, 'fulano', '::1', '$2y$10$0HwJ5DXEoVLl5FzM7nS2tOVAnnac5UlRBJvtKgHyi9pbnsYdz8THq', 'fulano@detal.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1622818782, NULL, 1, 'Fulano', 'de Tal', NULL, NULL, 1, '7c4a8d09ca3762af61e59520943dc26494f8941b', 1);

-- Copiando estrutura para tabela sisconsig.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.users_groups: ~5 rows (aproximadamente)
REPLACE INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 1),
	(16, 4, 2),
	(18, 5, 1);

-- Copiando estrutura para tabela sisconsig.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `venda_id` int(11) NOT NULL AUTO_INCREMENT,
  `venda_parceiro_id` int(11) DEFAULT NULL,
  `venda_forma_pagamento_id` int(11) DEFAULT NULL,
  `venda_vendedor_id` int(11) DEFAULT NULL,
  `venda_tipo` tinyint(1) DEFAULT NULL,
  `venda_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `venda_valor_desconto` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_valor_total` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`venda_id`),
  KEY `fk_venda_parceiro_id` (`venda_parceiro_id`),
  KEY `fk_venda_forma_pagto_id` (`venda_forma_pagamento_id`),
  KEY `fk_venda_vendedor_id` (`venda_vendedor_id`),
  CONSTRAINT `fk_venda_forma_pagto_id` FOREIGN KEY (`venda_forma_pagamento_id`) REFERENCES `formas_pagamentos` (`forma_pagamento_id`),
  CONSTRAINT `fk_venda_parceiro_id` FOREIGN KEY (`venda_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`),
  CONSTRAINT `fk_venda_vendedor_id` FOREIGN KEY (`venda_vendedor_id`) REFERENCES `vendedores` (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.vendas: ~5 rows (aproximadamente)
REPLACE INTO `vendas` (`venda_id`, `venda_parceiro_id`, `venda_forma_pagamento_id`, `venda_vendedor_id`, `venda_tipo`, `venda_data_emissao`, `venda_valor_desconto`, `venda_valor_total`, `venda_data_alteracao`) VALUES
	(1, 5, 5, 1, 1, '2024-02-24 12:54:39', 'R$ 3.75', '101.04', NULL),
	(2, 6, 3, 1, 2, '2024-02-24 12:59:29', 'R$ 1,561.75', '10,169.89', NULL),
	(3, 11, 4, 1, 1, '2024-02-24 13:18:18', 'R$ 620.11', '4,620.06', NULL),
	(4, 2, 1, 1, 1, '2024-02-26 17:22:51', 'R$ 0.00', '57.98', '2024-02-26 17:24:49'),
	(5, 1, 2, 1, 1, '2024-02-26 17:26:21', 'R$ 1,494.51', '6,137.54', NULL);

-- Copiando estrutura para tabela sisconsig.venda_produtos
CREATE TABLE IF NOT EXISTS `venda_produtos` (
  `id_venda_produtos` int(11) NOT NULL AUTO_INCREMENT,
  `venda_produto_id_venda` int(11) DEFAULT NULL,
  `venda_produto_id_produto` int(11) DEFAULT NULL,
  `venda_produto_quantidade` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_produto_valor_unitario` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_produto_desconto` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_produto_valor_total` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`id_venda_produtos`),
  KEY `fk_venda_produtos_id_produto` (`venda_produto_id_produto`),
  KEY `fk_venda_produtos_id_venda` (`venda_produto_id_venda`),
  CONSTRAINT `fk_venda_produtos_id_produto` FOREIGN KEY (`venda_produto_id_produto`) REFERENCES `produtos` (`produto_id`),
  CONSTRAINT `fk_venda_produtos_id_venda` FOREIGN KEY (`venda_produto_id_venda`) REFERENCES `vendas` (`venda_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.venda_produtos: ~16 rows (aproximadamente)
REPLACE INTO `venda_produtos` (`id_venda_produtos`, `venda_produto_id_venda`, `venda_produto_id_produto`, `venda_produto_quantidade`, `venda_produto_valor_unitario`, `venda_produto_desconto`, `venda_produto_valor_total`) VALUES
	(1, 1, 106, '3', ' 0.09', '0 ', 'R$ 0.27'),
	(2, 1, 36, '3', ' 8.09', '0 ', 'R$ 24.27'),
	(3, 1, 31, '3', ' 1.75', '0 ', 'R$ 5.25'),
	(4, 1, 61, '10', ' 7.50', '5 ', 'R$ 71.25'),
	(5, 2, 10, '1', ' 9751.64', '15 ', 'R$ 8288.89'),
	(6, 2, 63, '3', ' 660.00', '5 ', 'R$ 1881.00'),
	(7, 3, 23, '1', ' 4522.00', '10 ', 'R$ 4069.80'),
	(8, 3, 25, '5', ' 7.50', '5 ', 'R$ 35.63'),
	(9, 3, 63, '1', ' 660.00', '25 ', 'R$ 495.00'),
	(10, 3, 44, '3', ' 6.89', '5 ', 'R$ 19.64'),
	(11, 4, 24, '3', ' 7.50', '0 ', 'R$ 22.50'),
	(12, 4, 32, '2', ' 17.74', '0 ', 'R$ 35.48'),
	(13, 5, 27, '2', ' 31.06', '0 ', 'R$ 62.12'),
	(14, 5, 49, '3', ' 28.06', '0 ', 'R$ 84.18'),
	(15, 5, 42, '2', ' 6.60', '0 ', 'R$ 13.20'),
	(16, 5, 9, '1', ' 7472.55', '20 ', 'R$ 5978.04');

-- Copiando estrutura para tabela sisconsig.vendedores
CREATE TABLE IF NOT EXISTS `vendedores` (
  `vendedor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vendedor_codigo` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendedor_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `vendedor_nome_completo` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendedor_cpf` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendedor_rg` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `vendedor_telefone` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_celular` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_email` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_cep` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_endereco` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_numero_endereco` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_complemento` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_bairro` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_cidade` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_estado` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_ativo` tinyint(1) DEFAULT NULL,
  `vendedor_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vendedor_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.vendedores: ~2 rows (aproximadamente)
REPLACE INTO `vendedores` (`vendedor_id`, `vendedor_codigo`, `vendedor_data_cadastro`, `vendedor_nome_completo`, `vendedor_cpf`, `vendedor_rg`, `vendedor_telefone`, `vendedor_celular`, `vendedor_email`, `vendedor_cep`, `vendedor_endereco`, `vendedor_numero_endereco`, `vendedor_complemento`, `vendedor_bairro`, `vendedor_cidade`, `vendedor_estado`, `vendedor_ativo`, `vendedor_obs`, `vendedor_data_alteracao`) VALUES
	(1, '21406387', '2021-04-05 15:41:34', 'Adriano da Silva Pereira', '220.454.090-07', '25.254.658-7', '(19) 9855-4587', '(19) 98585-8585', 'adriano@dasilva.pereira', '13.483-332', 'Rua Guido José Bellon', '2547', '', 'Parque Residencial Abílio Pedro', 'Limeira', 'SP', 1, '', '2021-04-05 15:41:34');

-- Copiando estrutura para tabela sisconsig.vendedores_franqueados
CREATE TABLE IF NOT EXISTS `vendedores_franqueados` (
  `vend_fran_id` int(11) NOT NULL AUTO_INCREMENT,
  `vend_fran_parceiro_id` int(11) NOT NULL,
  `vend_fran_pessoa` tinyint(1) DEFAULT NULL,
  `vend_fran_nome` varchar(150) NOT NULL,
  `vend_fran_email` varchar(55) NOT NULL,
  `vend_fran_cpf_cnpj` varchar(30) NOT NULL,
  `vend_fran_tel_cel` varchar(20) NOT NULL,
  `vend_fran_uni_consum` varchar(50) NOT NULL DEFAULT '',
  `vend_fran_cep` varchar(15) NOT NULL,
  `vend_fran_endereco` varchar(50) NOT NULL,
  `vend_fran_numero` varchar(10) NOT NULL DEFAULT '',
  `vend_fran_complemento` varchar(30) DEFAULT NULL,
  `vend_fran_bairro` varchar(50) NOT NULL,
  `vend_fran_cidade` varchar(50) NOT NULL,
  `vend_fran_estado` char(2) NOT NULL,
  `vend_fran_data_emissao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vend_fran_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `vend_fran_status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`vend_fran_id`) USING BTREE,
  KEY `FK1_vend_cli` (`vend_fran_parceiro_id`),
  CONSTRAINT `FK1_vend_cli` FOREIGN KEY (`vend_fran_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de Parceiro dos franqueados/integradores';

-- Copiando dados para a tabela sisconsig.vendedores_franqueados: ~4 rows (aproximadamente)
REPLACE INTO `vendedores_franqueados` (`vend_fran_id`, `vend_fran_parceiro_id`, `vend_fran_pessoa`, `vend_fran_nome`, `vend_fran_email`, `vend_fran_cpf_cnpj`, `vend_fran_tel_cel`, `vend_fran_uni_consum`, `vend_fran_cep`, `vend_fran_endereco`, `vend_fran_numero`, `vend_fran_complemento`, `vend_fran_bairro`, `vend_fran_cidade`, `vend_fran_estado`, `vend_fran_data_emissao`, `vend_fran_data_alteracao`, `vend_fran_status`) VALUES
	(1, 2, 1, 'Samanta da Silva Freitas', 'samanta@gmail.com', '964.301.686-20', '(19) 98575-8585', '54587', '13.482-050', 'Rua Francisco Orlando Stocco', '445', 'Fundos', 'Jd. Ouro Verde', 'Limeira', 'SP', '2021-04-22 20:18:28', '2021-04-22 20:18:28', 1),
	(2, 3, 2, 'Valério De Osório Maia1', 'valerio@gmail.com', '69.975.958/0001-02', '(33) 98852-2221', '58474', '35.041-110', 'Rua Antonio Pinto', '25', 'fundos', 'Vila dos Montes', 'Governador Valadares', 'MG', '2021-04-22 20:11:07', '2021-04-22 20:11:07', 1),
	(3, 1, 2, 'Millunios Reza Solar', 'millunis@hft.com', '56.756.234/0001-18', '(19) 98564-4844', 'Elektro', '13.482-050', 'Rua Francisco Orlando Stocco', '442', 'Fundos', 'Jardim Ouro Verde', 'Limeira', 'SP', '2021-04-30 19:28:14', '2021-04-30 19:28:14', 1),
	(4, 1, 1, 'Malu Ohana da Silva', 'malu@ohana.dasilva', '961.576.470-19', '(19) 98855-5888', 'CESP1', '13.484-473', 'Rua Joaquim Ernesto de Castro', '54', 'Fundão', 'Jardim São Paulo', 'Limeira', 'SP', '2021-04-30 19:35:38', '2021-04-30 19:35:38', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
