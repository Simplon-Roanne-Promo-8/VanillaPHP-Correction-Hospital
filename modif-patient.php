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

<?php include './partials/header.php'?>



    <section class="container my-4">

        <h1 class="my-4">Modifier un patient</h1>
        <form action="./process/patient/process-modif-patient.php" method="post">
            <div class="mb-3">
                <label for="firstname" class="form-label">Prénom</label>
                <input type="firstname" value="<?= $patient['firstname']?>" class="form-control" id="firstname" name="firstname" placeholder="John">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Nom</label>
                <input type="lastname" value="<?= $patient['lastname']?>" class="form-control" id="lastname" name="lastname" placeholder="Doe">
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Birthdate</label>
                <input type="date" value="<?= $patient['birthdate']?>" class="form-control" id="date" name="birthdate" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" value="<?= $patient['mail']?>" class="form-control" id="email" name="mail" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telephone</label>
                <input type="phone" value="<?= $patient['phone']?>" class="form-control" id="phone" name="phone" placeholder="0601020304">
            </div>
            <input type="hidden" value="<?= $patient['id']?>" class="form-control" name="id">

            <button class="btn btn-lg btn-primary" type="submit">Modifier</button>
        </form>
    </section>



<?php include './partials/footer.php'?>
