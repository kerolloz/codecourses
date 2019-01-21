<?php

class TableClass
{
    private static $connection = null; // shared among all objects

    private $name;
    private $columns_array;
    private $constrains_array;

    public static function set_sql_connection($connection)
    {
        self::$connection = $connection;
    }

    public function __construct($name=null, $columns_array=null, $constrains_array=null)
    {
        $this->name = $name;
        $this->columns_array = $columns_array;
        $this->constrains_array = $constrains_array;
    }

    public function create()
    {
        if ($this->name && $this->columns_array && $this->constrains_array && self::$connection) {
            $sql = "CREATE TABLE IF NOT EXISTS $this->name (";
            $size = sizeof($this->columns_array); //number of users_columns
            for ($i=0; $i < $size; $i++){
                $sql .= $this->columns_array[$i]; //add column name and space
                $sql .= " ";
                foreach ($this->constrains_array[$i] as $constrain) //loop on the users_constrains for each column
                {
                    $sql .= $constrain; //add users_constrains after each column name separated py space
                    $sql .= " ";
                }
                //adding ) only if it is the last column to close that opened above or , if it is not the last one
                if ($i == $size-1)
                {
                    $sql .= ") ENGINE=InnoDB;";
                }else  $sql .= ",";
            }
            // use exec() because no results are returned
            try {
                self::$connection->exec($sql);
                echo "$this->name created!\n";
                return 0;
            } catch (\Exception $e) {
                echo $e;
                return -1;
            }
        }
    }
}
