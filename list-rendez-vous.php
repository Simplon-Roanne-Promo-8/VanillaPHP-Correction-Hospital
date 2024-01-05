<?php
require_once './config/connexion.php';

$preparedRequest =  $connexion->prepare(
    "SELECT appointments.id AS appointment_id, appointments.dateHour, patients.* 
        FROM appointments 
    JOIN patients 
        ON patients.id = appointments.idPatients"
);
$preparedRequest->execute();
$appointments = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($appointments);
// echo '</pre>';
?>

<?php include './partials/header.php' ?>


<section class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">dateHour</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment) { ?>
                <tr>
                    <th><?= $appointment['appointment_id'] ?></th>
                    <th><?= $appointment['dateHour'] ?></th>
                    <th><?= $appointment['firstname'] ?></th>
                    <th><?= $appointment['lastname'] ?></th>
                    <th>
                        <a href="./detail-rendez-vous.php?id=<?= $appointment['appointment_id'] ?>" class="btn btn-info text-white">Voir</a>
                        <a href="./modif-rendez-vous.php?id=<?= $appointment['appointment_id'] ?>" class="btn btn-warning text-white">Modifier</a>
                        <a href="./process/rdv/process-delete-rendez-vous.php?id=<?= $appointment['appointment_id'] ?>" class="btn btn-danger">Supprimer</a>
                    </th>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</section>


<?php include './partials/footer.php' ?>