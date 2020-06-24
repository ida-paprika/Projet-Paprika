<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Commentaire;
use App\classe\Commentaire;

/**
 * Description of Ctrl_Commentaire
 *
 * @author ilo
 */
class Ctrl_Commentaire {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Commentaire();
    }
    
    public function ajouter_comment($param, $idPubli) {
        extract($param);
        
        $this->gestion->ajouter(new Commentaire($param));
        
        header("location: index.php?action=article&art=$idPubli");
        exit;
    }
    
    public function ctrl_getOneComment($id) {
        $comm = $this->gestion->getOneComment($id);
        return new Commentaire($comm);
    }

    public function ctrl_getAllComment() {
        return $this->gestion->getAllComment();
    }
    
    public function ctrl_getAllComment_dateDiff_month() {
        return $this->gestion->getAllComment_dateDiff("MONTH", 1);
    }
    
    public function ctrl_getAllComment_dateDiff_week() {
        return $this->gestion->getAllComment_dateDiff("DAY", 7);
    }
    
    public function ctrl_getAllComment_dateDiff_day() {
        return $this->gestion->getAllComment_dateDiff("DAY", 1);
    }
    
    public function ctrl_count_comment() {
        return $this->gestion->count_comment();
    }
    
    public function ctrl_count_commentUser($id) {
        return $this->gestion->count_comment_filtre("id_user", $id);
    }
    
    public function ctrl_count_commentArt($id_publi) {
        return $this->gestion->count_commentArt($id_publi);
    }
    
    public function ctrl_count_comment_moyenneL() {
        return $this->gestion->count_comment_moyenne("livres");
    }
    
    public function ctrl_count_comment_moyenneF() {
        return $this->gestion->count_comment_moyenne("films");
    }
    
    public function ctrl_getComment_Livre($id_publi) {
        $comment = $this->gestion->getComment_Livre($id_publi);
        $tab = [];
        while($c = $comment->fetch()){
            $tab[] = new Commentaire($c);
        }
        return $tab;
    }
    
    public function ctrl_getAuteur_comment($idUser) {
        $auteurComment = $this->gestion->getAuteur_comment($idUser);
        return new \App\classe\User($auteurComment);
    }
        
    public function ctrl_getTitre_comment($idPubli) {
        $titreCom = $this->gestion->getTitre_comment($idPubli);
        return new \App\classe\Publication($titreCom);
    }
    
    public function supprimer_oneComment($id_comm, $id_publi) {
        $this->gestion->supprimer($id_comm);
        header("location: index.php?action=article&art=$id_publi");
    }

    
    public function ctrl_supprimer_commentPubli($id_publi) {
        $this->gestion->supprimer_commentsPubli($id_publi);
    }
    
    
    
}
