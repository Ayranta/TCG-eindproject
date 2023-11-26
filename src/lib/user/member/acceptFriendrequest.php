<?php 
session_start();

require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';
require_once LIB . '/util/util.php';

    if (isset($_SESSION["login"])) {
        $friendrequestData = fetch('SELECT * From tblfriend_request Where receiverid = ? ' ,[
            'type' => 'i',
            'value' => $_SESSION['login'],
          ]);
        var_dump($friendrequestData);
 
        $query ='INSERT INTO tblvrienden(gebruikerId,vriendenmetId) VALUES (?,?)';

        $insert = insert(
            $query,
            ['type' => 'i', 'value' => $friendrequestData['senderid']],
            ['type' => 'i', 'value' => $friendrequestData['receiverid']],
            );

            var_dump($insert);
        $query = 'DELETE FROM tblfriend_request Where senderid = ? and receiverid = ?';

        $delete = insert($query,
        ['type' => 'i', 'value' => $friendrequestData['senderid']],
        ['type' => 'i', 'value' => $friendrequestData['receiverid']],
        );
            var_dump($delete);
        if ($insert&&$delete) {
      
            header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit();
        }
        header('Location: /?error=somthingWentWrong ');
  }


?>