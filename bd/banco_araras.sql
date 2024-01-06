-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.36 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para banco_araras
CREATE DATABASE IF NOT EXISTS `banco_araras` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `banco_araras`;

-- Copiando estrutura para tabela banco_araras.assunto_contato
CREATE TABLE IF NOT EXISTS `assunto_contato` (
  `id_ass` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_ass` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_ass`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.assunto_contato: 6 rows
/*!40000 ALTER TABLE `assunto_contato` DISABLE KEYS */;
INSERT INTO `assunto_contato` (`id_ass`, `descricao_ass`) VALUES
	(1, 'Reclamação'),
	(2, 'Comentário'),
	(3, 'Ajuda'),
	(4, 'Falha no site'),
	(5, 'Resolver problema'),
	(6, 'Outros');
/*!40000 ALTER TABLE `assunto_contato` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.cadastro_usuario_vaga
CREATE TABLE IF NOT EXISTS `cadastro_usuario_vaga` (
  `id_usu_vag` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_vagas` int(11) NOT NULL,
  `id_vaga` int(11) NOT NULL,
  PRIMARY KEY (`id_usu_vag`),
  KEY `FK__usuario_simples` (`id_usuario_vagas`),
  KEY `FK_cadastro_usuario_vaga_vagas` (`id_vaga`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.cadastro_usuario_vaga: 8 rows
/*!40000 ALTER TABLE `cadastro_usuario_vaga` DISABLE KEYS */;
INSERT INTO `cadastro_usuario_vaga` (`id_usu_vag`, `id_usuario_vagas`, `id_vaga`) VALUES
	(1, 12, 15),
	(2, 12, 16),
	(3, 12, 14),
	(4, 12, 13),
	(5, 18, 18),
	(6, 18, 17),
	(7, 10, 17),
	(8, 12, 17),
	(9, 21, 17);
/*!40000 ALTER TABLE `cadastro_usuario_vaga` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id_cont` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cont` varchar(80) NOT NULL DEFAULT '',
  `email_cont` varchar(80) NOT NULL DEFAULT '',
  `telefone_cont` varchar(11) DEFAULT '',
  `mensagem_cont` text NOT NULL,
  `id_assunto_cont` int(11) NOT NULL,
  PRIMARY KEY (`id_cont`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.contato: 2 rows
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`id_cont`, `nome_cont`, `email_cont`, `telefone_cont`, `mensagem_cont`, `id_assunto_cont`) VALUES
	(1, 'teste', 'teste@teste.com', '14523615', 'teste', 5),
	(2, 'Giovana', 'giovana@giovana.com', '152364136', 'teste teste ', 5);
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.curriculos
CREATE TABLE IF NOT EXISTS `curriculos` (
  `id_curr` int(11) NOT NULL AUTO_INCREMENT,
  `curriculo_curr` blob,
  `id_usuario_curr` int(11) NOT NULL,
  PRIMARY KEY (`id_curr`),
  KEY `FK_curriculos_usuario_simples` (`id_usuario_curr`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.curriculos: 22 rows
/*!40000 ALTER TABLE `curriculos` DISABLE KEYS */;
INSERT INTO `curriculos` (`id_curr`, `curriculo_curr`, `id_usuario_curr`) VALUES
	(1, _binary 0x31316138656364633635386638626333633362383334303531616631663163382e706466, 0),
	(2, _binary 0x65663035323138386564373039653135396362323030393862353233353565352e706466, 0),
	(3, _binary 0x66663265636561616365613962323637623936633335343364333035343633322e706466, 0),
	(4, _binary 0x37363234393533626635623363633563643531356632616162373736326130332e646f6378, 12),
	(5, _binary 0x62613962343036613938316434383033623330616234306162376130373931642e646f6378, 13),
	(6, _binary 0x65646231623532383965393566353438393831383533306332336236346464632e706466, 14),
	(7, _binary 0x36333437373462376638643537303433363263383230663035306563653864332e706466, 15),
	(8, _binary 0x63303731633364633033633365313961626634663364366338663330346637612e706466, 16),
	(9, _binary 0x66306265373536373938653361376631623838306661623562626538616536362e646f6378, 17),
	(10, _binary 0x32336265363066366234306538653861323634316237376461303134616564362e706466, 18),
	(11, _binary 0x63333165653163616435616238363264656630646363363666326239323330392e706466, 0),
	(12, _binary 0x64316465356334383035363163653432323361373837306561316234633130332e706466, 0),
	(13, _binary 0x33383965373663633935363832626430306365373363373162323830653930372e706466, 0),
	(14, _binary 0x65623039343635383364306334343531303730383933326536623935343439342e706466, 19),
	(15, _binary 0x37333861663365646337663462333235386433643164366337336536656331312e706466, 20),
	(16, _binary 0x32396361306234366263396131363231636131643430353865306639353066612e706466, 0),
	(17, _binary 0x36306635633734336330336133376437396634623232303862333937336239302e706466, 0),
	(18, _binary 0x38383639653239643961653635316163363364303837383631366333383164302e706466, 0),
	(19, _binary 0x38373961323739656463316633353261316264303363646435333964376664622e706466, 0),
	(20, _binary 0x34353533366662303031643333613463646430343566393033396539383339352e706466, 0),
	(21, _binary 0x30313164366161316464363035353265393866663063313861373735643937352e706466, 0),
	(22, _binary 0x64373332616438616463316665353763316261376331623230353133366530322e706466, 0),
	(23, _binary 0x63663330663330613836306634353161356635386266346436633931613135342e706466, 0),
	(24, _binary 0x30363532353066346231653937363239343661333266393663383465633237632e706466, 21);
/*!40000 ALTER TABLE `curriculos` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.deficiencias
CREATE TABLE IF NOT EXISTS `deficiencias` (
  `id_def` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_def` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_def`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.deficiencias: 7 rows
/*!40000 ALTER TABLE `deficiencias` DISABLE KEYS */;
INSERT INTO `deficiencias` (`id_def`, `descricao_def`) VALUES
	(1, 'Física'),
	(2, 'Visual'),
	(3, 'Auditiva'),
	(4, 'Intelectual'),
	(5, 'Psicossocial'),
	(6, 'Multipla'),
	(7, 'Nenhuma');
/*!40000 ALTER TABLE `deficiencias` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.empresa_simples
CREATE TABLE IF NOT EXISTS `empresa_simples` (
  `id_emp` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_doc_emp` int(11) NOT NULL DEFAULT '0',
  `numero_doc_emp` varchar(14) NOT NULL DEFAULT '',
  `cei_emp` varchar(14) DEFAULT '',
  `razao_emp` varchar(80) NOT NULL DEFAULT '',
  `nome_fantasia_emp` varchar(50) NOT NULL DEFAULT '',
  `ramo_emp` varchar(30) NOT NULL DEFAULT '',
  `rua_emp` varchar(80) NOT NULL DEFAULT '',
  `numero_end_emp` int(11) NOT NULL DEFAULT '0',
  `complemento_emp` varchar(50) DEFAULT '0',
  `cep_emp` int(11) NOT NULL DEFAULT '0',
  `bairro_emp` varchar(80) NOT NULL DEFAULT '',
  `cidade_emp` varchar(80) NOT NULL DEFAULT '',
  `estado_emp` varchar(80) NOT NULL DEFAULT '',
  `pais_emp` varchar(80) NOT NULL DEFAULT '',
  `id_responsavel_emp` int(11) NOT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `FK_empresa_simples_responsavelempresarial` (`id_responsavel_emp`),
  KEY `FK_empresa_simples_tipo_documento_emp` (`id_tipo_doc_emp`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.empresa_simples: 14 rows
/*!40000 ALTER TABLE `empresa_simples` DISABLE KEYS */;
INSERT INTO `empresa_simples` (`id_emp`, `id_tipo_doc_emp`, `numero_doc_emp`, `cei_emp`, `razao_emp`, `nome_fantasia_emp`, `ramo_emp`, `rua_emp`, `numero_end_emp`, `complemento_emp`, `cep_emp`, `bairro_emp`, `cidade_emp`, `estado_emp`, `pais_emp`, `id_responsavel_emp`) VALUES
	(1, 1, '123654', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 1233, '0', 123456, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(2, 1, '123654', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 1233, '0', 123456, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(3, 1, '123654', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 1233, '0', 123456, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(4, 1, '123654', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 1233, '0', 123456, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(5, 1, '123654', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 1233, '0', 123456, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(6, 1, '12346ee', 'eeee', 'Teste', 'Empresa', 'Empresa', 'Teste', 13232, 'Teste', 3535, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(7, 2, '12346ee', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 656522, 'Teste', 356561, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(8, 2, '12346ee', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 656522, 'Teste', 356561, 'Teste', 'Teste', 'Teste', 'Teste', 0),
	(9, 2, '12346ee', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 656522, 'Teste', 356561, 'Teste', 'Teste', 'Teste', 'Teste', 2),
	(10, 2, '12346ee', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 656522, 'Teste', 356561, 'Teste', 'Teste', 'Teste', 'Teste', 3),
	(11, 2, '12346ee', 'Teste', 'Empresa', 'Empresa', 'Empresa', 'Teste', 656522, 'Teste', 356561, 'Teste', 'Teste', 'Teste', 'Teste', 4),
	(12, 2, '123456789', '123456789', 'Empresa', 'Empresa', 'Empresa', 'rua', 1236565, 'casa', 5454554, 'bairro', 'marilia', 'estado', 'paises', 5),
	(13, 2, '15973564586122', 'Cei da Empresa', 'Empresa Ltda', 'Empresa Fantasma', 'Tecnologia', 'Rua ficticia', 123, 'Predio', 12345789, 'Bairro ficticio', 'Cidade imaginaria', 'Estado nenhum', 'Pais qualquer', 6),
	(14, 1, '15937526842545', '15975368426841', 'Zamar - Tecnologia e InformaÃ§Ãµes', 'Zamar', 'Tecnologia de InformaÃ§Ã£o', 'Castro Alves', 156, '', 656556, 'Santo AntÃµnio', 'Marilia', 'SÃ£o Paulo', 'Brasil', 7);
/*!40000 ALTER TABLE `empresa_simples` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.etnia
CREATE TABLE IF NOT EXISTS `etnia` (
  `id_etn` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_etn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_etn`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.etnia: 6 rows
/*!40000 ALTER TABLE `etnia` DISABLE KEYS */;
INSERT INTO `etnia` (`id_etn`, `descricao_etn`) VALUES
	(1, 'Preto'),
	(2, 'Pardo'),
	(3, 'Indígena'),
	(4, 'Amarelo'),
	(5, 'Branco'),
	(6, 'Outros');
/*!40000 ALTER TABLE `etnia` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.formacao_usuario
CREATE TABLE IF NOT EXISTS `formacao_usuario` (
  `id_form` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_form` text NOT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.formacao_usuario: 11 rows
/*!40000 ALTER TABLE `formacao_usuario` DISABLE KEYS */;
INSERT INTO `formacao_usuario` (`id_form`, `descricao_form`) VALUES
	(1, 'Analfabeto'),
	(2, 'Ensino primário incompleto'),
	(3, 'Ensino primário completo'),
	(4, 'Ensino médio incompleto'),
	(5, 'Ensino médio completo'),
	(6, 'Graduação incompleta'),
	(7, 'Graduação completa'),
	(8, 'Mestrado incompleto'),
	(9, 'Mestrado completo'),
	(10, 'Doutorado incompleto'),
	(11, 'Doutorado completo');
/*!40000 ALTER TABLE `formacao_usuario` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `id_hist` int(11) NOT NULL AUTO_INCREMENT,
  `nome_empresa_hist` varchar(80) NOT NULL DEFAULT '',
  `sobre_hist` text NOT NULL,
  `valores_hist` text NOT NULL,
  `endereco_hist` text NOT NULL,
  `telefone_hist` varchar(11) NOT NULL DEFAULT '',
  `whatsapp_hist` varchar(11) DEFAULT '',
  `site_hist` varchar(50) DEFAULT '',
  `id_empresa_hist` int(11) NOT NULL,
  PRIMARY KEY (`id_hist`),
  KEY `FK_historico_empresa_simples` (`id_empresa_hist`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.historico: 14 rows
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` (`id_hist`, `nome_empresa_hist`, `sobre_hist`, `valores_hist`, `endereco_hist`, `telefone_hist`, `whatsapp_hist`, `site_hist`, `id_empresa_hist`) VALUES
	(1, '', '', '', '', '', '', '', 0),
	(2, '', '', '', '', '', '', '', 0),
	(3, 'aaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaa', 'aaaaaaaaaaa', 'https://br.pinterest.com/', 0),
	(4, 'aaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaa', 'aaaaaaaaaaa', 'https://br.pinterest.com/', 0),
	(5, 'aaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaa', 'aaaaaaaaaaa', 'https://br.pinterest.com/', 0),
	(6, 'aaaaaaaaa', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaa', 'aaaaaaaaaaa', 'https://br.pinterest.com/', 0),
	(7, 'teste', 'teste', 'teste', 'teste', '13565656', '6565655', 'https://br.pinterest.com/', 0),
	(8, 'teste', 'teste', 'teste', 'teste', '13565656', '6565655', 'https://br.pinterest.com/', 0),
	(9, 'teste', 'teste', 'teste', 'teste', '13565656', '6565655', 'https://br.pinterest.com/', 0),
	(10, 'teste', 'teste', 'teste', 'teste', '13565656', '6565655', 'https://br.pinterest.com/', 0),
	(11, 'Teste', 'teste', 'teste', 'teste', '6446464', '65464464', 'https://marilianoticia.com.br/', 0),
	(12, '', '', '', '', '', '', '', 12),
	(14, 'Empresa1', 'Sobre Empresa 1', 'Valores Empresa 1', 'Rua Empresa 1', '123456789', '123456789', 'https://www.youtube.com/', 1),
	(15, 'Empresa Ltda', 'Somos uma empresa de tecnologia', 'Valorizamos o bem estar de nossos clientes', 'Rua ficticia', '123456789', '123456789', 'https://www.youtube.com/', 13);
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.imagem_historico
CREATE TABLE IF NOT EXISTS `imagem_historico` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `imagem_img` longblob,
  `id_historico_img` int(11) NOT NULL,
  PRIMARY KEY (`id_img`),
  KEY `FK_imagem_historico_historico` (`id_historico_img`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.imagem_historico: 59 rows
/*!40000 ALTER TABLE `imagem_historico` DISABLE KEYS */;
INSERT INTO `imagem_historico` (`id_img`, `imagem_img`, `id_historico_img`) VALUES
	(1, _binary 0x31323836623738373337396365343564306361366436643330373436656331312e6a7067, 9),
	(2, _binary 0x33383038356438626561303532663866313063396363633736373632613061312e6a7067, 10),
	(3, _binary 0x39393865626632313739303233323261366238666537346239306333303735392e6a7067, 0),
	(4, _binary 0x65646532303163353235366438303832636638313132643532376164653638612e6a7067, 0),
	(5, _binary 0x63663130303931363634343539653466306364623831663331616465353630302e6a7067, 0),
	(6, _binary 0x62306565303438616166393930393664333762613564626637333239323161352e6a7067, 0),
	(7, _binary 0x65386332353166623932303237663238303436323733636235656463653936612e6a7067, 0),
	(8, _binary 0x65346331343438666538343036353235386230393731663962326137663562622e6a7067, 0),
	(9, _binary 0x61333761663639383834616264316366313633653861373963303936313039652e6a7067, 0),
	(10, _binary 0x33646661383939633564666464316137613937306236663263326531633131612e6a7067, 0),
	(11, _binary 0x35313231333837663238373039326635373761633737396235626263383237332e6a7067, 0),
	(12, _binary 0x65616232613737653830353061393539393832336435393234303666626164622e6a7067, 0),
	(13, _binary 0x39366666666630363037663234323837623364643739393665343861313362632e6a7067, 0),
	(14, _binary 0x34336164356565303063313862336135623061623165383337376637376463312e6a7067, 0),
	(15, _binary 0x63323839633061353830666462663866346562363266363036353437623032312e6a7067, 0),
	(16, _binary 0x61656162356365396535336164303165346561636235303134613933666266362e6a7067, 0),
	(17, _binary 0x36373030663339616234306666306162323866303134383463323132616162342e6a7067, 0),
	(18, _binary 0x35373362316132333065333630313031383635303739303639663135663264352e6a7067, 0),
	(19, _binary 0x38363839333436393766633838333235333433336136343063613434326630632e6a7067, 0),
	(20, _binary 0x61313036646261356131353739396263336333613238303836613561313834392e6a7067, 0),
	(21, _binary 0x33616234313262313134393366336634303932643839653936616237356430612e6a7067, 0),
	(22, _binary 0x37633261663538653439623338643938346562326133383535356566633434642e6a7067, 0),
	(23, _binary 0x35333063313933376562366334333736633230613365343739393931646466662e6a7067, 0),
	(24, _binary 0x30393939303432613434636233666634323139643762613538653265396631362e6a7067, 0),
	(25, _binary 0x30326533373330613261336161346232663738323032626135303539643966302e6a7067, 0),
	(26, _binary 0x37666235323261366139393532323035636234393865636230393237626631662e6a7067, 0),
	(27, _binary 0x65366536336565613339653565323562666437323363643438303137633037392e6a7067, 0),
	(28, _binary 0x34396330613364346266393261616364326662366437383963313062386132342e6a7067, 0),
	(29, _binary 0x30313931383862346336333063653836346363383933663030316334616530612e6a7067, 0),
	(30, _binary 0x63383232306637303530383931643564353633393634356562376262396339652e6a7067, 0),
	(31, _binary 0x63643861633566343032363337653732343934613930316331616430346137352e6a7067, 0),
	(32, _binary 0x31366330363034643834656237386166613765366639636564623663366531622e6a7067, 11),
	(33, _binary 0x66643236386131363162333163386233616639343036316564316462373237612e6a7067, 0),
	(34, _binary 0x63316130313263656463383762333665613465363831306137666565326234632e6a7067, 0),
	(35, _binary 0x39636164323033366361663765663930666430643463336334306131356539622e6a7067, 0),
	(36, _binary 0x38356665666534343033306461356361303436613162616564646336303935372e6a7067, 0),
	(37, _binary 0x31313762643165653235663037613231623863646435343335346565646434332e6a7067, 0),
	(38, _binary 0x64316366636262363865643763373430343533386435636232663738663736352e6a7067, 0),
	(39, _binary 0x38646634343533303337636466653638323239383461613665613333396134382e6a7067, 0),
	(40, _binary 0x65323165366461646639393566323033353463663336656264626163353839322e6a7067, 0),
	(41, _binary 0x35373535666630383232326435376334336138366536323365316331393830362e6a7067, 0),
	(42, _binary 0x33626539373962393864316535336439383135396138653537646435663139332e6a7067, 0),
	(43, _binary 0x35336539333566666530376664366231386430373563313334653035333062632e6a7067, 0),
	(44, _binary 0x30356634336166653535366433643065343839303438393830383064613936642e6a7067, 0),
	(45, _binary 0x30316638313963623466333165333235653734663465643466333064623062342e6a7067, 0),
	(46, _binary 0x38613534306262373235383531376236396437303535396361613935383838362e6a7067, 0),
	(47, _binary 0x32643430386263333933316238356539306331373064616139663738373831332e6a7067, 0),
	(48, _binary 0x35653939613636353531643462383335326564303735313961643965636239652e6a7067, 12),
	(49, _binary 0x62373134313033386230646439653164316133363736376439333830646364332e706e67, 13),
	(50, _binary 0x37623561656564343265336465303830656335616335613734653230663334352e6a7067, 0),
	(51, _binary 0x35633764316638323865303731643464333335646261343864303638343862632e6a7067, 0),
	(52, _binary 0x32616266633532346166373038303136623834666338393332656639376437662e6a7067, 0),
	(53, _binary 0x64346261383938653432353638373736373732666539656331373362653632322e6a7067, 0),
	(54, _binary 0x35356139663033356564353339646465656465613065393337396563366363352e6a7067, 0),
	(55, _binary 0x36353834366432396338303066393338303030626232633163626136326461362e6a7067, 0),
	(56, _binary 0x64623866646230653765653432643765396561326631646665646336303461352e6a7067, 0),
	(57, _binary 0x62376362356237376137353462663164636135616337333034623438313333642e6a7067, 0),
	(58, _binary 0x30363635313737306664336235663232623630303136363839626364386135642e6a7067, 0),
	(59, _binary 0x38363031313437636166643062633335376162366630326432393261626330302e6a7067, 15);
/*!40000 ALTER TABLE `imagem_historico` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.imagens_vagas
CREATE TABLE IF NOT EXISTS `imagens_vagas` (
  `id_img_vag` int(11) NOT NULL AUTO_INCREMENT,
  `imagem_vag` longblob,
  `id_vaga_img` int(11) NOT NULL,
  PRIMARY KEY (`id_img_vag`),
  KEY `FK_imagens_vagas_vagas` (`id_vaga_img`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.imagens_vagas: 7 rows
/*!40000 ALTER TABLE `imagens_vagas` DISABLE KEYS */;
INSERT INTO `imagens_vagas` (`id_img_vag`, `imagem_vag`, `id_vaga_img`) VALUES
	(1, _binary 0x64396665613535343039653833623431386630663066306663666139616637352e6a7067, 12),
	(2, _binary 0x64353336623939626465353566363063643538383064633361646366356537632e706e67, 13),
	(3, _binary 0x66343136623438386131313435663461373333663235303732623030343234302e706e67, 14),
	(4, _binary 0x31386539333964616630363664346561316638643535303430383837343162372e6a7067, 15),
	(5, _binary 0x39323731623632376464346461633639316339376364386232353634316135642e6a7067, 16),
	(6, _binary 0x36313665383764373536366435616232303862653934356230396534373663652e6a7067, 17),
	(7, _binary 0x66613035656630623333623937303763356638626539386130626537306334352e6a7067, 18);
/*!40000 ALTER TABLE `imagens_vagas` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.responsavel_empresarial
CREATE TABLE IF NOT EXISTS `responsavel_empresarial` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `nome_res` varchar(100) NOT NULL DEFAULT '',
  `departamento_res` varchar(50) NOT NULL DEFAULT '',
  `telefone_res` varchar(11) NOT NULL DEFAULT '',
  `telefone_comercial_res` varchar(11) NOT NULL DEFAULT '',
  `email_res` varchar(80) NOT NULL DEFAULT '',
  `senha_res` varchar(32) NOT NULL,
  PRIMARY KEY (`id_res`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.responsavel_empresarial: 7 rows
/*!40000 ALTER TABLE `responsavel_empresarial` DISABLE KEYS */;
INSERT INTO `responsavel_empresarial` (`id_res`, `nome_res`, `departamento_res`, `telefone_res`, `telefone_comercial_res`, `email_res`, `senha_res`) VALUES
	(1, 'teste', 'teste', '142536', '1425361', 'teste@teste.com', 'atte223'),
	(2, 'Teste', 'Teste', '123456', '123456', 'teste@teste.com', ''),
	(3, 'Teste', 'Teste', '123456', '123456', 'teste@teste.com', ''),
	(4, 'Teste', 'Teste', '123456', '123456', 'teste@teste.com', ''),
	(5, 'Pessoa', 'Empresa', '12345678999', '12345678992', 'empresa@empresa.com', 'empresa123'),
	(6, 'Roberto', 'RHA', '12345678999', '12345678999', 'rha@rha.com', 'rha1230'),
	(7, 'Giovana Oliveira', 'RHA', '14256235698', '14265236526', 'zamar@zamar.com', 'zamar123');
/*!40000 ALTER TABLE `responsavel_empresarial` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_sexo` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sexo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.sexo: 4 rows
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` (`id_sexo`, `descricao_sexo`) VALUES
	(1, 'Feminino'),
	(2, 'Masculino'),
	(3, 'Não Binário'),
	(4, 'Outros');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.tipo_contratacao_emp
CREATE TABLE IF NOT EXISTS `tipo_contratacao_emp` (
  `id_contrat` int(11) NOT NULL AUTO_INCREMENT,
  `descricao_contrat` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_contrat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.tipo_contratacao_emp: 5 rows
/*!40000 ALTER TABLE `tipo_contratacao_emp` DISABLE KEYS */;
INSERT INTO `tipo_contratacao_emp` (`id_contrat`, `descricao_contrat`) VALUES
	(1, 'Estágio'),
	(2, 'Carteira Assinada'),
	(3, 'Jovem Aprendiz'),
	(4, 'Experiência'),
	(5, 'Temporário');
/*!40000 ALTER TABLE `tipo_contratacao_emp` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.tipo_documento: 6 rows
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` (`id_doc`, `tipo_doc`) VALUES
	(1, 'RG'),
	(2, 'CPF'),
	(3, 'Passaporte'),
	(5, 'CRNM'),
	(6, 'DPRNM'),
	(7, 'RNE');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.tipo_documento_emp
CREATE TABLE IF NOT EXISTS `tipo_documento_emp` (
  `id_doc_emp` int(11) NOT NULL AUTO_INCREMENT,
  `documento_emp` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_doc_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.tipo_documento_emp: ~2 rows (aproximadamente)
INSERT INTO `tipo_documento_emp` (`id_doc_emp`, `documento_emp`) VALUES
	(1, 'CPF'),
	(2, 'CNPJ');

-- Copiando estrutura para tabela banco_araras.usuario_simples
CREATE TABLE IF NOT EXISTS `usuario_simples` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usu` varchar(100) NOT NULL DEFAULT '0',
  `nome_social_usu` varchar(100) DEFAULT '0',
  `nacionalidade_usu` varchar(30) NOT NULL DEFAULT '0',
  `data_nascimento_usu` date NOT NULL,
  `id_tipo_doc_usu` int(11) NOT NULL DEFAULT '0',
  `identidade_usu` varchar(20) NOT NULL DEFAULT '0',
  `telefone_usu` varchar(11) DEFAULT '0',
  `celular_usu` varchar(11) NOT NULL DEFAULT '0',
  `email_usu` varchar(80) NOT NULL,
  `senha_usu` varchar(32) NOT NULL,
  `rua_usu` varchar(80) NOT NULL,
  `numero_casa_usu` int(11) NOT NULL DEFAULT '0',
  `complemento_usu` varchar(50) DEFAULT '0',
  `cep_usu` int(11) NOT NULL DEFAULT '0',
  `bairro_usu` varchar(80) NOT NULL,
  `cidade_usu` varchar(80) NOT NULL,
  `estado_usu` varchar(80) NOT NULL,
  `pais_usu` varchar(80) NOT NULL,
  `id_sexo_usu` int(11) NOT NULL DEFAULT '0',
  `id_etnia_usu` int(11) unsigned NOT NULL DEFAULT '0',
  `id_formacao_usu` int(11) NOT NULL DEFAULT '0',
  `id_visto_usu` int(11) NOT NULL,
  `descricao_visto_usu` varchar(100) DEFAULT '',
  `id_deficiencia_usu` int(11) NOT NULL,
  `interesse_prof_usu` varchar(200) NOT NULL,
  `sobre_usu` text,
  `foto_usuario` blob,
  PRIMARY KEY (`id_usu`) USING BTREE,
  KEY `FK_usuario_simples_sexo` (`id_sexo_usu`),
  KEY `FK_usuario_simples_etnia` (`id_etnia_usu`),
  KEY `FK_usuario_simples_formacao_usuario` (`id_formacao_usu`),
  KEY `FK_usuario_simples_tipo_documento` (`id_tipo_doc_usu`),
  KEY `FK_usuario_simples_visto` (`id_visto_usu`),
  KEY `FK_usuario_simples_deficiencias` (`id_deficiencia_usu`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.usuario_simples: 20 rows
/*!40000 ALTER TABLE `usuario_simples` DISABLE KEYS */;
INSERT INTO `usuario_simples` (`id_usu`, `nome_usu`, `nome_social_usu`, `nacionalidade_usu`, `data_nascimento_usu`, `id_tipo_doc_usu`, `identidade_usu`, `telefone_usu`, `celular_usu`, `email_usu`, `senha_usu`, `rua_usu`, `numero_casa_usu`, `complemento_usu`, `cep_usu`, `bairro_usu`, `cidade_usu`, `estado_usu`, `pais_usu`, `id_sexo_usu`, `id_etnia_usu`, `id_formacao_usu`, `id_visto_usu`, `descricao_visto_usu`, `id_deficiencia_usu`, `interesse_prof_usu`, `sobre_usu`, `foto_usuario`) VALUES
	(1, 'Teste1', '0', 'Brasileira', '2022-11-16', 1, '1234568', '1498156355', '14981563565', 'teste@teste.com', 'abc123456', 'aaaaaa', 15, 'aaaa', 12345697, 'aaaaa', 'aaaaaa', 'aaaaa', 'aaaaa', 1, 1, 1, 1, 'aaaaaaa', 1, 'aaaaaaa', 'aaaaaa', NULL),
	(2, 'Teste1', '0', 'aaaaaaaaaa', '2022-11-11', 1, '1265656', '1234567890', '12345678951', 'teste@teste.com ', 'aaaaaaaaaa555555', 'aaaaaaaaaaa', 123456, 'aaaaa', 125464, 'aaaaaa', 'aaaaa', 'aaaaa', 'aaaaaa', 1, 1, 1, 1, 'aaaaaa', 4, 'aaaaaaa', 'aaaaaaaaaaa', NULL),
	(3, 'Teste1', '0', 'Brasileira', '2022-11-06', 1, '123456789', '14253614', '1425361425', 'teste@teste.com ', 'gilinda123456', 'aaaaaaaa', 123654, 'aaaaaaaaa', 123654, 'aaaaaaa', 'aaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaaa', 1, 1, 10, 1, 'aaaaaaaaaa', 5, 'teste', 'aaaaaaaaaaaa', NULL),
	(4, 'Teste1', '0', 'teste', '2022-11-24', 1, '6565655', '6565655', '32323232', 'teste@teste.com ', 'aaa5555', 'aaaaaaa', 55555445, 'aaaaaaaaa', 4554544, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', 1, 2, 9, 1, 'aaaaaaaaa', 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', NULL),
	(5, 'Teste1', '0', 'teste', '2022-11-24', 1, '6565655', '6565655', '32323232', 'teste@teste.com ', 'aaaaaaaaaaaaaaa', 'aaaaaaa', 55555445, 'aaaaaaaaa', 4554544, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', 1, 2, 9, 1, 'aaaaaaaaa', 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', NULL),
	(6, 'Teste1', '0', 'teste', '2022-11-24', 1, '6565655', '6565655', '32323232', 'teste@teste.com ', 'aaaaaaaa', 'aaaaaaa', 55555445, 'aaaaaaaaa', 4554544, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', 1, 2, 9, 1, 'aaaaaaaaa', 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', NULL),
	(7, 'Teste1', '0', 'teste', '2022-11-24', 1, '6565655', '6565655', '32323232', 'teste@teste.com ', 'aaaaaaaaaaa', 'aaaaaaa', 55555445, 'aaaaaaaaa', 4554544, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', 1, 2, 9, 1, 'aaaaaaaaa', 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', NULL),
	(8, 'Teste1', '0', 'teste', '2022-11-24', 1, '6565655', '6565655', '32323232', 'teste@teste.com ', 'aaaaa', 'aaaaaaa', 55555445, 'aaaaaaaaa', 4554544, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', 1, 2, 9, 1, 'aaaaaaaaa', 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', NULL),
	(9, 'Teste1', '0', 'teste', '2022-11-24', 1, '6565655', '6565655', '32323232', 'teste@teste.com ', 'aaaaaa', 'aaaaaaa', 55555445, 'aaaaaaaaa', 4554544, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaaaaaaa', 1, 2, 9, 1, 'aaaaaaaaa', 6, 'aaaaaaaaaaaa', 'aaaaaaaaaaa', NULL),
	(10, 'Teste1', '0', 'Brasileira', '2022-11-21', 1, '123456789', '123456789', '123456789', 'teste@teste.com ', 'teste123456', 'teste', 123456, 'aaaaa', 123456, 'teste', 'aaaa', 'aaaaa', 'aaaaa', 1, 2, 8, 1, 'aaaaaa', 5, 'Teste', 'Teste', NULL),
	(11, 'Teste1', '0', 'Brasileira', '2022-11-21', 1, '123456789', '123456789', '123456789', 'teste@teste.com ', 'aaaaa', 'teste', 123456, 'aaaaa', 123456, 'teste', 'aaaa', 'aaaaa', 'aaaaa', 1, 2, 8, 1, 'aaaaaa', 5, 'Teste', 'Teste', NULL),
	(12, 'Teste123', 'Rachael', 'Testeabc', '2004-08-14', 3, '1234567222', '155332', '4556565', 'teste@teste12.com', 'teste12450', 'teste1221', 155992, 'testeaa', 3563564, 'testetess', 'testess', 'testesss', 'testesssss', 1, 5, 10, 2, '', 6, 'Testeesses', 'aaaaaaaaaaaaaaaaaaaaa', NULL),
	(13, 'Teste1', 'Carol', 'Brasileira', '2022-11-10', 2, '123456789', '1425361425', '12345687995', 'teste@teste.com ', '827ccb0eea8a706c4c34a16891f84e7b', 'aaaaaa', 12365, 'aaaaaaaa', 445554, 'aaaaaaaaaaa', 'aaaaaaaaa', 'aaaaaaaa', 'aaaaaaaaa', 1, 1, 8, 1, 'aaaaaaaaaa', 4, 'teste', 'teste', NULL),
	(14, 'Teste1', 'Carol', 'Brasileira', '2022-11-04', 1, '1265656', '3543543544', '544445', 'teste@teste.com ', 'b6a615cbb437caa5a0cc0ff2d833eb3a', 'aaaaaaa', 35566, 'aaaaaaaaa', 66556565, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaa', 1, 4, 8, 1, 'aaaaaaaaa', 7, 'teste', 'ghghgh', NULL),
	(15, 'Teste1', '', 'Brasileira', '2022-11-04', 1, '1265656', '3543543544', '544445', 'teste@teste.com ', '2ee4ff62edbd401d13a4a3507ecab8e6', 'aaaaaaa', 35566, 'aaaaaaaaa', 66556565, 'aaaaaaa', 'aaaaa', 'aaaaaaaa', 'aaaaaa', 1, 4, 8, 1, 'aaaaaaaaa', 7, 'teste', 'ghghgh', NULL),
	(16, 'Teste1', 'Gigi FuracÃ£o', 'Do mundÃ£o', '2004-08-14', 1, '123456789', '142536523', '233652325', 'giovana@giovana.com ', 'e10adc3949ba59abbe56e057f20f883e', 'Fim do Mundo', 666, 'Casa torta', 666999777, 'Parque do Penhasco', 'Onde judas perdeu as botas', 'Depressivo', 'Terra Plana', 1, 2, 11, 1, 'Vista grossa', 2, 'Que pague bem', 'A mÃ£e Ã© d++', NULL),
	(17, 'Teste1', '', 'Brasileira', '2004-08-14', 2, '1234698752', '14253623165', '14253614256', 'giovana@giovana.com ', '123654', 'Antonio BuracÃ£o', 666, 'Casita Madrigal', 156236523, 'Fim do mundo', 'Uc do mundo', 'Depressivo', 'Brasil sil sil', 1, 2, 8, 2, '', 7, 'Programadora', '', NULL),
	(18, 'Teste1', 'Maria ', 'Mexicana', '2022-11-08', 1, '123589654789', '14253636253', '25363146325', 'maria@maria.com ', 'maria123', 'Campos do JordÃ£o', 231, 'Casa', 22556633, 'MaringÃ¡', 'Jundiai', 'Pernambuco', 'Brasil', 3, 3, 5, 1, 'Estudante', 7, 'AdministraÃ§Ã£o', '', NULL),
	(19, 'Teste1', 'Amanda', 'Mexicana', '2000-05-14', 2, '123654789', '14253666666', '14477788888', 'lele@lele.com ', 'lele123', 'fim do mundo ', 5555, 'casita', 142536362, 'barzinho', 'marilia', 'sp', 'brasil', 1, 1, 8, 1, 'estudante', 7, 'Tester', 'Alo alo', NULL),
	(20, 'Teste1', 'Amanda', 'Mexicana', '2000-05-14', 2, '123654789', '14253666666', '14477788888', 'lele@lele.com ', 'lele123', 'fim do mundo ', 5555, 'casita', 142536362, 'barzinho', 'marilia', 'sp', 'brasil', 1, 1, 8, 1, 'estudante', 7, 'Tester', 'Alo alo', NULL),
	(21, 'Fabricio Oliveira', '', 'Brasileiro', '2022-12-19', 3, '1562366562', '14566322566', '25698888888', 'oliveira@oliveira.com ', 'asaasas', 'campos', 2121, 'aaaaaaa', 66655655, 'aaaa', 'aaaaaaaa', 'aaaaa', 'aaaa', 2, 5, 10, 1, 'aaaaaaaaa', 7, 'tETSTETETETE', 'EERERER', _binary 0x34326236303766663133656231336230653239363531356239313336633161332e6a7067);
/*!40000 ALTER TABLE `usuario_simples` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.vagas
CREATE TABLE IF NOT EXISTS `vagas` (
  `id_vagas` int(11) NOT NULL AUTO_INCREMENT,
  `nome_vagas` varchar(80) NOT NULL DEFAULT '0',
  `quantidade_vagas` int(11) NOT NULL DEFAULT '0',
  `area_vagas` varchar(80) NOT NULL DEFAULT '0',
  `tipo_vagas` varchar(80) NOT NULL DEFAULT '0',
  `local_vagas` varchar(100) NOT NULL DEFAULT '0',
  `data_inicio_vagas` date NOT NULL,
  `data_final_vagas` date NOT NULL,
  `descricao_vagas` text NOT NULL,
  `restricao_vagas` text NOT NULL,
  `id_tipo_contratacao_vagas` int(11) NOT NULL DEFAULT '0',
  `id_empresa_vagas` int(11) NOT NULL,
  PRIMARY KEY (`id_vagas`),
  KEY `FK_vagas_tipo_contratacao_emp` (`id_tipo_contratacao_vagas`),
  KEY `FK_vagas_empresa_simples` (`id_empresa_vagas`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.vagas: 18 rows
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` (`id_vagas`, `nome_vagas`, `quantidade_vagas`, `area_vagas`, `tipo_vagas`, `local_vagas`, `data_inicio_vagas`, `data_final_vagas`, `descricao_vagas`, `restricao_vagas`, `id_tipo_contratacao_vagas`, `id_empresa_vagas`) VALUES
	(1, 'teste', 5, 'teste', 'teste', 'teste', '2022-11-19', '2022-11-19', 'teste', 'teste', 1, 0),
	(2, 'Teste', 53, 'Teste', 'Teste', 'Teste', '2022-11-16', '2022-11-23', 'Teste', 'Teste', 2, 0),
	(3, 'Teste', 53, 'Teste', 'Teste', 'Teste', '2022-11-16', '2022-11-23', 'Teste', 'Teste', 2, 0),
	(4, 'Teste', 53, 'Teste', 'Teste', 'Teste', '2022-11-16', '2022-11-23', 'Teste', 'Teste', 4, 0),
	(5, 'Teste', 53, 'Teste', 'Teste', 'Teste', '2022-11-16', '2022-11-23', 'Teste', 'Teste', 4, 0),
	(6, 'Teste', 53, 'Teste', 'Teste', 'Teste', '2022-11-16', '2022-11-23', 'Teste', 'Teste', 4, 0),
	(7, 'Teste', 53, 'Teste', 'Teste', 'Teste', '2022-11-16', '2022-11-23', 'Teste', 'Teste', 4, 0),
	(8, 'tESTE', 52, 'Teste', 'Teste', 'Teste', '2022-11-25', '2022-11-27', 'Teste', 'Teste', 3, 0),
	(9, 'tESTE', 52, 'Teste', 'Teste', 'Teste', '2022-11-25', '2022-11-27', 'Teste', 'Teste', 3, 0),
	(10, 'tESTE', 52, 'Teste', 'Teste', 'Teste', '2022-11-25', '2022-11-27', 'Teste', 'Teste', 3, 0),
	(11, 'tESTE', 52, 'Teste', 'Teste', 'Teste', '2022-11-25', '2022-11-27', 'Teste', 'Teste', 3, 0),
	(12, 'tESTE', 52, 'Teste', 'Teste', 'Teste', '2022-11-25', '2022-11-27', 'Teste', 'Teste', 3, 0),
	(13, 'Estagio', 15, 'teste', 'teste', 'teste', '2022-11-07', '2022-11-12', 'Teste', 'teste', 3, 12),
	(14, 'Emprego', 12, 'teste', 'teste', 'teste', '2022-11-25', '2022-11-15', 'teste', 'teste', 5, 12),
	(15, 'Empregado', 1, 'NÃ£o informado', 'NÃ£o informado', 'NÃ£o informado', '2022-11-24', '2022-11-30', 'NÃ£o informado', 'NÃ£o informado', 2, 12),
	(16, 'Nome da vaga', 13, 'Area de atuacao', 'tipo da vaga', 'local vaga', '2022-11-08', '2022-11-30', 'Descricao vaga', 'requisitos vaga', 5, 12),
	(17, 'Desenvolvedor front end', 13, 'ProgramaÃ§Ã£o', 'Tempo integral', 'Rua ficticia', '2022-11-25', '2022-11-30', 'Essa vaga Ã© direcionada a pessoas que saibam programaÃ§Ã£o', 'Sem requisitos', 2, 13),
	(18, 'Programador front end', 12, 'ProgramÃ§Ã£o', 'Integral', 'Algum empresa', '2022-11-28', '2022-11-30', 'Paga bem o trabalho hehehe', 'Ter forÃ§a de vontade', 2, 12);
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.visto
CREATE TABLE IF NOT EXISTS `visto` (
  `id_visto` int(11) NOT NULL AUTO_INCREMENT,
  `possui_visto` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_visto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela banco_araras.visto: 2 rows
/*!40000 ALTER TABLE `visto` DISABLE KEYS */;
INSERT INTO `visto` (`id_visto`, `possui_visto`) VALUES
	(1, 'Sim'),
	(2, 'Não');
/*!40000 ALTER TABLE `visto` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
