<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\Commentaire;

/**
 * Description of Modele_Commentaire
 *
 * @author ilo
 */
class Modele_Commentaire extends ModeleGenerique {
    
    
    public function ajouter($comm, $param2 = null, $param3 = null) {
        $query = "INSERT INTO commentaires VALUES(NULL, :cont, :user, :publi, now())";
        $req = $this->execRequete($query, [
            "cont"  => $this->validate($comm->getContenu(), 10, 500),
            "user"  => $this->validate($comm->getId_user(), 1, 10),
            "publi" => $this->validate($comm->getId_publication(), 1, 10)
        ]);
        if( $req->rowCount() == 0 ){
            throw new MesExceptions("Une erreur s'est produite (commentaire)");
        }
    }
    
    public function lastId_comment() {
        $res = ($this->execRequete("SELECT * FROM commentaires ORDER BY id DESC LIMIT 1 "))->fetch();
        return $res['id'];
    }
    

    public function modifier($idComm, $param2 = null, $param3 = null) {
        $this->execRequete("UPDATE commentaires SET contenu WHERE id_comment = ?", [$idComm]);
    }

    public function supprimer($id, $param2 = null) {
        $this->delete_signalComm("id_comment", $id);
        $this->execRequete("DELETE FROM commentaires WHERE id_comment = ?", [$id]);
    }
    
    public function supprimer_commentsPubli($idPubli) {
        $this->delete_signalComm("id_publication", $idPubli);
        $this->execRequete("DELETE FROM commentaires WHERE id_publication = ?", [$idPubli]);
    }
    
    public function is_in_signalComm($colonne, $id) {
        $res = $this->execRequete("SELECT sc.id_comment FROM signal_commentaire as sc, commentaires as c "
                    . "WHERE sc.id_comment = c.id_comment AND c.$colonne = ?", [$id]);
        $sg_comm = $res->fetchAll();
        return $sg_comm;
    }
    
    public function delete_signalComm($colonne, $id) {
        $sg_comm = $this->is_in_signalComm($colonne, $id);
        if(!empty($sg_comm)){
            $this->execRequete("DELETE FROM signal_commentaire WHERE $colonne = ?", [$id]);
        }
    }
    
    public function getOneComment($id) {
        return $this->getOne_dateF("date_comment", "commentaires", "id_user", $id);
    }


    public function getAllComment() {
        $comm = $this->getAll_dateF("date_comment", "commentaires");
        $tab = [];
        
        while( $c = $comm->fetch() ){
            $tab[] = new Commentaire($c);
        }
        return $tab;
    }
    
    public function getAllComment_dateDiff($unit, $num) {
        $comm = $this->getAll_DateDiff("commentaires", $unit, "date_comment", $num);
        $tab = [];
        
        while( $c = $comm->fetch() ){
            $tab[] = new Commentaire($c);
        }
        return $tab;
    }
    
    public function count_comment(){
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM commentaires");
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function count_comment_filtre($colonne, $id){
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM commentaires WHERE $colonne = ?", [$id]);
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function count_commentArt($id_publi) {
        $res = $this->execRequete("SELECT COUNT(*) as `count` FROM commentaires "
                . "WHERE id_publication = ? ", [$id_publi]);
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function count_comment_moyenne($table){
        $res = $this->execRequete("SELECT ROUND(COUNT(*)/COUNT(DISTINCT t.id), 2) FROM commentaires as c "
                . "INNER JOIN $table as t ON t.id_publication = c.id_publication");
        $data = $res->fetchAll();
        return $data[0];
    }
    
    public function getComment_Livre($id){
        $res = $this->execRequete("SELECT * FROM commentaires as c, livres as l "
                . "WHERE c.id_publication = l.id_publication AND l.id_publication = ?", [$id]);
        return $res;
    }
    
    public function getAuteur_comment($id){
        $res = $this->execRequete("SELECT * FROM users as u, commentaires as c "
                . "WHERE u.id = c.id_user AND c.id_user = ?", [$id]);
        return $res->fetch();
    }
    
    public function getTitre_comment($id) {
        $res = $this->execRequete("SELECT * FROM publications as p, commentaires as c "
                . "WHERE p.id_publication = c.id_publication AND c.id_publication = ?", [$id]);
        return $res->fetch();
    }

    
}
