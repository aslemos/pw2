<?php

interface IUsager {

    public function getId();

    public function getEtat();

    public static function getDescriptionEtat($etat_usager);
}
