<?php
session_start();
include("common/include/db_login.php");
include("include/inc.countryCurrency.php");
$table = 'Campaigns'; // Members name
$row ="";
 
    mysql_connect($host, $user, $pass);
    mysql_select_db($database);

 $result = mysql_query("SELECT LeadProviderID_Default FROM member WHERE username = '".$_SESSION["username"]."'");
     $leadprov = mysql_fetch_array($result) ;
    
     $SQL = "SELECT * FROM  `LeadProvider` WHERE `LeadProviderID` = '".$leadprov["LeadProviderID_Default"]."';";
     $leadprovNameResult = mysql_query($SQL);
     
      $leadprovName = mysql_fetch_array($leadprovNameResult) ;

     mysql_connect($host, $user, $pass);
     mysql_select_db($database);
     



if(isset($_GET["Campaigns"]))
{

$Campaigns = mysql_real_escape_string($_GET['Campaigns']);

$resultcamp = mysql_query("SELECT * FROM $table WHERE Name = '$Campaigns'");


        if(mysql_num_rows($resultcamp ))
        {
           $row = mysql_fetch_array($resultcamp ) ;
          
            
          
            $_SESSION["CampaignName"] = $row["Name"];
      
        }else
            {

            
            }
            /****\
            mysql_connect($host, $user, $pass);
mysql_select_db($database);
$sql = "UPDATE `BlackBox`.`member` SET `LeadProviderID_Default` = '".$row["LeadProviderID"]."' WHERE `member`.`username` = '".$_SESSION["username"]."';";
 mysql_query($sql);
 \*****/
 
}else{
    

}




?>

<div>
    
<div style="color:#359ed5;font-size: 2em">
 Campaigns
</div>
    
<div style="color:#555;font-size: 1em">
</div>
    
    <div>
        
        <table CELLSPACING=5 style="padding: 10px; width:690px">
            <tr>
                <td> 
                <table >
               <tr> <td>
                       <?php
                     
                       if($row["Active"] == 1)
                       {
                           echo("Active <input type=\"checkbox\" name=\"active\" id=\"active\" value=\"1\" checked=\"checked\"/>");
                       } else{
                           echo("Active <input type=\"checkbox\" name=\"active\" id=\"active\" value=\"0\" />");
                       }                      
                       ?>
                       </td><td>
                      
                         <?php
                       
                       if($row["Active"] == 0)
                       {
                          // echo("Inactive <input type=\"radio\" name=\"Action_portfolio\" id=\"active\" value=\"0\" checked=\"checked\"/>");
                       } else{
                          // echo("Inactive <input type=\"radio\" name=\"Action_portfolio\" id=\"active\" value=\"0\" />");
                       }                      
                       ?>
                       </td></tr>
                
                </table>
              </td><td> </td>
            </tr>
            <tr>
                  
            
                
            </tr>
             <tr>
                <td>Campaign Name</td><td>Default Lead Provider</td>
             
            </tr>
              <tr>
           
                <td>
                    
                    <input  type="text"  name="CampaignName" value="<?php echo $_SESSION["CampaignName"] ?>" required="true" data-dojo-type="dijit.form.ValidationTextBox"  data-dojo-props="trim:true, propercase:true" id="CampaignName"/>
                </td>
                
                <td>
                    <input type="text" disabled="disabled" id="DefaultLeadProviderName" name="DefaultLeadProviderName" value="<?php echo $leadprovName["CompanyName"] ?>" />
                    <input type="hidden" id="DefaultLeadProvider" name="DefaultLeadProvider" value="<?php echo $leadprov["LeadProviderID_Default"] ?>" /> 
                
                
                </td>
                
            </tr>
             <tr>
                <td>Purchase Price</td><td>Start Date </td>
             
             </tr>
             <tr>
                <td>
       
                    <input type="text" name="PurchasePrice" id="PurchasePrice" value="<?php echo $row["PurchasePrice"] ?>" required="true"
    data-dojo-type="dijit.form.ValidationTextBox"
    data-dojo-props="regExp:'[\\d{10}][\\dw]+', invalidMessage:'Integer Amounts only'" />
                </td><td>
                    <input type="text" name="IntegrationDate" id="IntegrationDate" value="<?php echo $row["StartDate"] ?>"       dojoType="dijit.form.DateTextBox"
        required="true" />
                    
                </td>
            </tr>
            <tr>
                <td>Currency</td><td></td>
            </tr>
            <tr>
                <td>
                    
                                       <select id="Currency">
    <option selected="selected" value="USD United States Dollars">
        USD United States Dollars
    </option>
    <option>
        EUR Euro
    </option>
    <option value="CAD Canada Dollars">
        CAD Canada Dollars
    </option>
    <option>
        GBP United Kingdom Pounds
    </option>
    <option>
        DEM Germany Deutsche Marks
    </option>
    <option>
        FRF France Francs
    </option>
    <option>
        JPY Japan Yen
    </option>
    <option>
        NLG Netherlands Guilders
    </option>
    <option>
        ITL Italy Lira
    </option>
    <option>
        CHF Switzerland Francs
    </option>
    <option>
        DZD Algeria Dinars
    </option>
    <option>
        ARP Argentina Pesos
    </option>
    <option>
        AUD Australia Dollars
    </option>
    <option>
        ATS Austria Schillings
    </option>
    <option>
        BSD Bahamas Dollars
    </option>
    <option>
        BBD Barbados Dollars
    </option>
    <option>
        BEF Belgium Francs
    </option>
    <option>
        BMD Bermuda Dollars
    </option>
    <option>
        BRR Brazil Real
    </option>
    <option>
        BGL Bulgaria Lev
    </option>
    <option>
        CAD Canada Dollars
    </option>
    <option>
        CLP Chile Pesos
    </option>
    <option>
        CNY China Yuan Renmimbi
    </option>
    <option>
        CYP Cyprus Pounds
    </option>
    <option>
        CSK Czech Republic Koruna
    </option>
    <option>
        DKK Denmark Kroner
    </option>
    <option>
        NLG Dutch Guilders
    </option>
    <option>
        XCD Eastern Caribbean Dollars
    </option>
    <option>
        EGP Egypt Pounds
    </option>
    <option>
        EUR Euro
    </option>
    <option>
        FJD Fiji Dollars
    </option>
    <option>
        FIM Finland Markka
    </option>
    <option>
        FRF France Francs
    </option>
    <option>
        DEM Germany Deutsche Marks
    </option>
    <option>
        XAU Gold Ounces
    </option>
    <option>
        GRD Greece Drachmas
    </option>
    <option>
        HKD Hong Kong Dollars
    </option>
    <option>
        HUF Hungary Forint
    </option>
    <option>
        ISK Iceland Krona
    </option>
    <option>
        INR India Rupees
    </option>
    <option>
        IDR Indonesia Rupiah
    </option>
    <option>
        IEP Ireland Punt
    </option>
    <option>
        ILS Israel New Shekels
    </option>
    <option>
        ITL Italy Lira
    </option>
    <option>
        JMD Jamaica Dollars
    </option>
    <option>
        JPY Japan Yen
    </option>
    <option>
        JOD Jordan Dinar
    </option>
    <option>
        KRW Korea (South) Won
    </option>
    <option>
        LBP Lebanon Pounds
    </option>
    <option>
        LUF Luxembourg Francs
    </option>
    <option>
        MYR Malaysia Ringgit
    </option>
    <option>
        MXP Mexico Pesos
    </option>
    <option>
        NLG Netherlands Guilders
    </option>
    <option>
        NZD New Zealand Dollars
    </option>
    <option>
        NOK Norway Kroner
    </option>
    <option>
        PKR Pakistan Rupees
    </option>
    <option>
        XPD Palladium Ounces
    </option>
    <option>
        PHP Philippines Pesos
    </option>
    <option>
        XPT Platinum Ounces
    </option>
    <option>
        PLZ Poland Zloty
    </option>
    <option>
        PTE Portugal Escudo
    </option>
    <option>
        ROL Romania Leu
    </option>
    <option>
        RUR Russia Rubles
    </option>
    <option>
        SAR Saudi Arabia Riyal
    </option>
    <option>
        XAG Silver Ounces
    </option>
    <option>
        SGD Singapore Dollars
    </option>
    <option>
        SKK Slovakia Koruna
    </option>
    <option>
        ZAR South Africa Rand
    </option>
    <option>
        KRW South Korea Won
    </option>
    <option>
        ESP Spain Pesetas
    </option>
    <option>
        XDR Special Drawing Right (IMF)
    </option>
    <option>
        SDD Sudan Dinar
    </option>
    <option>
        SEK Sweden Krona
    </option>
    <option>
        CHF Switzerland Francs
    </option>
    <option>
        TWD Taiwan Dollars
    </option>
    <option>
        THB Thailand Baht
    </option>
    <option>
        TTD Trinidad and Tobago Dollars
    </option>
    <option>
        TRL Turkey Lira
    </option>
    <option>
        GBP United Kingdom Pounds
    </option>
    <option>
        USD United States Dollars
    </option>
    <option>
        VEB Venezuela Bolivar
    </option>
    <option>
        ZMK Zambia Kwacha
    </option>
    <option>
        EUR Euro
    </option>
    <option>
        XCD Eastern Caribbean Dollars
    </option>
    <option>
        XDR Special Drawing Right (IMF)
    </option>
    <option>
        XAG Silver Ounces
    </option>
    <option>
        XAU Gold Ounces
    </option>
    <option>
        XPD Palladium Ounces
    </option>
    <option>
        XPT Platinum Ounces
    </option>
</select>
              
                    
                </td><td><input type="hidden" name="form" id="form" value="Campaigns"/></td>
                </tr>
</table>
</div>
</div>
