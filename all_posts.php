<?php
$page_title = "Bloggar";
include "includes/header_leftnav.php"; ?>


<main>




    <div class="post-container">

        <h1 style="text-align: center"><?php echo "Alla inlägg" ?></h1>


        <p>tetur praesentium distinct Lorem ipsum dolor, sit amet consectetur adipisicing elit.
            Consectetur praesentium distinctio doloribus quia nam ex quis,
            perspiciatis laudantium dolorum nemo eum deserunt iusto temporibus</p>

    </div>

    <?php

    $allposts = new Blogpost();

    // Hämtar endast 5 senaste inlägg från array.
    $arrayOfAllPosts = $allposts->getAllPosts();

    for ($i = 0; $i < count($arrayOfAllPosts); $i++) {

        echo '<div class="post-container">
    
    <h1> ' . $arrayOfAllPosts[$i]['title'] . '</h1>
    
    <h6>By ' . $arrayOfAllPosts[$i]['author'] . ' ' . $arrayOfAllPosts[$i]['created_at'] . '</h6>
    
    <p>' . $arrayOfAllPosts[$i]['content'] . '</p> 
    
    </div>';

        // echo "<pre>";
        // print_r($post['id']);
        // echo "</pre>";
    }



    ?>

</main>


<?php include "includes/footer_rightnav.php" ?>