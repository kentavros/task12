<?php
class Db extends SQL
{
    protected $pdoProp;


    public function __construct($db)
    {
        if ('mysql' == $db) {
            $pdo = new PDO(DSN_MY, USER_NAME, PASS);
            $this->pdoProp = $pdo;
        }
    }
///////////////////// ???????????????????????????????

    public function exec()
    {
        $sql = parent::exec();
        $result = $this->pdoProp->query($sql);
        $arrResult = array();
        foreach ($result as $row)
        {
            $arrResult[]=$row;
        }
        return $arrResult;
    }
}