<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_User;
use App\classe\User;

/**
 * Description of Ctrl_User
 *
 * @author ilo
 */
class Ctrl_User {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_User();
    }
    
    public function inscription($param, $pseudo, $mail, $mdp) {
        extract($param);
    /*  $errorMdp = "erreur mot de passe";
        $errorMail = "erreur mail";
        $errorPseudo = "erreur pseudo";
        $error = [$errorMdp, $errorMail, $errorPseudo];
        header('location: page.php?error=0');
        <?= isset($_GET['error'] && $_GET['error']== 0 ? $error[0] : ''; ?>
                utiliser des case et break
     */ 
        if( $this->gestion->pseudo_existe($pseudo) === true ){
            return $msg = "Pseudo déjà utilisé";
        }elseif( $this->gestion->mail_existe($mail) === true ){
            return $msg = "Email déjà utilisé";
        }elseif(preg_match("#[^a-zA-Z0-9]#", $pseudo) == 1 || preg_match("#[^a-zA-Z0-9]#", $mdp) == 1 ){
            return $msg = "Pas de caractères spéciaux !";
        }elseif(preg_match('#[0-9]#', $mdp) != 1){
            return $msg = "Votre mot de passe doit contenir au moins 1 chiffre";
        }elseif(preg_match('#[A-Z]#', $mdp) != 1){
            return $msg = "Votre mot de passe doit contenir au moins 1 majuscule";
        }elseif(preg_match('#[a-z]#', $mdp) != 1){
            return $msg = "Votre mot de passe doit contenir au moins 1 minuscule";
        }else{
            $this->gestion->ajouter(new User($param));
        
            header("location: index.php?action=connexion");
            exit;
        }
    }

    public function connexion($user){
        $this->gestion->connexion($user);
        header('location: index.php?action=accueil');
        exit;
    }
    
    public function isConnected(){
        if( isset($_SESSION['user']) ){
            return true;
        }
        return false;
    }
    
    public function isMembre(){
        if( isset($_SESSION['user']) && unserialize($_SESSION['user'])->getStatut() == "membre" ){
            return true;
        }
        return false;
    }
    
    public function isAdmin(){
        if( isset($_SESSION['user']) && unserialize($_SESSION['user'])->getStatut() == "admin" ){
            return true;
        }
        return false;
    }
    
    public function avatar($image) {
        $this->gestion->imageValidate($image);
    }
    
    public function modifierProfil($param, $avatar){
        if( password_verify($param['oldMdp'], unserialize($_SESSION['user'])->getMdp()) ){
            $mdp = $param['oldMdp'];
                
            if( isset($param['mdp']) && isset($param['confMdp']) ){
                $check_mdp = $this->gestion->verif_mdp($param['mdp'], $param['confMdp']);

                if( $check_mdp == false ){
                    $msg = "Les deux champs doivent être identiques";
                }
            }

            $this->gestion->modifier(new User($param), $avatar, $mdp);
            header("location: index.php?action=compte");
            exit;
               
        }else{
            $msg = "Mot de passe incorrect";
        }
    }
    
    public function ctrl_admin_modifUser($param, $avatar){
        $this->gestion->admin_modifUser(new User($param), $avatar);
        header("location: index.php?action=adminUser");
        exit;
    }
    
    public function ctrl_getOneUser($id) {
        $user = $this->gestion->getOneUser($id);
        return new User($user);
    }
    
    public function ctrl_getAllUser(){
        return $this->gestion->getAllUser();
    }
    
    public function ctrl_getAllUser_dateDiff_month() {
        return $this->gestion->getAllUser_dateDiff("MONTH", 1);
    }
    
    public function ctrl_getAllUser_dateDiff_week() {
        return $this->gestion->getAllUser_dateDiff("DAY", 7);
    }
    
    public function ctrl_getAllUser_dateDiff_day() {
        return $this->gestion->getAllUser_dateDiff("DAY", 1);
    }
    
    public function orderBy_userPseudo() {
        return $this->gestion->orderBy_user("pseudo");
    }
    
    public function orderBy_userDate() {
        return $this->gestion->orderBy_user("date_inscription");
    }
    
    public function orderBy_userStatut() {
        return $this->gestion->orderBy_user("statut");
    }
    
    public function ctrl_count_user() {
        return $this->gestion->count_user();
    }
    
    public function ctrl_count_user_util() {
        return $this->gestion->count_user_filtre("statut", "utilisateur");
    }
    
    public function ctrl_count_user_membre() {
        return $this->gestion->count_user_filtre("statut", "membre");
    }
    
    public function ctrl_supprimer($idUser) {
        $this->gestion->supprimer($idUser);
        header("location: index.php");
        exit;
    }

}
