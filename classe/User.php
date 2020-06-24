<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\classe;

use App\classe\Generique;

/**
 * Description of User
 *
 * @author ilo
 */
class User extends Generique{
    
    protected $id;
    protected $pseudo;
    protected $mail;
    protected $mdp;
    protected $sexe;
    protected $avatar;
    protected $bio;
    protected $lien_site;
    protected $lien_fb;
    protected $lien_insta;
    protected $date_inscription;
    protected $statut;
    
    
    function __construct(array $data) {
        parent::__construct($data);
    }

    function getId() {
        return $this->id;
    }

    function getPseudo() {
        return $this->pseudo;
    }

    function getMail() {
        return $this->mail;
    }

    function getMdp() {
        return $this->mdp;
    }

    function getSexe() {
        return $this->sexe;
    }

    function getAvatar() {
        return $this->avatar;
    }

    function getBio() {
        return $this->bio;
    }

    function getLien_site() {
        return $this->lien_site;
    }

    function getLien_fb() {
        return $this->lien_fb;
    }

    function getLien_insta() {
        return $this->lien_insta;
    }

    function getDate_inscription() {
        return $this->date_inscription;
    }

    function getStatut() {
        return $this->statut;
    }

    function setId(int $id): void {
        $this->id = $id;
    }

    function setPseudo(string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    function setMail(string $mail): void {
        $this->mail = $mail;
    }

    function setMdp(string $mdp): void {
        $this->mdp = $mdp;
    }

    function setSexe(string $sexe): void {
        $this->sexe = $sexe;
    }

    function setAvatar($avatar): void {
        $this->avatar = $avatar;
    }

    function setBio($bio): void {
        $this->bio = $bio;
    }

    function setLien_site($lien_site): void {
        $this->lien_site = $lien_site;
    }

    function setLien_fb($lien_fb): void {
        $this->lien_fb = $lien_fb;
    }

    function setLien_insta($lien_insta): void {
        $this->lien_insta = $lien_insta;
    }

    function setDate_inscription($date_inscription): void {
        $this->date_inscription = $date_inscription;
    }

    function setStatut(string $statut): void {
        $this->statut = $statut;
    }


    
}
