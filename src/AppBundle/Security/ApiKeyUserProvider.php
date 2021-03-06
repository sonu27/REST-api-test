<?php
namespace AppBundle\Security;

use AppBundle\Entity\UserRepository;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    private $userRepo;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    public function getUsernameForApiKey($apiKey)
    {
        $username = null;

        $user = $this->userRepo->findByApiKey($apiKey);
        if ($user !== null) {
            $username = $user->getEmail();
        }

        return $username;
    }

    public function loadUserByUsername($username)
    {
        return $user = $this->userRepo->findByEmail($username);
    }

    public function refreshUser(UserInterface $user)
    {
        // this is used for storing authentication in the session
        // but in this example, the token is sent in each request,
        // so authentication can be stateless. Throwing this exception
        // is proper to make things stateless
        throw new UnsupportedUserException();
    }

    public function supportsClass($class)
    {
        return 'AppBundle\Entity\User' === $class;
    }
}
