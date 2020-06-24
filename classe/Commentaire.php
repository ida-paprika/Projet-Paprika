<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of Commentaire
 *
 * @author ilo
 */
class Commentaire extends Generique {
    
    protected $id_comment;
    protected $contenu;
    protected $id_user;
    protected $id_publication;
    protected $date_comment;


    function __construct(array $data) {
        parent::__construct($data);
    }
    
    function getId_comment() {
        return $this->id_comment;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getId_user() {
        return $this->id_user;
    }
    
    function getId_publication() {
        return $this->id_publication;
    }

    function getDate_comment() {
        return $this->date_comment;
    }

    function setId_comment($id_comment): void {
        $this->id_comment = $id_comment;
    }

    function setContenu(string $contenu): void {
        $this->contenu = $contenu;
    }

    function setId_user(int $id_user): void {
        $this->id_user = $id_user;
    }
    
    function setId_publication($id_publication): void {
        $this->id_publication = $id_publication;
    }

    function setDate_comment($date_comment): void {
        $this->date_comment = $date_comment;
    }


    
    
}
