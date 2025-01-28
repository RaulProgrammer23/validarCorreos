<?php 

class DataBase{
    private $connection;

    public function __construct(){
        $parametros = array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
        try{           
            $this->connection = new PDO('mysql:host=localhost;dbname=validarcorreos','tuUsuario','tuPassword',$parametros);          
        }catch(PDOException $e){
            echo $e->getMessage();
            exit();
        }
    }
    
    /**
     * Get the value of connecion
     */ 
    public function getConnection()
    {
        return $this->connection;
    }
}

?>