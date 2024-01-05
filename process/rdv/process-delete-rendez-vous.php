<?php

if (!empty($_GET['id'])) {
    //Connexion a la BDD
    require_once '../../config/connexion.php';

    $preparedRequest = $connexion->prepare(
        "DELETE FROM appointments WHERE id = ?"
    );
    // Lancement de la requete sql
    $preparedRequest->execute([
        $_GET['id']
    ]);

    header('Location: ../../list-rendez-vous.php?success=Le rendez-vous à bien été supprimé !');
}else{
    header('Location: ../../list-patient.php?error=Erreur lors de la suppression du rendez-vous');
}