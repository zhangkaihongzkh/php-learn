<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="//cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="//cdn.bootcss.com/font-awesome/4.7.0/fonts/fontawesome-webfont.svg" rel="stylesheet">
<title>用户登录</title>
<style type="text/css">
*{
    font-family:'微软雅黑';
}
#loginBox{
   width: 360px;
   position: relative;
   margin:200px auto;
   border: 1px solid #b5b5b5;
   padding: 5px 10px;
   text-align: center;
   background:#f8f8f8;
}

#form1{
    position:relative;
    max-width:480px;
    margin:20px auto;
}
#form1>div{
    position:relative;
    height:46px;
    border:none;
    width:100%;
    background:#fff;
}
#form1>div>span{
    position:absolute;
    width:40px;
    height:40px;
    line-height:40px;
    text-align:center;
    top:10px;
    left:1px;
}
#form1 input:focus,
#form1 input{
    border:none;
    outline:none;
}
#user-pass input,
#user-name input{
    width: 310px;
    padding:0 10px 0 40px;
    font-size:14px;
    line-height:18px;
    height:40px;
}
#user-submit input{
    border:1px solid  #e93854;
    font-size:14px;
    color:#e93854;
    width:100%;
    height:100%;
    background-color:#fff;
    cursor:pointer;
}
#user-submit input:hover{
    background-color:#e93854;
    color:#fff;
    transition: color 0.25s ease,background-color 0.25s ease;
    -webkit-transition: color 0.25s ease,background-color 0.25s ease;
}
</style>
</head>

<body>
<div id="loginBox">
    <h2>登陆管理系统</h2>
    <form action="login_check.php" method="post" name="form1" id="form1">
        <div id="user-name">
            <span><i class="fa fa-user-o"></i></span>
            <input type="text" id="username" placeholder="请输入用户名" name="username">
        </div>
        <div id="user-name">
            <span><i class="fa fa-lock"></i></span>
            <input type="password" id="password"placeholder="请输入密码" name="password">
         </div>
        <div id="user-submit">
            <input type="submit" value="登陆">
            <input type="hidden" name="ac" value="login">
        <div>
    </form>
</div>
</body>
</html>
