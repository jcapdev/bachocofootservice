<?php
//Archivo de configuración
$_SESSION["APP_NAME"]=".:Bachoco FS:.";
date_default_timezone_set('America/Mexico_City');
$INC_DIR = "/includes/"; 
$FONT_DIR = "fonts/"; 
$GLOBAL_FONT_DIR = "General"; 
//Archivos para logging
require_once(__dir__ .$INC_DIR."log4PHP/Logger.php");
require_once(__dir__ .$INC_DIR."IP.php");
$datosCliente = new IP();
$IP = $datosCliente->obtieneIP();
// Tell log4php to use our configuration file.
Logger::configure(__dir__ .$INC_DIR."log4PHP/".'config.xml');
// Fetch a logger, it will inherit settings from the root logger
$log = Logger::getLogger('LogApp');
require_once(__dir__ .$INC_DIR."MysqliDb.php");
$db = MysqliDb::getInstance();

$relativo = "../";

 /*
// Start logging
$log->trace("[".$IPcliente."] "."My first message.");   // Not logged because TRACE < WARN
$log->debug("[".$IPcliente."] "."My second message.");  // Not logged because DEBUG < WARN
$log->info("[".$IPcliente."] "."My third message.");    // Not logged because INFO < WARN
$log->warn("[".$IPcliente."] "."My fourth message.");   // Logged because WARN >= WARN
$log->error("[".$IPcliente."] "."My fifth message.");   // Logged because ERROR >= WARN
$log->fatal("[".$IPcliente."] "."My sixth message.");   // Logged because FATAL >= WARN
*/


?>