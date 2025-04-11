<?php
include_once ("header.php")
?>
<?php
$resultado = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idade = isset($_POST['idade']) ? (int)$_POST['idade'] : 0;
    $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
    $peso = isset($_POST['peso']) ? (float)$_POST['peso'] : 0;
    $altura = isset($_POST['altura']) ? (float)$_POST['altura'] : 0;

    if ($idade > 0 && $peso > 0 && $altura > 0 && in_array($sexo, ['masculino', 'feminino'])) {
        $imc = $peso / ($altura * $altura);

        if ($imc < 14) {
            $percentil = 3;
        } elseif ($imc >= 14 && $imc < 17) {
            $percentil = 50;
        } elseif ($imc >= 17 && $imc < 19) {
            $percentil = 90;
        } else {
            $percentil = 97;
        }

 
        if ($percentil < 5) {
            $classificacao = "Baixo peso";
        } elseif ($percentil >= 5 && $percentil < 85) {
            $classificacao = "Peso saudável";
        } elseif ($percentil >= 85 && $percentil < 95) {
            $classificacao = "Sobrepeso";
        } else {
            $classificacao = "Obesidade";
        }

        $resultado = "
            <div class='popup' id='popup'>
                <h2>Resultado</h2>
                <p><strong>IMC:</strong> " . number_format($imc, 2, ',', '.') . "</p>
                <p><strong>Percentil estimado:</strong> {$percentil}°</p>
                <p><strong>Classificação:</strong> {$classificacao}</p>
                <button onclick='fecharPopup()'>Fechar</button>
            </div>
            <div class='overlay' id='overlay' onclick='fecharPopup()'></div>
            <script>
                document.getElementById('popup').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            </script>
        ";
    } else {
        $resultado = "
            <div class='popup' id='popup'>
                <p class='error'>Por favor, insira todos os dados corretamente.</p>
                <button onclick='fecharPopup()'>Fechar</button>
            </div>
            <div class='overlay' id='overlay' onclick='fecharPopup()'></div>
            <script>
                document.getElementById('popup').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Calculadora de IMC Infantil</title>
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
  

  .container input[type="number"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
    transition: border-color 0.3s;
  }
  
  .container input[type="number"]:focus {
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


  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.85);
    display: none;
    z-index: 999;
  }
  

  .popup {
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
  

  .popup h2 {
    font-size: 26px;
    margin-bottom: 20px;
    color: #00d1ff;
    text-transform: uppercase;
  }
  
  .container select {
  width: 100%;
  padding: 12px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  transition: border-color 0.3s;
  background-color: #fff;
  color: #333;
}

.container select:focus {
  border-color: #1e3c72;
  outline: none;
}

  .popup p {
    font-size: 18px;
    margin-bottom: 20px;
    color: #ccc;
  }

  .popup ul {
    list-style: none;
    text-align: left;
    margin-bottom: 20px;
    padding: 0;
  }
  
  .popup ul li {
    background: #2a2a2a;
    margin: 8px 0;
    padding: 12px;
    border-radius: 6px;
    font-size: 16px;
    color: #ddd;
  }
  

  .popup button {
    background: #007bff;
    color: #fff;
    padding: 12px 25px;
    border: none;
    border-radius: 6px;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s, transform 0.3s;
  }
  
  .popup button:hover {
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

  @media (max-width: 480px) {
    .popup {
      padding: 20px;
    }
    .popup h2 {
      font-size: 22px;
    }
    .popup p {
      font-size: 16px;
    }
    .popup button {
      font-size: 16px;
    }
  }
    </style>
</head>
<body>
<button class="botao-voltar" onclick="window.location.href='paginadestino.php'">Voltar</button>
    <div class="container">
        <div class="form-container">
            <h1>IMC Infantil</h1>
            <form method="post" action="">
                <label for="idade">Idade (anos):</label>
                <input type="number" name="idade" id="idade" placeholder="Ex: 7" required />

                <label for="sexo">Sexo:</label>
                <select name="sexo" id="sexo" required>
                    <option value="">Selecione</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select>

                <label for="peso">Peso (kg):</label>
                <input type="number" name="peso" id="peso" placeholder="Ex: 25" step="0.1" required />

                <label for="altura">Altura (m):</label>
                <input type="number" name="altura" id="altura" placeholder="Ex: 1.20" step="0.01" required />

                <button type="submit">Calcular IMC</button>
            </form>
        </div>
    </div>

    <?php echo $resultado; ?>

    <script>
        function fecharPopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>
</body>
