<?php
session_start();

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

// if (isset($_POST['submit'])) {
//     $email = $_POST['email'];
//     $mdp = $_POST['mdp'];
//     echo $email;
// }

// Formulaire de connexion
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $mdp = securise($_POST['mdp']);

    if (!empty($email) and !empty($mdp)) {
        $mdp = passwordHash($mdp);
        $verify = $connexion->prepare("SELECT * FROM connexion WHERE email = ? AND mdp = ?");
        $verify->execute([$email, $mdp]);

        if ($verify->rowCount() == 1) {
            $donnee = $verify->fetch(PDO::FETCH_ASSOC);

            $_SESSION['name'] = $donnee['email'];


            if ($donnee['role'] == "admin") {
                $_SESSION['connecter'] = $donnee['id'];
                $_SESSION['mdp'] = $donnee['mdp'];
                $_SESSION['role'] = $donnee['role'];
                header("location:dash.php");
            } else {

                header("location:SiteVoyage.php");
            }
        } else
            $return = "Adress email ou mot de passe incorrect.";


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
    <link rel="stylesheet" href="connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:ital,wght@0,400;0,600;1,600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Connexion</title>
</head>

<body>
    <?php include('header.php'); ?>

    <div class="connexion bg-body-secondary">
        <section>
            <h1> Formulaire de connexion </h1>

            <?php if (isset($_POST['submit']) and isset($return))
                echo "<p class='erreur'>" . $return . "</p>"; ?>

            <form action="#" method="POST">
                <input type="email" name="email" placeholder="Votre adresse e-mail">
                </br>
                <input type="password" name="mdp" placeholder="Votre mot de passe">

                <div class="mt-2">
                    <a href="#" class="txt">
                        Vous n'avez pas de compte? <a href="inscription.php" class="txt1">Inscrivez-vous ici !</a>
                    </a>
                </div>

                </br>
                <input type="submit" name="submit" value="Se connecter">
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
    <script src="connexion.js"></script>
</body>

</html>