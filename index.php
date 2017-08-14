<?php
    include('libs/config.php');
    include('libs/function.php');

//try {
//    $pdo = new PDO(DSN_MY, USER_NAME, PASS);
//    $sql = 'SELECT data FROM MY_TEST WHERE `key`=\'user8\'';
//    $query = $pdo->query($sql);
//    foreach ($query as $row)
//    {
//        var_dump($row);
//    }
//}
//catch(PDOException $e){
//    echo 'ERRORRRR '. $e->getMessage();
//}

//PDO MySQL
try
{
    $db = new Db('mysql');
    echo '<hr>';
    var_dump($sql = $db->select('data')->from(TB_NAME)->where('user8', TB_NAME)->exec());








}
catch (Exception $e)
{
    $msg = $e->getMessage();
}
include('template/tmp.php');
?>
