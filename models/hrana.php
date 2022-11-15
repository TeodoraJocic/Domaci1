<?php


class Hrana{

   public $hranaID;
   public $nazivHrane;
   public $tipID;
   public $cena;
  
    public function __construct($hranaID=null, $nazivHrane=null, $tipID=null, $faza=null, $cena=null)
    {
        $this->hranaID = $hranaID;
        $this->nazivHrane=$nazivHrane;
        $this->tipID=$tipID;
        $this->cena=$cena;
    }

    public static function pretrazi($tip, $cena, mysqli $con)
    {
        $query = "SELECT * FROM hrana h join tip t on h.tipID = t.tipID";
        
        if($tip != "SVI"){
            $query .= " WHERE h.tipID = " . $tip;
        }
        $query.= " ORDER BY h.cena " . $cena;


        $resultSet = $con->query($query);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    
    public static function vrati(mysqli $con)
    {
        $query= "SELECT * FROM hrana h join tip t on h.tipID = t.tipID";
        $resultSet = $con->query($query);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    public static function dodaj($nazivHrane, $tipID, $cena, mysqli $con)
    {
        $query = "INSERT INTO hrana VALUES(null, '$nazivHrane' , '$tipID', '$cena')";
        return $con->query($query);
    }

    public static function izmeni($hranaID, $nazivHrane, $tip, $cena, mysqli $con)
    {
        $floatCena=floatval($cena);
        $query = "UPDATE hrana SET naziv = '$nazivHrane', tipID = '$tip', cena = '$floatCena' WHERE hranaID = '$hranaID'";
        return $con->query($query);
    }

    public static function obrisi($hranaID, mysqli $con)
    {
        $query = "DELETE FROM hrana WHERE hranaID = $hranaID";
        return $con->query($query);
    }
}