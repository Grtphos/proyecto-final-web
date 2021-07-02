<?php
/*
 Script loader.php
 */

 include_once 'config/config.inc.php';
 include_once 'helpers/helpers.php';
 include_once 'includes/fpdf183/fpdf.php';
 
 #carga de clases ///revisar PSR-4
 spl_autoload_register(function($nombreClase){
    include_once 'libraries/' . $nombreClase . '.php';
    });