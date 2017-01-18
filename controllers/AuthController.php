<?php

include(ROOT . '/models/Auth.php');
include(ROOT . '/libraries/Cookies.php');
include(ROOT . '/libraries/Redirect.php');

/**
 * Class AuthController
 */
class AuthController
{
    /**
     * Auth method
     * Get Auth Social Networks Data
     * User existence check
     * Create New User
     * Set Cookie from Client
     * Redirect to Comments Page
     *
     * @return bool
     */
    public function actionIndex(){
        // Get Auth Social Networks Data
        $json = file_get_contents('http://ulogin.ru/token.php?token=' . $_POST['token'] . '&host=' . $_SERVER['HTTP_HOST']);
        // Decode JSON
        $user = json_decode($json, true);

        // User existence check
        if(Auth::userExistenceCheck($user['uid'])){
            // Update Token into table "Users"
            Auth::updateUserToken($_POST['token'], $user['uid']);
            // Set Cookie from Client
            Cookies::setCookies($_POST['token']);
        } else {
            // Create New User
            Auth::createNewUser($user, $_POST['token']);
            // Set Cookie from Client
            Cookies::setCookies($_POST['token']);
        }

        // Redirect to Comments Page
        Redirect::redirectTo('/comments');

        return true;
    }
}