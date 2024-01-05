<?php

if (!empty($_POST['datehour']) &&
    !empty($_GET['id'])
) {
    // Connection à la bdd 
    require_once "../../config/connexion.php";
    //Préparation de la requete SQL 
    $preparedRequest = $connexion->prepare(
        "UPDATE appointments SET dateHour=?  WHERE id=?"
    );
    // Lancement de la requete sql
    $preparedRequest->execute([
        $_POST['datehour'],
        $_GET['id']
    ]);
    header('Location: ../../list-rendez-vous.php?success=Le rendez-vous à bien été modifié !');
}else{
    header('Location: ../../ajout-rendez-vous.php?error=Erreur lors de la modification du rendez-vous');
}