<?php
include_once ("header.php")
?>
<head>
  <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    color: #333;
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
  }
  .container {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    width: 100%;
    max-width: 450px;
    text-align: center;

    display: flex;
    flex-direction: column;
    align-items: stretch;
  }
  .container h1 {
    font-size: 28px;
    margin-bottom: 20px;
    color: #1e3c72;
  }
  .container label {
    display: block;
    margin: 12px 0 6px;
    font-weight: bold;
    color: #333;
    text-align: left;
  }
  .container input, .container select, .container button {
    width: 100%;
    padding: 12px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s;
  }
  .container input:focus, .container select:focus {
    border-color: #1e3c72;
    outline: none;
  }
  .container button {
    border: none;
    background: #1e3c72;
    color: #fff;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
  }
  .container button:hover {
    background: #162a56;
    transform: scale(1.02);
  }
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    display: none;
    z-index: 998;
  }
  .popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #ffffff;
    padding: 25px 30px;
    border-radius: 12px;
    width: 90%;
    max-width: 450px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    text-align: center;
    display: none;
    z-index: 999;
  }
  .popup h2 {
    font-size: 22px;
    margin-bottom: 15px;
    color: #1e3c72;
  }
  .popup p {
    font-size: 16px;
    margin-bottom: 15px;
    color: #555;
  }
  .popup ul {
    list-style: none;
    text-align: left;
    margin: 0;
    padding: 0;
  }
  .popup ul li {
    background: #f8f9fa;
    padding: 8px;
    margin: 5px 0;
    border-radius: 6px;
    font-size: 15px;
    color: #333;
  }
  .popup button {
    margin-top: 15px;
    padding: 10px 20px;
    background: #1e3c72;
    color: #fff;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s;
  }
  .popup button:hover {
    background: #162a56;
  }
  @media (max-width: 480px) {
    .container, .popup {
      padding: 20px;
    }
    .container h1 {
      font-size: 24px;
    }
    .container button, .popup button {
      font-size: 16px;
    }
  }
  </style>
</head>
<body>
<button class="botao-voltar" onclick="window.location.href='paginadestino.php'">Voltar</button>
  <div class="container">
    <h1>Calculadora de TMB</h1>
    <label for="sexo">Sexo:</label>
    <select id="sexo">
      <option value="homem">Homem</option>
      <option value="mulher">Mulher</option>
    </select>
    
    <label for="peso">Peso (kg):</label>
    <input type="number" id="peso" placeholder="Ex: 70" step="0.1">

    <label for="altura">Altura (cm):</label>
    <input type="number" id="altura" placeholder="Ex: 175" step="0.1">

    <label for="idade">Idade (anos):</label>
    <input type="number" id="idade" placeholder="Ex: 30">

    <button id="calcular">Calcular TMB</button>
  </div>

  <div class="overlay" id="overlay"></div>
  <div class="popup" id="popup">
    <div id="resultado"></div>
    <button id="fecharPopup">Fechar</button>
  </div>

  <script>
    document.getElementById("calcular").addEventListener("click", function() {
      var sexo = document.getElementById("sexo").value;
      var peso = parseFloat(document.getElementById("peso").value);
      var altura = parseFloat(document.getElementById("altura").value);
      var idade = parseFloat(document.getElementById("idade").value);
      var resultadoContainer = document.getElementById("resultado");

      if (isNaN(peso) || isNaN(altura) || isNaN(idade) || peso <= 0 || altura <= 0 || idade <= 0) {
        resultadoContainer.innerHTML = "<p style='color: red;'>Por favor, insira valores válidos.</p>";
        mostrarPopup();
        return;
      }

      var tmb = 0;
      if (sexo === "homem") {
        tmb = 66.5 + (13.75 * peso) + (5.003 * altura) - (6.755 * idade);
      } else {
        tmb = 655.1 + (9.563 * peso) + (1.850 * altura) - (4.676 * idade);
      }

      resultadoContainer.innerHTML = "<h2>Seu TMB é: " + tmb.toFixed(2) + " kcal/dia</h2>";
      mostrarPopup();
    });

    document.getElementById("fecharPopup").addEventListener("click", fecharPopup);
    document.getElementById("overlay").addEventListener("click", fecharPopup);

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

