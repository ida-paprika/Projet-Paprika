<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Mdl\modele;

/**
 * Description of ModeleGenerique
 *
 * @author ilo
 */
abstract class ModeleGenerique {

    private $pdo;
    private static $numImg = 1;


    public function connect(){
        $this->pdo = new \PDO('mysql:host=localhost;dbname=ilo_partage', 'root', '', 
                [
                    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
                ]);
        $this->pdo->exec("SET NAMES 'utf8'");
        return $this->pdo;
    }
    
    public function execRequete($query, array $params = null){
        $res = $this->connect()->prepare($query);
        if( !empty($params) ){
            foreach ($params as $key => $value){
                $params[$key] = htmlspecialchars($value);
            }
        }
        $res->execute($params);
        return $res;
    }
    
    public function getAll($table){
        $res = $this->execRequete("SELECT * FROM $table");
        return $res;
    }

    public function getOne($table, $colonne, $id){
        $res = $this->execRequete("SELECT * FROM $table WHERE $colonne = ?", [$id]);
        return $res->fetch();
    }
    
    public function getAll_dateF($colonne, $table){
        $res = $this->execRequete("SELECT *, DATE_FORMAT($colonne, '%d/%m/%Y à %H:%i:%s') FROM $table");
        return $res;
    }

    public function getOne_dateF($colonne1, $table, $colonne2, $id){
        $res = $this->execRequete("SELECT *, DATE_FORMAT($colonne1, '%d/%m/%Y à %H:%i:%s') FROM $table WHERE $colonne2 = ?", [$id]);
        return $res->fetch();
    }
    
    public function getDateFormat($colonne1, $table, $colonne2, $param) {
        $res = $this->execRequete("SELECT DATE_FORMAT($colonne1, '%d/%m/%Y à %H:%i:%s')"
                . " FROM $table WHERE $colonne2 = ?", [$param]);
        return $res->fetch();
    }
    
    public function getAll_DateDiff($table, $unit, $date, $num) {
        $res = $this->execRequete("SELECT * FROM $table WHERE TIMESTAMPDIFF($unit, $date, now() ) < $num");
        return $res;
    }

    public function validate( $champ, $min = 2, $max = 20 ){

        $champ = trim($champ);
        $champ = stripslashes($champ);
        $champ = htmlentities($champ);

        if (strlen($champ) >= $min && strlen($champ) <= $max ){
            return $champ;
        }else{
            $_SESSION['message'] = "Nombre de caractères incorrect";
        }
    }
    
    public function imageValidate($image, $champ1, $champ2, $dossier){
            $infoFic = pathinfo($image['name']);
            $extensions = ["jpg", "jpeg", "gif", "png"];
            $titre = $champ1."_".$champ2;

            if($image['size'] < 1500000 && in_array($infoFic['extension'], $extensions)){
                $nom_img = $titre.".".$infoFic['extension'];

                move_uploaded_file($image['tmp_name'], 'images/'.$dossier.'/'.$nom_img);
                return $nom_img;
            }else{
                return false;
            }
    }

    abstract function ajouter($param1, $param2, $param3);
    
    abstract function modifier($param1, $param2, $param3);
    
    abstract function supprimer($param, $param2);
     
    

    
}
