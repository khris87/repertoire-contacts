<?php

try {
    $bdd=new PDO('mysql:host=localhost; dbname=repertoire; charset=utf8',
        'root',
        'Eddard87');
}catch(Exception $e){
    die('Erreur: '.$e->getMessage());
}