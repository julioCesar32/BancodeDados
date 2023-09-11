<html>
    
    <body>

        <center>
            <form method = "post" action = "TituloCadastro2.php">
                <br>
                <h1>Cadastro para a tabela Titulo</h1>


                    <label for="FormPagamento"><strong>ID assinaturas</strong></label>
                    
                        <?php
                        $servername = "localhost";
                        $database = "telemed";
                        $username = "root";
                        $password = "";
                        $conn = mysqli_connect($servername, $username, $password, $database);
                        echo "<select name='IdAssinaturas'>";

                        if(!$conn){
                            die("Falha na conexão: " . mysqli_connect_error());
                        }

                        $sql2 = "SELECT * FROM assinatura";

                        $resultado = mysqli_query($conn,$sql2) or die("Erro ao retornar informação");

                        while($registro = mysqli_fetch_array($resultado)){
                            $idassinaturas = $registro['idassinaturas'];
                            echo "<option value='".$idassinaturas."'>$idassinaturas</option>";
                        }
                        echo "</select>";
                            mysqli_close($conn);
                        ?>
                    

                    Data da Emissão:
                    <input type = 'text' name = "DataEmi" size = '5' />

                    Data do Vencimento:
                    <input type = 'text' name = "DataVenc" size = '5' />

                    Juros:
                    <input type = 'text' name = "Juros" size = '5' />

                    Desconto:
                    <input type = 'text' name = "Desc" size = '5' />

                    Valor:
                    <input type = 'text' name = "Valor" size = '5' />
                
                    Data de pagamento:
                    <input type = 'text' name = "DataPg" size = '5' />

                    Valor Pago:
                    <input type = 'text' name = "ValorPg" size = '5' />

                <br><br>
                <input type = "submit" name = "calcularbnt" value = "Inserir" />
            </form>

        </center>

    </body>

</html>