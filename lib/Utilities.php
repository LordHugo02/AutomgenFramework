<?php
class Utilities {

    public static function debug($var) {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * Détecte les tags HTML dans la chaine donnée
     * @param string $str la chaine dans laquelle il faut vérifier la présence de tag
     * @return bool vrai si des tags sont trouvés, faux sinon
     */
    public static function detect_tags(string $str): bool {
        $testHTML = 0;
        $testTag = 0;

        if (is_array($str)) {
            foreach($str as $real_string) {
                if (is_array($real_string)) {
                    foreach($real_string as $real_real_string) {
                        // Pas de code de la forme <tag attr=XXX>texte</tag>
                        if (preg_match("/<[^>]+>/", $real_real_string)) {
                            $testHTML++;
                        }

                        // Pas de code de la forme [tag attr=XXX]
                        if (preg_match("/[[^>]+]/", $real_real_string)) {
                            $testTag++;
                        }
                    }
                } else {
                    // Pas de code de la forme <tag attr=XXX>texte</tag>
                    if (preg_match("/<[^>]+>/", $real_string)) {
                        $testHTML++;
                    }

                    // Pas de code de la forme [tag attr=XXX]
                    if (preg_match("/[[^>]+]/", $real_string)) {
                        $testTag++;
                    }
                }
            }
        } else {
            // Pas de code de la forme <tag attr=XXX>texte</tag>
            if (preg_match("/<[^>]+>/", $str)) {
                $testHTML++;
            }

            // Pas de code de la forme [tag attr=XXX]
            if (preg_match("/[[^>]+]/", $str)) {
                $testTag++;
            }
        }

        if($testHTML || $testTag ) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Recupère des variables passées dans les champs GET et POST.
     * @param string $name Le nom du paramètre a récupérer
     * @param string $method POST ou GET ou vide, dans ce cas, les méthodes seront utilisées
     * @param bool $ctrl_tags Controle la valeur de la variable pour qu'aucun tag HTML ne passe
     * @return false|string la valeur de la variable récupérée, faux sinon
     */
    public static function load_param(string $name, string $method='', bool $ctrl_tags = true) : false|string {
        $variable = false;
        if ($method == '' || $method == 'POST') {
            if (isset($_POST[$name])) {
                $variable = $_POST[$name];
            }
        }
        if ($method == '' || $method == 'GET') {
            if (isset($_GET[$name])) {
                $variable = $_GET[$name];
            }
        }

        // Contrôle des balises HTML
        if ($ctrl_tags && self::detect_tags($variable)) {
            $variable = '';
        }

        return $variable;
    }

    public static function glob_recursive($pattern, $flags = 0) {
        $files = glob($pattern, $flags);
        foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
            $files = array_merge($files, self::glob_recursive($dir . '/' . basename($pattern), $flags));
        }
        return $files;
    }

}