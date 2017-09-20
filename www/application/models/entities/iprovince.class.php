<?php
/*
 * Interface de la classe EProvince
 * @author Alessandro Souza Lemos
 */
interface IProvince {

    public function getId();

    public function setNom($nom_province);
    public function getNom();
}
