<html>
<head>
</head>
<body>
<div>
<form id="form1" name="bbapibbx" method="post" action="bbapi.bbx">
  
<table width="1024" border="0">
  <tr>
    <td colspan="3">API Credentials</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5">API Key
      <input type="text" name="STOREKEY" id="STOREKEY" value="ab4899ebcKK92211xP:)"/>
      UserName
      <input type="text" name="apiusername" id="apiusername" value="test"/><br/>
      Password
      <input type="test" name="apipassword" id="apipassword" value="test"/>
      ipaddress<input type="test" name="ipaddress" id="ipaddress"  value="<?php echo $_SERVER['REMOTE_ADDR'];?> "/>
      TIERKEY<input type="test" name="TIERKEY" id="TIERKEY" value="ab4899ebcKK92211xP:)"/><br/>
      AFFID<input type="test" name="AFFID" id="AFFID" value="ab4899ebcKK92211xP:)"/>
       SUBID<input type="test" name="SUBID" id="SUBID" value="ab4899ebcKK92211xP:)"/>
     IS TEST<input type="test" name="TEST" id="TEST" value="1"/>
    </td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>/td>
  </tr>
  <tr>
    <td colspan="2">Personal, Residential &amp; Contact Information </td>
    <td width="117" colspan="2">REQUESTED AMOUNT $<input type="text" name="REQUESTEDAMOUNT" id="REQUESTEDAMOUNT" value="500"/></td>
    <td width="224">&nbsp;</td>
    <td width="377" rowspan="39" valign="top"><textarea rows="60" cols="60" name="serverreponse" id="serverresponse"></textarea></td>
  </tr>
  <tr>
    <td width="84">&nbsp;</td>
    <td width="200">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>First Name </td>
    <td><input type="text" name="firstname" id="firstname" /></td>
    <td>Last Name</td>
    <td><input type="text" name="lastname" id="lastname" /></td>
    </tr>
  <tr>
    <td>DL#</td>
    <td><input type="text" name="driverslicense" id="driverslicense" /></td>
    <td>DL State</td>
    <td><input type="text" name="driverslicensestate" id="driverslicensestate" /></td>
    </tr>
  <tr>
    <td>DOB</td>
    <td><input name="dob_month" type="text" id="dob_month" size="4" maxlength="2" />
      /
      <input name="dob_day" type="text" id="dob_day" size="4" maxlength="2" />
      /
      <input name="dob_year" type="text" id="dob_year" size="4" maxlength="2" /></td>
    <td>SSN</td>
    <td><input type="text" name="ssn" id="ssn" /></td>
    </tr>
  <tr>
    <td>Address</td>
    <td><input type="text" name="address" id="address" /></td>
    <td>City</td>
    <td><input type="text" name="city" id="city" /></td>
    </tr>
  <tr>
    <td>State</td>
    <td>
    <!-- Without Codes -->
<select name="state">
    <option>Alabama</option>
    <option>Alaska</option>
    <option>Arizona</option>
    <option>Arkansas</option>
    <option>California</option>
    <option>Colorado</option>
    <option>Connecticut</option>
    <option>Delaware</option>
    <option>Florida</option>
    <option>Georgia</option>
    <option>Hawaii</option>
    <option>Idaho</option>
    <option>Illinois</option>
    <option>Indiana</option>
    <option>Iowa</option>
    <option>Kansas</option>
    <option>Kentucky</option>
    <option>Louisiana</option>
    <option>Maine</option>
    <option>Maryland</option>
    <option>Massachusetts</option>
    <option>Michigan</option>
    <option>Minnesota</option>
    <option>Mississippi</option>
    <option>Missouri</option>
    <option>Montana</option>
    <option>Nebraska</option>
    <option>Nevada</option>
    <option>New Hampshire</option>
    <option>New Jersey</option>
    <option>New Mexico</option>
    <option>New York</option>
    <option>North Carolina</option>
    <option>North Dakota</option>
    <option>Ohio</option>
    <option>Oklahoma</option>
    <option>Oregon</option>
    <option>Pennsylvania</option>
    <option>Rhode Island</option>
    <option>South Carolina</option>
    <option>South Dakota</option>
    <option>Tennessee</option>
    <option>Texas</option>
    <option>Utah</option>
    <option>Vermont</option>
    <option>Virginia</option>
    <option>Washington</option>
    <option>West Virginia</option>
    <option>Wisconsin</option>
    <option>Wyoming</option>
</select>

<!-- With Codes -->
<select name="state">
    <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="HI">Hawaii</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="IA">Iowa</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="LA">Louisiana</option>
    <option value="ME">Maine</option>
    <option value="MD">Maryland</option>
    <option value="MA">Massachusetts</option>
    <option value="MI">Michigan</option>
    <option value="MN">Minnesota</option>
    <option value="MS">Mississippi</option>
    <option value="MO">Missouri</option>
    <option value="MT">Montana</option>
    <option value="NE">Nebraska</option>
    <option value="NV">Nevada</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NY">New York</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="PA">Pennsylvania</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UT">Utah</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>
</select>
    
    </td>
    <td>Zip</td>
    <td><input type="text" name="zip" id="zip" /></td>
    </tr>
  <tr>
    <td>Length At Residence</td>
    <td><input name="lengthatresidenceyears" type="text" id="lengthatresidenceyears" size="4" maxlength="2" />
      years
      <input name="lengthatresidencemonths" type="text" id="lengthatresidencemonths" size="4" maxlength="2" />
      months</td>
    <td>Home Owner</td>
    <td><table width="200">
      <tr>
        <td><label>
          <input type="radio" name="isHomeowner" value="yes" id="isHomeowner_yes" />
          Yes</label></td>
        </tr>
      <tr>
        <td><label>
          <input type="radio" name="isHomeowner" value="no" id="isHomeowner_yes" />
          No</label></td>
        </tr>
    </table></td>
    </tr>
  <tr>
    <td>Email Address</td>
    <td><input type="text" name="email" id="email" /></td>
    <td>Home Phone</td>
    <td>(
      <input name="homephone_nxx" type="text" id="homephone_nxx" size="6" maxlength="3" />
      )
      <input name="homephone_npa" type="text" id="homephone_npa" size="6" maxlength="3" />
      -
      <input name="homephone_tbl" type="text" id="homephone_tbl" size="6" maxlength="4" /></td>
    </tr>
  <tr>
    <td>Mobile Phone</td>
    <td>(
      <input name="mobile_nxx" type="text" id="mobile_nxx" size="6" maxlength="3" />
)
<input name="mobile_npa" type="text" id="mobile_npa" size="6" maxlength="3" />
-
<input name="mobile_tbl" type="text" id="mobile_tbl" size="6" maxlength="4" /></td>
    <td>Work Phone</td>
    <td>(
      <input name="workphone_nxx" type="text" id="workphone_nxx" size="6" maxlength="3" />
      )
  <input name="workphone_npa" type="text" id="workphone_npa" size="6" maxlength="3" />
      -
  <input name="workphone_tbl" type="text" id="workphone_tbl" size="6" maxlength="4" />
      *
  <input name="workphone_ext" type="text" id="workphone_ext" size="6" maxlength="8" /></td>
    </tr>
  <tr>
    <td>Time to Call</td>
    <td><input type="text" name="besttimetocall" id="besttimetocall" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Employer &amp; Payday Information</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Employer Title</td>
    <td><input type="text" name="jobtitle" id="jobtitle" /></td>
    </tr>
  <tr>
    <td>Supervisor Name</td>
    <td><input type="text" name="supervisorname" id="supervisorname" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Supervisor Phone</td>
    <td><input type="text" name="SuperPhone" id="SuperPhone" /></td>
    <td>Length with Employer</td>
    <td><input name="lengthwithemployeryears" type="text" id="lengthwithemployeryears" size="4" maxlength="2" />
      years
      <input name="lengthwithemployermonths" type="text" id="lengthwithemployermonths" size="4" maxlength="2" />
      months</td>
    </tr>
  <tr>
    <td>Work Address</td>
    <td><input type="text" name="workaddress" id="workaddress" /></td>
    <td>City</td>
    <td><input type="text" name="workcity" id="workcity" /></td>
    </tr>
  <tr>
    <td>State</td>
    <td><input type="text" name="workstate" id="workstate" /></td>
    <td>Zip</td>
    <td><input type="text" name="workzip" id="workzip" /></td>
    </tr>
  <tr>
    <td>Military</td>
    <td><input type="text" name="ismilitary" id="ismilitary" /></td>
    <td>Income Type</td>
    <td><select name="incometype" id="incometype">
    </select></td>
    </tr>
  <tr>
    <td>Monthly Income</td>
    <td><input type="text" name="monthlyincome" id="monthlyincome" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Payment Frequency
      <select name="paymentfrequency" id="paymentfrequency">
      <option>Daily</option>
      <option>Weekly</option>
      <option>Monthly</option>
      <option>Quartly</option>
      <option>Annually</option>
      <option>Bi-Annually</option>
    </select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>1st Date of Pay</td>
    <td><input name="firstdateofpay_month" type="text" id="firstdateofpay_month" size="4" maxlength="2" />
/
  <input name="firstdateofpay_day" type="text" id="firstdateofpay_day" size="4" maxlength="2" />
/
<input name="firstdateofpay_year" type="text" id="firstdateofpay_year" size="4" maxlength="2" /></td>
    <td>2nd Date of Pay</td>
    <td><input name="seconddayofpay_month" type="text" id="seconddayofpay_month" size="4" maxlength="2" />
      /
      <input name="seconddayofpay_day" type="text" id="seconddayofpay_day" size="4" maxlength="2" />
      /
  <input name="seconddayofpay_year" type="text" id="seconddayofpay_year" size="4" maxlength="2" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Banking Information</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>Bank Name</td>
    <td><input type="text" name="bankname" id="bankname" /></td>
    <td>Account Type</td>
    <td><select name="accounttype" id="accounttype">
    <option name="checking" id="checking"></option>
    <option name="savings" id="savings"></option>
    </select></td>
    </tr>
  <tr>
    <td>ABA#</td>
    <td><input type="text" name="aba" id="aba" /></td>
    <td>Account#</td>
    <td><input type="text" name="accountnumber" id="accountnumber" /></td>
    </tr>
  <tr>
    <td>Direct Deposit</td>
    <td><table width="200">
      <tr>
        <td><label>
          <input type="radio" name="directdeposit" value="yes" id="directdeposit_yes" />
          Yes</label></td>
      </tr>
      <tr>
        <td><label>
          <input type="radio" name="directdeposit" value="no" id="directdeposit_no" />
          No</label></td>
      </tr>
    </table></td>
    <td>Account Age</td>
    <td><input name="accountageyears" type="text" id="accountageyears" size="2" maxlength="2" />
      years
      <input name="accountagemonths" type="text" id="accountagemonths" size="4" maxlength="2" />
      months</td>
    </tr>
  <tr>
    <td>Bank Phone</td>
    <td>(
      <input name="bankphone_npa" type="text" id="bankphone_npa" size="6" maxlength="3" />
)
<input name="bankphone_nxx" type="text" id="bankphone_nxx" size="6" maxlength="3" />
-
<input name="bankphone_tbl" type="text" id="bankphone_tbl" size="6" maxlength="4" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Personal References</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>First Name</td>
    <td><input type="text" name="referrencefirstname" id="referrencefirstname" /></td>
    <td>Last Name</td>
    <td><input type="text" name="referrencelastname" id="referrencelastname" /></td>
    </tr>
  <tr>
    <td>Relation Ship</td>
    <td><select name="refferencerelationship" id="refferencerelationship">
    <option>Relative</option>
    <option>Work Associate</option>
    <option>Friend</option>
    </select></td>
    <td>Phone</td>
    <td>(
      <input name="refference_npa" type="text" id="refference_npa" size="6" maxlength="3" />
      )
  <input name="refference_nxx" type="text" id="refference_nxx" size="6" maxlength="3" />
      -
  <input name="refference_tbl" type="text" id="refference_tbl" size="6" maxlength="4" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="Post to Black Box" /></td>
    <td><input type="submit" name="button2" id="button2" value="Add Record to Data Base" /></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</form>
</div>
</body>