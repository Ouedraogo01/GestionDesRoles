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

$req = $connexion->prepare('SELECT * FROM ville');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin dashboard</title>

    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/fontawesome.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/solid.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/solid.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/svg-with-js.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/svg-with-js.min.css">

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="city.css">
</head>

<body>

    <!-- Pour modifier une ville -->
    <!-- Modal -->
    <div class="editer">
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editModalLabel">Edit a city</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php

                        if (isset($_GET['id_vill']) and is_numeric($_GET['id_vill'])) {


                            $villes = $_GET['id_vill'];
                            $req = $connexion->prepare("SELECT * FROM ville WHERE id_ville = $villes");

                            if ($req->execute()) {
                                $row = $req->fetch(PDO::FETCH_ASSOC);

                                if (!$row) {
                                    echo "Ville non trouvé.";
                                } else {

                                    echo "
                                                <form action='traitementVille.php' method='POST'>
                                                <input type='hidden' name='userID' value='" . $row['id_ville'] . "'>
                                                    <label class='label' for='nomVille'>Nom de la ville</label>
                                                    <input type='text' name='nom_ville' value='" . $row['nom_ville'] . "'>
                                                    </br>
                                                    <label class='label' for='description'>Description</label>
                                                    <input type='text' name='texte' value='" . $row['texte'] . "'>
                                                    </br>
                                                    <label class='label' for='decouvrir'>Decouvrir</label>
                                                    <input type='text' name='bouton' value='" . $row['bouton'] . "' readonly>
                                                    </br>
                                                    <label class='label' for='photo'>Photo de la ville</label>
                                                    <input type='file' name='photo_ville' id='photo' value='" . $row['photo_ville'] . "'>

                                                    </br>
                                                    <div class='text-center'>
                                                        <input type='submit' name='modifier' value='Modifier'>
                                                    </div>
                                                </form>";
                                }

                            } else {
                                echo "Erreur lors de la recuperation";
                            }
                        } else {
                            echo "ID non specifié";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-5.3.1-dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>
</body>

</html>