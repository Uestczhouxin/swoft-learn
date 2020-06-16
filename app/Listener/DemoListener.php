<?php declare(strict_types=1);
namespace App\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Log\Helper\Log;
use Swoft\Event\Annotation\Mapping\Listener;

/**
 * Class DemoListener
 * @Listener("event.demo")
 */
class DemoListener implements EventHandlerInterface
{
    public function handle(\Swoft\Event\EventInterface $event): void
    {
        Log::info('event go');
    }
}
