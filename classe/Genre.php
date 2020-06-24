<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of Genre
 *
 * @author ilo
 */
class Genre extends Generique {
    protected $id;
    protected $designation;
    protected $filtre;
            
    
    function __construct(array $data) {
        parent::__construct($data);
    }       
    
    function getId() {
        return $this->id;
    }

    function getDesignation() {
        return $this->designation;
    }
    
    function getFiltre() {
        return $this->filtre;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setDesignation($designation): void {
        $this->designation = $designation;
    }
    
    function setFiltre($filtre): void {
        $this->filtre = $filtre;
    }

}
