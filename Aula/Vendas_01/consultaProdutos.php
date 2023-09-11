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
        <th>MARCA</th>
        <th>QUANTIDADE</th>
        <th>PREÇO</th>
        <th>CATEGORIA</th>
        <th>Excluir ou Alterar</th>
    </tr>
</thead>

<?php
    $servername = "localhost";
    $database = "vendas_01";
    $username = "root";
    $password = "";
    $tipo=[".`Prod_id`,
    `Prod_Nome`,
    `Prod_quantidadeProdutos`,
    `Prod_preco`,
    `Prod_Categoria`"];
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
        $sql = "SELECT * FROM produto1 where $comando"; 
    }      

    else{
        $sql = "SELECT * FROM produto1";     
    }    

    $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");

    while($registro = mysqli_fetch_array($resultado))
    {
        $Prodid = $registro['Prod_id'];
        $Prodnome = $registro['Prod_Nome'];
        $Prodquantidade = $registro['Prod_quantidadeProdutos'];
        $Prodpreco = $registro['Prod_Preco'];
        $Prodcategoria = $registro['Prod_Categoria'];

        echo "<tr>";
        echo "<td>".$Prodid."</td>";
        echo "<td>".$Prodnome."</td>";
        echo "<td>".$Prodquantidade."</td>";
        echo "<td>".$Prodpreco."</td>";
        echo "<td>".$Prodcategoria."</td>";
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