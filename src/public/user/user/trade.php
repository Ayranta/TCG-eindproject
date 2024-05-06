<?php
// Check if form data is received
if (isset($_POST['offerCard'], $_POST['requestCard'])) {
    // Get the form data
    $offerCard = $_POST['offerCard'];
    $requestCard = $_POST['requestCard'];

    // Validate the trade offer
    if (empty($offerCard) || empty($requestCard)) {
        echo json_encode(['status' => 'error', 'message' => 'Please select both cards.']);
        exit;
    }
  
    // Update the database
    $update = insert('INSERT INTO tbltrade (offerCard, requestCard) VALUES (?, ?)', ['type' => 'i', 'value' => [$offerCard, $requestCard]]);


    
}
?>

<div ></div>
<div class="container mx-auto">
    <h1 class="text-center text-2xl my-4">Trade Cards</h1>
    <form id="tradeForm" method="post" action="/user/trade" class="items-center">
        <div class="flex items-center mt-4">
            <div class="flex-[0.5]">
                <div class="flex flex-wrap gap-x-4">
                
                    <?php 
                    $cards = fetchSingle('SELECT * FROM tblgebruikerkaart WHERE Gebruikerid = ?',['type'=>'i','value'=>$userid]);
                    foreach($cards as $card){
                        $usercard = fetch('SELECT * FROM tblkaart WHERE kaartid = ?',['type'=>'i','value'=>$card['KaartID']]);
                        $categorie = fetchSingle('SELECT * FROM `kaart_categorieen`WHERE naam = ?' , ['type' => 's', 'value' => $usercard['categorie']]);
                        foreach($categorie as $categorie){?>
                        <form  method="post" action="/user/trade/select" >
                            <div id="card" data-card-id="<?= $usercard['kaartID'] ?>" class="card card-bordered border-gray-600 w-48 h-80 bg-[#<?php echo $categorie["kleur hex"] ?>] shadow-xl my-2">
                                <figure>
                                    <img src="\public\img\<?php echo $usercard['foto'] ?>" alt="card" class="w-full h-full object-cover"/>
                                </figure>
                                <p class="text-left p-2 text-black "><?php echo 'hp: ' . $usercard["levens"] ?></p>
                                <div class="card-body text-black text-center ">
                                    <h2 class="font-bold"><?php echo $usercard["naam"] ?></h2>
                                    <p>
                                        <tr>
                                            <th><?php echo $usercard["aanval1"] ?> --</th>
                                            <th><?php echo 'damage: '.$usercard['damage1']?> </th>
                                        </tr>
                                        <br>
                                        <td><?php echo  $usercard["aanval2"] ?> --</td>
                                        <td><?php echo'damage: ' . $usercard["damage2"] ?></td>
                                    </p><?php
                                    ?>
                                    <input type="hidden" name="select" value="<?= $usercard['kaartID'] ?>">
                                    <input type="submit" name="submit" value="submit"> <button class="btn btn-primary">Select</button></input>
                                </div>
                            </div>
                        </form>
                    <?php } 
                    }
                    ?>
                </div>
            </div> 
            <div class="flex-[0.5]">
                <!-- Card elements -->
                <div id="friendSelectedCards"></div>    
            </div>
                    </div>
                </div>
                 <div class="flex justify-center mt-4">
            <button type="submit" class="btn btn-primary">Submit Trade</button>
        </div>
    </form>
</div>  
<script>
document.getElementById('tradeForm').addEventListener('submit', function(event) {
    // Prevent the form from being submitted normally
    event.preventDefault();

    // Get the form data
    var offerCard = document.getElementById('offerCard').value;
    var requestCard = document.getElementById('requestCard').value;

    // Send the data to the server
    fetch('/path/to/your/php/script.php', {
        method: 'POST',
        body: JSON.stringify({ offerCard: offerCard, requestCard: requestCard }),
        headers: { 'Content-Type': 'application/json' }
    })
    .then(response => response.json())
    .then(data => {
        // Update the page based on the response
        if (data.status === 'success') {
            alert(data.message);
        } else {
            alert('Error: ' + data.message);
        }
    });
});
</script>

