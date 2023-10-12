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

$req = $connexion->prepare('SELECT * FROM connexion');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="modif_utilisateur.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:ital,wght@0,400;0,600;1,600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Update</title>
</head>

<body>

    <!-- Pour modifier un membre -->

    <div id="modifier" class="connexion mt-5">
        <section class="inscription">
            <h1> Edit User </h1>

            <?php if (isset($_POST['valider']) and isset($return))
                echo "<p class='erreur'>" . $return . "</p>"; ?>

            <?php

            if (isset($_GET['id_users']) && is_numeric($_GET['id_users'])) {


                $utilisateur = $_GET['id_users'];
                $req = "SELECT * FROM connexion WHERE id_users = :id_users";
                $query = $connexion->prepare($req);
                $query->bindParam(':id_users', $utilisateur, PDO::PARAM_INT);

                if ($query->execute()) {
                    $row = $query->fetch(PDO::FETCH_ASSOC);

                    if (!$row) {
                        echo "Utilisateur non trouvé.";
                    } else {


                        echo "
                        <form action='#' method='POST'>
                        <div class='ins m-3'>
                            <div class='in m-3'>
                            <input type='hidden' name='id_users' value='" . $row['id_users'] . "'>
                            <label class='label' for='nom'>Nom</label>
                            <input type='text' name='nom' value='" . $row['nom'] . "'>
                            </br>
                            <label class='label' for='prenom'>Prenom</label>
                            <input type='text' name='prenom' value='" . $row['prenom'] . "'>
                            </br>
                            <label class='label' for='email'>Email</label>
                            <input type='email' name='email' value='" . $row['email'] . "'>
                            </div>
                            <div class='m-3'>
                            <label class='label' for='mdp'>Mot de passe</label>
                            <input type='password' name='mdp' value='" . $row['mdp'] . "'>
                            </br>
                            <label class='label' for='role'>Role</label>
                            <input type='text' name='role' value='" . $row['role'] . "'>
                            </div>
                        </div>
                        </br>
                        <div class='text-center'>
                            <input type='submit' name='submit' value='Valider'>
                        </div>
                        </form>";
                    }

                } else {
                    echo "Erreur lors de la recuperation";
                }
            } else {
                echo "ID non specifié";
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



                    if ($query->execute()) {

                        header("location: users.php");
                    } else {
                        $return = "Erreur lors de la mise à jour.";
                    }
                } else {
                    echo "erreur lors de la modification.";
                }

            }

            ?>

        </section>
    </div>

    <script src=" bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="dash.js"></script>
</body>

</html>