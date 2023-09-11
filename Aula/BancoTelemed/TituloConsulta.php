<body> <html> <head>
    <title>Resultado da pesquisa</title>
    </head> </body>
    
    <table border="1" style='width:50%'>
    <tr>  <th>ID Titulo</th> <th>ID Assinatura</th>
    <th>Data de Emissão</th> <th>Data de Vencimento</th><th>Juros</th>
    <th>Desconto</th> <th>Valor</th> <th>Data de pagamento</th> <th>Valor Pago</th> </tr>

    <?php

        $servername = "localhost";
        $database = "telemed";
        $password = "";
        $username = "root";

        $campo=["idtitulo", "assinatura_idassinaturas", "ti_dataEmicao", 
                "ti_dataVencimento", "ti_juros", "ti_desconto", 
                "ti_valor", "ti_datapagamento", "ti_valorpago"];
        $i=0;
        $sequencia="";
        $comando="";

        // Cria Conexão
        $conn = mysqli_connect($servername, $username, 
                            $password, $database);

        // Verificar Conexão
        if (!$conn) {
            die("falha na conexão: " . mysqli_connect_error());
        }
        
        echo "<br>Conectado com sucesso<br>";
        
        // Verifica escolha de campos
        if(isset($_POST["dado"]))
        {    
            // Faz loop para os dados
            foreach($_POST["dado"] as $dado)
            {
                if ( $dado <> "")
                {
                    if ($sequencia == "")
                        $sequencia=1;
                    else
                        $comando = $comando . " and ";
                            
                    $comando = $comando . $campo[$i] ."="."'"
                    .$dado."' ";
                    echo "$comando <br>"; 
                }
                $i++;
            }
            
            
        }
        else
        {
            echo "nenhum campo selecionado";
        
        }


        if ($comando <> "")
            $sql = "SELECT * FROM titulo where $comando";   
        else
            $sql = "SELECT * FROM titulo";     

        $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
        
        // loop para ler todos os registros
        while ($registro = mysqli_fetch_array($resultado))
        {
        $idtitulo                  = $registro['idtitulo'];
        $assinatura_idassinaturas  = $registro['assinatura_idassinaturas'];
        $ti_dataEmicao             = $registro['ti_dataEmicao'];
        $ti_dataVencimento         = $registro['ti_dataVencimento'];
        $ti_juros                  = $registro['ti_juros'];
        $ti_desconto               = $registro['ti_desconto'];
        $ti_valor                  = $registro['ti_valor'];
        $ti_datapagamento          = $registro['ti_datapagamento'];
        $ti_valorpago              = $registro['ti_valorpago'];
        
        echo "<tr>";
        echo "<td>".$idtitulo."</td>";
        echo "<td>".$assinatura_idassinaturas."</td>";
        echo "<td>".$ti_dataEmicao."</td>";
        echo "<td>".$ti_dataVencimento."</td>";
        echo "<td>".$ti_juros."</td>";
        echo "<td>".$ti_desconto."</td>";
        echo "<td>".$ti_valor."</td>";
        echo "<td>".$ti_datapagamento."</td>";
        echo "<td>".$ti_valorpago."</td>";
        echo "<td>
                <form action='TituloAlteracao.php' method='post'>
                <center> 
                <input type='hidden' name='dado' value=".$idtitulo.">
                <input type=submit value='Alterar' ></form>";
        
        echo "<form action='TituloExclusao.php' method='post'>
                <input type='hidden' name='dado' value=".$idtitulo.">
        <center> <input type=submit value='Excluir' ></form></td>";
        echo "</tr>";
        }
        mysqli_close($conn);
        echo "</table>";
    ?>



</body>
</html>