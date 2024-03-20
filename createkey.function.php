<?php 
/**
 * 按给定长度和字符集生成随机码 
 * @param  number $length 随机码的长度，默认长度20
 * @param  string $type   n l L s 字符类型 默认nlL
 * @return string 随机码 
 */
function create_key( $length = 20 , $type = 'nlL' ) {
    // 强制将 $length 转换为数字，如果转换失败则使用默认值 20
    $length = (is_numeric($length) && $length > 0) ? intval($length) : 20;
    //为了防止意外限制随机字符长度为1000
    $length = $length<1000?:1000; 
    
    // 过滤 $type 参数，只保留 'n', 'l', 'L', 's' 字符
    $type = preg_replace('/[^nlLs]/', '', $type);
    $type = $type ?: 'nlL';
    //可以按nlLs的数量确定各类字符分布
    //为了防止意外限制字符集长度为10个数组组合
    $type = strlen($type)<10 ?: substr($type,0,10);
    
	// 密码字符集，可任意添加你需要的字符
    $charlist=[
        'n'=>'0123456789',
        'l'=>'abcdefghijklmnopqrstuvwxyz',
        'L'=>'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        's'=>'!@#$%^&*()_+-*/='
    ];
    
    //确定字符集
    $chars = '';
    for($i=0;$i< strlen($type);$i++){
        $chars .= $charlist[$type[$i]]; 
    }
    
	//生成随机字符串
	$key = '';
	for ( $i = 0; $i < $length; $i++ ) {
		$key .= $chars[ mt_rand(0, strlen($chars) - 1) ];
	}

	return $key;
}

?>
