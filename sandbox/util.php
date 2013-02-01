<?php
// util.php
/***********************************************
* Created:            Jan 30, 2013 1:31:40 PM
* Last Modified:      Jan 30, 2013 1:31:40 PM
*
* For the most part this will be a utility file to do things I need on the site and to the DB
*
* Mike Browne - mbrowne@cantorgaming.com
***********************************************/
require_once("../bootstrap.php");
$qryLoop = "SELECT rulesID from rules";
$result = $mysqli->query($qryLoop);

while ($row = $result->fetch_assoc()){
	$sql = sprintf("UPDATE rules AS t1,
			(
			SELECT Title FROM rules WHERE rulesID = %s) AS t2
			SET t1.ruleShortName = t2.Title
			WHERE t1.rulesID = %s;",$row["rulesID"],$row["rulesID"]);
	$mysqli->query($sql);
	
	$sql = sprintf("UPDATE rules AS t1,
			(
			SELECT RuleDescription FROM rules WHERE rulesID = %s) AS t2
			SET t1.Title = t2.RuleDescription
			WHERE t1.rulesID = %s;",$row["rulesID"],$row["rulesID"]);
	$mysqli->query($sql);
	echo $row["rulesID"], "\n";
}