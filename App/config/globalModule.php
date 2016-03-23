<?php	//general configuration
namespace App\globalModule;
defined("APPPATH") OR die("Access denied");

use App\Controller;
$version 	= "2.0";	//Version Number
$g_title	= "iBrain2.0";	//Title of your helpdesk
$g_helpdesk_email = "cgomez@consultoriadual.com";	//Email of your helpdesk
$g_mailservername = "localhost";	//Mail server
$g_domainmailfrom = "localhost";		//Unless you need this program to send out
$g_TimeZone="";				
$g_language = "";	
$g_refreshtime = "1200";	//View Jobs refresh rate in seconds
$g_cookietimeout = "1800";	//Timout for cookies
$g_enable_javascript = 1;	//1 = enable, 0 = don't enable
//$g_base_url     = "http://localhost/rit/";  //base url location
$g_base_url     = "http://localhost:8012/";  //base url location
// you HAVE to set your domain name here, with no HTTP:
// or / at the end or anything...
$g_domain = "localhost:8012"; 

// this is the path from the last part of the $g_base_url
// parameter.  If there is no path, set this to "/"; NOTICE
// THE BEGINNING AND ENDING /'s!!
$g_base_path = "iBrain2.0/";
$g_bus_start_hour = "08";  // This would mean 8AM. If you want it at 1 o'clock
$g_bus_stop_hour = "17";   // This would mean 5PM.
$g_include_saturdays = "0";// Does your business operate on Saturdays?
$g_include_sundays = "0";  // Does your business operate on Sundays?
$debug = 0;                // SQL Debugging Info  1=on, 0=off
?>
