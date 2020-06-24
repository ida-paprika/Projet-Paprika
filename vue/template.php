<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
    <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="./style-script/css/utils.css">
    <link rel="stylesheet" type="text/css" href="./style-script/css/headfoot.css">
    <link rel="stylesheet" type="text/css" href="./style-script/css/style.css">
    <link rel="stylesheet" type="text/css" href="./style-script/css/content.css">
    <title>Mon Site - <?= $titre; ?></title>
</head>
<body>

    <header>
        <div id="top"></div>
        <nav>
            <div class="user-nav">
                <?php if( $isConnect == false ): ?>
                <div class="connex-i">
                    <a href="?action=connexion"><i class="fa fa-power-off"></i><span>Login</span></a>
                </div>
                <?php else: ?>
                <div class="deco-i">
                    <a href="?action=deconnexion"><i class="fa fa-power-off"></i><span>Logout</span></a>
                </div>
                <div class="compte-i">
                    <a href="?action=compte"><i class="fa fa-user"></i><span>Compte</span></a>
                </div>
                <?php endif; ?>
                <?php if($isConnect == true && $isAdmin == true): ?>
                <div class="admin-i">
                    <a href="?action=administrateur"><i class="fa fa-cogs"></i><span>Admin</span></a>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="nav">
                <a href="?action=accueil" class="logo">
                    <img src="images/logo.png" alt="logo méduse ilo">
                </a>
                <div class="main-nav">
                    <a href="?action=accueil"><i class="fa fa-home"></i>Accueil<i class="fa fa-home"></i></a>
                    <!-- <a href="?action=fanArts">Boîte à FanArts</a> -->
                    <a href="?action=Livres"><i class="fa fa-book"></i>Livres<i class="fa fa-book"></i></a>
                    <a href="?action=Films"><i class="fa fa-film"></i>Films<i class="fa fa-film"></i></a>
                </div>
                
                <div class="drop-nav">
                <?php if( $isAdmin == true || $isMembre == true ): ?>
                    <div class="dropdown">
                        <button class="dropBtn">Espace créateur</button>
                        <div class="dropLinks">
                            <a href="?action=addLivre">Ajouter un <span>Livre</span></a>
                            <a href="?action=addFilm">Ajouter un <span>Film</span></a>
                            <!-- <a href="?action=addFanArt">Poster un <span>FanArt</span></a> -->
                        </div>
                    </div>
               
                    <?php if($isAdmin == true): ?>
                        <div class="dropdown">
                            <button class="dropBtn">Espace Administrateur</button>
                            <div class="dropLinks">
                                <a href="?action=adminUser">Gérer les <span>Utilisateurs</span></a>
                                <a href="?action=adminLivre">Gérer les <span>Livres</span></a>
                                <!-- <a href="?action=adminFilm">Gérer les <span>Films</span></a> -->
                                <a href="?action=adminGenre">Gérer les <span>Genres</span></a>
                                <!-- <a href="?action=adminComments">Gérer les <span>Commentaires</span></a> -->
                                <a href="?action=adminFanArt">Gérer les <span>FanArts</span></a>
                            </div>
                        </div>
                    <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main class="container">
        <ul id="scroll_to">
            <li><a href="#top"><i class="fa fa-arrow-circle-up"></i></a></li>
            <li><a href="#bottom"><i class="fa fa-arrow-circle-down"></i></a></li>
        </ul>

        <?= $content; ?>
        <div id="bottom"></div>
    </main>
    
    <footer>
        <nav>
            <a href="">About</a>
            <a href="">Contact</a>
        </nav>
        <p>&copy;Ilo - 2020</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
    <script src="style-script/js/carousel.js"></script>
    <script src="style-script/js/msg.js"></script>
    <script src="style-script/js/form.js"></script>
    <script src="style-script/js/accordion.js"></script>
    <script src="style-script/js/modal.js"></script>
    <script src="style-script/js/modal-user.js"></script>
    
    <?php unset($_SESSION['msg']); ?>
</body>
</html>