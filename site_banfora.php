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

// $req = $connexion->prepare('SELECT * FROM lieu
//                                     INNER JOIN text ON lieu.id_ville = text.id_ville
//                                     INNER JOIN carou ON text.id_ville = carou.id_ville
//                                     INNER JOIN sponsors ON carou.id_ville = sponsors.id_ville
//                                     WHERE lieu.id_ville = 5 AND text.id_ville = 5 AND 
//                                     carou.id_ville = 5 AND sponsors.id_ville = 5');

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

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Burkina Faso</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="image.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Aboubacar</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="dash.php">Dashboard</a></li>
                                        <li><a href="users.php">Users</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-edit"></i> City <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="city.php">view</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-desktop"></i> Tourist Site <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a><i class=""></i> Banfora <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="site_banfora.php">Site</a></li>
                                            </ul>
                                        </li>

                                        <li><a><i class=""></i> Bobo <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="site_bobo.php">Site</a></li>
                                            </ul>
                                        </li>

                                        <li><a><i class=""></i> Ziniaré <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="site_ziniare.php">Site</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tout_tables.php">view</a></li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-table"></i> Contacts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="site_contact.php">view</a></li>
                                    </ul>
                                </li>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                            <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Lock">
                            <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                        </a>
                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="deconnexion.php">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="image.jpg" alt="">Aboubacar
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="deconnexion.php"><i
                                            class="fa fa-sign-out pull-right"></i> Log
                                        Out</a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Dashboard</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <?php
                    $req = $connexion->prepare('SELECT * FROM ville');

                    if ($req->execute()) {
                        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                        if ($resultat) {
                            echo "
                                <button type='button' href='#lieuModal?id_villes = 5 ' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#lieuModal'>
                                    Ajouter un lieu
                                </button>";

                        }
                    }
                    ?>

                    <div class="clearfix"></div>

                    <div class="row" style="display: block;">


                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12  ">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" style="widht: 100%;">

                                    <?php
                                    $req = $connexion->prepare('SELECT * FROM lieu WHERE id_ville = 5');

                                    if ($req->execute()) {
                                        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                                        if ($resultat) {

                                            echo "
                                            <thead>

                                            <tr class='headings'>
                                                <th>
                                                <input type='checkbox' id='check-all' class='flat'>
                                                </th>
                                                <th class='column-title'>id_lieu</th>
                                                <th class='column-title'>id_ville</th>
                                                <th class='column-title'>Photo</th>
                                                <th class='column-title'>Nom</th>
                                                <th class='column-title no-link last'><span class='nobr'>Action</span>
                                                </th>
                                                <th class='bulk-actions' colspan='7'>
                                                <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'>
                                                    </span> ) <i class='fa fa-chevron-down'></i></a>
                                                </th>
                                            </tr>

                                            </thead>";

                                            foreach ($resultat as $row) {
                                                echo "<tbody>";

                                                echo "<tr class='even pointer'>";

                                                echo "<td class='a-center ''>";

                                                echo "<input type='checkbox' class='flat' name='table_records'>";

                                                echo "</td>";

                                                echo "<td>" . $row['id_lieu'] . "</td>";
                                                echo "<td>" . $row['id_ville'] . "</td>";
                                                echo "<td><img src='home/" . $row['photo'] . "' alt='Photo de la ville' style='width: 70px; height: 70px; border-radius: 50%; margin: 5px;'></td>";
                                                echo "<td>" . $row['nom'] . "</td>";
                                                echo "<td>";

                                                echo "<a id='openModal' href='#'><i class='fas fa-edit m-2' style='color: green;'></i></a>";
                                                echo "<a href='#'><i class='fas fa-trash m-2' style='color: red;'></i></a>";

                                                echo "</td>";


                                                echo "</tr>";

                                                echo "</tbody>";

                                            }

                                        } else {
                                            echo "Aucun utilisateur trouvé.";
                                        }
                                    } else {
                                        echo "Erreur lors de la recuperation.";
                                    }
                                    ?>

                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#textModal">
                        Ajouter un text
                    </button>
                    <div class="clearfix"></div>

                    <div class="row" style="display: block;">


                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12  ">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" style="widht: 100%;">
                                    <?php
                                    $req = $connexion->prepare('SELECT * FROM text WHERE id_ville = 5');

                                    if ($req->execute()) {
                                        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                                        if ($resultat) {

                                            echo "
                                            <thead>

                                            <tr class='headings'>
                                                <th>
                                                <input type='checkbox' id='check-all' class='flat'>
                                                </th>
                                                <th class='column-title'>id_text</th>
                                                <th class='column-title'>id_ville</th>
                                                <th class='column-title'>Text</th>
                                                <th class='column-title no-link last'><span class='nobr'>Action</span>
                                                </th>
                                                <th class='bulk-actions' colspan='7'>
                                                <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'>
                                                    </span> ) <i class='fa fa-chevron-down'></i></a>
                                                </th>
                                            </tr>

                                            </thead>";

                                            foreach ($resultat as $row) {
                                                echo "<tbody>";

                                                echo "<tr class='even pointer'>";

                                                echo "<td class='a-center ''>";

                                                echo "<input type='checkbox' class='flat' name='table_records'>";

                                                echo "</td>";

                                                echo "<td>" . $row['id_text'] . "</td>";
                                                echo "<td>" . $row['id_ville'] . "</td>";
                                                echo "<td>" . $row['texte'] . "</td>";
                                                echo "<td>";

                                                echo "<a id='openModal' href='#'><i class='fas fa-edit m-2' style='color: green;'></i></a>";
                                                echo "<a href='#'><i class='fas fa-trash m-2' style='color: red;'></i></a>";

                                                echo "</td>";


                                                echo "</tr>";

                                                echo "</tbody>";

                                            }

                                        } else {
                                            echo "Aucun utilisateur trouvé.";
                                        }
                                    } else {
                                        echo "Erreur lors de la recuperation.";
                                    }
                                    ?>

                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carouModal">
                        Ajouter dans la carouselle
                    </button>
                    <div class="clearfix"></div>

                    <div class="row" style="display: block;">


                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12  ">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" style="widht: 100%;">
                                    <?php
                                    $req = $connexion->prepare('SELECT * FROM carou WHERE id_ville = 5');

                                    if ($req->execute()) {
                                        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                                        if ($resultat) {

                                            echo "
                                            <thead>

                                            <tr class='headings'>
                                                <th>
                                                <input type='checkbox' id='check-all' class='flat'>
                                                </th>
                                                <th class='column-title'>id_carou</th>
                                                <th class='column-title'>id_ville</th>
                                                <th class='column-title'>Photos</th>
                                                <th class='column-title no-link last'><span class='nobr'>Action</span>
                                                </th>
                                                <th class='bulk-actions' colspan='7'>
                                                <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'>
                                                    </span> ) <i class='fa fa-chevron-down'></i></a>
                                                </th>
                                            </tr>

                                            </thead>";

                                            foreach ($resultat as $row) {
                                                echo "<tbody>";

                                                echo "<tr class='even pointer'>";

                                                echo "<td class='a-center ''>";

                                                echo "<input type='checkbox' class='flat' name='table_records'>";

                                                echo "</td>";

                                                echo "<td>" . $row['id_carou'] . "</td>";
                                                echo "<td>" . $row['id_ville'] . "</td>";
                                                echo "<td><img src='home/" . $row['photos'] . "' alt='Photo de la ville' style='width: 70px; height: 70px; border-radius: 50%; margin: 5px;'></td>";
                                                echo "<td>";

                                                echo "<a id='openModal' href='#'><i class='fas fa-edit m-2' style='color: green;'></i></a>";
                                                echo "<a href='#'><i class='fas fa-trash m-2' style='color: red;'></i></a>";

                                                echo "</td>";


                                                echo "</tr>";

                                                echo "</tbody>";

                                            }

                                        } else {
                                            echo "Aucun utilisateur trouvé.";
                                        }
                                    } else {
                                        echo "Erreur lors de la recuperation.";
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    </div>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#sponsorsModal">
                        Ajouter des sponsors
                    </button>
                    <div class="clearfix"></div>

                    <div class="row" style="display: block;">


                        <div class="clearfix"></div>

                        <div class="col-md-12 col-sm-12  ">
                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action" style="widht: 100%;">
                                    <?php
                                    $req = $connexion->prepare('SELECT * FROM sponsors WHERE id_ville = 5');

                                    if ($req->execute()) {
                                        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                                        if ($resultat) {

                                            echo "
                                            <thead>

                                            <tr class='headings'>
                                                <th>
                                                <input type='checkbox' id='check-all' class='flat'>
                                                </th>
                                                <th class='column-title'>id_spon</th>
                                                <th class='column-title'>id_ville</th>
                                                <th class='column-title'>Sponsors</th>
                                                <th class='column-title no-link last'><span class='nobr'>Action</span>
                                                </th>
                                                <th class='bulk-actions' colspan='7'>
                                                <a class='antoo' style='color:#fff; font-weight:500;'>Bulk Actions ( <span class='action-cnt'>
                                                    </span> ) <i class='fa fa-chevron-down'></i></a>
                                                </th>
                                            </tr>

                                            </thead>";

                                            foreach ($resultat as $row) {
                                                echo "<tbody>";

                                                echo "<tr class='even pointer'>";

                                                echo "<td class='a-center ''>";

                                                echo "<input type='checkbox' class='flat' name='table_records'>";

                                                echo "</td>";

                                                echo "<td>" . $row['id_spon'] . "</td>";
                                                echo "<td>" . $row['id_ville'] . "</td>";
                                                echo "<td><img src='home/" . $row['spon'] . "' alt='Photo de la ville' style='width: 70px; height: 70px; border-radius: 50%; margin: 5px;'></td>";
                                                echo "<td>";

                                                echo "<a id='openModal' href='#'><i class='fas fa-edit m-2' style='color: green;'></i></a>";
                                                echo "<a href='#'><i class='fas fa-trash m-2' style='color: red;'></i></a>";

                                                echo "</td>";


                                                echo "</tr>";

                                                echo "</tbody>";

                                            }

                                        } else {
                                            echo "Aucun utilisateur trouvé.";
                                        }
                                    } else {
                                        echo "Erreur lors de la recuperation.";
                                    }
                                    ?>

                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- Pour ajouter un lieu -->
            <!-- Modal -->

            <div class="modal fade" id="lieuModal" tabindex="-1" aria-labelledby="lieuModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="lieuModalLabel">Ajouter un lieu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="traitementSite.php" method="POST">
                                <!-- <label class="label" for="ville">ville</label>
                                <select name="select" id="villes">
                                    <?php
                                    $req = $connexion->prepare('SELECT * FROM ville');

                                    if ($req->execute()) {
                                        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);

                                        if ($resultat) {
                                            foreach ($resultat as $row) {
                                                echo "
                                                    <option selected href='id_villes = " . $row['id_ville'] . "'>
                                                        " . $row['nom_ville'] . "
                                                        <span> - " . $row['id_ville'] . "</span>
                                                    </option>";
                                            }
                                        }
                                    }
                                    ?>
                                </select> -->
                                </br>
                                <label class="label" for="nomlieu">Nom du lieu</label>
                                <input type="text" name="nom" placeholder="ville">
                                </br>
                                <label class="label" for="photo">Photo du lieu</label>
                                <input type="file" name="photo" id="photo">

                                </br>
                                <div class="text-center">
                                    <input type="submit" name="ajouter-lieu" value="Ajouter-lieu">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    aboubacar copyright september 2023
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
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