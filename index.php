<?php

    use manager\DbConnect;

    require './config/Config.php';
    require './lib/Utilities.php';

    $libs = Utilities::glob_recursive($lib_rep . '*');
    foreach ($libs as $lib) {
        require_once $lib;
    }

    $models = Utilities::glob_recursive($model_rep . '*');
    foreach ($models as $model) {
        require_once $model;
    }

    $managers = Utilities::glob_recursive($manager_rep . '*');
    foreach ($managers as $manager) {
        require_once $manager;
    }


    session_start();

    ini_set('display_errors', 1);
    ini_set('error_log', $logs_rep . 'error_log');
    error_reporting(E_ALL);

    /**
     * @var string $url
     */
    if(!empty($_GET['url'])) {
        $url = $_GET['url'];
        if($url[0] == '/') {
            $url = substr($url, 1);
        }
        if(strlen($url) > 0 && $url[strlen($url)-1] == '/') {
            $url = substr($url, 0, -1);
        }
    }else{
        $url = '';
    }


    /**
     * @var array $_url_tab
     */
    $_url_tab = explode('/', $url);

    $dbConnect = new DbConnect([
        'type' => $database['type'],
        'host' => $database['hostname'],
        'database' => $database['database'],
        'user' => $database['login'],
        'pass' => $database['password']
    ]);

    require_once File::build_path(array('controller', 'routeur.php'));