<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of SignalComment
 *
 * @author ilo
 */
class SignalComment extends Generique {
    
    protected $id;
    protected $id_user_com;
    protected $id_comment;
    protected $id_from_user;
    protected $motif;
    protected $id_publication;
    
    
    function __construct(array $data) {
        parent::__construct($data);
    }    
    
    function getId() {
        return $this->id;
    }

    function getId_user_com() {
        return $this->id_user_com;
    }

    function getId_comment() {
        return $this->id_comment;
    }

    function getId_from_user() {
        return $this->id_from_user;
    }

    function getMotif() {
        return $this->motif;
    }
    
    function getId_publication() {
        return $this->id_publication;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setId_user_com(int $id_user_com): void {
        $this->id_user_com = $id_user_com;
    }

    function setId_comment(int $id_comment): void {
        $this->id_comment = $id_comment;
    }

    function setId_from_user(int $id_from_user): void {
        $this->id_from_user = $id_from_user;
    }

    function setMotif(string $motif): void {
        $this->motif = $motif;
    }
    
    function setId_publication($id_publication): void {
        $this->id_publication = $id_publication;
    }


    
}
