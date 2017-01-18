<?php

/**
 * Class Cookies
 */
class Cookies
{
    /**
     * Set Cookies
     *
     * @param $token
     */
    public static function setCookies($token){
        SetCookie("token",$token,time()+3600);
    }
}