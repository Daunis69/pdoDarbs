<?php



 class Database {
        private $pdo;
    public function query($sql) {

        $statement = $this->pdo->prepare($sql);
        $statement->execute();

        return $statement;
    }
    public function __construct($config){
        
 
    $dsn = "mysql:" . http_build_query($config, arg_separator: ";");
        $this->pdo = new PDO($dsn);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}