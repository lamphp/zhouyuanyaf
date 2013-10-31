<?php
/**
 * 连接数据库
 * @author ciogao@gmail.com
 *
 */
class db_contect{
    /**
     * @param string $which
     * @return db_Mysql
     */
    static public function db($which = 'master'){

        if(Yaf_Registry::get('IO_TRUE_NAME')=="sae"){
            $which = "sae";
            $db_config = Yaf_Registry::get('config')->get('yaf')->get('db')->$which;
        } else {
            $db_config = Yaf_Registry::get('config')->get('yaf')->get('db')->$which;
        }

		$db = db_Mysql::getInstance($db_config);
        return $db;
//		return ($db instanceof db_DbInterface) ? $db : false;
	
		}

}
