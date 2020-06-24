<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Ctrl\controller;

use Mdl\modele\Modele_Genre;
use App\classe\Genre;

/**
 * Description of Ctrl_Genre
 *
 * @author ilo
 */
class Ctrl_Genre {
    
    protected $gestion;
            
    function __construct() {
        $this->gestion = new Modele_Genre();
    }
    
    public function ctrl_getAllGenre() {
        //return $this->gestion->getAllGenre();
        $genre = $this->gestion->getAllGenre();
        $tab = [];
        
        while( $g = $genre->fetch() ){
            $tab[] = new Genre($g);
        }
        return $tab;
    }
    
    public function ctrl_getAllGenre_livre() {
        $genreLivre = $this->gestion->getAllGenre_livre();
        $tab = [];
        
        while( $gl = $genreLivre->fetch() ){
            $tab[] = new Genre($gl);
        }
        return $tab;
    }
    
    public function ctrl_getAllGenreL_exist() {
        $genreL = $this->gestion->getAllGenreL_exist();
        $tab = [];
        
        while( $gl = $genreL->fetch() ){
            $tab[] = new Genre($gl);
        }
        return $tab;
    }
    
    public function ctrl_getDesi_Genre($id_publi) {
        $desi_genre = $this->gestion->getDesi_genre($id_publi);
        $tab = [];
        while($dg = $desi_genre->fetch()){
            $tab[] = new Genre($dg);
        }
        return $tab;
    }
    
    
    
}
