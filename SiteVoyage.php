<?php
try {
    $home = new PDO(
        'mysql:host=localhost;dbname=sitevoyage',
        'root',
        '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch (Exception $e) {
    die("Error " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="SiteVoyage.css">
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:ital,wght@0,400;0,600;1,600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <title>Site Voyage</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div id="carouselExempleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/HERO/H6.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: La destination à ne pas manquer.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H7.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: La destination à ne pas manquer.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H8.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: La destination à ne pas manquer.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H9.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: La destination à ne pas manquer.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H10.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: La destination à ne pas manquer.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-body-secondary mt-5">
        <!-- <div class="card border-black m-5" style="">
            <div class="card-body">
                <p style="font-size: 30px;">Le Burkina Faso litéralement ''Pays des hommes intègres'', aussi appelé
                    Burkina,
                    anciennement République de
                    Haute-Volta, est un pays d'Afrique de l'Ouest sans accès à la Mer.</p>

                </br>
                <p style="font-size: 30px;">Nous vous proposons trois (3) villes et ses sites touristiques à visiter
                    dans ce
                    formidable pays.</p>
            </div>
        </div> -->

        <section class="pt-5">
            <div class="card-group">
                <?php
                $hom = $home->query("SELECT * FROM ville");
                while ($donnees = $hom->fetch()) {

                    ?>

                    <div class="card m-5">
                        <img src="home/<?php echo $donnees["photo_ville"] ?>" class="card-img-top ville"
                            style="height: 200px" alt="...">
                        <div class="card-body">
                            <h4 class="card-title mb-0 text-center" style="text-transform: uppercase">
                                <?php echo $donnees["nom_ville"] ?>
                            </h4>
                            <p class="card-text text-center p-4">
                                <?php echo $donnees["texte"] ?>
                            </p>
                            <?php
                            if ($donnees["id_ville"] == 5) {
                                echo "<p class='animated fadeInUp toutsavoir' style='animation-delay: 1.3s'><a class='Savoir'
                                    href='banfora.php'>
                                    " . $donnees['bouton'] . "
                                </a>
                            </p>";
                            } else if ($donnees["id_ville"] == 6) {
                                echo "<p class='animated fadeInUp toutsavoir' style='animation-delay: 1.3s'><a class='Savoir'
                                    href='bobo.php'>
                                    " . $donnees["bouton"] . "
                                </a>
                            </p>";
                            } else if ($donnees["id_ville"] == 7) {
                                echo "<p class='animated fadeInUp toutsavoir' style='animation-delay: 1.3s'><a class='Savoir'
                                    href='ziniare.php'>
                                    " . $donnees["bouton"] . "
                                </a>
                            </p>";
                            } else {
                                echo "<p class='animated fadeInUp toutsavoir' style='animation-delay: 1.3s'><a class='Savoir'
                                    href='#'>
                                    " . $donnees["bouton"] . "
                                </a>
                            </p>";
                            }

                            ?>
                        </div>
                    </div>

                <?php } ?>

                <!-- <div class="card m-5">
                    <img src="home/12.jpg" class="card-img-top ville" style="height: 200px" alt="...">
                    <div class="card-body">
                        <h4 class="card-title mb-0 text-center" style="text-transform: uppercase">Bobo-Dioulasso</h4>
                        <p class="card-text text-center p-4">Découvrez avec nous la mosquée de Dioulassoba et la Mare
                            aux
                            Hippopotames</p>
                        <p class="animated fadeInUp toutsavoir" style="animation-delay: 1.3s"><a class="Savoir"
                                href="bobo.php">Découvrir</a>
                        </p>
                    </div>
                </div>
                <div class="card m-5">
                    <img src="home/13.jpeg" class="card-img-top ville" style="height: 200px" alt="...">
                    <div class="card-body">
                        <h4 class="card-title mb-0 text-center" style="text-transform: uppercase">ziniaré</h4>
                        <p class="card-text text-center p-4">Découvrez avec nous Le parc animalier de Ziniaré et le
                            Sculpture sur granit de Laongo</p>
                        <p class="animated fadeInUp toutsavoir" style="animation-delay: 1.3s"><a class="Savoir"
                                href="#">Découvrir</a>
                        </p>
                    </div>
                </div> -->
            </div>
        </section>
    </section>


    <?php include("footer.php"); ?>



    <script src="header.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src=" bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>.