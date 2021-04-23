<center style='margin: 15px;'>
    <div id='mural' class='hidden'>

        <!-- 
        condicao estatica para resolver o problema de exibir as bordas da div sem ter informacoes dentro(porem ainda precisar integrar essa funcao a saida real) 
        -->
        <?php
            // aqui devera receber em vez de 'true' o retorno de uma funcao para verificar se ha linhas na tabela 'informativo'pois se nao houver, o elemento continua escondido
            $temInformacao = true;

            if($temInformacao == true){
                ?>
                <style>
                    .hidden{
                        display: block !important;
                    }
                </style>
                <?php

            }
        
        
        ?>

            <text style='word-wrap: break-word !important;'>


                
            </text>

    
    </div>
</center>