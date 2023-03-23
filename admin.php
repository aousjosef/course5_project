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
            unset($_POST);
            header('Location: admin.php');
        }

        if (isset($_GET['deleteid'])) {
            $deleteid = $_GET['deleteid'];
            $blogpost = new BlogPost();
            $blogpost->deletePost($deleteid);
            echo "Inlägg raderad";
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
        <br>
        <input type="submit" value="Posta">

        <!--  -->

    </form>


    <table>



        <tr>
            <th>Titel</th>
            <th>Innehåll</th>
            <th>Användare</th>
            <th>Datum</th>
            <th>Redigera</th>
            <th>Tabort</th>

        </tr>

        <?php
        //POSTS BY USER

        $blogPostsByUser = new BlogPost();



        $arrayOfPostsByUser = $blogPostsByUser->getPostByUser($_SESSION['username']);





        foreach ($arrayOfPostsByUser as $post) {
            echo '<tr>';

            echo '<td>' . $post['title'] . '</td>
                  <td> ' . substr($post['content'], 0, 15) . ' ...</td>
                  <td> ' . $post['author'] . '</td>
                  <td> ' . $post['created_at'] . '</td>
                  <td><a class="btn" href="edit_post.php?postid=' . $post['id'] . '" >Redigera</a></td>

                  <td><a class="btn" href="admin.php?deleteid=' . $post['id'] . '" >Tabort</a></td>
                  ';

            echo '</tr>';
        }


        ?>





    </table>

</div>

<?php

$test = new Blogpost();

$test->deletePost(4);

?>

<?php include "includes/footer_rightnav.php" ?>