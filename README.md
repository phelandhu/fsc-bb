fsc-bb
======
2012-10-30 - Added the BB SQL into the docs directory
Need to change it to match standards and then change the PHP to match that.

2012-11-14 - there is now a holiday class in /common/external/class.holiday.php
http://maccrafters.com/home/current-offerings/programming/php-holiday-class/

Example of how to check for weekend is:
function isWeekend($date) {
    return (date('N', strtotime($date)) >= 6);
}
