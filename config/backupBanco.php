<?php
    //aqui setamos o fuso-horario correto, fuso horario do proprio PHP
    date_default_timezone_set('America/Sao_Paulo');

    require ('../classes/conexao_bd.php');
    require ('config.php');
    
    echo "<center>";

    //gif para representar o loading do backup do banco
    echo "<img src='../imagens/backup_banco/backup_banco.gif' height='500' style='margin-top: 75px;' alt='logo_unimed'>";
   
    
    //a funcao shell_exec executa um script no shell, no caso esse script vai ate a pasta do servidor local(nesse caso o XAMPP) e ateh a pasta onde tem o executavel mysqldump.exe e executa passando alguns parametros basicos para gerar o DUMP do banco e salva em um arquivo contendo data e hora atual e a extensao .sql
    shell_exec('C:\xampp\mysql\bin\mysqldump -u root ' . $banco . ' > ../database/backup_interno/'. date('dmY-His') .'.sql');

    // echo "<img src='../imagens/backup_banco/4.png' height='500' style='margin-top: 75px;' alt='logo_unimed'>";
    echo "</center>";

    echo "<div style='margin-left: 500px;'>";
    echo "<a href='../../paginas/admin/main.php?pagina=../cadastros/editar_configuracoes'>
        <img src='../../imagens/navbar/back.png' alt='botao-desativar-informativo' title='Voltar' height=130> </a>";
    echo "</div>";
   

  


    

?>