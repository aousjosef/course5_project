<?php
$page_title = "Logga in";
include "includes/header_leftnav.php";

// Kontroll om användare är redan inloggad
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
}
?>




<div class="login-card-container">

    <form action="login.php" method="post">


        <?php

        if (isset($_POST['username'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];



            $loginAttemp = new User();


            if ($loginAttemp->loginUser($user, $pass)) {

                header("Location: admin.php");
            } else {
                echo "Fel användarnamn eller lösenord";
            }
        }

        ?>

        <h1>Inloggning</h1>
        <label for="username">Användare</label>
        <br>

        <input type="username" name="username" id="username" required>
        <br>
        <br>

        <label for="passwrod">Lösenord</label>
        <br>
        <input type="password" name="password" id="password" required>
        <br>
        <br>

        <input type="submit" value="Logga in">
        <br>
        <br>
        <?php

        //kontrollerar fel meddelande, funktionen finns i config.php
        if (isset($_GET['error'])) {
            errorMsg($_GET['error']);
        }

        ?>

    </form>


</div>


<?php include "includes/footer_rightnav.php" ?>