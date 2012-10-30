-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 20, 2012 at 11:19 PM
-- Server version: 5.1.63
-- PHP Version: 5.3.2-1ubuntu4.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BlackBoxDev`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bankinginformation`
--

CREATE TABLE IF NOT EXISTS `Bankinginformation` (
  `BankinginformationID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonalinformationID` int(11) NOT NULL,
  `ACCOUNTHOLDER` varchar(100) NOT NULL,
  `BANKNAME` varchar(50) NOT NULL,
  `BANKPHONE` varchar(13) NOT NULL,
  `ACCOUNTTYPE` varchar(11) NOT NULL,
  `ROUTINGNUMBER` varchar(9) NOT NULL,
  `ACCOUNTNUMBER` varchar(17) NOT NULL,
  `BANKMONTHS` int(2) NOT NULL,
  `BANKYEARS` int(2) NOT NULL,
  `OUTSTANDINGAMT` int(11) NOT NULL,
  `ACTIVECHECKING` int(11) NOT NULL,
  PRIMARY KEY (`BankinginformationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `Bankinginformation`
--


-- --------------------------------------------------------

--
-- Table structure for table `Campaigns`
--

CREATE TABLE IF NOT EXISTS `Campaigns` (
  `CampaingnID` int(11) NOT NULL AUTO_INCREMENT,
  `Active` int(1) NOT NULL,
  `Name` varchar(64) NOT NULL,
  `LeadProviderID` int(11) NOT NULL,
  `PurchasePrice` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `Currency` varchar(3) NOT NULL,
  PRIMARY KEY (`CampaingnID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `Campaigns`
--

INSERT INTO `Campaigns` (`CampaingnID`, `Active`, `Name`, `LeadProviderID`, `PurchasePrice`, `StartDate`, `Currency`) VALUES
(0, 0, 'MID-Month', 0, 18, '2012-06-15', 'USD'),
(23, 1, 'Start Of Month 3', 0, 12, '2012-06-15', 'USD'),
(24, 0, 'Start Of Month', 0, 12, '2012-06-15', 'USD'),
(25, 1, 'End of business', 0, 56, '2012-06-15', 'USD'),
(26, 0, 'Mike Test', 0, 5, '2012-07-31', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `LeadProvider`
--

CREATE TABLE IF NOT EXISTS `LeadProvider` (
  `LeadProviderID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(64) NOT NULL,
  `PrimaryPhoneNumebr` varchar(16) NOT NULL,
  `TechnicalPOCName` varchar(64) NOT NULL,
  `TechnicalPOCEmailAddress` varchar(256) NOT NULL,
  `SalesPOCName` varchar(256) NOT NULL,
  `SalesPOCEmailAddress` varchar(256) NOT NULL,
  `IntegrationDate` date NOT NULL,
  `APIField1` varchar(256) NOT NULL,
  `APIField2` varchar(256) NOT NULL,
  `SendingURL` varchar(512) NOT NULL,
  PRIMARY KEY (`LeadProviderID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `LeadProvider`
--

INSERT INTO `LeadProvider` (`LeadProviderID`, `CompanyName`, `PrimaryPhoneNumebr`, `TechnicalPOCName`, `TechnicalPOCEmailAddress`, `SalesPOCName`, `SalesPOCEmailAddress`, `IntegrationDate`, `APIField1`, `APIField2`, `SendingURL`) VALUES
(2, 'Montgomery', '8082840599', 'Kevin Heart', 'KHeart@MontgomeryCredit.co', 'Sara Zimmerman', 'SZimmerman@MontgomeryCredit.co', '2012-06-22', 'ZHM234ka1005v55cVVWRincx3359VL', 'JOJJomp78903i892cbg4Oo0mmX789P', 'MontgomeryCredit.co'),
(4, 'Digimarc', '5033310983', 'Thuy Nguyen', 'Nguyen', 'Tran Nguyen', 'Johnathan Beck', '2012-07-25', 'jjOku930uroLJKsdur093ioprjekpkfe923i', 'JJFIOJIEjioej9089I90FKDKKLDSKkldks', 'Digimarc.com');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(1024) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `cookie` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `session` char(32) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `ip` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL DEFAULT '',
  `FirstName` varchar(64) NOT NULL,
  `LastName` varchar(64) NOT NULL,
  `EmailAddress` varchar(64) NOT NULL,
  `Cellphone` varchar(16) NOT NULL,
  `LeadProviderID_Default` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `cookie`, `session`, `ip`, `FirstName`, `LastName`, `EmailAddress`, `Cellphone`, `LeadProviderID_Default`) VALUES
(1, 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', '', '', '', 'Micheal', 'Zimmerman', 'mzim@emzim.co', '2147483647', 4);

-- --------------------------------------------------------

--
-- Table structure for table `PassFail`
--

CREATE TABLE IF NOT EXISTS `PassFail` (
  `PassGoodID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonalinformationID` int(11) NOT NULL,
  `LeadProviderID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `ResultXML` varchar(2048) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PassGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `PassFail`
--


-- --------------------------------------------------------

--
-- Table structure for table `PassGood`
--

CREATE TABLE IF NOT EXISTS `PassGood` (
  `PassGoodID` int(11) NOT NULL AUTO_INCREMENT,
  `PersonalinformationID` int(11) NOT NULL,
  `LeadProviderID` int(11) NOT NULL,
  `memberID` int(11) NOT NULL,
  `ResultXML` varchar(2048) NOT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`PassGoodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `PassGood`
--


-- --------------------------------------------------------

--
-- Table structure for table `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `rulesID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(128) NOT NULL,
  `RuleDescription` varchar(1024) NOT NULL,
  `PHPLocation` varchar(128) NOT NULL DEFAULT '/include/BBCore/cbbxruleset.php',
  `value` varchar(512) NOT NULL,
  `FieldName` varchar(32) NOT NULL,
  PRIMARY KEY (`rulesID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `rules`
--

INSERT INTO `rules` (`rulesID`, `Title`, `RuleDescription`, `PHPLocation`, `value`, `FieldName`) VALUES
(1, 'Reject loan if email includes .mil ', 'Reject loan if email includes .mil ', 'validate_text_contains', '.mil', 'email'),
(2, 'Reject loan if email includes .gov ', 'Reject loan if email includes .gov ', 'validate_text_contains', '.gov', 'email'),
(3, 'ABA is invalid ', 'ABA is invalid ', 'validate_numeric_equalEqualTo_CharCount', '9', 'ROUTINGNUMBER'),
(4, 'Customer or spouse is in military ', 'Customer or spouse is in military ', 'validate_isTrue', 'Errors', 'ISMILITARY'),
(5, 'Deny if bankruptcy', 'Deny if bankruptcy', 'validate_isTrue', 'Errors', 'BANKRUPTCY'),
(6, 'Deny Loan if customer has a "Hold" flag', 'Deny Loan if customer has a "Hold" flag', 'validate_text_contains', 'Hold', 'Flag'),
(7, 'Deny new loan if customer has a "Deny" flag', 'Deny new loan if customer has a "Deny" flag ', 'validate_text_contains', 'Deny', 'Flag'),
(8, 'Employment date must be greater than or equal to 60 days ', 'Employment date must be greater than or equal to 60 days', 'validate_date_xdaysGreater', '60', 'EMPMONTHS'),
(9, 'Payment Type cannot be paper check', 'Payment Type cannot be paper check', 'validate_text_contains', 'P', 'PAYTYPE'),
(10, 'Loan due date cannot be on a holiday ', 'Loan due date cannot be on a holiday ', 'validate_date_isHoliday', 'Errors', 'LOANDUEDATE'),
(11, 'Loan due date cannot be on a weekend ', 'Loan due date cannot be on a weekend', 'validate_date_isWeekEnd', 'Errors', 'LOANDUEDATE'),
(12, 'Minimum monthly Income of $1000', 'Minimum monthly Income of $1000', 'validate_numeric_lesser', '1000', 'NETMONTHLY'),
(13, 'Minimum residence duration of 1 month(s)', 'Minimum residence duration of 1 month(s)', 'validate_numeric_greaterThanEqualTo', '1', 'LENGTHATRESIDENCE'),
(14, 'Valid home phone number', 'Valid home phone number', 'validate_numeric_equalEqualTo_CharCount', '10', 'HOMEPHONE'),
(15, 'Verify that Drivers License number does not exist for another applicant', 'Verify that Drivers License number does not exist for another applicant', 'validate_Data_Exist', 'Errors', 'driverslicense'),
(16, 'Checking account must be open for 1 months or greater ', 'Checking account must be open for 1 months or greater ', 'validate_numeric_greaterThanEqualTo', '1', 'LENGTHBANKING'),
(17, 'Payment Type cannot be cash', 'Payment Type cannot be cash', 'validate_text_contains', 'C', 'PAYTYPE'),
(18, 'Account # is invalid ', 'Account # is invalid ', 'validate_numeric_equalEqualTo_CharCount', '17', 'ACCOUNTNUMBER');

-- --------------------------------------------------------

--
-- Table structure for table `RulesManagementSet`
--

CREATE TABLE IF NOT EXISTS `RulesManagementSet` (
  `RulesManagementSetID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(128) NOT NULL,
  `rulesID` int(11) NOT NULL,
  `Active` int(1) NOT NULL,
  `memberID` int(11) NOT NULL,
  PRIMARY KEY (`RulesManagementSetID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=391 ;

--
-- Dumping data for table `RulesManagementSet`
--

INSERT INTO `RulesManagementSet` (`RulesManagementSetID`, `Title`, `rulesID`, `Active`, `memberID`) VALUES
(284, 'Sample Rule Set D', 1, 1, 1),
(285, 'Sample Rule Set D', 2, 1, 1),
(286, 'Sample Rule Set D', 3, 1, 1),
(287, 'Sample Rule Set D', 4, 1, 1),
(288, 'Sample Rule Set D', 5, 1, 1),
(291, 'Sample Rule Set D', 8, 1, 1),
(292, 'Sample Rule Set D', 9, 1, 1),
(293, 'Sample Rule Set D', 12, 1, 1),
(295, 'Sample Rule Set D', 13, 1, 1),
(297, 'Sample Rule Set D', 14, 1, 1),
(299, 'Sample Rule Set D', 16, 1, 1),
(300, 'Sample Rule Set D', 17, 1, 1),
(336, 'Sample Rule Set D', 13, 1, 1),
(337, 'Testing Default', 1, 1, 0),
(338, 'Testing Default', 2, 1, 0),
(339, 'Testing Default', 3, 1, 0),
(340, 'Testing Default', 4, 1, 0),
(341, 'Testing Default', 5, 1, 0),
(342, 'Testing Default', 6, 0, 0),
(343, 'Testing Default', 7, 0, 0),
(344, 'Testing Default', 8, 1, 0),
(345, 'Testing Default', 9, 1, 0),
(346, 'Testing Default', 10, 0, 0),
(347, 'Testing Default', 11, 0, 0),
(348, 'Testing Default', 12, 1, 0),
(349, 'Testing Default', 14, 1, 0),
(350, 'Testing Default', 15, 1, 0),
(351, 'Testing Default', 16, 0, 0),
(352, 'Testing Default', 17, 1, 0),
(353, 'Testing Default', 19, 1, 0),
(354, 'Testing Default', 18, 0, 0),
(355, 'Mike Test', 1, 1, 1),
(356, 'Mike Test', 2, 1, 1),
(357, 'Mike Test', 3, 1, 1),
(358, 'Mike Test', 4, 1, 1),
(359, 'Mike Test', 5, 1, 1),
(360, 'Mike Test', 6, 0, 1),
(361, 'Mike Test', 7, 1, 1),
(362, 'Mike Test', 8, 0, 1),
(363, 'Mike Test', 9, 0, 1),
(364, 'Mike Test', 10, 0, 1),
(365, 'Mike Test', 11, 0, 1),
(366, 'Mike Test', 12, 0, 1),
(367, 'Mike Test', 13, 0, 1),
(368, 'Mike Test', 14, 0, 1),
(369, 'Mike Test', 15, 0, 1),
(370, 'Mike Test', 16, 0, 1),
(371, 'Mike Test', 17, 0, 1),
(372, 'Mike Test', 18, 0, 1),
(373, 'Mike Test II', 1, 1, 1),
(374, 'Mike Test II', 2, 1, 1),
(375, 'Mike Test II', 3, 0, 1),
(376, 'Mike Test II', 4, 0, 1),
(377, 'Mike Test II', 5, 0, 1),
(378, 'Mike Test II', 6, 0, 1),
(379, 'Mike Test II', 7, 0, 1),
(380, 'Mike Test II', 8, 0, 1),
(381, 'Mike Test II', 9, 0, 1),
(382, 'Mike Test II', 10, 0, 1),
(383, 'Mike Test II', 11, 0, 1),
(384, 'Mike Test II', 12, 0, 1),
(385, 'Mike Test II', 13, 0, 1),
(386, 'Mike Test II', 14, 0, 1),
(387, 'Mike Test II', 15, 0, 1),
(388, 'Mike Test II', 16, 0, 1),
(389, 'Mike Test II', 17, 0, 1),
(390, 'Mike Test II', 18, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Transactions_Leads`
--

CREATE TABLE IF NOT EXISTS `Transactions_Leads` (
  `LeadsTransaction_PASSID` int(11) NOT NULL AUTO_INCREMENT,
  `apiusername` varchar(100) NOT NULL,
  `apipassword` varchar(100) NOT NULL,
  `STOREKEY` varchar(100) NOT NULL,
  `REFURL` varchar(256) NOT NULL,
  `IPADDRESS` varchar(21) NOT NULL,
  `TIERKEY` varchar(100) NOT NULL,
  `AFFID` varchar(100) NOT NULL,
  `SUBID` varchar(100) NOT NULL,
  `TEST` int(1) NOT NULL,
  `REQUESTEDAMOUNT` varchar(6) NOT NULL,
  `SSN` varchar(16) NOT NULL,
  `DOB` varchar(11) NOT NULL,
  `GENDER` varchar(1) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) NOT NULL,
  `CITY` varchar(100) NOT NULL,
  `STATE` varchar(2) NOT NULL,
  `HOMEPHONE` varchar(13) NOT NULL,
  `OTHERPHONE` varchar(13) NOT NULL,
  `DLSTATE` varchar(2) NOT NULL,
  `DLNUMBER` varchar(32) NOT NULL,
  `CONTACTTIME` varchar(1) NOT NULL,
  `ADDRESSMONTHS` varchar(2) NOT NULL,
  `ADDRESSYEARS` varchar(2) NOT NULL,
  `RENTOROWN` varchar(1) NOT NULL,
  `ISMILITARY` varchar(1) NOT NULL,
  `ISCITIZEN` varchar(1) NOT NULL,
  `OTHEROFFERS` varchar(1) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `INCOMETYPE` varchar(1) NOT NULL,
  `PAYTYPE` varchar(1) NOT NULL,
  `EMPMONTHS` varchar(2) NOT NULL,
  `EMPYEARS` varchar(2) NOT NULL,
  `EMPNAME` varchar(100) NOT NULL,
  `EMPADDRESS` varchar(100) NOT NULL,
  `EMPADDRESS2` varchar(100) NOT NULL,
  `EMPCITY` varchar(100) NOT NULL,
  `EMPSTATE` varchar(2) NOT NULL,
  `EMPZIP` varchar(11) NOT NULL,
  `EMPPHONE` varchar(13) NOT NULL,
  `EMPPHONEEXT` varchar(6) NOT NULL,
  `EMPFAX` varchar(13) NOT NULL,
  `SUPERVISORNAME` varchar(100) NOT NULL,
  `SUPERVISORPHONE` varchar(13) NOT NULL,
  `SUPERVISORPHONEEXT` varchar(6) NOT NULL,
  `HIREDATE` varchar(11) NOT NULL,
  `EMPTYPE` varchar(1) NOT NULL,
  `JOBTITLE` varchar(100) NOT NULL,
  `WORKSHIFT` varchar(1) NOT NULL,
  `PAYFREQUENCY` varchar(11) NOT NULL,
  `NETMONTHLY` varchar(6) NOT NULL,
  `GROSSMONTHLY` varchar(6) NOT NULL,
  `LASTPAYDATE` varchar(11) NOT NULL,
  `NEXTPAYDATE` varchar(11) NOT NULL,
  `SECONDPAYDATE` varchar(11) NOT NULL,
  `ACCOUNTHOLDER` varchar(100) NOT NULL,
  `BANKNAME` varchar(100) NOT NULL,
  `BANKPHONE` varchar(13) NOT NULL,
  `ACCOUNTTYPE` varchar(1) NOT NULL,
  `ROUTINGNUMBER` varchar(9) NOT NULL,
  `ACCOUNTNUMBER` varchar(17) NOT NULL,
  `BANKMONTHS` int(2) NOT NULL,
  `BANKYEARS` int(2) NOT NULL,
  `OUTSTANDINGAMT` int(6) NOT NULL,
  `ACTIVECHECKING` varchar(1) NOT NULL,
  `REFFIRSTNAME` varchar(100) NOT NULL,
  `REFLASTNAME` varchar(100) NOT NULL,
  `PHONE` varchar(14) NOT NULL,
  `RELATIONSHIP` varchar(1) NOT NULL,
  `FLAG` varchar(32) NOT NULL,
  `DATETIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `RESULTS` varchar(2048) NOT NULL,
  `CODE` int(1) NOT NULL,
  PRIMARY KEY (`LeadsTransaction_PASSID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `Transactions_Leads`
--

INSERT INTO `Transactions_Leads` (`LeadsTransaction_PASSID`, `apiusername`, `apipassword`, `STOREKEY`, `REFURL`, `IPADDRESS`, `TIERKEY`, `AFFID`, `SUBID`, `TEST`, `REQUESTEDAMOUNT`, `SSN`, `DOB`, `GENDER`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CITY`, `STATE`, `HOMEPHONE`, `OTHERPHONE`, `DLSTATE`, `DLNUMBER`, `CONTACTTIME`, `ADDRESSMONTHS`, `ADDRESSYEARS`, `RENTOROWN`, `ISMILITARY`, `ISCITIZEN`, `OTHEROFFERS`, `EMAIL`, `INCOMETYPE`, `PAYTYPE`, `EMPMONTHS`, `EMPYEARS`, `EMPNAME`, `EMPADDRESS`, `EMPADDRESS2`, `EMPCITY`, `EMPSTATE`, `EMPZIP`, `EMPPHONE`, `EMPPHONEEXT`, `EMPFAX`, `SUPERVISORNAME`, `SUPERVISORPHONE`, `SUPERVISORPHONEEXT`, `HIREDATE`, `EMPTYPE`, `JOBTITLE`, `WORKSHIFT`, `PAYFREQUENCY`, `NETMONTHLY`, `GROSSMONTHLY`, `LASTPAYDATE`, `NEXTPAYDATE`, `SECONDPAYDATE`, `ACCOUNTHOLDER`, `BANKNAME`, `BANKPHONE`, `ACCOUNTTYPE`, `ROUTINGNUMBER`, `ACCOUNTNUMBER`, `BANKMONTHS`, `BANKYEARS`, `OUTSTANDINGAMT`, `ACTIVECHECKING`, `REFFIRSTNAME`, `REFLASTNAME`, `PHONE`, `RELATIONSHIP`, `FLAG`, `DATETIME`, `RESULTS`, `CODE`) VALUES
(1, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', '', '2012-07-10 17:39:40', '<error><code>1</code><msg>OK</msg></error>', 1),
(2, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', '', '2012-07-10 17:46:44', '<error><code>1</code><msg>OK</msg></error>', 1),
(3, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', '', '2012-07-10 18:08:43', '<error><code>1</code><msg>OK</msg></error>', 1),
(4, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:30:20', '<error><code>1</code><msg>OK</msg></error>', 1),
(5, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:34:38', '<error><code>1</code><msg>OK</msg></error>', 1),
(6, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:35:12', '<error><code>1</code><msg>OK</msg></error>', 1),
(7, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:35:28', '<error><code>1</code><msg>OK</msg></error>', 1),
(8, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:36:49', '<error><code>1</code><msg>OK</msg></error>', 1),
(9, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:37:37', '<error><code>1</code><msg>OK</msg></error>', 1),
(10, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:38:12', '<error><code>1</code><msg>OK</msg></error>', 1),
(11, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:38:51', '<error><code>1</code><msg>OK</msg></error>', 1),
(12, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:39:38', '<error><code>1</code><msg>OK</msg></error>', 1),
(13, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:41:16', '<error><code>1</code><msg>OK</msg></error>', 1),
(14, 'test', 'test', 'I5uHFVhfKGWpdXOr', 'http://www.fsc-bb.com', '98.160.229.122', 'I5uHFVhfKGWpdXOr', '', '', 0, '10000', '111224444', '01-04-1976', '', 'Jonathan', 'Doever', '1343 NE Webster', 'Portland', 'OR', '5032840599', '5032840591', 'OR', '5189376', '', '11', '3', '1', '1', '1', '1', 'Jonathan@ColumbiaOutdoorWear.com', 'E', 'D', '11', '6', 'ColumbiaOutdoorWear', '', '', '', '', '', '5035551212', '', '', '', '', '', '11-11-2005', 'F', '', '', 'W', '2434', '3000', '07-29-2012', '07-13-2012', '07-27-2012', '', 'First Iterstate', '', 'C', '107003052', '092900480', 5, 23, 0, 'Y', 'Jane', 'Doever', '5032840591', 'S', 'TREE', '2012-07-10 18:42:54', '<error><code>1</code><msg>OK</msg></error>', 1);
