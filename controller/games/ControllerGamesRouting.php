<?php

    if ($connected) {

        if (isset($_url_tab[2])) {

            $game = $_url_tab[2];

            require $controller_rep . $controller . '/' . $game . '/ControllerGames' . ucfirst($game) . '.php';

        } else {

            $action = 'show';

            require $controller_rep . $controller . '/ControllerGamesShow.php';
        }

    } else {

        require $controller_rep . $controller . '/ControllerGamesError.php';

    }



