<?php
/*
 * Interface de la classe EVille
 * @author Alessandro Lemos
 */

interface IVille {

    public function getId();

    public function getNom();
    public function setNom($nom_ville);

    public function getProvinceId();
    public function getProvince();
    public function setProvince(IProvince $province);
}
