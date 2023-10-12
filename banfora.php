<?php
try {
    $banfora = new PDO(
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
    <link rel="stylesheet" href="bootstrap-5.3.1-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="banfora.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:ital,wght@0,400;0,600;1,600&family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;0,900;1,600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"
        integrity="sha512-doJrC/ocU8VGVRx3O9981+2aYUn3fuWVWvqLi1U+tA2MWVzsw+NVKq1PrENF03M+TYBP92PnYUlXFH1ZW0FpLw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Banfora</title>
</head>

<body>
    <?php include("header.php"); ?>

    <div id="carouselExempleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="image/HERO/H1.webp" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: Bienvenue à Banfora.
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: Bienvenue à Banfora.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: Bienvenue à Banfora.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H4.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: Bienvenue à Banfora.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="image/HERO/H5.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <p class="animated fadeInUp d-done d-md-block">
                        BURKINA FASO: Bienvenue à Banfora.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <section class="section1">
        <div class="haut">
            <h1 class="titre m-5 text-center " style="color: black">Nos différents sites</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4 pt-5">
            <?php
            $im = $banfora->query("SELECT * FROM lieu WHERE id_ville=5");
            while ($donnees = $im->fetch()) {

                ?>
                <div class="col-lg-4">
                    <div class="card m-2">
                        <img src="home/<?php echo $donnees["photo"] ?>" class="card-img-top" style="height: 300px"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title" style="color: green">
                                <?php echo $donnees["nom"] ?>
                            </h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </section>

    <section class="section2">
        <div class="haut">
            <h1 class="titre m-5 text-center " style="color: black">la bonne raison de choisir banfora comme destination
            </h1>
        </div>

        <div class="destination m-5 mb-5">
            <?php
            $tex = $banfora->query("SELECT * FROM text WHERE id_ville=5");
            while ($donnees = $tex->fetch()) {


                ?>
                <div class="description">
                    <h2 class="secondary text-black text-center mt-5 mb-5">Heureux de vous recevoir</h2>
                    <p class="ok mt-5" style="font-size: 20px">
                        <?php echo $donnees["texte"] ?>
                    </p>
                </div>
            <?php } ?>


            <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-inner" style="height: 400px" style=" width: 300px">
                    <?php
                    $pho = $banfora->query("SELECT * FROM carou WHERE id_ville=5");
                    while ($donnees = $pho->fetch()) {


                        ?>
                        <div class="carousel-item active">
                            <img src="home/<?php echo $donnees["photos"] ?>" class="d-block w-100" alt="...">
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div>
    </section>

    <section class="section3 center">
        <!-- <div class="bou">
            <div class="text-center mt-3 m-5">
                <h5><a class="about" href="service.php">Savoir plus</a></h5>
            </div>

            <div class="text-center mt-3 m-5">
                <h5><a class="about" href="service.php">Nos services</a></h5>
            </div>
        </div> -->

        <h5 class="title text-center mt-5 mb-0">Sponsors mondiaux officiels</h5>

        <div class="sponsors" style="text-align: center">
            <?php
            $spo = $banfora->query("SELECT * FROM sponsors WHERE id_ville=5");
            while ($donnees = $spo->fetch()) {

                ?>
                <img class="spon m-2" style="max-width: 80px" src="home/<?php echo $donnees["spon"] ?>" alt="">
            <?php } ?>
        </div>

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
</body>

</html>