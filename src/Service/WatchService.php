<?php

namespace App\Service;

use App\DTO\WatchDto;
use App\Service\Watch\WatchExternalSourceInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class WatchService
{
    private CacheInterface $watchCache;
    private WatchExternalSourceInterface $watchExternalSource;

    public function __construct(CacheInterface $watchCache, WatchExternalSourceInterface $watchExternalSource)
    {
        $this->watchCache = $watchCache;
        $this->watchExternalSource = $watchExternalSource;
    }

    public function retrieveById(int $id): ?WatchDto
    {
        $watch = $this->watchCache->get((string)$id, function (ItemInterface $item) use ($id) {
            $watch = $this->watchExternalSource->retrieveById($id);

            if (null !== $watch) {
                $item->set($watch);
            }

            return $watch;
        });

        if (null === $watch) {
            throw new NotFoundHttpException();
        }

        return $watch;
    }
}
