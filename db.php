<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// define, similar to $var but allows for universal public access.
// defile('variable_name', 'value');
// $_HOST_NAME = 'localhost';
define('_HOST_NAME', 'localhost');
define('_DATABASE_NAME', 'classlist');
define('_DATABASE_USER_NAME', 'root');
define('_DATABASE_PASSWORD', 'root');


// MySQLi(host, databaseUserName, dataBasePassword, databaseName);
// MySQLi('localhost', 'root', 'root', 'userdata');
$MySQLiconn = new MySQLi(_HOST_NAME,_DATABASE_USER_NAME,_DATABASE_PASSWORD,_DATABASE_NAME);


// optional
if($MySQLiconn->connect_errno)
{
    die("ERROR : -> ".$MySQLiconn->connect_error);
}