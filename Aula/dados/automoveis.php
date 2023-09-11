<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    
    <title>Senai - Automóveis</title>
</head>

<?php

    $servername = "localhost";
    $database = "senai_automoveis";
    $username = "root";
    $passoword = "";
    $area = $_POST['area'];
    $conn = mysqli_connect($servername,$username,$passoword,$database);
            $sql = "SELECT alocacao.id_alocacao, alocacao.Aloc_area, alocacao.Aloc_qtde, alocacao.Auto_id_Automoveis, automoveis.Auto_modelo, concessionarias.Conc_concessionaria
                    FROM alocacao
                    JOIN automoveis ON alocacao.Auto_id_Automoveis = automoveis.id_Automoveis
                    JOIN concessionarias ON alocacao.Conc_id_Concessionarias = concessionarias.id_Concessionarias
                    WHERE alocacao.Aloc_area = '$area'";
        //     $sql ="SELECT `alocacao`.`id_Alocacao`,
        //     `alocacao`.`Aloc_area`,
        //     `alocacao`.`Aloc_qtde`,
        //     `alocacao`.`Auto_id_Automoveis`,
        //     `alocacao`.`Conc_id_Concessionarias`
        // FROM `senai_automoveis`.`alocacao` where Aloc_area = $area";

        $resultado = mysqli_query($conn,$sql) or die ("Erro ao retornar os pesquisas");
        echo "<table class='tabela'>
                <thead>
                    <th>Area</th>
                    <th>Automóvel</th>
                    <th>Quantidade</th>
                    <th>Concessionaria</th>
                    <th>Vender</th>
                </thead>";
                while($registro = mysqli_fetch_array($resultado))
                    {
                    echo "<tr>";
                        echo "<td>".$registro['Aloc_area']."</td>";
                        echo "<td>".$registro['Auto_modelo']."</td>";
                        echo "<td>".$registro['Aloc_qtde']."</td>";
                        echo "<td>".$registro['Conc_concessionaria']."</td>";
                        echo "<td><form action='venda.php' method='post'>              
                        <input type='hidden' name='id' value='" . $registro['Auto_id_Automoveis'] . "'>
                        <center><input type=submit value='Vender'></center></form></td>";
                    echo "</tr>";
                    }
        echo "</table>";
        mysqli_close($conn);
?>