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
                    <li><a href="cadastro.html">Area de Cadastro </a></li>
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
$VENNome = $_POST['NOME'];
$VENSobreNome = $_POST['SOBRENOME'];
$VENDatadeNascimento = $_POST['DATA'];
$VENRg = $_POST['RG'];
$VENCpf = $_POST['CPF'];
$VENTelefone = $_POST['TEL'];
$VENEmail = $_POST['EMAIL'];

$conn = mysqli_connect($servername, $username,
                       $password, $database);

//verifica a conexão

if(!$conn){
    die("falha na conexão: ". mysqli_connect_error());
}

$sql = "INSERT INTO `vendas_01`.`vendedores`
                                    (`Ven_id`,
                                    `Ven_Nome`,
                                    `Ven_SobreNome`,
                                    `Ven_DatadeNascimento`,
                                    `Ven_Rg`,
                                    `Ven_Cpf`,
                                    `Ven_Telefone`,
                                    `Ven_Email`)
                                    VALUES
                                    ('',
                                    '$VENNome',
                                    '$VENSobreNome',
                                    '$VENDatadeNascimento',
                                    '$VENRg',
                                    '$VENCpf',
                                    '$VENTelefone' ,
                                    '$VENEmail')";



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