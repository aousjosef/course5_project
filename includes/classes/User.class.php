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
     * @param  string $username; 
     * @param string $password;
     * @return bool;
     */

    public function loginUser(String $username, String $password): bool
    {
        //Session already started, since class will be runing inside php file with config.php


        $sql = "SELECT * FROM users WHERE username ='" . $username . "' AND password='" . $password . "';";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["username"] = $username;
            $fullname = mysqli_fetch_assoc($result)['fullname'];
            $_SESSION["fullname"] = $fullname;

            // echo "LOGIN SUCESS FROM USER CLASS";

            return true;
        } else {

            // echo "LOGIN FAIL FROM USER CLASS";

            return false;
        }
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

            $sql = "INSERT INTO users(username, password, fullname) VALUES ('" . $newUser . "','" . $hashedNewPass . "','" . $newFullname . "');";
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
     * return new username
     * @return string;
     * 
     */

    public function getNewUser()
    {
        return $this->newUser;
    }


    /** 
     * return new username
     * @return string;
     * 
     */

    public function getNewPass()
    {
        return $this->newPass;
    }
}
