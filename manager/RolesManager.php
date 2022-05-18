<?php
    namespace manager;

    use \manager\Manager;

    class RolesManager extends Manager {

        public function __construct(DbConnect $db) {
            $this->setDb($db);
            $this->setTableName('roles');
            $this->setTableIdField('IDroles');
            $this->setClassName('ModelRoles'); // Nom de la classe gérant l'objet
        }

    }