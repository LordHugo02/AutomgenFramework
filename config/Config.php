<?php

    $database = [
        'type' => 'mysql',
        'database' => 'u367551953_mystipixel',
        'hostname' => 'sql730.main-hosting.eu',
        'login' => 'u367551953_mystipixel',
        'password' => '@xeHh46UeWHuLxD*'
    ];

    $pub_url = 'http://mystipixel.fr/';
    $mode_test = true;

    // Sécurité
    $salt_crypt = '5xNB*?Ep?r$htqBD';
    $algo_crypt = 'sha256';

    // Répertoires
    $base_rep = $_SERVER['DOCUMENT_ROOT'] . '/';
    $controller_rep = $base_rep . 'controller/';
    $css_rep = $base_rep . 'css/';
    $font_rep = $base_rep . 'font/';
    $img_rep = $base_rep . 'img/';
    $js_rep = $base_rep . 'js/';
    $lib_rep = $base_rep . 'libs/';
    $manager_rep = $base_rep . 'manager/';
    $model_rep = $base_rep . 'model/';
    $view_rep = $base_rep . 'view/';
    $logs_rep = $base_rep . 'logs/';

    //URLs
    $controller_url = $pub_url . 'controller/';
    $css_url = $pub_url . 'css/';
    $font_rep = $pub_url . 'font/';
    $img_url = $pub_url . 'img/';
    $js_url = $pub_url . 'js/';
