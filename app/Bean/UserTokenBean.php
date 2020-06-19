<?php declare(strict_types=1);


namespace App\Bean;

use App\Model\User;
use Swoft\Bean\Annotation\Mapping\Bean;

/**
 * Class UserTokenBean
 * @package App\Bean
 * @Bean(scope=Bean::REQUEST)
 */
class UserTokenBean
{
    private $user;

    /**
     * @return mixed
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
}
