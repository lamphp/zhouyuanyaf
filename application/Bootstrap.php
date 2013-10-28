<?php

class Bootstrap extends Yaf_Bootstrap_Abstract 
{
    public function _initSession($dispatcher)
    {
        /*
         * start a session
         */
        Yaf_Session::getInstance()->start();
    }
    public function _initConfig()
    {
        $config = Yaf_Application::app()->getConfig();
        Yaf_Registry::set("config", $config);
    }

    public function _initDb()
    {
        db_contect::db();
    }

}