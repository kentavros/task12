<?php
session_start();
/**
 * Message
 */
//Do not use star in select
define('STAR_USED', 'Do not use * !');

//No object properties found
define('NO_PROPERTIES', 'No object properties found');

//Error connect to database
define ('ERROR_CONNECT', 'Error connect to database! Wrong host or user/pass! ');

//Wrong data base name
define ('ERROR_DB', 'Wrong data base name! ');

//Error query
define('ERROR_QUERY', 'Error query! ');

//No row
define('NO_ROW', 'No row - user6');

//Qery sql success done
define('DONE', 'Sql query done!');

//Delete successfully
define('DEL_SUC', 'Delete successfully!');

//SQL query str find
define('SELECT', 'select');
define('UPDATE', 'update');
define('INSERT', 'insert');
define('DELETE', 'delete');

//undefined sql query
define ('UNDEF_SQL', 'Undefined sql query!');

//Such a record exists
define('EXIST_REC', 'Such a record exists!');


/**
 * for Data Base MySQL
 */
define('DSN_MY', 'mysql:host=localhost;dbname=user1');

define('HOST','localhost');

define('USER_NAME', 'user1');

define('PASS', 'tuser1');

define('DB_NAME', 'user1');

define('TB_NAME', 'MY_TEST');

/**
 *for Data Base PostgreSQL
 */
define('DSN_PG', 'pgsql:host=localhost;port=5432;dbname=user1;user=user1;password=user1z');

define('PG_CONNECT', "host=localhost dbname=user1 user=user1 password=user1z");

define('PG_TB_NAME', 'PG_TEST');

?>
