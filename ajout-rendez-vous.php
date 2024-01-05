<?php
require_once './config/connexion.php';

$preparedRequest =  $connexion->prepare("SELECT * FROM patients");
$preparedRequest->execute();
$patients = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($patients);
// echo '</pre>';

?>

<?php include './partials/header.php'?>

<section class="container">
    <h1>Ajout rendez vous</h1>

    <form action="./process/rdv/process-ajout-rendez-vous.php" method="post">
        <div class="mb-3">
            <label for="selectPatient" class="form-label">Choisir le patient</label>
            <select id="selectPatient" class="form-select" name="idPatient">
                <?php foreach ($patients as $patient) { ?>
                    <option value="<?=$patient['id']?>"><?=$patient['lastname']?> <?=$patient['firstname']?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="datehour" class="form-label">Date et heure du rendez vous</label>
            <input type="datetime-local" class="form-control" id="datehour" name="datehour" id="">
        </div>

        <button class="btn btn-primary" type="submit">Envoyer</button>
    </form>

</section>


<?php include './partials/footer.php'?>