<?php
include_once("header.php")
?>

<section id="calculadora-section">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    * {
      box-sizing: border-box;
    }

    @keyframes gradientAnimation {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @keyframes fadeSlide {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    #calculadora-section {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #dff1ff, #fef6ff);
      background-size: 400% 400%;
      animation: gradientAnimation 15s ease infinite;
      padding: 50px 20px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .containers {
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      justify-content: center;
    }

    .calc-container {
      background: #ffffff;
      padding: 30px;
      border-radius: 24px;
      box-shadow: 10px 10px 30px rgba(0, 0, 0, 0.08),
                  -10px -10px 30px rgba(255, 255, 255, 0.7);
      width: 320px;
      display: flex;
      flex-direction: column;
      align-items: center;
      opacity: 0;
      transform: translateY(20px);
      animation: fadeSlide 0.8s forwards;
      animation-delay: 0.3s;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .calc-container:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .calc-container h2 {
      margin-bottom: 20px;
      font-size: 26px;
      color: #333;
      position: relative;
    }

    .calc-container h2::after {
      content: '';
      width: 50px;
      height: 4px;
      background: #7f5af0;
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      border-radius: 2px;
    }

    .calc-button {
      width: 100%;
      padding: 14px;
      font-size: 16px;
      margin: 10px 0;
      border: none;
      border-radius: 12px;
      background-color: #7f5af0;
      color: white;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
    }

    .calc-button:hover {
      background-color: #6540c7;
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(118, 90, 240, 0.3);
    }

    @media (max-width: 480px) {
      .calc-container {
        width: 100%;
      }
    }
  </style>

  <div class="containers">
    <div class="calc-container" id="adulto">
      <h2>Adulto</h2>
      <button class="calc-button" onclick="window.location.href='imcadulto.php'">IMC</button>
      <button class="calc-button" onclick="window.location.href='pesoideal.php'">Peso Ideal</button>
      <button class="calc-button" onclick="window.location.href='tmbadulto.php'">Taxa de Metabolismo Basal</button>
    </div>

    <div class="calc-container" id="crianca">
      <h2>Criança</h2>
      <button class="calc-button" onclick="window.location.href='imccrianca.php'">IMC</button>
      <button class="calc-button" onclick="window.location.href='pesoideal.php'">Peso Ideal</button>
      <button class="calc-button" onclick="window.location.href='tmbcrianca.php'">Taxa de Metabolismo Basal</button>
    </div>
  </div>
</section>

<?php
include_once("footer.php")
?>
