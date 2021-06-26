<?php
    error_reporting(0);

        if(isset($_POST['send'])){
            $infoMail= '';
            $name = !empty($_POST['name']) ? trim(htmlentities($_POST['name'])) : false;
            $number = !empty($_POST['number']) ? trim(htmlentities($_POST['number'])) : false;
            $mail =  trim(htmlentities($_POST['mail']));
            $text = !empty($_POST['query']) ? trim(htmlentities($_POST['query'])) : false;              ;

            if($name){
                if($number){
                    if($text){
                        $forSend = true;
                    }else{
                        $errorMsg = 'Text nije ispravan';
                    }
                }else{
                    $errorMsg = 'Broj nije ispravan';
                }
            }else{
                $errorMsg = 'Ime nije ispravno';
             }

             if($forSend){
                $to = 'dimitricmihajlo995@gmail.com'; // edit here
                $subject = "Question MDW";
                $body = " Ime: $name\n Broj: $number\n E-mail: $mail\n Poruka:\n $text";
               // $headers = "from" . $name;
                if(mail($to, $subject, $body)){
                    $infoMail = '<p style="color: green; background-color:white;">Poruka uspjesno poslana</p>';
                }else{
                     $infoMail ='<p style="color: red; background-color:black;">Greska slanja, molimo pokusajte ponovo</p>';
            } 
        }  
    }
?>

<section class="contact same" id="contact">
    <div class="contact-wrapper">
        <article class="title-contact">
            <h1>Kontakt</h1>
        </article>

        <article class="main-contact">
            <p class="ask">Ukoliko imate nekih pitanja ili nedoumica, pisite nam i vrlo rado cemo Vam pomoci.</p>
            <div class="ask-bottom"></div>
            <?php if(isset($infoMail)){ echo $infoMail; }  ?>

                    <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form">
                    <p></p>
                    <input class="input" id="name" name="name" type="text" value="" placeholder="Ime i Prezime" required>
                    <input class="input" id="mail" name="mail" type="email" value="" placeholder="E-mail">
                    <input class="input" id="number" name="number" type="number" value="" placeholder="Broj telefona" required>
                    <textarea class="input-ta" name="query" id="text" cols="30" rows="10" placeholder="Postavi upit" required></textarea>
                    <button id="btnn" name="send" class="btn">Posalji</button>
            </form>
        </article>  
    </div>
</section>