
<link href="https://cdn.jsdelivr.net/npm/daisyui@3.7.7/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<div class="flex justify-start items-start">
    <div class="card w-full max-w-xl h-screen shadow-2xl ml-auto">
    <form class="card-body" method="post" action="/admin/user/toevoegenkaart" enctype="multipart/form-data">
        <div class="form-control">
            <h2 class=" text-2xl"> toevoegen kaart</h2>
            <label class="label">
                <span class="label-text text-black"> naam</span>
            </label>

            <input type="text" id="naam" name="naam" placeholder= 'kaartnaam' class="input input-bordered w-full max-w-md" required/>
            <label class="label">
                    <span class="label-text text-black">categorie</span>
                </label>

                <input type="text"  id="categorie" name="categorie" placeholder= 'categorie' class="input input-bordered w-full max-w-md " required/>
                <label class="label">
                    <span class="label-text text-black"> levens</span>
                </label>

                <input type="number" id="levens" name="levens" placeholder= 'aantal levens' class="input input-bordered w-full max-w-md " required/>
                <label class="label">
                    <span class="label-text text-black">aanval1</span>
                </label>

                <input type="text" id="aanval1" name="aanval1" placeholder= 'aanval1' class="input input-bordered w-full max-w-md " required/>
                <label class="label">
                    <span class="label-text text-black">damage1</span>
                </label>

                <input type="number" id="damage1" name="damage1" placeholder="damage1" class="input input-bordered w-full max-w-md" required/>
                <label class="label">
                <span class="label-text text-black">aanval2</span>
                </label>

                <input type="text"  id="aanval2" name="aanval2" placeholder= 'aanval2 ' class="input input-bordered w-full max-w-md" required/>
                <label class="label">
                <span class="label-text text-black">damage2</span>
                </label>
                <input type="number"  id="damage2" name="damage2" placeholder= 'damage2 ' class="input input-bordered w-full max-w-md " required/>
                <label class="label">

                </label>
                <input type="file" name="file" class="file-input file-input-bordered w-full max-w-md " required/>

                <input type="hidden" name="id">
                <input type="submit" id="submitknop" name="submitknop" value= 'Toevoegen' class="btn mt-3 w-full border-white hover:text-white hover:bg-black"/>
            </form>
            <div class="flex justify-center mt-2">
                <a href="/" class="link "> ga terug</a>
            </div>
        </div>
    </div>
</div>
<?php
        if(isset($_POST['submitknop'])) {
                $naam = $_POST['naam'];
                $categorie = $_POST['categorie'];
                $levens = $_POST['levens'];
                $aanval1 = $_POST['aanval1'];
                $damage1 = $_POST['damage1'];
                $aanval2 = $_POST['aanval2'];
                $damage2 = $_POST['damage2'];
                $upload_dir = $_SERVER["DOCUMENT_ROOT"]."/TCG-eindproject/public/img/";
                $file_name = $_FILES['file']['name'];
                $file_tmp = $_FILES['file']['tmp_name'];
                
                if(isset($file_name) && !empty($file_name)) {

                    cache_createKey($mysqli, $email, $wachtwoord);

                /*functie nog veranderen*/registreerkaart($mysqli, $naam, $categorie, $levens, $aanval1, $aanval2, $damage1, $damage2, $file_name);
                if((empty($_POST['file']))) {
                    move_uploaded_file($file_tmp, $upload_dir.$file_name);
                };
                    $teller = 1;
                    while (file_exists($upload_dir . $file_name)) {
                        $file_info = pathinfo($file_name);
                        $new_file_name = $file_info['filename'] . $teller . "." . $file_info['extension'];
                        $file_name = $new_file_name;
                        $teller++;
                    }
                    move_uploaded_file($file_tmp, $upload_dir . $file_name);
                }

                registreerkaart($mysqli, $naam, $categorie, $levens, $aanval1, $aanval2, $damage1, $damage2, $file_name);

                /* Kan nog aangepast worden */
                header("Location: index.php");
            };
    ?>
</body>
</html>