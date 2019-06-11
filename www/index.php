<?php include 'header.php';

    include 'fonction.php' ?>

<div class="jumbotron d-flex justify-content-between">
    <h1 class="text-primary">Répertoire de contacts Web</h1>
    <a href="formulaire.php" id="add" class="btn btn-outline-primary" role="button"><i class="fas fa-plus fa-3x"></i></a>
</div>

<section id="blocRepertoire">

    <div class="container">

        <div class="row">

<?php 
    $reponse=getContacts($bdd);
    while ($donnees=$reponse->fetch()) {
        ?>
            <div class="card col-11 col-md-5 col-lg-3 p-0 m-1">
                <div class="card-header">
                    <?php echo $donnees['nomrelation'] ?>
                </div>
                    <div class="card-body">

                        <h3 class="card-title"><a class="text-primary" href="profil.php?id=<?php echo $donnees['idc'] ?>">
                            <?php echo $donnees['nom'].' '.$donnees['prenom'] ?>
                        </a></h3>
                        <p class="card-text text-secondary">
                            <?php echo $donnees['adresse'] ?>
                        </p>
                    </div>
            </div>

        <?php 
    }
?>
        </div>

    </div>

</section>

<?php include 'footer.php' ?>