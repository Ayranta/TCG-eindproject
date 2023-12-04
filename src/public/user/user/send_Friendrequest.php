<?php



if (isset($_SESSION['login'])){
    $userid=$_SESSION['login'];
    if (isset($_POST["send"])){
      
        insertFriendrequest($userid,$_POST);
    }

}


function insertFriendrequest($userid,$formdata){
  

    $receiverdata=fetch('SELECT * From tblgebruikers Where gebruikernaam = ?',['type' => 's', 'value' => $formdata['username']]);
    


    $data = fetchSingle('SELECT * FROM tblfriend_request');
    
   
    $newid=$receiverdata['gebruikerid'];

    foreach($data as $Data){
    
      if($Data['receiverid']===$newid){
        header('Location: /user/friends?friendrequestAlreadyExists'); 
        exit;
      }
    }

    $data = fetchSingle('SELECT * FROM tblvrienden');
    

    foreach($data as $Data){
    
      if($Data['vriendenmetId']==$newid&&$Data['gebruikerId']==$userid||$Data['gebruikerId']==$newid&&$Data['vriendenmetId']==$userid){
        header('Location: /user/friends?friendAlreadyExists'); 
        exit;
      }
    }

    $query ='INSERT INTO tblfriend_request(senderid,receiverid) VALUES (?,?)';

    $insert = insert(
       $query,
       ['type' => 'i', 'value' => $userid],
       ['type' => 'i', 'value' => $newid],
     );


     if ($insert) {
      
        header('Location: /user/friends?succesfullyadded');
      exit();
    }

    header('Location: /user/friends?error=notAddedCategory');
    exit();
}


?>
<form action="/user/friendrequest" method="post" class="flex flex-col gap-8 w-full">
<div class="card card-side bg-base-100 shadow-xl justify-centre mx-96  ">
    <div class="card-body items-center text-center">

      <h2 class="card-title"> what is his/her username</h2>
      <div class="card-actions items-center">
      
        <input type="text" name="username" class="input input-bordered" required />
    </div>
    <button name="send" class="btn btn-primary">send friend request</button>
    </div>
</div>
</form>