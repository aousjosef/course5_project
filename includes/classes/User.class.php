<?php


class User
{

    private $db;
    private $newUser;
    private $newPass;

    //for db connection
    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid DB anslutning" . $this->db->connect_errno);
        }
    }


    /**
     * Check login 
     * @param  string $username
     * @param string $password
     * @return bool
     */

    public function loginUser(String $username, String $password): bool
    {
        //Session already started, since class will be runing inside php file with config.php
        // sql_real_escape for sanitiazition of sql input

        $sql = "SELECT * FROM users WHERE username ='" . mysqli_real_escape_string($this->db, $username) . "';";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {

            $resultArray = mysqli_fetch_assoc($result);
            $hashedPass = $resultArray['password'];
            $fullname = $resultArray['fullname'];

            if (password_verify($password, $hashedPass)) {

                $_SESSION["username"] = $username;
                $_SESSION["fullname"] = $fullname;
                return true;
            }
        }

        return false;
    }


    /**
     * Register new user
     * @param string $username
     * @param string $password
     * @param string $fullname
     * @return bool;
     * 
     */


    public function regNewUser(string $newUser, string $newPass, string $newFullname): bool
    {

        if ($this->setNewUser($newUser) and $this->setNewPass($newPass)) {

            $hashedNewPass = password_hash($newPass, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(username, password, fullname) VALUES ('" . mysqli_real_escape_string($this->db, $newUser) . "','" . $hashedNewPass . "','" . mysqli_real_escape_string($this->db, $newFullname) . "');";
            $result = $this->db->query($sql);
            echo "Ny konto registrerad";
            return true;
        }

        error_log('Error: registering new user: invalid username or password');
        return false;
    }


    /** 
     * set new user
     * @param string $newUser
     * @return bool;
     */

    public function setNewUser(string $newUser): bool
    {
        if (!$newUser == "") {
            $this->newUser = $newUser;
            return true;
        } else {
            echo "username too short";
            return false;
        }
    }


    /** 
     * set new password
     * @param string $newPass
     * @return bool;
     */

    public function setNewPass(string $newPass): bool
    {
        if (!$newPass == "" and strlen($newPass) > 5) {
            $this->newPass = $newPass;
            return true;
        } else {
            echo "Lösenordet är för kort, minst 6 tecken";
            return false;
        }
    }


    /**
     * Get array of users
     * @return array
     */
    //present all users
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    function __destruct()
    {
        mysqli_close($this->db);
    }
}
