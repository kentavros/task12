<?php
class Db extends SQL
{
    protected $pdoProp;


    /**
     * Construct select DB
     * Db constructor.
     *
     */
    public function __construct($db)
    {
        if ('mysql' == $db) {
            $pdo = new PDO(DSN_MY, USER_NAME, PASS);
            $this->pdoProp = $pdo;
        }
        elseif ('pgsql')
        {
            $pdo = new PDO(DSN_PG);
            $this->pdoProp = $pdo;
        }
        else
        {
            throw new Exception(ERROR_DB);
        }
    }


    /**
     * Query method to BD
     * @return array|int|string
     */
    public function exec()
    {
        $sql = parent::exec();
        if (mb_stripos($sql, SELECT) !== false)
        {
            $result = $this->pdoProp->query($sql, PDO::FETCH_ASSOC);
            $arrResult = array();
            foreach ($result as $row)
            {
               $arrResult[] = $row;
            }

            return $arrResult;
        }
        elseif (mb_stripos($sql, UPDATE) !== false)
        {
            if (isset($_SESSION['field']) && isset($_SESSION['value']))
            {
                if ($_SESSION['tbName'] != PG_TB_NAME)
                {
                    $sqlSelect = "SELECT `" . $_SESSION['field'] . "` FROM " . $_SESSION['tbName'] . " WHERE `" . $_SESSION['field'] . "`='" . $_SESSION['value'] . "'";
                    $result = $this->pdoProp->query($sqlSelect, PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        foreach ($row as $k => $v) {
                            if ($row[$k] == $_SESSION['value']) {
                                $_SESSION=array();
                                return EXIST_REC;
                            }
                        }
                    }
                    $_SESSION=array();
                    $count = $this->pdoProp->exec($sql);
                    return $count;
                }
                else
                {

                    $sqlSelect = "SELECT ".$_SESSION['field']." FROM ".$_SESSION['tbName']." WHERE ".$_SESSION['field']."='".$_SESSION['value']."'"; //FOR CLASS PC 4.!!!
//                    $sqlSelect = "SELECT ".$_SESSION['field']." FROM \"".$_SESSION['tbName']."\" WHERE ".$_SESSION['field']."='".$_SESSION['value']."'"; //For work pc
                    $result = $this->pdoProp->query($sqlSelect, PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        foreach ($row as $k => $v) {
                            if ($row[$k] == $_SESSION['value']) {
                                $_SESSION=array();
                                return EXIST_REC;
                            }
                        }
                    }
                    $_SESSION=array();
                    $count = $this->pdoProp->exec($sql);
                    return $count;
                }
            }
        }
        elseif (mb_stripos($sql, INSERT) !== false)
        {
            if (isset($_SESSION['key']) && isset($_SESSION['data']))
            {
                if ($_SESSION['tbName'] != PG_TB_NAME)
                {
                    $sqlSelect = "SELECT `key` FROM ".$_SESSION['tbName']." WHERE `key`='".$_SESSION['key']."'";
                    $result = $this->pdoProp->query($sqlSelect, PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        foreach ($row as $k => $v) {
                            if ($row[$k] == $_SESSION['key']) {
                                $_SESSION=array();
                                return EXIST_REC;
                            }
                        }
                    }
                    $_SESSION=array();
                    $count = $this->pdoProp->exec($sql);
                    return $count;
                }
                else
                {
                    $sqlSelect = "SELECT key FROM ".$_SESSION['tbName']." WHERE key='".$_SESSION['key']."'"; //FOR CLASS UNCOMINT 2.!!!
//                    $sqlSelect = "SELECT key FROM \"".$_SESSION['tbName']."\" WHERE key='".$_SESSION['key']."'"; //FOR work pc
                    $result = $this->pdoProp->query($sqlSelect, PDO::FETCH_ASSOC);
                    foreach ($result as $row) {
                        foreach ($row as $k => $v) {
                            if ($row[$k] == $_SESSION['key']) {
                                $_SESSION=array();
                                return EXIST_REC;
                            }
                        }
                    }
                    $_SESSION=array();
                    $count = $this->pdoProp->exec($sql);
                    return $count;
                }
            }
        }
        elseif (mb_stripos($sql, DELETE) !== false)
        {
            $count = $this->pdoProp->exec($sql);
            return $count;
        }
        else
        {
            return UNDEF_SQL;
        }


    }
}