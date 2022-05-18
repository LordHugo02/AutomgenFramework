<?php

    use manager\TokensManager;

    $pagetitle = 'Accueil - QuickyProg';
    $pagedescription = 'Test Accueil QuickyProg';

    // $mailSend = Mails::sendMail('test@programmation.automgen.dev', 'quickyprog@yopmail.com', 'Test email from quickyprog', '<h1>Coucou je suis un test</h1>', true);
    $tokensManager = new TokensManager($dbConnect);

    $idToken = $tokensManager->generateToken($algo_crypt, $salt_crypt,120, 'forgotten_password', 'users', 1);

    $valid = $tokensManager->checkTokenValidity($tokensManager->get($idToken)->token());

    require $view_rep . 'view.php';
