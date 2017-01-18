<?php

/**
 * Class Cookies
 */
class Redirect
{
    /**
     * Redirect To Url
     *
     * @param $url
     */
    public static function redirectTo($url){
        header("Location: " . $url);
    }
}