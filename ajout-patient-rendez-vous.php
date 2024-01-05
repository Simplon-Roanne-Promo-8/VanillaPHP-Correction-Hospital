<?php include './partials/header.php'?>

<section class="container my-4">

    <h1 class="my-4">Ajouter un patient + un rendez vous</h1>
    <form action="./process/patient/process-ajout-patient-rendez-vous.php" method="post">
        <div class="mb-3">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="firstname" class="form-control" id="firstname" name="firstname" placeholder="John">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Nom</label>
            <input type="lastname" class="form-control" id="lastname" name="lastname" placeholder="Doe">
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Birthdate</label>
            <input type="date" class="form-control" id="date" name="birthdate" >
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="mail" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Telephone</label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="0601020304">
        </div>
        <h2>Ajouter le rendez-vous directement au patient</h2>
        <div class="mb-3">
            <label for="datehour" class="form-label">Date et heure du rendez vous</label>
            <input type="datetime-local" class="form-control" id="datehour" name="datehour" id="">
        </div>
        <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
</section>


<?php include './partials/footer.php'?>
