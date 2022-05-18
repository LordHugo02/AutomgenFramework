<?php
class File {

    /**
     * @param array $path_array
     * @return string Un chemin construit dynamiquement
     */
    public static function build_path(array $path_array) : string {
        $DS = DIRECTORY_SEPARATOR;
        $ROOT_FOLDER = $_SERVER['DOCUMENT_ROOT'];
        return $ROOT_FOLDER.$DS.join($DS, $path_array);
    }

}