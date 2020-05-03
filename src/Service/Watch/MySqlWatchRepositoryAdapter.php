<?php

namespace App\Service\Watch;

use App\DTO\WatchDto;
use App\Exception\MySqlRepositoryException;
use App\Repository\MySqlWatchRepository;

class MySqlWatchRepositoryAdapter implements WatchExternalSourceInterface
{
    private MySqlWatchRepository $mySqlWatchRepository;

    public function __construct(MySqlWatchRepository $mySqlWatchRepository)
    {
        $this->mySqlWatchRepository = $mySqlWatchRepository;
    }

    public function retrieveById(int $id): ?WatchDto
    {
        try {
            $watch = $this->mySqlWatchRepository->getWatchById($id);
        } catch (MySqlRepositoryException $ex) {
            return null;
        }

        return new WatchDto($watch->id, $watch->title, $watch->price, $watch->description);
    }
}
