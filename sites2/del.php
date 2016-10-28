<?php
//连接数据库文件
include "conn.php";
//获取地址传递的id参数
$id = (int)$_GET["id"];
//构建SQL删除语句
$sql = "DELETE FROM 007_news WHERE id=$id";

//执行SQL语句\

//跳转回原网页
//echo "<script>location.href='itcast.php'</script>";
if(mysql_query($sql)){
    //如果执行成功 跳转到success.php
    $message = urlencode("id={$id}的记录删除成功!");
    $url = "index.php";
    echo "<script>location.href='success.php?url=$url&message=$message'</script>";
    exit();
}else {
    //时报跳转err.php
    $message = urlencode("记录删除失败!");
    echo "<script>location.href='error.php?message=$message'</script>";
    exit();
}

?>