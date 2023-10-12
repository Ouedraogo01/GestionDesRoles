<?php

//criptage du mot de  passe

function securise($string)
{
    //On verifie si le type de string  est un entier  (int)
    if (ctype_digit($string)) {
        $string = intval($string);
    } else {
        //Pour tout les autres types
        $string = strip_tags($string);
        $string = addcslashes($string, '%_');
    }
    return $string;
}

function passwordHash($pass)
{
    $pass = sha1(md5($pass));
    return $pass;
}

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

//update users
if (isset($_POST['submit'])) {

    $nouveauNom = $_POST['nom'];
    $nouveauPrenom = $_POST['prenom'];
    $nouveauEmail = $_POST['email'];
    $nouveauMdp = $_POST['mdp'];
    $role = $_POST['role'];
    $date = date('d/m/y à H:i:s');


    //Modification des données
    if (isset($_GET['id_users']) && is_numeric($_GET['id_users'])) {

        $utilisateur = $_GET['id_users'];

        $sql = "UPDATE connexion 
            SET nom= '$nouveauNom', prenom= '$nouveauPrenom', email= '$nouveauEmail', mdp= '$nouveauMdp', role= '$role', date= '$date' 
            WHERE id_users= :id_users";

        $query = $connexion->prepare($sql);
        $query->bindParam(':id_users', $utilisateur, PDO::PARAM_INT);



        if ($conexion->query($sql) === TRUE) {

            header("location: users.php");
        } else {
            $return = "Erreur lors de la mise à jour.";
        }
    } else {
        echo "erreur lors de la modification.";
    }

}

//Supression des membres

// if (isset($_GET['id_use']) && is_numeric($_GET['id_use'])) {

//     $utilisateur = $_GET['id_use'];

//     $requete = $connexion->prepare("DELETE FROM connexion WHERE id_users = '$utilisateur'");

//     if ($requete->execute()) {
//         echo "utilisateur supprimée";
//         header("location: users.php");
//     } else {
//         echo "Erreur lors de la suppression de l'utilisateur.";
//     }

// } else {
//     echo "ID de l'utilisateur non specifé.";
// }
?>

<?php if (isset($_POST['valider']) and isset($return))
    echo "<p class='erreur'>" . $return . "</p>"; ?>