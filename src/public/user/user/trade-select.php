<?php
if (!isset($_SESSION['login'])) {
    header('Location: /');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

$userId = $_SESSION['login'];


var_dump($_POST);
if(isset($_POST)){
        if (isset($_SESSION['login'])) {

            insertTradeItem($_POST, $userId);
            return;
        }

        header('Location: /');
        exit();
}

function insertTradeItem($formData, $userId) {
        $cardId = $formData['select'];

        $query ='INSERT INTO trade_items(userid, cardid) VALUES (?, ?)';
        var_dump($cardId);   

        $insert = insert(
            $query,
            ['type' => 'i', 'value' => $userId],
            ['type' => 'i', 'value' => $cardId],
        );
        var_dump($insert);

        if ($insert) {
                header('Location: /user/trade?success=addedTradeItem');
                exit();
        }
        
        header('Location: /dashboard/trade/add?error=notAddedTradeItem');
        exit();
}
?>