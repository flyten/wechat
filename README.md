# WeChat Robot
一款基于PHP开发的微信机器人程序（个人号非公众号），仅供个人学习及研究

![image](https://img.shields.io/badge/PHP-7.0-orange.svg?style=flat)
![image](https://img.shields.io/badge/license-MIT-green.svg?style=flat)

## 依赖

| 环境          | 版本           |
| ------------- | ------------- |
| [PHP](http://www.php.net)           | \>=7.0 | 
| [Swoole 扩展](http://www.swoole.com/)    | \>=1.9.*      |
| [Fileinfo 扩展](http://php.net/manual/en/book.fileinfo.php)  | \>=1.0.*      |
| [Posix 扩展](http://www.php.net/manual/en/book.posix.php)     | -             |

## 特点

1. 支持扫码后5分钟内免扫码登录
2. 异步回复消息（基于swoole的process）
3. 扫码登录后，支持以守护进程运行
4. 自动保存撤回消息文本及资源类型数据
5. 支持定时任务 (类似Crontab)
6. 目前可识别的类型
    1. 文本消息
    2. 图片消息
    3. 动画表情消息
    4. 语音消息
    5. 视频消息
    6. 小视频消息
    7. 红包消息
    8. 撤回消息
    9. 转账消息
    10. 群系统消息

## Todo

1. 逐步提升稳定性
2. 增加异常退出、程序崩溃的observer
3. 增加database和cache相关组件支持
4. 提供HTTP协议API

## 安装

#### 通过Git

1. 下载
```
git clone https://github.com/im050/wechat.git
```
2. 更新依赖包
```
composer update
```

#### 通过Composer (推荐)

```
composer require im050/wechat
```

## 运行
```
php example/example.php
```

[查看demo代码](https://github.com/im050/wechat/blob/master/example/example.php)

## 更好的选择

1. [littlecodersh/ItChat](https://github.com/littlecodersh/ItChat) 
2. [HanSon/vbot](https://github.com/HanSon/vbot) 
3. [lbbniu/WebWechat](https://github.com/lbbniu/WebWechat) 

## 常见问题

1. **Q: 无法通过getContactByNickName获取到指定群？**    
> A: 将群聊保存至通讯录
2. **Q: 同步消息失败等无法获取最新消息**    
> A: 尝试删除临时文件目录下的cookies.txt后重新登录
3. **Q: 免扫码登录不起作用**  
> A: 经测试发现，未绑定手机号的微信账号无法免扫码登录

## 配置参数说明
    $config = [
        'log'     => [
            'level'            => Logger::INFO, //日志级别
            'path'             => '', //常规日志路径
            'message_log_path' => '' //消息日志路径
        ],
        'robot'   => [
            'tmp_path'          => '', //临时文件目录
            'save_qrcode'       => true, //是否保存二维码
            'auto_download'     => true, //是否自动下载
            'daemonize'         => false, //守护进程
            'task_process_num'  => 1, //任务进程数
            'providers'         => [], //服务提供注册类
            'max_message_items' => 2048 //最大消息保留数
        ],
        'cookies' => [
            'file' => '' //cookie存放文件, 默认tmp路径+cookies.txt
        ],
        'http' => [
            'timeout' => 60,
            'connect_timeout' => 10,
            'cookies' => true,
            'headers' => [
                'User-Agent' => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
                'Accept'     => 'application/json',
                'Accept-Encoding' => 'gzip'
            ],
            'allow_redirects' => false,
            'verify' => true,
        ]
    ];
    

## 截图

 ![image](https://github.com/im050/wechat/raw/master/screenshots/screenshot.png)