<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_SignalComment;
use App\classe\SignalComment;

/**
 * Description of Ctrl__SignalComment
 *
 * @author ilo
 */
class Ctrl__SignalComment {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_SignalComment();
    }
    
    public function ctrl_ajouter($param, $idPubli) {
        extract($param);
        $this->gestion->ajouter(new SignalComment($param));
        header("location: index.php?action=article&art=$idPubli");
    }
    
    public function modifier_sgComment($contenu, $idCom, $idPubli){
        $this->gestion->modifier($contenu, $idCom);
        header("location: index.php?action=article&art=$idPubli");
    }
    
    public function ctrl_getOneSignalComm($colonne, $id) {
        $sg_comm = $this->gestion->getOneSignalComm($colonne, $id);
        return new Commentaire($sg_comm);
    }

    public function ctrl_getAllSignalComm() {
        return $this->gestion->getAllSignalComm();
    }
    
    public function ctrl_get_contenuCom($id) {
        $contenu = $this->gestion->get_element("commentaires", "id_comment", "id_comment", $id);
        return new \App\classe\Commentaire($contenu);
    }
    
    public function ctrl_get_fromUser($id) {
        $pseudo = $this->gestion->get_element("users", "id", "id_from_user", $id);
        return new \App\classe\User($pseudo);
    }
    
    public function ctrl_get_auteur_comm($id) {
        $pseudo = $this->gestion->get_element("users", "id", "id_user_com", $id);
        return new \App\classe\User($pseudo);
    }
    
    public function get_titreArticle($id) {
        $publi = $this->gestion->get_element("publications", "id_publication" , "id_publication", $id);
        return new \App\classe\Publication($publi);
    }
    
}
