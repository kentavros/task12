<?php
class PostgreSQL extends SQL
{
    protected $connectPgProp;

    /**
     * Construct create connection to DB PostgreSQL
     * PostgreSQL constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->connectPgProp = pg_connect(PG_CONNECT);
            if(!$this->connectPgProp)
            {
                throw new Exception(ERROR_CONNECT . pg_last_error());
            }
    }

    /**
     * Give query for SQL class - and proces
     * @return array|int
     * @throws Exception
     */
    public function exec()
    {
        parent::exec();
        $result = pg_query($this->queryProp);
            if (!$result)
            {
                throw new Exception(ERROR_QUERY . pg_last_error()); 
            }
            else
            {
                if (1 == $this->flag)
                {
                    $this->flag = null;
                    return pg_affected_rows($result);
                }
                else
                {
                    $i=0;
                    $arrResult = array();
          
                    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) 
                    {
                        $arrResult[$i] = $row;
                        $i++;
                    }
                        return $arrResult;
                }
            }
    }

}
?>
