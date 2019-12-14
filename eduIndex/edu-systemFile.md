#### edu及pm项目相关配置表：

#####edu相关配置文件如下：
* 1、onlyoffice相关配置文件
>rses/app/onfice.yml   需要修改参数doc_serv_url（onlyoffice服务端口）
```yml
doc_serv_url: 'http://193.168.14.29:8088'
```
* 2、数据库相关配置文件
>rses/web/confg_file_user/conf/educonf/parameters.yml 以下参数都需要修改
```yml
parameters:
    database_host: 127.0.0.1      #连接的数据库ip
    database_name: 'edu-203-0322' #连接的数据库名称
    database_user: root           #连接的数据库账号
    database_password: '123456'   #连接的数据库密码
    process_maker_url: http://192.168.90.203:8080/  #工作流域名
    process_maker_local_url: http://127.0.0.1:8080/     #工作流本地主机端口
    files_flag: 1                           #文件地址标识是否是本地1、本地地址信息和pm项目地址   2公共地址信息
    files_url:                          #文件地址 标识为1则为空   标识为2则不为空
    vmmaster_url: http://192.168.90.40:6400/        #升级服务主机端口
    vmmaster_local_url: http://127.0.0.1:6400/      #升级服务本地主机端口

```

#####pm相关配置文件如下：
* 1、项目路径配置文件
>pm/workflow/public_html/config_files_user/conf/workflow/paths_installed.php   以下参数都需要修改
```
  define('PATH_DATA',         'D:/phpstudy/PHPTutorial/WWW/pm/shared/');   //项目数据所在地址 修改为： 路径+项目名+/shared/
  define('PATH_C',            'D:/phpstudy/PHPTutorial/WWW/pm/shared/compiled/'); //项目插件地址 修改为： 路径+项目名+/shared/compiled/
```
* 2、项目数据库配置文件
>pm/workflow/public_html/config_files_user/conf/workflow/db.php   以下参数都需要修改
```php
define ('DB_HOST',        '127.0.0.1' );   //连接的数据库ip
define ('DB_NAME',        'dianda-0304' ); //连接的数据库名称
define ('DB_USER',        'root' );        //连接的数据库账号
define ('DB_PASS',        '123456' );      //连接的数据库密码
define ('DB_RBAC_HOST',   '127.0.0.1' );   //连接的数据库ip
define ('DB_RBAC_NAME',   'dianda-0304' ); //连接的数据库名称
define ('DB_RBAC_USER',   'root' );        //连接的数据库账号
define ('DB_RBAC_PASS',   '123456' );      //连接的数据库密码
define ('DB_REPORT_HOST', '127.0.0.1' );   //连接的数据库ip
define ('DB_REPORT_NAME', 'dianda-0304' ); //连接的数据库名称
define ('DB_REPORT_USER', 'root' );        //连接的数据库账号
define ('DB_REPORT_PASS', '123456' );      //连接的数据库密码
define( 'EDU_PATH_URL',     'http://eduwebmaster.com' );   //安全教育系统域名
define( 'EDU_PATH_URL_LOCAL',     'http://eduwebmaster.com' );//安全教育系统本地地址
```


#####nginx相关配置文件：
* 1、edu相关nginx配置文件
>nginx/conf.d/rses.conf
```
server {
    listen       80;   //项目监听的端口
    server_name  192.168.90.203;  //项目访问域名
    include conf.d/edu;  //项目详情配置文件
}
```
* 2、pm相关nginx配置文件
>nginx/conf.d/pm.conf
```
server {
    listen       8080; //项目监听的端口
    server_name  192.168.90.203; //项目访问域名
    include conf.d/pmtest;  //项目详情配置文件
}
```