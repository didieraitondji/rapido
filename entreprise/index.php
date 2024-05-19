<?php
session_start();
include_once("../assets/includes/functionsAndObjets.php");
$url1 = "/chauffeur/";
$url2 = "/operateur/";
$url3 = "/";

$ladate = date('d-m-Y');

$base = new Base();
$course = new Course($base);
$users = new Users();

if (isset($_SESSION['connect']) && $_SESSION['connect'] == "oui") {
    if ($_SESSION['type'] == "admin") {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard | Page Entreprise</title>
            <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
            <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="/assets/css/style.css">
        </head>

        <body>

            <header>
                <!-- Céation du menu -->

                <nav class="navbar navbar-expand-lg monbg-color-2 p-0 ">
                    <div class="container">
                        <a class="navbar-brand" href="#"><img src="/assets/images/logo.png" width="40px" alt=""></a>
                        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link actif" href="/entreprise/">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/entreprise/courses/">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/entreprise/chauffeurs/">Chaufeurs</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/entreprise/operateurs/">Operateurs</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Corbeille
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/entreprise/chauffeurs-retirer/">Chauffeurs Retirés</a></li>
                                        <li><a class="dropdown-item" href="/entreprise/operateurs-retirer/">Opérateurs Retirés</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-flex" role="search">
                                <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
                                <button class="btn btn-outline-success bg-black text-white border-black" type="submit">Rechercher</button>
                            </form>
                        </div>
                    </div>
                </nav>

                <!-- fin du menu -->
            </header>

            <div class="container-fluid contenu">
                <div class="container p-5">
                    <div class="row gap-5 gap-md-5 text-center align-items-center justify-content-center bg-dark-subtle p-0 py-5 mb-4">

                        <div class="col-5 col-md-3 rounded-2">
                            <div class="card">
                                <div class=" card-header bg-dark text-white ">
                                    Nombre de course
                                </div>
                                <div class=" card-body bg-warning text-center fw-bold fs-1">
                                    <?php echo $course->nbreCourses(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-md-3 rounded-2">
                            <div class="card">
                                <div class=" card-header bg-dark text-white ">
                                    Nombre de course en cours
                                </div>
                                <div class=" card-body text-center bg-info fw-bold fs-1">
                                    <?php echo $course->nbreCoursesEnCours(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-md-3 rounded-2">
                            <div class="card">
                                <div class=" card-header bg-dark text-white ">
                                    Nombre de course en attentes
                                </div>
                                <div class=" card-body text-center bg-warning fw-bold fs-1">
                                    <?php echo $course->nbreCoursesEnAttente(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-md-3 rounded-2">
                            <div class="card">
                                <div class=" card-header bg-dark text-white ">
                                    Nombre de course Terminée
                                </div>
                                <div class=" card-body text-center bg-success text-white fw-bold fs-1">
                                    <?php echo $course->nbreCoursesTerminer(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-md-3 rounded-2">
                            <div class="card">
                                <div class=" card-header bg-dark text-white ">
                                    Nombre de Chauffeur
                                </div>
                                <div class=" card-body text-center bg-success text-white fw-bold fs-1">
                                    <?php echo $users->nbreChauffeurs($base); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-5 col-md-3 rounded-2">
                            <div class="card">
                                <div class=" card-header bg-dark text-white ">
                                    Nombre de Opérateur
                                </div>
                                <div class=" card-body text-center bg-success text-white fw-bold fs-1">
                                    <?php echo $users->nbreOperateurs($base); ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



            <footer class="monbg-color-2 text-white">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="" style="text-align: left">
                                <span class="account">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg>
                                    <?php
                                    if (isset($_SESSION['type']) && $_SESSION['type'] != null) {
                                        if ($_SESSION['info'] != 4) {
                                            echo $_SESSION['info']['prenoms'];
                                        }
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mx-auto fw-bold" style="width: max-content; font-size: 0.8em; height: 22px;" id="droit"> &copy; Copyright - RAPIDO </div>
                        </div>
                        <div class="col">
                            <div class="" style="text-align: right">
                                <span class="logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="blue" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </footer>
            <!-- Notification -->


            <?php
            if (isset($_SESSION['message']) && $_SESSION['message'] != null) {
                echo '<div class="notification">' . $_SESSION['message'] . '</div>';
            }

            //remise à zéro des variables de notifications
            $_SESSION['message'] = null;
            ?>

            <!-- fin de la notification -->
            <script src="/assets/js/bootstrap.bundle.min.js"></script>
            <script src="../assets/js/common.js"></script>
        </body>

        </html>
<?php
    } else if ($_SESSION['type'] == "chauffeur") {
        $_SESSION['message'] = "Vous n'est pas Administrateur !";
        phpRedirect($url1);
    } else {
        $_SESSION['message'] = "Vous n'est pas Administrateur !";
        phpRedirect($url2);
    }
} else {
    $_SESSION['message'] = "Veuillez vous connecter !";
    phpRedirect($url3);
}
?>