<?php 
/**
 * SITE CONFIG
 */
define ("SITE", [
    "name" => "Site Name",
    "desc" => "Website Description",
    "domain" => "websitename.com",
    "locale" => "pt_BR",
    "language" => "pt-br",
    "root" => "http://localhost/mvc-template"
]);

/**
 * DATABASE CONNECT
 * Connect either in localhost or webserver
 */
if ($_SERVER["SERVER_NAME"] == "localhost"){
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "localhost",
        "port" => "3306",
        "dbname" => "mvc_template",
        "username" => "root",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
}else{
    define("DATA_LAYER_CONFIG", [
        "driver" => "mysql",
        "host" => "https://andersonjobloeffler.com",
        "port" => "3306",
        "dbname" => "mvc_template",
        "username" => "ander393_ghoron",
        "passwd" => "",
        "options" => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]);
}
