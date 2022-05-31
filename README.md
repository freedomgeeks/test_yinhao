
## 如何运行 ？

queryQQ-test.html 托拽到浏览器即可运行


## yii-basic-2.0.15/basic运行

### 新建数据库

首先新建一个数据库：interview_yinghao，然后导入interview_yinghao.sql文件

### 下载依赖文件

把代码拉到本地，进入项目根目录：yii-basic-2.0.15\basic

然后命令行执行：composer install

如果报版本问题，执行：

composer install --ignore-platform-reqs
### or
composer update --ignore-platform-reqs

### 浏览器访问

test.com/index.php?r=export/datalist

如果没有配置虚拟站点：

localhost/yii-basic-2.0.15/basic/web/index.php?r=export/datalist
