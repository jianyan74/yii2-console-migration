
由于 [e282486518/yii2-console-migration](https://github.com/e282486518/yii2-console-migration) 不怎么维护 所以建立该项目


注意：如果你使用的是php7.2，那么yii必须使用v2.0.15.1以上，因为yii2核心类Object和php7.2的保留类Object冲突。

```php
use yii\base\Object // PHP7.1以及之前版本
use yii\base\BaseObject // PHP7.2
```

yii2使用migration备份和还原数据库
===========================
yii2使用migration备份和还原数据库，最初只想做一个在命令行中备份的功能，后来将类重组了，增加了其他扩展使用方法。


安装 Installation
------------

安装此扩展的首选方式是通过 [composer](http://getcomposer.org/download/).

运行

```
composer require jianyan/yii2-console-migration "@dev"
```

或者添加

```
"jianyan/yii2-console-migration": "*"
```

到 `composer.json` 文件的对应地方.


命令行中备份数据表：
-----

在```console\config\main.php```中添加  :

```php
'controllerMap' => [
    'migrate' => [
        'class' => 'jianyan\migration\ConsoleController',
    ],
],
```

在命令行中使用方式：
```
php ./yii migrate/backup all #备份全部表
php ./yii migrate/backup table1,table2,table3... #备份多张表
php ./yii migrate/backup table1 #备份一张表

php ./yii migrate/up #恢复全部表
```

在后台中备份数据表：
-----
在后台的控制器中，例如```PublicController```中加入下面的代码：
```php
public function actions()
{
    return [
        'backup' => [
            'class' => 'jianyan\migration\WebAction',
            'returnFormat' => 'json',
            'migrationPath' => '@console/migrations'
        ]
    ];
}
```
在后台中发送一个ajax请求到```/admin/public/backup?tables=yii2_ad,yii2_admin```即可。

其他使用方法：
-----

对于想做更多扩展的朋友，可以直接继承```jianyan\migration\components\MigrateCreate```

或者使用一下代码：
```php
$migrate = Yii::createObject([
        'class' => 'jianyan\migration\components\MigrateCreate',
        'migrationPath' => $this->migrationPath
]);
$migrate->create($table);
```
