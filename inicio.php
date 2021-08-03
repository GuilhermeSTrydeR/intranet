<?php

  include("config/config.php");
  

  session_start(); 
  if(isset($_SESSION['logado'])){

    header("Location: /");

  }

  $inc = "classes/conexao_bd.php";

  if (file_exists($inc) && is_readable($inc)) {

    include $inc;

  } else{

  include("paginas/erros/arq_conexao_banco_nao_existe.php");
  exit;

  }


  // try{

  //   require("classes/conexao_bd.php");

  // }catch(PDOException $e){

  //   include("paginas/erros/conexao_banco.php");
  //   exit;

  // }


  //a variavel abaixo define a pagina selecionada ao clicar nos menus
  $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 'index/inicio';


?>

<!DOCTYPE html>
  <html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Intranet</title>
      <!--  bootstrap -->
      <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
      <link rel="stylesheet" href="css/ftp.css">
      <link rel="stylesheet" href="css/print.css">
      
    </head>
    <body style='background: #f0f2f8'>
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: 	#0A5F55;">
        <div id="logo">
            <a href="/"><img src="imagens/unimed/logo.png" alt="logo-unimed" width= 40 height= 33></a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
          <ul class="navbar-nav">
            <li class="nav-item <?= ($pagina == 'inicio')?'active':'' ?>">
              <a style='color: white !important;' class="nav-link" href="?pagina=/index/inicio"><b>Inicio</b></a>
            </li>
            <li class="nav-item <?= ($pagina == 'inicio')?'active':'' ?>">
              <a style='color: white !important;' class="nav-link" href="?pagina=/index/acesso"><b>Acessos</b></a>
            </li>
            <div id="form_login">
            <form method="POST" action="classes/usuario/logar.php">
              <div class="row">
                  <div class="col" style='margin-right: -20px;'>
                    <input type="text" class="form-control" placeholder="Usuário" name="user" style='height: 34px; margin-top: 2px;' required>
                  </div>
                  <div class="col" style='margin-right: -20px;'>
                    <input type="password" class="form-control" placeholder="Senha" name="pass" style='height: 34px; margin-top: 2px;'  required>
                    </div>

                  <!-- <button type="submit" value="login" id="login" name="logar">Logar</button> -->
                  <div class="col" style='margin-right: -20px;'>
                    <button type="submit" class="btn btn-success" data-toggle="button" aria-pressed="false" autocomplete="off" style='height: 34px; margin-top: 2px;'>
                    Entrar
                  </button>     
                  </div>
                </div>
            </form>

            </div>
          </ul>
        </div>
      </nav>
      <br><br>
      <script src="../../js/bootstrap/popper/popper.min.js"></script>
      <script src="../../js/jquery/jquery.js"></script>
      <script src="js/bootstrap/bootstrap.js"></script>
      <script src="js/script.js"></script>

      <?php
        //esse include ira colocar na tela a pagina selecionada e que foi atribuida a variavel $pagina, assim sempre que uma pagina for atribuida a variavel $pagina, ela sera incluida abaixo
        include("paginas/$pagina.php");
      ?>
      </body>
      <footer>
        
        <!-- <p style='color: #00401A;'>Mesa Preta Sistemas - Versão 0.13</p> -->
      </footer>
</html>