<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;

    
    public function __construct()
    {
        //dsn= data source name
        $dsn = 'mysql:host=' . $this->host .';dbname='.$this->db_name;

        $option =[
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user,$this->pass, $option);
        } catch (PDOException $e) {
            //throw $th;
            die($e->getMessage());
        }        
        
    }
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }
    
    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch(true){
                //cek apakah value nya int
                case is_int($value):
                    //jika int ganti type ke int
                    $type = PDO::PARAM_INT;
                    break;
                //cek apakah value nya boolean
                case is_bool($value):
                    //jika bool ganti type ke bool
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);

    }
    

    public function execute(){
        $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}