<?php

interface IUsager {

    public function getId();

    public function getEtat();

    public function toString();

    public static function getDescriptionEtat($etat_usager);
}