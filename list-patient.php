<?php
require_once './config/connexion.php';

$countRequest =  $connexion->query("SELECT COUNT(*) AS nombre_patient FROM patients");
$countPatient = $countRequest->fetch();

$itemPerPage = 1;

$numberPages = ceil($countPatient['nombre_patient']/$itemPerPage);

$page = $_GET['page'] ?? 1;

if (!empty($_GET['search'])) {
    // Requete avec le nom du patient
    $preparedRequest =  $connexion->prepare("SELECT * FROM patients WHERE lastname LIKE '%". $_GET['search']."%'");
}else{
    $offset = $itemPerPage * ($_GET['page']-1);
    $preparedRequest =  $connexion->prepare("SELECT * FROM patients LIMIT ".$itemPerPage . " OFFSET ".$offset );
}

$preparedRequest->execute();
$patients = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);
?>

<?php include './partials/header.php' ?>


<section class="container">
    <form action="" method="get">
        <div class="mb-3">
            <label for="search" class="form-label">Rechercher un patient</label>
            <input type="text" class="form-control" id="search" name="search" placeholder="Recherche un patient avec son nom">
        </div>
        <button class="btn btn-primary" type="submit">Rechercher</button>
    </form>
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
    <?php if ($page - 1) {?>
        <a href="./list-patient.php?page=<?=$page-1?>">précédent</a>
    <?php } ?>
    <?php for ($i=1; $i <= $numberPages ; $i++) { ?>
        <a href="./list-patient.php?page=<?=$i?>"><?=$i?></a>
    <?php } ?>
    <?php if ($page + 1 <= $numberPages) {?>
        <a href="./list-patient.php?page=<?=$page + 1?>">suivant</a>
    <?php } ?>

</section>


<?php include './partials/footer.php' ?>