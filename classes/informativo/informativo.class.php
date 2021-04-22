<?php

    class Informativo{

        public function gravar($titulo, $texto){

    
            global $pdo;
            $sql = "INSERT INTO informativo(titulo, texto) VALUES(:titulo, :texto)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("titulo", $titulo);
            $sql->bindValue("texto", $texto);

            $sql->execute();

            echo "<script>alert('Usuario: ". $_POST['user'] .'\n' . "Nome: ". $_POST['nome'] .'\n\n' . "Cadastrado!');</script>";
            $url = '/';
            echo'<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';


        }
  

    }
?>


