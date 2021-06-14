<?php
include"connect.class.php";   


class reservation {

    private $conn;

    /* connection */
    public function __construct(){

        $connection = new connection();
        $this->conn= $connection->connect();
    }

    /* insert in reservation table */
    public function insertReservation($idCustomer,$dateReservation,$checkin,$checkout){
        $sql    =   "INSERT INTO reservation(`idc`, `dateR`, `chekin`, `chekout`) VALUES (?,?,?,?)";
        $stmt   =   $this->conn->prepare($sql);
        $stmt->execute([$idCustomer,$dateReservation,$checkin,$checkout]);
         $idreservation  =   $this->conn->lastInsertId();
         return $idreservation ;
    }

    /* Insert Room In Services Table */
    public function insertRoom($array,$idreservation){
        foreach($array as $key =>$value){    
               /*  $sql    =   "INSERT INTO `panier`(`idb`, `idR`) VALUES ((select idbien from bien where type = '$value[Roomtype]' and ( lit= '$value[bedtype]' or lit is NULL  ) and vue= '$value[viewtype]' ),?)";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]);  */
                $sql = "select * from bien where type = '$value[Roomtype]' and ( lit= '$value[bedtype]' or lit is NULL  ) and vue= '$value[viewtype]'";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute();
                $idb   = $stmt->fetch(PDO::FETCH_ASSOC);

                $sql1    =   "INSERT INTO `panier`(`idb`, `idR`) VALUES ($idb[idbien],?)";
                $stmt1   =   $this->conn->prepare($sql1);
                $stmt1->execute([$idreservation]);

        }
        return $idb;
    }

    /* Insert Pension In services Table */
    // public function insertPension($array,$idreservation){
    //     foreach($array as $key => $value){
    //         $sql    =   "INSERT INTO panier (`idb`, `idR`) VALUES (?,?)";
    //         $stmt   =   $this->conn->prepare($sql);
    //         $stmt->execute([$value['idpension'],$idreservation]);
    //         $x = $value['idpension'];
    //     }
    //     return $x;
    // }

    public function insertPension($pension,$idreservation){
        
            foreach($pension as $value){
                
                $sql    =   "INSERT INTO panier (`idb`, `idR`) VALUES ((select idbien from bien where idbien= $value[idpension] and nom = 'pension'),?)";
                // echo($sql);
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]);
                echo "good";
            }
           
        }

    /* Insert Bungalow Or Apart In Services Table */
    public function insertBungalowOrApart($array,$idreservation){
        foreach($array as $value){
            if ($value['type'] == 'bungalow'){
                /* The Id Of Property Bungalow In Database Is " 5 " */
                $sql    =   "INSERT INTO panier (`idb`, `idR`) VALUES (5,?)";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]); 
            } else if ($value['type'] == 'apartments'){
                /* The Id Of Property Apartments In Database Is " 6 " */
                $sql    =   "INSERT INTO panier (`idb`, `idR`) VALUES (6,?)";
                $stmt   =   $this->conn->prepare($sql);
                $stmt->execute([$idreservation]);
            }
        }
    }

    /* Insert Property Of Children In Services Table */
    public function insertOffersChild($array,$idreservation){
//         echo("<br>children<br>");
// print_r($array);
//  die();
        foreach($array as  $value){
            $sql    =   "INSERT INTO panier (`idb`, `idR`) VALUES (?,?)";
            $stmt   =   $this->conn->prepare($sql);
            $stmt->execute([$value['idofferschild'],$idreservation]);
        }
    }

    /* Calculate Total Price From Property Table And Insert Result In Bill Table */
    // public function service($nbrOfDays,$idreservation){
    //     /* Calculate Total Price  */
    //     $sqlCalc    =   "SELECT SUM(a.prix) as `total` FROM bien as a , panier as b WHERE a.idbien = b.idb AND b.idR =?";
    //     $stmtCalc   =   $this->conn->prepare($sqlCalc);
    //     $stmtCalc->execute([$idreservation]);
    //     $row   = $stmtCalc->fetch(PDO::FETCH_ASSOC);
    //     /*  */
    //     $totalPrice =   $row['total'];
    //     $finalPrice = $totalPrice * $nbrOfDays;
    //     /* Insert Totale Price In Bill Tabke */
    //     $sqlinsert  =   "INSERT INTO `service`(`idR`, `totalprix`, `nbrdays`, `prixfinal`) VALUES (?,?,?,?)";
    //     $stmtinsert =   $this->conn->prepare($sqlinsert);
    //     $stmtinsert->execute([$idreservation,$totalPrice,$nbrOfDays,$finalPrice]);
    //     return $finalPrice;
    // }


}


//class reservation {

    //private $conn;

    /* connection */
    //public function __construct(){

        //$connection = new connection();
        //$this->conn= $connection->connect();
    //}

    /* insert in reservation table */
    //public function insertReservation($idCustomer,$dateReservation,$checkin,$checkout){
       // $sql    =   "INSERT INTO reservation(`idCustomer`, `dateReservation`, `checkIn`, `chekOut`) VALUES (?,?,?,?)";
       // $stmt   =   $this->conn->prepare($sql);
        //$stmt->execute([$idCustomer,$dateReservation,$checkin,$checkout]);
        // $idreservation  =   $this->conn->lastInsertId();
        // return $idreservation ;
    //}//

    /* Insert Room In Services Table */
    //public function insertRoom($array,$idreservation){
        //foreach($array as $key =>$value){    
               // $sql    =   "INSERT INTO `services`(`idProperty`, `idReservation`) VALUES ((select IdProperty from Property where type = '$value[Roomtype]' and (bedtype= '$value[bedtype]' or bedtype is Null ) and view= '$value[viewtype]' ),?)";
               // $stmt   =   $this->conn->prepare($sql);
               // $stmt->execute([$idreservation]); 
       // }
   // }

    /* Insert Pension In services Table */
    //public function insertPension($array,$idreservation){
        //foreach($array as $key => $value){
            //$sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (?,?)";
           // $stmt   =   $this->conn->prepare($sql);
            //$stmt->execute([$value['idpension'],$idreservation]);
        //}
    //}

    /* Insert Bungalow Or Apart In Services Table */
    //public function insertBungalowOrApart($array,$idreservation){
       // foreach($array as $key => $value){
          //  if ($value['type'] == 'bungalow'){
                /* The Id Of Property Bungalow In Database Is " 5 " */
              //  $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (5,?)";
              //  $stmt   =   $this->conn->prepare($sql);
               // $stmt->execute([$idreservation]); 
           // } else if ($value['type'] == 'apartments'){
                /* The Id Of Property Apartments In Database Is " 6 " */
               // $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (6,?)";
               // $stmt   =   $this->conn->prepare($sql);
               // $stmt->execute([$idreservation]);
           // }
        //}
  //  }

    /* Insert Property Of Children In Services Table */
   // public function insertOffersChild($array,$idreservation){
      //  foreach($array as $key => $value){
          //  $sql    =   "INSERT INTO services (`idProperty`, `idReservation`) VALUES (?,?)";
           // $stmt   =   $this->conn->prepare($sql);
           // $stmt->execute([$value['idofferschild'],$idreservation]);
       // }
   // }

    /* Calculate Total Price From Property Table And Insert Result In Bill Table */
   // public function bill($nbrOfDays,$idreservation){
     //   /* Calculate Total Price  */
      //  $sqlCalc    =   "SELECT SUM(a.price) as `total` FROM property as a , services as b WHERE a.idProperty = b.idProperty AND b.idReservation =?";
      //  $stmtCalc   =   $this->conn->prepare($sqlCalc);
       // $stmtCalc->execute([$idreservation]);
       // $row   = $stmtCalc->fetch(PDO::FETCH_ASSOC);
       // /*  */
       // $totalPrice =   $row['total'];
       // $finalPrice = $totalPrice * $nbrOfDays;
       // /* Insert Totale Price In Bill Tabke */
       // $sqlinsert  =   "INSERT INTO `bill`(`idReservation`, `totalPrice`, `nbrOfDays`, `finalPrice`) VALUES (?,?,?,?)";
       // $stmtinsert =   $this->conn->prepare($sqlinsert);
       // $stmtinsert->execute([$idreservation,$totalPrice,$nbrOfDays,$finalPrice]);
       // return $finalPrice;
  //  }


//}
?>

