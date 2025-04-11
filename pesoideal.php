<?php
include_once ("header.php")
?>
<head>
  <meta charset="UTF-8">
  <title>Calculadora de Peso Ideal</title>
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

    .container input[type="number"],
    .container select {
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 16px;
      transition: border-color 0.3s;
    }

    .container input[type="number"]:focus,
    .container select:focus {
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
      font-size: 20px;
      font-weight: bold;
      color: #1e3c72;
    }

    @media (max-width: 480px) {
      .container {
        padding: 20px;
      }

      .container h1 {
        font-size: 24px;
      }

      .container button {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
<button class="botao-voltar" onclick="window.location.href='paginadestino.php'">Voltar</button>
  <div class="container">
    <h1>Calculadora de Peso Ideal</h1>
    <form method="post" action="">
      <label for="sexo">Sexo:</label>
      <select name="sexo" id="sexo" required>
        <option value="">Selecione</option>
        <option value="masculino" <?= (isset($_POST['sexo']) && $_POST['sexo'] == 'masculino') ? 'selected' : '' ?>>Masculino</option>
        <option value="feminino" <?= (isset($_POST['sexo']) && $_POST['sexo'] == 'feminino') ? 'selected' : '' ?>>Feminino</option>
      </select>

      <label for="altura">Altura (em cm):</label>
      <input type="number" id="altura" name="altura" value="<?= isset($_POST['altura']) ? htmlspecialchars($_POST['altura']) : '' ?>" required>

      <button type="submit">Calcular Peso Ideal</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sexo = $_POST["sexo"];
        $altura = floatval($_POST["altura"]);
        $pesoIdeal = null;

        if ($sexo === "masculino") {
            $pesoIdeal = 50 + (0.91 * ($altura - 152.4));
        } elseif ($sexo === "feminino") {
            $pesoIdeal = 45.5 + (0.91 * ($altura - 152.4));
        }

        if ($pesoIdeal !== null) {
            echo "<div class='resultado'>Peso ideal estimado: " . number_format($pesoIdeal, 2, ',', '.') . " kg</div>";
        }
    }
    ?>
  </div>
</body>
