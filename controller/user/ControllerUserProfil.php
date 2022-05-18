<?php
    
    if(!$connected) {
        header('Location: ' . $pub_url . 'user/error/not_connected', true, 301);
        exit;
    } else {
        $pagetitle = 'Profil - QuickyProg';
        $pagedescription = 'Profil - QuickyProg';
        require ($view_rep . 'view.php');
    }
    
    