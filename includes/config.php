
<?php
//Utseende och title
$siteTitle = " | Bloggportalen ";



//Auto-inklud klasser
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php'; //sökväg till mappen för dina klasser
});

session_start();

$devmode = true;

if ($devmode) {
    //Aktivera felrapportering
    error_reporting(-1);
    ini_set("display_errors", 1);

    //Databas inställningar = lokal

    define("DBHOST", "localhost");
    define("DBUSER", "bloggdb");
    define("DBPASS", "password");
    define("DBDATABASE", "bloggdb");
} else {

    //Riktiga databasen
}


//Funktion för att displaya inlogg msg
function errorMsg($errorNum)
{
    if ($errorNum == 1) {
        echo  " <h4>Du måste vara inloggad för att komma åt den här sidan </h4>";
    }
}

?>