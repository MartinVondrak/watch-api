<?php

namespace App\Repository;

use App\DTO\MySqlWatchDTO;
use App\Exception\MySqlRepositoryException;
use App\Exception\MySqlWatchNotFoundException;

interface MySqlWatchRepository
{
    /**
     * @param int $id
     *
     * @return MySqlWatchDTO
     *
     * @throws MySqlWatchNotFoundException
     * @throws MySqlRepositoryException
     */
    public function getWatchById(int $id): MySqlWatchDTO;
}
