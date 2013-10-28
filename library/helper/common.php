<?php
/**
 * 单例公共函数
 * @author ciogao@gmail.com
 *
 */
class helper_common{
	static $_instance;
	
	public function instace() {
		if( ! (self::$_instance instanceof self) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	private function __clone() {}
	



    /**
     * 提示信息
     * @param $msg
     * @param bool $url
     * @internal param string $pMsg
     * @internal param bool $pUrl
     */
	public static function msg($msg, $url = FALSE) {
		header('Content-Type:text/html; charset=utf-8');
		is_array($msg) && $msg = join('\n', $msg);
		echo '<script type="text/javascript">';
		if($msg) echo "alert('$msg');";
		if($url) echo "self.location='{$url}'";
		elseif(empty($_SERVER['HTTP_REFERER'])) echo 'window.history.back(-1);';
		else echo "self.location='{$_SERVER['HTTP_REFERER']}';";
		exit('</script>');
	}
	

	
	/**
	 * 判断id是否属于ids中
	 * @param int $id
	 * @param array $ids
     * @return bool
     */
	public static function ifInTags($id = 0,$ids = array()){
		if (in_array($id, $ids)) return TRUE;
		return FALSE;
	}

    /**
     * double类型数据转换为string
     * @param $num
     * @return string
     */
    public static function number_format($num){
        return number_format($num,0,'','');
	}

    /**
     * 从数组中取得某字段并返回数组，一般为主键
     * @param $data
     * @param $column
     *
     * @return array
     */
    public static function get_column($data,$column){
        if (!is_array($data) || count($data) < 1) return FALSE;

        $result = array();
        foreach($data as $v){
            if (array_key_exists($column,$v)) $result[] = $v[$column];
        }
        return $result;
    }
    /**
     * 浏览器友好的变量输出
     * @param mixed $var 变量
     * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
     * @param string $label 标签 默认为空
     * @param boolean $strict 是否严谨 默认为true
     * @return void|string
     */
      public static function dump($var, $echo=true, $label=null, $strict=true) {
        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = print_r($var, true);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo($output);
            return null;
        }else
            return $output;
    }

}