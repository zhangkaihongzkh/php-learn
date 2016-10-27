<meta http-equiv="content-type" content="text/html;charset=utf-8">

<?php
//连接php文件
include "conn.php";
//执行SQL操作语句
 $sql = "SELECT * FROM 007_news ORDER BY id DESC";
 $result = mysql_query($sql);//结果集，是一个资源标识符
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>新闻列表</title>
</head>
<body>
<script>
function confirmDel(id){
    if(window.confirm("确定删除？")){
        //实现跳转
        location.href = "del.php?id="+id;
    }
}
</script>
<table width="100%" border="1" bordercolor="#ccc" rules="all" align="center" cellpadding="5">
	<tr bgColor="#e6e6e6">
		<th>编号</th>
		<th>新闻标题</th>
		<th>作者</th>
		<th>来源</th>
		<th>排序</th>
		<th>点击率</th>
		<th>发布日期</th>
		<th>操作选项</th>
	</tr>
	<?php
	$str = "";
	$n = 1;
	while($arr = mysql_fetch_assoc($result))
	{
		//如果是偶数行，则添加行的背景色
		if($n%2==0)
		{
			$str .= "<tr align='center' bgColor='#f6f6f6'>\n";
		}else
		{
			$str .= "<tr align='center'>\n";
		}
		$str .=  "	<td>".$arr['id']."</td>\n";
		$str .=  "	<td align='left'>".$arr['title']."</td>\n";
		$str .=  "	<td>".$arr['author']."</td>\n";
		$str .=  "	<td>".$arr['source']."</td>\n";
		$str .=  "	<td>".$arr['orderby']."</td>\n";
		$str .=  "	<td>".$arr['hits']."</td>\n";
		$str .=  "	<td>".date("Y-m-d H:i",$arr['addate'])."</td>\n";
		$str .=  "	<td><a href='javascript:void(0)'>修改</a> <a href='javascript:void(0)' onClick='confirmDel(".$arr['id'].")'>删除</a></td>\n";
		$str .=  "</tr>\n";
		$n++; //循环次数
	}
	echo $str;
	?>
</table>
</body>
</html>