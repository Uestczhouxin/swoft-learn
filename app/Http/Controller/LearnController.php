<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://swoft.org/docs
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Bean\DemoBean;
use App\Bean\UserTokenBean;
use Swoft\Bean\BeanFactory;
use Swoft\Co;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
use Swoft\Log\Helper\Log;

// use Swoft\Http\Message\Response;

/**
 * Class LearnController
 *
 * @Controller(prefix="learn")
 * @package App\Http\Controller
 */
class LearnController{
    /**
     * Get data list. access uri path: learn
     * @RequestMapping(route="learn", method=RequestMethod::GET)
     * @return array
     */
    public function index(): array
    {
//        Co::create(function () {
//            echo date('Y-m-d H:i:s');
//            Co::sleep(5);
//            Log::info('swoft go');
//        });
        \Swoft::trigger('event.demosss');
        return ['item0', 'item1'];
    }

    /**
     * Get one by ID. access uri path: learn/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::GET)
     * @return array
     */
    public function get(): array
    {
        $token = BeanFactory::getRequestBean(UserTokenBean::class, (string) Co::tid());
        $userid = $token->getUser()->getUserid();
        $content = 'start ' . $userid;
        Co::sleep(mt_rand(500, 3000) / 1000);
        $token = BeanFactory::getRequestBean(UserTokenBean::class, (string) Co::tid());
        $userid = $token->getUser()->getUserid();
        $content .= 'end ' . $userid . PHP_EOL;
        echo $content;
        return [$userid];
    }

    /**
     * Create a new record. access uri path: learn
     * @RequestMapping(route="learn", method=RequestMethod::POST)
     * @return array
     */
    public function post(): array
    {
        return ['id' => 2];
    }

    /**
     * Update one by ID. access uri path: learn/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::PUT)
     * @return array
     */
    public function put(): array
    {
        return ['id' => 1];
    }

    /**
     * Delete one by ID. access uri path: learn/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::DELETE)
     * @return array
     */
    public function del(): array
    {
        return ['id' => 1];
    }
}
