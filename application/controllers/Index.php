<?php
class IndexController extends Controller
{
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
        $a = $this->allParams();
        helper_common::dump($a);

    }
}