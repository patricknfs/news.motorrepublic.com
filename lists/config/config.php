<?php

/*

* ==============================================================================================================
*
*
* The minimum requirements to get phpList working are in this file.
* If you are interested in tweaking more options, check out the config_extended.php file
* or visit http://resources.phplist.com/system/config
*
* ** NOTE: To use options from config_extended.php, you need to copy them to this file **
*
==============================================================================================================

*/

// what is your Mysql database server hostname
$database_host = 'localhost';

// what is the name of the database we are using
$database_name = 'news';

// what user has access to this database
$database_user = 'paperboy';

// and what is the password to login to control the database
$database_password = 'Mx664#nn0~';

// if you have an SMTP server, set it here. Otherwise it will use the normal php mail() function
//# if your SMTP server is called "smtp.mydomain.com" you enter this below like this:
//#
//#     define("PHPMAILERHOST",'smtp.mydomain.com');

define('PHPMAILERHOST', '');

// if TEST is set to 1 (not 0) it will not actually send ANY messages, but display what it would have sent
// this is here, to make sure you edited the config file and mails are not sent "accidentally"
// on unmanaged systems

define('TEST', 0);

/*

==============================================================================================================
*
* Settings for handling bounces
*
* This section is OPTIONAL, and not necessary to send out mailings, but it is highly recommended to correctly
* set up bounce processing. Without processing of bounces your system will end up sending large amounts of
* unnecessary messages, which overloads your own server, the receiving servers and internet traffic as a whole
*
==============================================================================================================

*/

// Message envelope.

// This is the address that most bounces will be delivered to
// Your should make this an address that no PERSON reads
// but a mailbox that phpList can empty every so often, to process the bounces

// $message_envelope = 'listbounces@yourdomain';

// Handling bounces. Check README.bounces for more info
// This can be 'pop' or 'mbox'
$bounce_protocol = 'pop';

// set this to 0, if you set up a cron to download bounces regularly by using the
// commandline option. If this is 0, users cannot run the page from the web
// frontend. Read README.commandline to find out how to set it up on the
// commandline
define('MANUALLY_PROCESS_BOUNCES', 1);

// when the protocol is pop, specify these three
$bounce_mailbox_host = 'localhost';
$bounce_mailbox_user = 'popuser';
$bounce_mailbox_password = 'password';

// the "port" is the remote port of the connection to retrieve the emails
// the default should be fine but if it doesn't work, you can try the second
// one. To do that, add a # before the first line and take off the one before the
// second line
$bounce_mailbox_port = '110/pop3/notls';
//$bounce_mailbox_port = "110/pop3";

// it's getting more common to have secure connections, in which case you probably want to use
//$bounce_mailbox_port = "995/pop3/ssl/novalidate-cert";

// when the protocol is mbox specify this one
// it needs to be a local file in mbox format, accessible to your webserver user
$bounce_mailbox = '/var/mail/listbounces';

// set this to 0 if you want to keep your messages in the mailbox. this is potentially
// a problem, because bounces will be counted multiple times, so only do this if you are
// testing things.
$bounce_mailbox_purge = 1;

// set this to 0 if you want to keep unprocessed messages in the mailbox. Unprocessed
// messages are messages that could not be matched with a user in the system
// messages are still downloaded into phpList, so it is safe to delete them from
// the mailbox and view them in phpList
$bounce_mailbox_purge_unprocessed = 1;

// how many bounces in a row need to have occurred for a user to be marked unconfirmed
$bounce_unsubscribe_threshold = 5;

// choose the hash method for password
// check the extended config for more info
// in most cases, it is fine to leave this as it is
define('HASH_ALGO', 'sha256');

// If you want to upload images in the editor, you need to specify the location
// of the directory where the images go. This needs to be writable by the webserver,
// and it needs to be in your public document (website) area
// the directory is relative to the webserver root directory
//   eg if your webserver root is /home/user/public_html
//   then the images directory is /home/user/public_html/uploadimages
// This is a potential security risk, so read README.security for more information
define('UPLOADIMAGES_DIR', 'images');
// If you want to remove the image from the HTML emails, set this constant
// to be 1, the HTML emails will then only add a line of text as signature
define('EMAILTEXTCREDITS', 1);


// to avoid overloading the server that sends your email, you can add a little delay
// between messages that will spread the load of sending
// you will need to find a good value for your own server
// value is in seconds, and you can use fractions, eg "0.5" is half a second
// (or you can play with the autothrottle below)
define('MAILQUEUE_THROTTLE', 0);
// define the amount of emails you want to send per period. If 0, batch processing
// is disabled and messages are sent out as fast as possible
define('MAILQUEUE_BATCH_SIZE', 7000);
// define the length of one batch processing period, in seconds (3600 is an hour)
define('MAILQUEUE_BATCH_PERIOD', 3600);
// Mailqueue autothrottle. This will try to automatically change the delay
// between messages to make sure that the MAILQUEUE_BATCH_SIZE (above) is spread evently over
// MAILQUEUE_BATCH_PERIOD, instead of firing the Batch in the first few minutes of the period
// and then waiting for the next period. This only works with mailqueue_throttle off
// and MAILQUEUE_BATCH_PERIOD being a positive value
// it still needs tweaking, so send your feedback to mantis.phplist.com if you find
// any issues with it
define('MAILQUEUE_AUTOTHROTTLE', 1);