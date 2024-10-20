<?php
    session_start();
    // Connexion a la base de donnée et aux fichier
    include 'db.php';
    // include 'config/session/img-profile.php';
    $_SESSION["user_id"] = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
    <link rel="shorcut icon" href="images/weeble.webp">
    <title>Weeble</title>
</head>
<body>

    <div id="mode-selector">
    <h2>Choisissez votre mode</h2>
    <div class="mode-option">
        <input type="radio" id="light" name="mode" value="light">
        <label for="light">Mode clair</label>
    </div>
    <div class="mode-option">
        <input type="radio" id="dark" name="mode" value="dark">
        <label for="dark">Mode sombre</label>
    </div>
    <button id="confirm-btn">Confirmer</button>
    </div>
    
    <section id="sec1" class="sec_content">
        <div id="content_menu">
            <i class="fa-solid fa-bars" id="menu_bar"></i>
        </div>
        <div id="contentconnexion">
            <?php if (isset($_SESSION['username'])): ?>
                <?php if ($_SESSION['role'] == ''): ?>
                    <li class="code"><a class="connexion" target="_blank" href="">Admin Page</a></li>
                <?php endif; ?>
                <li class="code"><a class="connexion" href="logout.php" title="Se deconecter">Déconnexion</a></li>
            <?php else: ?>
                <li class="code"><a class="connexion" href="login-regiters.php" title="Connexion / Inscription">Connexion</a></li>
            <?php endif; ?>
        </div>
        <div id="name">
            <h1>Weeble</h1>
        </div>
        <div id="content_bar_search">
            <form action="" method="get" target="_blank">
                <input type="text"  name="query" placeholder="Surfer sur le web ...">
                <button type="sumbit" id="loupe1">Q</button>
                <button type="reset" id="loupe2">X</button>
            </form>
        </div>
        <section id="contentcase-ex">
        <div id="contentcase">
            <div class="content-interieur">
                <a id="a1" href="https://www.hostinger.fr" target="_blank"></a>
                <a id="a2" href="https://copilot.microsoft.com" target="_blank"></a>
                <a id="a3" href="https://discord.com" target="_blank"></a>
                <a id="a4" href="https://open.spotify.com/intl-fr" target="_blank"></a>
            </div>
            <div class="content-interieur">
                <a id="a5" href="https://odoo.com" target="_blank"></a>
                <a id="a6" href="https://www.opera.com/fr" target="_blank"></a>
                <a id="a7" href=""></a>
                <a id="a8" href=""></a>
            </div>
        </div>
        </section>
    <div class="popup" id="popup">
        <p>Une nouvel mise ajour est arrivée qu'attends-tu
        <a href="miseajour/misejour.html" target="_blank" rel="noopener noreferrer">Voir plus <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
        </p>
        <button class="close-btn" onclick="closePopup()">✖</button>
    </div>
    </section>
    <section id="sec2" class="sec_content">
        <div id="bar">
        <?php if (isset($_SESSION['username'])): ?>
            <?php
            $profileImage = getProfileImage($bdd, $_SESSION['username']);
            ?>
            <a href="mon_compte/compte.php" target="_blank" id="pp" style="background-image: url(<?php echo htmlspecialchars($profileImage); ?>);"></a>
        <?php else: ?>
            <a href="login-regiters.php" target="" method="get" id="pp"><i class="fa-solid fa-user" id=""></i></a>
        <?php endif; ?>
            <a href="Protection/shild.html" target="_blank"><i class="fa-solid fa-shield-halved" id=""></i></a>
            <!-- <a href="Awi/Awi.html" target="_blank"><img src="images/Awi.png"></a> -->
        </div>
    </section>
    <!-- <div id="modal-pop-up">
        <div id="modal-pop-upinter">
            <div id="pop-up-icon">
                <img src="images/boite-a-cookies.png">
            </div>
            <div id="pop-up-text">
                <h2>Accepter les cookies</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, iste ab. Reiciendis natus aut dolorem 
                   molestiae officiis, quam facere quasi est impedit neque, rerum voluptatibus voluptas officia? Odio
                   corporis, maxime nam sequi deleniti voluptate voluptatum ipsum!</p>
                <span>Attends lit le texte si dessus !</span>
            </div>
            <div id="reponse-pop-up">
                <button id="btn-pop-up-2">Personaliser</button>
                <button id="btn-pop-up-1">Accepter les cookies</button>
            </div>
        </div>
        <div id="cookie">
            <div id="content-choix">
                <h2>Choisissez vos cookies !</h2>
                <p>Attention ce choix sera définitif.</p>
            </div>
            <ul>
                <li><p></p><input type="checkbox" name="" id=""></li>
                <li><p></p><input type="checkbox" name="" id=""></li>
                <li><p></p><input type="checkbox" name="" id=""></li>
                <li><p></p><input type="checkbox" name="" id=""></li>
                <li><p></p><input type="checkbox" name="" id=""></li>
            </ul>
            <div id="reponse-pop-up">
                <button id="btn-pop-up-3">Retour</button>
                <button id="btn-pop-up-4">Confirmer votre séléction</button>
            </div>
        </div>
    </div> -->
</body>
<script>
            function closePopup() {
            var popup = document.getElementById('popup');
            popup.classList.add('hide');
            
            setTimeout(function() {
                popup.style.display = 'none';
            }, 2000);
        }
  // Fonction pour vérifier si l'utilisateur a déjà choisi un mode (localStorage ou base de données)
  function checkUserPreference() {
    const userMode = localStorage.getItem('userMode');

    if (userMode) {
      // Si une préférence existe dans le localStorage, ajouter la classe correspondante
      document.body.classList.add(userMode);
      return true;
    }

    // Vérification simulée dans la base de données via PHP
    const phpUserMode = '<?php echo isset($userModeFromDB) ? $userModeFromDB : null; ?>';

    if (phpUserMode) {
      // Si une préférence existe en base de données, ajouter la classe correspondante
      document.body.classList.add(phpUserMode);
      return true;
    }

    return false;
  }

  // Fonction pour afficher l'animation après 2 secondes
  function showModeSelector() {
    const modeSelector = document.getElementById('mode-selector');
    const overlay = document.getElementById('overlay');
    setTimeout(() => {
      modeSelector.classList.add('show'); // Afficher l'élément
      overlay.classList.add('show'); // Montrer l'overlay
    }, 2000); // Attente de 2 secondes avant l'affichage
  }

  // Fonction pour masquer l'animation (en la faisant partir à droite)
  function hideModeSelector() {
    const modeSelector = document.getElementById('mode-selector');
    const overlay = document.getElementById('overlay');
    modeSelector.classList.add('hide'); // Masquer l'élément en le faisant partir vers la droite
    overlay.classList.remove('show'); // Masquer l'overlay
  }

  // Vérification au chargement de la page
  window.onload = function() {
    const hasPreference = checkUserPreference();
    if (!hasPreference) {
      showModeSelector();
    }
  };

  // Gestion du clic sur le bouton "Confirmer"
  document.getElementById('confirm-btn').addEventListener('click', function() {
    const selectedMode = document.querySelector('input[name="mode"]:checked');
    if (selectedMode) {
      const userMode = selectedMode.value;

      // Retirer les classes existantes
      document.body.classList.remove('light', 'dark');

      // Ajouter la classe correspondant au mode choisi
      document.body.classList.add(userMode);

      // Enregistrer dans le localStorage
      localStorage.setItem('userMode', userMode);

      // Simuler l'enregistrement en base de données via PHP (en pratique, utiliser une requête Ajax)
      // $.post('save_mode.php', { mode: userMode });

      // Faire disparaître l'animation (partir vers la droite)
      hideModeSelector();

      // Retarder légèrement la disparition pour permettre à l'animation de se terminer
      setTimeout(() => {
        document.getElementById('mode-selector').style.display = 'none';
      }, 700); // Temps d'attente équivalent à la transition CSS (0.7s)
    }
  });
</script>
<script src="script.js"></script>
</html>