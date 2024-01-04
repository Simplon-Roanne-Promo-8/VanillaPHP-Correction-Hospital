<?php
require_once './config/connexion.php';

$preparedRequest =  $connexion->prepare("SELECT * FROM patients");
$preparedRequest->execute();
$patients = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($patients);
// echo '</pre>';

?>

<?php include './partials/header.php' ?>


<section class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Birthdate</th>
                <th scope="col">Mail</th>
                <th scope="col">Phone</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient) {?>
                <tr>
                    <th><?= $patient['id'] ?></th>
                    <th><?= $patient['firstname'] ?></th>
                    <th><?= $patient['lastname'] ?></th>
                    <th><?= $patient['birthdate'] ?></th>
                    <th><?= $patient['mail'] ?></th>
                    <th><?= $patient['phone'] ?></th>
                    <th>
                        <a href="./detail-patient.php?id=<?= $patient['id'] ?>" class="btn btn-info text-white">Voir</a>
                        <a href="./modif-patient.php?id=<?= $patient['id'] ?>" class="btn btn-warning text-white">Modifier</a>
                        <a href="./process/patient/process-delete-patient.php?id=<?= $patient['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>


<?php include './partials/footer.php' ?>