<?php

$con = new mysqli("localhost", "root", "", "restoran");

if ($con->connect_errno){
    exit("Greska: ".$con->connect_error.", kod:".$con->connect_errno);
}
?>