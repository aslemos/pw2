<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('form_validation','session', 'pagination');

$autoload['drivers'] = array();

$autoload['helper'] = array('url', 'form', 'file', 'text');

$autoload['config'] = array();

$autoload['language'] = array();


$autoload['model'] = array(
    'vehicule_model',
    'marque_model', 
    'modele_model', 
    'commentaire_model',
    'user_model', 
    'role_model'
);
