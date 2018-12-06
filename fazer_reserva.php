 <?php
         
         $verifica =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='individual';");

         while ($dados = mysqli_fetch_array($verifica)) {

            $qtdquartos = $dados['ocupado'];

            $v[] = $qtdquartos; 
         }

         $quartosnaoocupados = count($v);

         if ($quartosnaoocupados <= 4 && $quartosnaoocupados != 0) { ?>

           <input type="radio" name="tipo" value="Individual" checked> Individual <br>

           <?php } ?>

           

           <?php
           
         $verificacasal =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='Casal Simples';");

         while ($dadoscasal = mysqli_fetch_array($verificacasal)) {

            $qtdquartoscasal = $dadoscasal['ocupado'];

            $vcasal[] = $qtdquartoscasal; 
         }

         $quartosnaoocupadoscasal = count($vcasal);

         if ($quartosnaoocupadoscasal <= 4 && $quartosnaoocupadoscasal != 0) { ?>

           <input type="radio" name="tipo" value="Casal Simples" checked> Casal Simples <br>

           <?php } ?>

          

            <?php
        
            $verificadeluxe =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='Casal Deluxe';");

            while ($dadosdeluxe = mysqli_fetch_array($verificadeluxe)) {

            $qtdquartosdeluxe = $dadosdeluxe['ocupado'];

            $vdeluxe[] = $qtdquartosdeluxe; 
            }

            $quartosnaoocupadosdeluxe = count($vdeluxe);

            if ($quartosnaoocupadosdeluxe <= 4 && $quartosnaoocupadosdeluxe != 0) { ?>

            <input type="radio" name="tipo" value="Casal Deluxe" checked> Casal Deluxe <br>

            <?php } ?>
