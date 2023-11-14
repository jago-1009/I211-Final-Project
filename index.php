<?php
/**
 * Author: Jacob Garwood
 * Date: 11/7/2023
 * File: index.php
 * Description:
 */
require_once("application/config.php");

//load autoloader
require_once("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();