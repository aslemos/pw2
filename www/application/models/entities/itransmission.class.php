<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

interface ITransmission {

    public function getId();

    public function setNom($nom_transmission);

    public function getNom();
}
