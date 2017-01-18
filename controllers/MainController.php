<?php

/**
 * Class MainController
 */
class MainController
{
    /**
     * Main Auth Page
     *
     * @return bool
     */
    public function actionIndex(){

        // Include view
        include(ROOT.'/views/main/main.php');

        return true;
    }
}