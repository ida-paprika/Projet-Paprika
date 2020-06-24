<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Publication;
use App\classe\Publication;

/**
 * Description of Ctrl_Publication
 *
 * @author ilo
 */
class Ctrl_Publication {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Publication();
    }
    
    public function ajouter_publication($param, $img) {
        extract($param);
        
        $this->gestion->ajouter(new Publication($param), $img);

    }
    
    public function modifier_publication($param, $img, $id) {
        $this->gestion->modifier(new Publication($param), $img, $id);
    }
    
    public function supprimer_publication($idPubli) {
        $this->gestion->supprimer($idPubli);
        header("location: index.php?action=adminLivre");
        exit;
    }
    
        
    public function getOnePubli($id) {
        $publi = $this->gestion->getOne("publications", "id_publication", $id);
        return new Publication($publi);
    }
    
    public function ctrl_getAllPubli(){
        return $this->gestion->getAllPubli();
    }
    
    public function ctrl_getAllPubli_dateDiff_month() {
        return $this->gestion->getAllPubli_dateDiff("MONTH", 1);
    }
    
    public function ctrl_getAllPubli_dateDiff_week() {
        return $this->gestion->getAllPubli_dateDiff("DAY", 7);
    }
    
    public function ctrl_getAllPubli_dateDiff_day() {
        return $this->gestion->getAllPubli_dateDiff("DAY", 1);
    }
    
    public function ctrl_publiLivres($id){
        $publi = $this->gestion->getPubli_article($id, "livres");
        return new Publication($publi);
    }
    
    public function ctrl_publiFilms($id){
        $publi = $this->gestion->getPubli_article($id, "films");
        return new Publication($publi);
    }
    
    public function ctrl_getAuteur_publi($id) {
        $auteurPubli = $this->gestion->getAuteur_publi($id);
        return new \App\classe\User($auteurPubli);
    }
    
    public function ctrl_getPubliUser($id) {
        return $this->gestion->getPubliUser($id);
    }
    
    public function ctrl_count_publi() {
        return $this->gestion->count_publi();
    }
    
    public function ctrl_count_publiUser($id) {
        return $this->gestion->count_publi_filtre("id_user", $id);
    }
    
    public function ctrl_count_publiLivre() {
        return $this->gestion->count_publi_type("livres");
    }
    
    public function ctrl_count_publiFilm() {
        return $this->gestion->count_publi_type("films");
    }
    
    public function ctrl_isLivre($id_publi) {
        return $this->gestion->isLivre($id_publi);
    }
    
    public function orderBy_publiTitre() {
        return $this->gestion->orderBy_publi("titre");
    }
    
    public function orderBy_publiUser() {
        return $this->gestion->orderBy_publi("user");
    }
    
    public function orderBy_publiDate() {
        return $this->gestion->orderBy_publi("date_publication");
    }

    
}
