<?php declare(strict_types=1);
namespace App\Bean;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\Annotation\Mapping\Inject;
/**
 * Class PrototypeBean
 * @bean(name="prototype", scope=Bean::PROTOTYPE)
 */
class PrototypeBean
{
    /**
     * @inject DemoBean
     * @var DemoBean
     */
    protected $log;

    protected $num = 0;

    public function sayNum()
    {
        $this->num++;
        $this->log->say($this->num);
    }
}
