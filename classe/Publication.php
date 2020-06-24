<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of Publications
 *
 * @author ilo
 */
class Publication extends Generique {
    
    protected $id_publication;
    protected $titre;
    protected $recompense;
    protected $resume;
    protected $a_propos;
    protected $avis;
    protected $avis_detail;
    protected $lien;
    protected $img_bg;
    protected $police;
    protected $id_user;
    protected $date_publication;

    
    function __construct(array $data) {
        parent::__construct($data);
    }
        
    function getId_publication() {
        return $this->id_publication;
    }

    function getTitre() {
        return $this->titre;
    }
    
    function getRecompense() {
        return $this->recompense;
    }

    function getResume() {
        return $this->resume;
    }
    
    function getA_propos() {
        return $this->a_propos;
    }

    function getAvis() {
        return $this->avis;
    }
    
    function getAvis_detail() {
        return $this->avis_detail;
    }

    function getLien() {
        return $this->lien;
    }

    function getImg_bg() {
        return $this->img_bg;
    }

    function getPolice() {
        return $this->police;
    }

    function getId_user() {
        return $this->id_user;
    }

    function getDate_publication() {
        return $this->date_publication;
    }

    function setId_publication($id_publication): void {
        $this->id_publication = $id_publication;
    }

    function setTitre(string $titre): void {
        $this->titre = $titre;
    }
    
    function setRecompense($recompense): void {
        $this->recompense = $recompense;
    }

    function setResume(string $resume): void {
        $this->resume = $resume;
    }
    
    function setA_propos($a_propos): void {
        $this->a_propos = $a_propos;
    }

    function setAvis(string $avis): void {
        $this->avis = $avis;
    }
    
    function setAvis_detail($avis_detail): void {
        $this->avis_detail = $avis_detail;
    }

    function setLien(string $lien): void {
        $this->lien = $lien;
    }

    function setImg_bg(string $img_bg): void {
        $this->img_bg = $img_bg;
    }

    function setPolice(string $police): void {
        $this->police = $police;
    }

    function setId_user(int $id_user): void {
        $this->id_user = $id_user;
    }

    function setDate_publication($date_publication): void {
        $this->date_publication = $date_publication;
    }


    
}
