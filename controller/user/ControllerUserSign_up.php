<?php

    use manager\TokensManager;
    use manager\UsersManager;

    /**
     * Vars ini
     */
    // Forms

    $valid = Utilities::load_param('valid');
    $email = Utilities::load_param('email');
    $password = Utilities::load_param('password');
    $password_confirm = Utilities::load_param('password_confirm');
    $prenom = Utilities::load_param('prenom');
    $nom = Utilities::load_param('nom');
    $date_naissance = Utilities::load_param('date_naissance');
    $pseudo = Utilities::load_param('pseudo');
    $conditions = Utilities::load_param('conditions');

    // Internes
    $alerts = [
        'danger' => [],
        'warning' => [],
        'info' => [],
        'success' => []
    ];
    $fieldsNotValid = [];
    $pagetitle = 'Inscription - QuickyProg';
    $pagedescription = 'Inscription - QuickyProg';

    // Managers
    $usersManager = new UsersManager($dbConnect);

    if($valid) {
        // Demande d'inscription

        if(!$email || !$password || !$password_confirm || !$date_naissance || !$pseudo || !$conditions) {
            $valid = false;
            $alerts['danger'][] = 'Merci de remplir les champs obligatoires (marqués d\'un *).';
        }


        // Date de naissance
        $timestamp_naissance = strtotime($date_naissance);
        if(!$timestamp_naissance) {
            $valid = false;
            $alerts['danger'][] = 'Veuillez saisir une date valide.';
            if(!in_array('date_naissance', $fieldsNotValid))
                $fieldsNotValid[] = 'date_naissance';
        } else if((time() - strtotime($date_naissance))/(60*60*24*365.25) < 10) {
            $valid = false;
            $alerts['danger'][] = 'Vous devez avoir 10 ans minimum.';
            if(!in_array('date_naissance', $fieldsNotValid))
                $fieldsNotValid[] = 'date_naissance';
        }

        if(!preg_match('/[a-zA-Z0-9\.]+@[a-zA-Z0-9\.]+\.[a-zA-Z0-9\.].+/', $email)) {
            $valid = false;
            $alerts['danger'][] = 'L\'adresse mail n\'est pas valide.';
            if(!in_array('email', $fieldsNotValid))
                $fieldsNotValid[] = 'email';
        }

        if(!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&+\[\]\^\<\>\(\)\{\}\#\_\-])[A-Za-z\d@$!%*?&+\[\]\^\<\>\(\)\{\}\#\_\-]{8,}/", $password)) {
            $valid = false;
            $alerts['danger'][] = 'Le mot de passe doit faire au moins 8 caractères et contenir une majuscule, une minuscule, un chiffre et caractère spécial parmis (@, $, !, %, *, ?, &, +) et aucun espace.';
            if(!in_array('password', $fieldsNotValid))
                $fieldsNotValid[] = 'password';
        }

        if($password !== $password_confirm) {
            $valid = false;
            $alerts['danger'][] = 'Les mots de passes ne correspondent pas.';
            if(!in_array('password', $fieldsNotValid))
                $fieldsNotValid[] = 'password';
            if(!in_array('password_confirm', $fieldsNotValid))
                $fieldsNotValid[] = 'password_confirm';
        }

        $arg = array('start' => 0, 'limit' => 0, 'fields' => [], 'search' => [], 'sort' => []);

        $arg['search'][] = array('table' => 'users', 'field' => 'email', 'operator' => '=', 'value' => $email);

        $usersFounds = $usersManager->search($arg);

        if(count($usersFounds) > 0) {
            $valid = false;
            $alerts['danger'][] = 'Un compte existe déjà avec cet email.';
            if(!in_array('email', $fieldsNotValid))
                $fieldsNotValid[] = 'email';
        }

    }

    if(!$valid) {
        require ($view_rep . 'view.php');
    } else {

        $user = new ModelUsers();

        $user->setEmail($email);
        $user->setPassword(hash($algo_crypt, $password . $salt_crypt));
        if($nom)
            $user->setNom($nom);
        if($prenom)
            $user->setPrenom($prenom);
        $user->setPseudo($pseudo);
        $user->setDate_naissance($date_naissance);
        $user->setIDroles(1);

        $usersManager->add($user);


        $tokensManager = new TokensManager($dbConnect);

        $tokenVerifEmail = new ModelTokens();

        $tokenVerifEmail->setToken(hash($algo_crypt, $user->IDusers() . $user->email() . $salt_crypt));
        $tokenVerifEmail->setType('mail_verification');
        $tokenVerifEmail->setTime_expire(time() + 10*60); // Dix minutes de validité
        $tokenVerifEmail->setEntite('users');
        $tokenVerifEmail->setIDentite($user->IDusers());

        if (!$IDtokens = $tokensManager->add($tokenVerifEmail)) {
            error_log('(' . __FILE__ . ':' . __LINE__ . ') Erreur lors de la création du token');
        }

        $messageEmail = '
            <h2>Merci pour votre inscription sur QuickyProg</h2>
            <p>Pour valider votre email, cliquez <a href="' . $pub_url .'user/mail_verification/' . $tokenVerifEmail->token() . '">ici</a></p>
        ';
        if (!Mails::sendMail('no_reply@automgen.dev', $user->email(), 'Vérification d\'email', $messageEmail, true)) {
            error_log('Le mail n\'a pas pû être envoyé à ' . $user->email());
        }

        header('Location: ' . $pub_url . 'user/created', true, 301);
        exit;
    }

