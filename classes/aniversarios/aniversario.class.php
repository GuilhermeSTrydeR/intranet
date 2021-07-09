
<?php
    class Aniversario{
     
        public function gravar($nome, $setor, $nasc){

            global $pdo;
            $sql = "INSERT INTO aniversario(nome, setor, nasc) VALUES(:nome, :setor, :nasc)";
            $sql = $pdo->prepare($sql);
            $sql->bindValue("nome", $nome);
            $sql->bindValue("setor", $setor);
            $sql->bindValue("nasc", $nasc);

         
            $sql->execute();
            
        }


    }
?>