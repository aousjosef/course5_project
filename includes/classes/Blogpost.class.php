<?php

class Blogpost
{

    private $db;
    private $author;
    private $title;
    private $content;

    // databas anslutning via constructor
    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning till databas från blogpost class " . $this->db->connect_errno);
        }
    }

    /** 
     * add post funktion
     */
    public function addPost(string $author, string $title, string $content): bool
    {

        if ($this->setTitle($title) and $this->setContent($content)) {

            $this->setAuthor($author);

            // sanitaization aginst SQL injections

            $sanTitle =  mysqli_real_escape_string($this->db, $this->title);
            $sanContent = mysqli_real_escape_string($this->db, $this->content);

            $sql = "INSERT INTO posts (author, title, content) VALUES ('" . $this->author . "', '" . $sanTitle . "', '" . $sanContent . "');";
            $result = $this->db->query($sql);
            echo "ny inlägg tillagd";
            return true;
        }

        echo "fel vid lagring av inlägg";
        return false;
    }


    // set-metoder med skydd mot HTML injektioner

    public function setAuthor(string $author)
    {
        $this->author =  $_SESSION['username'];
    }

    public function setTitle(string $title): bool
    {
        if (!$title == "") {

            $this->title = htmlspecialchars($title);
            return true;
        }
        echo "titel kan inte vara tom";
        return false;
    }

    public function setContent(string $content): bool
    {
        if (!$content == "") {
            $this->content = htmlspecialchars($content);
            return true;
        }
        echo "innehåll kan inte vara tom";
        return false;
    }


    // avsluta db ansluitning via destructor
    function __destruct()
    {
        mysqli_close($this->db);
    }
}
