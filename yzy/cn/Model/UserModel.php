<meta
<?php
/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/27/15
 * Time: 1:45 PM
 */

class User{

    private $db;
    private $mysqli;

    function __construct() {
        require_once("ConnectDB.php");
        $this->db = new ConnectDB();
        $this->mysqli = $this->db->connectDB();
    }

    public function register($array)
    {
        $name = $array['name'];
        $password = md5(md5($array['password']));
        $country = $array['country'];
        $district = $array['district'];
        $address = $array['address'];
        $chinese_address = $array['chinese_address'];
        $postcode = $array['postcode'];
        $tel = $array['tel'];
        $email = $array['email'];
        $sql = "INSERT INTO user (name, password, country, district, address, chinese_address, postcode, tel, email) VALUES
        ('$name', '$password', '$country', '$district', '$address', '$chinese_address', '$postcode', '$tel', '$email')";
        $this->mysqli->query($sql);
        mysqli_close();
    }

    public function checkEmail($array){
        $email = $array['email'];
        $sql = "SELECT email FROM user WHERE email = '$email'";
        $result = $this->mysqli->query($sql);
        $number = $result->num_rows;
        mysqli_close();
        return $number;
    }

    public function login($array){
        $email = $array['email'];
        $password = md5(md5($array['password']));
        $sql = "SELECT email, password FROM user WHERE email = '$email' AND password = '$password'";
        $result = $this->mysqli->query($sql);
        mysqli_close();
        return $result->num_rows;
    }

    public function setSession($array){
        session_start();
        $email = $array['email'];
        $sql = "SELECT id, name FROM user WHERE email = '$email'";
        $name = $this->mysqli->query($sql);
        $user_name = $name->fetch_assoc();
        //var_dump($user_name['name']);
        $_SESSION["user_name"] = $user_name['name'];
        $_SESSION['user_id'] = $user_name['id'];
    }

    public function setManagerSession($array){
        session_start();
        $email = $array['email'];
        $sql = "SELECT id, name FROM manager WHERE email = '$email'";
        $name = $this->mysqli->query($sql);
        $manager_name = $name->fetch_assoc();
        $_SESSION["manager_name"] = $manager_name['name'];
        $_SESSION['manager_id'] = $manager_name['id'];
    }

    public function getPassword($array){
        $email = $array['email'];
        $name = $array['name'];
        $sql = "SELECT password FROM user WHERE email = '$email' AND name = '$name'";
        $result = $this->mysqli->query($sql);
        $rows = $result->num_rows;
        // Setup session
        session_start();
        $_SESSION['email'] = $email;
        mysqli_close();
        return $rows;
    }

    public function setPassword($array){
        session_start();
        $email = $_SESSION['email'];
        if($email == null){
            return true;
        } else{
            $password = md5(md5($array['password']));
            $sql = "UPDATE user SET password = '$password' WHERE email = '$email'";
            $this->mysqli->query($sql);
            mysqli_close();
            return false;
        }
    }

    public function loadUsers($array){
        $sql = "SELECT id, name, tel FROM user";
        $result = $this->mysqli->query($sql);
        while($user = $result->fetch_assoc()){
            $users[] = $user;
        }
        mysqli_close();
        return $users;
    }

    public function checkManagerEmail($array){
        $email = $array['email'];
        $sql = "SELECT email FROM manager WHERE email = '$email'";
        $result = $this->mysqli->query($sql);
        $number = $result->num_rows;
        mysqli_close();
        return $number;
    }

    public function registerManager($array){
        $name = $array['name'];
        $password = md5(md5($array['password']));
        $country = $array['country'];
        $district = $array['district'];
        $address = $array['address'];
        $postcode = $array['postcode'];
        $tel = $array['tel'];
        $email = $array['email'];
        $confirm = $array['confirm'];
        if($confirm == "yuzhiyuan"){
            $sql = "INSERT INTO manager (name, password, country, district, address, postcode, tel, email) VALUES
              ('$name', '$password', '$country', '$district', '$address', '$postcode', '$tel', '$email')";
            $this->mysqli->query($sql);
            // Setup session
            session_start();
            $_SESSION['manager_name'] = $name;
            $_SESSION['manager_id'] = $this->mysqli->insert_id;
            var_dump($_SESSION['manager_name']);
            //
            mysqli_close();
            return true;
        } else{
            return false;
        }
    }
    public function managerLogin($array){
        $email = $array['email'];
        $password = md5(md5($array['password']));
        $sql = "SELECT email, password FROM manager WHERE email = '$email' AND password = '$password'";
        $result = $this->mysqli->query($sql);
        mysqli_close();
        return $result->num_rows;
    }

    public function loadManagers($array){
        $sql = "SELECT id, name, tel FROM manager";
        $result = $this->mysqli->query($sql);
        while($user = $result->fetch_assoc()){
            $users[] = $user;
        }
        mysqli_close();
        return $users;
    }

    public function getManagerDetails($id){
        $sql = "SELECT * FROM manager WHERE id = '$id'";
        $result = $this->mysqli->query($sql);
        while($user = $result->fetch_assoc()){
            $users[] = $user;
        }
        mysqli_close();
        return $users;
    }

    public function getUserDetails($id){
        $sql = "SELECT * FROM user WHERE id = '$id'";
        $result = $this->mysqli->query($sql);
        while($user = $result->fetch_assoc()){
            $users[] = $user;
        }
        mysqli_close();
        return $users;
    }

    public function updateUser($array){
        //var_dump($array);
        $name = $array['name'];
        $email = $array['email'];
        $district = $array['district'];
        $country = $array['country'];
        $address = $array['address'];
        $chinese_address = $array['chinese_address'];
        $postcode = $array['postcode'];
        $tel = $array['tel'];
        $user_id = $array['user_id'];

        $sql = "UPDATE user SET
          name = '$name',
          email = '$email',
          country = '$country',
          district = '$district',
          address = '$address',
          chinese_address = '$chinese_address',
          postcode = '$postcode',
          tel = '$tel' WHERE id = '$user_id'";
        $this->mysqli->query($sql);
    }

    public function updateManager($array){
        //var_dump($array);
        $name = $array['name'];
        $email = $array['email'];
        $district = $array['district'];
        $country = $array['country'];
        $address = $array['address'];
        $postcode = $array['postcode'];
        $tel = $array['tel'];
        $manager_id = $array['manager_id'];

        $sql = "UPDATE manager SET
          name = '$name',
          email = '$email',
          country = '$country',
          district = '$district',
          address = '$address',
          postcode = '$postcode',
          tel = '$tel' WHERE id = '$manager_id'";
        $this->mysqli->query($sql);
    }

    public function logout(){
        // Initialize the session.
        // If you are using session_name("something"), don't forget it now!
        session_start();

        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        // Finally, destroy the session.
        session_destroy();
    }

    public function getUserOrders($array){
        $user_id = $array['user_id'];
        $sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
        $result_set = $this->mysqli->query($sql);
        while($result = $result_set->fetch_assoc())
            $results[] = $result;
        return $results;
    }

    public function getManagerOrders($array){
        $manager_id = $array['manager_id'];
        $sql = "SELECT * FROM orders WHERE manager_id = '$manager_id'";
        $result_set = $this->mysqli->query($sql);
        while($result = $result_set->fetch_assoc())
            $results[] = $result;
        return $results;
    }

    public function addManager($array) {
        $name = $array['name'];
        $password = md5(md5("12345"));
        $country = $array['country'];
        $district = $array['district'];
        $address = $array['address'];
        $postcode = $array['postcode'];
        $tel = $array['tel'];
        $email = $array['email'];
        $sql = "INSERT INTO manager (name, password, country, district, address, postcode, tel, email) VALUES
              ('$name', '$password', '$country', '$district', '$address', '$postcode', '$tel', '$email')";
        $this->mysqli->query($sql);
        // Setup session
        session_start();
        $_SESSION['manager_name'] = $name;
        $_SESSION['manager_id'] = $this->mysqli->insert_id;
        var_dump($_SESSION['manager_name']);
        //
        mysqli_close();
        return true;
    }

    public function addUser($array)
    {
        $name = $array['name'];
        $password = md5(md5("12345"));
        $country = $array['country'];
        $district = $array['district'];
        $address = $array['address'];
        $chinese_address = $array['chinese_address'];
        $postcode = $array['postcode'];
        $tel = $array['tel'];
        $email = $array['email'];
        $sql = "INSERT INTO user (name, password, country, district, address, chinese_address, postcode, tel, email) VALUES
        ('$name', '$password', '$country', '$district', '$address', '$chinese_address', '$postcode', '$tel', '$email')";
        $this->mysqli->query($sql);
        mysqli_close();
    }
}