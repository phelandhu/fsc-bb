<?php
session_start();
include("common/include/db_login.php");
mysql_connect($host, $user, $pass);
mysql_select_db($database);

/**\
 * Array ( [intention] => update 
 * [firstName] => Marion 
 * [lastName""] => Fullilove 
 * [EmailAddress] => mfuller@PlymothB2B.co 
 * [CellPhone] => 2147483647 
 * [Username_New] => test 
 * [Password_Old] => test 
 * [Password_New] => 
 * [Password_New_Confirmation] => 
 * [form] => member )
 * 
 * Array ( [intention] => save 
 * [active] => 1 
 * [Action_portfolio] => 1 
 * [CampaignName] => End Of Month 
 * [DefaultLeadProvider] => Harshaw 
 * [PurchasePrice] => 25 
 * [IntegrationDate] => 2012-07-30 
 * [Currency] => USD United States Dollars 
 * [form] => Campaigns )

\**/

file_put_contents("/tmp/stor.txt", print_r($_GET, true));

if(isset($_GET["form"]))
{
   
        if($_GET["form"] == "Campaigns")
        {
            $result_LEADPROVIDERID = mysql_query("SELECT LeadProviderID_Default FROM member WHERE username = '".$_SESSION["username"]."'");
         
            
                    if(mysql_num_rows($result_LEADPROVIDERID))
                    {
                            $row = mysql_fetch_array($result_LEADPROVIDERID);
                            $_SESSION["LeadProviderID"] = $row["LeadProviderID"];
                    }
            
                    mysql_connect($host, $user, $pass);
                    mysql_select_db($database);
            
            $active                 = mysql_real_escape_string($_GET["active"]);
            $Action_portfolio       = mysql_real_escape_string($_GET["Action_portfolio"]);
            $DefaultLeadProvider    = mysql_real_escape_string($_SESSION["LeadProviderID"]);
            $PurchasePrice          = mysql_real_escape_string($_GET["PurchasePrice"]);
            $IntegrationDate        = mysql_real_escape_string($_GET["IntegrationDate"]);
            $CampaignName           = mysql_real_escape_string($_GET["CampaignName"]);
            $Currency               = mysql_real_escape_string($_GET["Currency"]);
        
        
            //print_r($_GET);
            
            
            if($_GET["intention"] == "save")
            {
                    mysql_connect($host, $user, $pass);
                    mysql_select_db($database);
                    
                $sql = "SELECT `Name` FROM `Campaigns` WHERE `Name` = '".$CampaignName."';";
                $result342 = mysql_query($sql);
                
                 mysql_query($sql);
                 
               
                $num_rows = mysql_num_rows($result342);
                
                // print_r("---------------------------NUMBER OF ROWS --------------------".$num_rows);
                 
                if($num_rows >0)
                {
                    
                }else{

                         $sql = "INSERT INTO `Campaigns` (`CampaingnID`, `Active`, `Name`, `LeadProviderID`, `PurchasePrice`, `StartDate`, 
`Currency`) VALUES (NULL, '".$active."', '".$CampaignName."', '".$DefaultLeadProvider."', '".$PurchasePrice."', '".$IntegrationDate."', '".$Currency."');";
           // print_r($sql);
            mysql_query($sql);
                }
                
   
        
            }
            
			if($_GET["intention"] == "update")
            {
					$sql = "UPDATE `Campaigns` SET 
                     `Active` = '".$active."', 
                     `Name` = '".$CampaignName."', 
                     `LeadProviderID` = '".$DefaultLeadProvider."', 
                     `PurchasePrice` = '".$PurchasePrice."', 
                     `StartDate` = '".$IntegrationDate."', 
                     `Currency` = '".$Currency."' 
            		WHERE `Campaigns`.`Name` = '".$_SESSION["CampaignName"]."';";
                   // print_r($sql);
                     mysql_query($sql);
            }
            
            if($_GET["intention"] == "delete")
            {
                       $sql = "DELETE FROM `Campaigns` WHERE `Campaigns`.`Name` = '".$_SESSION["CampaignName"]."';";
                // print_r($sql);
                     mysql_query($sql);
            }

            
             
        }

    if($_GET["form"] =="member")
    {
   

         $table = $_GET["form"]; // Members name
         
        $username = mysql_real_escape_string($_GET['Username_New']);
        $password = hash('sha512', $_GET['Password_New']);
        $firstname = $_GET["firstName"];
        $lastname = $_GET["lastName"];
        $cellphone = $_GET["CellPhone"];
        $emailaddress = $_GET["EmailAddress"];
        
        $row ="";
        
        if($_GET['Password_New'] != "")
        {
            
        $sql = "UPDATE `member` SET 
            `username` = '".$username."', 
            `password` = '".$password."', 
            `FirstName` = '".$firstname."', 
            `LastName` = '".$lastname."', 
            `EmailAddress` = '".$emailaddress."', 
            `Cellphone` = '".$cellphone."' 
            WHERE `member`.`username` = '".$_SESSION["username"]."';";
        }else{
               $sql = "UPDATE `member` SET 
            `username` = '".$username."',  
            `FirstName` = '".$firstname."', 
            `LastName` = '".$lastname."', 
            `EmailAddress` = '".$emailaddress."', 
            `Cellphone` = '".$cellphone."' 
            WHERE `member`.`username` = '".$_SESSION["username"]."';";
            
        }


        mysql_query($sql);

    }
    
    
        if($_GET["form"] =="rulesmanagement")
        {        
			    
			$result_memberid = mysql_query("SELECT * FROM member WHERE username = '".$_SESSION["username"]."'");
			$row_member = mysql_fetch_array($result_memberid);

            if($_GET["intention"] == "save" && $_GET["RuleSetTitle"] != "")
            {
			print("Save and rules");             
             // print_r($_GET);
             
                $sql = "INSERT INTO `RulesManagementSet` (`RulesManagementSetID` ,`Title` ,`rulesID` ,`Active` ,`memberID`)VALUES ";
                $records ="";

                $array      = $_GET["rulesID"];
                $ruletitle  = $_GET["RuleSetTitle"]; 
                
                foreach ($array as $key => $value) 
                {
                    
                    $records .= "(NULL ,  '".$ruletitle."',  '".$key."',  '".$value."',  '".$row_member['id']."'),";
                    
                }
                
                $records = substr($records,0,-1).";";
                $querymultiple = $sql.$records;
	            print_r($querymultiple);
                mysql_query($querymultiple);
            }
            
            
            $records ="";
            
			if( $_GET["intention"] == "update" && $_GET["RuleSetTitle"] != "" )
			{			
				$result_memberid    = mysql_query( "SELECT * FROM member WHERE username = '".$_SESSION["username"]."'" );
				$row_member         = mysql_fetch_array( $result_memberid );
				$array      = $_GET["rulesID"];
				$ruletitle  = $_GET["RuleSetTitle"]; 
				//	RulesManagementSetID	Title	rulesID	Active	memberID
				$sql ="";
				foreach ($array as $key => $value) 
				{
					$sql = "UPDATE RulesManagementSet SET ";
					$sql .= "Active = ".$value." WHERE Title = '".$ruletitle."' AND rulesID = ".$key ."; \n";
					mysql_query($sql);
				}
				// print_r($sql);
            }
        }
    
}
?>
