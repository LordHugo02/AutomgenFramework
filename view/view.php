<?php
    require ($view_rep . 'view_header.php');
    require ($view_rep . $controller . '/' . strtolower($action) . '.php');
    require ($view_rep . 'view_footer.php');
?>