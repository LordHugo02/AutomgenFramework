<?php

    if (!empty($_url_tab[2])) {

        switch ($_url_tab[2]) {

            case 'not_connected':
                $error_message = 'Veuillez vous connecter <a href="' . $pub_url . 'user/sign_in">ici</a> pour accéder à cette page.';
                $pagetitle = 'Connexion requise - QuickyProg';
                $pagedescription = 'Connexion requise - QuickyProg';
                break;

            default:
                $error_message = 'Erreur non connue.';
                $pagetitle = 'Erreur non connue - QuickyProg';
                $pagedescription = 'Erreur non connue - QuickyProg';
                break;

        }

    } else {

        $error_message = 'Erreur non connue.';
        $pagetitle = 'Erreur non connue - QuickyProg';
        $pagedescription = 'Erreur non connue - QuickyProg';

    }



    require ($view_rep . 'view.php');
