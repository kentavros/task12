<?php
    include('libs/config.php');
    include('libs/function.php');
//PDO :: MySQL
try
{
    $my = new MySQL('mysql');
//INSERT
    $my->insertInto(TB_NAME)->values('user6', 'test6')->exec();
//SELECT
    $sqlSel1 = $my->select('`key`, data')->from(TB_NAME)
        ->where('key', 'user6', TB_NAME)->exec();
    $strSelect ='';
    if(is_array($sqlSel1)): foreach ($sqlSel1 as $k=>$v): $strSelect .= $v['key'].'=>'.$v['data'].'<br>'; endforeach; endif;
//UPDATE
    $my->insertInto(TB_NAME)->values('user6_100', 'test6')->exec();
    $sqlUpdate = $my->update(TB_NAME)->set('data', 'test100', TB_NAME)
       ->where('key','user6_100', TB_NAME)->exec();
    $sqlSel2 = $my->select('`key`, data')->from(TB_NAME)
        ->where('key', 'user6_100', TB_NAME)->exec();
    $strSelect2 ='';
    if(is_array($sqlSel2)): foreach ($sqlSel2 as $k=>$v): $strSelect2 .= $v['key'].'=>'.$v['data'].'<br>'; endforeach; endif;
//DELETE
    $my->insertInto(TB_NAME)->values('user6_200', 'test6')->exec();
    $my->delete()->from(TB_NAME)->where('key','user6_200', TB_NAME)->exec();
    $MyDel = $my->select('`key`, data')->from(TB_NAME)
        ->where('key', 'user6_200', TB_NAME)->exec();
}
catch (Exception $e)
{
    $msg = $e->getMessage();
}

//PDO :: PgSQL
try
{
    $pg = new PostgreSQL('pgsql');
//INSERT
    $pg->insertInto(PG_TB_NAME)->values('user6', 'test6')->exec();
//SELECT
    $pgSelect1 = $pg->select("key, data")->from(PG_TB_NAME)
        ->where('key', 'user6', PG_TB_NAME)->exec();
    $pgStrSelect1 ='';
    if(is_array($pgSelect1)): foreach ($pgSelect1 as $k=>$v): $pgStrSelect1 .= $v['key'].'=>'.$v['data'].'<br>'; endforeach; endif;
//UPDATE
    $pg->insertInto(PG_TB_NAME)->values('user6_100', 'test6')->exec();
    $pgUpdate = $pg->update(PG_TB_NAME)->set('data', 'test100', PG_TB_NAME)
        ->where('key','user6_100', PG_TB_NAME)->exec();
    $pgSelect2 = $pg->select('key, data')->from(PG_TB_NAME)
        ->where('key', 'user6_100', PG_TB_NAME)->exec();
    $pgStrSelect2 ='';
    if(is_array($pgSelect2)): foreach ($pgSelect2 as $k=>$v): $pgStrSelect2 .= $v['key'].'=>'.$v['data'].'<br>'; endforeach; endif;
//DELETE
    $pg->insertInto(PG_TB_NAME)->values('user6_200', 'test6')->exec();
    $pg->delete()->from(PG_TB_NAME)->where('key', 'user6_200', PG_TB_NAME)->exec();
    $PgDel = $pg->select('key, data')->from(PG_TB_NAME)
        ->where('key', 'user6_200', PG_TB_NAME)->exec();
}
catch (Exception $e)
{
    $msg = $e->getMessage();
}

include('template/tmp.php');
?>
