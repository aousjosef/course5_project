<?php
//kontroll om användare är inloggad, error=1 innebär att anävdaren är ej inloggad.

$page_title = "Admin";
include "includes/header_leftnav.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=1");
}

?>




<div class="admin-page-container">

    <form class="form-container" action="" method="POST">
        <h1>Admin sida</h1>
        <label for="">Titel</label>
        <br>
        <input type="text">
        <br>
        <br>
        <label for="">Innehåll</label>

        <br>
        <textarea name="" id="" cols="65" rows="10"></textarea>
        <br>
        <input type="submit" value="Posta">


        <!--  -->

    </form>

</div>



<?php include "includes/footer_rightnav.php" ?>