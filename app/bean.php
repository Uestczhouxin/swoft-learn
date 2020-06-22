<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

use Swoft\Db\Database;
use Swoft\Db\Pool;
use Swoft\Http\Server\HttpServer;
use Swoft\Http\Server\Swoole\RequestListener;
use Swoft\Redis\RedisDb;
use Swoft\Rpc\Client\Client as ServiceClient;
use Swoft\Rpc\Client\Pool as ServicePool;
use Swoft\Rpc\Server\ServiceServer;
use Swoft\Server\SwooleEvent;
use Swoft\Task\Swoole\FinishListener;
use Swoft\Task\Swoole\TaskListener;
use Swoft\WebSocket\Server\WebSocketServer;

return [
    'noticeHandler'      => [
        'logFile' => '@runtime/logs/notice-%d{Y-m-d-H}.log',
    ],
    'applicationHandler' => [
        'logFile' => '@runtime/logs/error-%d{Y-m-d}.log',
    ],
    'logger'             => [
        'flushRequest' => false,
        'enable'       => true,
        'json'         => true,
    ],
    'httpServer'         => [
        'class'    => HttpServer::class,
        'port'     => 17306,
        'listener' => [
            // 'rpc' => bean('rpcServer'),
            // 'tcp' => bean('tcpServer'),
        ],
        'process'  => [
//             'monitor' => bean(\App\Process\MonitorProcess::class)
            // 'crontab' => bean(CrontabProcess::class)
        ],
        'on'       => [
            // SwooleEvent::TASK   => bean(SyncTaskListener::class),  // Enable sync task
            SwooleEvent::TASK   => bean(TaskListener::class),  // Enable task must task and finish event
            SwooleEvent::FINISH => bean(FinishListener::class)
        ],
        /* @see HttpServer::$setting */
        'setting'  => [
            'task_worker_num'       => 2,
            'task_enable_coroutine' => true,
            'worker_num'            => 1,
            // static handle
            // 'enable_static_handler'    => true,
            // 'document_root'            => dirname(__DIR__) . '/public',
        ]
    ],
    'httpDispatcher'     => [
        // Add global http middleware
        'middlewares'     => [
            \App\Http\Middleware\FavIconMiddleware::class,
            \App\Http\Middleware\UserAuthMiddleware::class,
            \App\Http\Middleware\JsonMiddleware::class,
//            \Swoft\Http\Session\SessionMiddleware::class,
            // \Swoft\Whoops\WhoopsMiddleware::class,
            // Allow use @View tag
            \Swoft\View\Middleware\ViewMiddleware::class,
        ],
        'afterMiddlewares' => [
            \Swoft\Http\Server\Middleware\ValidatorMiddleware::class
        ]
    ],
    'db'                 => [
        'class'    => Database::class,
        'dsn'      => 'mysql:dbname=test;host=mysql-learn:port=3306',
        'username' => 'root',
        'password' => '123456',
        'charset'  => 'utf8mb4',
    ],
    'db.pool'           => [
        'class'    => Pool::class,
        'database' => bean('db'),
    ],
    'migrationManager'   => [
        'migrationPath' => '@database/Migration',
    ],
    'redis'              => [
        'class'    => RedisDb::class,
        'host'     => 'redis-learn',
        'port'     => 6379,
        'database' => 0,
        'option'   => [
            'prefix' => 'swoft:'
        ]
    ],
    'redis.pool'    => [
        'class'       => Swoft\Redis\Pool::class,
        'redisDb'     => bean('redis'),
        'minActive'   => 10,
        'maxActive'   => 20,
        'maxWait'     => 0,
        'maxWaitTime' => 0,
        'maxIdleTime' => 60,
        'option'   => [
            'prefix' => env('URL_API_REDIS_PREFIX', 'swoft:'),
        ]
    ],
//    \App\Bean\DemoBean::class => [
//        'class' => \App\Bean\DemoBean::class,
//    ],
];
