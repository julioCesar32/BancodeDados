<body> <html> <head>
 <title>Resultado da pesquisa</title>
    </head> </body>
    
    <table border="1" style='width:50%'>
    <tr>  <th>ID Titulo</th> <th>ID Assinatura</th>
    <th>Data de Emissão</th> <th>Data de Vencimento</th><th>Juros</th>
    <th>Desconto</th> <th>Valor</th> <th>Data de pagamento</th> <th>Valor Pago</th> <th>Alterar</th> </tr>

    <?php

        $servername = "localhost";
        $database = "telemed";
        $password = "";
        $username = "root";

        $chave = $_POST["dado"];
        echo $chave. "novo";

        // Cria Conexão
        $conn = mysqli_connect($servername, $username, 
                            $password, $database);
        // Verificar Conexão
        if (!$conn) {
            die("falha na conexão: " . mysqli_connect_error());
        }
        
        echo "<br>Conectado com sucesso<br>";
        
        // Verifica escolha de campos

            $sql = "SELECT * FROM titulo where idtitulo = $chave";   
            $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");

        // loop para ler todos os registros
        $registro = mysqli_fetch_array($resultado);
        
        
        
        echo "<tr>";
        echo "<form action='TituloAlteracaoSalva.php' method='post'>";
                echo "<td><input type='hidden'   name='dados[]'   value=".$registro['idtitulo']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['assinatura_idassinaturas']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_dataEmicao']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_dataVencimento']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_juros']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_desconto']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_valor']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_datapagamento']."></td>";
                echo "<td><input type='text' name='dados[]'   value=".$registro['ti_valorpago']."></td>";
                echo "<td> <input type=submit value='Alterar' ></td></table>;

                <center> 
               </form>";

        mysqli_close($conn);
        echo "</table>";
        ?>
    </body>
</html>