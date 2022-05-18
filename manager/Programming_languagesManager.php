<?php
    namespace manager;

    use ModelUsers;

    class Programming_languagesManager extends Manager {

        public function __construct(DbConnect $db) {
            $this->setDb($db);
            $this->setTableName('programming_languages');
            $this->setTableIdField('IDprogramming_languages');
            $this->setClassName('ModelProgramming_languages'); // Nom de la classe gérant l'objet
        }

    }