<?php
    namespace manager;

    use ModelUsers;

    class UsersManager extends Manager {

        public function __construct(DbConnect $db) {
            $this->setDb($db);
            $this->setTableName('users');
            $this->setTableIdField('IDusers');
            $this->setClassName('ModelUsers'); // Nom de la classe gérant l'objet
        }

        public function getFromEmail(string $email, array|string $fields = '*') : ModelUsers|false {

            $arg = array('start' => 0, 'limit' => 1, 'fields' => [], 'search' => [], 'sort' => []);

            $arg['fields'][] = array('table' => 'users', 'field' => 'IDusers');

            $arg['search'][] = array('table' => 'users', 'field' => 'email', 'operator' => '=', 'value' => $email);

            $IDusers_tab = $this->search($arg);

            if (!empty($IDusers_tab[0])) {
                $IDusers = $IDusers_tab[0]['IDusers'];

                $userObj = $this->get($IDusers, $fields);

                return $userObj;
            } else {
                return false;
            }

        }

    }
