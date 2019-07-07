<?php
class DBConnect{
    private $connection = null;
    private $statement = null;
    /**
     * connect to database
     * @param string $dbName
     * @param string $username
     * @param string $password
     */
    function __construct($dbName='php0205_shopping', $username = 'root', $password = ''){
        $dsn = "mysql:dbname=$dbName;host=localhost";
        try{
            $this->connection = new PDO($dsn, $username, $password);
            $this->connection->exec('SET NAMES utf8');
        }
        catch(PDOException $e){
            echo $e->getMessage();
            die;
        }
    }

    /**
     * Use for Insert | Update | Delete
     * @return boolean
     */
    function executeQuery(string $sql, array $options=[]){
        $this->statement = $this->connection->prepare($sql);
        if(count($options) > 0 || !empty($options)){
            return $this->statement->execute($options);
        }
        return $this->statement->execute();

    }

    /**
      * Use for Select more rows
      * @return array(object) || boolean(false)
      */
    function getMoreRows(string $sql, array $options = []){
        $check = $this->executeQuery($sql, $options);
        if($check){ 

            return $this->statement->fetchAll(PDO::FETCH_OBJ);
        }
        print_r($this->statement->fetchAll(PDO::FETCH_OBJ)) ;
        die;
        return false;
    }

    /**
      * Use for Select 1 row
      * @return array(object) || boolean(false)
      */
    function getOneRow(string $sql, array $options = []){
        $check = $this->executeQuery($sql, $options);
        if($check){
            return $this->statement->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }

    // function checkObject($resultObj){
    //         echo '<pre>';
    //         if (isset($resultObj)) {
    //             echo count($resultObj).' is numbers of object';
    //             print_r($resultObj)
    //         }
    //         die;
    // }


    /**
     * Use after Insert 1 row
     * @return int id
     */
    function getRecentIdInsert(){
        return $this->connection->lastInsertId();
    }


}

?>