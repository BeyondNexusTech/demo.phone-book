<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>DEMO - Annuaire téléphonique</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="<?= LIBS_ASSETS ?>bootstrap/css/bootstrap.min.css" type="text/css" />
        <!-- JQUERY -->
        <script src="<?= LIBS_ASSETS ?>jquery/jquery.min.js" type="application/javascript"></script>
        <!-- POPPER -->
        <script src="<?= LIBS_ASSETS ?>popper/popper.min.js" type="application/javascript"></script>
        <!-- BOOTSTRAP -->
        <script src="<?= LIBS_ASSETS ?>bootstrap/js/bootstrap.min.js" type="application/javascript"></script>
        <!-- FONTAWESOME -->
        <link rel="stylesheet" href="<?= LIBS_ASSETS ?>fontawesome/css/all.min.css" type="text/css" />
        <script src="<?= LIBS_ASSETS ?>fontawesome/js/all.min.js" type="application/javascript"></script>
        <!-- DATABLE -->
        <link rel="stylesheet" href="<?= LIBS_ASSETS ?>datatables/css/datatables.min.css" type="text/css" />
        <script src="<?= LIBS_ASSETS ?>datatables/js/datatables.min.js" type="application/javascript"></script>
        <!-- HIGHLIGHT -->
        <link rel="stylesheet" href="<?= LIBS_ASSETS ?>highlight/css/black-metal-dark-funeral.css?id=<?= uniqid() ?>" type="text/css" />
        <script src="<?= LIBS_ASSETS ?>highlight/js/highlight.min.js" type="application/javascript"></script>
        <!-- ANIMATE CSS -->
        <link rel="stylesheet" href="<?= LIBS_ASSETS ?>animatecss/animate.min.css" type="text/css" />
        <!-- Personal -->
        <link rel="stylesheet" href="<?= CUR_ASSETS ?>css/bootstrap-custom.css" type="text/css">
        <style>
            @media (max-width:991px) {
                #navHead{width:100vw!important;z-index:1100;}
                #navDoc{width:100vw!important;z-index:1099;display:flex;flex-direction:row;}
                #navbarDoc{width:100vw!important;}
                #docContent{width:100vw!important;font-size:11px;margin-top:58px;padding-top:56px;}
            }
            @media (min-width:992px) {
                #navDoc{width:225px!important;height:calc(100vh - 58px);}
                #docContent{max-width:calc(100% - 225px);margin-top:58px;margin-left:225px!important;}
                .w-md-50{width:50%!important;}
            }
        </style>
    </head>
    <body>
        <header class="navbar navbar-dark navbar-expand-lg bg-dark border-bottom shadow text-center fixed-top" id="navHead">
            <div class="container-fluid">
                <a class="navbar-brand text-primary fw-bold" href="/">
                    <img src="/images/logos/brands/apple-touch-icon.png" alt="Bootstrap" class="d-inline-block align-text-top me-2" height="30">
                    DEMO - Annuaire
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars fa-xl"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/phonebook/index">Annuaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/documentation">Documentation</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="get" role="search" action="/home/search">
                        <input class="form-control me-2" type="search" name="value" placeholder="Rechercher une information" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </header>
        <main class="container-fluid p-0">