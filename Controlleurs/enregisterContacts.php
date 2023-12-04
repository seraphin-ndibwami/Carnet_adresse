<?php

require_once("../Models/Contact.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données depuis POST;

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        // Chemin de destination pour enregistrer l'image
        $uploadDirectory = 'Media/';
        
        // Récupérer le nom et l'extension du fichier
        $fileName = $_FILES['photo']['name'];
        $fileTmpName = $_FILES['photo']['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        
        $uniqueFileName = uniqid('image_') . '.' . $fileExtension;
        
        
        if (move_uploaded_file($fileTmpName, $uploadDirectory . $uniqueFileName)) {
            
            echo "L'image a été téléchargée avec succès et enregistrée sous le nom : " . $uniqueFileName;
        } else {
            
            echo "Une erreur est survenue lors de l'enregistrement de l'image.";
        }
    }


    $photo = $fileExtension ?? '';
    $nom = $_POST['nom'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $telephone = $_POST['telephone'] ?? '';
    $email = $_POST['email'] ?? '';
    $description = $_POST['description'] ?? '';

    // Inclure la classe Enregistreur
    include_once '../Models/Contact.php';

    // Appel à la classe Enregistreur pour enregistrer les données
    $enregistreur = new Contacts($photo, $nom, $adresse, $telephone, $email, $description);
    $message = $enregistreur->enregistrerBDD();

    header("Location:../Vues/enregisterContacts.php?message=". urlencode($message));
    exit();


} else {
    // Si la requête n'est pas de type POST, retourner un message d'erreur
    echo json_encode(["message" => "Méthode non autorisée"]);
}
?>
