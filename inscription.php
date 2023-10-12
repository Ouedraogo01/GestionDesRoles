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

//Formulaire d'inscription
if (isset($_POST['inscription'])) {
    $nom = securise($_POST['nom']);
    $prenom = securise($_POST['prenom']);
    $email = securise($_POST['email']);
    $mdp = securise($_POST['mdp']);
    $mdp2 = securise($_POST['mdp2']);
    $role = securise($_POST['role']);
    $date = date('d/m/y à H:i:s');

    if (!empty($nom) and !empty($prenom) and !empty($email) and !empty($mdp) and !empty($mdp2) and !empty($role)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($mdp == $mdp2) {
                $TestEmail = $connexion->query("SELECT id_users FROM connexion WHERE email = '$email' ");
                if ($TestEmail->rowCount() < 1) {
                    $mdp = passwordHash($mdp);
                    $connexion->query("INSERT INTO connexion (nom, prenom, email, mdp,role, date)
                            VALUES ( '$nom', '$prenom', '$email', '$mdp', '$role', '$date')");
                    header("location:connexion.php");
                } else
                    $return = "Cette adresse email contient déjà un compte, essayer de vous connecter.";

            } else
                $return = "Le mot de passe ne correspond pas.";
        } else
            $return = "L'email est invalide !";
    } else
        $return = "Veillez remplir tout les champs.";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="inscription.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:ital,wght@0,400;0,600;1,600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inscription</title>
</head>

<body>

    <?php include('header.php'); ?>

    <div class="connexion bg-body-secondary mt-5">
        <section class="inscription">
            <h1> Formulaire d'inscription </h1>

            <?php if (isset($_POST['inscription']) and isset($return))
                echo "<p class='erreur'>" . $return . "</p>"; ?>

            <form action="" method="POST">
                <div class="ins m-3">
                    <div class="in m-3">
                        <label class="label" for="nom">Nom</label>
                        <input type="text" name="nom" placeholder="Votre nom">
                        </br>
                        <label class="label" for="prenom">Prenom</label>
                        <input type="text" name="prenom" placeholder="Votre prénom">
                        </br>
                        <label class="label" for="email">Email</label>
                        <input type="email" name="email" placeholder="Votre adresse e-mail">
                    </div>
                    <div class="m-3">
                        <label class="label" for="mdp">Mot de passe</label>
                        <input type="password" name="mdp" placeholder="Votre mot de passe">
                        </br>
                        <label class="label" for="mdp2">Confirmer votre mot de passe</label>
                        <input type="password" name="mdp2" placeholder="Confirmer votre mot de passe">
                        </br>
                        <label class="label" for="role">Role</label>
                        <input type="text" name="role" value="utilisateur" readonly>
                    </div>
                </div>
                </br>
                <div class="text-center mt-2">
                    <a href="#" class="txt">
                        Vous avez déjà un compte? <a href="connexion.php" class="txt1">Connectez-vous ici !</a>
                    </a>
                </div>
                </br>
                <div class="text-center">
                    <input type="submit" name="inscription" value="M'inscrire">
                </div>
            </form>
        </section>
    </div>

    <?php include('footer.php'); ?>

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
    <script src="inscription.js"></script>
</body>

</html>