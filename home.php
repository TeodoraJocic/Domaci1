<?php

session_start();
$por = "";

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
if (isset($_COOKIE["userB"]))
    {
        $por="Ulogovani ste kao: " . $_COOKIE["userB"];
    }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>L'unico</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    
    <body>

    <section class="section" id="pretraga" style="padding-top: 50px">
        <div class="container" style="margin-top: 20px">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <img src="assets/css/logo.png" style="width: 90%; margin: auto">
                        <h5 id="por" style="color:white; font-weight: 400;"><i><?= $por; ?></i></h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 offset-lg-3 text-center">
            <button id="btnDodajForma" type="button" class="btn btn-success" style="background-color: #c36b1ec8; width: 30%;" data-toggle="modal" data-target="#dodajForma">Dodaj u meni</button>
            <button id="btnIzmeniForma" type="button" class="btn btn-success" style="background-color: #c36b1ec8; width: 30%" data-toggle="modal" data-target="#izmeniForma">Izmeni meni</button>
            <button id="btnObrisiForma" type="button" class="btn btn-success" style="background-color: #c36b1ec8; width: 30%" data-toggle="modal" data-target="#obrisiForma">Obrisi iz menija</button>
            <br><br>
            <i><h6 id="uspesno" style="color:white;"></h6></i>
        </div>
        
        <div class="row" style="width:35%; margin:auto; margin-top: 0%;">
            <label for="tip-P" style="color:white;">Tip jela</label>
            <select class="form-control" id="tip-P" onchange="pretraga()"></select>
            <label for="cena-P" style="color:white;">Cena</label>
            <select class="form-control" id="cena-P" onchange="pretraga()">
                <option value="asc">Prvo jeftinija jela</option>
                <option value="desc">Prvo skuplja jela</option>
            </select>
        </div>


        <br><br>

        <div class="tab" id="tabela" style="padding-top: 10px; width: 50%; margin: auto; text-align: center;"></div>
    </section>

<!-------------------------------------------- DODAJ --------------------------------------------------->
    <div class="modal fade" id="dodajForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#c36b1ec8">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="dodajForm">
                            <h2 style="color: black; text-align: center; width: 500px;"><i>Dodaj u meni</i></h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="naziv-D">Naziv</label>
                                        <input type="text" id="naziv-D" class="form-control">
                                        
                                        <label for="tip-D">Tip</label>
                                        <select name="tip-D" id="tip-D" style="border: 1px solid black" class="form-control">
                                        </select>

                                        <label for="cena-D">Cena</label>
                                        <input type="number" class="form-control" id="cena-D">
                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px;">
                                    <br>
                                    <button id="btnDodaj" type="button" class="btn btn-success btn-block" style="background-color: #c36b1ec8;" onclick="dodaj()">Dodaj</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------ IZMENI -------------------------------->
    <div class="modal fade" id="izmeniForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#c36b1ec8">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="izmeniForm">
                            <h2 style="color: black; text-align: center; width: 500px;"><i>Izmeni meni</i></h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="jelo-I">Jelo</label>
                                        <select name="jelo-I" id="jelo-I" style="border: 1px solid black" class="form-control"> </select><br><br>

                                        <label for="naziv-I">Naziv</label>
                                        <input type="text" id="naziv-I" class="form-control">
                                        
                                        <label for="tip-I">Tip</label>
                                        <select name="tip-I" id="tip-I" style="border: 1px solid black" class="form-control">
                                        </select>

                                        <label for="cena-I">Cena</label>
                                        <input type="number" class="form-control" id="cena-I">

                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px">
                                    <br>
                                    <button id="btnIzmeni" type="button" class="btn btn-success btn-block" style="background-color: #c36b1ec8;" onclick="izmeni()">Izmeni</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!----------------------------------- OBRISI -------------------------------------------------------->
    <div class="modal fade" id="obrisiForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#c36b1ec8">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="obrisiForm">
                            <h2 style="color: black; text-align: center; width: 500px;"><i>Obrisi iz menija</i></h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="jelo-O">Jelo</label>
                                        <select name="jelo-O" id="jelo-O" style="border: 1px solid black" class="form-control"> </select>
                                    
                                    </div>
                                    <div class="col-md-4"  style="width: 90%; margin: auto; margin-top: 10px">
                                        <br>
                                        <button id="btnObrisi" type="button" class="btn btn-success btn-block" style="background-color: #c36b1ec8;" onclick="obrisi()">Obrisi</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
 
 

    <script>
        
        function tipovi() {
            $.ajax({
                url: 'popuniTipove.php',
                success: function (data) {
                    $("#tip-D").html(data);
                    $("#tip-I").html(data);
                }
            })
        }

        function tipovi_pretraga() {
            $.ajax({
                url: 'popuniTipove.php',
                success: function (data) {
                    let t = "<option value='SVI'>Svi</option>" + data;
                    $("#tip-P").html(t);
                }
            })
        }

        function jela(){
            $.ajax({
                url: 'popuniJela.php',
                success: function (data) {
                    $("#jelo-I").html(data);
                    $("#jelo-O").html(data);
                }
            })
        }
        
        function pretraga() {
            
            let tip = $("#tip-P").val();
            let cena = $("#cena-P").val();
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#tabela").html(data);
                }
            })
        }

        function sredi() {
            
            let tip = "SVI";
            let cena = "asc";
            
            $.ajax({
                url: 'pretraga.php',
                data: {
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#tabela").html(data);
                }
            })
        }

        sredi();
        tipovi_pretraga();
        tipovi();
        jela();
   
        
        function dodaj() {
            let naziv = $("#naziv-D").val();
            let tip = $("#tip-D").val();
            let cena = $("#cena-D").val();
            
            $.ajax({
                url: 'dodaj.php',
                method: 'post',
                data: {
                    naziv: naziv,
                    tip: tip,
                    cena: cena
                },
                success: function (data) {
                    $("#uspesno").html(data);
                    jela();
                    pretraga();
                }
            })
        }

        function izmeni() {
            let jelo = $("#jelo-I").val();
            let naziv = $("#naziv-I").val();
            let tip = $("#tip-I").val();
            let cena = $("#cena-I").val();
            $.ajax({
                url: 'izmeni.php',
                method: 'post',
                data: {
                    jelo: jelo,
                    naziv: naziv,
                    tip: tip,
                    cena: cena
                },
                success: function (data) {

                    $("#uspesno").html(data);
                    jela();
                    pretraga();
                }
            })
        }

        function obrisi() {
            let jelo = $("#jelo-O").val();
            $.ajax({
                url: 'obrisi.php',
                method: 'post',
                data: {
                    jelo: jelo
                },
                success: function (data) {

                    $("#uspesno").html(data);
                    jela();
                    pretraga();
                }
            })
        }

    </script>
  </body>
</html>