<?php

include(ROOT . '/models/Comments.php');
include(ROOT . '/libraries/Redirect.php');
/**
 * Class CommentsController
 */
class CommentsController
{
    /**
     * Comments Page
     *
     * @return bool
     */
    public function actionIndex(){

        if(isset($_COOKIE['token'])){
            // Token isset
            if(!empty(Comments::checkAuthUserByToken($_COOKIE['token']))){
                $auth = true;
            } else {
                $auth = false;
            }
        } else {
            // Token is not exist
            $auth = false;
        }

        // Include view
        include(ROOT . '/views/comments/comments.php');

        return true;
    }

    /**
     * Add Message
     *
     * @return bool
     */
    public function actionAddMessage(){
        // Get user_id by token Auth
        $user_id = Comments::getUserIdByToken($_COOKIE['token']);

        // Create New Message
        Comments::insertNewMessage($_POST['comment'], $_POST['parent_comment'] , $user_id['id']);

        // Redirect to Comments Page
        Redirect::redirectTo('/comments');

        return true;
    }

    /**
     * Delete Messages
     *
     * @param $id
     * @return bool
     */
    public function actionDelete($id){

        Comments::deleteMessage($id);

        // Redirect to Comments Page
        Redirect::redirectTo('/comments');

        return true;
    }
}