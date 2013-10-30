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
        $this->rest->method('POST');
        $params = $this->allParams();
        $config['upload_path']   = 'uploads/tem/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']      = '5024';
        $config['max_width']     = '4000';
        $config['max_height']    = '4000';
        $config['file_name']     = '111' . '_tem_' . time();
        $upload = new helper_upload($config);

        if (!$upload->do_upload()) {
            $this->rest->error(rest_Code::STATUS_SUCCESS_DO_ERROR_FILE, $upload->display_errors());
        } else {
            $data_tem           = $upload->data();
            $data['avatar_url'] = './uploads/tem/' . $data_tem['file_name'];

            //helper_images::thumb_dbl($data['avatar_url'],500,500,$data['avatar_url']);

            $data['avatar_url'] = '/uploads/tem/' . $data_tem['file_name'];
            $this->rest->success($data);
        }

//        $this->cache = db_Cache::instance();
//         $this->cache->set("aaa","sssss");
//         $a =  $this->cache->get("aaa");
//       helper_common::dump($a);
//        $user = models_user::getInstance();
//        $result = array();
//        $sql = "SELECT * FROM pw_users;";
//        $tmp = $user->count( array('id' => 1));
//        helper_common::dump($tmp);

    }
}