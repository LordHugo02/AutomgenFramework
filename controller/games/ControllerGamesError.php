<?php

    if (empty($_url_tab[3])) {
        $_url_tab[3] = null;
    }

    switch ($_url_tab[3]) {

        default:
            $error_message = 'Erreur non connue.';
            $pagetitle = 'Erreur non connue - QuickyProg';
            $pagedescription = 'Erreur non connue - QuickyProg';
            break;

    }

    require ($view_rep . 'view.php');