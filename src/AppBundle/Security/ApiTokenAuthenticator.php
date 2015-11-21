<?php

namespace AppBundle\Security;
use Doctrine\ORM\EntityManager;
use KnpU\Guard\AbstractGuardAuthenticator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationCredentialsNotFoundException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
class ApiTokenAuthenticator extends AbstractGuardAuthenticator
{

    private $em;

    /**
     * ApiTokenAuthenticator constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }


    /**
     * @param Request $request
     * @return array|string
     */
    public function getCredentials(Request $request)
    {
        $token = $request->headers->get('x-token');

        return $token !== null ? $token :  false;
    }


    /**
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     * @return null|object
     */
    public function getUser($credentials, UserProviderInterface $userProvider = null)
    {
        $user = $this->em->getRepository('AppBundle:Admin')
            ->findOneBy(array('apiToken' => $credentials));
        // we could just return null, but this allows us to control the message a bit more
        if (!$user) {
            throw new AuthenticationCredentialsNotFoundException();
        }
        return $user;
    }


    /**
     * @param mixed $credentials
     * @param UserInterface $user
     */
    public function checkCredentials($credentials, UserInterface $user)
    {
        return;
    }


    /**
     * @param Request $request
     * @param AuthenticationException $exception
     * @return JsonResponse
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new JsonResponse(
        // you could translate the message
            array('message' => $exception->getMessageKey()),
            403
        );
    }


    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return;
    }


    /**
     * @return bool
     */
    public function supportsRememberMe()
    {
        return false;
    }


    /**
     * @param Request $request
     * @param AuthenticationException|null $authException
     */
    public function start(Request $request, AuthenticationException $authException = null)
    {
    }
}