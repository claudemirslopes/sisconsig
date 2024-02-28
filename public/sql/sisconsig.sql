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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.avisados: ~0 rows (aproximadamente)
REPLACE INTO `avisados` (`avisado_id`, `avisado_assunto`, `avisado_mensagem`, `avisado_tipo`, `avisado_formato`, `avisado_ativa`, `avisado_data_alteracao`) VALUES
	(1, 'Whatsapp de comunicação', '<p> </p>\r\n\r\n<p><a href="https://api.whatsapp.com/send?phone=5519991533517&text=Olá! Gostaria de tirar uma dúvida a respeito de um orçamento. Pode ser?" target="_blank"><img alt="" src="http://localhost/sisconsig/public/images/home/whatsapp.jpg"></a></p>\r\n\r\n<p> </p>\r\n', '2', 2, 1, '2024-02-28 17:10:58');

-- Copiando estrutura para tabela sisconsig.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `categoria_id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_nome` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `categoria_ativa` tinyint(1) DEFAULT NULL,
  `categoria_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.categorias: ~4 rows (aproximadamente)
REPLACE INTO `categorias` (`categoria_id`, `categoria_nome`, `categoria_ativa`, `categoria_data_alteracao`) VALUES
	(1, 'Roupas', 1, '2024-02-27 12:09:47'),
	(2, 'Calçados', 1, '2024-02-27 12:09:58'),
	(3, 'Bolsas', 1, '2024-02-27 12:10:29'),
	(4, 'Lingeries', 1, '2024-02-27 12:10:44');

-- Copiando estrutura para tabela sisconsig.ci_session
CREATE TABLE IF NOT EXISTS `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.ci_session: ~56 rows (aproximadamente)
REPLACE INTO `ci_session` (`id`, `ip_address`, `timestamp`, `data`) VALUES
	('0f7ullg1l1i4k82086341479gr276uvn', '::1', 1709132439, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133323433393b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('1nn72ifq5sv56sj0q0kfei0kljct7fv8', '::1', 1709125979, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132353937393b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('52koep5qhmo1s113b9o81fnrt3glqbgc', '::1', 1709132101, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133323130313b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('7rl1rqanemgc91bhrq1m2771jmp5md27', '::1', 1709141075, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134313037353b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('7sqpvsvcvq18ctlddekjvaome5u609nc', '::1', 1709131698, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133313639383b6964656e746974797c733a32343a226c69667265697461736c6f70657340676d61696c2e636f6d223b656d61696c7c733a32343a226c69667265697461736c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363230393236393531223b6c6173745f636865636b7c693a313730393133313336333b),
	('8l3r3mtf1smief0fh8f4gnr0phkcgegb', '::1', 1709126992, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132363939323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('8t1duiefegfip51b0kfvadb98pu541ao', '::1', 1709140073, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134303037333b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('936v83v6g4cs3vk8p0gqhksep86ijq7c', '::1', 1709123385, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132333338353b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b),
	('ac7nd09vd8qamv23qdeccar7dht7pl6b', '::1', 1709128321, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132383332313b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('bao97kmaf1t6r2rcdmhldbkvarlumn86', '::1', 1709124802, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132343830323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a333b),
	('c6u6h1r1ju9bcqspe5cupcjf3t7h678e', '::1', 1709128639, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132383633393b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('ch0hofq9p4rc94m3br1ds06igllmnnkv', '::1', 1709131171, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133313137313b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313136363730223b6c6173745f636865636b7c693a313730393133313137313b),
	('dc5vm1ubjtqr188m1337fu7sefvgechk', '::1', 1709130095, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133303039353b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('dvssungcaufm9viecufc4mg6htbl4va5', '::1', 1709143308, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134333330383b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('ev0b3pp21nh14ek9g8ho1ec2ifv3jso1', '::1', 1709131740, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133313734303b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('g9cqi34ddn4qfvtoue44qfh9luia6rk8', '::1', 1709127952, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132373935323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('ht18ambtc3d56ens9qn1adkruk2b09hd', '::1', 1709124052, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132343035323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a333b),
	('i5it6n1m179k2r146d3qiiecnfujtane', '::1', 1709128943, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132383934333b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('i82epq3n74j2t1vg87rhe7vgihj2dm3o', '::1', 1709123745, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132333734353b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a333b),
	('jiga9f5dfjttpuiap71j9foaa47l12cp', '::1', 1709129262, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132393236323b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('jpd9rq4p2nnqi05vqj7pcsutiourgf03', '::1', 1709124418, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132343431383b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a333b),
	('k55j69tsb3lr8gf6urkk5nin99a65h7f', '::1', 1709140718, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134303731383b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('l52a433faj2m8l7m8r4pa0e1hun3uuf7', '::1', 1709140409, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134303430393b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('l90jvarh1dh460v5mogaiav61rais5jn', '::1', 1709126684, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132363638343b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('mettsg3v089ip2mgc52ovjhgd9922oa4', '::1', 1709131698, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133313639383b6964656e746974797c733a32343a226c69667265697461736c6f70657340676d61696c2e636f6d223b656d61696c7c733a32343a226c69667265697461736c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363230393236393531223b6c6173745f636865636b7c693a313730393133313336333b),
	('ndsl6j8p3fghphcvlfuhemuoqdr4g3d4', '::1', 1709141425, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134313432353b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('ous7oa47bs9ggacl1ke2lsp0bsnsnjl3', '::1', 1709130535, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133303533353b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('ph8fogcam3cfihaqersgjolroh77ce41', '::1', 1709126293, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132363239333b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('q5luns4b64d5iffbu3ocleatohrursg6', '::1', 1709127397, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132373339373b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('qaaouj78uh3v710gmjj9pk6o1k0tjeic', '::1', 1709125459, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132353435393b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('qv2fdlsd1bg9bp9ae6rg8si150em3315', '::1', 1709130910, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133303931303b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a343b),
	('r0cl8id2he8qi7gnaj05o2crvek44pp8', '::1', 1709141780, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134313738303b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('ricnlcq1firlf5se6os4h25egskjp7r5', '::1', 1709142083, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134323038333b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('sbmtm6vf0kvjm5hlj1rtg4i5r4v2lj1k', '::1', 1709125106, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393132353130363b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039303533333730223b6c6173745f636865636b7c693a313730393131363637303b6c6173745f69647c693a333b),
	('tn0ps19ui2d088ag8eq1ejgtg0h3839r', '::1', 1709142920, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134323932303b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b),
	('uss5kpnirpnth4e6l8ufrdcppfsp73rs', '::1', 1709131363, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393133313336333b6964656e746974797c733a32343a226c69667265697461736c6f70657340676d61696c2e636f6d223b656d61696c7c733a32343a226c69667265697461736c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2234223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363230393236393531223b6c6173745f636865636b7c693a313730393133313336333b),
	('v2ou3noagfqmdkh24bg6s8tbbmvsi5as', '::1', 1709143470, _binary 0x5f5f63695f6c6173745f726567656e65726174657c693a313730393134333330383b6964656e746974797c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b656d61696c7c733a32323a22636c61756d69726c6f70657340676d61696c2e636f6d223b757365725f69647c733a313a2232223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231373039313331313731223b6c6173745f636865636b7c693a313730393133313734303b6c6173745f69647c693a353b);

-- Copiando estrutura para tabela sisconsig.clientes
CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_data_cadastro` timestamp NULL DEFAULT current_timestamp(),
  `cliente_pessoa` tinyint(1) DEFAULT NULL,
  `cliente_nome` varchar(250) NOT NULL,
  `cliente_sobrenome` varchar(250) NOT NULL,
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

-- Copiando dados para a tabela sisconsig.clientes: ~1 rows (aproximadamente)
REPLACE INTO `clientes` (`cliente_id`, `cliente_data_cadastro`, `cliente_pessoa`, `cliente_nome`, `cliente_sobrenome`, `cliente_data_nascimento`, `cliente_cpf_cnpj`, `cliente_rg_ie`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_cep`, `cliente_endereco`, `cliente_numero_endereco`, `cliente_bairro`, `cliente_complemento`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_obs`, `cliente_data_alteracao`) VALUES
	(1, '2024-02-27 11:56:46', 1, 'Luke', 'Skywalker Jedi', '2018-06-22', '383.650.110-42', '', 'luke@skywalker.com', '', '(19) 98457-8361', '13.485-131', 'Rua José Alves da Vinha', '157', 'Residencial Chácara São José', '', 'Limeira', 'SP', 1, 'Este cliente é para fins de testes', '2024-02-27 11:56:46'),
	(2, '2024-02-27 17:57:52', 2, 'DORA ALICE BERTANHA DE OLIVEIRA &amp; CIA LTDA', 'Dora Alice Bertanha', '2009-02-22', '54.037.643/0001-39', '', 'dora@alice.com', '', '(19) 98565-8556', '13.484-420', 'Avenida Cônego Manoel Alves', '772', 'Jardim São Paulo', '', 'Limeira', 'SP', 1, '', '2024-02-27 17:58:30');

-- Copiando estrutura para tabela sisconsig.contas_pagar
CREATE TABLE IF NOT EXISTS `contas_pagar` (
  `conta_pagar_id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_pagar_fornecedor_id` int(11) DEFAULT NULL,
  `conta_pagar_parceiro_id` int(11) DEFAULT NULL,
  `conta_pagar_data_vencimento` date DEFAULT NULL,
  `conta_pagar_data_pagamento` datetime DEFAULT NULL,
  `conta_pagar_valor` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conta_pagar_status` tinyint(1) DEFAULT NULL,
  `conta_pagar_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `conta_pagar_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`conta_pagar_id`),
  KEY `fk_conta_pagar_id_fornecedor` (`conta_pagar_fornecedor_id`),
  KEY `fk_conta_pagar_id_parceiro` (`conta_pagar_parceiro_id`),
  CONSTRAINT `fk_conta_pagar_id_fornecedor` FOREIGN KEY (`conta_pagar_fornecedor_id`) REFERENCES `fornecedores` (`fornecedor_id`),
  CONSTRAINT `fk_conta_pagar_id_parceiro` FOREIGN KEY (`conta_pagar_parceiro_id`) REFERENCES `parceiros` (`parceiro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='		';

-- Copiando dados para a tabela sisconsig.contas_pagar: ~2 rows (aproximadamente)
REPLACE INTO `contas_pagar` (`conta_pagar_id`, `conta_pagar_fornecedor_id`, `conta_pagar_parceiro_id`, `conta_pagar_data_vencimento`, `conta_pagar_data_pagamento`, `conta_pagar_valor`, `conta_pagar_status`, `conta_pagar_obs`, `conta_pagar_data_alteracao`) VALUES
	(1, NULL, 2, '2024-02-29', NULL, '212.50', 0, 'Apenas para fins de testes', '2024-02-27 17:49:10'),
	(2, NULL, 1, '2024-03-02', NULL, '115.00', 0, 'Mais uma conta para testes afins', '2024-02-27 17:41:48');

-- Copiando estrutura para tabela sisconsig.contas_receber
CREATE TABLE IF NOT EXISTS `contas_receber` (
  `conta_receber_id` int(11) NOT NULL AUTO_INCREMENT,
  `conta_receber_parceiro_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.contas_receber: ~2 rows (aproximadamente)
REPLACE INTO `contas_receber` (`conta_receber_id`, `conta_receber_parceiro_id`, `conta_receber_cliente_id`, `conta_receber_data_vencimento`, `conta_receber_data_pagamento`, `conta_receber_valor`, `conta_receber_status`, `conta_receber_obs`, `conta_receber_data_alteracao`) VALUES
	(1, NULL, 2, '2024-02-27', NULL, '85.46', 0, 'Apenas para fins de testes no sistema', '2024-02-27 18:14:37'),
	(2, NULL, 1, '2024-02-21', '2024-02-27 15:15:31', '118.56', 1, 'Apenas para fins de testes no sitema', '2024-02-27 18:15:31');

-- Copiando estrutura para tabela sisconsig.datasheets
CREATE TABLE IF NOT EXISTS `datasheets` (
  `datasheet_id` int(11) NOT NULL AUTO_INCREMENT,
  `datasheet_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `datasheet_file` varchar(45) DEFAULT NULL,
  `datasheet_tipo` varchar(45) DEFAULT NULL,
  `datasheet_ativo` tinyint(1) DEFAULT NULL,
  `datasheet_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`datasheet_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.datasheets: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_alunos_aula: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_alunos_curso: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.ead_arquivos_aula: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_aulas: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_comentarios: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Copiando dados para a tabela sisconsig.ead_cursos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.ead_modulos
CREATE TABLE IF NOT EXISTS `ead_modulos` (
  `ead_modulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `ead_modulo_curso_id` int(11) NOT NULL,
  `ead_modulo_titulo` varchar(150) NOT NULL,
  `ead_modulo_datacriacao` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ead_modulo_id`) USING BTREE,
  KEY `FK1_cursoMod` (`ead_modulo_curso_id`),
  CONSTRAINT `FK1_cursoMod` FOREIGN KEY (`ead_modulo_curso_id`) REFERENCES `ead_cursos` (`ead_curso_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.ead_modulos: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.formas_pagamentos: ~4 rows (aproximadamente)
REPLACE INTO `formas_pagamentos` (`forma_pagamento_id`, `forma_pagamento_nome`, `forma_pagamento_aceita_parc`, `forma_pagamento_ativa`, `forma_pagamento_data_alteracao`) VALUES
	(1, 'Dinheiro', 0, 1, '2024-02-27 11:17:15'),
	(2, 'Crédito', 1, 1, '2024-02-27 11:17:31'),
	(3, 'Débito', 0, 1, '2024-02-27 11:17:47'),
	(4, 'PIX', 0, 1, '2024-02-27 11:18:01');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.fornecedores: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.groups: ~3 rows (aproximadamente)
REPLACE INTO `groups` (`id`, `name`, `description`) VALUES
	(1, 'admin', 'Administrator'),
	(2, 'comercial', 'Comercial'),
	(3, 'financeiro', 'Financeiro');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.kbs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.kits
CREATE TABLE IF NOT EXISTS `kits` (
  `kit_id` int(11) NOT NULL AUTO_INCREMENT,
  `kit_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kit_file` varchar(45) DEFAULT NULL,
  `kit_tipo` varchar(45) DEFAULT NULL,
  `kit_ativo` tinyint(1) DEFAULT NULL,
  `kit_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`kit_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.kits: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.login_attempts
CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.login_attempts: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `marca_id` int(11) NOT NULL AUTO_INCREMENT,
  `marca_nome` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Padrão',
  `marca_ativa` tinyint(1) DEFAULT NULL,
  `marca_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`marca_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.marcas: ~0 rows (aproximadamente)
REPLACE INTO `marcas` (`marca_id`, `marca_nome`, `marca_ativa`, `marca_data_alteracao`) VALUES
	(1, 'Padrão', 1, '2024-02-27 12:11:13');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC COMMENT='Tabela de orçamento dos franqueados/integradores';

-- Copiando dados para a tabela sisconsig.orcamentos: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de relacionamento entre as tabelas servicos e ordem_servico';

-- Copiando dados para a tabela sisconsig.ordem_tem_servicos: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.ordens_servicos
CREATE TABLE IF NOT EXISTS `ordens_servicos` (
  `ordem_servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `ordem_servico_forma_pagamento_id` int(11) DEFAULT NULL,
  `ordem_servico_parceiro_id` int(11) DEFAULT NULL,
  `ordem_servico_pedido` varchar(15) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.ordens_servicos: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.parceiros: ~2 rows (aproximadamente)
REPLACE INTO `parceiros` (`parceiro_id`, `parceiro_data_cadastro`, `parceiro_pessoa`, `parceiro_tipo`, `parceiro_nome`, `parceiro_sobrenome`, `parceiro_responsavel`, `parceiro_data_nascimento`, `parceiro_cpf_cnpj`, `parceiro_rg_ie`, `parceiro_email`, `parceiro_telefone`, `parceiro_celular`, `parceiro_cep`, `parceiro_endereco`, `parceiro_numero_endereco`, `parceiro_bairro`, `parceiro_complemento`, `parceiro_cidade`, `parceiro_estado`, `parceiro_img`, `parceiro_img_perfil`, `parceiro_user`, `parceiro_senha`, `parceiro_ativo`, `parceiro_obs`, `parceiro_logo`, `parceiro_logo_franquia`, `parceiro_id_nivacesso`, `parceiro_data_alteracao`) VALUES
	(1, '2024-02-27 12:02:11', 2, 2, 'CLAUDEMIR DA SILVA LOPES 28413291860', 'Open Beta TI', 'Claudemir Lopes', '2018-05-22', '42.933.544/0001-56', '', 'claudemir.slopes@hotmail.com', '(19) 8457-8361', '(19) 98457-8361', '13.487-185', 'RUA RUBENS QUADROS', '358', 'JARDIM ANHANGUERA', '', 'LIMEIRA', 'SP', 0, '0', 'openbeta', 'ed3bab2055c134614869b30adbc702f0a1ba04eb', 1, 'Este é um fornecedor para fins de testes', 0, '0', 1, '2024-02-27 12:02:11'),
	(2, '2024-02-27 17:20:30', 1, 1, 'Luemo', 'Teofilo Paz', 'Luemo', '2010-02-22', '629.924.320-16', '', 'luemo@teste.com', '', '(13) 58586-5656', '11.360-030', 'Rua Tapuias', '63', 'Parque São Vicente', '', 'São Vicente', 'SP', 0, '0', 'luemo', 'ed3bab2055c134614869b30adbc702f0a1ba04eb', 1, 'Apenas mais um teste para fins', 0, '0', 1, '2024-02-27 17:20:30');

-- Copiando estrutura para tabela sisconsig.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `produto_id` int(11) NOT NULL AUTO_INCREMENT,
  `produto_codigo` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_data_cadastro` datetime NOT NULL DEFAULT current_timestamp(),
  `produto_categoria_id` int(11) NOT NULL,
  `produto_marca_id` int(11) NOT NULL,
  `produto_parceiro_id` int(11) NOT NULL,
  `produto_descricao` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_unidade` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_codigo_barras` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_ncm` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_preco_custo` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_preco_venda` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_estoque_minimo` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_qtde_estoque` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_codigo_interno` varchar(20) DEFAULT NULL,
  `produto_ativo` tinyint(1) DEFAULT NULL,
  `produto_obs` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `produto_estado` varchar(50) DEFAULT NULL,
  `produto_img` varchar(50) DEFAULT NULL,
  `produto_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`produto_id`),
  KEY `produto_categoria_id` (`produto_categoria_id`,`produto_marca_id`),
  KEY `fk_produto_marca_id` (`produto_marca_id`),
  KEY `fk_produto_parceiro_id` (`produto_parceiro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.produtos: ~2 rows (aproximadamente)
REPLACE INTO `produtos` (`produto_id`, `produto_codigo`, `produto_data_cadastro`, `produto_categoria_id`, `produto_marca_id`, `produto_parceiro_id`, `produto_descricao`, `produto_unidade`, `produto_codigo_barras`, `produto_ncm`, `produto_preco_custo`, `produto_preco_venda`, `produto_estoque_minimo`, `produto_qtde_estoque`, `produto_codigo_interno`, `produto_ativo`, `produto_obs`, `produto_estado`, `produto_img`, `produto_data_alteracao`) VALUES
	(1, '36750419', '2024-02-27 09:42:33', 1, 1, 2, 'Calça Jeans Skinny Feminina Levanta Bumbum', 'Un', '', '', '87,30', '99,90', '3', '10', 'SC-97135086', 1, 'Apenas para fins de testes', 'Novo', '74abedceaf3c89fc1e6bfeef556a4603.png', '2024-02-28 12:59:11'),
	(2, '50793416', '2024-02-27 09:58:52', 1, 1, 1, 'Calça Jeans Skinny Masculina Escura', 'Un', '', '', '85,35', '125,99', '3', '18', 'SC-74305296', 1, 'Apenas para fins de testes', 'Usado', '14b26ed9bbd8d4e4e905dbe3e5d75cda.png', '2024-02-28 18:04:04'),
	(3, '52761309', '2024-02-28 15:03:09', 1, 1, 2, 'Moda Pop - Vestido Soltinho Paisley', 'Un', '', '', '39,90', '47,50', '3', '23', 'SC-98175043', 1, 'Em helanca. Modelo levemente evasê, decote redondo, mangas curtas. Comprimento clássico.', 'Novo', '5dc438d60c6b75e5e4c05b98bcb62f37.png', '2024-02-28 18:04:04');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de reclamações dos parceiros dos franqueados';

-- Copiando dados para a tabela sisconsig.reclamacoes: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.seguros
CREATE TABLE IF NOT EXISTS `seguros` (
  `seguro_id` int(11) NOT NULL AUTO_INCREMENT,
  `seguro_nome` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `seguro_file` varchar(45) DEFAULT NULL,
  `seguro_tipo` varchar(45) DEFAULT NULL,
  `seguro_ativo` tinyint(1) DEFAULT NULL,
  `seguro_data_alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`seguro_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela sisconsig.seguros: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sisconsig.servicos
CREATE TABLE IF NOT EXISTS `servicos` (
  `servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `servico_nome` varchar(145) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `servico_preco` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `servico_descricao` tinytext CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `servico_ativo` tinyint(1) DEFAULT NULL,
  `servico_data_alteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`servico_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.servicos: ~0 rows (aproximadamente)

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

-- Copiando dados para a tabela sisconsig.sistema: ~1 rows (aproximadamente)
REPLACE INTO `sistema` (`sistema_id`, `sistema_razao_social`, `sistema_nome_fantasia`, `sistema_cnpj`, `sistema_ie`, `sistema_telefone_fixo`, `sistema_telefone_movel`, `sistema_email`, `sistema_site_url`, `sistema_cep`, `sistema_endereco`, `sistema_numero`, `sistema_cidade`, `sistema_estado`, `sistema_txt_ordem_servico`, `sistema_data_alteracao`) VALUES
	(1, 'SisConsig Produtos - Gerenciamento de Estoque', 'Sisconsig Produtos', '42.933.544/0001-56', '', '(19) 8457-8361', '(19) 98457-8361', 'contato@sisconsig.com.br', 'https://sisconsig.com.br/', '13.485-131', 'Rua José Alves da Vinha, 157', '450', 'Limeira', 'SP', 'Obrigado pela preferência, a SisConsig agradece. Conte sempre conosco!', '2024-02-25 15:04:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de cahamados dos colaboradores da plataforma';

-- Copiando dados para a tabela sisconsig.tickets: ~0 rows (aproximadamente)

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
	(2, 'claumirlopes', '::1', '$2y$12$JNLREaBKrVxaTLjDBwRMNOeKZLWpHjgZyXUyPDD9RsgqPV/rCKaHW', 'claumirlopes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1616154643, 1709131740, 1, 'Claudemir', 'da Silva Lopes', NULL, '(19) 98457-8361', 1, 'ed3bab2055c134614869b30adbc702f0a1ba04eb', 1),
	(4, 'lifreitaslopes', '::1', '$2y$10$xDS8y.x3ABvnryHriA1UnOjnBo2vBzLnXxLCAYz0iH5EsGr6LQMje', 'lifreitaslopes@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1616163236, 1709131363, 1, 'Eliane', 'Rocha de Freitas Lopes', NULL, '(19) 98585-8585', 0, 'ed3bab2055c134614869b30adbc702f0a1ba04eb', 1),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.users_groups: ~4 rows (aproximadamente)
REPLACE INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(4, 4, 3),
	(3, 5, 2);

-- Copiando estrutura para tabela sisconsig.vendas
CREATE TABLE IF NOT EXISTS `vendas` (
  `venda_id` int(11) NOT NULL AUTO_INCREMENT,
  `venda_pedido` varchar(15) DEFAULT '0',
  `venda_cliente_id` int(11) DEFAULT NULL,
  `venda_forma_pagamento_id` int(11) DEFAULT NULL,
  `venda_vendedor_id` int(11) DEFAULT NULL,
  `venda_tipo` tinyint(1) DEFAULT NULL,
  `venda_data_emissao` timestamp NULL DEFAULT current_timestamp(),
  `venda_valor_desconto` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_valor_total` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `venda_data_alteracao` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`venda_id`),
  KEY `fk_venda_forma_pagto_id` (`venda_forma_pagamento_id`),
  KEY `fk_venda_vendedor_id` (`venda_vendedor_id`),
  KEY `fk_venda_cliente_id` (`venda_cliente_id`),
  CONSTRAINT `fk_venda_cliente_id` FOREIGN KEY (`venda_cliente_id`) REFERENCES `clientes` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venda_forma_pagto_id` FOREIGN KEY (`venda_forma_pagamento_id`) REFERENCES `formas_pagamentos` (`forma_pagamento_id`),
  CONSTRAINT `fk_venda_vendedor_id` FOREIGN KEY (`venda_vendedor_id`) REFERENCES `vendedores` (`vendedor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.vendas: ~3 rows (aproximadamente)
REPLACE INTO `vendas` (`venda_id`, `venda_pedido`, `venda_cliente_id`, `venda_forma_pagamento_id`, `venda_vendedor_id`, `venda_tipo`, `venda_data_emissao`, `venda_valor_desconto`, `venda_valor_total`, `venda_data_alteracao`) VALUES
	(1, 'VD-54585854', 2, 4, 1, 1, '2024-02-27 18:54:03', 'R$ 14.99', '284.72', '2024-02-28 12:31:23'),
	(2, 'VD-85588558', 1, 1, 1, 1, '2024-02-27 19:19:06', 'R$ 25.20', '226.78', '2024-02-28 12:31:38'),
	(3, 'VD-30694521', 1, 3, 1, 1, '2024-02-28 12:33:18', 'R$ 0.00', '125.99', NULL),
	(4, 'VD-85473126', 2, 2, 1, 1, '2024-02-28 12:59:11', 'R$ 57.78', '519.99', NULL),
	(5, 'VD-47869512', 2, 2, 1, 2, '2024-02-28 18:04:04', 'R$ 0.00', '220.99', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.venda_produtos: ~3 rows (aproximadamente)
REPLACE INTO `venda_produtos` (`id_venda_produtos`, `venda_produto_id_venda`, `venda_produto_id_produto`, `venda_produto_quantidade`, `venda_produto_valor_unitario`, `venda_produto_desconto`, `venda_produto_valor_total`) VALUES
	(1, 1, 1, '3', ' 99.90', '5 ', 'R$ 284.72'),
	(2, 2, 2, '2', ' 125.99', '10 ', 'R$ 226.78'),
	(3, 3, 2, '1', ' 125.99', '0 ', 'R$ 125.99'),
	(4, 4, 1, '2', ' 99.90', '10 ', 'R$ 179.82'),
	(5, 4, 2, '3', ' 125.99', '10 ', 'R$ 340.17'),
	(6, 5, 3, '2', ' 47.50', '0 ', 'R$ 95.00'),
	(7, 5, 2, '1', ' 125.99', '0 ', 'R$ 125.99');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- Copiando dados para a tabela sisconsig.vendedores: ~1 rows (aproximadamente)
REPLACE INTO `vendedores` (`vendedor_id`, `vendedor_codigo`, `vendedor_data_cadastro`, `vendedor_nome_completo`, `vendedor_cpf`, `vendedor_rg`, `vendedor_telefone`, `vendedor_celular`, `vendedor_email`, `vendedor_cep`, `vendedor_endereco`, `vendedor_numero_endereco`, `vendedor_complemento`, `vendedor_bairro`, `vendedor_cidade`, `vendedor_estado`, `vendedor_ativo`, `vendedor_obs`, `vendedor_data_alteracao`) VALUES
	(1, '24038519', '2024-02-27 12:07:43', 'Adamastor Pitagoras', '729.723.860-00', '', '', '(19) 99654-5896', 'adamastor@pitagoras.com', '35.041-110', 'Rua C', '254', '', 'Vila dos Montes', 'Governador Valadares', 'MG', 1, 'Apenas para fins de testes', '2024-02-27 12:07:43');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Tabela de Parceiro dos franqueados/integradores';

-- Copiando dados para a tabela sisconsig.vendedores_franqueados: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
