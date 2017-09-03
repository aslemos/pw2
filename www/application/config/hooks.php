<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	https://codeigniter.com/user_guide/general/hooks.html
|
*/

/**
 * Utilisation du hook de CI pour loader les classes spécifiques
 */
$hook['pre_controller'] = function() {
    set_include_path(get_include_path() . PATH_SEPARATOR
            . APPPATH
            . 'models' . DIRECTORY_SEPARATOR
            . 'entities');
    spl_autoload_extensions('.class.php');
    var_dump(get_include_path());
    spl_autoload_register();
};
