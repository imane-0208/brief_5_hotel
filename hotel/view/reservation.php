<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS Style -->
    <!-- <link rel="stylesheet" href="../css/" /> -->

    <style>
      .child,.room,.pension {
        display: none;
      }


      /* .vue_type {
        display: none;
      } */
    </style>

<!-- <?php  /* 
session_start();
$userId  = $_SESSION['id'];
$roomType;
$roomVue ;
$bedType ;
$nombreEnfant;
$totalPrice;
$buttonType;

$roomNumber = $_POST['roomNumber'];
for($i = 0 ; $i<$roomNumber ;$i++) {
$bienType = $_POST['appt'] ?? $_POST['bang'] ?? $_POST['hotel'] ?? null;
$roomType =  $_POST['chambre_type'.$i] ?? null;
$roomVue =   $_POST['vue'.$i] ?? null;
$bedType =  $_POST['bed'.$i] ?? null;

} */
?> -->



<?php

//include'../controller/client_login.php'


/* session_start();
if (isset($_POST['reserver'])) {

  $today = date("Y/m/d");
  $date_d = $_POST['date_d'];
  $date_f = $_POST['date_f'];
  $id_user =  $_SESSION['id'];

  $rooms = $_POST['rooms'] ??null;
  $vues = $_POST['vues'] ?? null;
  $lits = $_POST['lits'] ?? null;

  $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES,TRUE);
    $sql = 'INSERT INTO `_reservation`(`date_reservation`, `debut_sejour`, `fin_sejour`, `fk_client`) VALUES (?,?,?,?)';
    $stmt = $this->conn->prepare($sql);
    $stmt->execute([$today,$date_d,$date_f,$id_user]);

    $Idreservation = $this->conn->lastInsertId('_reservation') ; 



  // print_r($rooms);
  foreach($rooms as $key => $value){

    $query = "INSERT INTO `_panier`( `fk_bien`, `fk_reservation`) VALUES((select id_Bien from _bien where	type_chambre = '$value[typechambre]' and vue_bien = '$value[vuetype]' and categorie_age is NULL and (lit_chambre  = '$value[typelit]' or lit_chambre is Null )),?,?)";
    $stmt = $this->conn->prepare($query);
    $stmt->execute([$Idreservation]);
  

  }
  
} */


?>




    <title>Hello, world!</title>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        let scriptEl = document.createElement("script");
        scriptEl.setAttribute("src", "./reservation.js");
        document.body.appendChild(scriptEl);
      });
    </script>

    <!-- <script src="maintest.js" defer></script> -->
  </head>
  <body>
    <div class="container">
      <form method="post" action="../controller/reserv.php">
        <div class="reseverSelectNode">

        <label for="debut_sejour">cheek in :</label><br>
        <input type="date" id="debut_sejour" name="date_d"><br><br>

        <label for="fin_sejour	">cheek out	:</label><br>
        <input type="date" id="fin_sejour	" name="date_f"><br><br>

          <input type="checkbox" id="appt" name="appt" value="apparts" class="" />
          <label for="appt">appartement</label><br />
          <input type="checkbox" id="bang" name="bang" value="bungalow" class="" />
          <label for="bang">bungalow</label><br />
          <input type="checkbox" id="hotel" name="hotel" value="chambre"
            class="bk-selector"
          />
          <label for="hotel">Room</label>

          <!-- <label
            >Choose a Bein:
            <select name="bien" class="bien bk-selector form-control">
              <option value="">--select one--</option>
              <option value="chambre">chambre</option>
              <option value="apparts">apparts</option>
              <option value="bungalow">bungalow</option>
            </select>
          </label> -->

          <div class="room">
          <p>Number of rooms :</p>
          <input name="roomNumber" style="width: 140px" type="number" min="0" max="6" id="addchambre" class="form-control"/>
          </div>

          <div class="add_bien">
          </div>
          <!-- <div class="chambre_type"></div>
          <div class="bed_type"></div>
          <div class="vue_type"></div> -->
        </div>
        <br>

        <div class="child">
          <p>Number of child :</p>
          <input style="width: 140px" type="number" min="0" max="6" id="nbchild" class="form-control"/>
          <div class="children"></div>
        </div>
        <!-- <button type="button" id="addchild" class="btn btn-primary btn-sm">
          add child
        </button> -->
        <br>


        <div class="pension">
        <p>Choose pension :</p>
           <div>
           <input type="radio" id="complet" name="choix" value="complet" /> complet 
           <input type="radio" id="sans" name="choix" value="sans" /> sans
           <input type="radio" id="demi" name="choix" value="demi" /> demi
           <div id="demichoix"></div>
           </div>

        
        
        
        <div id="prixp"></div>
        
        </div>
        <br />
        <button type="submit" id="reserve" name="reserver" class="btn btn-primary">
          Reserver
        </button>
        
        </form>
      </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- <script src="../js/bootstrap.min.js"></script> -->
    <!-- Main Js -->
    <!-- <script src="maintest.js"></script> -->
  </body>
</html>
