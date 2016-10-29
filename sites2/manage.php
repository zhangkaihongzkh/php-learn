<?php
//***********************管理界面****************************

//包含连接MySQL的文件
include "conn.php";

//分页相关变量
$pagesize = 5; //每页显示的条数

if(empty($_GET["page"])){
    $page = 1;
    $startrow = 0;
} else{
    $page = (int)$_GET["page"];
    $startrow = ($page-1) * $pagesize;
}
//从地址栏获取传递的page参数



//构建查询的SQL语句
$sql = "SELECT * FROM 007_news";
//执行SQL语句
$result = mysql_query($sql);

//记录总数和页数
$records = mysql_num_rows($result); //总条数
$pages = ceil($records/$pagesize);  //总页数

//构造分页语句
$sql = "SELECT * FROM 007_news ORDER BY orderby ASC, id DESC LIMIT $startrow,$pagesize";

//执行分页语句
$result = mysql_query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>新闻管理列表页</title>
    <style>
        *{
            font-family:'微软雅黑';
        }
        .clearfix:after{content: "";display:block;clear:both;}
        .clearfix{zoom:1;}
        .container{
            width:1197px;
            margin: 5px auto;
        }
        #header{
            padding: 5px 0 5px 5px;
            height:80px;
            position:relative;
            margin-bottom:10px;
        }
        #header h3{
            float:left;
            color: #e93854;
        }
        #header #add{
            position:absolute;
            top:15px;
            right:210px;
            display:block;
            width:360px;
            height:40px;
            line-height:40px;
            background-color:#fff;
            cursor:pointer;
            border:1px solid  #e93854;
            font-size:14px;
            color:#e93854;
            text-align:center;
        }
        #header #add:hover{
            background-color:#e93854;
            color:#fff;
            transition: color 0.25s ease,background-color 0.25s ease;
            -webkit-transition: color 0.25s ease,background-color 0.25s ease;
        }
        #news_table{

            border:1px solid #e93854;
        }
        .pagelist{
        	height:40px;
        	line-height:40px;
        }
        .pagelist a{
        	border:1px solid #ccc;
        	background-color:#f0f0f0;
        	padding:3px 10px;
        	margin:0px 3px;
        }
        .pagelist span{padding:3px 10px;}

    </style>
</head>
<body>
<script>
function confirmDel(id){
    if(window.confirm("确定删除？")){
        //如果删除 跳转到del.php页面
        location.href = "del.php?id="+ id;
    }
}
</script>
<div class="container clearfix">
    <div id="header" class="clearfix">
        <h3>欢迎来到新闻管理界面！</h3>
        <input type="button" value="添加新闻" id="add" onClick="javascript:location.href='add.php'">
    </div>
    <table id="news_table">
        <tr>
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
        while($arr = mysql_fetch_assoc($result)){
        ?>
        <tr align="center">
            <td><?php echo $arr['id']?></td>
            <td align="left"><a target="_blank" href="content.php?id=<?php echo $arr['id']?>"><?php echo $arr['title']?></a></td>
            <td><?php echo $arr['author']?></td>
            <td><?php echo $arr['source']?></td>
            <td><?php echo $arr['orderby']?></td>
            <td><?php echo $arr['hits']?></td>
            <td><?php echo date("Y-m-d H:i",$arr['addate'])?></td>
            <td>
                <a href="edit.php?id=<?php echo $arr['id']?>">修改</a> |
                <a href="javascript:void(0)" onClick="confirmDel(<?php echo $arr['id']?>)">删除</a>
            </td>
        </tr>
        <?php
           }
        ?>
        <tr>
            <td colspan="8" align="center" class="pagelist">
                <?php
                    $prev = $page - 3;
                    $next = $page + 3;
                    if($prev < 1){$prev = 1;}
                    if($next > $pages){$next = $pages;}
                    for($i = $prev; $i<$pages;$i++){
                        //如果是当前页，则不添加连接
                        if($i == $page){
                            echo "<span>$i</span>";
                        } else{
                            echo "<a href='manage.php?page=$i'>$i</a>";
                        }
                    }
                ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>

