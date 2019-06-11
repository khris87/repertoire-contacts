<?php 
    include 'fonction.php';

if(isset($_POST)){
        newContact($bdd);
        $rec=newMail($bdd);
        $id=$rec['idc'];
        $interets=$_POST['idinteret'];
        foreach($interets as $interet){
            newInterests($bdd,$id,$interet);
        }
        header("Location: index.php");   
}