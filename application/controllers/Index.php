<?php
class IndexController extends Controller
{

    /**
     * @var db_Cache
     */
    private $cache = NULL;

    public function init()
    {
        parent::init();
    }

   /* default action */
   public function indexAction()
   {

      $this->_view->word = "hello world";

      //phpinfo();

   }

    public function testAction()
    {
        Yaf_Dispatcher::getInstance()->disableView();//关闭其自动渲染
        $this->cache = db_Cache::instance();
         $this->cache->set("aaa","sssss");
         $a =  $this->cache->get("aaa");
       helper_common::dump($a);

    }
}