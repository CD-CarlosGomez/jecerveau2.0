<?php
namespace App\Config;
defined("APPPATH") OR die("Access denied");

use \DateTimeZone as DateTimeZone,
\DateTime as DateTime;


Class Globales {
const BASE_URL 	='http://localhost:8012/';  //base url location
const DOMINIO	='localhost:8012'; 
const BASE_PATH	='iBrain2.0/';
const CAN_REGISTER='any';
const DEFAULT_ROLE='member';
const SECURE=FALSE;

public static $domain		='http://localhost:8012/';
public static $base_path	='iBrain2.0/';
//public static $absoluteURL	='http://yocerebro.cloudappssolutions.com/iBrain2.0/';
public static $absoluteURL	='http://192.168.1.191:8012/ibrain2.0/';
//public static $absoluteURL	='http://localhost:8012/iBrain2.0/';

public static function timezone_list() {
    static $timezones = null;

    if ($timezones === null) {
        $timezones = array();
        $offsets = array();
        $now = new DateTime();

        foreach (DateTimeZone::listIdentifiers() as $timezone) {
            $now->setTimezone(new DateTimeZone($timezone));
            $offsets[] = $offset = $now->getOffset();
            $timezones[$timezone] = '(' . self::format_GMT_offset($offset) . ') ' .self::format_timezone_name($timezone);
        }

        array_multisort($offsets, $timezones);
    }

    return $timezones;
}

public static function format_GMT_offset($offset) {
    $hours = intval($offset / 3600);
    $minutes = abs(intval($offset % 3600 / 60));
    return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');
}

public static function format_timezone_name($name) {
    $name = str_replace('/', ', ', $name);
    $name = str_replace('_', ' ', $name);
    $name = str_replace('St ', 'St. ', $name);
    return $name;
}


}

/*
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

$g_bus_start_hour = "08";  // This would mean 8AM. If you want it at 1 o'clock
$g_bus_stop_hour = "17";   // This would mean 5PM.
$g_include_saturdays = "0";// Does your business operate on Saturdays?
$g_include_sundays = "0";  // Does your business operate on Sundays?
$debug = 0;                // SQL Debugging Info  1=on, 0=off*/

/*$time_zones = $timezone_identifiers = \DateTimeZone::listIdentifiers();
        foreach ($time_zones as $time_zone) {
            $date = new \DateTime('now', new \DateTimeZone($time_zone));
            $offset_in_hours = $date->getOffset() / 60 / 60;
            if (!is_null($offset) && $offset == $offset_in_hours) {
                echo "{$time_zone}: {$date->getOffset()} ($offset_in_hours)<br>";
            }*/

?>