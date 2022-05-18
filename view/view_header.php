<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="theme-color" content="#0d6efd">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta title="<?php echo $pagetitle; ?>">
    <meta name="description" content="<?php echo $pagedescription; ?>">
    <link rel="icon" type="image/png" href="<?php echo $img_url . 'programmationServerLogo.png';?>">

    <!-- Import Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css_url . 'vendors/bootstrap-5.0.1/bootstrap.css';?>">

    <!-- Import Fontawesome -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css_url . 'vendors/fontawesome-5.15.1/all.css';?>">

    <!-- Import Site's CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $css_url . 'main.css';?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $css_url . $controller . '/' . strtolower($action) . '.css';?>">

    <title><?php echo $pagetitle; ?></title>
</head>
<header>
    <nav class="navbar navbar-expand-lg navbar-dark <?php echo isset($_SESSION['darkTheme']) && $_SESSION['darkTheme']?'bg-dark':'bg-primary' ?>">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo $pub_url;?>">
                <img class="rounded-circle d-inline-block align-top" src="<?php echo $img_url . 'programmationServerLogo.png' ?>" alt="Logo du serveur Discord">
                QuickyProg
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo $pub_url;?>">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="ressourcesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ressources
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="ressourcesDropdown">
                            <li><a class="dropdown-item" href="<?php echo $pub_url . 'ressources/generales';?>">Générales</a></li>
                            <li><a class="dropdown-item" href="<?php echo $pub_url . 'ressources/git';?>">Git</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <?php
                                foreach ($programmingLanguagesList as $programmingLanguages) {
                                    echo '<li><a class="dropdown-item" href="' . $pub_url . 'ressources/programming_languages/' . strtolower($programmingLanguages->IDprogramming_languages()) . '">' . $programmingLanguages->nom() . '</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                    <?php if ($connected) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $pub_url . 'games';?>">Jeux</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="<?php echo $pub_url;?>" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php if($connected) { ?>
                        <a class="btn text-white" href="<?php echo $pub_url . 'user/profil';?>" role="button">Bienvenue, <?php echo $user->pseudo(); ?></a>
                        <a class="btn border-white rounded-3 text-white" href="<?php echo $pub_url . 'user/disconnect';?>" role="button">Déconnexion</a>
                    <?php } else { ?>
                        <a class="btn text-white" href="<?php echo $pub_url . 'user/sign_in';?>" role="button">Sign in</a>
                        <a class="btn border-white rounded-3 text-white" href="<?php echo $pub_url . 'user/sign_up';?>" role="button">Sign up</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
</header>
<body class="Site">
<main class="Site-content">
