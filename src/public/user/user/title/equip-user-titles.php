<?php


$titleid = $_GET['titleid'];
$unequip = $_GET['unequip'];


if($unequip == 1){
    $titleid = 0;
}


if (isset($_SESSION['login'])) {
      
    updateTitle($_SESSION['login'],$titleid);
    return;
}
header( 'Location: /');
exit();

function updateTitle($userId, $newTitle) {
    // Prepare your SQL query
    $query = 'UPDATE tblgebruiker_profile SET titleid = ? WHERE userid = ?';

    
    // Execute the query with the new title and user ID
    $update = insert(
        $query,
        ['type' => 's', 'value' => $newTitle],
        ['type' => 'i', 'value' => $userId]
    );


    // Check if the update was successful
    if ($update) {
        header('Location: /dashboard/title/user?success=updateSuccess');
        exit();
    } 
    header('Location: /dashboard/title/user?error=updateFailed');
    exit();
}

?>