<?php 

if (!empty($_GET['id'])) {

    require_once './config/connexion.php';

    $preparedRequest =  $connexion->prepare("SELECT * FROM appointments WHERE id = " . $_GET['id']);
    $preparedRequest->execute();
    $appointment = $preparedRequest->fetch(PDO::FETCH_ASSOC);
} else {
    header('Location: ./list-patient.php?error=Veuillez réessayer');
}
?>

<?php include './partials/header.php'?>



    <section class="container my-4">
        <h1 class="my-4">Modifier un rendez vous</h1>
        <form action="./process/rdv/process-modif-rendez-vous.php?id=<?=$appointment['id']?>" method="post">
            <div class="mb-3">
                <label for="datehour" class="form-label">Date et heure du rendez vous</label>
                <input type="datetime-local" value="<?=$appointment['dateHour']?>" class="form-control" id="datehour" name="datehour">
            </div>
            <button class="btn btn-lg btn-primary" type="submit">Modifier</button>
        </form>
    </section>



<?php include './partials/footer.php'?>
