<?php
include_once("header.php")
?>

<head>
  <title>Nutrition X</title>
  <!-- Importando fontes modernas -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Importa o Font Awesome para ícones, se desejado -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: linear-gradient(135deg, #fefefe, #f2f2f2);
      overflow-x: hidden;
    }

    .nx-section-wrapper {
      width: 100%;
      padding: 60px 20px;
      background: #ffffff;
      position: relative;
    }
    
    /* Exemplo de efeito parallax simples para o banner */
    .nx-banner-container {
      overflow: hidden;
      border-radius: 8px;
      margin-bottom: 20px;
      position: relative;
    }

    .nx-banner-img {
      width: 100%;
      display: block;
      transform: scale(1.05); /* Simula um leve zoom */
      transition: transform 0.5s ease;
    }

    .nx-banner-container:hover .nx-banner-img {
      transform: scale(1.1);
    }

    .nx-main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px;
      background: #ffffff;
      border-radius: 8px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
      opacity: 0;
      transform: translateY(20px);
      animation: fadeIn 1s forwards;
      animation-delay: 0.3s;
    }

    @keyframes fadeIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .nx-title {
      font-size: 40px;
      color: #4CAF50;
      margin-bottom: 20px;
      text-align: center;
    }

    .nx-text {
      font-size: 16px;
      color: #666666;
      margin-bottom: 20px;
      line-height: 1.6;
      text-align: justify;
    }

    .nx-btn {
      display: inline-block;
      background-color: #4CAF50;
      color: #ffffff;
      padding: 12px 24px;
      font-size: 18px;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .nx-btn:hover {
      background-color: #45a049;
      transform: scale(1.05);
      box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }

    .nx-link {
      color: #4CAF50;
      text-decoration: underline;
      transition: color 0.3s ease;
    }

    .nx-link:hover {
      color: #388e3c;
    }

    /* Responsividade - Celulares */
    @media (max-width: 520px) {
      .nx-section-wrapper {
        padding: 30px 10px;
      }

      .nx-main {
        padding: 20px;
      }

      .nx-title {
        font-size: 28px;
      }

      .nx-text {
        font-size: 14px;
      }

      .nx-btn {
        font-size: 16px;
        padding: 10px 15px;
      }
    }

    /* Responsividade - Tablets */
    @media (min-width: 521px) and (max-width: 1024px) {
      .nx-section-wrapper {
        padding: 40px 15px;
      }

      .nx-main {
        padding: 30px;
      }

      .nx-title {
        font-size: 34px;
      }

      .nx-text {
        font-size: 15px;
      }

      .nx-btn {
        font-size: 17px;
        padding: 10px 18px;
      }
    }
  </style>
</head>
<body>
  <section class="nx-section-wrapper">
    <main class="nx-main">
      <div class="nx-banner-container">
        <img src="banner1.png" alt="Imagem de Bem-Estar e Saúde" class="nx-banner-img">
      </div>

      <h2 class="nx-title">Bem-vindo à Nutrition X</h2>

      <p class="nx-text">
        Nosso objetivo é ajudar você a alcançar um estilo de vida saudável através de cálculos nutricionais e orientações personalizadas.
        Ter um corpo saudável é fundamental para viver melhor e aproveitar a vida ao máximo. Um corpo saudável ajuda a prevenir doenças,
        melhora a qualidade do sono, aumenta a disposição e fortalece a autoestima.
      </p>

      <p class="nx-text">
        Para alcançar um corpo saudável, é necessário adotar uma alimentação balanceada, praticar exercícios regularmente e cuidar da sua saúde mental.
        Além disso, é importante conhecer seu corpo e suas necessidades nutricionais.
      </p>

      <div style="text-align: center;">
        <a href="paginadestino.php" class="nx-btn"><i class="fa-solid fa-calculator"></i> Acesse as Calculadoras</a>
      </div>

      <p class="nx-text" style="text-align: center;">
        Quer saber mais? Leia sobre como manter um estilo de vida saudável em 
        <a href="#" target="_blank" class="nx-link">dicas práticas</a> e 
        <a href="#" target="_blank" class="nx-link">orientações exclusivas</a>.
      </p>
    </main>
  </section>
</body>

<?php
include_once("footer.php")
?>
