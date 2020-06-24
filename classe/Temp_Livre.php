<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of Temp_Livre
 *
 * @author ilo
 */
class Temp_Livre extends Generique {
    
    protected $id;
    protected $id_user;
    protected $img_bg;
    protected $titre;
    protected $police;
    protected $couverture;
    protected $auteur;
    protected $editeur;
    protected $genre;
    protected $type;
    protected $resume;
    protected $avis;
    protected $lien;
    
    
    function __construct(array $data) {
        parent::__construct($data);
    }    
    
    function getId() {
        return $this->id;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getImg_bg() {
        return $this->img_bg;
    }

    function getTitre() {
        return $this->titre;
    }

    function getPolice() {
        return $this->police;
    }

    function getCouverture() {
        return $this->couverture;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getEditeur() {
        return $this->editeur;
    }

    function getGenre() {
        return $this->genre;
    }

    function getType() {
        return $this->type;
    }

    function getResume() {
        return $this->resume;
    }

    function getAvis() {
        return $this->avis;
    }

    function getLien() {
        return $this->lien;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setId_user(int $id_user): void {
        $this->id_user = $id_user;
    }

    function setImg_bg(string $img_bg): void {
        $this->img_bg = $img_bg;
    }

    function setTitre(string $titre): void {
        $this->titre = $titre;
    }

    function setPolice(string $police): void {
        $this->police = $police;
    }

    function setCouverture(string $couverture): void {
        $this->couverture = $couverture;
    }

    function setAuteur(string $auteur): void {
        $this->auteur = $auteur;
    }

    function setEditeur(string $editeur): void {
        $this->editeur = $editeur;
    }

    function setGenre(int $genre): void {
        $this->genre = $genre;
    }

    function setType(string $type): void {
        $this->type = $type;
    }

    function setResume(string $resume): void {
        $this->resume = $resume;
    }

    function setAvis(string $avis): void {
        $this->avis = $avis;
    }

    function setLien(string $lien): void {
        $this->lien = $lien;
    }

}
