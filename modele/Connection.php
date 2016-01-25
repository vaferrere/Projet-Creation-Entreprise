<?php



class Connection extends PDO{
    private $stmt;
    
    public function __construct(){
       
        parent::__construct('mysql:host=localhost;dbname=rss','root','');

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    
    
    public function executeQuery($query, $parameters){
        
        $this->stmt = parent::prepare($query);
      
        
        if(!empty($parameters))
        {
            foreach ($parameters as $name => $value){
               
                $this->stmt->bindValue($name, $value[0], $value[1]);
               
            }
        }
        
     
        return $this->stmt->execute();
    }
    
    public function getResult(){
      
        return $this->stmt->fetchall();
         
    }
    
}
