<?php
include_once("header.php")
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Calculadora de TMB Infantil</title>
  <style>
    /* (CSS exatamente igual ao original) */
    * { margin: 0; padding: 0; box-sizing: border-box; }
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
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #1e3c72, #2a5298);
      color: #fff;
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
    .container input, .container select {
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      background-color: #fff;
      color: #333;
    }
    .container input:focus, .container select:focus {
      border-color: #1e3c72;
      outline: none;
    }
    .container button {
      width: 100%;
      padding: 14px;
      margin-top: 20px;
      border: none;
      border-radius: 8px;
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
    .resultado {
      margin-top: 20px;
      font-size: 18px;
      color: #1e3c72;
      font-weight: bold;
    }
    @media (max-width: 480px) {
      .container { padding: 20px; }
      .container h1 { font-size: 24px; }
      .container button { font-size: 16px; }
      .resultado { font-size: 16px; }
    }
  </style>
</head>
<body>
<button class="botao-voltar" onclick="window.location.href='paginadestino.php'">Voltar</button>
  <div class="container">
    <h1>Calculadora de TMB Infantil</h1>

    <form method="POST">
      <label for="idade">Idade (anos):</label>
      <input type="number" id="idade" name="idade" min="0" step="1" required>

      <label for="peso">Peso (kg):</label>
      <input type="number" id="peso" name="peso" min="0" step="0.1" required>

      <label for="sexo">Sexo:</label>
      <select id="sexo" name="sexo">
        <option value="masculino">Masculino</option>
        <option value="feminino">Feminino</option>
      </select>

      <button type="submit" name="calcular">Calcular TMB</button>
    </form>

    <div class="resultado">
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["calcular"])) {
          $idade = floatval($_POST["idade"]);
          $peso = floatval($_POST["peso"]);
          $sexo = $_POST["sexo"];

          if ($idade <= 0 || $peso <= 0) {
            echo "Por favor, preencha todos os campos corretamente.";
          } elseif ($idade > 16) {
            echo "Esta calculadora é apenas para menores de 16 anos.";
          } else {
            $tmb = 0;

            if ($idade < 3) {
              $tmb = (58.317 * $peso) - 31.1;
            } elseif ($idade < 10) {
              if ($sexo === "masculino") {
                $tmb = 22.7 * $peso + 495 + 12.4 * $idade - 266;
              } else {
                $tmb = 22.5 * $peso + 499 + 5.9 * $idade - 266;
              }
            } else {
              if ($sexo === "masculino") {
                $tmb = 17.5 * $peso + 651;
              } else {
                $tmb = 12.2 * $peso + 746;
              }
            }

            echo "TMB estimado: " . number_format($tmb, 2, ',', '.') . " kcal/dia";
          }
        }
      ?>
    </div>
  </div>
</body>
</html>