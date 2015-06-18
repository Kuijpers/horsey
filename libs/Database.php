<?php
/**
 * Description of Database
 * 
 * This class extends PDO
 * 
 * Within this class we handle everything needed for database handling
 *
 * @author Dennis Kuijpers
 * @copyright (c) 2014, Dennis Kuijpers
 * 
 */
class Database extends PDO {
    
    function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
        parent::__construct($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
    }
    
    /**
     * create($table, $data)
     * Insert values into database
     * 
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     */
    public function create($table, $data){
        
            // For debug remove slashes
                //print_r($data);die();
        
        ksort($data);
               
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
            // For debug remove slashes
                //print_r($fieldNames);echo "<br>";print_r($fieldValues);die();
                
        $sth = $this->prepare("INSERT INTO $table(`$fieldNames`)VALUES ($fieldValues)");
        
            // For debug remove slashes
                 //print_r($data);die();
        
        foreach($data as $key=>$value){
                       
            $sth->bindValue(":$key", $value);
        }
        
        $sth->execute();
        
            // For debug remove slashes
                //echo "<pre>";$sth->debugDumpParams();echo "</pre>";die();
    }
    /**
     * lastId()
     * Get the last inserted ID
     * 
     * @return integer Last inserted ID
     */
    public function lastId($name = null){
        
        return $this->lastInsertId($name);
        
    }
    
    /**
     * read($sql, $array = [], $fetchmode = PDO::FETCH_ASSOC)
     * Get the required information from the database
     * 
     * @param string $sql An SQL string
     * @param array $array Parameters to bind
     * @param constant $fetchmode A PDO fetchmode
     * @return mixed
     */
    
    public function read($sql, $array = [], $fetchmode = PDO::FETCH_ASSOC){
      
        $sth = $this->prepare($sql);
        foreach($array as $key=>$value){
            $sth->bindValue("$key", $value);
        }
        $sth->execute();
        return $sth->fetchAll($fetchmode);
    }
    
    
    
    /**
     * update($table, $data, $where)
     * Change the information in the database where a given argument exists
     * 
     * @param string $table A name of table to insert into
     * @param string $data An associative array
     * @param string $where The WHERE query part
     */
    
    public function update($table, $data, $where){
        ksort($data);
        
        $fieldDetails = NULL;
        
        foreach($data as $key => $value){
            $fieldDetails .="`$key`=:$key,";
        }
         $fieldDetails = rtrim($fieldDetails, ',');
            /**
            *  Remove slashes for debug
            */
                //echo $fieldDetails; die();
               
        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
        
        foreach($data as $key=>$value){
            $sth->bindValue(":$key", $value);
        }
            /**
             * Remove slashes for debug
             */
                //print_r($sth);die();
        
        $sth->execute();
    }
    
    /**
     * delete($table, $where, $limit = 1)
     * Delete a tablerow with the given argument
     * 
     * @param string $table Table to find
     * @param string $where The row that has to be deleted
     * @param intenger $limit The limit on executing the query
     * @return intenger Affected rows
     */
    
    public function delete($table, $where, $limit = 1){
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }
    /**
     * 
     * @param STRING $SQL Statement to use for deleting the data
     * @param STRING $where What rows need to be deleted
     * @return INT Affected rows
     */
    public function delete_multi($SQL, $where){
        return $this->exec("DELETE $SQL WHERE $where");
    }
} // End of class
