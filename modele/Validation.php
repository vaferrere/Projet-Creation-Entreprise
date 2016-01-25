<?php


class Validation {
    
    
    public static function cleanTab($tab)
    {
        $tabClean=array();
        
        foreach ($tab as $key => $value) 
        {
            $tabClean[$key] = self::cleanItem($value);
        }
        
        return $tabClean;
    }
    
    public static function cleanItem($var)
    {
        if (isset($var) && !empty($var))
            
                    return filter_var($var, FILTER_SANITIZE_STRING);
        
            else
                return "";
    }
    
    public static function validateTab($tab) 
    {
        $tabBool=array();
        
        foreach ($tab as $key => $value) 
        {
            $tabBool[$key] = self::validateItem($value, $key); 
        }
        
        return $tabBool;
    }
    
    public static function validateItem($var, $type)
    {
        
        $filter = false;
        
        switch ($type)
        {
            case 'commentaire':
            case 'objet':
            case 'name':
            case 'siege':
            case 'action':
                $filter = 1;
            break;
        
            case 'nom':
            case 'prenom':
                $exp = "#^[[:alpha:][:space:]-]+$#";
                $filter = preg_match($exp, $var);
            
                if($filter && (strlen($var)>30)){
                  $filter = 0;
                }
            break;
            
            case 'email':
                $filter = filter_var($var, FILTER_VALIDATE_EMAIL);
            break;
        
            case 'd_naissance':
           
                $exp_date = "/^\d{2}\/\d{2}\/\d{4}$/";

                $filter = preg_match($exp_date, $var);
            break;
            

            case 'login':
                $exp = "#^[[:alnum:]]+$#";
                $filter = preg_match($exp, $var);
            break;
        
            
            case 'password':
                $uppercase = preg_match('@[A-Z]@', $var);
                $lowercase = preg_match('@[a-z]@', $var);
                $number    = preg_match('@[0-9]@', $var);

                if(!$uppercase || !$lowercase || !$number || strlen($var) < 8) {
                    $filter=0;
                }
                else
                    $filter=1;
                
                
            break;
        }
       
        return $filter;
    }
}
?>