<?php
/**
 * 单例cache
 * @author ciogao@gmail.com
 *
 */
class db_Cache
{

    private $cache = NULL;
    public $debug = FALSE;

    /**
     * @var db_Cache
     */
    private static $self = NULL;

    /**
     * @static
     * @param int $cachehost
     * @param int $cacheport
     * @param string $cacheType
     * @param string $cacheSys
     * @return db_Cache
     */
    public static function instance()
    {
        if (self::$self == NULL) {
            self::$self = new db_Cache();
        }
        return self::$self;
    }

    public function __construct()
    {
        $this->cache = cache_contect::cache();
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
        return $this->cache->set($key, $value, $lifetime);
    }

    /**
     * 获取cache
     * @param string $Key
     * @return string|array|bool
     */
    public function get($Key)
    {
        $value = $this->cache->get($Key);
        return $value;
    }

    /**
     * 删除cache
     * @param $key
     * @return mixed
     */
    public function delete($key)
    {
        return $this->cache->delete($key);
    }

    /**
     * 关闭cache连接
     */
    public function close()
    {
        $this->cache->close();
    }
}
