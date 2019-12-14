### 关于项目中的定时器

- 为了获取时时cpu利用率，网卡吞吐量等数据。项目引入类workerman框架作为定时器工具
- 
- 定时器启动脚本位置：/项目根目录/public/StartTimer.php
- 定时器脚本日志位置：/项目根目录/vendor/Workerman/workerman.log

**root权限下**：
- 定时器调试：php /项目根目录/public/StartTimer.php start
- 定时器启动：php /项目根目录/public/StartTimer.php start -d
- 定时器停止 php /项目根目录/public/StartTimer.php stop

**需要配置定时器脚本，服务器开机自启动 ubuntu：**

编辑“/etc/rc.local”，把启动程序的shell命令输入进去即可.

```sh
/path/of/php /项目根目录/public/StartTimer.php start -d

```
**需要配置定时器脚本，服务器开机自启动 debian：**

创建industry-starttimer.sh文件， 文件内容如下：
[industry-starttimer](/industrySystemIndex/industry-starttimer.sh)

```sh
cp  industry-starttimer.sh   /lib/modules/industry-starttimer.sh
```

创建industry-starttimer-b.sh文件， 所在目录：/etc/init.d/industry-starttimer-b.sh文件内容如下：

[industry-starttimer-b](/industrySystemIndex/industry-starttimer-b.sh)
运行安装命令
```sh
cp industry-starttimer-b /etc/init.d/
cd /etc/init.d/
chmod +x industry-starttimer-b
update-rc.d industry-starttimer-b defaults
```


