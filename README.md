一个生成随机字符串的php函数。
两个参数：
 * @param  number `$length` 随机码的长度
 * @param  string `$type`   n l L s 字符类型组合 
 * @return string 随机码 
 
使用方法：
*随机生成一个20位长度的字母加数字组合字符串。*
```
$key=createkey();
```

*随机生成一个10位长度的数字*
```
$key=createkey(10,'n');
```
