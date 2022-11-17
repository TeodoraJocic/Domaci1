<?php
require 'baza.php';
require "models/hrana.php";

$jelo = trim($_POST['jelo']);
$naziv = trim($_POST['naziv']);
$tip = trim($_POST['tip']);
$cena = trim($_POST['cena']);


if(Hrana::izmeni($jelo, $naziv, $tip, $cena, $con)){
    echo "Jelo iz menija je izmenjeno";
}else{
    echo "Server ne može da izmeni jelo";
}
