<?php
   function validate_date_daysGreater($str,$subject)
    {
      
       $value = "0";
       $year2days =  30*$subject ;
       
      print_r(" ".$str." ".$subject);
        if( intval($str) > intval($year2days) )
        {
            
            $value = "1";
            
        }else{
            
            $value = "0";
        }
        
        return( $value );
    }
$result = validate_date_daysGreater("60","3");

echo $result;
?>

