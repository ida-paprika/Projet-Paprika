<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\User;

/**
 * Description of Modele_User
 *
 * @author ilo
 */
class Modele_User extends ModeleGenerique{
    
    public function ajouter($user, $param2 = null, $param3= null) {
        $query = "INSERT INTO users VALUES(NULL, :pseudo, :mail, :mdp, 'indéfini', "
                . "'default_avatar.jpg', :bio, NULL, NULL, NULL, now(), 'utilisateur')";
        $req = $this->execRequete($query, [
            "pseudo"  => $this->validate($user->getPseudo(), 3, 20),
            "mail"    => $this->validate($user->getMail(), 8, 30),
            "mdp"     => password_hash($this->validate($user->getMdp(), 8, 20), PASSWORD_DEFAULT),
            "bio"     => "Quand j'étais petit, je n'étais pas grand..."
        ]);
        
        if( $req->rowCount() != 0 ){
            "Inscription réussie ! ";
        }else{
            throw new MesExceptions("pseudo ou mail déjà utilisés");
        }
    }
    
    public function pseudo_existe($pseudo) {
        $req = $this->execRequete("SELECT pseudo FROM users WHERE pseudo = ?", [$pseudo] );
        if($req->rowCount() != 0){
            return true;
        }else{
            return false;
        }
        
    }
    
    public function mail_existe($mail) {
        $req = $this->execRequete("SELECT mail FROM users WHERE mail = ?", [$mail]);
        if($req->rowCount() != 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function connexion($param){
        $query = "SELECT * FROM users WHERE mail = ?";
        $req = $this->execRequete($query, [$param['mail']]);
        
        if( $req->rowCount() != 0 ){
            $user = new User( $req->fetch() );
            
            if( password_verify( $param['mdp'], $user->getMdp() ) ){
                $_SESSION['user'] = serialize($user);
            }else{
                $_SESSION['msg'] = "Connexion impossible : veuillez vérifier vos identifiants";
                header("location: index.php?action=connexion");
                exit;
            }
        } else {
            $_SESSION['msg'] = "Connexion impossible : veuillez vérifier vos identifiants";
            header("location: index.php?action=connexion");
            exit;
        }
    }

/* START --- Modification User */
    public function verif_mdp($mdp, $confmdp) {
        if( $mdp == $confmdp ){
            return true;
        }else{
            return false;
        }
    }
    
    public function modif_connect($user, $mdp){
        $query = "SELECT * FROM users WHERE id = :id";
        $req = $this->execRequete($query, ["id" => $user->getId()]);
        
        if( $req->rowCount() != 0 ){
            $user = new User( $req->fetch() );
            
            if( password_verify( $mdp, $user->getMdp() ) ){
                $_SESSION['user'] = serialize($user);
            }else{
                throw new MesExceptions("Connexion impossible : veuillez vérifier vos identifiants.");
            }
        }
    }
    
    public function modif_mdp($user, $mdp){
        $query = "UPDATE users SET mdp = :mdp WHERE id = :id";
        $req = $this->execRequete($query, [
                "mdp"    => $mdp,
                "id"     => $this->validate($user->getId(), 1, 10)
            ]);
        return $req;
    }
    
    public function requete_modifUser($user, $img){
        $query = "UPDATE users SET mail = :mail, sexe = :sexe, avatar = :avatar, bio = :bio,"
                . " lien_site = :lienS, lien_fb = :lienF, lien_insta = :lienI WHERE id = :id";
        $req = $this->execRequete($query, [
                "mail"   => $this->validate($user->getMail(), 8, 30),
                "sexe"   => $user->getSexe(),
                "avatar" => $img,
                "bio"    => $this->validate($user->getBio(), 0, 200),
                "lienS"  => $this->validate($user->getLien_site(), 0, 50),
                "lienF"  => $this->validate($user->getLien_fb(), 0, 50),
                "lienI"  => $this->validate($user->getLien_insta(), 0, 50),
                "id"     => $this->validate($user->getId(), 1, 10)
            ]);
        return $req;
    }
    
    public function modifier($user, $avatar, $mdp){
        if( is_array($avatar) ){
            $img = $this->imageValidate($avatar, "avatar", $user->getId(), "avatars");
    //en cas d'échec de récupération du fichier, conserver valeur image actuelle
        }else{
            $img = $avatar;
        }
        $req = $this->requete_modifUser($user, $img);

        if( !empty($_POST['mdp']) && !empty($_POST['confMdp']) ){
            $mdp = password_hash($this->validate($_POST['mdp'], 8, 20), PASSWORD_DEFAULT);
            $this->modif_mdp($user, $mdp);
            $mdp = $_POST['mdp'];
        }
        if($req->rowCount() != 0){ 
            unset($_SESSION['user']);
            $this->modif_connect($user, $mdp);
            $_SESSION['message'] = "Votre profil a été mis à jour";
        }
        else{
            $_SESSION['message'] = "Une erreur s'est produite";
        }
    }
    
    public function admin_modifUser($user, $avatar){
        if( is_array($avatar) ){
            $img = $this->imageValidate($avatar, "avatar", $user->getId(), "avatars");
    //en cas d'échec de récupération du fichier, conserver valeur image actuelle
        }else{
            $img = $avatar;
        }
        $this->admin_modifStatut($user);
        $req = $this->requete_modifUser($user, $img);

        if($req->rowCount() == 0){
            $_SESSION['message'] = "Une erreur s'est produite";
        }
    }
    
    public function admin_modifStatut($user) {
        $this->execRequete("UPDATE users SET statut = :statut WHERE id = :id", 
                ["statut" => $user->getStatut(),
                 "id"     => $user->getId() ]);
    }
 /* FIN modif user */
    
    public function supprimer($id, $param2 = null){
        $this->execRequete("UPDATE publications SET id_user = 1 WHERE id_user = ?", [$id]);
        $query = "DELETE FROM users WHERE id = ?";
        $res = $this->execRequete($query, [$id]);      
        if( $res->rowCount() != 0){
            unset($_SESSION['user']);
        }
    }
    
    public function getOneUser($id) {
        return $this->getOne_dateF("date_inscription", "users", "id", $id);
    }
 
    public function getAllUser() {
        $users = $this->getAll_dateF("date_inscription", "users");
        $tab = [];
        
        while( $u = $users->fetch() ){
            $tab[] = new User($u);
        }
        return $tab;
    }
    
    public function getAllUser_dateDiff($unit, $num) {
        $user = $this->getAll_DateDiff("users", $unit, "date_inscription", $num);
        $tab = [];
        
        while( $u = $user->fetch() ){
            $tab[] = new User($u);
        }
        return $tab;
    }
    
    public function orderBy_user($colonne) {
        $users = $this->execRequete("SELECT * FROM users ORDER BY $colonne");
        $tab = [];
        
        while( $u = $users->fetch() ){
            $tab[] = new User($u);
        }
        return $tab;
    }
    
    public function count_user() {
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM users");
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function count_user_filtre($colonne, $info) {
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM users "
                . "WHERE $colonne = ?", [$info]);
        $data = $res->fetchAll();
        return $data[0];
    }

    
}
