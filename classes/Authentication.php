<?php

class Authentication
{
    public static function login()
    {
        session_regenerate_id(true);

        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $_POST['username'];
        
        
    }

    public static function logout()
    {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '', time() - 42000,
                $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    public static function checkAdmin(){
        if(isset($_SESSION['admin']) && $_SESSION['admin'] === 'yes'){
            return true;
        }else{
            return false;
        }
    }
    public static function requireAdmin(){
        if(!static::checkAdmin()){
            die('Nie posiadasz uprawnień');
        }
    }
}




?>