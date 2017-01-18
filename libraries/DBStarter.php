<?php

/**
 * Class DBStarter
 */
class DBStarter
{
    public function start(){
        if($this->checkTableUsers()){
            $this->createTableUsers();
        }

        if ($this->checkTableComments()){
            $this->createTableComments();
        }
    }

    /**
     * Create New Table "comments"
     */
    public function createTableComments(){

        $db = Db::getConnection();

        $query = "CREATE TABLE comments (id INT(11) NOT NULL AUTO_INCREMENT, user_id INT(11), parent_comment INT(11), comment TEXT CHARACTER SET utf8, PRIMARY KEY (id)) CHARACTER SET utf8;";
        $db->query($query);
    }

    /**
     * Create New Table "users"
     */
    public function createTableUsers(){

        $db = Db::getConnection();

        $query = "CREATE TABLE users (id INT(11) NOT NULL AUTO_INCREMENT, first_name VARCHAR(50) CHARACTER SET utf8, last_name VARCHAR(50) CHARACTER SET utf8, photo VARCHAR(255) CHARACTER SET utf8, photo_big VARCHAR(255) CHARACTER SET utf8, city VARCHAR(30) CHARACTER SET utf8, uid VARCHAR(255), token VARCHAR(255) CHARACTER SET utf8 ,PRIMARY KEY (id)) CHARACTER SET utf8;";

        $db->query($query);
    }

    /**
     * Check Table Users Exist
     *
     * @return mixed
     */
    private function checkTableUsers(){
        $db = Db::getConnection();

        $query = "SHOW TABLES like 'users';";

        return empty($db->query($query)->fetch(PDO::FETCH_ASSOC)) ? true : false;
    }

    /**
     * Check Table Comments Exist
     *
     * @return mixed
     */
    private function checkTableComments(){
        $db = Db::getConnection();

        $query = "SHOW TABLES like 'comments';";

        return empty($db->query($query)->fetch(PDO::FETCH_ASSOC)) ? true : false;
    }
}