<?php
// working on line 557
date_default_timezone_set('UTC');
      
class BBCORE
{
	//BBCORE data members
	
	var $host;
	var $pass;
	var $database;
	var $persistent=0;
	var $last_query;
	var $result;
	var $connection_id;
	var $num_queries=0;
	//GET OR POST STORED HERE
	private $LeadPacket;
	private $RuleSet;
	
	//LEAD DATA FIELDS
	private $amount;
	private $address1;
	private $address2;
	private $city;
	private $state;
	private $zip_code;
	private $time_at_residence;
	private $home_status;
	private $ssn;
	private $dob;
	private $phone_home;
	private $phone_cell;
	private $best_time_to_call;
	private $employer;
	private $job_title;
	private $employer_city;
	private $employer_state;
	private $employer_zip;
	private $phone_work;
	private $income_type;
	private $income_monthly;
	private $employed_months;
	private $payday_next;
	private $payday_following;
	private $pay_frequency;
	private $bank_name;
	private $routing_number;
	private $acct_number;
	private $time_at_bank;
	private $drivers_license;
	private $drivers_state;
	private $account_type;
	private $direct_deposit;
	private $reference_first;
	private $reference_last;
	private $reference_relationship;
	private $reference_phone;
	private $first_name;
	private $last_name;
	private $military;
	private $email_address;
	private $ip_address;
	private $campign_id;
	private $ckm_key;
	
	private $Field;
	private $Field_Required;
	private $Field_length;
	private $Field_Validation;
	private $Field_rules;
	private $Field_Errors;
	
	private $subject;
	private $value;

	public function __construct($LeadPacket,$RuleSet, $connectData) 
	{
		$this->configure( 'localhost' , 'root' , 'Keyb0ard!' , 'BlackBox' , 0 );
		
		$this->configure($connectData["hostName"], $connectData["userName"], $connectData["passWord"], $connectData["dataBase"], 0);
		
		include("keypairs_Fields_Required.php");
		include("keypairs_Fields.php");
		include("keypairs_length.php");
		include("Field_RuleSet.php");
		
		$this->LeadPacket           = $LeadPacket;              //POST | GET DATA
		$this->RuleSet              = $RuleSet;                 //ACTIVE RULE SET SCUBED FROM DATA BASE
		$this->Field               = $Field;                   //LIST OF REQUIRED AND OPTION FIELDS
		$this->Field_length        = $Field_length;            //MAXIMUM FIELD(S) LENGTH ;
		$this->Field_rules         = $Field_rules;
		$this->Field_Required      = $Field_Required;
		
		$this->RequirementCheck_FieldsLength( $this->Field_length, $this->LeadPacket );
		// $this->RequirementCheck_Fields( $this->Field ,$this->LeadPacket );
		
		$this->RequirementCheck_FieldsValidation( $this->Field_Required, $this->LeadPacket );
		$this->RequirementCheck_FieldRules( $this->LeadPacket,$this->RuleSet  );
		
		if(strlen($this->Field_Errors)==0)
		{
			$this->Field_Errors .= "<error><code>1</code><msg>OK</msg></error>";
			print_r($this->Field_Errors);
			$this->dBinsert($this->LeadPacket,$this->Field_Errors,"1");	
		} else {
			print_r($this->Field_Errors);
		}
	}
    

	private function RequirementCheck_FieldRules($array_Fields,$RuleSet)
	{
		echo "<RequirementCheck_FieldRules>";
		//print_r($RuleSet);
		//print_r( $array_Fields );
		
		foreach($RuleSet as $array) {
			$function = $array['PHPLocation'];
			$value = $array['value'];
			$subject = strtoupper($array['FieldName']);
			$code = "";
			if(strtoupper($value) == 'Errors') {
				//print_r($function ." ".$array_Fields[$subject]);
				$this->value = $array_Fields[$subject];
				$code = $this->$function($this->value);
			} else {
				$this->value = $array_Fields[$subject];
				$code = $this->$function($this->value,$value);
			}
			
			print_r("<inlinefunctioncall>");
			print_r($function);
			print_r("<value>");
			print_r($code);
			print_r("</value>");
			
			print_r("<fieldname>");
			print_r($subject);
			print_r("</fieldname>");
			print_r("</inlinefunctioncall>");
			if($code != '1') {
				$this->Field_Errors .= "<error><code>".$code."</code><msg>Required Field: [".$subject."] Failed Ruleset Validation | Reason The Value of [".$subject."] Contained '".$value."'</msg></error>";
			} else {
			}
			//$this->Field_Errors .= "<error><code>0</code><msg>"."Required Field: ".$value." Not Found</msg></error>";
		}
		echo "</RequirementCheck_FieldRules>";
	}
    private function dBinsert($array, $Field_Errors, $CODE)
    {
        $sql = "Insert into `BlackBox`.`Transactions_Leads` ";
        $columns = "(`LeadsTransaction_PASSID`, ";
        $values = ") VALUES(NULL, "; 
       // print_r("<dbcolumnsAndValues>hello ".$array."</dbcolumnsAndValues>");
        foreach ($array as $key=>$value) {
            $columns .= "`".mysql_real_escape_string($key)."`, ";
            $values .= "'".mysql_real_escape_string($value)."', ";
        }
        $sql .= $columns."`DATETIME`, `RESULTS`, `CODE`".$values." NULL, '".$Field_Errors."', '".$CODE."');";
        //print_r("<sql>".$sql."</sql>");
        $this->connect();
        mysql_query($sql);
    }
    
	private function RequirementCheck_FieldsValidation($array_Fields,$array_GETPOST)
	{
		foreach($array_Fields as $Key=>$value) {
			if (isset($array_GETPOST[$Key]) || array_key_exists($value,$array_GETPOST)) {
				//echo("Required $value Field Found");
			} else {
				$this->Field_Errors .= "<error><code>0</code><msg>"."Required Field: ".$value." Not Found</msg></error>";
				// print_r($this->Field_Errors);
			}
		}
	}
        
	private function RequirementCheck_Fields($array_Fields,$array_GETPOST)
	{
		foreach($array_GETPOST as $key=>$value) {
			$this->value = $array_GETPOST[$key];
			$inline_function = $array_Fields[$key];
			$value =$this->$inline_function();
			//  print_r("<inlinefunctioncall>");
			//  print_r($key."||".$this->value);
			//  print_r("<value>");
			//      print_r($value);
			//      print_r("</value>");
			//      print_r("<return_value>");
			//     print_r($value);
			//     print_r("</return_value>");
			
			//            print_r("<fieldname>");
			//   print_r($key);
			//  print_r("</fieldname>");
			//  print_r("</inlinefunctioncall>");
			if($value == '1')
			{
				//print_r($value. "  |  " );
			} else {
				// $this->Errors_Logged("0","Field $key Invalidformatte result code ".$value);
				$this->Field_Errors .= "<error><code>0</code><msg>"."Field $key Invalidformatte result code ".$value."</msg></error>";
			}
		}
	}
    
	private function RequirementCheck_FieldsLength($array_Fields,$array_GETPOST)
	{
		// print_r("<fieldlength>");
		// print_r($array_Fields);
		//  print_r("</fieldlength>");
		print_r($array_Fields);
		foreach($array_GETPOST as $key) {
			if(  strlen($array_GETPOST[strtoupper($key) ]) > intval($array_Fields[strtoupper ($key)] ) ) {
				// $this->Errors_Logged("0","Field Execeeds maximum length allowed for ".$key.intval($array_Fields[strtoupper ($key)] ));
				$this->Field_Errors .= "<error><code>0</code><msg>"."Field Execeeds maximum length allowed for ".$key.intval($array_Fields[strtoupper ($key)] )."</msg></error>";
			}
		}
	}
 
    private function mapdata()
    {
        
    }
    
    private function validate_alphaNumeric()  
    {  
		$value = 0;
		if(preg_match("/^[A-Za-z0-9_- ]+$/", $this->value ) || is_numeric($this->value )) {
			$value =1;
		} else {			 
			$value =0;
		}   
		return $value;
    }
    
    private function Valid_FeildLength($size)
    {
        $resultvalue = false;
        if(strlen($this->value) != $this->subject && $this->subject != 0) {
            if(strlen($this->value) > $this->esubject ) {
            	$resultvalue = false;   
            }else{
            	$resultvalue = true;     
            }
            return $resultvalue;
        }

        if(strlen($this->value) <= $this->subject && $this->subject != 0) {

            $resultvalue = true;
        }

        if($size == 0)
        {
         $resultvalue = true; 
        }
		return $resultvalue; 
	}
    
    private function Validate_isText() 
    {
        $value = false; 
        ///[\s]+/
        if( preg_match('/[^a-z0-9 ]/i', $this->value) || preg_match('/^[A-Za-z\s]+$/', $this->value) ) {
            $value= 1;
        } else {
            $value = 0;

        }
        return  $value;
    }
    
    private function isRealNumber()
    {  
		return ( is_numeric($this->value));
    }

    private function validate_isTrue($value)
    {
        $this->value = $value;
        if($value == '1') {
			$value = '0';
        } else {
			$value = '1';
        }
        return( $value );
    }
    
    private function validate_isFalse($value)
    {
		$this->value = 0;
		if($this->value == '1') {
			$value = 1;
		} else {   
			$value = 0;
		}
		return( $value );
    }
    
    private function validate_text_contains($subject,$str)
    {
        $value = 0;
        if (!preg_match("/\b".$str."\b/i", $subject)) { 
        	$value = 1; 
        } else { 
        	$value = 0; 
        } 
        return($value);
    }
    
    private function validate_text_notContains()
    { 
        $matches ="";
        if( !preg_match($this->value,  $this->subject, $matches)) {
        	return(false);
        } else {
            return(true);
        }
    }

    private function validate_date_greaterOrEqual($startDate,$endDate,$value)
    {
        $eval = date('d',strtotime("$endDate") - strtotime("$startdate"));
        if($eval >= $value) {
            return true;
        } else {
            return false;
        }
    }
    
    private function validate_date_lesserOrEqual($startDate,$endDate,$value)
    {
        $eval = date('d',strtotime("$endDate") - strtotime("$startdate"));
        if($eval <= $value) {
            return true;
        } else {
            return false;
        }
    }
    
    function validate_date_xdaysGreater($str,$subject)
    {
      
       $value = "0";
       $year2days =  30*$subject ;
       
       //print_r(" ".$year2days);
        if( intval($str) < intval($year2days) ) {
            $value = "1";   
        } else {
            $value = "0";
        }
        return( $value );
    }
    
    function validate_date_daysGreaterByYear($str,$subject)
    {  
       $value = "0";
       $year2days = floor( 360 *$subject);
       //print_r(" ".$year2days);
        if( intval($str) > intval($year2days) ) {
            $value = "1";
        }else{
            $value = "0";
        }
        return( $value );
    }
    
    private function validate_date_greater($str,$subject)
    {
		$value = "0";
		$now = time(); // or your date as well
		$date = strtotime("2012-07-14");
		$datediff = abs($your_date - $now  );
		$dayscompare = floor($datediff/(60*60*24));		
		$datediff = abs($date - $compare  );
        if( intval($dayscompare) > intval($subject) ) {
            $value = "1";
        }else{
            $value = "0";
        }
        return( $value );
    }
    
    
    
	private function validate_date_isHoliday_noparam()
	{
		$year = substr($date, 0, 4); 
		switch($date) {
			
			case $year.'-01-01':
				$holiday = '1';
				break;
			
			case $year.'-01-16':
				$holiday = '1';
				break;
			
			case $year.'-02-20':
				$holiday = '1';
				break;
			
			case $year.'-05-28':
				$holiday = '1';
				break;
			
			case $year.'-07-04':
				$holiday = '1';
				break;
			
			case $year.'-09-03':
				$holiday = '1';
				break;
			
			case $year.'-10-08':
				$holiday = '1';
				break;
			
			case $year.'-11-12':
				$holiday = '1';
				break;
			
			case $year.'-07-22':
				$holiday = '1';
				break;
			
			case $year.'-12-25':
				$holiday = '1';
				break;
			
			default:
				$holiday = '0';
		}
		return $holiday;        
    }


    private function validate_date_isHoliday($date)
    {
        
		$year = substr($date, 0, 4); 
		switch($date) {
			case $year.'-01-01':
				$holiday = '0';
			break;
			
			case $year.'-01-16':
				$holiday = '0';
			break;
			
			case $year.'-02-20':
				$holiday = '0';
			break;
			
			case $year.'-05-28':
				$holiday = '0';
			break;
			
			case $year.'-07-04':
				$holiday = '0';
			break;
			
			case $year.'-09-03':
				$holiday = '0';
			break;
			
			case $year.'-10-08':
				$holiday = '0';
			break;
			
			case $year.'-11-12':
				$holiday = '0';
			break;
			
			case $year.'-07-22':
				$holiday = '0';
			break;
			
			case $year.'-12-25':
				$holiday = '0';
			break;
			
			default:
				$holiday = '1';
		}
		return $holiday;
    }
    
    private function validate_date_isWeekday()
    {
        
    }
    
    private function validate_date_isWeekEnd($date)
    {
        $date1 = strtotime($date);
        $date2 = date("l", $date1);
        $date3 = strtolower($date2);
        if(($date3 == "saturday" )|| ($date3 == "sunday")){
            return("0");
        } else {
			return("1");
        }
    }
    

    
	private function validate_date_lesser( $startDate,$endDate,$value )
    {
        $eval = date( 'd',strtotime($endDate) - strtotime($startDate) );
        if($eval <= $value)
        {
            return true;
        }else{
            return false;
        }
    }
    
    private function validate_date_equal($startDate,$endDate,$value)
    {
        $eval = date('d',strtotime("$endDate") - strtotime("$startdate"));   
        if($eval == $value)
        {
            return true;
        }else{
            return false;
        }
    }
    

    
    private function validate_numeric_equalEqualTo($subject, $str )
    {
		$value = "0";      
        if( intval($str) == intval($subject) ) {
            $value = "1";
        } else {
            $value = "0";
        }
        return( $value );
    }
    
	private function validate_numeric_equalEqualTo_CharCount($subject, $str )
    {
		$value = "0";
        if(  $str == strlen($subject) ) {
            $value = "1";
        } else {
            $value = "0";
        }
        return( $value );
    }

    private function validate_numeric_greater()
    {
        
    }
    
    private function validate_numeric_greaterThanEqualTo($subject, $str )
    {
		$value = "0";
		print_r("<teststuff>");
		print_r("str is:".$str);
		print_r("||");
		print_r("subject is:".$this->value);
		print_r("</teststuff>");
     
        if(  $this->value  >= $str  )
        {            
            $value = "1";
        }else{
            $value = "0";
        }
        return( $value );
    }
    
    
    
    private function validate_numeric_lesser( $subject, $str )
    {
        
        $value = "0";
        
        if( intval( $str ) < intval( $subject ) && intval( $str ) == intval( $subject ) )
        {
            
            $value = "1";
            
        }else{
            
            $value = "0";
        }
        
        return( $value );
    }
    
    private function validate_Data_Exist()
    {
        
    }
    private function Date_mmddyyyy()
    {
	    //01/01/1900 through 12/31/2099
	    //Matches invalid dates such as February 31st
        $value = 0;
        //"/(?[0-9]{2})([0-9]{2})([0-9]{4})/"
        if(preg_match('/^(\d{2})-(\d{2})-(\d{4})$/',$this->value))
        {
 
              $value = 1;
        }else{
              $value = 0;
        }
    	return   $value ;
    }
    
    private function Date_yyyymmdd()
    {
    //1900-01-01 through 2099-12-31
    //Matches invalid dates such as February 31st
 
    
        //Matches invalid dates such as February 31st
        $value = 0;
        //"/(?[0-9]{2})([0-9]{2})([0-9]{4})/"
        
        if( !preg_match('(19|20)[0-9]{2}[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])',$this->value))
        {
 
              $value = 1;
        }else{
              $value = 0;
        }
    return   $value ;
    
    
    
    }
    
    private function validate_state()
    {
    	$value = false;
        if(preg_match('/\\b(?:A[KLRZ]|C[AOT]|D[CE]|FL|GA|HI|I[ADLN]|K[SY]|LA|M[ADEINOST]|N[CDEHJMVY]|O[HKR]|PA|RI|S[CD]|T[NX]|UT|V[AT]|W[AIVY])\\b/', $this->value ))
        {
           $value = 1;
        }else
            {
            $value = 0;
            }
    	return  $value;
    }

    private function validate_zip()  
    {  
        $value = '0';
        if(preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $this->value ))
        {
            $value = '1';
        }else
            {
            $value= '0';
            }
        return $value;  
    }
    
    private function validate_emptyData()
    {
        if(empty($this->value)){
            return true;
        }else{
            return false;
        }
    }
    
    private function validate_url()  
    {  
    	return preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $this->value);  
    }

    private function PhoneNumberNorthAmericaNXXNPATB()
    {

    //Matches 3334445555, 333.444.5555, 333-444-5555, 333 444 5555, (333) 444 5555 and all combinations thereof.
    //Replaces all those with (333) 444-5555
        $value = false;
        if(preg_match('/^\d{3}\d{3}\d{4}$/', $this->value))
        {
            $value = 1;

        }else{

            $value =0;
        }

        return  $value;


    }
    
    private function validate_Bank_ABA()
    {
        if (preg_match('/^\d{9}$/', $this->value))
        {
            return(true);
        }else{
            return(false);
        }
    }
    
    private function validate_Bank_AccountNumber()
    {
        if (preg_match('/^\d{12}$/', $this->value))
        {
            return(true);
        }else{
            return(false);
        }
    }
    
    private function validate_StreetAddress()
    {
	    $value = false;
	    if(!preg_match('%[^0-9A-Za-z .,\-#/]%', $this->value))
	    {
	         $value = 1;
	    }else{
	         $value = 0;
	    }
	    
	    return  $value;
    }

    private function validate_email()  
    {  
	    $value = 0;
	    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $this->value))  
	    {  
	            $value =  1;  
	    }else{
	        
	        $value = 0;
	    }
	    return $value;  
    }

    private function validate_None()
    {
        
            return true;
       
    }
    
    private function Errors_Logged($code,$msg)
    {
       $this->Field_Errors .= "<error><code>".$code."</code><msg>".$msg."</msg></error>";
    }
    
    private function Errors_Display()
    {
        if(strlen($this->Field_Errors)==0)
        {
             $this->Field_Errors .= "<error><code>1</code><msg>OK</msg></error>";
             print_r($this->Field_Errors);
        }else{
              print_r($this->Field_Errors);
        }
       
    }
    
	function configure($host, $user, $pass, $database, $persistent=0)
	{
		$this->host=$host;
		$this->user=$user;
		$this->pass=$pass;
		$this->database=$database;
		$this->persistent=$persistent;
		return 1; //Success.
	}
   
	function connect()
	{
		if(!$this->host) { $this->host="localhost"; }
		if(!$this->user) { $this->user="root"; }
		if($this->persistent) {
			$this->connection_id=mysql_pconnect($this->host, $this->user, $this->pass) or $this->connection_error();
		} else {
			$this->connection_id=mysql_connect($this->host, $this->user, $this->pass, 1) or $this->connection_error();
		}
		mysql_select_db($this->database, $this->connection_id);
		return $this->connection_id;
	}
    
}
?>