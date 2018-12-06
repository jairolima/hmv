<?php
    include("url_site.php");
    include("db/dbconnect.php");
?>



<br>
<div class="container">
    <div class="jumbotron">
        <h2>Fazer Reservas</h2> 
        <h5 class="text-primary" >Preencha os campos para fazer uma reserva!</h5><br>
        <form method="post" action="reservar.php">

		 <?php
         error_reporting(0);
         
         $verifica =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='individual';");

         while ($dados = mysqli_fetch_array($verifica)) {

            $qtdquartos = $dados['ocupado'];

            $v[] = $qtdquartos; 
         }

         $quartosnaoocupados = count($v);

         if ($quartosnaoocupados > 0) { ?>

           <input type="radio" name="tipo" value="Individual" checked> Individual <br>
        

           <?php } ?>

           

           <?php
           error_reporting(0);
           
         $verificacasal =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='Casal Simples';");

         while ($dadoscasal = mysqli_fetch_array($verificacasal)) {

            $qtdquartoscasal = $dadoscasal['ocupado'];

            $vcasal[] = $qtdquartoscasal; 
         }

         $quartosnaoocupadoscasal = count($vcasal);

         if ($quartosnaoocupadoscasal > 0) { ?>

           <input type="radio" name="tipo" value="Casal Simples" checked> Casal Simples <br>
           

           <?php } ?>

          

            <?php
            error_reporting(0);
        
            $verificadeluxe =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='Casal Deluxe';");

            while ($dadosdeluxe = mysqli_fetch_array($verificadeluxe)) {

            $qtdquartosdeluxe = $dadosdeluxe['ocupado'];

            $vdeluxe[] = $qtdquartosdeluxe; 
            }

            $quartosnaoocupadosdeluxe = count($vdeluxe);

            if ($quartosnaoocupadosdeluxe > 0) { ?>

            <input type="radio" name="tipo" value="Casal Deluxe" checked> Casal Deluxe <br>
    

            <?php } ?>


            <?php
            error_reporting(0);
        
            $verificatodos =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N';");

            while ($dadostodos = mysqli_fetch_array($verificatodos)) {

            $qtdtotal = $dadostodos['ocupado'];

            $vtotal[] = $qtdtotal; 
            }

            $todos = count($vtotal);


            if ($todos > 0) { ?>

                 <br>Nome :<input type="text" name="nome" placeholder="Nome" required />
                CPF :<input type="text" name="cpf" placeholder="Cpf" id="tx_cpf" required />
                E-mail :<input type="text" name="email" placeholder="E-mail" required />
                Senha :<input type="text" name="senha" placeholder="Senha" required /><br>
               
                <br>Chegada:<input type="date" name="chegada" id="tx_data" required/>
                Saída:<input type="date" name="saida" id="tx_data" required/>
                Adulto(s):<input type="number" name="adulto" min="1" max="3" step="1" value="1"/>
                Criança:<input type="number" name="crianca" min="0" max="2" step="1" value="0"/>
                Idade da criança:<input type="number" name="idade" min="0" max="7" step="1" value="0"/><br>
                <br><input class="btn btn-primary" type="reset" name="botao_limpar" value="Limpar"/>
                <input class="btn btn-primary" type="submit" name="enviar" value="Reservar">
            </form>
        </div> 
    </div>

            <?php } else { ?>

            <h1> TODOS OS QUARTOS ESTÃO OCUPADOS</h1>
               
            <?php } ?>




        
















