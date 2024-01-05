<?php

include '../../config/debug.php';

if (!empty($_POST['firstname']) 
    && !empty($_POST['lastname'])
    && !empty($_POST['birthdate'])
    && !empty($_POST['mail'])
    && !empty($_POST['phone'])
    && !empty($_POST['datehour'])) {
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

        // Select du Patient que je vien d'enregistrer en BDD pour récuperer l'id
        $idPatient = $connexion->lastInsertId();

        // Ajout du rendez vous au patient
        $preparedRequest = $connexion->prepare(
            "INSERT INTO appointments (idPatients , dateHour) VALUES (?,?)"
        );
        // Lancement de la requete sql
        $preparedRequest->execute([
            $idPatient,
            $_POST['datehour']
        ]);
        // Redirection de l'utilisateur sur la page index ou list-patient
        header('Location: ../../list-patient.php?success=Le patient à bien été enregistré en plus de son rendez-vous !');
}else{
    header('Location: ../../ajout-patient-rendez-vous.php?error=Erreur lors de l\'enregisterment du patient et du rendez-vous');
}