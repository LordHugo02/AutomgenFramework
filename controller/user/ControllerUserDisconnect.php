<?php

    $pagetitle = 'Déconnexion - QuickyProg';
    $pagedescription = 'Déconnexion - QuickyProg';

    if(session_destroy()) {
        $connected = false;
        require $view_rep . 'view.php';
    } else {
        header('Location: ' . $pub_url, true, 301);
        exit;
    }

