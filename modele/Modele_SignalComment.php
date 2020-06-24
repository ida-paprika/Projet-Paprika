<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

use App\classe\MesExceptions;
use App\classe\SignalComment;

/**
 * Description of Modele_SignalComment
 *
 * @author ilo
 */
class Modele_SignalComment extends ModeleGenerique {
    
    public function ajouter($sgCom, $param2 =  null, $param3 = null) {
        $this->execRequete("INSERT INTO signal_commentaire VALUES(NULL, :idUC, :idCom, :idFU, :motif, :idPubli)", 
                   ["idUC"    => intval($sgCom->getId_user_com()),
                    "idCom"   => intval($sgCom->getId_comment()),
                    "idFU"    => intval($sgCom->getId_from_user()),
                    "motif"   => $this->validate($sgCom->getMotif(), 0, 200),
                    "idPubli" => intval($sgCom->getId_publication()) ]);
    }

    public function modifier($contenu, $idCom, $param3 = null) {
        $this->execRequete("UPDATE commentaires SET contenu = :contenu WHERE id_comment = :id_com", 
                ["contenu" => $contenu, "id_com" => $idCom]);
        $this->supprimer($idCom);
    }

    public function supprimer($id_comm, $param2 = null) {
        $this->execRequete("DELETE FROM signal_commentaire WHERE id_comment = ?", [$id_comm]);
    }
    
    public function getOneSignalComm($colonne, $id) {
        return $this->getOne("signal_commentaire", $colonne, $id);
    }


    public function getAllSignalComm() {
        $sgCom = $this->getAll("signal_commentaire");
        $tab = [];
        
        while( $sc = $sgCom->fetch() ){
            $tab[] = new SignalComment($sc);
        }
        return $tab;
    }

    public function get_element($table, $colonne1, $colonne2, $id) {
        $res = $this->execRequete("SELECT * FROM $table as t, signal_commentaire as sc "
                . "WHERE t.$colonne1 = sc.$colonne2 AND sc.id = ?", [$id]);
        return $res->fetch();
    }
    
    
}
