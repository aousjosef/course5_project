<?php include "includes/config.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title><?php echo $page_title . $siteTitle; ?></title>
</head>

<body>

    <div class="holy-grid-flexcontianer">

        <header>
            <div class="logo-img-container">
                Logos
            </div>
            <!-- Logga in/ut knapp som beror på anvädaren är inloggad  -->
            <?php if (isset($_SESSION['username'])) {

                echo "Välkommen " . $_SESSION['fullname'] .  "<a href='logout.php' class='btn' >Logga ut</a>";
            } else {
                echo  "<a href='login.php' class='btn' >Logga in</a>";
            }

            ?>


        </header>


        <div class="flex-trinity-container">


            <!-- NAVBAR TO DIFFERENT PAGES - START -->
            <nav>

                <ul class="unord-list-container">

                    <li><a href="index.php">Startsida</a></li>
                    <li><a href="">Bloggar</a></li>

                    <?php if (!isset($_SESSION['username'])) {
                        echo '<li><a href="register.php">Bli medlem</a></li>';
                    } ?>

                    <li><a href="admin.php">Admin</a></li>
                    <li><a href="about.php">Om sidan</a></li>


                </ul>



            </nav>


            <!-- NAVBAR TO DIFFERENT PAGES - START -->