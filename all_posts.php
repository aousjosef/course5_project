<?php
$page_title = "Bloggar";
include "includes/header_leftnav.php"; ?>


<main>

    <?php

    if (!isset($_GET['username'])) {

        echo '
        <div class="post-container">
        
        <h1 style="text-align: center">Alla inlägg</h1>

        <p style= "visibility: hidden">scelerisque molestie est, nec mattis erat varius fermentum. Ut vel lacus placerat purus tempor elementum</p>
        
        </div>
        ';

        $allposts = new Blogpost();
        $arrayOfAllPosts = $allposts->getAllPosts();

        for ($i = 0; $i < count($arrayOfAllPosts); $i++) {

            echo '<div class="post-container">
    
    <h1> ' . $arrayOfAllPosts[$i]['title'] . '</h1>
    
    <h6>By ' . $arrayOfAllPosts[$i]['author'] . ' ' . $arrayOfAllPosts[$i]['created_at'] . '</h6>
    
    <p>' . $arrayOfAllPosts[$i]['content'] . '</p> 
    
    </div>';
        }
    } else {
        echo '
        <div class="post-container">
        
        <h1 style="text-align: center">Inlägg av ' . $_GET['username'] . ' </h1>
        <p style= "visibility: hidden">scelerisque molestie est, nec mattis erat varius fermentum. Ut vel lacus placerat purus tempor elementum</p>

        </div>
        ';

        $postsByUser = new BlogPost();

        $postsByUserArray = $postsByUser->getPostByUser($_GET['username']);

        foreach ($postsByUserArray as $post) {

            echo '<div class="post-container">
    
            <h1> ' . $post['title'] . '</h1>
            
            <h6>By ' . $post['author'] . ' ' . $post['created_at'] . '</h6>
            
            <p>' . $post['content'] . '</p> 
            
            </div>';
        }
    }





    ?>

</main>


<?php include "includes/footer_rightnav.php" ?>