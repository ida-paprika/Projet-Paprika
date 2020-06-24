<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of Film
 *
 * @author ilo
 */
class Film extends Generique {
    
    protected $id;
    protected $id_publication;
    protected $realisateur;
    protected $affiche;
    protected $nationalite;
    protected $duree;
    protected $date_sortie;
    protected $acteurs;
            
    
    function __construct(array $data) {
        parent::__construct($data);
    }    
    
    function getId() {
        return $this->id;
    }

    function getId_publication() {
        return $this->id_publication;
    }

    function getRealisateur() {
        return $this->realisateur;
    }

    function getAffiche() {
        return $this->affiche;
    }

    function getNationalite() {
        return $this->nationalite;
    }

    function getDuree() {
        return $this->duree;
    }

    function getDate_sortie() {
        return $this->date_sortie;
    }

    function getActeurs() {
        return $this->acteurs;
    }

        
    function setId(int $id): void {
        $this->id = $id;
    }

    function setId_publication(int $id_publication): void {
        $this->id_publication = $id_publication;
    }

    function setRealisateur(string $realisateur): void {
        $this->realisateur = $realisateur;
    }

    function setAffiche(string $affiche): void {
        $this->affiche = $affiche;
    }

    function setNationalite(string $nationalite): void {
        $this->nationalite = $nationalite;
    }

    function setDuree(string $duree): void {
        $this->duree = $duree;
    }

    function setDate_sortie(string $date_sortie): void {
        $this->date_sortie = $date_sortie;
    }

    function setActeurs(string $acteurs): void {
        $this->acteurs = $acteurs;
    }



    
    
    
}
