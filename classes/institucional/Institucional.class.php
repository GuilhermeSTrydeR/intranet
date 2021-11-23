<!-- classe responsavel pelo crud do formulario de mural -->
<?php
    class institucional{
        // funcao para gravar no banco de dados o mural preenchido no form
        public function gravar($titulo, $texto, $ativo, $dataCadastro, $imagem, $inicio, $fim){

            global $pdo;
            $sql = "INSERT INTO institucional(titulo, texto, ativo, dataCadastro, imagem, inicio, fim) VALUES(:titulo, :texto, :ativo, :dataCadastro, :imagem, :inicio, :fim)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("dataCadastro", $dataCadastro);
            $sql->bindValue("imagem", $imagem);
            $sql->bindValue("inicio", $inicio);
            $sql->bindValue("fim", $fim);
            
    
            $sql->execute();
            
        }

        public function editar($id, $titulo, $texto, $ativo, $dataCadastro, $imagem, $inicio, $fim){

            global $pdo;
            $sql = "UPDATE institucional SET titulo = :titulo, texto = :texto, ativo = :ativo, dataCadastro = :dataCadastro, imagem = :imagem, inicio = :inicio, fim = :fim WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
 
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);
            $sql->bindValue("ativo", $ativo);
            $sql->bindValue("dataCadastro", $dataCadastro);
            $sql->bindValue("imagem", $imagem);
            $sql->bindValue("inicio", $inicio);
            $sql->bindValue("fim", $fim);
            
    
            $sql->execute();
            
        }

        public function retornaAtivo($id){
            global $pdo;
            
            $sql = "SELECT ativo FROM institucional WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }

        public function retornaData($id){
            global $pdo;
            
            $sql = "SELECT dataCadastro FROM institucional WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }

        public function retornaTitulo($id){
            global $pdo;
            
            $sql = "SELECT titulo FROM institucional WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }


        public function retornaImagem($id){
            global $pdo;
            
            $sql = "SELECT imagem FROM institucional WHERE id = '$id'";
            $stmt = $pdo->prepare( $sql );
            $stmt->bindParam( ':id', $id );        
            $stmt->execute();

            $res = $stmt->fetchColumn();
    
        
            return $res;

        }
        
        

        //fucnao para apagar todos os institucionais da tabela institucional
        public function apagarTodosInstitucional(){

            global $pdo;
            $sql = ("TRUNCATE TABLE institucional");
            $sql = $pdo->prepare($sql);
            $sql->execute();
            
        }

        //funcao para desativar os institucionais (aconselhavel ao inves de apagar)
        public function desativarTodosInstitucional(){


                global $pdo;
                $sql = "UPDATE institucional SET excluido = '1'";
                $sql = $pdo->prepare($sql);
                $sql->execute();



        }

        public function desativarInstitucional($id){
            
            global $pdo;
            $sql = "UPDATE institucional SET excluido = '1' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();

            echo "<script>alert('institucional Excluido com Sucesso!');</script>";
            $url = '/paginas/admin/main.php?pagina=../../classes/usuario/visualizar_usuario';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';

        }

        public function desabilitarInstitucional($id){

            global $pdo;
            $sql = "UPDATE institucional SET ativo = '0' WHERE id = '$id'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
    
        }



        public function desabilitarTodosInstitucionais(){

            $i = 0;
            global $pdo;
            $sql = "UPDATE institucional SET ativo = '0'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            $i = $i + 1;


    }

        public function habilitarTodosInstitucionais(){

        
        
            $i = 0;
            global $pdo;
            $sql = "UPDATE institucional SET ativo = '1'";
            $sql = $pdo->prepare($sql);
            $sql->execute();
            $i = $i + 1;

    }
    public function habilitarInstitucional($id){

        $i = 0;
        global $pdo;
        $sql = "UPDATE institucional SET ativo = '1' WHERE id = '$id'";
        $sql = $pdo->prepare($sql);
        $sql->execute();
        $i = $i + 1;


    }
        


    }
?>