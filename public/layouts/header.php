<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="public/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="shortcut icon" href="public/img/favicon.ico" type="image/x-icon">
    <title>Ubook</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-4dp">
            <img src="./public/img/logo_transparent.png" alt="" class="logo">
            <a class="navbar-brand" href="/">Ubook</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">accueil<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <!-- Profil -->
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profil</a>
                    </li>
                    <li class="nav-item">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <a class="nav-link" href="/books">livres</a>
                        <?php } ?>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <?php if (isset($_SESSION['username']) && checkRole($id) === 1) { ?>
                            <a class="nav-link" href="/admin">Administration</a>
                        <?php } ?>

                    </li>
                    <!-- S'inscrire -->
                    <li class="nav-item">
                        <?php if (!isset($_SESSION['username'])){ ?>
                            <a class="nav-link" href="/register">S'inscrire</a>
                        <?php } ?>
                    </li>
                    <!-- Connexion/Deconnexion -->
                    <li class="nav-item">
                        <?php if (isset($_SESSION['username'])) { ?>
                            <a class="nav-link" href="/logoutAction">Deconnexion</a>
                        <?php } else { ?>
                            <a class="nav-link" href="/login">Connexion</a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
