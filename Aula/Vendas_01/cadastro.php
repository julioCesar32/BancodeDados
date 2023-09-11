<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de cliente</title>
    <link rel="shortcut icon" href="lontra.png" /> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
</head>
<body>
    <header>
        <div class="caixa">
            <img src="lontra.png" id="lontrinha">
            <h1>LojasIdeal :)</h1>
            <nav>
                <ul>
                    <li><a href="index.html">Home & Produtos</a></li>
                    <li><a href="produto.html">Cadastro de Produtos</a></li>
                    <li><a href="cadastro.html">Cadastro de Clientes e de Vendedores</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <script>
        function myFunction() {
           history.go(-1); 
           return false;
        }
    </script>
</html>

<?php
$servername = "localhost";
$database = "vendas_01";
$username = "root";
$password = "";
$CLInome = $_POST['NOME'];
$CLIsobrenome = $_POST['SOBRENOME'];
$CLIdata = $_POST['DATA'];
$CLIrg = $_POST['RG'];
$CLItel = $_POST['TEL'];
$CLIemail = $_POST['EMAIL'];
$CLIendereco = $_POST['ENDERECO'];

$conn = mysqli_connect($servername, $username,
                       $password, $database);

//verifica a conexão

if(!$conn){
    die("falha na conexão: ". mysqli_connect_error());
}

$sql = "INSERT INTO `vendas_01`.`cliente`
                                (`Cli_id`,
                                `Cli_Nome`,
                                `Cli_SobreNome`,
                                `Cli_DatadeNascimento`,
                                `Cli_Rg`,
                                `Cli_Telefone`,
                                `Cli_Email`,
                                `Cli_Endereco`)
                                VALUES
                                ('' ,
                                '$CLInome',
                                '$CLIsobrenome',
                                '$CLIdata',
                                '$CLIrg',
                                '$CLItel',
                                '$CLIemail',
                                '$CLIendereco')";


if(mysqli_query($conn, $sql)){
    echo "<h1 class='CadastradoSucesso'>Seu cadastro foi incluído em nosso banco de dados :D</h1>
        <button id='voltar' onClick='myFunction()'>Voltar</button>";
}else
{
    echo "Error: ". $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
</body>