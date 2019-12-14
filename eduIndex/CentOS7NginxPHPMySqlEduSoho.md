##  安装相关

###### 更新yum软件包

```
yum -y check-update
```


###### 更新系统

```
yum -y update
```


###### 从企业版Linux库配置包中安装扩展包。

```
yum -y install epel-release
```


###### 防火墙

```
systemctl stop firewalld.service ###### 停止firewall
systemctl disable firewalld.service ###### 禁止firewall开机启动
yum -y install iptables-services ###### 安装
iptables -I INPUT -m state --state NEW -m tcp -p tcp --dport 22 -j ACCEPT
iptables -I INPUT -m state --state NEW -m tcp -p tcp --dport 80 -j ACCEPT
iptables -I INPUT -m state --state NEW -m tcp -p tcp --dport 3306 -j ACCEPT
iptables-save > /etc/sysconfig/iptables
systemctl restart iptables.service
systemctl enable iptables.service
```


###### 关闭SELinux

```
if [ -f "/etc/selinux/config" ];then
sed -i 's/SELINUX=enforcing/SELINUX=disabled/' /etc/selinux/config -i
fi
```


###### 安装wget

```
yum -y install wget
```

###### 安装redis

```
yum -y install redis
if [ -f "/etc/redis.conf" ];then
sed -i 's/daemonize no/daemonize yes/' /etc/redis.conf -i
fi
systemctl start redis.service
systemctl enable redis.service
```


###### 安装vim

```
yum -y install vim
```


###### 安装nginx

```
wget https://nginx.org/packages/centos/7/noarch/RPMS/nginx-release-centos-7-0.el7.ngx.noarch.rpm
rpm -ivh nginx-release-centos-7-0.el7.ngx.noarch.rpm
yum -y install nginx 
systemctl start nginx.service
systemctl enable nginx.service
```


###### 安装mysql

```
wget https://repo.mysql.com/mysql57-community-release-el7.rpm
rpm -ivh mysql57-community-release-el7.rpm
yum -y install mysql mysql-server
systemctl start mysqld.service
systemctl enable mysqld.service
```


###### 安装php相关

```
wget https://mirror.webtatic.com/yum/el7/epel-release.rpm
rpm -ivh epel-release.rpm
wget https://mirror.webtatic.com/yum/el7/webtatic-release.rpm
rpm -ivh webtatic-release.rpm
yum -y install php56w php56w-cli php56w-common php56w-fpm php56w-gd php56w-mbstring php56w-intl php56w-mcrypt php56w-mysql php56w-mysql php56w-pdo php56w-xml php56w-pecl-redis.x86_64
systemctl start php-fpm.service
systemctl enable php-fpm.service

if [ -f "/etc/php.ini" ];then
sed -i '/^post_max_size =/c\post_max_size = 1024M' /etc/php.ini
sed -i '/^memory_limit =/c\memory_limit = 1024M' /etc/php.ini
sed -i '/^upload_max_filesize =/c\upload_max_filesize = 10240M' /etc/php.ini
sed -i '/^allow_url_fopen =/c\allow_url_fopen = On' /etc/php.ini
sed -i '/^max_execution_time =/c\max_execution_time = 600' /etc/php.ini
sed -i '/^max_input_time =/c\max_input_time= 120' /etc/php.ini
sed -i '/date.timezone =/c\date.timezone = PRC' /etc/php.ini
fi
```


######  安装定时工具

```
yum -y install crontabs
systemctl start crond.service
systemctl enable crond.service
```

## 配置相关

##### mysql 配置

###### 默认安装结束，mysql的root密码不为空，系统默认创建临时密码，执行
```
grep 'temporary password' /var/log/mysqld.log
```
###### 可以看到密码，如例子

```
2019-02-28T06:52:06.110216Z 1 [Note] A temporary password is generated for root@localhost: **************
```
###### 后面*的位置就是临时密码
###### 修改mysql root账户密码，否则mysql会不允许创核表等操作

```
mysql -hlocalhost -udocker -p{临时密码}

```
###### 新密码最好大写+小写+数字+符号
```
ALTER USER USER() IDENTIFIED BY 'QWEqwe123**';
```
###### 创建个新用户给edu网站使用

```
GRANT ALL PRIVILEGES ON *.* TO '{新用户名}'@'%' IDENTIFIED BY '{新密码}';
FLUSH PRIVILEGES;
```
###### 用户新用户创建数据库等

```
mysql -hlocalhost -u{新用户名} -p{新密码}；
CREATE DATABASE edusoho DEFAULT CHARACTER SET utf8；
...导入sql...
```
##### nginx配置

###### 修改nginx默认配置

```
vi /etc/nginx/nginx.conf
```


###### 在http{}配置中加入：

```
client_max_body_size 1024M;
```
###### 添加edu配置

```
vi /etc/nginx/conf.d/edusoho.conf
server {
    listen 80;
    server_name {域名};
    root /var/www/edusoho/web;

    access_log /var/log/nginx/edusoho.access.log;
    error_log /var/log/nginx/edusoho.error.log;

    location / {
        index app.php;
        try_files $uri @rewriteapp;
    }

    location @rewriteapp {
        rewrite ^(.*)$ /app.php/$1 last;
    }

    location ~ ^/udisk {
        internal;
        root /var/www/edusoho/app/data/;
    }

    location ~ ^/(app|app_dev)\.php(/|$) {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param  SCRIPT_FILENAME    $document_root$fastcgi_script_name;
        fastcgi_param  HTTPS              off;
        fastcgi_param HTTP_X-Sendfile-Type X-Accel-Redirect;
        fastcgi_param HTTP_X-Accel-Mapping /udisk=/var/www/edusoho/app/data/udisk;
        fastcgi_buffer_size 128k;
        fastcgi_buffers 8 128k;
    }

    location ~* \.(jpg|jpeg|gif|png|ico|swf)$ {
        expires 3y;
        access_log off;
        gzip off;
    }

    location ~* \.(css|js)$ {
        access_log off;
        expires 3y;
    }

    location ~ ^/files/.*\.(php|php5)$ {
        deny all;
    }

    location ~ \.php$ {
        fastcgi_pass   127.0.0.1:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        fastcgi_param  SCRIPT_FILENAME    $document_root$fastcgi_script_name;
        fastcgi_param  HTTPS              off;
        include        fastcgi_params;
    }
}
```

######  配置完毕重启相关软件
```
systemctl restart nginx.service
systemctl restart php-fpm.service
systemctl restart crond.service
```

