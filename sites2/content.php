<?php
//***********************************读取一条记录**********************
//包含文件
include "conn.php";
//获取地址栏传来的id值
$id = $_GET["id"];
//构建SQL更新语句
$sql = "UPDATE 007_news SET hits=hits+1 WHERE id=$id";
//执行SQL语句
mysql_query($sql);
//构建SQL查询语句
$sql = "SELECT * FROM 007_news WHERE id=$id";
//执行查询语句
$result = mysql_query($sql);
//取出记录
$arr = mysql_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $arr['title']?></title>
    <style>
        *{
            font-family:'微软雅黑';
            width:1197px;
            margin:5px auto;
        }
        #header{
            margin-bottom:10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h3><?php echo $arr['title']?></h3>
            <div>作者：<?php echo $arr['author']?></div>
            <div>来源：<?php echo $arr['source']?></div>
            <div>点击率：<font style="color:red;"><?php echo $arr['hits']?></font>次</div>
            <div>发布时间：<?php echo date("Y-m-d H:i",$arr['addate'])?></div>
        </div>
        <div class="content">
            <?php echo $arr['content']?>
        </div>
    </div>
</body>
</html>