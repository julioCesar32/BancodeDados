<body> <html> <head>
<title>Resultado da pesquisa«</title>
</head>

<table border="1" style='width:50%'>
<thead>
    <tr>
        <th>ID</th>
        <th>MARCA</th>
        <th>ANO MOD</th>
        <th>PLACA</th>
        <th>RENAVAM</th>
        <th>COR</th>
        <th>Excluir ou Alterar</th>
    </tr>
</thead>
<?php
    $servername = "localhost";
    $database = "banco_dadoscarros";
    $username = "root";
    $password = "";
    $tipo=["Car_id", "Car_marca", "Car_AnoMod", "Car_Placa", "Car_Renavam", "Car_cor"];
    $comando="";
    $sequencia="";
    $i=0;

    $conn = mysqli_connect($servername, $username,
                            $password, $database);
    //verifica a conexão

    if(!$conn){
        die("falha na conexão: ". mysqli_connect_error());
    }
    echo "<br>connectado com sucesso<br><br>";

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
    else
    {
        echo "nenhum campo selecionado <br><br>";         
    }

    if ($comando <> ""){
        $sql = "SELECT * FROM carros where $comando"; 
    }      

    else{
        $sql = "SELECT * FROM carros";     
    }    

    $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");

    while($registro = mysqli_fetch_array($resultado))
    {
        echo $CARid = $registro['Car_id'];
        echo $CARmarca = $registro['Car_Marca'];
        echo $CARanomod = $registro['Car_AnoMod'];
        echo $CARplaca = $registro['Car_Placa'];
        echo $CARrenavam = $registro['Car_Renavam'];
        echo $CARcor = $registro['Car_cor'];

        echo "<tr>";
        echo "<td>".$CARid."</td>";
        echo "<td>".$CARmarca."</td>";
        echo "<td>".$CARanomod."</td>";
        echo "<td>".$CARplaca."</td>";
        echo "<td>".$CARrenavam."</td>";
        echo "<td>".$CARcor."</td>";
        echo "<td>
         <form action='atualizar.php' method='post'>
         <center> 
         <input type='hidden' name='dado' value=".$CARid.">
         <input type=submit value='Alterar' ></form>";
   
   echo "<form action='excluirCarro.php' method='post'>
         <input type='hidden' name='dado' value=".$CARid.">
   <center> <input type=submit value='Excluir' ></form></td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($conn);
?>
</body>
</html>