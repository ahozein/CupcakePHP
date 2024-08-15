<?php
/* PDO Database Class
 * Connect to database
 * Create Prepared statements
 * Bind Values
 * Return rows and value
 */

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $db_handler;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';

        //Create PDO instance
        try {
            $this->db_handler = new PDO($dsn, $this->user, $this->pass);
            $this->db_handler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    //Prepare Statement with query
    public function query($sql)
    {
        $this->stmt = $this->db_handler->prepare($sql);
    }

    //Bind value
    public function bind($param, $value)
    {
        $this->stmt->bindParam($param, $value);
    }

    //Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }
    
    //Get result set as array of object
    public function fetchAll()
    {
        $this->execute();
        return $this->stmt->fetchAll();
    }

    //Get single record as object
    public function fetch()
    {
        $this->execute();
        return $this->stmt->fetch();
    }

    //Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

}