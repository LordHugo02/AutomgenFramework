<?php

    use manager\UsersManager;

    /**
     * Vars ini
     */
    // Forms

    $valid = Utilities::load_param('valid');
    $email = Utilities::load_param('email');
    $password = Utilities::load_param('password');

    // Internes
    $alerts = [
        'danger' => [],
        'warning' => [],
        'info' => [],
        'success' => []
    ];
    $pagetitle = 'Connexion - QuickyProg';
    $pagedescription = 'Connexion - QuickyProg';
    $fieldsNotValid = [];

    $usersManager = new UsersManager($dbConnect);

    if($valid) {
        // Demande d'inscription

        if (!$email || !$password) {
            $valid = false;
            $alerts['danger'][] = 'Merci de remplir les champs obligatoires (marqués d\'un *).';
        }

        // recup d'email
        if (!preg_match('/[a-zA-Z0-9\.]+@[a-zA-Z0-9\.]+\.[a-zA-Z0-9\.].+/', $email)) {
            $valid = false;
            $alerts['danger'][] = 'L\'adresse mail n\'est pas valide.';
            if (!in_array('email', $fieldsNotValid))
                $fieldsNotValid[] = 'email';
        }

        if (!preg_match("/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&+\[\]\^\<\>\(\)\{\}\#\_\-])[A-Za-z\d@$!%*?&+\[\]\^\<\>\(\)\{\}\#\_\-]{8,}/", $password)) {
            $valid = false;
            $alerts['danger'][] = 'Le mot de passe doit faire au moins 8 caractères et contenir une majuscule, une minuscule, un chiffre et caractère spécial.';
            if (!in_array('password', $fieldsNotValid))
                $fieldsNotValid[] = 'password';
        }

        /**
         * On reverifie $valid pour s'assurer que les input sont correctement formatées
         */
        if($valid) {

            /**
             * Récupération de l'email et password dans la BDD
             */
            if(!$user = $usersManager->getFromEmail($email, ['IDusers', 'email', 'password'])) {
                $valid = false;
                $alerts['danger'][] = 'L\'email et/ou le mot de passe sont invalides.' . __LINE__;
                if (!in_array('email', $fieldsNotValid))
                    $fieldsNotValid[] = 'email';
                if (!in_array('password', $fieldsNotValid))
                    $fieldsNotValid[] = 'password';
            } else {
                $password_hash = hash($algo_crypt, $password . $salt_crypt);
                if($password_hash != $user->password()) {
                    $valid = false;
                    $alerts['danger'][] = 'L\'email et/ou le mot de passe sont invalides.' . __LINE__;
                    if (!in_array('email', $fieldsNotValid))
                        $fieldsNotValid[] = 'email';
                    if (!in_array('password', $fieldsNotValid))
                        $fieldsNotValid[] = 'password';
                }
            }

        }
    }

    if(!$valid) {
        require ($view_rep . 'view.php');
    } else {
        $_SESSION['IDusers'] = $user->IDusers();
        $_SESSION['login'] = $user->email();

        header('Location: ' . $pub_url, true, 301);
        exit;
    }
