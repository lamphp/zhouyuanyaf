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

     public function  _initEngnie(){
         if(function_exists('saeAutoLoader')){
             Yaf_Registry::set('IS_CLOUD',true);
             Yaf_Registry::set('IS_BAE',false);
             Yaf_Registry::set('IO_TRUE_NAME','sae');
         }elseif(isset($_SERVER['HTTP_BAE_ENV_APPID'])){
             Yaf_Registry::set('IS_CLOUD',true);
             Yaf_Registry::set('IS_SAE',false);
             Yaf_Registry::set('IO_TRUE_NAME','bae');
         }else{
             Yaf_Registry::set('IS_SAE',false);
             Yaf_Registry::set('IS_BAE',false);
             Yaf_Registry::set('IS_CLOUD',false);
             Yaf_Registry::set('IO_TRUE_NAME','local');
         }
     }

    public function _initDb()
    {
        db_contect::db();
    }

    public function _initCache()
    {
        cache_contect::cache();
    }

}