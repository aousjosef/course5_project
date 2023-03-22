<?php
//kontroll om användare är inloggad, error=1 innebär att anävdaren är ej inloggad.

$page_title = "Admin";
include "includes/header_leftnav.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=1");
}

?>




<div class="admin-page-container">

    <form class="form-container" action="admin.php" method="post">


        <?php

        if (isset($_POST['title'])) {
            $blogpost = new BlogPost();
            $blogpost->addPost($_SESSION['username'], $_POST['title'], $_POST['content']);
            header('Location: admin.php');
            exit();
        }
        ?>

        <h1>Admin sida</h1>
        <label for="title">Titel</label>
        <br>
        <input type="text" name="title" id="title" required>
        <br>
        <br>
        <label for="content">Innehåll</label>
        <br>
        <textarea name="content" id="content" cols="65" rows="10" required></textarea>
        <br>
        <input type="submit" value="Posta">


        <!--  -->

    </form>

</div>



<?php include "includes/footer_rightnav.php" ?>