<meta charset="UTF-8">
<?php
/**
 * Created by PhpStorm.
 * User: xingda
 * Date: 7/27/15
 * Time: 4:12 PM
 */
$array = $_POST;
$type = $array['type'];
require_once("../Model/UserModel.php");
$user = new User();
if($type == "register"){
    if($user->checkEmail($array) >= 1){
        echo "<br>";
        echo "Email has been registered"."<br>";
        echo "Login?"."<br>";
        echo "<a href='../Views/login.html'>Login</a>";
    } else{
        $user->register($array);
        $user->setSession($array);
        header("Location: ../Views/home.php");
    }
} elseif($type == "login"){
    if($user->login($array) == 1){
        //if login succeed, set up session
        echo "login succeed<br>";
        // Setup session
        $user->setSession($array);
        echo "Redirect to home in 1 seconds"."<br>";
        echo '<meta content="1; ../Views/home.php" http-equiv="Refresh" />';
    } else{
        echo "<br>";
        echo "Email or Password is not correct, re-enter password in 5 seconds"."<br>";
        echo '<meta content="5; ../Views/login.html" http-equiv="Refresh" />';
    }
} elseif($type == "find_password"){
    $result = $user->getPassword($array);
    if($result == 0){
        echo "Email and user name does not match<br>";
        echo "Register a new one?"."<br>";
        echo "<a href='../Views/register.html'>Register</a>";
    } else{
        // Set new password
        echo '<meta content="0; ../Views/reset_password.html" http-equiv="Refresh" />';
    }
} elseif($type == "reset_password"){
    if($user->setPassword($array)){
        echo "Password set failed, please re-try<br>";
        echo "reset password in 3 seconds"."<br>";
        echo '<meta content="3; ../Views/find_password.html" http-equiv="Refresh" />';
    } else{
        echo "password changed<br>";
        echo "re-login in 3 seconds"."<br>";
        echo '<meta content="3; ../Views/login.html" http-equiv="Refresh" />';
    }
    //session_destroy();
} elseif($type == "register_manager"){
    if($user->checkManagerEmail($array) >= 1){
        echo "<br>";
        echo "Email has been registered"."<br>";
        echo "Login?"."<br>";
        echo "<a href='../Views/login.html'>Login</a>";
    } else{
        if($user->registerManager($array)){
            echo "<br>";
            echo "Manager registered succeed<br>";
            echo "re-direct to home page in 3 seconds"."<br>";
            echo '<meta content="3; ../Views/manager_home.php" http-equiv="Refresh" />';
        } else{
            echo "Manager registered failed, confirm code is not correct <br>";
            echo "<a href='../../'>manager_login</a>";
        }
    }
} elseif($type == "manager_login") {
    if($user->managerLogin($array) == 1){

        //if login succeed, set up session
        echo "login succeed";
        // Setup session
        $user->setManagerSession($array);
        header('Location: ../Views/manager_home.php');
    } else{
        echo "<br>";
        echo "Email or Password is not correct";
        echo "re-direct to home page in 3 seconds"."<br>";
        echo '<meta content="3; ../Views/manager_login.html" http-equiv="Refresh" />';
    }
} elseif($type == "user_update"){
    session_start();
    $_SESSION['user_details'] = $user->getUserDetails($array['user_id']);
    header('Location: ../Views/user_update.php');
} elseif($type == "manager_update"){
    session_start();
    $_SESSION['manager_details'] = $user->getManagerDetails($array['manager_id']);
    header('Location: ../Views/manager_update.php');
} elseif($type == "user_update_confirmed"){
    $user->updateUser($array);
    //var_dump($array);
    echo "<br>";
    echo "user information update succeed, re-direct home in 3 seconds"."<br>";
    echo '<meta content="3; ../Views/home.php" http-equiv="Refresh" />';
} elseif($type == "manager_update_confirmed"){
    $user->updateManager($array);
    echo "<br>";
    echo "user information update succeed, re-direct home in 3 seconds"."<br>";
    echo '<meta content="3; ../Views/manager_home.php" http-equiv="Refresh" />';
} elseif($type == "logout"){
    $user->logout();
    header('Location: ../../');
} elseif($type == "check_orders"){
    //var_dump($array);
    if($array['manager_id'] != null){
        $result = $user->getManagerOrders($array);
        //var_dump($result);
        session_start();
        $_SESSION['manager_order_list'] = $result;
        header('Location: ../Views/check_orders.php');
    } else{
        $result = $user->getUserOrders($array);
        session_start();
        $_SESSION['user_order_list'] = $result;
        header('Location: ../Views/user_order_lists.php');
    }
} elseif ($type == "release_orders"){
    header('Location: ../Views/ordering.php');
} elseif ($type == "user_release_order"){
    /*
    session_start();
    $userDetails = $user->getUserDetails($_SESSION['user_id']);
    var_dump($userDetails);
    */
    header('Location: ../Views/user_address_preview.php');
} elseif($type == "staff_lists"){
    header("Location: ../Views/staff_lists.php");
} elseif($type == "add_manager") {
    if($user->checkManagerEmail($array) >= 1){
        echo "<br>";
        echo "Email has been registered"."<br>";
        echo "<a href='../Views/add_manager.html'>重新添加</a>";
    } else {
        $user->addManager($array);
        echo "<br>";
        echo "Manager registered succeed<br>";
        echo "re-direct to home page in 3 seconds" . "<br>";
        echo '<meta content="3; ../Views/staff_lists.php" http-equiv="Refresh" />';
    }
} elseif($type == "add_user") {
    if($user->checkEmail($array) >= 1){
        echo "<br>";
        echo "Email has been registered"."<br>";
        echo "<a href='../Views/add_user.html'>重新添加</a>";
    } else {
        $user->addUser($array);
        echo "<br>";
        echo "User registered succeed<br>";
        echo "re-direct to home page in 3 seconds" . "<br>";
        echo '<meta content="3; ../Views/staff_lists.php" http-equiv="Refresh" />';
    }
} elseif($type == "update_clerk_details") {
    var_dump($array);
    session_start();
    if($array['manager_id'] != null){
        $_SESSION['manager_details'] = $user->getManagerDetails($array['manager_id']);
        header('Location: ../Views/manager_update.php');
    }elseif ($array['user_id'] != null){
        //$_SESSION['user_id'] = $array['user_id'];
        //header('Location: ../Views/user_preview.php');
        //var_dump($array['user_id']);
        $_SESSION['user_details'] = $user->getUserDetails($array['user_id']);
        header("Location: ../Views/user_preview.php");
    } else{
        header("Location: ../Views/staff_lists.php");
    }
} elseif($type = "user_update_by_manager"){
    $user->updateUser($array);
    echo "<br>";
    echo "re-direct to home page in 3 seconds" . "<br>";
    echo '<meta content="3; ../Views/manager_home.php" http-equiv="Refresh" />';
}