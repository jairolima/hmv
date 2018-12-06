<?php
    include("url_adm.php");
	include("../db/dbconnect.php");
    
?>
<br>
<div class="container">
    <div class="jumbotron">
        <h2>Fazer Reservas</h2> 
        <h5 class="text-primary" >Preencha os campos para fazer uma reserva!</h5><br>
        <form method="post" action="reservar.php" >


        

        <?php
         $verifica =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='individual';");

         while ($dados = mysqli_fetch_array($verifica)) {

            $qtdquartos = $dados['ocupado'];

            $v[] = $qtdquartos; 
         }

         $quartosnaoocupados = count($v);

         if ($quartosnaoocupados <= 4 && $quartosnaoocupados != 0) { ?>

           <input type="radio" name="tipo" value="Individual"> Individual <br>

           <?php } ?>

           

           <?php
         $verificacasal =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='individual';");

         while ($dadoscasal = mysqli_fetch_array($verificacasal)) {

            $qtdquartoscasal = $dadoscasal['ocupado'];

            $vcasal[] = $qtdquartoscasal; 
         }

         $quartosnaoocupadoscasal = count($vcasal);

         if ($quartosnaoocupadoscasal <= 4 && $quartosnaoocupadoscasal != 0) { ?>

           <input type="radio" name="tipo" value="Casal Simples"> Casal Simples <br>

           <?php } ?>

          

            <?php
            $verificadeluxe =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='individual';");

            while ($dadosdeluxe = mysqli_fetch_array($verificadeluxe)) {

            $qtdquartosdeluxe = $dadosdeluxe['ocupado'];

            $vdeluxe[] = $qtdquartosdeluxe; 
            }

            $quartosnaoocupadosdeluxe = count($vdeluxe);

            if ($quartosnaoocupadosdeluxe <= 4 && $quartosnaoocupadosdeluxe != 0) { ?>

            <input type="radio" name="tipo" value="Casal Deluxe"> Casal Deluxe <br>

            <?php } ?>


            <br>Nome :<input type="text" name="nome" placeholder="Nome" />
            CPF :<input type="text" name="cpf" placeholder="Cpf" />
            E-mail :<input type="text" name="email" placeholder="E-mail" />
            Senha :<input type="text" name="senha" placeholder="Senha" /><br>
           
            <br>Chegada:<input type="date" name="chegada"/>
            Saída:<input type="date" name="saida"/>
            Adulto(s):<input type="number" name="adulto" min="1" max="3" step="1" value="1"/>
            Criança:<input type="number" name="crianca" min="0" max="2" step="1" value="0"/>
            Idade da criança:<input type="number" name="idade" min="0" max="7" step="1" value="0"/><br>
            <br><input class="btn btn-primary" type="reset" name="botao_limpar" value="Limpar"/>
            <input class="btn btn-primary" type="submit" name="enviar" value="Reservar">
        </form>
    </div> 
</div>
