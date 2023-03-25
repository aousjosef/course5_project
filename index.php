<?php
$page_title = "Startsida";
include "includes/header_leftnav.php"; ?>

<main>




    <div class="post-container">

        <h1 style="text-align: center"><?php echo "Välkommen till bloggportalen " ?></h1>

        <p>Denna bloggsida skapades för webbutvecklingskursen DT093G av Aous Josef. Webbsidan skapades med hjälp av HTML,
            CSS, JavaScript, PHP och MySQL. Nedan följer lista över senaste blogginlägg.</p>


    </div>


    <!-- Funktioner för att kontrollera antal inlägg som finns -->
    <?php

    $post = new Blogpost();

    // Hämtar endast 5 senaste inlägg från array.
    $arrayOfAllPosts = $post->getAllPosts();


    if (empty($arrayOfAllPosts)) {
        echo "Inga inlägg publicerade än";
    } elseif (count($arrayOfAllPosts) < 5) {

        for ($i = 0; $i < count($arrayOfAllPosts); $i++) {

            echo '<div class="post-container">
    
    <h1> ' . $arrayOfAllPosts[$i]['title'] . '</h1>
    
    <h6>By ' . $arrayOfAllPosts[$i]['author'] . ' ' . $arrayOfAllPosts[$i]['created_at'] . '</h6>
    
    <p>' . $arrayOfAllPosts[$i]['content'] . '</p> 
    
    </div>';
        }
    } else {

        for ($i = 0; $i < 5; $i++) {

            echo '<div class="post-container">
    
    <h1> ' . $arrayOfAllPosts[$i]['title'] . '</h1>
    
    <h6>By ' . $arrayOfAllPosts[$i]['author'] . ' ' . $arrayOfAllPosts[$i]['created_at'] . '</h6>
    
    <p>' . $arrayOfAllPosts[$i]['content'] . '</p> 
    
    </div>';
        }
    }

    ?>

</main>
<?php include "includes/footer_rightnav.php" ?>