<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhouyuan
 * Date: 13-10-28
 * Time: 下午10:45
 * To change this template use File | Settings | File Templates.
 */

class cache_file {
    private $cache = NULL;
    public static $_instances;
    public $debug = FALSE;

    private function __construct(){

    }

    static public function getInstance($cache_config = '')
    {
        return new cache_file();

    }
    /**
     * 设置cahce
     * @param string $key
     * @param string|array|bool $value
     * @param int|string $lifetime
     * @return bool
     */
    public function set($key, $value, $lifetime = '60')
    {

    }

    /**
     * 获取cache
     * @param string $Key
     * @return string|array|bool
     */
    public function get($Key)
    {
      return false;
    }

    /**
     * 删除cache
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        return true;
    }

    /**
     * 关闭cache连接
     */
    public function close()
    {
        return false;

    }

}