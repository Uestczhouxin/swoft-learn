<?php


namespace App\Console\Command;

use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Console\Annotation\Mapping\CommandOption;
use Swoft\Console\Input\Input;

/**
 * Class WuhaozhanCollect
 * @package App\Console\Command
 * @Command(name="wuhaozhan", desc="五号站数据操作")
 */
class WuhaozhanCollect
{
    const WEBSITE_HOST = 'https://www.wuhaozhan.net/';
    /**
     * @CommandMapping(name="collect", desc="数据抓取")
     * @CommandOption(name="type", default="movie")
     */
    public function collect(Input $input)
    {
        $type = $input->getOpt('type');
        switch ($type) {
            case 'article' :
                $url = self::WEBSITE_HOST . 'review/';
                break;

            case 'movie':
            default:
                $url = self::WEBSITE_HOST . 'list/';
                break;
        }
        libxml_use_internal_errors(true);
        $query = bean('jaeger')::get($url);
        echo $query->find('title')->text();
    }
}
