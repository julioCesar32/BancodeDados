<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    
    <title>Senai - Automóveis</title>
</head>
<body>
    <div class="titulo-Principal">
        <h1>
            Senai - Automóveis
            <button class="botao" onclick="abrirPatio()">Abrir Patio ⤵</button><!-- Botão para abrir o menu lateral direito -->
        </h1>
    </div>
    <div id="container">
        <div id="esquerdo-painel">
          <!-- Conteúdo do painel esquerdo -->
          <h2 id="apresentacao"><u>Bem-vindo ao nosso site de venda de carros!</h2></u>
            <p class="texto">Aqui, você encontrará uma ampla seleção de veículos de diferentes marcas e modelos, com informações detalhadas e fotografias de alta qualidade.
               Nossa plataforma segura e transparente oferece uma experiência de compra personalizada.
               Utilize nossas ferramentas de busca avançada, entre em contato diretamente com os vendedores e encontre o veículo perfeito para você.
               Também fornecemos informações sobre financiamento e suporte ao cliente excepcional. 
               Estamos animados para ser parte da sua jornada automotiva. Explore nosso site e encontre o carro dos seus sonhos hoje!</p>
        </div>
        <div id="direito-painel">
          <div id="iframe-menu">
            <!-- Contéudo do painel direito -->
          </div>
        </div>
    </div>
    <script src="main.js"></script>
</body>
</html>