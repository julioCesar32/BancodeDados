function exibirAlert() {
  alert("Este pátio está vazio");
}

function visualizarTabela() {
  window.location.href = "outra_pagina.php";
}

var iframeMenu  = document.getElementById('iframe-menu');
function fecharPatio() {
    iframeMenu.innerHTML = '';
  }

var fecharButton = document.createElement('button');
fecharButton.innerHTML = 'Fechar ✖';
fecharButton.className = 'fechar-button';
fecharButton.onclick = fecharPatio;


//Função para abrir o iframe(ou patio)
function abrirPatio() {
    var iframeMenu = document.getElementById('iframe-menu'); //Pega o id do iframe e abre no lado direito
        iframeMenu.innerHTML = '<iframe src="patio.php" title="Patio de carros"></iframe>';
        iframeMenu.appendChild(fecharButton);
  }


