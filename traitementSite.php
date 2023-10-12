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
if (isset($_POST['ajouter-lieu'])) {
    $photo = $_POST['photo'];
    $nomLieu = $_POST['nom'];

    if (!empty($photo) and !empty($nomLieu)) {
        if (isset($_GET['id_villes']) && is_numeric($_GET['id_vill'])) {
            $villes = $_GET['id_villes'];

            $query = $connexion->prepare("INSERT INTO lieu (photo, nom)
                                        VALUES ('$photo', '$nomLieu') WHERE id_ville = $villes");

            if ($query->execute()) {
                echo "lieu ajouté avec succes";
                header("location: site_banfora.php");
            } else {
                echo "erreur lors de l'ajout de la ville";
            }
        } else {
            echo "id nom recuperé";
        }
    } else
        echo "Veillé remplir tout les champs";
}
?>