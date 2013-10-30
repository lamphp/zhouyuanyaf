<?php
/**
 * Created by PhpStorm.
 * User: zhouyuan
 * Date: 13-10-30
 * Time: 上午9:30
 */

class helper_upload {
    private $upload = NULL;
    public $debug = FALSE;

    /**
     * @var help_upload
     */
    private static $self = NULL;

    private function __clone() {}


    public function __construct($config=array())
    {
        $file_config = Yaf_Registry::get('config')->get('yaf')->get('upload');
        switch ($file_config->system) {
            case 'sae':
                $this->upload = new io_sae($config);
                break;
            case 'bae':

                break;
            case 'local':
                $this->upload = new io_local($config);
                break;
            default:
                $this->upload = new io_local($config);
                break;
        }
    }


        public function do_upload(){
            return $this->upload->do_upload();
        }

      public function display_errors(){
        return $this->upload->display_errors();
    }

    public function data(){
        return $this->upload->data();
    }

}