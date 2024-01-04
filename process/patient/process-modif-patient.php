<?php

include '../../config/debug.php';

if (!empty($_POST['firstname']) 
    && !empty($_POST['lastname'])
    && !empty($_POST['birthdate'])
    && !empty($_POST['mail'])
    && !empty($_POST['id'])
    && !empty($_POST['phone'])) {
        //Connexion a la BDD
        require_once '../../config/connexion.php';
        //Préparation de la requete SQL 
        $preparedRequest = $connexion->prepare(
            "UPDATE patients SET firstname=?, lastname=?,birthdate=?,phone=?,mail=? WHERE id=?"
        );
        // Lancement de la requete sql
        $preparedRequest->execute([
            $_POST['firstname'],
            $_POST['lastname'],
            $_POST['birthdate'],
            $_POST['phone'],
            $_POST['mail'],
            $_POST['id']
        ]);

        // Redirection de l'utilisateur sur la page index ou list-patient
        header('Location: ../../detail-patient.php?success=Le patient à bien été modifié !&id='.$_POST['id']);
}else{
    header('Location: ../../modif-patient.php?error=Erreur lors de la modification du patient&id='.$_POST['id']);
}