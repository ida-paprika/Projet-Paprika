<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of Livre
 *
 * @author ilo
 */
class Livre extends Generique {
    
    protected $id;    
    protected $id_publication;    
    protected $auteur;    
    protected $editeur;    
    protected $type;    
    protected $couverture;
    

    function __construct(array $data) {
        parent::__construct($data);
    }    
    
    function getId() {
        return $this->id;
    }

    function getId_publication() {
        return $this->id_publication;
    }

    function getAuteur() {
        return $this->auteur;
    }

    function getEditeur() {
        return $this->editeur;
    }

    function getType() {
        return $this->type;
    }

    function getCouverture() {
        return $this->couverture;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setId_publication(int $id_publication): void {
        $this->id_publication = $id_publication;
    }

    function setAuteur(string $auteur): void {
        $this->auteur = $auteur;
    }

    function setEditeur(string $editeur): void {
        $this->editeur = $editeur;
    }

    function setType(string $type): void {
        $this->type = $type;
    }

    function setCouverture(string $couverture): void {
        $this->couverture = $couverture;
    }


    
}
