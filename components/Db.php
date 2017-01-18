<?php

/**
 * Class Db
 */
class Db
{
    /**
     * Get Connection To DataBase
     *
     * @return PDO
     */
    public static function getConnection(){
        // Compile path to config file
        $paramsPath = ROOT . '/config/db_params.php';

        // Include config file
        $params = include($paramsPath);

        // Compile string for PDO
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";

        // Create new connection to PDO and "return"
        $pdo = new PDO($dsn, $params['user'], $params['password']);

        // Set charset UTF-8
        $pdo->exec("set names utf8");

        return $pdo;

    }
}