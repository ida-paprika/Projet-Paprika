<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function render( $page, array $data = null ){
    $pages = "vue/".$page.".php";
    $pages = str_replace("../", "protect", $pages);
    $pages = str_replace(";", "protect", $pages);
    $pages = str_replace("%", "protect", $pages);
    
    if(!file_exists($pages) ){
        throw new MesExceptions("Cette page n'existe pas :(");
    }
    ob_start();
    !empty($data) ? extract($data) : '';
    require $pages;
    $content = ob_get_clean();
    require 'vue/template.php';
}
