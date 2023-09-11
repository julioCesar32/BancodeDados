<body> <html> <head>
    <title>Resultado da pesquisa«</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset1.css">
    <link rel="shortcut icon" href="lontra.png" /> 
</head>
<header>
    <div class="caixa">
        <img src="lontra.png" id="lontrinha">
        <h1>LojasIdeal :)</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home & Produtos</a></li>
                <li><a href="produto.html">Cadastro de Produtos</a></li>
                <li><a href="cadastro.html">Area de Cadastro</a></li>
            </ul>
        </nav>
    </div>
</header>
<table border="1" style='width:70%'>
<thead>
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>SOBRENOME</th>
        <th>DATA DE NASCIMENTO</th>
        <th>RG</th>
        <th>TELEFONE</th>
        <th>EMAIL</th>
        <th>ENDEREÇO</th>
        <th>Excluir ou Alterar</th>
    </tr>
</thead>

<?php
    $servername = "localhost";
    $database = "vendas_01";
    $username = "root";
    $password = "";
    $tipo=[".`Cli_id`.`Cli_Nome`.`Cli_SobreNome`.`Cli_DatadeNascimento`.`Cli_Rg`.`Cli_Telefone`.`Cli_Email`.`Cli_Endereco`"];
    $comando="";
    $sequencia="";
    $cliente = "cliente";
    $vendedor = "vendedores";
    $i=0;

    $conn = mysqli_connect($servername, $username,
                            $password, $database);
    //verifica a conexão

    if(!$conn){
        die("falha na conexão: ". mysqli_connect_error());
    }

    if(isset($_POST["PESQUISA"]))
    {
        foreach($_POST["PESQUISA"] as $pesquisa)
        {
            if($pesquisa <> "")
            {
                if($sequencia == "")
                    $sequencia = 1;
                
                else{
                    $comando = $comando . " and ";
                }                   
                $comando = $comando . $tipo[$i] . " = ". "  '".$pesquisa."' ";
            }
            $i++;
        }    
    }
    if ($comando <> ""){
        $sql = "SELECT * FROM cliente where $comando"; 
    }      

    else{
        $sql = "SELECT * FROM cliente";     
    }    

    $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");

    while($registro = mysqli_fetch_array($resultado))
    {
        $CLIid = $registro['Cli_id'];
        $CLInome = $registro['Cli_Nome'];
        $CLIsobreNome = $registro['Cli_SobreNome'];
        $CLIdata = $registro['Cli_DatadeNascimento'];
        $CLIrg = $registro['Cli_Rg'];
        $CLItelefone = $registro['Cli_Telefone'];
        $CLIemail = $registro['Cli_Email'];
        $CLIendereco = $registro['Cli_Endereco'];

        echo "<tr>";
        echo "<td>".$CLIid."</td>";
        echo "<td>".$CLInome."</td>";
        echo "<td>".$CLIsobreNome."</td>";
        echo "<td>".$CLIdata."</td>";
        echo "<td>".$CLIrg."</td>";
        echo "<td>".$CLItelefone."</td>";
        echo "<td>".$CLIemail."</td>";
        echo "<td>".$CLIendereco."</td>";
        echo "<td>
         <form action='atualizar.php' method='post'>
         <center> 
         <input type='hidden' name='dado' value=".$CLIid.">
         <input type=submit value='Alterar' ></form>";
   
        echo "<form action='excluir.php' method='post'>              
                <input type='hidden' name='dado' value=".$CLIid.">
        <center> <input type=submit value='Excluir' ></form></td>";
                echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
</body>
</html>