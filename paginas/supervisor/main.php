<?php
  session_start();

  if(!isset($_SESSION['logado']) || $_SESSION['permissao'] != '2'){

    header("Location: /");

  }
 


?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Tecnica</title>
    <link rel="stylesheet" href="../../css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../../css/ftp.css">
    <link rel="stylesheet" href="../../css/print.css">
  </head>
<body>
<?php

  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'inicio';

?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: 	#0A5F55;">

<!-- logo da instituição -->
<div id="logo">
  <a href="/"><img src="../../imagens/unimed/logo.png" alt="logo-unimed" width= 50 height= 40></a>
</div>

  <div style='text-transform: uppercase; font-weight: 500; color: white; margin: 10px;'>
  <!-- nessa parte sera transformado o nome do usuario todo em maiusculo -->
  <?php
    echo $_SESSION['nome'];
  ?>
  </div>
    <a href="?pagina=../../paginas/configs/configUser">
      <img src="/imagens/navbar/engrenagem_azul.png" onclick="" width="20" height="20" alt="config">


  <ul class="navbar-nav" id="navbar-main" style="margin-left: 700px !important;">
  
  <center>
        <a href="../../classes/usuario/apagarTodosUsuarios.php" style="margin-left: -150px;">
            <img src="/imagens/navbar/x.png" onclick="" width="40" height="40" class="hiddenBtnXUsuarios" alt="sair">
        </a>
      </center>
    <center>
        <a href="../../classes/contato/apagarTodosContatos.php">
            <img src="/imagens/navbar/x.png" onclick="" width="40" height="40" class="hiddenBtnXContato" alt="sair" style="margin-left: -150px !important;">
        </a>
      </center>
    <center>
      <a href="../usuarios/main.php"><?$_SESSION['nome']?></a>
      <img src="/imagens/navbar/printer.png" class="hidden" onClick="window.print()" width="40" height="40" class="d-inline-block align-top" alt="imprimir" style="margin-left: 30px !important;">
    </center>
    <center>
        <a href="?pagina=inicio">
          <img src="/imagens/navbar/home.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="home" style="margin-left: 30px !important;">
      </center>
      <center>
        <a href="/funcoes/destruir_sessao.php">
            <img src="/imagens/navbar/sair.png" onclick="" width="40" height="40" class="d-inline-block align-top" alt="sair" style="margin-left: 30px !important;">
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
  <li class="header"><img src="../../imagens/sidebar/user.png" class="d-inline-block align-top" alt="sair" style="margin-right: 30px !important;"><b>Informativos</b></li>
    <li>
      <a href="?pagina=../cadastros/cadastrar_informativo">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/register.png" class="d-inline-block align-top" alt="sair" style="margin-right: 30px !important;"><b>Cadastrar</b> 
      </a>
    </li>
    <li>
      <a href="?pagina=../../classes/informativo/visualizar_informativo">
        <i class="fa fa-home" aria-hidden="true"></i><img src="../../imagens/sidebar/registerFeedback.png" class="d-inline-block align-top" alt="sair" style="margin-right: 30px !important;"><b>Visualizar</b> 
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

        include("$pagina.php");
    ?>
</body>
</html>