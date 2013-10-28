<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhouyuan
 * Date: 13-10-28
 * Time: 下午9:58
 * To change this template use File | Settings | File Templates.
 */
class cache_contect{
    /**
     * @param string $which
     * @return db_Mysql
     */
    static public function cache($which = 'master'){
        $cache_config = Yaf_Registry::get('config')->get('yaf')->get('cache');
        $_cache_type = $cache_config->type;
        switch (Yaf_Registry::get("IO_TRUE_NAME")) {
            case 'sae':
              $cache = cache_sae::getInstance($cache_config);
                break;
            case 'bae':

                break;
            case 'local':
                $cache = cache_memached::getInstance($cache_config);
                break;
            default:
                $cache = cache_memached::getInstance($cache_config);
                break;
        }
        return $cache;
//		return ($db instanceof db_DbInterface) ? $db : false;

    }

}