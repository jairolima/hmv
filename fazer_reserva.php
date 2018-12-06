<?php
    include("url_site.php");
    include("db/dbconnect.php");
?>

<script language="JavaScript" >
        function enviardados(){
          
        if(document.dados.tx_nome.value=="" || document.dados.tx_nome.value.length < 4)
        {
        alert( "Preencha campo NOME corretamente!" );
        document.dados.tx_nome.focus();
        return false;
        }
          
        if( document.dados.tx_email.value=="" || document.dados.tx_email.value.indexOf('@')==-1 || document.dados.tx_email.value.indexOf('.')==-1 )
        {
        alert( "Preencha campo E-MAIL corretamente!" );
        document.dados.tx_email.focus();
        return false;
        }

        if(document.dados.tx_cpf.value=="" || document.dados.tx_cpf.value.length < 6)
        {
        alert( "Preencha campo CPF corretamente!" );
        document.dados.tx_cpf.focus();
        return false;
        }
        

        var url_atual = window.location.href;
        alert( "SUCESSO!" );
        return true;

        }
          
        </script>

<br>
<div class="container">
    <div class="jumbotron">
        <h2>Fazer Reservas</h2> 
        <h5 class="text-primary" >Preencha os campos para fazer uma reserva!</h5><br>
        <form method="post" action="reservar.php" name="dados" onSubmit="return enviardados();">

             <?php
         error_reporting(0);
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
           error_reporting(0);
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
            error_reporting(0);
            $verificadeluxe =  mysqli_query($conexao,"SELECT ocupado FROM suite WHERE ocupado='N' AND tipo='Casal Deluxe';");

            while ($dadosdeluxe = mysqli_fetch_array($verificadeluxe)) {

            $qtdquartosdeluxe = $dadosdeluxe['ocupado'];

            $vdeluxe[] = $qtdquartosdeluxe; 
            }

            $quartosnaoocupadosdeluxe = count($vdeluxe);

            if ($quartosnaoocupadosdeluxe <= 4 && $quartosnaoocupadosdeluxe != 0) { ?>

            <input type="radio" name="tipo" value="Casal Deluxe" checked> Casal Deluxe <br>

            <?php } ?>

            <br>Nome :<input type="text" name="nome" placeholder="Nome" id="tx_nome"/>
            CPF :<input type="text" name="cpf" placeholder="Cpf" id="tx_cpf"/>
            E-mail :<input type="text" name="email" placeholder="E-mail" id="tx_email"/>
            Senha :<input type="text" name="senha" placeholder="Senha" required/><br>
           
            <br>Chegada:<input type="date" name="chegada" required/>
            Saída:<input type="date" name="saida" required/>
            Adulto(s):<input type="number" name="adulto" min="1" max="3" step="1" value="1"/>
            Criança:<input type="number" name="crianca" min="0" max="2" step="1" value="0"/>
            Idade da criança:<input type="number" name="idade" min="0" max="7" step="1" value="0"/><br>
            <br><input class="btn btn-primary" type="reset" name="botao_limpar" value="Limpar"/>
            <input class="btn btn-primary" type="submit" name="enviar" value="Reservar">
        </form>
    </div> 
</div>
