<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\Genre;

/**
 * Description of Modele_Genre
 *
 * @author ilo
 */
class Modele_Genre extends ModeleGenerique {
    

    public function ajouter($param, $param2 = null, $param3= null) {
        
    }

    public function modifier($param1, $param2, $param3) {
        
    }

    public function supprimer($param, $param2) {
        
    }
    
    public function getAllGenre() {
        $res = $this->execRequete("SELECT * FROM genres ORDER BY designation ASC");
        return $res;
    /*    
        $genre = $this->getAll("genres");
        $tab = [];
        
        while( $g = $genre->fetch() ){
            $tab[] = new Genre($g);
        }
        return $tab;
    */
    }
    
    public function getAllGenre_livre() {
        $res = $this->execRequete("SELECT * FROM genres WHERE filtre = 'livre' ORDER BY designation ASC");
        return $res;
    }
    
    public function getAllGenreL_exist() {
        $res = $this->execRequete("SELECT DISTINCT g.* FROM genres as g, association_genres as ag, livres as l "
                . "WHERE ag.id_publication = l.id_publication AND ag.id_genre = g.id "
                . "ORDER BY g.designation ASC");
        return $res;
    }

    public function getDesi_genre($id_publi){
        $res = $this->execRequete( "SELECT * FROM association_genres as ag, genres as g "
                . "WHERE ag.id_genre = g.id AND ag.id_publication = ?", [$id_publi]);
        return $res;
    }

    
    
}
