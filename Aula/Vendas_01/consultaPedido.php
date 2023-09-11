<body> <html> <head>
    <title>Resultado da pesquisa</title>
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
        <th>Valor do Frete</th>
        <th>ID do cliente</th>
        <th>Id do Vendedor</th>
        <th>Data de Entrega</th>
        <th>Excluir ou Alterar</th>
    </tr>
</thead>

<?php
    $servername = "localhost";
    $database = "vendas_01";
    $username = "root";
    $password = "";
    $tipo=[".`Ped_id`,
    `Ped_ValorFrete`,
    `Cliente_Cli_id`,
    `Vendedores_Ven_id`,
    `Ped_DataEntrega`"];
    $comando="";
    $sequencia="";
    $i=0;

    $conn = mysqli_connect($servername, $username,
                            $password, $database);
    //verifica a conex�o

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
        $sql = "SELECT * FROM Pedidos where $comando"; 
    }      

    else{
        $sql = "SELECT * FROM Pedidos";     
    }    

    $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");

    while($registro = mysqli_fetch_array($resultado))
    {
        $PedId = $registro['Ped_id'];
        $PedValorFrete = $registro['Ped_ValorFrete'];
        $ClienteCliId = $registro['Cliente_Cli_id'];
        $VendedoresVenId = $registro['Vendedores_Ven_id'];
        $PedDataEntrega = $registro['Ped_DataEntrega'];

        echo "<tr>";
        echo "<td>".$PedId."</td>";
        echo "<td>".$PedValorFrete."</td>";
        echo "<td>".$ClienteCliId."</td>";
        echo "<td>".$VendedoresVenId."</td>";
        echo "<td>".$PedDataEntrega."</td>";
        echo "<td>
         <form action='atualizar.php' method='post'>
         <center> 
         <input type='hidden' name='dado' value=".$Prodid.">
         <input type=submit value='Alterar' ></form>";
   
        echo "<form action='excluir.php' method='post'>
                <input type='hidden' name='dado' value=".$Prodid.">
        <center> <input type=submit value='Excluir' ></form></td>";
                echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
</body>
</html>