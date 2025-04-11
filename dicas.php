<?php
include_once("header.php")
?>

<head>
  <title>Dicas de Nutrição - FAQ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

    body {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
      background: #f9f9f9;
    }

    .nx-faq-section {
      width: 100%;
      padding: 60px 20px;
      background: linear-gradient(135deg, #ffffff, #f2f2f2);
    }

    .nx-faq-main {
      max-width: 1200px;
      margin: 0 auto;
      padding: 40px;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.08);
    }

    .nx-faq-title {
      font-size: 36px;
      color: #4CAF50;
      margin-bottom: 30px;
      text-align: center;
    }

    .nx-faq-block {
      margin-bottom: 20px;
      border-bottom: 1px solid #e0e0e0;
      padding: 15px 0;
      transition: background-color 0.3s ease;
    }

    .nx-faq-block:hover {
      background-color: #fcfcfc;
    }

    .nx-faq-question {
      font-size: 20px;
      font-weight: 600;
      color: #388e3c;
      cursor: pointer;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .nx-faq-question i {
      font-size: 18px;
      transition: transform 0.3s ease;
    }

    .nx-faq-answer {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.4s ease, opacity 0.4s ease;
      opacity: 0;
      margin-top: 0;
    }

    .nx-faq-answer.open {
      opacity: 1;
      margin-top: 15px;
    }

    /* Responsividade */
    @media (max-width: 520px) {
      .nx-faq-title {
        font-size: 28px;
      }
      .nx-faq-question {
        font-size: 18px;
      }
      .nx-faq-answer {
        font-size: 14px;
      }
      .nx-faq-main {
        padding: 20px;
      }
    }

    @media (min-width: 521px) and (max-width: 1024px) {
      .nx-faq-main {
        padding: 30px;
      }
      .nx-faq-title {
        font-size: 32px;
      }
      .nx-faq-question {
        font-size: 19px;
      }
      .nx-faq-answer {
        font-size: 15px;
      }
    }
  </style>
</head>

<body>
  <section class="nx-faq-section">
    <div class="nx-faq-main">
      <h2 class="nx-faq-title">Dicas Essenciais de Nutrição</h2>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          🍽️ Como montar uma alimentação equilibrada?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Combine carboidratos complexos (como aveia e batata-doce), proteínas magras (frango, ovos, peixe) e gorduras boas (abacate, azeite, oleaginosas). Varie os vegetais e frutas ao máximo para garantir todos os nutrientes essenciais.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          💧 Quanto de água devo beber por dia?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Em média, 35 ml de água por quilo de peso corporal. Por exemplo, uma pessoa com 70 kg deve beber cerca de 2,5 litros. Use garrafinhas ou lembretes para se manter hidratado durante o dia.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          ⏰ De quanto em quanto tempo devo comer?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Refeições a cada 3 a 4 horas ajudam a manter energia estável e evitar compulsões. O ideal é distribuir de 4 a 6 refeições ao longo do dia, começando pelo café da manhã.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          ⚖️ Como controlar as porções?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Use o método do “prato ideal”: metade do prato com vegetais, 1/4 com proteína e 1/4 com carboidrato. Evite repetir pratos e coma devagar para perceber a saciedade natural.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          🚫 Quais alimentos devo evitar no dia a dia?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Fique longe de alimentos ultraprocessados, com muitos conservantes, açúcares escondidos, frituras, refrigerantes e embutidos. Prefira sempre versões caseiras e naturais.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          📋 Como ler rótulos nutricionais corretamente?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Veja os ingredientes em ordem: os primeiros são os mais abundantes. Evite produtos que comecem com açúcar, xarope ou gordura hidrogenada. Priorize os com poucos ingredientes e sem nomes estranhos.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          🧠 Alimentação afeta a saúde mental?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Sim! Alimentos ricos em ômega-3, magnésio e triptofano ajudam na produção de serotonina e regulam o humor. Reduza alimentos inflamatórios como açúcar refinado e excesso de cafeína.</p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          🏋️ O que comer antes e depois do treino?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>
            <strong>Antes:</strong> banana, aveia, ou pão integral com ovo (energia e proteína leve).<br>
            <strong>Depois:</strong> frango com batata-doce, shake com proteína e fruta — foco em reconstrução muscular.
          </p>
        </div>
      </div>

      <div class="nx-faq-block">
        <div class="nx-faq-question">
          🎯 Como obter um plano alimentar personalizado?
          <i class="fa-solid fa-chevron-down"></i>
        </div>
        <div class="nx-faq-answer">
          <p>Um nutricionista pode montar um plano de acordo com seus objetivos, preferências e exames. Mas podemos ajudar com modelos iniciais — entre em contato ou use nossas ferramentas para começar!</p>
        </div>
      </div>

    </div>
  </section>

  <script>
    // Script para fazer o efeito de acordeão
    const faqQuestions = document.querySelectorAll('.nx-faq-question');

    faqQuestions.forEach(question => {
      question.addEventListener('click', () => {
        const answer = question.nextElementSibling;
        const icon = question.querySelector('i');

        // Alterna a classe 'open' para animar a resposta
        if (answer.classList.contains('open')) {
          answer.style.maxHeight = null;
          answer.classList.remove('open');
          icon.style.transform = 'rotate(0deg)';
        } else {
          answer.classList.add('open');
          answer.style.maxHeight = answer.scrollHeight + "px";
          icon.style.transform = 'rotate(180deg)';
        }
      });
    });
  </script>
</body>

<?php
include_once("footer.php")
?>
