<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\Livre;

/**
 * Description of Modele_Livre
 *
 * @author ilo
 */
class Modele_Livre extends ModeleGenerique {

    public function ajouter($livre, $img, $genre) {
        $id_publi = $this->lastId_publi();
        $this->associer_genre($genre, $id_publi);
        $auteur = $this->validate($livre->getAuteur(), 3, 50);
        
        $query = "INSERT INTO livres VALUES(NULL, :publi, :aut, :edit, :type, :couv)";
        $req = $this->execRequete($query, [
            "publi" => $id_publi,
            "aut"   => $auteur,
            "edit"  => $this->validate($livre->getEditeur(), 3, 50),
            "type"  => $livre->getType(),
            "couv"  => $this->imageValidate( $img, str_replace(" ", "_", $auteur), $id_publi, "couvertures")
        ]);
        
        if( $req->rowCount() == 0 ){
            throw new MesExceptions("Une erreur s'est produite (ajout livre)");
        }
    }
    
    public function modifier($livre, $img, $genre) {
        $idPubli = $this->validate($livre->getId_publication(), 1, 10);
        $auteur = $this->validate($livre->getAuteur(), 3, 50);
        $this->modif_asso_genre($genre, $idPubli);
        if( is_array($img) ){
            $imgCouv = $this->imageValidate($img, str_replace(" ", "_", $auteur), $idPubli, "couvertures");
    //en cas d'échec de récupération du fichier, conserver valeur image actuelle
        }else{
            $imgCouv = $img;
        }
        $query = "UPDATE livres SET auteur = :aut, editeur = :edit, type = :type, couverture = :couv "
                . "WHERE id_publication = :id";
        $req = $this->execRequete($query, [
            "aut"   => $auteur,
            "edit"  => $this->validate($livre->getEditeur(), 3, 50),
            "type"  => $livre->getType(),
            "couv"  => $imgCouv,
            "id"    => $idPubli
        ]);
    }
    
    public function lastId_publi() {
        $res = ($this->execRequete("SELECT * FROM publications ORDER BY id_publication DESC LIMIT 1 "))->fetch();
        return $res['id_publication'];
    }
    
    public function associer_genre($genre, $publi) {
        foreach($genre as $key => $value){
            $query = "INSERT INTO association_genres VALUES(:genre, :publi)";
            $req = $this->execRequete($query, [
                "genre" => $value,
                "publi" => $publi
            ]);
        }
        
        if( $req->rowCount() == 0 ){
            throw new MesExceptions("Une erreur s'est produite (genre)");
        }
    }
    
    public function modif_asso_genre($genre, $publi) {
        $this->execRequete("DELETE FROM association_genres WHERE id_publication = ?", [$publi]);
        
        $this->associer_genre($genre, $publi);
    }

    public function supprimer($idPubli, $param2 = null) {
        $this->execRequete("DELETE FROM livres WHERE id_publication = ?", [$idPubli]);
        $this->suppr_asso_genre($idPubli);
    }
    
    public function suppr_asso_genre($idPubli) {
        $this->execRequete("DELETE FROM association_genres WHERE id_publication = ?", [$idPubli]);
    }
    
    public function getAllLivre() {
        $livre = $this->getAll("livres");
        $tab = [];
        
        while( $l = $livre->fetch() ){
            $tab[] = new Livre($l);
        }
        return $tab;
    }
    
    public function getOneLivre($id) {
        return $this->getOne("livres", "id_publication", $id);
    }
    
    public function getLivreGenre($idGenre) {
        $livre = $this->execRequete("SELECT l.* FROM livres as l, association_genres as a "
                . "WHERE l.id_publication = a.id_publication AND a.id_genre = ?", [$idGenre]);
        $tab = [];
        
        while( $l = $livre->fetch() ){
            $tab[] = new Livre($l);
        }
        return $tab;
    }
    
    public function orderBy_livre($colonne) {
        $livre = $this->execRequete("SELECT * FROM livres ORDER BY $colonne");
        $tab = [];
        
        while( $l = $livre->fetch() ){
            $tab[] = new Livre($l);
        }
        return $tab;
    }
    

}
