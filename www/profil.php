<?php include 'header.php' ;

    include 'fonction.php';

    $recup=$_GET['id'];

    $repContact=getContactsInfos($bdd,$recup);
?>
        <h1 class="jumbotron text-primary">Profil de :
            <?php $rep=$repContact->fetch();
                echo $rep['nom'].' '.$rep['prenom'] ?>
        </h1>
        
            <div id="blocProfil" class="container">
        
                <div class="row d-flex justify-content-between">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><h2 class="text-uppercase text-info"><?php echo $rep['nomrelation'] ?></h2></li>
                        <li class="list-group-item"><h4 class="text-info">Adresse :</h4><br><?php echo $rep['adresse'] ?></li>
                        <li class="list-group-item"><h4 class="text-info">Numéro de téléphone :</h4><br><?php echo $rep['tel'] ?></li>
                        <li class="list-group-item"><h4 class="text-info">Date de naissance :</h4><br><?php echo date_format(date_create($rep['datenaissance']),'d/m/Y') ?></li>
                        <li class="list-group-item"><h4 class="text-info">Centres d'interêts :</h4><br>
                            <ul id="listInteret"><?php $repInteret=getContactsInterests($bdd,$recup);
                                                    while ($interet=$repInteret->fetch()) { ?>
                                <li><?php echo $interet['typeinteret'] ?></li>
                                    <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    <img class="border border-secondary rounded" src="img/<?php echo $rep['photo']; ?>" alt="photo">
                </div>

            </div>
    
<?php include 'footer.php' ?>