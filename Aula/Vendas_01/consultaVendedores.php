<body> <html> <head>
    <title>Resultado da pesquisa�</title>
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
        <th>CPF</th>
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
    $tipo=[".`Ven_id`,
    `Ven_Nome`,
    `Ven_SobreNome`,
    `Ven_DatadeNascimento`,
    `Ven_Rg`,
    `Ven_Cpf`,
    `Ven_Telefone`,
    `Ven_Email`"];
    $comando="";
    $sequencia="";
    $i=0;

    $conn = mysqli_connect($servername, $username,
                            $password, $database);
    //verifica a conex�o

    if(!$conn){
        die("falha na conex�o: ". mysqli_connect_error());
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
        $sql = "SELECT * FROM Vendedores where $comando"; 
    }      

    else{
        $sql = "SELECT * FROM Vendedores";     
    }    

    $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");

    while($registro = mysqli_fetch_array($resultado))
    {
        $Venid = $registro['Ven_id'];
        $Vennome = $registro['Ven_Nome'];
        $VensobreNome = $registro['Ven_SobreNome'];
        $Vendata = $registro['Ven_DatadeNascimento'];
        $Venrg = $registro['Ven_Rg'];
        $Vencpf = $registro['Ven_Cpf'];
        $Ventelefone = $registro['Ven_Telefone'];
        $Venemail = $registro['Ven_Email'];

        echo "<tr>";
        echo "<td>".$Venid."</td>";
        echo "<td>".$Vennome."</td>";
        echo "<td>".$VensobreNome."</td>";
        echo "<td>".$Vendata."</td>";
        echo "<td>".$Venrg."</td>";
        echo "<td>".$Vencpf."</td>";
        echo "<td>".$Ventelefone."</td>";
        echo "<td>".$Venemail."</td>";
        echo "<td>
         <form action='atualizarVendedores.php' method='post'>
         <center> 
         <input type='hidden' name='dado' value=".$Venid.">
         <input type=submit value='Alterar' ></form>";
   
        echo "<form action='excluirVendedores.php' method='post'>
                <input type='hidden' name='dado' value=".$Venid.">
        <center> <input type=submit value='Excluir' ></form></td>";
                echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
</body>
</html>