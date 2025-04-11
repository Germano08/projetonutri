<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    :root {
      --verde-principal: rgba(82, 182, 86, 0.9);
      --verde-scroll: rgba(92, 199, 96, 0.6);
      --branco: #ffffff;
      --fonte-principal: 'Arial', sans-serif;
    }

    #header-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: var(--verde-principal);
      color: var(--branco);
      z-index: 1000;
      border-radius: 0 0 12px 12px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      transition: background-color 0.3s ease;
      font-family: Arial;
    }

    #header-container.scrolled {
      background-color: var(--verde-scroll);
    }

    .header-inner {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      padding: 10px 20px;
    }
    #header-title a{
      text-decoration: none;
      color: var(--branco);
    }

    #header-title {
      font-size: 26px;
      margin: 0;
    }

    #menu-toggle {
      display: none;
      background: none;
      border: none;
      font-size: 28px;
      color: var(--branco);
      cursor: pointer;
    }

    .header-menu {
      display: flex;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .header-menu-item {
      margin-left: 20px;
    }

    .header-menu-link {
      color: var(--branco);
      text-decoration: none;
      font-size: 18px;
      transition: color 0.3s ease;
    }

    .header-menu-link:hover {
      color: #e0e0e0;
    }

  
    @media (max-width: 580px) {
      #menu-toggle {
        display: block;
      }
      #header-container {
      border-radius: 0;
    }

      .header-menu {
        position: absolute;
        top: 56px;
        left: 0;
        width: 100%;
        background-color: var(--verde-principal);
        flex-direction: column;
        display: none;
        border-radius: 0 0 12px 12px;
      }

      .header-menu.show {
        display: flex;
      }

      .header-menu-item {
        margin: 10px 0;
        text-align: center;
      }
      #header-title {
        font-size: 20px;
      }

      .header-menu-link {
        font-size: 16px;
      }
    }

    /* TABLET: entre 601px e 1024px */
    @media (min-width: 521px) and (max-width: 1024px) {
      #header-title {
        font-size: 24px;
      }

      .header-menu-link {
        font-size: 17px;
      }

      .header-inner {
        padding: 10px 30px;
      }

      .header-menu-item {
        margin-left: 15px;
      }
    }
  </style>
</head>
  <header id="header-container">
    <div class="header-inner">
      <h1 id="header-title"><a href="index.php" id="titulo">Nutrition X</a></h1>
      <button id="menu-toggle">&#9776;</button>
      <nav>
        <ul class="header-menu" id="menu">
          <li class="header-menu-item"><a href="index.php" class="header-menu-link">Início</a></li>
          <li class="header-menu-item"><a href="paginadestino.php" class="header-menu-link">Calculadoras</a></li>
          <li class="header-menu-item"><a href="dicas.php" class="header-menu-link">Dicas de Nutrição</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <br><br><br>
  <script>
    // Alternar menu no mobile
    document.getElementById('menu-toggle').addEventListener('click', function () {
      document.getElementById('menu').classList.toggle('show');
    });

    // Efeito de scroll
    window.onscroll = function () {
      const header = document.getElementById("header-container");
      if (window.pageYOffset > 50) {
        header.classList.add("scrolled");
      } else {
        header.classList.remove("scrolled");
      }
    };
  </script>

