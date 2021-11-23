<?php

  session_start();

  if(!isset($_SESSION['logado']) || $_SESSION['permissao'] != '1'){

    header("Location: /");

  }

    //requer classe de conexao do banco
    require("../../classes/conexao_bd.php");

    //requer o contato.class onde o comando para gravar no banco ja esta pronto
    require_once("../../classes/usuario/usuario.class.php");

    //configuracoes basicas, nesse caso, configuracoes de fuso horario
    require("../../config/config.php");

    //aqui instanciamos a classe
    $u = new Usuario();

 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intranet</title>
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../css/ftp.css">
    <link rel="stylesheet" href="../../css/print.css">
  
  </head>
<body>
<style>

  li b{
    font-size: 15px;
  }

</style>


<?php

  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';

?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: 	#0A5F55;">

<!-- logo da instituição -->
<div id="logo">
  <a href="/"><img src="../../imagens/unimed/logo.png" alt="logo-unimed" width= 40 height= 33 title="Intranet Unimed TC"></a>
</div>

    <div style='text-transform: uppercase; position: fixed; font-weight: 500; color: white; margin-left: 100px;'>
      <!-- nessa parte sera transformado o nome do usuario todo em maiusculo -->



      <?php
        //nessa parte o retorno da funcao 'nome' que retorna o nome completo do usuario logado, vai dividir o nome completo em um array onde cada nome ficara num indice, o fator definido para a divisao eh o espaco (' ')
        $nome = $u->nome($_SESSION['user']);
        $nome = explode(" ", $nome);

        //esse bloco condicional ira exibir o nome do usuario com os seguintes temros, caso o usuario tenha cadastrado apenas 1 nome, ele ira entrar na condicao verdadeira e sera exibido o indice 0 (primeiro indice) do array, pois se nao houver essa condicao e tiver apenas 1 nome cadastrado o mesmo iria se repetir, e caso ele tenha cadastrado mais de um nome, sera exibido o primeiro e o ultimo
        if(count($nome) == 1){
          ?>
            <a style='color: white !important; ' href="?pagina=../cadastros/editar_configuracoes"> <?php echo $nome[0]?></a>
          <?php
        }
        else{
          ?>
             <a style='color: white !important; ' href="?pagina=../cadastros/editar_configuracoes"> <?php echo $nome[0] . ' ' . end($nome) ?></a>
          <?php
        }


      ?>
     
     

      <a href="?pagina=../cadastros/editar_configuracoes">
        <img src="/imagens/navbar/engrenagem.png" style='margin-left: 20px;'  onclick="" width="30" height="30" alt="config" title="Configurações">
      </a>
    </div>


  <ul class="navbar-nav" id="navbar-main" style="margin-left: 900px !important; position: fixed;">
    <center>
        <a href="?pagina=../../paginas/mural/inicio">
          <img src="/imagens/navbar/home.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="home" style="margin-left: 50px !important;" title="Tela Inicial">
      </center>
      <center>
        <a href="/funcoes/destruir_sessao.php">
            <img src="/imagens/navbar/sair.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="sair" style="margin-left: 100px !important;" title="Sair">
        </a>
      </center>
  </ul>
</nav>
<div class="sidebar-container">

  <p>
    <!-- <?php
      if($_SESSION['permissao'] == 1){
        $permissao = ' Comum';
      }
      elseif($_SESSION['permissao'] == 2){
        $permissao = ' Supervisor';
      }
      elseif($_SESSION['permissao'] == 3){
        $permissao = ' Administrador';
      }
      
      echo 'Nivel de Permissão: ' . $_SESSION['permissao'] . $permissao;
    ?> -->

    <!-- <a href="?pagina=../../paginas/cadastros/alterarSenha" style='border: 2px solid black; background-color: #3b5998; padding: 5px;'>Alterar Senha</a> -->

  </p>
  <ul class="sidebar-navigation">
  <center><h4></h4></center>
  <br>
  <li id='liMural'>
      <a href="?pagina=../../paginas/mural/inicio">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/feedBlack.png" class="d-inline-block align-top" alt="sair" height='40' style='margin-left: -5px;'><b style='margin-left: -3px;'>Mural</b> 
      </a>
    </li>
    <li id='liInstitucional'>
      <a href="?pagina=../../paginas/institucional/inicio">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/inst.png" height='40' class="d-inline-block align-top" alt="sair" style='margin-left: -5px;'><b style='margin-left: -22px;'>Institucional</b> 
      </a>
    </li>
    <!-- trocar essa 'liInicios' po 'liAcessos' obviamente criar a propriedade do css relativa à liAcessos -->
    <li id='liInicio'>
      <a href="/paginas/comum/main.php?pagina=acessos">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/acessos.png" class="d-inline-block align-top" alt="sair" style='margin-left: -12px;' height='50' width='50'><b style='margin-left: -10px '>Acessos</b> 
      </a>
    </li>
    <li id='liContatos'>
      <a href="/paginas/comum/main.php?pagina=../../classes/contato/visualizar_contato">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/userBlack.png" class="d-inline-block align-top" alt="sair" style='margin-left: -12px;' height='50' width='50'><b style='margin-left: -10px '>Contatos</b> 
      </a>
    </li>
    <!-- o usuario COMUM nao pode visualizar os ususarios -->
    <!-- <li id='liUsuario'>
      <a href="?pagina=../../classes/usuario/visualizar_usuario">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/userBlack.png" height='40' class="d-inline-block align-top" alt="sair" style='margin-left: -5px;'><b style='margin-left: -10px;'>Usuarios</b> 
      </a>
    </li> -->

    <!-- o usuario comum nao pode visualizar os acessos, somente os publico em 'inicio' -->
    <!-- <li id='liAcesso'>
      <a href="?pagina=../../classes/acesso/visualizar_grupo_acesso">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/acessos.png" height='40' class="d-inline-block align-top" alt="sair" style='margin-left: -5px;'><b style='margin-left: -7px;'>Acessos</b> 
      </a>
    </li> -->
    <li id='liAniversarios'>
      <a href="?pagina=../../classes/contato/visualizar_aniversario">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/modal/cake.png" height='50' class="d-inline-block align-top" alt="sair" style='margin-left: -12px;'><b style='margin-left: -22px;'>Aniversarios</b> 
      </a>
    </li>
  </ul>
</div>
<div class="content-container">
  <div class="container-fluid">
    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
    </div>
  </div>
</div>

    <?php
        //esse include ira colocar na tela a pagina selecionada e que foi atribuida a variavel $pagina, assim sempre que uma pagina for atribuida a variavel $pagina, ela sera incluida abaixo
        // include("./paginas/main/$pagina.php");
        echo "<br>";
        include("$pagina.php");
    ?>


</body>
</html>