<?php

/**
 * Class Comments
 */
class Comments
{

    /**
     * Insert (Create) New Message
     *
     * @param $text
     * @param $parent_id
     * @param $user_id
     */
    public static function insertNewMessage($text, $parent_id, $user_id){
        $db = Db::getConnection();

        $db->query("INSERT INTO comments (user_id, parent_comment, comment) VALUES (" . $user_id . ", " . $parent_id . ",'" . $text . "');");
    }

    /**
     * Get "user_id" by token Auth
     *
     * @param $token
     * @return mixed
     */
    public static function getUserIdByToken($token){
        $db = Db::getConnection();

        $result = $db->query("SELECT id FROM users WHERE token='" . $token . "';");

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public static function deleteMessage($id){
        $db = Db::getConnection();

        $db->query("DELETE FROM comments WHERE id=" . $id . ";");
    }

    /**
     * Check Auth User By Token from Cookie
     *
     * @param $token
     * @return mixed
     */
    public static function checkAuthUserByToken($token){
        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM users WHERE token='" . $token . "';");

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Get Messages List
     *
     * @return array
     */
    public static function getMessages(){
        $db = Db::getConnection();

        $newList = array(); $i = 0;
        $query = "SELECT u.*,c.* FROM users AS u LEFT JOIN comments AS c ON c.user_id=u.id WHERE c.parent_comment IS NULL AND user_id IS NOT NULL ORDER BY c.id DESC;";
        $result = $db->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['first_name'] = $row['first_name'];
            $newList[$i]['last_name'] = $row['last_name'];
            $newList[$i]['comment'] = $row['comment'];
            $newList[$i]['user_id'] = $row['user_id'];
            $newList[$i]['photo'] = $row['photo'];
            $i++;
        }

        return $newList;
    }

    /**
     * Get Sub Comment
     *
     * @param $id
     * @return array
     */
    public static function getSubComment($id){
        $db = Db::getConnection();

        $newList = array(); $i = 0;
        $query = "SELECT u.*,c.* FROM users AS u LEFT JOIN comments AS c ON c.user_id=u.id WHERE c.parent_comment=" . $id . " ORDER BY c.id;";
        $result = $db->query($query);

        while ($row = $result->fetch(PDO::FETCH_ASSOC)){
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['first_name'] = $row['first_name'];
            $newList[$i]['last_name'] = $row['last_name'];
            $newList[$i]['comment'] = $row['comment'];
            $newList[$i]['user_id'] = $row['user_id'];
            $newList[$i]['photo'] = $row['photo'];
            $i++;
        }

        return $newList;
    }
}