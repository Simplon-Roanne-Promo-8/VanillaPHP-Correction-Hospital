<?php
    if (!empty($_GET['id'])) {

        require_once './config/connexion.php';

        $preparedRequest = $connexion->prepare(
            "SELECT appointments.id AS appointment_id, appointments.dateHour, patients.* 
                FROM appointments 
            JOIN patients 
                ON patients.id = appointments.idPatients
            WHERE appointments.id = ?
        ");
        $preparedRequest->execute([
            $_GET['id']
        ]);
        $appointment = $preparedRequest->fetch(PDO::FETCH_ASSOC);
    }else{
        header('Location: ./list-rendez-vous.php?error=Veuillez réessayer');
    }
?>

<?php include './partials/header.php' ?>
<section class="container d-flex flex-column align-items-center">
    <div class="card" style="width: 18rem;">
        <img src="https://i.ytimg.com/vi/tR9FDRaBWEY/sddefault.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $appointment['firstname'] ?> <?= $appointment['lastname'] ?></h5>
            <ul>
                <li><?= $appointment['birthdate'] ?></li>
                <li><?= $appointment['phone'] ?></li>
                <li><?= $appointment['mail'] ?></li>
            </ul>
            <div class="d-flex justify-content-center">
                <a href="./modif-patient.php?id=<?= $appointment['id'] ?>" class="btn btn-warning text-white mx-2">Modifier</a>
                <a href="./process/patient/process-delete-patient.php?id=<?= $appointment['id'] ?>" class="btn btn-danger mx-2">Supprimer</a>
            </div>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">dateHour</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?= $appointment['appointment_id'] ?></th>
                <th><?= $appointment['dateHour'] ?></th>
                <th>
                    <a href="./modif-rendez-vous.php?id=<?= $appointment['appointment_id'] ?>" class="btn btn-warning text-white">Modifier</a>
                    <a href="./process/patient/process-delete-patient.php?id=<?= $appointment['appointment_id'] ?>" class="btn btn-danger">Supprimer</a>
                </th>
            </tr>
        </tbody>
    </table>
</section>
<?php include './partials/footer.php' ?>
