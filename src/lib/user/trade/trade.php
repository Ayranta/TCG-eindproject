<?php 
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

    if (isset($_SESSION["login"])) {

        
        $vriend=fetchSingle('SELECT * From tblvrienden Where id = ?',['type'=>'i', 'value'=>$_SESSION['friend']]);
        
        if ($vriend[0]['gebruikerId'] == $_SESSION['login']) {
            $player1Id = $vriend[0]['gebruikerId'];
            $player2Id = $vriend[0]['vriendenmetId'];
        } else {
            $player1Id = $vriend[0]['vriendenmetId'];
            $player2Id = $vriend[0]['gebruikerId'];
        }

        setPlayerReadyStatus($player1Id);

        $submit = submitTrade($player1Id, $player2Id);

        if ($submit) {
            header('Location: /user/trade?success=tradeSubmitted');
            exit();
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);


  }


function setPlayerReadyStatus($playerId) {
    // Query the database to get the ready status of the player with the given ID
    // This is just a placeholder - replace it with your actual query

    $query = 'SELECT * FROM trade_items WHERE userid = ?';
    $result = fetchSingle($query, ['type' => 'i', 'value' => $playerId]);

    if ($result[0]['ready']== 1) {
        //update to 0
        $query = 'UPDATE trade_items SET ready = ? WHERE userid = ?';
        $result = insert($query, ['type' => 'i', 'value' => 0], ['type' => 'i', 'value' => $playerId]);
    }else{
        //update to 1
        $query = 'UPDATE trade_items SET ready = ? WHERE userid = ?';
        $result = insert($query, ['type' => 'i', 'value' => 1], ['type' => 'i', 'value' => $playerId]);
    }
}

function submitTrade($player1Id, $player2Id) {
 
    $player1Items = fetchSingle('SELECT * FROM trade_items WHERE userid = ?', ['type' => 'i', 'value' => $player1Id]);
    $player2Items = fetchSingle('SELECT * FROM trade_items WHERE userid = ?', ['type' => 'i', 'value' => $player2Id]);

    
    if ( !isTradeValid($player1Items, $player2Items)) {
        return false;
        exit();
    }
    // Loop over player1's items
    foreach ($player1Items as $item) {
        // Insert the item into player2's tblgebruikerkaart
        $query = 'INSERT INTO tblgebruikerkaart(gebruikerId, kaartId) VALUES (?, ?)';
        $result = insert($query, ['type' => 'i', 'value' => $player2Id], ['type' => 'i', 'value' => $item['cardid']]);
    
        if (!$result) {
            return false;
        }
    
        // Delete the item from trade_items
        $query = 'DELETE FROM trade_items WHERE userid = ? AND cardid = ?';
        $result = insert($query, ['type' => 'i', 'value' => $player1Id], ['type' => 'i', 'value' => $item['cardid']]);
    
        if (!$result) {
            return false;
        }
    
        // Delete the item from player1's tblgebruikerkaart
        $query = 'DELETE FROM tblgebruikerkaart WHERE gebruikerId = ? AND kaartId = ?';
        $result = insert($query, ['type' => 'i', 'value' => $player1Id], ['type' => 'i', 'value' => $item['cardid']]);
    
        if (!$result) {
            return false;
        }
    }
    
    // Loop over player2's items
    foreach ($player2Items as $item) {
        // Insert the item into player1's tblgebruikerkaart
        $query = 'INSERT INTO tblgebruikerkaart(gebruikerId, kaartId) VALUES (?, ?)';
        $result = insert($query, ['type' => 'i', 'value' => $player1Id], ['type' => 'i', 'value' => $item['cardid']]);
    
        if (!$result) {
            return false;
        }
    
        // Delete the item from trade_items
        $query = 'DELETE FROM trade_items WHERE userid = ? AND cardid = ?';
        $result = insert($query, ['type' => 'i', 'value' => $player2Id], ['type' => 'i', 'value' => $item['cardid']]);
    
        if (!$result) {
            return false;
        }
    
        // Delete the item from player2's tblgebruikerkaart
        $query = 'DELETE FROM tblgebruikerkaart WHERE gebruikerId = ? AND kaartId = ?';
        $result = insert($query, ['type' => 'i', 'value' => $player2Id], ['type' => 'i', 'value' => $item['cardid']]);
    
        if (!$result) {
            return false;
        }
    }
    return true;
}

function isTradeValid($player1Items, $player2Items) {
    if (!is_array($player1Items) || !is_array($player2Items)) {
        return false;
    }

    if (empty($player1Items) || empty($player2Items)) {
        return false;
    }

    if ($player1Items[0]['ready'] == 0 || $player2Items[0]['ready'] == 0) {
        return false;
    }

    if ($player1Items[0]['cardid'] == $player2Items[0]['cardid']) {
        return false;
    }

    return true;
}

?>