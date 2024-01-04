<?php

if (!empty($_GET['id'])) {

    require_once './config/connexion.php';

    $preparedRequest =  $connexion->prepare("SELECT * FROM patients WHERE id = " . $_GET['id']);
    $preparedRequest->execute();
    $patient = $preparedRequest->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: ./list-patient.php?error=Veuillez réessayer');
}
?>
<?php include './partials/header.php' ?>



<section class="container d-flex justify-content-center">

    <div class="card" style="width: 18rem;">
        <img src="https://i.ytimg.com/vi/tR9FDRaBWEY/sddefault.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $patient['firstname'] ?> <?= $patient['lastname'] ?></h5>
            <ul>
                <li><?= $patient['birthdate'] ?></li>
                <li><?= $patient['phone'] ?></li>
                <li><?= $patient['mail'] ?></li>
            </ul>
            <div class="d-flex justify-content-center">
                <a href="./modif-patient.php?id=<?= $patient['id'] ?>" class="btn btn-warning text-white mx-2">Modifier</a>
                <a href="" class="btn btn-danger mx-2">Supprimer</a>
            </div>
        </div>
    </div>
</section>



<?php include './partials/footer.php' ?>