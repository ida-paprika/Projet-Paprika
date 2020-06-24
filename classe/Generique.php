<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

/**
 * Description of Generique
 *
 * @author ilo
 */
class Generique {
    public function __construct(array $data = null) {
        if ( $data ){
            foreach ($data as $key => $value){
                $methode = 'set' . ucfirst($key);

                if(method_exists($this, $methode) ){
                    $this->$methode($value);
                }
            }
        }
    }
    
    
}
