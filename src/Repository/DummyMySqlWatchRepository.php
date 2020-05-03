<?php

namespace App\Repository;

use App\DTO\MySqlWatchDTO;
use App\Exception\MySqlRepositoryException;
use App\Exception\MySqlWatchNotFoundException;

class DummyMySqlWatchRepository implements MySqlWatchRepository
{
    public function getWatchById(int $id): MySqlWatchDTO
    {
        $mod = $id % 3;

        if (0 === $mod) {
            return new MySqlWatchDTO(
                $id,
                sprintf('Watch %d', $id),
                random_int(200, 200000),
                sprintf('Watch %d description', $id)
            );
        }

        if (1 === $mod) {
            throw new MySqlWatchNotFoundException(sprintf('Watch %d not found', $id));
        }

        throw new MySqlRepositoryException('DB error');
    }
}
