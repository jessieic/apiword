> 本文档是配置openstack与edu项目连接的文档 
> 在运行完config/edusoho-install/下的所有安装脚本之后进行以下配置：

## 1. 配置表：

- 配置表为osconfig
- 需要配置的字段：
- 
字段 | 含义| 举例 | 说明 
---|---|---|---
osuname | openstack系统用户名 | education44  |为要使用虚拟机的网站 创建openstack的用户名
ospwd | openstack系统密码 | Rising123!@# |为要使用虚拟机的网站 创建openstack的用户密码
ospurl | openstack接口地址 | http://193.168.14.69 |依具体情况而定

## 2. 给脚本root权限
>sudo chmod -R 0777 {edusoho根目录}/app/php_script
>sudo chown -R root:root {edusoho根目录}/app/php_script

## 3. 执行初始化安装脚本：

> 安装脚本的配置文件位置：{edusoho根目录}/app/php_script/sys.php
> 配置文件可以对虚拟机网络参数进行配置
> 可以配置:


```
        /**
         * 浮动ip数量
         */
        'float_ip_num' => 100,
        /**
         * 情景主机可使用的网络数量
         */
        'user_net_num' => 100,
        /**
         * 交换机子网：allocation_pools.start 值
         */
        'sub_start' => 20,
        /**
         * 交换机子网：allocation_pools.end 值
         */
        'sub_end' => 250,
        /**
         * 主网ip（仅配置给交换机）
         */
        'mainnetip' => '10.1.1.0/24',
        /**
         * 网关（仅配置给交换机）
         */
        'gateway_ip' => '10.1.1.1',
        /**
         * DNS(所有网络均配置)
         */
        'dns' => '8.8.8.8',
        /**
         * cidr(所有第三层网络均配置)
         */
        'cidr' => "172.16.0.0/24",   
```

- **运行初始化脚本的时候请不要开启定时器！！！ **

- 确认后root权限执行

```
php {edusoho根目录}/app/php_script/Install_script.php
```


- 初始脚本会新建edusoho网站使用的虚拟机账户，配置主机类型，安装所有网络，配置路由信息。
- 用时2～3分钟，请耐心运行完毕。
- 执行脚本的过程中请不要对openstack和edu项目中有关虚拟机的部分做任何操作！！


**注：如果初始化有问题需要 清理网络 时 ：**


```
php {edusoho根目录}/app/php_script/clean_network.php
```


- 脚本会清理openstack上的所有网络，所有路由，所有浮动ip。
- 执行脚本的过程中请不要对openstack和edu项目中有关虚拟机的部分做任何操作！！

## 4. 部署定时任务
- 执行
```
crontab -e
```
- 添加：
>\* \* \* \* \*  {php全路径} {edusoho根目录}/app/php_script/timing.php
- 电大上的部署例子：
>\* \* \* \* \*  /usr/bin/php /var/www/edutest/app/php_script/timing.php

## 5. 另：关于备份操作

- 添加: 项目迁移后，在openstack和edu的数据库部署完毕之后执行：

- 修改osconfig表

字段 | 含义| 举例 | 说明 
---|---|---|---
ospurl | openstack接口地址 | http://xxx.xxx.xxx.xxx | 修改为新的openstack接口地址

- 运行：
```
php {edusoho根目录}/app/php_script/Backup_script.php
```

- 备份脚本功能：
 * 1.清理虚拟机数据（虚拟机无法迁移只能删除旧数据)
 * 2.重新安装配置网络

- 之后部署定时器



