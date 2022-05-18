<?php

    use manager\TokensManager;

    $token = $_url_tab[2];

    $tokensManager = new TokensManager($dbConnect);

    if ($tokensManager->checkTokenValidity($token)) {

        // Token valide
        $entete = 'Email vérifié';
        $texte = 'Merci ! Votre email est maintenant completement associé à votre compte QuickyProg.';

        $arg = array('start' => 0, 'limit' => 1, 'fields' => [], 'search' => [], 'sort' => []);

        $arg['fields'][] = array('table' => 'tokens', 'field' => 'IDtokens');

        $arg['search'][] = array('table' => 'tokens', 'field' => 'token', 'operator' => '=', 'value' => $token);

        $IDtokens = $tokensManager->search($arg)[0]['IDtokens'];

        $tokensManager->delete($IDtokens);

    } else {

        // Token invalide ou expiré
        $entete = 'Lien invalide';
        $texte = 'Merci de demander l\'envoi d\'un nouveau lien de vérification.';

    }

    $pagetitle = 'Vérification email - QuickyProg';
    $pagedescription = 'Vérification email - QuickyProg';
    require ($view_rep . 'view.php');