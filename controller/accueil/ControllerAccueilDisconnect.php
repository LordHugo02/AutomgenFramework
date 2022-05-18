<?php

    $pagetitle = 'Déconnexion - QuickyProg';
    $pagedescription = 'Déconnexion - QuickyProg';

    session_destroy();

    header('Location: ' . $pub_url, true, 301);
    exit;