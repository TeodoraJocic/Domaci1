<?php
require 'baza.php';
require "models/hrana.php";

$naziv = trim($_POST['naziv']);
$tip = trim($_POST['tip']);
$cena = trim($_POST['cena']);

if(Hrana::dodaj($naziv, $tip, $cena, $con)){
    echo "Jelo je uneto u meni";
}else{
    echo "Server ne može da zapamti jelo";
}
