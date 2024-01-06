-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.27 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
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
CREATE DATABASE IF NOT EXISTS `banco_araras` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `banco_araras`;

-- Copiando estrutura para tabela banco_araras.assunto_contato
CREATE TABLE IF NOT EXISTS `assunto_contato` (
  `id_ass` int NOT NULL AUTO_INCREMENT,
  `descricao_ass` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_ass`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

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
  `id_usu_vag` int NOT NULL AUTO_INCREMENT,
  `id_usuario_vagas` int NOT NULL,
  `id_vaga` int NOT NULL,
  PRIMARY KEY (`id_usu_vag`),
  KEY `FK__usuario_simples` (`id_usuario_vagas`),
  KEY `FK_cadastro_usuario_vaga_vagas` (`id_vaga`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.cadastro_usuario_vaga: 6 rows
/*!40000 ALTER TABLE `cadastro_usuario_vaga` DISABLE KEYS */;
INSERT INTO `cadastro_usuario_vaga` (`id_usu_vag`, `id_usuario_vagas`, `id_vaga`) VALUES
	(1, 4, 6),
	(2, 4, 9),
	(3, 4, 1),
	(4, 4, 3);
/*!40000 ALTER TABLE `cadastro_usuario_vaga` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.contato
CREATE TABLE IF NOT EXISTS `contato` (
  `id_cont` int NOT NULL AUTO_INCREMENT,
  `nome_cont` varchar(80) NOT NULL DEFAULT '',
  `email_cont` varchar(80) NOT NULL DEFAULT '',
  `telefone_cont` varchar(11) DEFAULT '',
  `mensagem_cont` text NOT NULL,
  `id_assunto_cont` int NOT NULL,
  PRIMARY KEY (`id_cont`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.contato: 1 rows
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.curriculos
CREATE TABLE IF NOT EXISTS `curriculos` (
  `id_curr` int NOT NULL AUTO_INCREMENT,
  `curriculo_curr` blob,
  `id_usuario_curr` int NOT NULL,
  PRIMARY KEY (`id_curr`),
  KEY `FK_curriculos_usuario_simples` (`id_usuario_curr`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.curriculos: 2 rows
/*!40000 ALTER TABLE `curriculos` DISABLE KEYS */;
/*!40000 ALTER TABLE `curriculos` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.deficiencias
CREATE TABLE IF NOT EXISTS `deficiencias` (
  `id_def` int NOT NULL AUTO_INCREMENT,
  `descricao_def` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_def`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.deficiencias: 7 rows
/*!40000 ALTER TABLE `deficiencias` DISABLE KEYS */;
INSERT INTO `deficiencias` (`id_def`, `descricao_def`) VALUES
	(1, 'Física'),
	(2, 'Visual'),
	(3, 'Auditiva'),
	(4, 'Intelectual'),
	(5, 'Psicossocial'),
	(6, 'Múltipla'),
	(7, 'Nenhuma');
/*!40000 ALTER TABLE `deficiencias` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.empresa_simples
CREATE TABLE IF NOT EXISTS `empresa_simples` (
  `id_emp` int NOT NULL AUTO_INCREMENT,
  `id_tipo_doc_emp` int NOT NULL DEFAULT '0',
  `numero_doc_emp` varchar(14) NOT NULL DEFAULT '',
  `cei_emp` varchar(14) DEFAULT '',
  `razao_emp` varchar(80) NOT NULL DEFAULT '',
  `nome_fantasia_emp` varchar(50) NOT NULL DEFAULT '',
  `ramo_emp` varchar(30) NOT NULL DEFAULT '',
  `rua_emp` varchar(80) NOT NULL DEFAULT '',
  `numero_end_emp` int NOT NULL DEFAULT '0',
  `complemento_emp` varchar(50) DEFAULT '0',
  `cep_emp` int NOT NULL DEFAULT '0',
  `bairro_emp` varchar(80) NOT NULL DEFAULT '',
  `cidade_emp` varchar(80) NOT NULL DEFAULT '',
  `estado_emp` varchar(80) NOT NULL DEFAULT '',
  `pais_emp` varchar(80) NOT NULL DEFAULT '',
  `id_responsavel_emp` int NOT NULL,
  PRIMARY KEY (`id_emp`),
  KEY `FK_empresa_simples_responsavelempresarial` (`id_responsavel_emp`),
  KEY `FK_empresa_simples_tipo_documento_emp` (`id_tipo_doc_emp`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.empresa_simples: 3 rows
/*!40000 ALTER TABLE `empresa_simples` DISABLE KEYS */;
INSERT INTO `empresa_simples` (`id_emp`, `id_tipo_doc_emp`, `numero_doc_emp`, `cei_emp`, `razao_emp`, `nome_fantasia_emp`, `ramo_emp`, `rua_emp`, `numero_end_emp`, `complemento_emp`, `cep_emp`, `bairro_emp`, `cidade_emp`, `estado_emp`, `pais_emp`, `id_responsavel_emp`) VALUES
	(1, 2, '52639875000169', '', 'Crustulum Ltda', 'Crustulum Fabricante de Biscoitos', 'Alimentício ', 'Rua Avenida Esmeraldaz', 34, '', 53629358, 'Esmeraldaz', 'Marília', 'SP', 'Brasil', 1),
	(2, 2, '11453245000178', '', 'Rekenaar Tecnologias e Computadores Ltda.', 'Rekenaar', 'Tecnologia', 'Rua Treze', 35, '', 12040859, 'Esplanada Indepêndencia', 'Taubaté', 'São Paulo', 'Brasil', 2),
	(3, 2, '67143598000145', '', 'Doctores Médicos de qualidade Ltda', 'Doctores', 'Medicina', 'Rua Galvão Raposo', 125, '', 50610330, 'Madalena', 'Recife', 'Pernambuco', 'Brasil', 3);
/*!40000 ALTER TABLE `empresa_simples` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.etnia
CREATE TABLE IF NOT EXISTS `etnia` (
  `id_etn` int NOT NULL AUTO_INCREMENT,
  `descricao_etn` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_etn`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

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
  `id_form` int NOT NULL AUTO_INCREMENT,
  `descricao_form` text NOT NULL,
  PRIMARY KEY (`id_form`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

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
  `id_hist` int NOT NULL AUTO_INCREMENT,
  `nome_empresa_hist` varchar(80) NOT NULL DEFAULT '',
  `sobre_hist` text NOT NULL,
  `valores_hist` text NOT NULL,
  `endereco_hist` text NOT NULL,
  `telefone_hist` varchar(11) NOT NULL DEFAULT '',
  `whatsapp_hist` varchar(11) DEFAULT '',
  `site_hist` varchar(50) DEFAULT '',
  `id_empresa_hist` int NOT NULL,
  PRIMARY KEY (`id_hist`),
  KEY `FK_historico_empresa_simples` (`id_empresa_hist`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.historico: 2 rows
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` (`id_hist`, `nome_empresa_hist`, `sobre_hist`, `valores_hist`, `endereco_hist`, `telefone_hist`, `whatsapp_hist`, `site_hist`, `id_empresa_hist`) VALUES
	(1, 'Crustulum Ltda', 'Somos uma fabricante e distribuidora de alimentos com nicho em biscoitos doces e salgados. Fundada em 2006, na cidade de Marília - SP, a Crustulum hoje é uma das maiores na região e no estado, exportando para todo o Brasil.  ', '"Trazer ao lar brasileiro o sabor de carinho e dedicação a cada mordida".', 'Rua Avenida Esmeraldaz, 34', '14985632963', '14985632963', 'http://devisate.com.br/', 1),
	(3, 'Rekenaar', 'Somos uma empresa formada na venda de computadores e de tecnologias inovadoras. Estamos no mercado há mais de dez anos, valorizando o trabalho em equipe e pessoas revolucionárias.', 'Os valores da Rekenaar são o respeito, responsabilidade acima de tudo, segurança, qualidade em produtos, compromisso com o crescimento, cuidado consigo mesmo, ética e honestidade.', 'Rua Treze, 13', '1433150245', '1433150245', 'http://devisate.com.br/', 2),
	(4, 'Doctores', 'Somos uma agência de médicos especializados, prontos para atender qualquer necessidade, com a competência e profissionalismo que só a Doctores pode oferecer.', 'Nossos valores incluem a ética, respeito ao próximo, sinceridade e proatividade.', 'Rua Galvão Raposo', '14990346712', '14990346712', 'http://devisate.com.br/', 3);
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.imagem_historico
CREATE TABLE IF NOT EXISTS `imagem_historico` (
  `id_img` int NOT NULL AUTO_INCREMENT,
  `imagem_img` longblob,
  `id_historico_img` int NOT NULL,
  PRIMARY KEY (`id_img`),
  KEY `FK_imagem_historico_historico` (`id_historico_img`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.imagem_historico: 0 rows
/*!40000 ALTER TABLE `imagem_historico` DISABLE KEYS */;
INSERT INTO `imagem_historico` (`id_img`, `imagem_img`, `id_historico_img`) VALUES
	(1, _binary 0x62356530306663363061313466393839333863363761386531326334653534622e706e67, 1),
	(2, _binary 0x35656539343563346262383663656539633536343236373131336365376164352e706e67, 3),
	(3, _binary 0x64326139313264363431653736363536613062653165306630336262633462362e706e67, 4);
/*!40000 ALTER TABLE `imagem_historico` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.imagens_vagas
CREATE TABLE IF NOT EXISTS `imagens_vagas` (
  `id_img_vag` int NOT NULL AUTO_INCREMENT,
  `imagem_vag` longblob,
  `id_vaga_img` int NOT NULL,
  PRIMARY KEY (`id_img_vag`),
  KEY `FK_imagens_vagas_vagas` (`id_vaga_img`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.imagens_vagas: 0 rows
/*!40000 ALTER TABLE `imagens_vagas` DISABLE KEYS */;
INSERT INTO `imagens_vagas` (`id_img_vag`, `imagem_vag`, `id_vaga_img`) VALUES
	(1, _binary 0x61306465373936316536643239313864656531316333393734656361633838382e706e67, 0),
	(2, _binary 0x34343838333439656238613462313863393362396634323964626435363839372e706e67, 1),
	(3, _binary 0x66393766633136656333383664656663383333616232373562646538623934662e706e67, 2),
	(4, _binary 0x39633939356535663066336535316462633438346663323131376638353864322e706e67, 3),
	(5, _binary 0x64343838636664303866656138366233356138663566343234666434626239622e6a7067, 6),
	(6, _binary 0x34323634393335633266396164396562313664356263303438633833643933312e6a7067, 7),
	(7, _binary 0x32353238396463663737366661613634646134656335393936636136356239312e6a7067, 8),
	(8, _binary 0x38363335353137643534323131653737623031356566353661363632656161342e6a7067, 9);
/*!40000 ALTER TABLE `imagens_vagas` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.responsavel_empresarial
CREATE TABLE IF NOT EXISTS `responsavel_empresarial` (
  `id_res` int NOT NULL AUTO_INCREMENT,
  `nome_res` varchar(100) NOT NULL DEFAULT '',
  `departamento_res` varchar(50) NOT NULL DEFAULT '',
  `telefone_res` varchar(11) NOT NULL DEFAULT '',
  `telefone_comercial_res` varchar(11) NOT NULL DEFAULT '',
  `email_res` varchar(80) NOT NULL DEFAULT '',
  `senha_res` varchar(32) NOT NULL,
  PRIMARY KEY (`id_res`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.responsavel_empresarial: 3 rows
/*!40000 ALTER TABLE `responsavel_empresarial` DISABLE KEYS */;
INSERT INTO `responsavel_empresarial` (`id_res`, `nome_res`, `departamento_res`, `telefone_res`, `telefone_comercial_res`, `email_res`, `senha_res`) VALUES
	(1, 'Thiago Mendez', 'RH', '14985632963', '1434563293', 'crustulum@gmail.com', 'crustulum123'),
	(2, 'Fábio José Soares', 'RH', '14991024562', '1433150245', 'sac@rekennar.com.br', 'rekenaar123'),
	(3, 'Lúcia Albuquerque da Silva', 'RH', '14990346712', '1433068943', 'doctores@gmail.com', 'doctores123');
/*!40000 ALTER TABLE `responsavel_empresarial` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` int NOT NULL AUTO_INCREMENT,
  `descricao_sexo` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sexo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

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
  `id_contrat` int NOT NULL AUTO_INCREMENT,
  `descricao_contrat` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_contrat`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

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
  `id_doc` int NOT NULL AUTO_INCREMENT,
  `tipo_doc` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

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
  `id_doc_emp` int NOT NULL AUTO_INCREMENT,
  `documento_emp` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_doc_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.tipo_documento_emp: ~2 rows (aproximadamente)
INSERT INTO `tipo_documento_emp` (`id_doc_emp`, `documento_emp`) VALUES
	(1, 'CPF'),
	(2, 'CNPJ');

-- Copiando estrutura para tabela banco_araras.usuario_simples
CREATE TABLE IF NOT EXISTS `usuario_simples` (
  `id_usu` int NOT NULL AUTO_INCREMENT,
  `nome_usu` varchar(100) NOT NULL DEFAULT '0',
  `nome_social_usu` varchar(100) DEFAULT '0',
  `nacionalidade_usu` varchar(30) NOT NULL DEFAULT '0',
  `data_nascimento_usu` date NOT NULL,
  `id_tipo_doc_usu` int NOT NULL DEFAULT '0',
  `identidade_usu` varchar(20) NOT NULL DEFAULT '0',
  `telefone_usu` varchar(11) DEFAULT '0',
  `celular_usu` varchar(11) NOT NULL DEFAULT '0',
  `email_usu` varchar(80) NOT NULL,
  `senha_usu` varchar(32) NOT NULL,
  `rua_usu` varchar(80) NOT NULL,
  `numero_casa_usu` int NOT NULL DEFAULT '0',
  `complemento_usu` varchar(50) DEFAULT '0',
  `cep_usu` int NOT NULL DEFAULT '0',
  `bairro_usu` varchar(80) NOT NULL,
  `cidade_usu` varchar(80) NOT NULL,
  `estado_usu` varchar(80) NOT NULL,
  `pais_usu` varchar(80) NOT NULL,
  `id_sexo_usu` int NOT NULL DEFAULT '0',
  `id_etnia_usu` int unsigned NOT NULL DEFAULT '0',
  `id_formacao_usu` int NOT NULL DEFAULT '0',
  `id_visto_usu` int NOT NULL,
  `descricao_visto_usu` varchar(100) DEFAULT '',
  `id_deficiencia_usu` int NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.usuario_simples: 5 rows
/*!40000 ALTER TABLE `usuario_simples` DISABLE KEYS */;
INSERT INTO `usuario_simples` (`id_usu`, `nome_usu`, `nome_social_usu`, `nacionalidade_usu`, `data_nascimento_usu`, `id_tipo_doc_usu`, `identidade_usu`, `telefone_usu`, `celular_usu`, `email_usu`, `senha_usu`, `rua_usu`, `numero_casa_usu`, `complemento_usu`, `cep_usu`, `bairro_usu`, `cidade_usu`, `estado_usu`, `pais_usu`, `id_sexo_usu`, `id_etnia_usu`, `id_formacao_usu`, `id_visto_usu`, `descricao_visto_usu`, `id_deficiencia_usu`, `interesse_prof_usu`, `sobre_usu`, `foto_usuario`) VALUES
	(1, 'Kieza Pacheco Magalhães', '', 'Angolana', '1982-02-15', 1, '536485523', '14998547832', '14998547832', 'kieza@gmail.com ', 'kieza123', 'Rua João Alfredo de Moraes', 23, '', 25869436, 'Jardim Damasco', 'Marília', 'SP', 'Brasil', 1, 1, 6, 1, 'Residente Permanente', 7, 'Administração', 'Sou uma mulher muito esforçada, desde os 11 anos trabalho e amo a carreira de administração, infelizmente não pude concluir meu curso superior por falta de recursos, porém ainda espero o concluir. Sou casada, mãe de dois filhos e espero dar o melhor para meus pequenos.', _binary 0x36373933313939386239333630613734343935313431323631303935666361312e6a7067),
	(2, 'Qamar Mohamed ', '', 'Sírio', '1995-04-12', 3, 'cs265436', '14918293821', '14918293821', 'qamar@hotmail.com ', 'qamar123', 'rua comendador roseira', 231, 'próximo ao teatro', 80230210, 'Prado velho', 'Curitiba', 'PR', 'Brasil', 2, 6, 7, 1, 'Residente permanente', 7, 'Médico', 'Vim da Síria como refugiado e estou me estabelecendo no Brasil a dois anos. Consegui validar meu diploma em território nacional e estou disposto a mudar de cidade para retomar minha profissão.', _binary 0x64373562306636656430636436386233653164383231633230386239373137372e6a7067),
	(3, 'Aisha Nair Al-amari', '', 'Catarense', '2000-07-26', 3, 'AG237416', '14991052354', '14991052354', 'aisha@gmail.com ', 'aisha123', 'Rua Recife', 93, '', 5276500, 'Guaiauna', 'São Paulo', 'SP', 'Brasil', 1, 6, 4, 2, '', 7, 'Emprendora', 'Sou refugiada do país Qatar', _binary 0x66626130306462383738336365336632323032313665383263326166313733302e6a7067),
	(4, 'Adriana González', 'Alex González', 'Venezuelana', '1996-02-29', 1, '3021415', '14992410546', '14992410546', 'alex@hotmail.com ', 'alex123', 'Rua Angelo Seneguine', 603, '', 17519420, 'Jardim Parati', 'Marília', 'SP', 'Brasil', 3, 5, 5, 1, 'Trabalho', 7, 'Programação', 'Sempre gostei de tecnologia. Vim da Venezuela buscando novas oportunidades e melhores condições de vida.', _binary 0x31373835356430623130636530303936626564353365366265643961626532322e6a7067),
	(5, 'Adam Borysov ', 'Adam ', 'Ucraniano', '1989-03-06', 3, 'TH858798', '14998357695', '14998357695', 'adam@hotmail.com ', 'adam123', 'Rua Bela Vista', 255, '', 45126326, 'Ciano', 'Belo Horizonte', 'MG', 'Brasil', 2, 5, 7, 2, '', 5, 'Web Designer', 'Vim da Ucrânia após a guerra com minha família. Estudei até meus 25 anos e atuei como designer gráfico em meu país de origem. Pretendo conseguir uma vida melhor no Brasil e conseguir um emprego bom para sustentar minha família.', _binary 0x65313133373264383865316464333137663133376437623361336530653438382e6a7067);
/*!40000 ALTER TABLE `usuario_simples` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.vagas
CREATE TABLE IF NOT EXISTS `vagas` (
  `id_vagas` int NOT NULL AUTO_INCREMENT,
  `nome_vagas` varchar(80) NOT NULL DEFAULT '0',
  `quantidade_vagas` int NOT NULL DEFAULT '0',
  `area_vagas` varchar(80) NOT NULL DEFAULT '0',
  `tipo_vagas` varchar(80) NOT NULL DEFAULT '0',
  `local_vagas` varchar(100) NOT NULL DEFAULT '0',
  `data_inicio_vagas` date NOT NULL,
  `data_final_vagas` date NOT NULL,
  `descricao_vagas` text NOT NULL,
  `restricao_vagas` text NOT NULL,
  `id_tipo_contratacao_vagas` int NOT NULL DEFAULT '0',
  `id_empresa_vagas` int NOT NULL,
  PRIMARY KEY (`id_vagas`),
  KEY `FK_vagas_tipo_contratacao_emp` (`id_tipo_contratacao_vagas`),
  KEY `FK_vagas_empresa_simples` (`id_empresa_vagas`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Copiando dados para a tabela banco_araras.vagas: 5 rows
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` (`id_vagas`, `nome_vagas`, `quantidade_vagas`, `area_vagas`, `tipo_vagas`, `local_vagas`, `data_inicio_vagas`, `data_final_vagas`, `descricao_vagas`, `restricao_vagas`, `id_tipo_contratacao_vagas`, `id_empresa_vagas`) VALUES
	(1, 'Assistente Contábil', 3, 'Contabilidade', 'Integral', 'Avenida Esmeraldaz', '2023-01-20', '2023-01-26', '- auxiliar na elaboração de balancetes e demonstrativos;\r\n- realizar a execução e controle de planilhas e relatórios de contabilidade;\r\n- fazer classificação de despesas;\r\n- registro de documentos;\r\n- revisar as movimentações bancárias.', '- Saber contabilidade', 2, 1),
	(3, 'Programador Web - Sênior ', 1, 'Tecnologia', 'Integral', 'Avenida Esmeraldaz, 34', '2023-02-10', '2023-03-25', 'Vaga para programador Web Sênior.', 'Full-Stack (experiência em tecnologias front e back-end), Ensino Superior completo, Inglês fluente, disponibilidade de horário.', 2, 1),
	(6, 'Analista de Dados', 2, 'TI', 'Integral', 'Taubaté', '2022-12-04', '2022-12-23', '- Coleta e análise de dados para apoio a tomadas de decisão;\r\n- Elaboração de estratégias baseadas em mapeamento e controle de fluxos;\r\n- Cronometria;\r\n- Elaboração e acompanhamento de relatórios e KPIs da operação.', 'Formado em Desenvolvimento de Sistemas.', 2, 2),
	(7, 'Assistente de Informática', 2, 'TI', 'Integral', 'Taubaté', '2022-12-04', '2022-12-23', '- Aplicar imagem nos equipamentos notebook, desktop, mobile e raspberry;\r\n- Realizar upgrade e downgrade de HD e memorias;\r\n- Realizar teste nos equipamentos caso apresente algum problema;\r\n- Limpeza e embalagem de equipamentos.', 'Procuramos alguém que gosta de tecnologia e se identifique com este mercado de trabalho.', 3, 2),
	(8, 'Pediatra', 1, 'Pediatria', 'Integral', 'Recife', '2022-12-04', '2022-12-23', '- Emergência pediátrica;\r\n- Enfermaria pediátrica;\r\n- CTI pediátrico.', 'Especialista em pediatria.\r\n', 2, 3),
	(9, 'Secretário', 2, 'Administração', 'Integral', 'Recife', '2022-12-04', '2022-12-23', '- Realizar o agendamento de exames pelo telefone, WhatsApp e presencial, informando preparos dos mesmos;\r\n- Realizar a impressão e entrega de exames;\r\n- Recepcionar o paciente, cadastrar e receber pagamentos quando não tem convênios;\r\n- Autorizar guias nos sistemas dos convênios.', 'Formados em administração, na instância técnica ou superior.', 2, 3);
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;

-- Copiando estrutura para tabela banco_araras.visto
CREATE TABLE IF NOT EXISTS `visto` (
  `id_visto` int NOT NULL AUTO_INCREMENT,
  `possui_visto` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_visto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

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
