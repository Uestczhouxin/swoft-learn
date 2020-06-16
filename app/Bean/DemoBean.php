<?php declare(strict_types=1);

namespace App\Bean;
use Swoft\Co;
use Swoft\Log\Helper\Log;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class DemoBean
 * @bean("demoBean")
 * @package App\Bean
 */
class DemoBean
{
    public function __construct()
    {

    }

    public function say($data = [])
    {
        Log::info('test bean', [$data]);
    }
}
