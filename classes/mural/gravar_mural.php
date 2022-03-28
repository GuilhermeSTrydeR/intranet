<?php


    // desligar todos os erros e notices nessa pagina
    error_reporting(0);


    if(isset($_POST["titulo"]) && !empty($_POST["titulo"]) && isset($_POST["texto"]) && !empty($_POST["texto"])){
        

        //requer classe de conexao do banco
        require("../conexao_bd.php");

        //requer o mural.class onde o comando para gravar no banco ja esta pronto
        require("mural.class.php");

        // configuracoes, nesse caso o fuso horario
        require("../../config/config.php");


        //aqui instanciamos a classe
        $i = new mural();


        /*
        
        *$dir é o caminho da pasta onde você deseja que os arquivos sejam salvos. 
        *Neste exemplo, supondo que esta pagina esteja em public_html/upload/ 
        *os arquivos serão salvos em public_html/upload/imagens/ 
        *Obs.: Esta pasta de destino dos arquivos deve estar com as permissões de escrita habilitadas. 
        */ 
        $dir = "../../uploads/"; 

        // recebendo o arquivo multipart 
        $file = $_FILES["Arquivo"];
        
      

        // Move o arquivo da pasta temporaria de upload para a pasta de destino e se isso ocorrer a variavel $imagem ira receber o path completo da imagem(isso evita na hora de mostrar a imagem na tela, ficar aquele icone de mensagem nao encontrada)
        if(move_uploaded_file($file["tmp_name"], "$dir/".$file["name"])){

            // aqui concatenaremos o endereco da imagem para salvar no banco somente se a condição acima for satisfeita, pois se tiver qualquer coisa dentro dessa variavel, na tela inicial no mural em baixo do texto vai fia ruma imagem de erro informando que a imagem nao foi encontrada pois sem essa condicao a variavel $imagem ficara com a string: (../../uploads/) dentro da tag <img>
            $imagem = ($dir . $file['name']);

            if(pathinfo($imagem, PATHINFO_EXTENSION) == 'pdf' || pathinfo($imagem, PATHINFO_EXTENSION) == 'png' || pathinfo($imagem, PATHINFO_EXTENSION) == 'jpg' || pathinfo($imagem, PATHINFO_EXTENSION) == 'jpeg' || pathinfo($imagem, PATHINFO_EXTENSION) == 'gif'){

            
                echo "<script>alert('a extensão do arquivo não é permitida! por favor utilize apenas: .PDF, .PNG, .JPG, .JPEG ou .GIF');</script>";
                $url = '/paginas/admin/main.php?pagina=../../paginas/cadastros/cadastrar_mural';
                echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
    
            }
            
            else{
                        
                //aqui sera gravado no banco a funcao gravar do mural.class que no caso eh referenciada abaixo no require
                $dataCadastro = (time() + $fusoHorario);
                
                //aqui adicionamos um nivel basico de seguranca
                $titulo = addslashes($_POST["titulo"]);
                $texto = addslashes($_POST["texto"]);
                $ativo = addslashes($_POST["ativo"]);
                $inicio = addslashes($_POST["inicio"]);
                $fim = addslashes($_POST["fim"]);

            

                //se a funcao da classe tiver as variaveis, sera gravado no banco, se nao 
                $i->gravar($titulo, $texto, $ativo, $dataCadastro, $imagem, $inicio, $fim);

                echo "<script>alert('mural cadastrado com sucesso!');</script>";
                $url = '/paginas/admin/main.php?pagina=../../classes/mural/visualizar_mural';
                echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';
            }











        }


        

        
        


    }
    else{
        echo "<script>alert('algo deu errado!, por favor tente novamente');</script>";
        $url = '/paginas/admin/main.php?pagina=../../classes/mural/visualizar_mural';
        echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

    }


?>