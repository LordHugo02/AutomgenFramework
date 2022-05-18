<?php

    /**
     * Mise en place des données communes à toutes les pages
     */

    /**
     * Gestion de la connexion
     */

    use manager\Programming_languagesManager;
    use manager\UsersManager;

    if (isset($_SESSION['IDusers'])) {
        /**
         * L'utilisateur est connecté
         */
        $usersManager = new UsersManager($dbConnect);

        if (!$user = $usersManager->get($_SESSION['IDusers'])) {
            $connected = false;
        } else {
            if($user->email() == $_SESSION['login']) {
                $connected = true;
            } else {
                $connected = false;
            }
        }

    } else {
        $connected = false;
    }

    /**
     * Gestion des langages de programmation
     */
    $programmingLanguagesManager = new Programming_languagesManager($dbConnect);

    $list_IDprogramming_languages = $programmingLanguagesManager->search();
    $programmingLanguagesList = $programmingLanguagesManager->getList($list_IDprogramming_languages);


    /**
     * Gestion des controllers
     */
    if(!empty($_url_tab[0])) {
        $controller = $_url_tab[0];
    }else{
        $controller = 'accueil';
    }

    /**
     * Gestion des actions
     */
    if(isset($_url_tab[1])) {

        $action = $_url_tab[1];

    }else{
        if ($controller == 'games') {
            $action = 'routing';
        } else {
            $action='show';
        }
    }

/**
 * Mise en place du routage
 */
    $controller_file = $controller_rep . $controller . '/Controller' . ucfirst($controller) . ucfirst($action) . '.php';

    if(file_exists($controller_rep . $controller)) {
        if(file_exists($controller_file)) {
            require ($controller_file);
        } else {
            $action = 'error';
            require ($controller_rep . $controller . '/Controller' . ucfirst($controller) . 'Error.php');
        }
    } else {
        $controller = 'accueil';
        $action = 'show';
        require $controller_rep . 'accueil/ControllerAccueilShow.php';
    }
