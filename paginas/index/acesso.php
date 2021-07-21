<?php


    require ('classes/acesso/acesso.class.php');
    $ac = new Acesso();
?>

<center style="margin-left: 40px; margin-top: 50px !important; position: relative !important;">
    <style>

        a{text-decoration: none;}
    
    </style>

<div class='container' style='margin-left: 30px; margin-top: 30px;'>
    <div class='row'>
        <div style="float: left" id='interno' class='boxItens'>
            <a href="?pagina=/index/acesso_grupo&id=1" ><i class="active"></i><center><p>Interno</p></center></a>
        </div>
        <div style="float: left" id='externo' class='boxItens'>
            <a href="?pagina=/index/acesso_grupo&id=0" ><i class="active"></i><center><p>Externo</p></center></a>
        </div>
    <div class='row'>
</div>