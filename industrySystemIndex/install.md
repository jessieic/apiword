### 关于工控安装部署项目流程
* 一、 VUE 项目文件生成
```
git clone git@193.168.14.66:school/industryVue.git
   1、修改config/prod.env.js  API_ROOT 目录  '"api.php"'
   2、Npm install ,若缺少依赖安装即可
   3、Npm run build 项目打包
```
* 二、 api包部署
```
git@193.168.14.66:school/industryApi.git

1/public/index.php
    header("Access-Control-Allow-Origin: *");

2、public/docs.php
    $_SERVER['HTTPS']='';
    $_SERVER['HTTP_HOST']='193.168.14.62:4084';
    $_SERVER['SCRIPT_NAME']='/';
3、 config/sys.php
   'gksocket' => array(
          'ip' => '193.168.14.101',
          'port' => 9998
      ),
4、执行后复制disk/* 文件到API项目中public目录下
    cp -r  industryVue/disk/* industryApi/public/

5、修改industryApi/config/dbs.php 相关数据库配置信息
```

* 三、 项目服务配置

apache2 配置文件
[industry.conf](/industrySystemIndex/industry.conf)

nginx 配置文件
[industryMasterVueMerge.conf](/industrySystemIndex/industryMasterVueMerge.conf)

* 四、 部署包文件上传

* 五、 定时任务添加

vi /etc/crontab
输入以下内容
 0 1 * * *  root php  /var/www/industryApi/public/riskStatistics.php
 @reboot  root php  /var/www/industryApi/public/StartTimer.php start -d

~~* 六、 运行关于定时器~~

~~[TimerDes.md](/apiContent.php?file=TimerDes&type=industrySystemIndex)~~

* 七、 定时任务添加
1、数据库连接
```
return array(
    /**
     * DB数据库服务器集群
     */
    'servers' => array(
        'db_master' => array(                       //服务器标记
            'type'      => 'mysql',                 //数据库类型，暂时只支持：mysql, sqlserver
            'host'      => '127.0.0.1',             //数据库域名
            'name'      => 'snort',               //数据库名字
            'user'      => 'snort',                  //数据库用户名
            'password'  => '123456',	                    //数据库密码
            'port'      => 3306,                    //数据库端口
            'charset'   => 'UTF8',                  //数据库字符集
        ),
    ),

    /**
     * 自定义路由表
     */
    'tables' => array(
        //通用路由
        '__default__' => array(
            'prefix' => 'sindustry_',
            'key' => 'id',
            'map' => array(
                array('db' => 'db_master'),
            ),
        ),

        /**
        'demo' => array(                                                //表名
            'prefix' => 'tbl_',                                         //表名前缀
            'key' => 'id',                                              //表主键名
            'map' => array(                                             //表路由配置
                array('db' => 'db_master'),                               //单表配置：array('db' => 服务器标记)
                array('start' => 0, 'end' => 2, 'db' => 'db_master'),     //分表配置：array('start' => 开始下标, 'end' => 结束下标, 'db' => 服务器标记)
            ),
        ),
         */
    ),
);
```

*八、 iso文件打包格式
1、文件包名称：gk_manage.tar
2、文件包
[gk_manage.tar](/industrySystemIndex/gk_manage.tar)
3、目录：
```
gk_manage
└|setup.sh
└|project.tar
└|└|etc
└|└|└|nginx
└|└|└|└|conf.d
└|└|└|└|└|industry
└|└|└|└|└|industry.conf
└|└|var
└|└|└|log
└|└|└|└|nginx
└|└|└|└|└|log
└|└|└|└|└|└|industryApi.access.log
└|└|└|└|└|└|industryApi.error.log
└|└|└|www
└|└|└|└|industryApi 项目名称
```

*九、数据库更新  run_once.tar（有数据修改需要更新的文件;snort-dafault-data.sql）
1、文件包
  [run_once.tar](/industrySystemIndex/run_once.tar)
2、目录：
```
└|logo.sh
└|mysql.sh
└|run.sh
└|run_once.service
└|snort-dafault-data.sql   数据库snort默认数据
```