<?php
$usercoins=fetchSingle("SELECT * FROM `tblgebruiker_profile` WHERE userid = ?",['type' => 'i', 'value' => $userid]);
$usercoins=$usercoins[0]['coins'];
$packid = $_GET['packid'];

$pack = fetchSingle("SELECT * FROM `tblpacks` WHERE packId = ?",['type' => 'i', 'value' => $packid]);

$packprice = $pack[0]['price'];

if(isset($packid)){
    if($usercoins>=$packprice){
        $usercoins=$usercoins-$packprice;
        var_dump($usercoins);
        $updatecoins = "UPDATE `tblgebruiker_profile` SET coins = ? WHERE userid = ?";
        $updatecoins = insert($updatecoins,
            ['type' => 'd', 'value' => $usercoins],
            ['type' => 'i', 'value' => $userid]
        );

        $packs = $pack[0]['packId'];

        $insertpack = "INSERT INTO `tblgebruiker_packsbought` (userid,packid,price) VALUES (?,?,?)";
        $insertpack = insert($insertpack,
        ['type' => 'i','value' => $userid],
        ['type' => 'i','value' => $packs],
        ['type' => 'd','value' => $packprice]);
        var_dump($insertpack);
        
        if($insertpack&&$updatecoins){
            header('Location: /member/user/shop/open?packid='.$packid.'');
        }else{
            header('Location: /member/user/shop==?error=errorBuyingPack');
        }   
    }else{
       header('Location: /member/user/shop?error=notEnoughCoins');
    }
}

?>