<?php
try {
    $about = new PDO(
        'mysql:host=localhost;dbname=about',
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
    <link rel="stylesheet" href="about.css">
    <title>About</title>
</head>

<body>

    <?php include("header.php"); ?>

    <section class="toutsavoir">
        <h1 class="text-center mt-5">Ce qu'il faut savoir sur la ville de Banfora</h1>
        <div class="premier">
            <p class="m-5">Avec une population proche des 100 000 habitants, Banfora, capitale de la région des Cascades
                et de
                la vaste province de la Comoé, est la deuxième ville du Sud-Ouest. Banfo signifie « espace clair »,
                car, avant 1903, l’endroit était encore sauvage et inhabité. Idéalement située dans la partie la
                plus verte du pays, Banfora n’a été créée qu’au début du XXe siècle, par les Karaboro, les Turka et
                les Goin arrivés du Ghana. Cette petite ville est assez animée le jour grâce au passage des
                véhicules en transit depuis la Côte d’Ivoire vers Bobo-Dioulasso ; le soir, elle s’éteint lentement
                laissant place à l'animation de ses maquis qui égayent la vie nocturne de la ville. Le grand marché
                de Banfora, qui a lieu tous les dimanches, présente toute la gamme des produits régionaux et
                d’autres importés de la Côte d’Ivoire ainsi que d’intéressants objets d’artisanat local. Le reste de
                la semaine, le marché reste toujours actif. La région vit de l’agriculture (riz, maïs, canne à sucre
                et cultures maraîchères près des cascades), de l’élevage et de l’artisanat, en particulier la
                vannerie et la poterie. Banfora est une petite bourgade dans laquelle il fait bon vivre, propice à
                la détente, et entourée de plusieurs points d’intérêt pour le voyageur (très beaux paysages, sites
                naturels grandioses, culture et hospitalité Sénoufo, usine de canne à sucre…). Le tourisme y est
                pour ces raisons en pleine expansion, pour les internationaux comme pour les locaux. Banfora est un
                excellent point d’attache pour visiter la région. Trois jours sont recommandés pour explorer
                l’essentiel de ses richesses.Avec une population proche des 100 000 habitants, Banfora, capitale de
                la région des Cascades et de la vaste province de la Comoé, est la deuxième ville du Sud-Ouest.
                Banfo signifie « espace clair », car, avant 1903, l’endroit était encore sauvage et inhabité.
                Idéalement située dans la partie la plus verte du pays, Banfora n’a été créée qu’au début du XXe
                siècle, par les Karaboro, les Turka et les Goin arrivés du Ghana. Cette petite ville est assez
                animée le jour grâce au passage des véhicules en transit depuis la Côte d’Ivoire vers Bobo-Dioulasso
                ; le soir, elle s’éteint lentement laissant place à l'animation de ses maquis qui égayent la vie
                nocturne de la ville. Le grand marché de Banfora, qui a lieu tous les dimanches, présente toute la
                gamme des produits régionaux et d’autres importés de la Côte d’Ivoire ainsi que d’intéressants
                objets d’artisanat local. Le reste de la semaine, le marché reste toujours actif. La région vit de
                l’agriculture (riz, maïs, canne à sucre et cultures maraîchères près des cascades), de l’élevage et
                de l’artisanat, en particulier la vannerie et la poterie. Banfora est une petite bourgade dans
                laquelle il fait bon vivre, propice à la détente, et entourée de plusieurs points d’intérêt pour le
                voyageur (très beaux paysages, sites naturels grandioses, culture et hospitalité Sénoufo, usine de
                canne à sucre…). Le tourisme y est pour ces raisons en pleine expansion, pour les internationaux
                comme pour les locaux. Banfora est un excellent point d’attache pour visiter la région. Trois jours
                sont recommandés pour explorer l’essentiel de ses richesses.</p>

            <p class="m-5">Ces délimitations correspondent aujourd'hui à la partie urbaine de la commune. Conformément à
                l'article
                21 de la loi no 055-2004/AN portant Code Général des Collectivités Territoriales, ont été étendus les
                ressorts territoriaux des communes urbaines à ceux des départements dans lesquels elles sont situées. Ce
                nouveau découpage du territoire communal a augmenté le capital spatial urbain en intégrant un vaste
                arrière-pays rural 6 fois supérieur à celui de la zone urbaine définie par la loi 030/99, ce qui a porté
                la superficie de la commune de Banfora à 935 km2 (cf. PPDT du PPDEL). Divisée en quinze secteurs et
                vingt-deux villages (1 / Bodadiougou 2/ Bombora 3/ Diarabakoko 4/ Dionouna 5/ Diongolo 6/ Karfiguéla 7/
                Kitobama 8/ Korogora 9/ Lémouroudougou 10/ Marébama 11/ Nékanklou 12/ Niankar13/ Niarebama 4/ Siniéna15/
                Sitiéna16/ Tangora 17/ Tengrela 18/ Tiempagora19/ Tiékouna 20/ Tionouna 21/ Toumousséni 22/
                Tiontionmana.)

                Le paysage communal se présente désormais sous la forme d’une zone urbaine dessinée par les opérations
                de lotissement et d’une zone rurale, composée des secteurs 9, 10,11, 12, 13 et 14 et des 22 villages
                rattachés, tout indiqué pour la pratique d’activités agricoles urbaines et périurbaines.</p>
        </div>
    </section>


    <section id="slider" class="pt-5">
        <div class="container">
            <h1 class="text-center">Nos meilleurs lieu</h1>
            <div class="slider">
                <div class="owl-carousel">
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="home/02.jpg" alt="">
                        </div>
                        <h5 class="mb-0 text-center"><b>Salle polyvalente de Banfora</b></h5>
                        <p class="text-center p-4">Vous pouvez visiter cette salle consacré à la jeunesse
                        </p>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="home/01.jpg" alt="">
                        </div>
                        <h5 class="mb-0 text-center"><b>Bienvenue à Banfora</b></h5>
                        <p class="text-center p-4">Bienvenue dans la région des cascades (ville de Banfora)</p>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="home/03.jpg" alt="">
                        </div>
                        <h5 class="mb-0 text-center"><b>Mairie de Banfora</b></h5>
                        <p class="text-center p-4"></p>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="home/04.jpg" alt="">
                        </div>
                        <h5 class="mb-0 text-center"><b>Cascades de Karfiguela</b></h5>
                        <p class="text-center p-4">Visitez ce beau lieu, ne vous faites pas raconter</p>
                    </div>
                    <div class="slider-card">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="home/05.jpg" alt="">
                        </div>
                        <h5 class="mb-0 text-center"><b>Train</b></h5>
                        <p class="text-center p-4">Le train qui nous permet de rallier Ouaga, Koudougou, Bobo,
                            Banfora à la Côte d'Ivoire.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("footer.php"); ?>

    <script src="header.js"></script>
    <script src=" bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src=" bootstrap-5.3.1-dist/js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>