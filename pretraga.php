<?php
require 'baza.php';
require "models/hrana.php";

$tip = trim($_GET['tip']);
$cena = trim($_GET['cena']);

$niz = Hrana::pretrazi($tip, $cena, $con);

if(count($niz)==0){
    echo "Nema stavki menija za prikaz";
}
 
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th style="width: 50%">Naziv</th>
                <th style="width: 50%">Cena</th>
            </tr>
        </thead>
    <tbody>

<?php

foreach ($niz as $hrana) {
    ?>
    <tr>
        <td><?= $hrana->nazivTipa . " " . $hrana->naziv ?></td>
        <td><?= $hrana->cena . " RSD"?></td>
    </tr>
    <?php
}
?>
    </tbody>
</table>
