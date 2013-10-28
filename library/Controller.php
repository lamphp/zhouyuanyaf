<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhouyuan
 * Date: 13-10-27
 * Time: 上午12:26
 * To change this template use File | Settings | File Templates.
 */

class Controller  extends Yaf_Controller_Abstract{
    /**
     * @var Models
     */
    public $model;
    /**
     * @var db_Mysql
     */
    public $db;
    public $meta;

    protected $appconfig = array();
    protected $userinfo = array();
    protected $user_id = 0;
    protected $modules = array();

    /**
     * @var rest_Server
     */
    protected $rest;

    /**
     * @var rest_Check
     */
    protected $check;

    /**
     * @var rest_Quantity
     */
    protected $quantity;

    /**
     * @var rest_Modified
     */
    protected $modified;

    /**
     * @var Yaf_Session
     */
    protected $session;

    /**
     * @var rest_Mkdata
     */
    protected $mkData;

    /**
     * @var
     */
    protected $allParams = array();

    protected $start = 0;
    protected $limit = 0;

    function init()
    {
        $this->db = db_contect::db();

        $this->check    = rest_Check::instance();
        $this->quantity = rest_Quantity::instance();
        $this->rest     = rest_Server::instance();
        $this->modified = rest_Modified::instance();
        $this->session  = Yaf_Session::getInstance();
        $this->mkData   = rest_Mkdata::instance();
        if("Api"==$this->getRequest()->getModuleName()|| $this->getRequest()->isXmlHttpRequest()){
            Yaf_Dispatcher::getInstance()->autoRender(FALSE);
        }

    }
    /**
     * 取得所有参数
     * @return mixed
     */
    protected function allParams()
    {
        $params = $this->getRequest()->getParams();
        $params += $_GET;
        $params += $_POST;
        $this->allParams = $params;
        return $params;
    }
    /**
     * 设置变量到模板
     * @param $key
     * @param string $val
     */
    protected function set($key, $val = '')
    {
        $this->getView()->assign($key, $val);
    }

    function __destruct()
    {
        if ($this->db) {
            $this->db->close();
        }
    }

}