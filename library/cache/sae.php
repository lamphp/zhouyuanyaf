<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhouyuan
 * Date: 13-10-28
 * Time: 下午10:22
 * To change this template use File | Settings | File Templates.
 */

class cache_sae {
    private $cache = NULL;
    private $isOpen = 0;
    public static $_instances;
    public $debug = FALSE;

    private function __construct($cache_config){
        $this->isOpen = $cache_config->open;
        if($this->isOpen == 0){
            $this->cache = $this;
        } else {
            $this->cache = @memcache_init();
            if(!$this->cache){
                header('Content-Type:text/html;charset=utf-8');
                exit('您未开通Memcache服务，请在SAE管理平台初始化Memcache服务');
            }
        }

    }

    static public function getInstance($cache_config = '')
    {
        $_cache_type = $cache_config->system;
        $idx = md5($_cache_type);
        if (!isset(self::$_instances[$idx])) {
            self::$_instances[$idx] = new self($cache_config);
        }
        return self::$_instances[$idx];
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
        if ($value === FALSE || $this->isOpen == 0) return FALSE;
        if ($this->debug) var_dump('cache set: '.$key,$value);
        return $this->cache->set($key, $value, $lifetime);
    }

    /**
     * 获取cache
     * @param string $Key
     * @return string|array|bool
     */
    public function get($Key)
    {
        if ($this->isOpen == 0) return FALSE;
        $value = $this->cache->get($Key);
        if ($this->debug) var_dump('cache get: '.$Key,$value);
        return $value;
    }

    /**
     * 删除cache
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        if ($this->isOpen == 0) return FALSE;
        return $this->cache->delete($key);
    }

    /**
     * 关闭cache连接
     */
    public function close()
    {
        if ($this->isOpen == 0) return FALSE;
        $this->cache->quit();
    }


}