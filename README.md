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

2012-11-20 - Adding logging to the project via log4php
https://logging.apache.org/log4php/install.html
pear channel-discover pear.apache.org/log4php
pear install log4php/Apache_log4php

$log->trace("My first message.");   // Not logged because TRACE < WARN
$log->debug("My second message.");  // Not logged because DEBUG < WARN
$log->info("My third message.");    // Not logged because INFO < WARN
$log->warn("My fourth message.");   // Logged because WARN >= WARN
$log->error("My fifth message.");   // Logged because ERROR >= WARN
$log->fatal("My sixth message.");   // Logged because FATAL >= WARN


