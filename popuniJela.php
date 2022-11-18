<?php

require 'baza.php';
require "models/hrana.php";

$niz = Hrana::vrati($con);

foreach ($niz as $hrana) {
?>
<option value="<?= $hrana->hranaID ?>"><?= $hrana->nazivTipa . " " . $hrana->naziv?></option>
<?php
}