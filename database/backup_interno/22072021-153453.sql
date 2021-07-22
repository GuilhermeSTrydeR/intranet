-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: unimedtc_intranet
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acesso`
--

DROP TABLE IF EXISTS `acesso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(64) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ativo` int(1) DEFAULT 1,
  `excluido` int(1) DEFAULT 0,
  `grupo` int(1) DEFAULT 1,
  `permissao` int(1) DEFAULT 1,
  `interno` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso`
--

LOCK TABLES `acesso` WRITE;
/*!40000 ALTER TABLE `acesso` DISABLE KEYS */;
INSERT INTO `acesso` VALUES (1,'2ª Via de Boletos','http://unimedtc.coop.br/boleto',1,0,1,1,0),(2,'Hilum','http://192.168.0.214:8083/',1,0,1,1,1),(3,'Relatórios','http://192.168.0.213/Relatorio',1,0,1,1,0),(4,'GIU','https://giu.unimed.coop.br/login',1,0,1,1,0),(5,'GLPI','https://unimedtc.coop.br/TI',1,0,1,1,1),(6,'ASC SAC','https://sac-unimedtrescoracoes.ascbrazil.com.br/login',1,0,2,2,0),(7,'Comercial','http://192.168.0.160/',1,0,3,2,1),(8,'Cadastro','http://192.168.0.161/',1,0,3,2,1),(9,'Hall','http://192.168.0.162/',1,0,3,2,1),(10,'Recepção','http://192.168.0.163/',1,0,3,2,1),(11,'Faturamento','http://192.168.0.164/',1,0,3,2,1),(12,'Diretoria','http://192.168.0.165/',1,0,3,2,1),(13,'Portal Unimed Três Corações','https://www.unimed.coop.br/web/trescoracoes',1,0,1,1,0),(14,'CPanel','https://junior.iphosting.com.br:2083/',1,0,4,2,0),(15,'Cardio Monitoramento','http://192.168.0.214:15000/Account/Login',1,0,4,2,0),(16,'STEL','https://stelremoto.ddns.net:23443/portal/login.php',1,0,4,2,0),(17,'ANS - Portal Operadoras','https://www2.ans.gov.br/ans-idp/',1,0,4,2,0),(18,'WebMail','https://unimedtc.coop.br:2096/',1,0,1,1,0),(19,'Gerar NFE - Nota Fiscal Eletrônica','http://192.168.0.213:8190/nfe/',1,0,1,1,0),(20,'Relatórios Report Service','http://192.168.0.213/Relatorio',1,1,1,1,0),(21,'Emissão de Nota Fiscal','http://177.70.128.66/el-nfse/paginas/sistema/login.jsf',1,0,1,1,0),(22,'Painel do Agente - WhatsApp','https://sac-unimedtrescoracoes.ascbrazil.com.br/Painel/login',1,0,1,1,0),(23,'Cardio Web','http://192.168.0.214:17001/login',1,0,1,1,0),(24,'Portal do Colaborador','https://www.unimed.coop.br/web/trescoracoes/login',1,0,1,1,0),(25,'1','1',1,1,6,1,0),(26,'Benner Conecta - Postal Saúde','https://portalconectasaude.com.br/Account/Login',1,0,1,1,0),(27,'Service Desk','https://servicedesk.unimedmg.coop.br/index.x',1,0,1,1,0),(28,'SPA Saúde','http://www.portalspatiss.org.br/',1,0,1,1,0);
/*!40000 ALTER TABLE `acesso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `acesso_grupo`
--

DROP TABLE IF EXISTS `acesso_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acesso_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `ativo` int(1) DEFAULT NULL,
  `excluido` int(1) DEFAULT 0,
  `permissao` int(8) DEFAULT 1,
  `interno` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acesso_grupo`
--

LOCK TABLES `acesso_grupo` WRITE;
/*!40000 ALTER TABLE `acesso_grupo` DISABLE KEYS */;
INSERT INTO `acesso_grupo` VALUES (1,'Publico',1,0,1,1),(2,'ASC',1,0,1,0),(3,'Impressoras',1,0,2,1),(4,'Tecnologia da Informação',1,0,2,1),(5,'Logado',1,1,2,1),(6,'teste',1,1,1,1);
/*!40000 ALTER TABLE `acesso_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aniversario`
--

DROP TABLE IF EXISTS `aniversario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aniversario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `setor` varchar(255) DEFAULT NULL,
  `nasc` date DEFAULT NULL,
  `ativo` int(11) DEFAULT 1,
  `excluido` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aniversario`
--

LOCK TABLES `aniversario` WRITE;
/*!40000 ALTER TABLE `aniversario` DISABLE KEYS */;
INSERT INTO `aniversario` VALUES (1,'Adriane Sanches de Oliveira','2','1970-07-21',1,0),(2,'Aira Naves lima','6','1986-05-28',1,0),(3,'Amanda Brasil','4','1974-04-02',1,0),(4,'Andre luiz Bueno Nascimento','8','1981-01-25',1,0),(5,'Andrea da Silva Borges Scalioni','11','1972-08-21',1,0),(6,'Barbara Nascimento Mesquita','4','1998-06-27',1,0),(7,'Catia Vieira Naves','10','1976-01-31',1,0),(8,'Clelia Paixao Almeida de Oliveira','13','1963-04-12',1,0),(9,'Daniele Ferreira Campos','8','1983-11-04',1,0),(10,'Eliane Azevedo Sant Ana Brito','4','1985-12-20',1,0),(11,'Emmanuel Colem Francisco','2','2004-11-17',1,0),(12,'Fernanda Aparecida Borges de Souza','7','1980-06-19',1,0),(13,'Francisco Pinto de Oliveira Junior','5','1985-02-23',1,0),(14,'Gabriela Cristina Silva','13','1994-02-07',1,0),(15,'Gilberto Silva Teixeira','8','1952-05-13',1,0),(16,'Gilcimara Prestes de Andrade','13','1976-11-29',1,0),(17,'Guilherme Florencio Silva','4','1991-12-18',1,0),(18,'Guilherme Pereira de Mello Silva','5','1994-01-31',1,0),(19,'Igor Felipe Borges Leite','6','1998-02-17',1,0),(20,'Ineres Aparecida Santos Castil','9','1970-03-07',1,0),(21,'Janaina de Novais Teixeira','7','1980-05-29',1,0),(22,'Jarbas Lage de Oliveira','8','1972-06-01',1,0),(23,'Jessica Luiza de Jesus','5','1991-06-11',1,0),(24,'Joao Victor Borges de Andrade','13','1998-09-23',1,0),(25,'Karen Alexandra Nascimento dos Santos','9','1993-02-08',1,0),(26,'Karen Larissa Tenebra Pereira','13','1997-03-14',1,0),(27,'Keli Cristina Leite Cesarino','3','1985-10-04',1,0),(28,'Lanuce Marques Rosa','4','1990-02-02',1,0),(29,'Larissa de Padua Rosa','2','1998-06-22',1,0),(30,'Lavinia Lara Soares Augusto','4','2001-08-22',1,0),(31,'Leonardo Igresio Cardoso','1','1976-11-09',1,0),(32,'Lorenza Gomes Silva','13','2000-04-23',1,0),(33,'Luciana Fernandes Lazaro Sarabion Vilela','4','1973-08-17',1,0),(34,'Ludmila Pereira Alves','13','1983-08-11',1,0),(35,'Marcia Aparecida dos Santos','9','1972-09-07',1,0),(36,'Marcia Helena de Oliveira Giarola','2','1980-09-03',1,0),(37,'Maria Dionizia de Oliveira Ribeiro','3','1969-04-02',1,0),(38,'Mariangela Aparecida Toledo de Souza','7','1988-08-29',1,0),(39,'Natali Serafim Tavares de Oliveira','13','1987-12-25',1,0),(40,'Rodolfo dos Santos Batista','13','1988-12-14',1,0),(41,'Sabrina Martins da Silva Gomes','4','1996-06-07',0,0),(42,'Tais Nunes Galvao Gianina','1','1992-04-24',1,0),(43,'Tatiane Cardoso Luz','3','1982-10-23',1,0),(44,'Valeria Siqueira','3','1961-07-25',1,0),(45,'Vanessa Andrade Rosa','11','1983-01-06',1,0);
/*!40000 ALTER TABLE `aniversario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(11) DEFAULT NULL,
  `descConfig` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,1,'verificar se ja houve primeiro acesso no sistema');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(60) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `excluido` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

LOCK TABLES `contato` WRITE;
/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (1,'guilherme silva','a@a','xxx-xxxx','asdasdads','1'),(2,'guilherme silva','a@a','xxx-xxxx','asdasdasd','1'),(3,'guilherme silva','a@a','xxx-xxxx','123qweasdzxc','1'),(4,'guilherme silva','a@a','xxx-xxxx','teste de texto\r\n','1'),(5,'guilherme silva','a@a','xxx-xxxx','teste\r\nteste\r\n!@#$%¨&*()1234567890_+-=ç?w/ã~ew~ds','1'),(6,'guilherme silva','a@a','xxx-xxxx','qweqwwq','1'),(7,'guilherme silva','a@a','xxx-xxxx','teste de texto\r\n','1'),(8,'guilherme silva','a@a','xxx-xxxx','precisa arruma essa <table>, pois não ta quebrando linha, saca só: ###################################################################','1'),(9,'guilherme silva','a@a','xxx-xxxx','precisa arruma essa , pois não ta quebrando linha, saca só: ###################################################################################################################################################################################################','1'),(10,'guilherme silva','a@a','xxx-xxxx','ta faltando uma table aqui \r\n   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!','1'),(11,'guilherme silva','a@a','xxx-xxxx','teste','1'),(12,'guilherme silva','a@a','xxx-xxxx','asdsdasdasd','0'),(13,'josé da silva','s@s','ascasc','wef','0');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informativo`
--

DROP TABLE IF EXISTS `informativo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informativo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `ativo` int(1) DEFAULT 0,
  `dataCadastro` varchar(64) DEFAULT NULL,
  `excluido` int(1) DEFAULT 0,
  `imagem` text DEFAULT NULL,
  `inicio` date DEFAULT NULL,
  `fim` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informativo`
--

LOCK TABLES `informativo` WRITE;
/*!40000 ALTER TABLE `informativo` DISABLE KEYS */;
INSERT INTO `informativo` VALUES (1,'18 de dezembro de 1967, A primeira Unimed','No final da década de 1960, a medicina assistencial no Brasil atravessava um momento de grande efervescência pela perplexidade que as transformações estruturais da Previdência Social traziam – houve a unificação dos Institutos de Aposentadorias e Pensões (IAPs) no Instituto Nacional de Assistência Médica de Previdência Social (INPS), que mais tarde viria a se transformar no Instituto Nacional de Assistência Médica da Previdência Social (INAMPS), extinto em 1990 para dar lugar ao Sistema Único de Saúde (SUS).\r\n\r\nAlém da queda no padrão de atendimento, as mudanças levaram ao surgimento de seguradoras de saúde, à mercantilização da medicina e à proletarização do profissional médico, que ficava impedido de exercer com liberdade e dignidade sua atividade liberal.\r\n\r\nUm grupo de médicos filiados ao Sindicato dos Médicos de Santos (SP), insatisfeito com esta situação, buscou um modelo que resgatasse a ética e o papel social da medicina, garantindo a prática liberal da profissão e a qualidade do atendimento. Edmundo Castilho e mais 22 médicos fundaram, então, em 18 de dezembro, a União dos Médicos - Unimed, na cidade de Santos (SP), com base nos princípios do cooperativismo. A primeira diretoria foi formada por José Luiz Camargo Barbosa, Mario Billerbeck, Gino Sarti, Edmond Atick e Helio Gomes.',0,'1621847239',0,'../../uploads/sede-unimed-santos.jpg','0000-00-00','0000-00-00'),(2,'Cooperativismo Unimed - Cooperativismo no mundo moderno','Foi no mundo moderno ocidental, porém, que o conceito de cooperativismo ganhou identidade. A versão contemporânea é resultado do movimento operário e de seus princípios ideológicos. Foi construída a partir da Revolução Industrial dos séculos 18 e 19, marcada por um grande progresso econômico e tecnológico.\r\n\r\nA primeira experiência cooperativista desse período foi a Sociedade dos Probos Pioneiros de Rochdale, criada na Inglaterra, em 1844, por 28 operários.\r\n\r\nOs princípios que direcionaram a organização dos tecelões foram, aos poucos, sendo disseminados pelo planeta.\r\n\r\nNo Brasil, a fase pré-cooperativista ocorreu durante as Missões Jesuíticas, no Sul, e, mais tarde, nas associações de trabalhadores imigrantes nas indústrias paulista e carioca. O movimento adquiriu impulso real no país a partir de 1932, com a edição do Decreto Federal nº 22.239.\r\n\r\nA medida estimulou o movimento cooperativista, que se desenvolveu mais ainda quando o governo de Getúlio Vargas (1930-1945) incentivou a formação de cooperativas agrícolas de trigo e soja.\r\n\r\nEm 1971, foi promulgada a Lei 5.764 que, entre outras regras, exigia que todas as cooperativas se registrassem previamente no Conselho Nacional do Cooperativismo.\r\n\r\nApesar disso, a lei reconheceu a Organização das Cooperativas Brasileiras (OCB) – criada em 1969 – como representante do movimento no país e definiu as relações entre os cooperados e a cooperativa, o chamado Ato Cooperativo. Com o fim da ditadura militar e a promulgação da nova Constituição, em 1988, o cooperativismo se livrou do controle estatal, iniciando a autogestão.\r\n\r\nO Brasil conta, atualmente, com 13 ramos do cooperativismo: Consumo, Social, Trabalho, Educacional, Transporte, Agropecuário, Crédito, Habitacional, Produção, Infraestrutura, Mineral, Turismo e Lazer e Saúde, no qual a Unimed está inserida.',1,'1620840252',0,'../../uploads/Imagem-Cooperativismo.jpg','0000-00-00','0000-00-00'),(3,' POLÍTICA DE PRIVACIDADE E PROTEÇÃO DE DADOS DA UNIMED TRÊS CORAÇÕES COOPERATIVA DE TRABALHO MÉDICO','A UNIMED TRÊS CORAÇÕES COOPERATIVA DE TRABALHO MÉDICO LTDA, pessoa jurídica de direito privado, inscrita no CNPJ 42.855.999/001-09, sediada na Avenida Dr. Moacir Rezende, nº358, Centro, Três Corações, CEP:37410-083, neste também denominada UNIMED TRÊS CORAÇÕES e/ou simplesmente UNIMED entende como extremamente relevantes os registros eletrônicos e os dados pessoais deixados por você “Titular de Dados Pessoais” na utilização dos diversos sites e serviços da UNIMED TRÊS CORAÇÕES, servindo a presente Política de Privacidade para regular, de forma simples, transparente e objetiva, quais dados pessoais serão obtidos, assim como quando e de qual forma eles poderão ser utilizados.\r\n\r\n \r\n\r\nSobre a Política de Privacidade\r\n \r\n\r\nEsta Política é mantida pela UNIMED TRÊS CORAÇÕES para garantir a proteção de dados pessoais dos titulares nos termos das Leis Federais nº 12.965/2014, que trata sobre o Marco Civil da Internet, bem como, a Lei Geral de Proteção de Dados, nº 13.709/2018, vigentes no país.\r\n\r\nEsta política se aplica a todos os clientes da UNIMED e ao público em geral, e engloba, de maneira básica, as formas nas quais tratamos os dados pessoais dessas pessoas. \r\n\r\nO objetivo desta Política de Privacidade (“Politica”) é para explicar, de forma objetiva e transparente como realizamos os tratamentos de um grande volume de dados pessoais, incluindo dados sensíveis, para quais finalidades seus dados pessoais são utilizados e com quem são compartilhados.\r\n\r\nA Política é abrangente visto que fornece as informações a respeito dos direitos dos usuários do Portal, e demais pessoas que mantém interações com a UNIMED TRÊS CORAÇÕES, identificados nesta Política como “Titular de Dados Pessoais”. \r\n\r\nEm caso de dúvidas adicionais ou requisições, por favor, entre em contato com nosso Encarregado – Gestor de proteção de dados por meio do endereço de e-mail: dpo.unimedtc@unimedtc.coop.br.\r\n\r\nA Política informa também os canais de contato para dúvidas e solicitações dos “Titulares de Dados Pessoais” relacionadas aos dados pessoais coletados.\r\n\r\nEsta Política requer o consentimento do “Titular de Dados Pessoais”, que ocorrerá de forma expressa, ao clicar no botão “Continuar” disponível no Portal Corporativo, ou pela utilização efetiva de qualquer Portal, sistema, software, aplicativo ou serviço da UNIMED TRÊS CORAÇÕES. Com o consentimento, o “Titular de Dados Pessoais” permitirá a coleta e o tratamento dos seus dados pessoais pela UNIMED TRÊS CORAÇÕES, nos termos desta Política que foi elaborada de acordo com a legislação vigente no país.\r\n\r\nEsta política poderá ser alterada para fins de atualizações e adequações legais, a qualquer tempo, sendo que, em casos de alterações vinculadas à finalidade, compartilhamento e duração do tratamento dos dados do “Titular de Dados Pessoais”, havendo necessidade de alteração do Termo de Consentimento, será informado com antecedência mínima de 30 (dias), através do e-mail registrado em nosso banco de dados, para que possa, segundo a sua vontade, de acordo com o tipo de relacionamento existente com a UNIMED TRÊS CORAÇÕES revogar o consentimento anterior fornecido, neste caso, ficando o “Titular de Dados Pessoais” impossibilitado de utilizar os serviços da UNIMED TRÊS CORAÇÕES.\r\n\r\nCaso tenha alguma dúvida sobre os termos utilizados nesta política, sugerimos consultar a tabela abaixo:',1,'1626943117',0,'../../uploads/baixados.png','0000-00-00','2021-07-20'),(29,'teste horario','teste horario',1,'1626949831',1,NULL,'0000-00-00','0000-00-00');
/*!40000 ALTER TABLE `informativo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `user` varchar(60) DEFAULT NULL,
  `pass` varchar(60) DEFAULT NULL,
  `permissao` varchar(1) DEFAULT NULL,
  `telefone` varchar(32) DEFAULT NULL,
  `dataCadastro` varchar(64) DEFAULT NULL,
  `dataCadastroUnix` varchar(64) DEFAULT NULL,
  `idAdm` int(11) DEFAULT NULL,
  `excluido` varchar(1) DEFAULT NULL,
  `setor` varchar(32) NOT NULL,
  `ativo` varchar(1) DEFAULT '1',
  `nasc` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Guilherme Silva','guilherme.pereira@unimedtc.coop.br','admin','21232f297a57a5a743894a0e4a801fc3','3','(35) 3239-6027','20210514105444','1621000484',1,'0','5','1','1994-07-30'),(2,'ert','ert@asfdsa','erert','4297f44b13955235245b2497399d7a93','1','(12) 3123','20210616165055','1623873055',1,'1','10','1','2021-06-22');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-22 15:34:53
