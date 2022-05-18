<?php
    namespace manager;

    use Exception;
    use PDO;

    class DbConnect {

        private $type;
        private $host;
        private $database;
        private $user;
        private $pass;
        private $pdo;


        // Contructeur

        public function __construct($donnes) {
            foreach ($donnes as $key => $value) {
                $this->$key = $value;
            }
            $this->connect();
        }


        // Setters

        public function setType($type) {
            if($type == 'mysql') {
                $this->type = $type;
            }
        }

        public function setHost($host) {
            if(is_string($host)) {
                $this->host = $host;
            }
        }

        public function setDatabase($database) {
            if(is_string($database)) {
                $this->database = $database;
            }
        }

        public function setUser($user) {
            if(is_string($user)) {
                $this->user = $user;
            }
        }

        public function setPass($pass) {
            if(is_string($pass)) {
                $this->pass = $pass;
            }
        }


        // Getters

        public function type() {
            return $this->type;
        }

        public function pdo() {
            return $this->pdo;
        }


        // Méthodes & Functions

        public function connect() {
            try {
                $dsn = $this->type . ':host=' . $this->host . ';dbname=' . $this->database;
                $options = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                ];

                $this->pdo = new PDO($dsn, $this->user, $this->pass, $options);
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
                $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }
        }

    }