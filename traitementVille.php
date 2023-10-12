<?php
try {
    $connexion = new PDO(
        'mysql:host=localhost;dbname=sitevoyage',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die("Error " . $e->getMessage());
}


//Formulaire d'ajout
if (isset($_POST['ajouter'])) {
    $nomVille = $_POST['nom_ville'];
    $photo = $_POST['photo_ville'];
    $description = $_POST['texte'];
    $bouton = $_POST['bouton'];

    if (!empty($nomVille) and !empty($photo) and !empty($description) and !empty($bouton)) {

        $query = $connexion->prepare("INSERT INTO ville (nom_ville, photo_ville, texte, bouton)
                                    VALUES ( '$nomVille', '$photo', '$description', '$bouton')");

        if ($query->execute()) {
            echo "ville ajouté avec succes";
            header("location: city.php");
        } else {
            echo "erreur lors de l'ajout de la ville";
        }

    } else
        echo "Veillé remplir tout les champs";
}

if (isset($_GET['id_vill']) && is_numeric($_GET['id_vill'])) {

    $id_villes = $_GET['id_vill'];

    $requete = $connexion->prepare("DELETE FROM ville WHERE id_ville = '$id_villes'");

    if ($requete->execute()) {
        echo "ville supprimée";
        header("location: city.php");
    } else {
        echo "Erreur lors de la suppression de la ville.";
    }

} else {
    echo "ID de la ville non specifé.";
}

//Formulaire de modification
if (isset($_POST['modifier'])) {
    $NouveauNomVille = $_POST['nom_ville'];
    $NouvellePhoto = $_POST['photo_ville'];
    $NouvelleeDescription = $_POST['texte'];
    $NouveauBouton = $_POST['bouton'];

    if (!empty($NouveauNomVille) and !empty($NouvellePhoto) and !empty($NouvelleDescription) and !empty($NouveauBouton)) {
        if (isset($_GET['data-id']) && is_numeric($_GET['data-id'])) {

            $id_villes = $_GET['data-id'];

            $requete = $connexion->prepare("UPDATE ville 
                                            SET nom_ville = '$NouveauNomVille', photo_ville = '$NouvellePhoto', texte = '$NouvelleDescription', 
                                            bouton = '$NouveauBouton' WHERE id_ville = '$id_villes'");

            if ($requete->execute()) {
                echo "ville modifié avec succes";
                header("location: city.php");
            } else {
                echo "Erreur lors de la modification de la ville.";
            }

        } else {
            echo "ID de la ville non specifé.";
        }


    }
}



?>