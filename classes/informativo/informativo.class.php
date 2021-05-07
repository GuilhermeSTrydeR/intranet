<!-- classe responsavel pelo crud do formulario de informativo -->
<?php
    class Informativo{
        // funcao para gravar no banco de dados o informativo preenchido no form
        public function gravar($titulo, $texto, $ativo, $dataCadastro){

            global $pdo;
            $sql = "INSERT INTO informativo(titulo, texto, ativo, dataCadastro) VALUES(:titulo, :texto, :ativo, :dataCadastro)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("dataCadastro", $dataCadastro);
            
    
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
        public function desativarTodosInformativos(){


                global $pdo;
                $sql = "UPDATE informativo SET excluido = '1'";
                $sql = $pdo->prepare($sql);
                $sql->execute();



        }

        public function desabilitarTodosInformativo(){


            global $pdo;
            $sql = "UPDATE informativo SET ativo = '0'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            $i = $i + 1;


    }

        public function habilitarTodosInformativo(){

        
        

            global $pdo;
            $sql = "UPDATE informativo SET ativo = '1'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            $i = $i + 1;


 

    }

           



    }
?>