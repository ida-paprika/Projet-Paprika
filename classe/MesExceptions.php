<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use Exception;

/**
 * Description of MesExceptions
 *
 * @author ilo
 */
class MesExceptions extends Exception{
    
    protected $redefini = "Depuis la classe MesExceptions";
            
    function __construct(string $message) {
        parent::__construct($message);
    }
    
    function getRedefini() {
        return $this->redefini;
    }




    
}
