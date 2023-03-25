<?php
$page_title = "Registrera medlem";
include "includes/header_leftnav.php";

// Kontroll om användare är redan inloggad
if (isset($_SESSION['username'])) {
    header("Location: admin.php");
}
?>


<div class="login-card-container">

    <form action="register.php" method="post">

        <?php

        if (isset($_POST['username'])) {
            $newUser = $_POST['username'];
            $newPass = $_POST['password'];
            $newFullname = $_POST['fullname'];

            $regUser = new User();
            $regUser->regNewUser($newUser, $newPass, $newFullname);
        }

        ?>

        <h1>Bli medlem</h1>
        <label for="username">Användare</label>
        <br>

        <input type="username" name="username" id="username" required>
        <br>
        <br>

        <label for="password">Lösenord</label>
        <br>
        <input type="password" name="password" id="password" required>
        <br>
        <br>

        <label for="password">Fullständig namn</label>
        <br>
        <input type="fullname" name="fullname" id="fullname" required>
        <br>
        <br>



        <input type="submit" value="Registrera">
        <br>
        <br>


        <!-- kontrollerar fel meddelande, funktionen finns i config.php -->
        <?php

        if (isset($_GET['error'])) {
            errorMsg($_GET['error']);
        }
        ?>

    </form>


</div>





<?php include "includes/footer_rightnav.php" ?>