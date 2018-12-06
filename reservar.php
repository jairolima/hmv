
    <?php 

    include("url_site.php");
    include("db/dbconnect.php");



    $chegada = $_REQUEST["chegada"];
    $saida = $_REQUEST["saida"];
    $adulto = $_REQUEST["adulto"];
    $crianca = $_REQUEST["crianca"];
    $idade = $_REQUEST["idade"];
    $tipo = $_REQUEST["tipo"];
    $nome = $_REQUEST["nome"];
    $cpf = $_REQUEST["cpf"];
    $email = $_REQUEST["email"];
    $senha = $_REQUEST["senha"];



    $sqlH = "insert into hospede(CPF, nome, senha, email) 
    values('$cpf', '$nome', '$senha', '$email');";
    
    mysqli_query($conexao, $sqlH);
        
    $sqlS = "update suite
    set ocupado = 'S'  
    where tipo = '$tipo' and ocupado <> 'S' limit 1;";

    mysqli_query($conexao, $sqlS);

    $sql = "insert into estadia(dataC, dataS, adulto, crianca, idadeCC, CPF_H, nome_H, suite_H)
    values('$chegada', '$saida', '$adulto', '$crianca', '$idade', '$cpf', '$nome', '$tipo');";
        
    mysqli_query($conexao, $sql);

    echo "
    <div class='container'>
    <h3>Reserva concluída!</h3>
    <br>
    <h5>Você será redirecionado em instantes!</h5>
";
header('refresh:3;http://localhost/sistema_hotel-master/fazer_reserva.php');

mysqli_close($conexao);

?>