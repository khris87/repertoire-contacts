<?php include 'header.php';

  include 'fonction.php';

?>

<h1 class="jumbotron text-primary">Nouveau contact</h1>

  <div id="blocForm" class="container">

      <form action="traitementForm.php" method="post"><!--formulaire de nouveau contact-->

          <div class="form-group">
            <label for="inputNom">Nom</label>
            <input type="text" name="nom" class="form-control form-control-lg" id="inputNom">

            <label for="inputPrenom">Prénom</label>
            <input type="text" name="prenom" class="form-control" id="inputPrenom">

            <label for="inputDatenaissance">Date de naissance</label>
            <input type="date" name="datenaissance" class="form-control" id="inputDatenaissance">

            <label for="inputAdresse">Adresse</label>
            <textarea class="form-control" name="adresse" id="inputAdresse" rows="3"></textarea>

            <label for="inputEmail">Adresse Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail">

            <label for="inputTel">Numéro de téléphone</label>
            <input type="text" name="tel" class="form-control" id="inputTel">
          </div>

          <h6 class="text-secondary pt-3">Relation</h6>
          <?php $getRelation=getRelation($bdd);
            while ($rel=$getRelation->fetch()) { ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="relation" id="radios1" value="<?php echo $rel['id'] ?>">
              <label class="form-check-label" for="radios1">
                <?php echo $rel['nomrelation'] ?>
              </label>
            </div>
          <?php } ?>

          <h6 class="text-secondary pt-3">Centres d'interêts</h6>

          <?php $getInterests=getInterests($bdd);
            while ($int=$getInterests->fetch()) { ?>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="idinteret[]" id="interet<?php echo $int['id'] ?>" value="<?php echo $int['id'] ?>">
              <label class="form-check-label" for="idinteret">
              <?php echo $int['typeinteret'] ?>
              </label>
            </div>
          <?php } ?>
        <button type="submit" class="btn btn-primary btn-lg mt-4">Envoyer</button>
      </form>
  </div>

<?php include 'footer.php' ?>