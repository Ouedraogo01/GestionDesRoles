<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);


try {
    $contact = new PDO(
        'mysql:host=localhost;dbname=sitevoyage',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die("Error " . $e->getMessage());
}

if (isset($_POST['envoyer'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = $contact->prepare("INSERT INTO inscription (nom, email, subject, message)
                VALUES (:nom, :email, :subject, :message)");

    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':email', $email);
    $sql->bindParam(':subject', $subject);
    $sql->bindParam(':message', $message);
    $sql->execute();

    if ($sql->execute()) {
        echo "Votre message à bien été envoyé";
    } else {
        echo "echec, problème technique";
    }
}

if (isset($_GET['id_contact']) && is_numeric($_GET['id_contact'])) {

    $id_contacts = $_GET['id_contact'];

    $requete = $contact->prepare("DELETE FROM inscription WHERE id_inscri = '$id_contacts'");

    if ($requete->execute()) {
        echo "message supprimée";
        header("location: site_contact.php");
    } else {
        echo "Erreur lors de la suppression du message.";
    }

} else {
    echo "ID du message non specifé.";
}
?>