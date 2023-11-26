<?php  

function addProduct($connection,$naam, $categorie ,$levens, $aanval1,$damage1,$aanval2, $damage2, $foto){
    return($connection ->query("INSERT INTO tblkaart (naam, categorie, levens, aanval1, damage1, aanval2, damage2 , foto ) VALUES ('".$naam."'
        , '".$categorie."','" .$levens."','" .$aanval1."','" .$damage1."','" .$aanval2."','" .$damage2."','" .$foto."')"));
}

function getProduct($connection,$productID){
    return $connection->query("SELECT * FROM tblproducten WHERE productid = '".$productID."'");
}


function getActiveProducts ($connection, $sellerID) {
    $resultaat = $connection->query("SELECT tblproducten.productid, tblproducten.naam AS naam_product, tblproducten.foto, tblproducten.startdatum AS datum, tblgebruikers.voornaam, tblgebruikers.naam FROM tblproducten INNER JOIN tblgebruikers ON (tblgebruikers.gebruikerid = tblproducten.verkoperid) WHERE verkoperid = ".$sellerID." AND CURRENT_TIMESTAMP < eindtijd");

    if(mysqli_num_rows($resultaat) == 0) {
        return null;
    } else {
        return $resultaat;
    }
}



?>