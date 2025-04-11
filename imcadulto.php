<?php
include_once ("header.php")
?>
<head>
 <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .botao-voltar {
      position: fixed;
      top: 70px;
      left: 30px;
      background-color: #4CAF50;
      color: white;
      padding: 12px 24px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 999;
    }

    .botao-voltar:hover {
      background-color: #45a049;
      transform: scale(1.05);
    }

    .botao-voltar:active {
      background-color: #3e8e41;
      transform: scale(0.98);
    }

    body {
      margin: 0;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }
    .container {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
      text-align: center;
    }

    #popup strong {
  color: white; /* ou qualquer outra cor clara que combine com o fundo escuro */
}
    h1 {
      margin-bottom: 20px;
      color: #333;
    }

    input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    button {
      padding: 12px 24px;
      border: none;
      border-radius: 8px;
      background-color: #007bff;
      color: white;
      font-size: 16px;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    #resultado p {
      margin: 10px 0;
      font-weight: bold;
      color: #333;
    }

    .error {
      color: red;
    }

    /* Atualização do Popup para igualar o exemplo desejado */
    #overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: rgba(0, 0, 0, 0.85);
      display: none;
      z-index: 999;
    }

    #popup {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.95);
      background: #1e1e1e;
      padding: 30px;
      border-radius: 12px;
      width: 90%;
      max-width: 500px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.8);
      text-align: center;
      display: none;
      z-index: 1000;
      border: 2px solid #007bff;
      animation: popupIn 0.5s forwards;
    }

    #popup h2 {
      font-size: 26px;
      margin-bottom: 20px;
      color: #00d1ff;
      text-transform: uppercase;
    }

    #popup p {
      font-size: 18px;
      margin-bottom: 20px;
      color: #ccc;
    }

    #popup ul {
      list-style: none;
      text-align: left;
      margin-bottom: 20px;
      padding: 0;
    }
    
    #popup ul li {
      background: #2a2a2a;
      margin: 8px 0;
      padding: 12px;
      border-radius: 6px;
      font-size: 16px;
      color: #ddd;
    }

    #popup button {
      background: #007bff;
      color: #fff;
      padding: 12px 25px;
      border: none;
      border-radius: 6px;
      font-size: 18px;
      cursor: pointer;
      transition: background 0.3s, transform 0.3s;
    }
    
    #popup button:hover {
      background: #0056b3;
      transform: scale(1.05);
    }

    @keyframes popupIn {
      from {
        opacity: 0;
        transform: translate(-50%, -50%) scale(0.8);
      }
      to {
        opacity: 1;
        transform: translate(-50%, -50%) scale(1);
      }
    }
 </style>
</head>
<body>
<button class="botao-voltar" onclick="window.location.href='paginadestino.php'">Voltar</button>
 
  <div class="container">
    <h1>Calculadora de IMC</h1>
    <input type="number" id="peso" placeholder="Peso (kg)">
    <input type="number" id="altura" placeholder="Altura (m)">
    <button id="calcular">Calcular IMC</button>
    <div id="resultado"></div>
  </div>

  <!-- Overlay e Popup atualizados -->
  <div id="overlay"></div>
  <div id="popup">
    <h2>Recomendações</h2>
    <div id="mensagem"></div>
    <button onclick="fecharPopup()">Fechar</button>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      document.getElementById("calcular").addEventListener("click", function () {
        const peso = parseFloat(document.getElementById("peso").value);
        const altura = parseFloat(document.getElementById("altura").value);
        const resultadoContainer = document.getElementById("resultado");
        const mensagemContainer = document.getElementById("mensagem");

        if (isNaN(peso) || isNaN(altura) || altura <= 0 || peso <= 0) {
          resultadoContainer.innerHTML = "<p class='error'>Por favor, insira valores válidos.</p>";
          mensagemContainer.innerHTML = "";
          return;
        }

        const imc = peso / (altura * altura);
        let classificacao = "";
        let mensagem = "";

        if (imc < 18.5) {
          classificacao = "Abaixo do peso";
          mensagem = `
            <ul>
              <li>Consuma mais calorias com alimentos nutritivos.</li>
              <li>Evite alimentos processados e açucarados.</li>
              <li>Faça refeições frequentes e balanceadas.</li>
            </ul>
            <strong>Recomendação médica:</strong>
            <p>Consulte um profissional para avaliar possíveis deficiências nutricionais.</p>`;
        } else if (imc < 25) {
          classificacao = "Peso saudável";
          mensagem = `
            <ul>
              <li>Mantenha uma alimentação equilibrada.</li>
              <li>Pratique exercícios regularmente.</li>
              <li>Evite alimentos ultraprocessados.</li>
            </ul>
            <strong>Recomendação médica:</strong>
            <p>Faça exames regulares para monitorar sua saúde.</p>`;
        } else if (imc < 30) {
          classificacao = "Sobrepeso";
          mensagem = `
            <ul>
              <li>Reduza carboidratos simples e controle porções.</li>
              <li>Pratique atividade física regularmente.</li>
              <li>Aumente o consumo de fibras e proteínas.</li>
            </ul>
            <strong>Recomendação médica:</strong>
            <p>Consulte um especialista para estratégias de controle de peso.</p>`;
        } else if (imc < 35) {
          classificacao = "Obesidade grau 1";
          mensagem = `
            <ul>
              <li>Adote uma dieta balanceada e reduza calorias gradualmente.</li>
              <li>Realize atividades físicas adaptadas à sua condição.</li>
              <li>Busque apoio psicológico se necessário.</li>
            </ul>
            <strong>Recomendação médica:</strong>
            <p>Um acompanhamento médico é essencial para evitar complicações.</p>`;
        } else if (imc < 40) {
          classificacao = "Obesidade grau 2";
          mensagem = `
            <ul>
              <li>Controle rigoroso da alimentação com acompanhamento nutricional.</li>
              <li>Pratique exercícios leves e de baixo impacto.</li>
              <li>Considere acompanhamento psicológico e multidisciplinar.</li>
            </ul>
            <strong>Recomendação médica:</strong>
            <p>O acompanhamento profissional é altamente recomendado.</p>`;
        } else {
          classificacao = "Obesidade grau 3";
          mensagem = `
            <ul>
              <li>Procure orientação médica para avaliar tratamentos específicos.</li>
              <li>Opte por uma dieta rigorosamente balanceada e atividade física supervisionada.</li>
              <li>Considere acompanhamento psicológico para controle da alimentação emocional.</li>
            </ul>
            <strong>Recomendação médica:</strong>
            <p>O tratamento especializado é altamente recomendado.</p>`;
        }

        resultadoContainer.innerHTML = `
          <p>Seu IMC é: <strong>${imc.toFixed(2)}</strong></p>
          <p>Classificação: <strong>${classificacao}</strong></p>`;
        mensagemContainer.innerHTML = mensagem;

        mostrarPopup();
      });
    });

    function mostrarPopup() {
      document.getElementById("overlay").style.display = "block";
      document.getElementById("popup").style.display = "block";
    }

    function fecharPopup() {
      document.getElementById("overlay").style.display = "none";
      document.getElementById("popup").style.display = "none";
    }
  </script>
</body>
