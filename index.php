<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


require_once 'vendor/autoload.php';
session_start();

$ctrl_user = new Ctrl\controller\Ctrl_User();
$ctrl_publi = new Ctrl\controller\Ctrl_Publication();
$ctrl_genre = new Ctrl\controller\Ctrl_Genre();
$ctrl_livre = new Ctrl\controller\Ctrl_Livre();
$ctrl_film = new Ctrl\controller\Ctrl_Film();
$ctrl_comment = new Ctrl\controller\Ctrl_Commentaire();
$ctrl_sgCom = new Ctrl\controller\Ctrl__SignalComment();

$isConnect = $ctrl_user->isConnected();
$isAdmin = $ctrl_user->isAdmin();
$isMembre = $ctrl_user->isMembre();

$allUsers = $ctrl_user->ctrl_getAllUser(); //appeler seulement dans la gestion admin
$allPubli = $ctrl_publi->ctrl_getAllPubli();
$allGenre = $ctrl_genre->ctrl_getAllGenre();
$allLivre = $ctrl_livre->ctrl_getAllLivre();
$allFilm = $ctrl_film->ctrl_getAllFilm();
$allComment = $ctrl_comment->ctrl_getAllComment();
$allSgComm = $ctrl_sgCom->ctrl_getAllSignalComm();

$allGenre_livre = $ctrl_genre->ctrl_getAllGenre_livre();




try {
    if( isset($_POST['userInscript']) ){
        
        $pseudo = $_POST['pseudo'];
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];
    /*  $errorMdp = "erreur mot de passe";
        $errorMail = "erreur mail";
        $errorPseudo = "erreur pseudo";
        $error = [$errorMdp, $errorMail, $errorPseudo];
        header('location: page.php?error=0');
        <?= isset($_GET['error'] && $_GET['error']== 0 ? $error[0] : ''; ?>
                utiliser des case et break
     */
        $msg = $ctrl_user->inscription( $_POST, $pseudo, $mail, $mdp );
        if(!empty($msg)){
            render("inscription", [
                    "isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                    "pseudo" => $pseudo, "mail" => $mail, "msg" => $msg]);
        }
    }
    elseif( isset($_POST['userConnect']) ){
        $msg = $ctrl_user->connexion( $_POST );
    }
    elseif( isset($_POST['modifier_user']) ){
        if( $_FILES['avatar']['error'] != 0 ){
            $avatar = unserialize($_SESSION['user'])->getAvatar();
        }else{
            $avatar = $_FILES['avatar'];
        }
        $ctrl_user->modifierProfil($_POST, $avatar);
    }
    elseif(isset($_GET['deleteUser']) && ctype_digit($_GET['deleteUser'])){
        $ctrl_user->ctrl_supprimer($_GET['deleteUser']);
    }
    elseif(isset($_POST['genreLivre'])){
        $livreG = $ctrl_livre->ctrl_getLivreGenre($_POST['genreLivre']);
        $test = "du blablabla";
        render("accueil",
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                     "livre" => $allLivre, "genre" => $allGenre_livre, "livreG" => $livreG ]);
    }
    elseif( isset($_POST['ajout_livre']) ){
        $img_bg = $_FILES['img_bg'];
        $img_couv = $_FILES['couverture'];
        $genre = $_POST['genre'];
        
        $ctrl_publi->ajouter_publication($_POST, $img_bg);
        $ctrl_livre->ajouter_livre($_POST, $img_couv, $genre);
    
    }
    elseif( isset($_POST['modif_livre']) || isset($_POST['gerer_livre']) ){
        if( $_FILES['img_bg']['error'] != 0 ){
            $img_bg = $_POST['img_bg'];
        }else{
            $img_bg = $_FILES['img_bg'];
        }
        if( $_FILES['couverture']['error'] != 0 ){
            $img_couv = $_POST['couverture'];
        }else{
            $img_couv = $_FILES['couverture'];
        }
        $genre = $_POST['genre'];
        $idPubli = $_POST['id_publication'];
        
        $ctrl_publi->modifier_publication($_POST, $img_bg, $idPubli);
        $ctrl_livre->modifier_livre($_POST, $img_couv, $genre);
        
        if(isset($_POST['modif_livre'])){
            header("location: index.php?action=article&art=$idPubli");
            exit;
        }else{
            header("location: index.php?action=adminLivre");
            exit;
        }
    }
    elseif( isset($_POST['ajout_comment']) ){
        $ctrl_comment->ajouter_comment($_POST, $_POST['id_publication']);
    }
    elseif( isset($_POST['signal_comment']) ){
        $idPubli = $_POST['id_publication'];
        $ctrl_sgCom->ctrl_ajouter($_POST, $idPubli);
    }
    elseif( isset($_POST['select_genre']) ){
        $idGenre = $_POST['id_genre'];
    }
//---- Admin ----  
    elseif(isset($_POST['editComment_admin'])){
        $contenu = $_POST['contenu'];
        $idCom = $_POST['id_comment'];
        $idPubli = $_POST['id_publi'];
        $ctrl_sgCom->modifier_sgComment($contenu, $idCom, $idPubli);
    }
    elseif(isset($_GET['deleteComment']) && ctype_digit($_GET['deleteComment']) && ctype_digit($_GET['p'])){
        
        $ctrl_comment->supprimer_oneComment($_GET['deleteComment'], $_GET['p']);
    }
    elseif(isset($_POST['gerer_user'])){
        if( $_FILES['avatar']['error'] != 0 ){
            $avatar = $_POST['avatar'];
        }else{
            $avatar = $_FILES['avatar'];
        }
        $ctrl_user->ctrl_admin_modifUser($_POST, $avatar);
    }
    elseif(isset($_GET['deleteLivre']) && ctype_digit($_GET['p'])){
        $ctrl_comment->ctrl_supprimer_commentPubli($_GET['p']);
        $ctrl_livre->supprimer_livre($_GET['p']);
        $ctrl_publi->supprimer_publication($_GET['p']);
    }
//--- END Admin ---
    elseif(isset($_GET['action'])){
        $action = $_GET['action'];
        
        if($action == "accueil"){
            $genreL = $ctrl_genre->ctrl_getAllGenreL_exist();
            render("accueil",
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                     "livre" => $allLivre, "genre" => $genreL ]);
        }
        elseif($action == "connexion"){
            render("connexion",
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre]);
        }
        elseif($action == "inscription"){
            render("inscription",
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre]);
        }
        elseif($action == "compte"){
            $user = $_SESSION['user'];
            $numPubli = $ctrl_publi->ctrl_count_publiUser(unserialize($user)->getId());
            $numComm = $ctrl_comment->ctrl_count_commentUser(unserialize($user)->getId());
            $publiUser = $ctrl_publi->ctrl_getPubliUser(unserialize($user)->getId());
            render("compte_user", 
                    ["isConnect" => $isConnect, "isAdmin"   => $isAdmin,"isMembre" => $isMembre,
                     "user"      => unserialize($user),
                     "numPubli"  => $numPubli,
                     "numComm"   => $numComm,
                     "publiUser" => $publiUser,
                     "ctr_publi" => $ctrl_publi,
                     "ctr_comm"  => $ctrl_comment ]);
        }
        elseif($action == "profil"){
            $id_cible = $_GET['user'];
            $profil = $ctrl_user->ctrl_getOneUser($id_cible);
            $numPubli = $ctrl_publi->ctrl_count_publiUser($id_cible);
            $numComm = $ctrl_comment->ctrl_count_commentUser($id_cible);
            $publiUser = $ctrl_publi->ctrl_getPubliUser($id_cible);
            render("profil_user", 
                    ["isConnect" => $isConnect, "isAdmin"   => $isAdmin, "isMembre" => $isMembre,
                     "data_user" => $profil,
                     "numPubli"  => $numPubli,
                     "numComm"   => $numComm,
                     "publiUser" => $publiUser,
                     "ctr_publi" => $ctrl_publi,
                     "ctr_comm"  => $ctrl_comment ]);
        }
        elseif($action == "Livres"){
            render("livres", 
                    ["isConnect" => $isConnect, "isAdmin"    => $isAdmin,"isMembre" => $isMembre,
                     "data_livre" => $allLivre,
                     "data_publi" => $ctrl_publi,
                     "data_genre" => $ctrl_genre]);
        }
        elseif($action == "Films"){
            render("films",
                    ["isConnect" => $isConnect, "isAdmin"    => $isAdmin,"isMembre" => $isMembre,
                     "data_film"  => $allFilm,
                     "data_publi" => $ctrl_publi,
                     "data_genre" => $ctrl_genre]);
        }
        elseif($action == "article"){
            $idPubli = $_GET['art'];
            $publi = $ctrl_publi->ctrl_publiLivres($idPubli);
            $livre = $ctrl_livre->ctrl_getOneLivre($idPubli);
            $num1 = 0;
            $num2 = 0;
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user'];
            }else{ $user= null; }
            render("article",
                    ["isConnect" => $isConnect, "isAdmin"    => $isAdmin,"isMembre" => $isMembre,
                     "data_publi" => $publi,
                     "data_livre" => $livre,
                     "data_genre" => $ctrl_genre,
                     "ctrPubli"   => $ctrl_publi,
                     "data_comm"  => $ctrl_comment,
                     "num1"        => $num1,
                     "num2"        => $num2,
                     "user"       => unserialize($user)]);
        }
        elseif($action == "addLivre"){
            $user = unserialize($_SESSION['user'])->getId();
            render("add_livre", 
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                     "user"    => $user,
                     "genre"   => $allGenre_livre]);
        }
        elseif($action == "addFilm"){
            $user = $_SESSION['user'];
            render("add_film", 
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                     "user"    => unserialize($user),
                     "genre"   => $allGenre]);
        }
        elseif($action == "updateLivre"){
            $idPubli = $_GET['art'];
            $user = unserialize($_SESSION['user'])->getId();
            $publi = $ctrl_publi->getOnePubli($idPubli);
            $livre = $ctrl_livre->ctrl_getOneLivre($idPubli);
            if($ctrl_publi->ctrl_isLivre($idPubli) == true){
                render("add_livre", 
                        ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                         "user"    => $user,
                         "publi"   => $publi,
                         "livre"   => $livre,
                         "genre"   => $allGenre_livre,
                         "data_genre" => $ctrl_genre,
                         "idPubli" => $idPubli ]);
            }
        }
// --- GESTION ADMIN ---
        elseif($action == "administrateur") {
            if(isset($_POST['tri_item']) && $_POST['tri_item'] == "mois"){
                $listePubli = $ctrl_publi->ctrl_getAllPubli_dateDiff_month();
                $listeComm = $ctrl_comment->ctrl_getAllComment_dateDiff_month();
                $listeUser = $ctrl_user->ctrl_getAllUser_dateDiff_month();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "semaine"){
                $listePubli = $ctrl_publi->ctrl_getAllPubli_dateDiff_week();
                $listeComm = $ctrl_comment->ctrl_getAllComment_dateDiff_week();
                $listeUser = $ctrl_user->ctrl_getAllUser_dateDiff_week();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "jour"){
                $listePubli = $ctrl_publi->ctrl_getAllPubli_dateDiff_day();
                $listeComm = $ctrl_comment->ctrl_getAllComment_dateDiff_day();
                $listeUser = $ctrl_user->ctrl_getAllUser_dateDiff_day();
            }else{
                $listePubli = $ctrl_publi->ctrl_getAllPubli_dateDiff_month();
                $listeComm = $ctrl_comment->ctrl_getAllComment_dateDiff_month();
                $listeUser = $ctrl_user->ctrl_getAllUser_dateDiff_month();
            }
            $numUser = $ctrl_user->ctrl_count_user();
            $numUserU = $ctrl_user->ctrl_count_user_util();
            $numUserM = $ctrl_user->ctrl_count_user_membre();
            $numPubli = $ctrl_publi->ctrl_count_publi();
            $numPubliL = $ctrl_publi->ctrl_count_publiLivre();
            $numPubliF = $ctrl_publi->ctrl_count_publiFilm();
            $numComm = $ctrl_comment->ctrl_count_comment();
            $moyComL = $ctrl_comment->ctrl_count_comment_moyenneL();
            $moyComF = $ctrl_comment->ctrl_count_comment_moyenneF();
            render("gestion_admin", 
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,
                     "data_sgCom" => $ctrl_sgCom,
                     "all_sgCom"  => $allSgComm,
                     "numUser"    => $numUser,
                     "numUserU"   => $numUserU,
                     "numUserM"   => $numUserM,
                     "numPubli"   => $numPubli,
                     "numPubliL"  => $numPubliL,
                     "numPubliF"  => $numPubliF,
                     "numComm"    => $numComm,
                     "moyComL"    => $moyComL,
                     "moyComF"    => $moyComF,
                     "data_publi" => $ctrl_publi,
                     "list_publi" => $listePubli,
                     "data_com"   => $ctrl_comment,
                     "list_com"   => $listeComm,
                     "data_user"  => $ctrl_user,
                     "list_user"  => $listeUser ]);
        }
        elseif($action == "adminUser"){
            if(isset($_POST['tri_item']) && $_POST['tri_item'] == "pseudo"){
                $listeUser = $ctrl_user->orderBy_userPseudo();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "date"){
                $listeUser = $ctrl_user->orderBy_userDate();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "statut"){
                $listeUser = $ctrl_user->orderBy_userStatut();
            }else{
                $listeUser = $allUsers;
            }
            render("gestion_user", 
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,
                     "list_user" => $listeUser,
                     "publi"   => $ctrl_publi,
                     "comm"    => $ctrl_comment]);
        }
        elseif($action == "editUser" && ctype_digit($_GET['u'])){
            if(isset($_POST['tri_item']) && $_POST['tri_item'] == "pseudo"){
                $listeUser = $ctrl_user->orderBy_userPseudo();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "date"){
                $listeUser = $ctrl_user->orderBy_userDate();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "statut"){
                $listeUser = $ctrl_user->orderBy_userStatut();
            }else{
                $listeUser = $allUsers;
            }
            $edit_u = $ctrl_user->ctrl_getOneUser($_GET['u']);
            render("gestion_user", 
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,
                     "allUser" => $allUsers,
                     "list_user" => $listeUser,
                     "publi"   => $ctrl_publi,
                     "comm"    => $ctrl_comment,
                     "edit_u"  => $edit_u ]);
        }
        elseif($action == "adminLivre"){
            if(isset($_POST['tri_item']) && $_POST['tri_item'] == "auteur"){
                $listeLivre = $ctrl_livre->orderBy_livreAuteur();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "type"){
                $listeLivre = $ctrl_livre->orderBy_livreType();
            }else{
                $listeLivre = $allLivre;
            }
            render("gestion_livre", 
                    ["isConnect" => $isConnect, "isAdmin"    => $isAdmin,
                     "list_livre" => $listeLivre,  
                     "data_publi" => $ctrl_publi,
                     "comm"       => $ctrl_comment,
                     "data_genre" => $ctrl_genre,
                     "genre"      => $allGenre_livre ]);
        }
        elseif($action == "editLivre" && ctype_digit($_GET['pl'])){
            if(isset($_POST['tri_item']) && $_POST['tri_item'] == "auteur"){
                $listeLivre = $ctrl_livre->orderBy_livreAuteur();
            }elseif(isset($_POST['tri_item']) && $_POST['tri_item'] == "type"){
                $listeLivre = $ctrl_livre->orderBy_livreType();
            }else{
                $listeLivre = $allLivre;
            }
            $edit_p = $ctrl_publi->ctrl_publiLivres($_GET['pl']);
            $edit_l = $ctrl_livre->ctrl_getOneLivre($_GET['pl']);
            render("gestion_livre", 
                    ["isConnect" => $isConnect, "isAdmin"    => $isAdmin,
                     "allLivre"   => $allLivre,
                     "list_livre" => $listeLivre,
                     "data_publi" => $ctrl_publi,
                     "comm"       => $ctrl_comment,
                     "data_genre" => $ctrl_genre,
                     "genre"      => $allGenre_livre,
                     "edit_pbl"   => $edit_p,
                     "edit_lvr"   => $edit_l ]);
        }
        elseif($action == "adminGenre"){
            render("gestion_genre", 
                    ["isConnect" => $isConnect, "isAdmin" => $isAdmin,
                     "genre"   => $allGenre_livre ]);
        }
        elseif($action == "editGenre"){
            $edit_g = $_GET['id_genre'];
            echo $edit_g;
        }
// -- FIN gestion admin ---        
        elseif ( $action == "deconnexion" ){
            session_destroy();
            header("Location: .");
            exit;
        }
    }else{
        render("accueil", 
                ["isConnect" => $isConnect, "isAdmin" => $isAdmin,"isMembre" => $isMembre,
                 "livre" => $allLivre, "genre" => $allGenre_livre ]);
    }
    
    
} catch (MesExceptions $exc) {
    render("404", ["msg" => $exc->getMessage()]);
}
