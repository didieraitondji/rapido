<?php
session_start();

include_once("../../assets/includes/functionsAndObjets.php");
$url1 = "/chauffeur/";
$url2 = "/operateur/";
$url3 = "/";

if (isset($_SESSION['connect']) && $_SESSION['connect'] == "oui") {
    if ($_SESSION['type'] == "admin") {

?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Chauffeurs | Page Entreprise</title>
            <link rel="shortcut icon" href="/assets/images/logo.png" type="image/x-icon">
            <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
            <link rel="stylesheet" href="/assets/css/style.css">
            <link rel="stylesheet" href="/assets/css/addoperator.css">
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
                                    <a class="nav-link text-white" href="/entreprise/">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="/entreprise/courses/">Courses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link actif" href="/entreprise/chauffeurs/">Chaufeurs</a>
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
                <div class="container">
                    <div class="add-operator p-3 d-flex flex-column align-items-end ">
                        <span class="ouvreModal btn bg-success text-light">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4" />
                            </svg>
                            Ajouter
                        </span>
                    </div>




                    <div class="card mb-5 ">
                        <div class="card-header fw-bold ">
                            Les Chauffeurs chez RAPIDO
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead class="table-dark w-100">
                                    <tr class="text-center border border-black">
                                        <th class="numero">N°</th>
                                        <th class="nom">Nom</th>
                                        <th class="prenoms">Prénoms</th>
                                        <th class="telephone">Téléphone</th>
                                        <th class="email">Disponible</th>
                                        <th class="sexe">Sexe</th>
                                        <th colspan="3" class="operations">Opérations</th>
                                        <th class="plus">Plus</th>
                                    </tr>
                                </thead>

                                <?php
                                $i = 1;
                                $base = new Base();
                                $opts = new Chauffeur("", "", $base);
                                $result = $opts->allChauffeur(1);

                                foreach ($result as $a) {

                                    if (debutTbody($i) == 1) { ?>
                                        <tbody class="tbody">
                                        <?php } ?>

                                        <tr class="text-center border nom<?php echo $a['telephone']; ?>">
                                            <td class=" border py-3 numero" id="/assets/includes/updateChauffeur.php?id=<?php echo $a['chauffeur_id']; ?>"><?php echo $i; ?></td>
                                            <td class=" border py-3 nom"><?php echo $a['nom']; ?></td>
                                            <td class=" border py-3 prenoms"><?php echo $a['prenoms']; ?></td>
                                            <td class=" border py-3 telephone"><?php echo $a['telephone']; ?></td>
                                            <td class=" border py-3 email"><?php if ($a['disponible'] == 1) {
                                                                                echo "Non";
                                                                            } else {
                                                                                echo "Oui";
                                                                            } ?> </td>
                                            <td class=" border py-3 sexe"><?php echo $a['sexe']; ?></td>
                                            <td class=" border py-3 d-none"><?php echo $a['createdAt']; ?></td>
                                            <td class=" border py-3 d-none"><?php echo $a['updatedAt']; ?></td>
                                            <td class="operations py-3">
                                                <a href="#premier-index" class="btn fw-bold py-0 px-2 action1 modifier" id="nom<?php echo $a['telephone']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                                    </svg>
                                                    Modifier
                                                </a>
                                            </td>
                                            <td class="operations py-3">
                                                <a href="/assets/includes/agirChauffeur.php?id=<?php echo $a['chauffeur_id']; ?>" target="_blank" class="btn fw-bold py-0 px-2 action1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                                        <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                                        <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z" />
                                                    </svg>
                                                    Agir
                                                </a>
                                            </td>
                                            <td class="operations py-3">
                                                <span class="btn fw-bold py-0 px-2 action2 retirer" id="/assets/includes/retirerChauffeur.php?id=<?php echo $a['chauffeur_id']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                                    </svg>
                                                    Retirer
                                                </span>
                                            </td>
                                            <td class="plus py-3">
                                                <span href="" class="btn fw-bold py-0 px-2 action1 plusbtn" id="nom<?php echo $a['telephone']; ?>">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus-fill" viewBox="0 0 16 16">
                                                        <path d="M11 13a5 5 0 1 0-4.975-5.5H4A1.5 1.5 0 0 0 2.5 6h-1A1.5 1.5 0 0 0 0 7.5v1A1.5 1.5 0 0 0 1.5 10h1A1.5 1.5 0 0 0 4 8.5h2.025A5 5 0 0 0 11 13m.5-7.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2a.5.5 0 0 1 1 0" />
                                                    </svg>
                                                </span>
                                            </td>
                                            <td class=" border py-3 d-none">/assets/includes/defaultChauffeurPasse.php?id=<?php echo $a['chauffeur_id']; ?></td>
                                            <td class=" border py-3 d-none"><?php echo $a['email']; ?></td>
                                        </tr>
                                        <?php if (debutTbody($i) == 2) { ?>
                                        </tbody>
                                    <?php }
                                        $i = $i + 1;
                                    }
                                    if (debutTbody($i - 1) != 2) { ?>
                                    </tbody>
                                <?php } ?>
                            </table>
                        </div>

                        <div class="p-3 d-flex flex-column align-items-end ">
                            <div class="row w-auto align-items-center mx-3 ">
                                <div class="col-3">
                                    <span class="precedent btn bg-danger-subtle text-primary w-auto ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                                            <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="col-6 text-center">
                                    <span class="spnote p-2 w-auto">
                                        100/200
                                    </span>
                                </div>
                                <div class="col-3">
                                    <span class="suivant btn bg-danger-subtle text-primary w-auto ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                        </svg>
                                    </span>
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




            <div class="ajoutModal p-0 pt-5">
                <div class="ajoutModal-content">
                    <span class="close">&times;</span>
                    <div class="image-formulaire">
                        <div class="images">
                            <img src="/assets/images/io1.png" width="100%">
                            <div class="flootage"></div>
                        </div>
                        <div class="formulaire container" id="premier-index">
                            <h3></h3>
                            <form method="post" class="formemaj">
                                <label for="nom">Nom :</label><br>
                                <input type="text" name="nom" id="nom" placeholder="nom du chauffeur ...">
                                <label for="prenoms">Prénoms :</label><br>
                                <input type="text" name="prenoms" placeholder="prénoms du chauffeur" id="nom">
                                <label for="email">Email :</label><br>
                                <input type="email" name="email" id="email" placeholder="ex: exemple@gmail.com">
                                <label for="telephone">Téléphone :</label><br>
                                <input type="telephone" name="telephone" id="telephone" placeholder="ex: 63116556">
                                <label for="sexe">Sexe :</label><br>
                                <select name="sexe" id="sexe" required>
                                    <option value="M">M</option>
                                    <option value="F">F</option>
                                </select>
                                <input type="submit" value="Ajouter Chauffeur" class="bg-success text-light border-0 mt-4">
                                <hr>
                                <input type="reset" value="Nettoyer les champs" class="bg-warning border-0">
                            </form>
                        </div>
                    </div>
                    <div class="information-plus p-3 w-auto">
                        <h3 class=" mb-3 "> Informations sur Le chaufeur </h3>
                        <div class=" container-fluid p-4 border">
                            <div class="row m-1 mb-3 border w-auto">
                                <div class="col-12 col-sm-12 col-lg-4  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Nom : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold  div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-4  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Prénoms : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-4  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> E-mail : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-4  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Disponible : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-4  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Téléphone : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-4  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Sexe : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-8 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-5  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Créer le : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>
                            <div class="row m-1 mb-3 border ">
                                <div class="col-12 col-sm-12 col-lg-5  bg-dark-subtle p-1 px-3 text-sm-center text-md-center text-lg-end text-xl-end text-xxl-end text-center"> Der. Modification : </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-7 p-1 px-3 text-sm-center text-md-center text-lg-start text-xl-start text-xxl-start text-center fw-bold div-infos"></div>
                            </div>

                        </div>
                        <div class=" container-fluid p-4 border mt-2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 mb-3 text-center">
                                    <span class="btn fw-bold py-1 px-2 w-100 action1 modifierPlus" title=" Modifier ce Chauffeur ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                        </svg>
                                        Modifier
                                    </span>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3 text-center">
                                    <a href="" class="btn fw-bold py-1 px-2 w-100 action1 agirPlus" title=" Agir comme ce Chauffeur ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16">
                                            <path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                            <path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z" />
                                        </svg>
                                        Agir
                                    </a>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3 text-center d-none">
                                    <span href="" class="btn fw-bold py-1 px-2 w-100 action1 resetPlus" title=" Réinitialiser le mot de passe du chauffeur ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-disc-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-6 0a2 2 0 1 0-4 0 2 2 0 0 0 4 0M4 8a4 4 0 0 1 4-4 .5.5 0 0 0 0-1 5 5 0 0 0-5 5 .5.5 0 0 0 1 0m9 0a.5.5 0 1 0-1 0 4 4 0 0 1-4 4 .5.5 0 0 0 0 1 5 5 0 0 0 5-5" />
                                        </svg>
                                        Passe
                                    </span>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 mb-3 text-center">
                                    <span class="btn fw-bold py-1 px-2 w-100 action2 retirerPlus" id="/assets/includes/retirerChauffeur.php?id=<?php echo $a['chauffeur_id']; ?>" title=" Retirer le Chauffeur ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5" />
                                        </svg>
                                        Retirer
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
            <script src="/assets/js/common.js"></script>
            <script src="/assets/js/scripteChauffeur.js"></script>
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