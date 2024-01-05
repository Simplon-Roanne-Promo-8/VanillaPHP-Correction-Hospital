<?php

if (!empty($_POST['idPatient'])
    && !empty($_POST['datehour'])) {
    
    // Connection à la bdd 
    require_once "../../config/connexion.php";
    //Préparation de la requete SQL 
    $preparedRequest = $connexion->prepare(
        "INSERT INTO appointments (idPatients , dateHour) VALUES (?,?)"
    );
    // Lancement de la requete sql
    $preparedRequest->execute([
        $_POST['idPatient'],
        $_POST['datehour']
    ]);
    header('Location: ../../list-rendez-vous.php?success=Le rendez-vous à bien été enregistré !');
}else{
    header('Location: ../../ajout-rendez-vous.php?error=Erreur lors de l\'enregisterment du rendez-vous');
}