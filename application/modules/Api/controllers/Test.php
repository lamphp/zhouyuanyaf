<?php
class TestController extends Controller
{
	
	public function init(){
		parent::init();
	}
	
	public function indexAction(){
		$post = $this->getRequest()->getPost();
		$this->quantity->config(10,10,rest_Quantity::CONFIG_IP);
		$this->quantity->check('appkey');
		
		die;
	}
	
	public function testBAction(){
        echo '<pre>';
		$a = get_object_vars($this->rest);
		var_dump($a);

		
		var_dump(get_class_methods($this->rest));
		debug_print_backtrace();
		die;
	}
	
	public function aaAction(){
        $data = array(
  			'email' => array("id"=>'dd'),
 			'password' => array("id"=>'dd'),
            'remember' => array("id"=>'dd'),
 			);
//
//		$this->c = rest_Client::instance();
//		$this->c->method = 'POST';
//		$this->c->data($data);
//		$this->c->api = 'https://www.workingim.com/auth/checkLogin';
// 	    $this->c->go();
//		$body = $this->c->getBody();
//        echo ($body);
        $this->mkData = rest_Mkdata::instance();
        $this->mkData->setOffset(0,5); //不采用setOffset方法时,将从POST中取得start & limit 值
        $this->mkData->config(30, 'id');
         $this->data = $this->mkData->make($data);
        $this->rest->success($this->data);
	}
}