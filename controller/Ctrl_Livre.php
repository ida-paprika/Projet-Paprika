<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Livre;
use App\classe\Livre;

/**
 * Description of Ctrl_Livre
 *
 * @author ilo
 */
class Ctrl_Livre {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Livre();
    }
    
    public function ajouter_livre($param, $img, $genre) {
        extract($param);
        
        $this->gestion->ajouter(new Livre($param), $img, $genre);
        
        header("location: index.php?action=Livres");
        exit;

    }
    
    public function modifier_livre($livre, $img, $genre) {
        $this->gestion->modifier(new Livre($livre), $img, $genre);
    }
    
    public function supprimer_livre($idPubli) {
        $this->gestion->supprimer($idPubli);
    }
    
    public function ctrl_getAllLivre(){
        return $this->gestion->getAllLivre();
    }
    
    public function ctrl_getOneLivre($id) {
        $livre = $this->gestion->getOneLivre($id);
        return new Livre($livre);
    }
    
    public function ctrl_getLivreGenre($idGenre) {
        return $this->gestion->getLivreGenre($idGenre);
    }
    
    public function orderBy_livreAuteur() {
        return $this->gestion->orderBy_livre("auteur");
    }
    
    public function orderBy_livreType() {
        return $this->gestion->orderBy_livre("type");
    }
    
    
    
}
