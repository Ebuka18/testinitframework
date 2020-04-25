<?php


CONST Config = [

   // APPLICATION
   "APP_NAME" => "Initframework",
   "APP_URL" => "http://localhost/testframework",
   // "APP_URL" => "http://test.initframework.com",

   // DEVELOPMENT
   "APP_DEBUG" => false,
   "APP_MAINTAINANCE" => true,

   // set the ip addresses that can access the application while on maintenance
   "APP_MAINTENANCE_WHITELIST_IP" => [
      "::1"
   ],
   
   // DATABASE CONFIGURATION
   "DB_DRIVER" => "mysql",
   "DB_HOST" => "localhost",
   "DB_PORT" => "3306",
   "DB_DATABASE" => "testframework_db",
   "DB_USERNAME" => "root",
   "DB_PASSWORD" => "",

   // MAIL CONFIGURATION
   "MAIL_DRIVER" => "smtp",
   "MAIL_HOST" => "smtp.mailtrap.io",
   "MAIL_PORT" => "2525",
   "MAIL_USERNAME" => "null",
   "MAIL_PASSWORD" => "null",
   "MAIL_ENCRYPTION" => "null",
   
   // AUTHENTICATION
   "AUTH_REALM" => "Initframework",
   
   "AUTH_TIMEOUT" => 1, # 1 = 1 hour

   "SERVER_ADMIN" => "webmaster@test.initframework.com", // postmaster@localhost

];

// DISPLAY ERROR
($_SERVER['HTTP_HOST'] == 'localhost') ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

?>
