<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\Film;

/**
 * Description of Modele_Film
 *
 * @author ilo
 */
class Modele_Film extends ModeleGenerique {

    
    
    public function ajouter($film, $param2 = null, $param3= null) {
        $query = "INSERT INTO films VALUES(NULL, :publi, :real, :aff, :nat, :dur, :date, :act";
        $req = $this->execRequete($query, [
            "publi" => $this->validate($film->getId_publication(), 1, 10),
            "real"   => $this->validate($film->getRealisateur(), 5, 50),
            "aff"  => $this->validate($film->getAffiche(), 5, 50),
            "nat"  => $this->validate($film->getNationalite(), 3, 30),
            "dur"  => $this->validate($film->getDuree(), 4, 10),
            "date"  => $this->validate($film->getDate_sortie(), 6, 10),
            "act"  => $this->validate($film->getActeurs(), 6, 10)
        ]);
        
        if( $req->rowCount() != 0 ){
            "Film ajouté avec succès ! ";
        }else{
            throw new MesExceptions("Une erreur s'est produite (film)");
        }
        
    }

    public function modifier($param1, $param2, $param3) {
        
    }

    public function supprimer($param, $param2) {
        
    }
    
public function getAllFilm() {
        $film = $this->getAll("films");
        $tab = [];
        
        while( $f = $film->fetch() ){
            $tab[] = new Film($f);
        }
        return $tab;
    }    

    
}
