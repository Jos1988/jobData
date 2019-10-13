<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class IpListener
{
    /**
     * @var string[]
     */
    private $whiteList;

    public function __construct(array $whiteList)
    {
        $this->whiteList = $whiteList;
    }

    public function onKernelRequest(RequestEvent $event)
    {
        if (!in_array($_SERVER['REMOTE_ADDR'], $this->whiteList, true)) {
            throw new AccessDeniedException(sprintf('IP (%s) is not white listed.', $_SERVER['REMOTE_ADDR']));
        }
    }
}