<?php

include 'connexion.php';

function getContacts($bdd){
    $reponse=$bdd->query('SELECT `nom`,`prenom`,`adresse`,`nomrelation`,`idc` FROM `contacts` 
                            INNER JOIN `relation` 
                            ON `contacts`.`idrelation` = `relation`.`id`');
    return $reponse;
}

function getContactsInfos($bdd,$recup){
    $reponse=$bdd->query('SELECT `nom`,`prenom`,`datenaissance`,`adresse`,`tel`,`photo`,`nomrelation` 
                            FROM `contacts`
                            INNER JOIN `relation`
                            ON `relation`.`id`=`contacts`.`idrelation` 
                            WHERE `contacts`.`idc`=' .$recup);
    return $reponse;
}

function getContactsInterests($bdd,$recup){
    $reponse=$bdd->query('SELECT `typeinteret` FROM `centreinteret` 
                            INNER JOIN `interetparcontact` 
                            ON `interetparcontact`.`idinteret`=`centreinteret`.`id` 
                            INNER JOIN `contacts`
                            ON `contacts`.`idc`=`interetparcontact`.`idcontact` 
                            WHERE `contacts`.`idc`= ' .$recup);
    return $reponse;
}

function getRelation($bdd){
    $reponse=$bdd->query('SELECT * FROM `relation`');
    return $reponse;
}

function getInterests($bdd){
    $reponse=$bdd->query('SELECT * FROM `centreinteret`');
    return $reponse;
}

function newContact($bdd){
    $query=$bdd->prepare('INSERT INTO contacts(nom,prenom,datenaissance,email,adresse,tel,idrelation)
                VALUES (:nom,:prenom,:datenaissance,:email,:adresse,:tel,:relation)');
    
    $query->execute([
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'datenaissance'=>$_POST['datenaissance'],
        'email'=>$_POST['email'],
        'adresse'=>$_POST['adresse'],
        'tel'=>$_POST['tel'],
        'relation'=>$_POST['relation'],
]);
}

function newMail($bdd){
    $mail=$_POST['email'];
    $newMail=$bdd->query('SELECT idc FROM contacts WHERE email ="' .$mail. '";');
    $recupe=$newMail->fetch();
    return $recupe;
}

function newInterests($bdd,$id,$interet){
    $query=$bdd->prepare('INSERT INTO interetparcontact(idcontact,idinteret)
                    VALUES (:idcontact,:idinteret)');

    $query->execute([
        'idcontact'=>$id,
        'idinteret'=>$interet
]);
}

function tri(){
    $reponse=$bdd->query('SELECT nom,prenom,adresse,nomrelation,idc FROM `contacts` INNER JOIN relation ON contacts.idrelation = relation.id WHERE id = 1');
    return $reponse;
}