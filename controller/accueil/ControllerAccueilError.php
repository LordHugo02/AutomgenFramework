<?php

    switch ($_url_tab[2]) {

        default:
            $error_message = 'Erreur non connue.';
            $pagetitle = 'Erreur non connue - QuickyProg';
            $pagedescription = 'Erreur non connue - QuickyProg';
            break;

    }

    require ($view_rep . 'view.php');