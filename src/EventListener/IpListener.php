<?php

declare(strict_types=1);

namespace App\EventListener;

use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class IpListener
{
    private const WHITE_LIST = ['127.0.0.1'];
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
        if (!in_array($_SERVER['REMOTE_ADDR'], self::WHITE_LIST, true)) {
            throw new AccessDeniedException('IP is not white listed.');
        }
    }
}