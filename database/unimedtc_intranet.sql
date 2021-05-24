-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2021 às 17:19
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `unimedtc_intranet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acesso`
--

CREATE TABLE `acesso` (
  `id` int(11) NOT NULL,
  `nome` varchar(64) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `ativo` int(1) DEFAULT 1,
  `excluido` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acesso`
--

INSERT INTO `acesso` (`id`, `nome`, `link`, `ativo`, `excluido`) VALUES
(1, 'Google', 'https://www.google.com', 1, 1),
(2, 'PHPMyAdmin', 'http://localhost/phpmyadmin/index.php?route=/table/sql&db=unimedtc_intranet&table=acesso', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `descConfig` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `valor`, `descConfig`) VALUES
(1, 1, 'verificar se ja houve primeiro acesso no sistema');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefone` varchar(60) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `excluido` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`id`, `nome`, `email`, `telefone`, `texto`, `excluido`) VALUES
(1, 'guilherme silva', 'a@a', 'xxx-xxxx', 'asdasdads', '1'),
(2, 'guilherme silva', 'a@a', 'xxx-xxxx', 'asdasdasd', '1'),
(3, 'guilherme silva', 'a@a', 'xxx-xxxx', '123qweasdzxc', '1'),
(4, 'guilherme silva', 'a@a', 'xxx-xxxx', 'teste de texto\r\n', '1'),
(5, 'guilherme silva', 'a@a', 'xxx-xxxx', 'teste\r\nteste\r\n!@#$%¨&*()1234567890_+-=ç?w/ã~ew~ds', '1'),
(6, 'guilherme silva', 'a@a', 'xxx-xxxx', 'qweqwwq', '1'),
(7, 'guilherme silva', 'a@a', 'xxx-xxxx', 'teste de texto\r\n', '1'),
(8, 'guilherme silva', 'a@a', 'xxx-xxxx', 'precisa arruma essa <table>, pois não ta quebrando linha, saca só: ###################################################################', '1'),
(9, 'guilherme silva', 'a@a', 'xxx-xxxx', 'precisa arruma essa , pois não ta quebrando linha, saca só: ###################################################################################################################################################################################################', '1'),
(10, 'guilherme silva', 'a@a', 'xxx-xxxx', 'ta faltando uma table aqui \r\n   !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!', '1'),
(11, 'guilherme silva', 'a@a', 'xxx-xxxx', 'teste', '1'),
(12, 'guilherme silva', 'a@a', 'xxx-xxxx', 'asdsdasdasd', '0'),
(13, 'josé da silva', 's@s', 'ascasc', 'wef', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `informativo`
--

CREATE TABLE `informativo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `ativo` int(1) DEFAULT 0,
  `dataCadastro` varchar(64) DEFAULT NULL,
  `excluido` int(1) DEFAULT 0,
  `imagem` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `informativo`
--

INSERT INTO `informativo` (`id`, `titulo`, `texto`, `ativo`, `dataCadastro`, `excluido`, `imagem`) VALUES
(1, '18 de dezembro de 1967, A primeira Unimed', 'No final da década de 1960, a medicina assistencial no Brasil atravessava um momento de grande efervescência pela perplexidade que as transformações estruturais da Previdência Social traziam – houve a unificação dos Institutos de Aposentadorias e Pensões (IAPs) no Instituto Nacional de Assistência Médica de Previdência Social (INPS), que mais tarde viria a se transformar no Instituto Nacional de Assistência Médica da Previdência Social (INAMPS), extinto em 1990 para dar lugar ao Sistema Único de Saúde (SUS).\r\n\r\nAlém da queda no padrão de atendimento, as mudanças levaram ao surgimento de seguradoras de saúde, à mercantilização da medicina e à proletarização do profissional médico, que ficava impedido de exercer com liberdade e dignidade sua atividade liberal.\r\n\r\nUm grupo de médicos filiados ao Sindicato dos Médicos de Santos (SP), insatisfeito com esta situação, buscou um modelo que resgatasse a ética e o papel social da medicina, garantindo a prática liberal da profissão e a qualidade do atendimento. Edmundo Castilho e mais 22 médicos fundaram, então, em 18 de dezembro, a União dos Médicos - Unimed, na cidade de Santos (SP), com base nos princípios do cooperativismo. A primeira diretoria foi formada por José Luiz Camargo Barbosa, Mario Billerbeck, Gino Sarti, Edmond Atick e Helio Gomes.', 1, '1621847239', 0, '../../uploads/sede-unimed-santos.jpg'),
(2, 'Cooperativismo Unimed - Cooperativismo no mundo moderno', 'Foi no mundo moderno ocidental, porém, que o conceito de cooperativismo ganhou identidade. A versão contemporânea é resultado do movimento operário e de seus princípios ideológicos. Foi construída a partir da Revolução Industrial dos séculos 18 e 19, marcada por um grande progresso econômico e tecnológico.\r\n\r\nA primeira experiência cooperativista desse período foi a Sociedade dos Probos Pioneiros de Rochdale, criada na Inglaterra, em 1844, por 28 operários.\r\n\r\nOs princípios que direcionaram a organização dos tecelões foram, aos poucos, sendo disseminados pelo planeta.\r\n\r\nNo Brasil, a fase pré-cooperativista ocorreu durante as Missões Jesuíticas, no Sul, e, mais tarde, nas associações de trabalhadores imigrantes nas indústrias paulista e carioca. O movimento adquiriu impulso real no país a partir de 1932, com a edição do Decreto Federal nº 22.239.\r\n\r\nA medida estimulou o movimento cooperativista, que se desenvolveu mais ainda quando o governo de Getúlio Vargas (1930-1945) incentivou a formação de cooperativas agrícolas de trigo e soja.\r\n\r\nEm 1971, foi promulgada a Lei 5.764 que, entre outras regras, exigia que todas as cooperativas se registrassem previamente no Conselho Nacional do Cooperativismo.\r\n\r\nApesar disso, a lei reconheceu a Organização das Cooperativas Brasileiras (OCB) – criada em 1969 – como representante do movimento no país e definiu as relações entre os cooperados e a cooperativa, o chamado Ato Cooperativo. Com o fim da ditadura militar e a promulgação da nova Constituição, em 1988, o cooperativismo se livrou do controle estatal, iniciando a autogestão.\r\n\r\nO Brasil conta, atualmente, com 13 ramos do cooperativismo: Consumo, Social, Trabalho, Educacional, Transporte, Agropecuário, Crédito, Habitacional, Produção, Infraestrutura, Mineral, Turismo e Lazer e Saúde, no qual a Unimed está inserida.', 1, '1620840252', 0, '../../uploads/Imagem-Cooperativismo.jpg'),
(3, ' POLÍTICA DE PRIVACIDADE E PROTEÇÃO DE DADOS DA UNIMED TRÊS CORAÇÕES COOPERATIVA DE TRABALHO MÉDICO', 'A UNIMED TRÊS CORAÇÕES COOPERATIVA DE TRABALHO MÉDICO LTDA, pessoa jurídica de direito privado, inscrita no CNPJ 42.855.999/001-09, sediada na Avenida Dr. Moacir Rezende, nº358, Centro, Três Corações, CEP:37410-083, neste também denominada UNIMED TRÊS CORAÇÕES e/ou simplesmente UNIMED entende como extremamente relevantes os registros eletrônicos e os dados pessoais deixados por você “Titular de Dados Pessoais” na utilização dos diversos sites e serviços da UNIMED TRÊS CORAÇÕES, servindo a presente Política de Privacidade para regular, de forma simples, transparente e objetiva, quais dados pessoais serão obtidos, assim como quando e de qual forma eles poderão ser utilizados.\r\n\r\n \r\n\r\nSobre a Política de Privacidade\r\n \r\n\r\nEsta Política é mantida pela UNIMED TRÊS CORAÇÕES para garantir a proteção de dados pessoais dos titulares nos termos das Leis Federais nº 12.965/2014, que trata sobre o Marco Civil da Internet, bem como, a Lei Geral de Proteção de Dados, nº 13.709/2018, vigentes no país.\r\n\r\nEsta política se aplica a todos os clientes da UNIMED e ao público em geral, e engloba, de maneira básica, as formas nas quais tratamos os dados pessoais dessas pessoas. \r\n\r\nO objetivo desta Política de Privacidade (“Politica”) é para explicar, de forma objetiva e transparente como realizamos os tratamentos de um grande volume de dados pessoais, incluindo dados sensíveis, para quais finalidades seus dados pessoais são utilizados e com quem são compartilhados.\r\n\r\nA Política é abrangente visto que fornece as informações a respeito dos direitos dos usuários do Portal, e demais pessoas que mantém interações com a UNIMED TRÊS CORAÇÕES, identificados nesta Política como “Titular de Dados Pessoais”. \r\n\r\nEm caso de dúvidas adicionais ou requisições, por favor, entre em contato com nosso Encarregado – Gestor de proteção de dados por meio do endereço de e-mail: dpo.unimedtc@unimedtc.coop.br.\r\n\r\nA Política informa também os canais de contato para dúvidas e solicitações dos “Titulares de Dados Pessoais” relacionadas aos dados pessoais coletados.\r\n\r\nEsta Política requer o consentimento do “Titular de Dados Pessoais”, que ocorrerá de forma expressa, ao clicar no botão “Continuar” disponível no Portal Corporativo, ou pela utilização efetiva de qualquer Portal, sistema, software, aplicativo ou serviço da UNIMED TRÊS CORAÇÕES. Com o consentimento, o “Titular de Dados Pessoais” permitirá a coleta e o tratamento dos seus dados pessoais pela UNIMED TRÊS CORAÇÕES, nos termos desta Política que foi elaborada de acordo com a legislação vigente no país.\r\n\r\nEsta política poderá ser alterada para fins de atualizações e adequações legais, a qualquer tempo, sendo que, em casos de alterações vinculadas à finalidade, compartilhamento e duração do tratamento dos dados do “Titular de Dados Pessoais”, havendo necessidade de alteração do Termo de Consentimento, será informado com antecedência mínima de 30 (dias), através do e-mail registrado em nosso banco de dados, para que possa, segundo a sua vontade, de acordo com o tipo de relacionamento existente com a UNIMED TRÊS CORAÇÕES revogar o consentimento anterior fornecido, neste caso, ficando o “Titular de Dados Pessoais” impossibilitado de utilizar os serviços da UNIMED TRÊS CORAÇÕES.\r\n\r\nCaso tenha alguma dúvida sobre os termos utilizados nesta política, sugerimos consultar a tabela abaixo:', 1, '1621614943', 0, '../../uploads/baixados.png'),
(13, 'Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  ', 'Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  ', 1, '1621253377', 1, NULL),
(14, 'Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  ', 'Teste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\nTeste !@#$%¨&*()_+=-0987654321´´´´´´´´```````] ~[ ; . , . ;  \r\n', 1, '1621253394', 1, NULL),
(15, 'asd', 'asd', 1, '1621253520', 1, NULL),
(16, 'asd', 'asd', 1, '1621253537', 1, '../../uploads/giphy.gif'),
(17, 'asd', 'asd', 1, '1621253673', 1, NULL),
(18, 'zz', 'zzz', 1, '1621524223', 1, NULL),
(19, 'aa', 'aa', 1, '1621526724', 1, NULL),
(20, 'asd', 'asd', 1, '1621526930', 1, NULL),
(21, 'cz', 'xc', 1, '1621528959', 1, NULL),
(22, 'asd', 'asd', 1, '1621530592', 1, NULL),
(23, 'asd', 'asd', 1, '1621530601', 1, NULL),
(24, 'fsdf', 'sdfsdfsdf', 1, '1621599409', 1, NULL),
(25, 'dasdasd', 'asasdas', 1, '1621599417', 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
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
  `nasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `user`, `pass`, `permissao`, `telefone`, `dataCadastro`, `dataCadastroUnix`, `idAdm`, `excluido`, `setor`, `ativo`, `nasc`) VALUES
(1, 'Guilherme Silva', 'guilherme.pereira@unimedtc.coop.br', 'admin', '21232f297a57a5a743894a0e4a801fc3', '3', '(35) 3239-6027', '20210514105444', '1621000484', 1, '0', '5', '1', '1994-05-31'),
(15, 'Jose do teste da silva', 'a@a', 'a', '0cc175b9c0f1b6a831c399e269772661', '3', '1111111', '20210519141643', '1621444603', 1, '1', '5', '1', '5555-06-01'),
(16, 'joao bernardo bernadete', 'asd@asd', 'asd', '7815696ecbf1c96e6894b779456d330e', '3', 'asd', '20210519143218', '1621445538', 1, '1', '5', '1', '2021-06-17'),
(17, 'Han Solo', 'a@a', 'han', '83832391027a1f2f4d46ef882ff3a47d', '3', 'aaa', '20210519150443', '1621447483', 1, '1', '4', '1', '1990-06-01'),
(18, 'Anakin Skywalker', 'a@a', 'vader', '2db1850a4fe292bd2706ffd78dbe44b9', '3', 'aaa', '20210519150539', '1621447539', 1, '1', '5', '1', '5555-05-05'),
(19, 'asd', 'asd@asdasd', 'xzczxcwefdwdas', 'ce3b3fd66af48278a02ea3475a09a392', '1', 'asd', '20210520110331', '1621519411', 1, '1', '1', '1', '5555-05-01'),
(20, 'teste dos teste', 'asd1@sad', 'zxczxc', '7815696ecbf1c96e6894b779456d330e', '1', 'asd', '20210520110747', '1621519667', 1, '1', '1', '1', '5555-05-05'),
(21, 'Homer Jay Simpson', 'x@sx', 'xx', '5deb466b0e4c0c313bc6ac950d4247c4', '1', 'asd', '20210520110810', '1621519690', 0, '1', '1', '1', '5555-05-05'),
(22, 'aaaaaaa', 'a@a', 'aaaaasdasdasdqw', 'a8f5f167f44f4964e6c998dee827110c', '3', 'a', '20210520151638', '1621534598', 1, '1', '1', '1', '5555-05-01'),
(23, 'asdxcxzxc', 'xzczxc@zxc', 'asdasd', '5cf965b033624583dc6f1a49fb6c77aa', '1', 'zxc', '20210520152113', '1621534873', 1, '1', '1', '1', '5555-05-01'),
(24, 'Januário Garcia', 'fazenda_figueira1900@hotmail.com', 'seteorelhas', 'fbec04eb59ee068a53b87d52c04f34ff', '1', '33 8856-7044', '20210521165712', '1621627032', 1, '0', '1', '1', '1761-05-01'),
(25, 'Anakyn Skywalker', 'deathstar66@yahoo.com', 'darthVader', 'd2539d00f7a0304fc6ce06fed8bd073b', '1', '21 98869-5587', '20210521165822', '1621627102', 1, '0', '5', '1', '0001-06-01'),
(26, 'teste mascara', 's@s', 'mask', '8f60c8102d29fcd525162d02eed4566b', '1', '(35) 3239-6027', '20210521173129', '1621629089', 1, '0', '1', '1', '5555-01-31');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acesso`
--
ALTER TABLE `acesso`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `informativo`
--
ALTER TABLE `informativo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acesso`
--
ALTER TABLE `acesso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `informativo`
--
ALTER TABLE `informativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
