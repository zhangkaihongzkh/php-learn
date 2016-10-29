<?php
//***********************修改新闻****************************
//连接MySQL数据库
include "conn.php";
//判断表单是否提交
if(isset($_POST["ac"]) && $_POST["ac"] == "edit"){
    //获取表单提交的数据
    $cat		= $_POST["cat"];
   	$title		= $_POST["title"];
   	$author		= $_POST["author"];
   	$source		= $_POST["source"];
   	$orderby	= $_POST["orderby"];
   	$keywords	= $_POST["keywords"];
   	$description= $_POST["description"];
   	$content	= $_POST["content"];
   	$id			= $_POST["id"];
    //构建写入数据库语句
    $sql = "UPDATE 007_news SET cat='$cat',title='$title',author='$author',source='$source',orderby='$orderby',keywords='$keywords',description='$description',content='$content' WHERE id=$id";
    //执行mysql语句
    if(mysql_query($sql)){
        //执行成功 跳转到success页面
        $url = "manage.php";
        $message = urlencode("修改纪录成功！");
        echo "<script>location.href='success.php?url=$url&message=$message'</script>";
        exit();
    }
} else{
        //获取地址栏的id
	    $id = $_GET["id"];
        //构建SQL语句
	    $sql = "SELECT * FROM 007_news WHERE id=$id";
        //执行SQL语句
	    $result = mysql_query($sql);
        //取出一条记录
	    $arr = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>修改新闻</title>
<style>
    *{
        font-family:'微软雅黑';
    }
    #form1 table{
        margin: 0 auto;
    }
    #form1 h3{
        text-align:center;
        color:#e93854;
    }
</style>
<script charset="utf-8" src="js/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="js/editor/lang/zh_CN.js"></script>
<script>
    //增加在线编辑器
    var editor;
    KindEditor.ready(function(K){
        //在当前网页中，查找<textarea name = "content"></textarea>，并替换成kindeditor编辑器。
        editor = K.create('textarea[name="content"]',{
            allowFileManager : true   //是否允许上传文件
        });
    });
</script>
</head>
<body>
<form name="form1" action="" method="post" id="form1">
    <table width="800" border="1" rules="all" bordercolor="#ccc" cellpadding="5" align="center">
        <tr><h3>修改一条新闻</h3></tr>
        <tr>
            <td width="80" align="right">新闻类型：</td>
            <td>
                <select name="cat">
                    <option value="1"<?php if($arr['cat'] == 1){echo ' selected=selected';}?>>公司新闻</option>
                    <option value="2"<?php if($arr['cat'] == 2){echo ' selected=selected';}?>>行业新闻</option>
                    <option value="3"<?php if($arr['cat'] == 3){echo ' selected=selected';}?>>疾病预防</option>
                    <option value="4"<?php if($arr['cat'] == 4){echo ' selected=selected';}?>>帮助文档</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="right">新闻标题：</td>
            <td><input type="text" name="title" size="80" value="<?php echo $arr['title']?>"></td>
        </tr>
        <tr>
            <td align="right">作者：</td>
            <td>
                <input type="text" name="author" size="10" value="<?php echo $arr['author']?>">
                来源：<input type="text" name="source" size="10" value="<?php echo $arr['source']?>">
                排序：<input type="text" name="orderby" maxlength="2" size="10" value="<?php echo $arr['orderby']?>">
            </td>
        </tr>
        <tr>
            <td align="right">关键字：</td>
            <td><input type="text" name="keywords" size="80" value="<?php echo $arr['keywords']?>"></td>
        </tr>
        <tr>
            <td align="right">描述：</td>
            <td><input type="text" name="description" size="80" value="<?php echo $arr['description']?>"></td>
        </tr>
        <tr>
            <td align="right">内容：</td>
            <td><textarea name="content" style="width:100%;height:240px;"><?php echo $arr['content']?></textarea></td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <td>
                <input type="submit" value="提交表单">
                <input type="hidden" name="ac" value="edit">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <input type="reset" value="重置表单">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
