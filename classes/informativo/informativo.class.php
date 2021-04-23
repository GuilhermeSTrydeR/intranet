<!-- classe responsavel pelo crud do formulario de informativo -->
<?php
    class Informativo{
        // funcao para gravar no banco de dados o informativo preenchido no form
        public function gravar($titulo, $texto){

            global $pdo;
            $sql = "INSERT INTO informativo(titulo, texto) VALUES(:titulo, :texto)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);
            
            $sql->execute();
            
        }

        //fucnao para apagar todos os informativos da tabela informativo
        public function apagarTodosInformativos(){

            global $pdo;
            $sql = ("TRUNCATE TABLE informativo");
            $sql = $pdo->prepare($sql);
            $sql->execute();
            
        }

        //funcao para desativar os informativos (aconselhavel ao inves de apagar)
        public function desativarInformativo(){

            global $pdo;
            $sql = "UPDATE informativo SET excluido = '1'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            $url = '/paginas/admin/main.php?pagina=../../classes/usuario/visualizar_usuario';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';


        }

           



    }
?>