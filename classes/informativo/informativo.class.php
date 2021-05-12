<!-- classe responsavel pelo crud do formulario de informativo -->
<?php
    class Informativo{
        // funcao para gravar no banco de dados o informativo preenchido no form
        public function gravar($titulo, $texto, $ativo, $dataCadastro, $imagem){

            global $pdo;
            $sql = "INSERT INTO informativo(titulo, texto, ativo, dataCadastro, imagem) VALUES(:titulo, :texto, :ativo, :dataCadastro, :imagem)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("dataCadastro", $dataCadastro);
            $sql->bindValue("imagem", $imagem);
            
    
            $sql->execute();
            
        }

        public function editar($id, $titulo, $texto, $ativo, $dataCadastro, $imagem){

            global $pdo;
            $sql = "UPDATE informativo SET titulo = :titulo, texto = :texto, ativo = :ativo, dataCadastro = :dataCadastro, imagem = :imagem WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("dataCadastro", $dataCadastro);
            $sql->bindValue("imagem", $imagem);
            
    
            $sql->execute();
            
        }

        public function retornaImagem($id){
            global $pdo;
            
            $sql = "SELECT imagem FROM informativo WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

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

        public function desativarInformativo($id){
            
            global $pdo;
            $sql = "UPDATE informativo SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            echo "<script>alert('Informativo Excluido com Sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/usuario/visualizar_usuario';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

        }

        public function desabilitarInformativo($id){

            global $pdo;
            $sql = "UPDATE informativo SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            $i = $i + 1;


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