<?php

/**
 * Class Auth
 */
class Auth
{
    /**
     * User Existence Check
     *
     * @param $uid
     * @return bool
     */
    public static function userExistenceCheck($uid){
        $db = Db::getConnection();

        $result = $db->query("SELECT uid FROM users WHERE uid=$uid");

        return $result->fetch(PDO::FETCH_ASSOC)['uid'] ? true : false;
    }

    /**
     * Create New User into table "Users"
     *
     * @param $user
     */
    public static function createNewUser($user, $token){
        $db = Db::getConnection();

        $values = $user['first_name'] .
            "','" . $user['last_name'] .
            "','" . $user['photo'] .
            "','" . $user['photo_big'] .
            "','" . $user['city'] .
            "','" . $user['uid'] .
            "','" . $token;

        $db->query("INSERT INTO users (first_name, last_name, photo, photo_big, city, uid, token) VALUES ('" . $values . "')");
    }

    /**
     * Update User Token into table "Users"
     *
     * @param $token
     * @param $uid
     */
    public static function updateUserToken($token, $uid){
        $db = Db::getConnection();

        $db->query("UPDATE users SET token='". $token . "' WHERE uid=" . $uid);
    }
}