<?php include  'includes/config.php';
?>

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
            <div>
                <a href="index.php">BloggPortalen</a>
            </div>
            <!-- Logga in/ut knapp som beror på anvädaren är inloggad  -->
            <?php if (isset($_SESSION['username'])) {

                echo "<span> Välkommen " . $_SESSION['fullname'] .  "</span><a href='logout.php' class='log btn' >Logga ut</a>";
            } else {
                echo  "<a href='login.php' class='log btn' >Logga in</a>";
            }

            ?>

            <a id="menu-btn" class="menu btn">Menu</a>

        </header>


        <div class="flex-trinity-container">


            <!-- NAVBAR TO DIFFERENT PAGES - START -->
            <nav class="top-nav">

                <ul class="unord-list-container">

                    <li><a href="index.php">Startsida</a></li>
                    <li><a href="all_posts.php">Bloggar</a></li>
                    <?php if (!isset($_SESSION['username'])) {
                        echo '<li><a href="login.php">Logga in</a></li>';
                    } else {
                        echo '<li><a href="logout.php">Logga ut</a></li>';
                    } ?>


                    <?php if (!isset($_SESSION['username'])) {
                        echo '<li><a href="register.php">Bli medlem</a></li>';
                    } ?>

                    <li><a href="admin.php">Admin</a></li>



                </ul>


            </nav>


            <!-- NAVBAR TO DIFFERENT PAGES - START -->