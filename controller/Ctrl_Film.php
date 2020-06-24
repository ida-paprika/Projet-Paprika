<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Film;
use App\classe\Film;

/**
 * Description of Ctrl_Film
 *
 * @author ilo
 */
class Ctrl_Film {
    
    protected $gestion;
    
    function __construct() {
        $this->gestion = new Modele_Film();
    }
    
    public function ajouter_film($param) {
        extract($param);
        
        $this->gestion->ajouter(new Film($param));
        
        header("location: index.php?action=Films");
        exit;

    }    
    
    public function ctrl_getAllFilm(){
        return $this->gestion->getAllFilm();
    }    
    
    
}
