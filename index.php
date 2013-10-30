<?php

define("APPLICATION_PATH",  dirname(__FILE__));

//if(!extension_loaded("yaf")){
//    include(APPLICATION_PATH.'/framework/loader.php');
//}
$app  = new Yaf_Application(APPLICATION_PATH . "/conf/application.ini");
$app->bootstrap() //call bootstrap methods defined in Bootstrap.php
    ->run();


