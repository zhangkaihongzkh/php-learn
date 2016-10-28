<?php
    //确认是否连接上数据库
    include "conn.php";
    //判断表单是否提交
    if(isset($_POST["ac"]) && $_POST["ac"] == "login"){
        //获取表单数据
        $username = $_POST["username"];
        $password = $_POST["password"];
        //构建要查询的SQL语句
        $sql = "SELECT * FROM 007_admin WHERE username='$username' and password='$password'";
        //执行SQL语句
        echo "$sql";
        $result = mysql_query($sql);
        echo "$result";
        //获取结果集中的记录条数
        $records = mysql_fetch_row($result);
        //判断是否匹配
        if($records) {
            $lastloginip = $_SERVER["REMOTE_ADDR"];
            /*echo "最近登陆ip：$lastloginip";*/
            $lastlogintime = time();
            //构建新的sql语句
            $sql = "UPDATE 007_admin SET lastloginip='$lastloginip',lastlogintime='$lastlogintime',loginhits=loginhits+1 WHERE username='$username'";
            //执行SQL语句
            mysql_query($sql);
            //成功后跳转页面
            $url = "manage.php";
            $message = urlencode("用户登录成功！");
            header("location:success.php?url=$url&message=$message");

        } else{
            $message = urlencode("用户名或者密码不正确！");
            header("location:error.php?message=$message");
        }

    } else{
       //非法操作
       $message = urlencode("非法操作");
       header("location:error.php?message=$message");
    }

?>