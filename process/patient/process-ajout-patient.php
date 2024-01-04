<?php

include '../../config/debug.php';

if (!empty($_POST['firstname']) 
    && !empty($_POST['lastname'])
    && !empty($_POST['birthdate'])
    && !empty($_POST['mail'])
    && !empty($_POST['phone'])) {
        //Connexion a la BDD
        require_once '../../config/connexion.php';
        //Préparation de la requete SQL 
        $preparedRequest = $connexion->prepare(
            "INSERT INTO patients (firstname , lastname, birthdate, mail, phone) VALUES (?,?,?,?,?)"
        );
        // Lancement de la requete sql
        $preparedRequest->execute([
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['birthdate'],
            $_POST['mail'],
            $_POST['phone']
        ]);
        // Redirection de l'utilisateur sur la page index ou list-patient
        header('Location: ../../list-patient.php?success=Le patient à bien été enregistré !');
}else{
    header('Location: ../../ajout-patient.php?error=Erreur lors de l\'enregisterment du patient');
}