<?php
    namespace manager;

    use ModelTokens;

    class TokensManager extends Manager {

        public function __construct(DbConnect $db) {
            $this->setDb($db);
            $this->setTableName('tokens');
            $this->setTableIdField('IDtokens');
            $this->setClassName('ModelTokens'); // Nom de la classe gérant l'objet
        }

        /**
         * Génère un token avec les infos données
         * @param string $algo_crypt
         * @param string $salt_crypt
         * @param int $expirationDelay temps avant l'expiration en secondes
         * @param string $type
         * @param string $entite
         * @param int $IDentite
         * @return int|false l'ID du token généré en cas de réussite, false sinon
         */
        public function generateToken(string $algo_crypt, string $salt_crypt, int $expirationDelay, string $type = "", string $entite = "", int $IDentite = -1) : int|false {

            $tokensManager = new TokensManager($this->db);

            $time = time();

            // On créer le token
            $modelToken = new ModelTokens();

            $modelToken->setToken(hash($algo_crypt, $type . $entite . $IDentite . $salt_crypt . $time));
            if (!empty($type))
                $modelToken->setType($type);
            if (!empty($entite))
                $modelToken->setEntite($entite);
            $modelToken->setTime_expire($time + $expirationDelay);
            if ($IDentite > 0)
                $modelToken->setIDentite($IDentite);


            // On cherche si des tokens identiques existent déjà
            $arg = array('start' => 0, 'limit' => 0, 'fields' => [], 'search' => [], 'sort' => [], 'sequence' => '');

            $arg['search'][] = array('table' => 'tokens', 'field' => 'token', 'operator' => '=', 'value' => $modelToken->token());

            $modelToken_tab = $tokensManager->search($arg);

            // Pour tous les tokens identiques trouvés, on les supprime.
            foreach ($modelToken_tab as $idModelToken) {

                if(!$tokensManager->delete($idModelToken)) {
                    error_log('(' . __FILE__ . ':' . __LINE__ . ') Impossible de supprimer le token #' . $idModelToken, E_USER_ERROR);
                    return false;
                }

            }

            // On enregistre notre token
            return $tokensManager->add($modelToken);

        }

        /**
         * @param string $token
         * @return bool true s'il est valide sinon false
         */
        public function checkTokenValidity(string $token) : bool {

            $tokensManager = new TokensManager($this->db);

            // On cherche un tokens
            $arg = array('start' => 0, 'limit' => 1, 'fields' => [], 'search' => []);

            $arg['fields'][] = array('table'=>'tokens','field'=>'IDtokens');
            $arg['fields'][] = array('table'=>'tokens','field'=>'time_expire');

            $arg['search'][] = array('table' => 'tokens', 'field' => 'token', 'operator' => '=', 'value' => $token);

            $modelToken = $tokensManager->search($arg)[0];

            if (!isset($modelToken)) {
                error_log('(' . __FILE__ . ':' . __LINE__ . ') Impossible de trouver le token ' . $token, E_USER_ERROR);
                return false;
            }

            return $modelToken['time_expire'] >= time();

        }

    }