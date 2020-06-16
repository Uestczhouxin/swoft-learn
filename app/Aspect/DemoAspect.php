<?php declare(strict_types=1);

namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\PointExecution;
use Swoft\Aop\Point\ProceedingJoinPoint;
use Swoft\Log\Helper\Log;
use App\Http\Controller\LearnController;

/**
 * Class DemoAspect
 * @package App\Aspect
 * @Aspect(order=1)
 *
 * @PointExecution(
 *     include={"LearnController::index"}
 * )
 */
class DemoAspect
{
    public $start;

    /**
     * @Before()
     */
    public function before()
    {
        $this->start = microtime(true);
    }

    /**
     * @After()
     */
    public function after()
    {
        $cost = microtime(true) - $this->start;
        Log::info('cost time', compact('cost'));
    }

    /**
     * @param ProceedingJoinPoint $joinPoint
     * @return mixed
     * @throws \Throwable
     * @Around()
     */
    public function around(ProceedingJoinPoint $joinPoint)
    {
        Log::info('start');
        $result = $joinPoint->proceed();
        Log::info('end');
        return $result;
    }
}
