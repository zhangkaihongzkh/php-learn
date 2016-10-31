# php-learn
## sites2--新闻管理平台
主要功能逻辑：
1. 后台登陆界面:index.php</br>
2. login_check.php登陆检查界面</br>
3. 将用户输入信息与数据库进行比对
        - 如果匹配到，更新登陆时间，登陆ip等信息
            - 跳转到success.php界面
        - 匹配不到
            - 提转到error.php界面
            
### 文件目录介绍
* conn.php    ----连接数据库
* manage.php  ----管理主界面（含分页）
* del.php     ----删除记录操作逻辑，操作完成跳转到对应逻辑几面
* error.php   ----错误处理
* success.php ----操作成功处理
* edit.php    ----编辑信息处理（含KINDEDIT插件）
* add.php     ----增加数据库字段处理（含KINDEDIT插件）
* content.php ----显示具体新闻页面
* js          ----KIND插件

### 数据库
007_online 


