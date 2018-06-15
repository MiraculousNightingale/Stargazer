<?php
/**
 * Created by PhpStorm.
 * User: wenceslaus
 * Date: 4/1/18
 * Time: 5:55 PM
 */

static $raw_log=array("Log...");
static $log="";
function initialize_log(){
    global $raw_log;
    global $log;
    $log="";
    for ($id = 0; $id < count($raw_log); $id++) {
        $log.= $id . " | " . $raw_log[$id] . '<br>';
    }
}
function write_log($log_entry){
    global $raw_log;
    array_push($raw_log,$log_entry);
    initialize_log();
}