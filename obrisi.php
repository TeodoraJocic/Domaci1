<?php
require 'baza.php';
require "models/hrana.php";

$jelo = trim($_POST['jelo']);

if(Hrana::obrisi($jelo, $con)){
    echo "Jelo je obrisano iz menija";
}else{
    echo "Server ne može da obriše jelo";
}
