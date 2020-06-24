<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\Publication;

/**
 * Description of Modele_Publication
 *
 * @author ilo
 */
class Modele_Publication extends ModeleGenerique {
    
    public function ajouter($publi, $img, $param3 = null) {
        $titre = $this->validate($publi->getTitre(), 1, 60);
        $id_user = $this->validate($_POST['id_user'], 1, 10);
        
        $query = "INSERT INTO publications VALUES(NULL, :titre, :recomp, :resume, :aprop, "
                . ":avis, :avisDet, :lien, :img, :police, :user, now())";
        $req = $this->execRequete($query, [
            "titre"  => $titre,
            "recomp" => $this->validate($publi->getRecompense(), 0, 400),
            "resume" => $this->validate($publi->getResume(), 50, 1500),
            "aprop"  => $this->validate($publi->getA_propos(), 0, 1000),
            "avis"   => $this->validate($publi->getAvis(), 50, 1500),
            "avisDet"=> $this->validate($publi->getAvis_detail(), 0, 3000),
            "lien"   => $this->validate($publi->getLien(), 10, 100),
            "img"    => $this->imageValidate($img, str_replace(" ", "_", $titre), $id_user, "accordion"),
            "police" => $this->validate($publi->getPolice(), 5, 30),
            "user"   => $id_user
        ]);
        
        if( $req->rowCount() == 0 ){
            throw new MesExceptions("Une erreur s'est produite (ajout publication)");
        }
    }    

    public function modifier($publi, $img, $id) {
        $titre = $this->validate($publi->getTitre(), 1, 100);
        $id_user = $this->validate($publi->getId_user(), 1, 10);
        
        if( is_array($img) ){
            $imgBg = $this->imageValidate($img, str_replace(" ", "_", $titre), $id_user, "accordion");
            if($imgBg == false){
                $imgBg = $img;
            }
//en cas d'échec de récupération du fichier, conserver valeur image actuelle
        }else{ $imgBg = $img; }
        $query = "UPDATE publications SET titre = :titre, recompense = :recomp, "
                . "resume = :resume, a_propos = :aprop, avis = :avis, "
                . "avis_detail = :avisDet, lien = :lien, img_bg = :img, police = :police WHERE id_publication = :id";
        $req = $this->execRequete($query, [
            "titre"  => $titre,
            "recomp" => $this->validate($publi->getRecompense(), 0, 400),
            "resume" => $this->validate($publi->getResume(), 50, 1500),
            "aprop"  => $this->validate($publi->getA_propos(), 0, 1000),
            "avis"   => $this->validate($publi->getAvis(), 50, 1500),
            "avisDet"=> $this->validate($publi->getAvis_detail(), 0, 3000),
            "lien"   => $this->validate($publi->getLien(), 10, 100),
            "img"    => $imgBg,
            "police" => $this->validate($publi->getPolice(), 5, 30),
            "id"     => $id
        ]);
    }

    public function supprimer($idPubli, $param2 = null) {
        $this->execRequete("DELETE FROM signal_commentaire WHERE id_publication = ?", [$idPubli]);
        $this->execRequete("DELETE FROM commentaires WHERE id_publication = ?", [$idPubli]);
        $this->execRequete("DELETE FROM publications WHERE id_publication = ?", [$idPubli]);
    }
    
    public function getAllPubli() {
        $publi = $this->getAll_dateF("date_publication", "publications");
        $tab = [];
        
        while( $p = $publi->fetch() ){
            $tab[] = new Publication($p);
        }
        return $tab;
    }
    
    public function getPubli_article($id, $article) {
        $res = $this->execRequete("SELECT * FROM publications as p, $article as a "
                . "WHERE a.id_publication = p.id_publication AND a.id_publication = ?", [$id]);
        return $res->fetch();
    }
    
    public function getAuteur_publi($id){
        $res = $this->execRequete("SELECT * FROM users as u, publications as p "
                . "WHERE u.id = p.id_user AND p.id_user = ?", [$id]);
        return $res->fetch();
    }
    
    public function getPubliUser($id){
        $res = $this->execRequete("SELECT * FROM users as u, publications as p "
                . "WHERE u.id = p.id_user AND p.id_user = ?", [$id]);
        $tab = [];
        
        while( $p = $res->fetch() ){
            $tab[] = new Publication($p);
        }
        return $tab;
    }
    
    public function getAllPubli_dateDiff($unit, $num) {
        $publi = $this->getAll_DateDiff("publications", $unit, "date_publication", $num);
        $tab = [];
        
        while( $p = $publi->fetch() ){
            $tab[] = new Publication($p);
        }
        return $tab;
    }
    
    public function count_publi() {
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM publications");
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function count_publi_filtre($colonne, $id){
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM publications"
                . " WHERE $colonne = ?", [$id]);
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function count_publi_type($table){
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM publications as p, $table as t "
                . "WHERE p.id_publication = t.id_publication");
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function isLivre($id) {
        $res = $this->execRequete("SELECT * FROM livres WHERE id_publication = ?", [$id]);
        if( $res->rowCount() != 0 ){
            return true;
        }else{
            return false;
        }
    }
    
    public function orderBy_publi($colonne) {
        $publi = $this->execRequete("SELECT * FROM publications ORDER BY $colonne");
        $tab = [];
        
        while( $p = $publi->fetch() ){
            $tab[] = new Publication($p);
        }
        return $tab;
    }
    
    

}
