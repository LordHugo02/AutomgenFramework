<?php
    
    use manager\UsersManager;
    
    if(!$connected) {
        header('Location: ' . $pub_url . 'user/error/not_connected', true, 301);
        exit;
    } else {
        $pagetitle = 'Edit Profil - QuickyProg';
        $pagedescription = 'Edit Profil - QuickyProg';
        
        
        /**
         * Vars ini
         */
        // Forms
    
        $valid = Utilities::load_param('valid');
        $prenom = Utilities::load_param('prenom');
        $nom = Utilities::load_param('nom');
        $date_naissance = Utilities::load_param('date_naissance');
        $pseudo = Utilities::load_param('pseudo');
    
        // Internes
        $alerts = [
            'danger' => [],
            'warning' => [],
            'info' => [],
            'success' => []
        ];
        $fieldsNotValid = [];
    
        // Managers
        $usersManager = new UsersManager($dbConnect);
    
        if($valid) {
            // Demande de modification
        
            $timestamp_naissance = strtotime($date_naissance);
            if((time() - strtotime($date_naissance))/(60*60*24*365.25) < 10) {
                $valid = false;
                $alerts['danger'][] = 'Vous devez avoir 10 ans minimum.';
                if(!in_array('date_naissance', $fieldsNotValid))
                    $fieldsNotValid[] = 'date_naissance';
            }
        
        }
    
        if(!$valid) {
            require ($view_rep . 'view.php');
        } else {
            if($nom) {
                $user->setNom($nom);
            }
            
            if($prenom) {
                $user->setPrenom($prenom);
            }
            
            if($pseudo) {
                $user->setPseudo($pseudo);
            }
            
            if($date_naissance) {
                $user->setDate_naissance($date_naissance);
            }
            
            $usersManager->update($user, ['nom', 'prenom', 'pseudo', 'date_naissance']);
        
            header('Location: ' . $pub_url . 'user/profil', true, 301);
            exit;
        }
        
        
    }