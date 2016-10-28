<?php
//声明PHP输出数据的字符集
header("content-type:text/html;charset=utf-8");

//0.数据库配置信息
 $db_host = "localhost";
 $db_root = "root";
 $db_pwd = "";
 $db_name = "007online";

 //1.php连接mysql数据库
 $link = @mysql_connect($db_host,$db_root,$db_pwd);
 //判断是否连通
 if (!$link) {
    echo "<font color=red>php连接my_sql失败</font>";
    exit();
 }
/* echo '连接成功！';*/

 //2.选择要操作的数据库
 if(mysql_select_db($db_name, $link)){
     /*echo "选择数据库{$db_name}成功！";*/
 } else {
     echo "选择数据库{$db_name}失败！";
 }

 //3.设置请求或返回SQL数据的字符集
 mysql_query("set names utf8");


?>