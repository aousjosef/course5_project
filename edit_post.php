<?php
//kontroll om användare är inloggad, error=1 innebär att anävdaren är ej inloggad.

$page_title = "Redigera inlägg";
include "includes/header_leftnav.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=1");
}

if (!isset($_GET['postid'])) {
    header("Location: admin.php");
}
?>

<?php

if (isset($_GET['postid'])) {
    $postId = (int) $_GET['postid'];
    $selectedPost = new BlogPost();
    $postArray = $selectedPost->getPostById($postId);
}


if (isset($_POST['title'])) {
    $blogpost = new BlogPost();
    $blogpost->updatePost($_GET['postid'], $_POST['title'], $_POST['content']);
    unset($_POST);
    header('Location: admin.php');
}

?>


<div class="admin-page-container">



    <form class="form-container" <?php echo 'action= "edit_post.php?postid=' . $postId . '"' ?> method="post">

        <h1>Redigera inlägg</h1>
        <label for="title">Titel</label>
        <br>
        <input type="text" name="title" id="title" <?php echo 'value = "' . $postArray['title'] . '"' ?> required>
        <br>
        <br>
        <label for="content">Innehåll</label>
        <br>
        <textarea name="content" id="content" cols="65" rows="10" required> <?php echo $postArray['content'] ?> </textarea>
        <br>
        <br>
        <input type="submit" value="Uppdatera">
        <!--  -->

    </form>

</div>


<?php include "includes/footer_rightnav.php" ?>