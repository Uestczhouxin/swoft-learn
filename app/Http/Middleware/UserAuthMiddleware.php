<?php declare(strict_types=1);


namespace App\Http\Middleware;

use App\Bean\UserTokenBean;
use App\Model\User;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Bean\BeanFactory;
use Swoft\Co;

/**
 * Class UserAuthMiddleware
 * @package App\Http\Middleware
 * @Bean()
 */
class UserAuthMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $auth = $request->input('auth');
        if (!$auth) {
            return context()->getResponse()->withAddedHeader('Content-Type', 'application/json')->withStatus('401')->withData([
                'code' => 401,
                'message' => 'Access denied',
                'data' => []
            ]);
        }
        $token = BeanFactory::getRequestBean(UserTokenBean::class, (string) Co::tid());
        $token->setUser(new User($auth));
        return $handler->handle($request);
    }
}
